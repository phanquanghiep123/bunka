<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use App\Http\Models\Quotations;
use App\Http\Models\Status;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use DB;
use Cookie;
use Auth;
class HomeController extends BackendController
{
    public $_VIEW       = "home";
    public $_NAME       = "home";
    public $_ROUTE_FIX  = "home";

    public function index(Builder $builder)
    {
        $this->_DATA["_PAGETITLE"] = "[_top_quotations_]";
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_quotation_number_', 'data' => 'quotation_number', 'name' => 'quotation_number', 'responsivePriority' => 2],
            ['title' => '_project_', 'data' => 'project', 'name' => 'project', 'responsivePriority' => 2],
            ['title' => '_customer_', 'data' => 'customer.authorized_name', 'name' => 'customer.authorized_name', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_area_', 'data' => 'area.name', 'name' => 'area.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_branch_', 'data' => 'branch.name', 'name' => 'branch.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_total_', 'data' => 'total', 'name' => 'total', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_status_', 'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    
    public function datatable(Request $request)
    {
        $m           = \App\Http\Models\WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $statusAfter = $this->getListStatusByModels($m->value)->where("options", "=", 1)->first();
        $this->_DATA['root_status_id'] = $statusAfter->id;
        $query                         = Quotations::with(['branch', 'status', 'status.status_name', 'customer', 'area'])
            ->join(Status::getTableName(),Status::getTableName().".id","=",Quotations::getTableName().".status_id")
            ->where(Status::getTableName().'.options',">=",1)
            ->select(Quotations::getTableName().'.*')
            ->groupby('id');
        if (!$request->order) {
            $query->orderby('id', 'desc');
        }
        return datatables()->eloquent($query)
            ->editColumn('branch.name',
                function (Quotations $quotation) {
                    return $quotation->branch ? $quotation->branch->name : null;
                }
            )
            ->editColumn('status.status_name.name',
                function (Quotations $quotation) {
                    return $quotation->status ? view($this->_VIEW . ".status", ["status" => $quotation->status]) : '';
                }
            )
            
            ->editColumn('customer.authorized_name',
                function (Quotations $quotation) {
                    return $quotation->customer ? str_limit($quotation->customer->authorized_name, 30, '...') : '';
                }
            )
            ->editColumn('area.name',
                function (Quotations $quotation) {
                    return $quotation->area ? str_limit($quotation->area->name, 30, '...') : '';
                }
            )
           
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where('quotation_number', 'like', "%" . $request->keyword . "%");
                }

                if ($request->created_at) {
                    $query->where('created_at', '>=', "%" . $request->created_at . "%");
                }
            })
            ->make(true);
    }
    public function notallow(){
        return view($this->_VIEW . "." .__FUNCTION__,$this->_DATA);
    }
    
    public function notallowajax(){
        return \Response::json(
            [
                "status"    => "error",
                "data"      => null,
                "message"   => "You do not have permission to use this action!"
            ]
        );
    }
    public function procedure(){
        $this->_PAGETITLE = '[_procedure_]';
        return view($this->_VIEW . "." .__FUNCTION__,$this->_DATA);
    }
}
