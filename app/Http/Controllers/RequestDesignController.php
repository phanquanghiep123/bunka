<?php

namespace App\Http\Controllers;

use App\Exports\RequestDesignExport;
use App\Http\Cores\BackendController;
use App\Http\Models\Orders;
use App\Http\Models\RequestDesign;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class RequestDesignController extends BackendController
{
    public function __construct()
    {
        parent::__construct();
        $this->_TABLE = "request_design";
        $this->_VIEW = "request_design";
        $this->_NAME = "request_design";
    }

    public function export($order_id) {
        $order = Orders::where('id', $order_id)->first();
        if (!$order)
            return redirect()->back();
        $request_design = RequestDesign::where('order_id', $order_id)->first();
        if (!$request_design)
            $request_design = new RequestDesign();
        $request_design->order_id = $order_id;
        $request_design->status_id = 28;
        $request_design->save();
        return Excel::download(new RequestDesignExport($order_id), 'request_design.xlsx');
    }
}
