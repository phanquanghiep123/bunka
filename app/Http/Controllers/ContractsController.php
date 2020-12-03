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

class ContractsController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->_TABLE              = "contracts";
        $this->_VIEW               = "contracts";
        $this->_NAME               = "contracts";
        $this->_ROUTE_FIX          = "contracts";
        $this->_ROLNAMES["view"][] = "contract_construction";
        $this->_ROLNAMES["view"][] = "DownloadPaymentOrder";
        $this->_ROLNAMES["view"][] = "DownloadAcceptance";
        $this->_ROLNAMES["view"][] = "DownloadSubcontractors";
        $this->_DATA["_PAGETITLE"] = "_CONTRACT_";
        $this->_MODEL              = new \App\Http\Models\Contracts();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $this->_DATA["status"] = $this->getListStatusByModels()->get();
        $this->_MODEL          = \App\Http\Models\Contracts::orderBy("contracts.id", "DESC")
            ->join('orders', 'orders.id', '=', 'contracts.order_id')
            ->join('quotations', 'quotations.id', '=', 'orders.quotation_id')
            ->join('customers', 'customers.id', '=', 'quotations.customer_id')
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
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id     = $request->input('id');
        $order  = Orders::find($id);
        $om     = \App\Http\Models\WebConfigs::where('key', '=', 'OrDerID')->first();
        $status = $this->getListStatusByModels($om->value)->where("options", "=", '2')->first();
        $orders = Orders::where(['status_id' => $status->id])->get();
        if ($id != null) {
            if ($order == null || $order->status_id != $status->id) {
                return redirect()->back();
            }
            $this->_DATA['order']            = $order;
            $this->_DATA["price_is_not_vat"] = $order->total;
            $this->_DATA["value_has_vat"]    = $order->grand_sub_total;
            $this->_DATA['tax_value']        = $order->quotation->tax_value;
        }
        $this->_DATA["orders"] = $orders;
        $this->_DATA["status"] = $this->getListStatusByModels()->get();
        $this->_DATA['order_id']  = $id;
        $this->_ADDURL         = route($this->_ROUTE_FIX . ".store");
        return view($this->_VIEW . ".create", $this->_DATA);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL = new \App\Http\Models\Contracts();
        $order        = null;
        $post         = $request->all();
        $id           = @$post['id'];
        if ($id != null) {
            $om     = \App\Http\Models\WebConfigs::where('key', '=', 'OrDerID')->first();
            $status = $this->getListStatusByModels($om->value)->where("options", "=", '2')->first();
            $order  = Orders::find($id);
            if ($order == null || $order->status_id != $status->id) {
                $data["message"] = '_order_not_allow_add_order_';
                return \Response::json($data);
            }
            $this->_MODEL->order_id = $order->id;
        } else {
            $order = Orders::find($post['order_id']);
        }

        $listColums = $this->_GetTableColumns($this->_TABLE);
        $rules      = [
            'contract_number'      => 'required|unique:contracts,contract_number',
            'date_expired'         => 'required',
            'date_on_the_contract' => 'required',
            'date_signed'          => 'required',
            'price_is_not_vat'     => 'required',
            'value_has_vat'        => 'required',
            'date_expired'         => 'required',
            'completion_date'      => 'required',
            'curator'              => 'required',
        ];
        if (@$id == null) {
            $rules['order_id'] = 'required';
        }
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
            return \Response::json($data);
        }

        $total_percent = 0;
        foreach ($post['percent'] as $key => $value) {
            $total_percent += $value;
        }
        if ($total_percent != 100) {
            $data["message"] = 'error_percent';
            return \Response::json($data);
        }

        $data['data'] = $post;
        if ($post['date_signed']) {
            $post['date_signed'] = Carbon::createFromFormat('d/m/Y', $post['date_signed'])->format('Y-m-d H:i:s');
            $post['status']      = \App\Http\Models\Contracts::SIGNED;
        }
        $post['date_expired'] = Carbon::createFromFormat('d/m/Y', $post['date_expired'])->format('Y-m-d H:i:s');
        if ($post['bidding_date'] != null) {
            $post['bidding_date'] = Carbon::createFromFormat('d/m/Y', $post['bidding_date'])->format('Y-m-d H:i:s');
        }
        $post['date_on_the_contract'] = Carbon::createFromFormat('d/m/Y', $post['date_on_the_contract'])->format('Y-m-d H:i:s');
        $post['completion_date']      = Carbon::createFromFormat('d/m/Y', $post['completion_date'])->format('Y-m-d H:i:s');
        $post['date_of_construction'] = Carbon::createFromFormat('d/m/Y', $post['date_of_construction'])->format('Y-m-d H:i:s');
        $post['price_is_not_vat'] = str_replace(",", "", $post['price_is_not_vat']);
        $post['value_has_vat']    = str_replace(",", "", $post['value_has_vat']);
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        if ($this->_MODEL->save()) {

        	$completion_m = date('m',strtotime($post['completion_date']));
        	$completion_y = date('Y',strtotime($post['completion_date']));
        	$temp = \App\Http\Models\ConstructionCompletion::where([
                'year'    => $completion_y,
                'month'   => $completion_m,
                'user_id' => $order->user_created
            ])->first();
            if(@$temp->id != null){
            	$temp->expected = ($temp->expected + $post['price_is_not_vat']);
            	$temp->save();
            }
            else{
            	$temp = new \App\Http\Models\ConstructionCompletion();
            	$temp->year 	= $completion_y;
            	$temp->month 	= $completion_m;
            	$temp->user_id 	= $order->user_created;
            	$temp->expected = $post['price_is_not_vat'];
            	$temp->save();
            }

            $contract_periods = array();
            foreach ($post['percent'] as $key => $value) {
                if ($post['percent'][$key] && $post['title'][$key] && $post['start_date'][$key] && $post['end_date'][$key]) {
                    $contract_periods                = new \App\Http\Models\ContractPeriods();
                    $contract_periods->contract_id   = $this->_MODEL->id;
                    $contract_periods->title         = $post['title'][$key];
                    $contract_periods->start_date    = Carbon::createFromFormat('d/m/Y', $post['start_date'][$key])->format('Y-m-d H:i:s');
                    $contract_periods->end_date      = Carbon::createFromFormat('d/m/Y', $post['end_date'][$key])->format('Y-m-d H:i:s');
                    $contract_periods->period_amount = str_replace(",", "", $post['period_amount'][$key]);
                    $contract_periods->percent       = $post['percent'][$key];
                    $contract_periods->comment       = $post['comment'][$key];
                    $contract_periods->is_remind     = $post['is_remind'][$key];
                    $contract_periods->save();
                }
            }
        }
        if ($request->page == 1) {
            $data["_redirect"]     = 1;
            $data["_redirect_url"] = route($this->_ROUTE_FIX . ".edit", $this->_MODEL->id);
        } else {
            $data["_reload"] = 1;
        }
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $status                  = $this->getListStatusByModels()->where("options", "=", '0')->first();
        $contract                = \App\Http\Models\Contracts::find($id);
        $this->_DATA["status"]   = $this->getListStatusByModels()->get();
        $this->_DATA["contract"] = $contract;
        if (!$this->_DATA["contract"]) {
            return redirect()->back();
        }
        $this->_DATA["price_is_not_vat"] = $contract->price_is_not_vat;
        $this->_DATA["value_has_vat"]    = $contract->value_has_vat;
        $this->_DATA["order"]            = $contract->order;
        $this->_DATA['tax_value']        = @$contract->order->quotation->tax_value;
        $this->_STOREURL                 = route($this->_ROUTE_FIX . ".update", $id);
        return view($this->_VIEW . ".edit", $this->_DATA);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update($id, Request $request)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $listColums   = $this->_GetTableColumns($this->_TABLE);
        $this->_MODEL = \App\Http\Models\Contracts::find($id);
        if ($this->_MODEL == null) {
            return \Response::json($data);
        }

        $rules = [
            'contract_number'      => 'required|unique:contracts,contract_number,' . $id,
            'date_expired'         => 'required',
            'date_on_the_contract' => 'required',
            'date_signed'          => 'required',
            //'price_is_not_vat'     => 'required',
            //'value_has_vat'        => 'required',
            'date_expired'         => 'required',
            'completion_date'      => 'required',
            'curator'              => 'required',
        ];
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
            return \Response::json($data);
        }
        $post         = $request->all();
        $data['data'] = $post;
        if ($post['date_signed']) {
            $post['date_signed'] = Carbon::createFromFormat('d/m/Y', $post['date_signed'])->format('Y-m-d H:i:s');
            $post['status']      = \App\Http\Models\Contracts::SIGNED;
        }
        $post['date_expired'] = Carbon::createFromFormat('d/m/Y', $post['date_expired'])->format('Y-m-d H:i:s');
        if ($post['bidding_date'] != null) {
            $post['bidding_date'] = Carbon::createFromFormat('d/m/Y', $post['bidding_date'])->format('Y-m-d H:i:s');
        }
        $post['date_on_the_contract'] = Carbon::createFromFormat('d/m/Y', $post['date_on_the_contract'])->format('Y-m-d H:i:s');
        $post['completion_date']      = Carbon::createFromFormat('d/m/Y', $post['completion_date'])->format('Y-m-d H:i:s');
        $post['date_of_construction'] = Carbon::createFromFormat('d/m/Y', $post['date_of_construction'])->format('Y-m-d H:i:s');
        //$post['price_is_not_vat'] = str_replace(",", "", $post['price_is_not_vat']);
        //$post['value_has_vat']    = str_replace(",", "", $post['value_has_vat']);
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id" && $key != "upload_orderpay" && $key != "upload_acceptance" && $key != "upload_subcontractors") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }

        if ($this->_MODEL->save()) {
            $contract_payments = array();
            if (@$this->_MODEL->periods != null) {
                $period_first = 0;
                foreach ($this->_MODEL->periods as $key => $period) {
                    $period_first = $period;
                    break;
                }

                $dates          = @$post['date'];
                $payment_amount = @$post['payment_amount'];
                $receipts_name  = @$post['receipts_name'];
                if (isset($dates) && $dates != null) {
                    foreach ($dates as $key => $date) {
                        if ($date != null && $payment_amount[$key] != null) {
                            $receipts                         = explode(', ', $receipts_name[$key]);
                            $contract_payment                 = new \App\Http\Models\ContractPayments();
                            $contract_payment->contract_id    = $this->_MODEL->id;
                            $contract_payment->periods_id     = $period_first;
                            $contract_payment->date           = Carbon::createFromFormat('d/m/Y', $date)->format('Y-m-d H:i:s');
                            $contract_payment->payment_amount = str_replace(",", "", $payment_amount[$key]);
                            $contract_payment->receipts       = $receipts;
                            if ($contract_payment->save()) {
                                $order = Orders::find($this->_MODEL->order_id);
                                $completion_m = date('m',strtotime($contract_payment->date));
                                $completion_y = date('Y',strtotime($contract_payment->date));
                                $temp = \App\Http\Models\ConstructionCompletion::where([
                                    'year'    => $completion_y,
                                    'month'   => $completion_m,
                                    'user_id' => @$order->user_created
                                ])->first();
                                if(@$temp->id != null){
                                    $temp->current = ($temp->current + $contract_payment->payment_amount);
                                    if($temp->target != 0){
                                        $temp->percent = round((($temp->current + $contract_payment->payment_amount)/$temp->target)*100 ,2);
                                    }
                                    else{
                                        $temp->percent = 100;
                                    }
                                    $temp->save();
                                }

                                $contract_payments[] = $contract_payment->id;
                            }
                        }
                    }
                }
            }

            if ($request->hasFile('upload_orderpay')) {
                if (!file_exists('uploads/contracts/' . $this->_MODEL->id)) {
                    mkdir('uploads/contracts/' . $this->_MODEL->id, 0777, true);
                }
                $file                          = $request->file('upload_orderpay');
                $path                          = $file->move('uploads/contracts/' . $this->_MODEL->id, uniqid() . '-' . $file->getClientOriginalName());
                $this->_MODEL->upload_orderpay = $path;
                $this->_MODEL->upload_orderpay = '/' . str_replace("\\", "/", $this->_MODEL->upload_orderpay);
                $this->_MODEL->save();
            }

            if ($request->hasFile('upload_acceptance')) {
                if (!file_exists('uploads/contracts/' . $this->_MODEL->id)) {
                    mkdir('uploads/contracts/' . $this->_MODEL->id, 0777, true);
                }
                $file                            = $request->file('upload_acceptance');
                $path                            = $file->move('uploads/contracts/' . $this->_MODEL->id, uniqid() . '-' . $file->getClientOriginalName());
                $this->_MODEL->upload_acceptance = $path;
                $this->_MODEL->upload_acceptance = '/' . str_replace("\\", "/", $this->_MODEL->upload_acceptance);
                $this->_MODEL->save();
            }

            if ($request->hasFile('upload_subcontractors')) {
                if (!file_exists('uploads/contracts/' . $this->_MODEL->id)) {
                    mkdir('uploads/contracts/' . $this->_MODEL->id, 0777, true);
                }
                $file                            = $request->file('upload_subcontractors');
                $path                            = $file->move('uploads/contracts/' . $this->_MODEL->id, uniqid() . '-' . $file->getClientOriginalName());
                $this->_MODEL->upload_subcontractors = $path;
                $this->_MODEL->upload_subcontractors = '/' . str_replace("\\", "/", $this->_MODEL->upload_subcontractors);
                $this->_MODEL->save();
            }
        
            if ($contract_payments) {
                if ($request->hasFile('receipts')) {
                    if (!file_exists('uploads/contracts/' . $this->_MODEL->id)) {
                        mkdir('uploads/contracts/' . $this->_MODEL->id, 0777, true);
                    }
                    $files = $request->file('receipts');
                    foreach ($files as $file) {
                        $file->move('uploads/contracts/' . $this->_MODEL->id, $file->getClientOriginalName());
                    }
                }

            }
        }
        if ($request->page == 1) {
            $data["_redirect"]     = 1;
            $data["_redirect_url"] = route($this->_ROUTE_FIX . ".edit", $id);
        } else {
            $data["_reload"] = 1;
        }
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

    public function view($id)
    {
        $status   = $this->getListStatusByModels()->where("options", "=", '0')->first();
        $contract = \App\Http\Models\Contracts::find($id);
        if ($contract->is_edit == 0) {
            $contract->is_edit   = 1;
            $contract->status_id = $status->id;
            $contract->save();
        }
        $this->_DATA["status"]   = $this->getListStatusByModels()->get();
        $this->_DATA["contract"] = $contract;
        if (!$this->_DATA["contract"]) {
            return redirect()->back();
        }
        $this->_DATA["orders"] = \App\Http\Models\Orders::get();
        return view($this->_VIEW . ".view", $this->_DATA);
    }

    public function contract_construction()
    {
        return view($this->_VIEW . ".contract_construction", $this->_DATA);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $this->_MODEL = \App\Http\Models\Contracts::destroy($id);
        if (\File::exists('uploads/contracts/' . $id)) {
            \File::deleteDirectory(public_path('uploads/contracts/' . $id));
        }
        return redirect(route($this->_ROUTE_FIX . '.index'));
    }
    public function DownloadPaymentOrder($id)
    {
        $contract = Contracts::find($id);
        $name = $this->getLangLableValue('[_download_payment_order_]');
        return Excel::download(new PaymentOrder($contract->order), $name.'-'.$contract->contract_number . '.xls');
    }
    public function DownloadAcceptance($id)
    {
        $contract = Contracts::find($id);
        $name = $this->getLangLableValue('[_acceptance_download_]');
        return Excel::download(new AcceptanceContract($contract->order), $name.'-'.$contract->contract_number . '.xls');

    }
    public function DownloadSubcontractors($id){
        $contract = Contracts::find($id);
        $name = $this->getLangLableValue('[_settlement_of_volume_with_subcontractors_]');
        return Excel::download(new Subcontractors($contract->order),$name.'-'.$contract->contract_number . '.xls');
    }
}
