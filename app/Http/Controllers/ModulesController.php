<?php
namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use App\Http\Models\Modules;
use Illuminate\Http\Request;
use Validator;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class ModulesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES["view"][]   = 'datatable';
        parent::__construct();
        $this->_TABLE              = "modules";
        $this->_VIEW               = "modules";
        $this->_NAME               = "modules";
        $this->_ROUTE_FIX          = "modules";
        $this->_DATA["_PAGETITLE"] = "_module_management_";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
    }
    public function index(Builder $builder)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_name_', 'data' => 'name', 'name' => 'name', 'responsivePriority' => 2],
            ['title' => '_controller_', 'data' => 'controller', 'orderable' => true, 'name' => 'controller', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_is_common_', 'data' => 'is_common', 'name' => 'is_common', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_status_', 'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function datatable(Request $request)
    {
        $this->_MODEL = Modules::with(['status', 'status.status_name'])->select(Modules::getTableName() . '.*');
        if (!$request->order) {
            $this->_MODEL->orderby('id', 'desc');
        }
        return datatables()->eloquent($this->_MODEL)
            ->editColumn('status.status_name.name',
                function (Modules $module) {
                    return $module->status ? view($this->_VIEW . ".status", ["status" => $module->status]) : '';
                }
            )
            ->editColumn('is_common',
                function (Modules $module) {
                    return $module->is_common ? view($this->_VIEW . ".is_common", ["is_common" => $this->activerCommon($module->is_common)]) : '';
                }
            )
            ->editColumn('Actions',
                function (Modules $module) {
                    $this->_DATA['id'] = $module->id;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where('name', 'like', "%" . $request->keyword . "%");
                }
                if ($request->created_at) {
                    $query->where('created_at', '>=', "%" . $request->created_at . "%");
                }
            })
            ->make(true);
    }
   
    public function store (Request $request){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        $id           = $request->id;
        if ($id) {
            $rules        = [
                'controller' => 'unique:modules,controller,' . $id,
                'controller' => 'unique:modules,controller,'.$id,
                'name'    => 'required|min:6',
            ];
        }
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
        } else {
            if ($id) {
                $this->_MODEL = Modules::find($id);
            } else {
                $this->_MODEL = new Modules();
            }
            foreach ($post as $key => $value) {
                if (in_array($key, $listColums)) {
                    if ($key != "id") {
                        $this->_MODEL->{$key} = $value;
                    }
                }
            }
            $this->_MODEL->save();
            $data["status"] = 1;
        }
        return \Response::json($data);
    }
    public function edit($id)
    {
        $data           = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL   = Modules::find($id);
        $data["status"] = 1;
        $data["data"]   = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    public function delete($id)
    {
        $data            = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL    = Modules::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
}
