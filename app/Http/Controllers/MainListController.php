<?php

namespace App\Http\Controllers;

use App\Exports\Subcontractors;
use App\Exports\AcceptanceContract;
use App\Exports\PaymentOrder;
use App\Http\Cores\BackendController;
use App\Http\Models\Contracts;
use App\Http\Models\Orders;
use Carbon\Carbon;
use Excel;
use Illuminate\Http\Request;
use Validator;

class MainListController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->_TABLE              = "main_list";
        $this->_VIEW               = "main_list";
        $this->_NAME               = "main_list";
        $this->_ROUTE_FIX          = "main_list";
        $this->_DATA["_PAGETITLE"] = "[_main_list_]";
        $this->_MODEL              = null;
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        $this->_DATA["status"] = $this->getListStatusByModels()->get();
        $status_c = $this->getListStatusByModels()->where("options", "=", 4)->first();
        $this->_MODEL  = \App\Http\Models\Contracts::orderby("contracts.id", "desc")
            ->join('orders', 'orders.id', '=', 'contracts.order_id')
            ->join('quotations', 'quotations.id', '=', 'orders.quotation_id')
            ->join('customers', 'customers.id', '=', 'quotations.customer_id')
            ->where("orders.status_id", "!=", @$status_c->id)
            ->select('contracts.*', 'orders.order_number', 'customers.authorized_name');
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function ($query) use ($keyword) {
                $query->where("contracts.contract_number", "like", "%" . $keyword . "%");
                $query->orWhere("orders.order_number", "like", "%" . $keyword . "%");
                $query->orWhere("customers.authorized_name", "like", "%" . $keyword . "%");
            });
        }
        if ($request->input('date')) {
            $date = $request->input('date');
            $this->_MODEL->where(function ($query) use ($date) {
                $query->where("contracts.created_at", ">=", date('Y-m-d', strtotime($date)));
            });
        }
        if ($request->input('status')) {
            $status = $request->input('status');
            $this->_MODEL->where(function ($query) use ($status) {
                $query->where("contracts.status_id", "=", $status);
            });
        }
        $this->_DATA["models"] = $this->_MODEL->orderby("contracts.id", "desc")->get();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
}
