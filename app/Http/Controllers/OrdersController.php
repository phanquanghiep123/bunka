<?php
namespace App\Http\Controllers;

use App\Exports\ProductionRequirements;
use App\Exports\RequestDesignExport;
use App\Exports\OrderRevenueSlipExports;
use App\Exports\SuppliesExport;
use App\Http\Cores\BackendController;
use App\Http\Models\Branchs;
use App\Http\Models\Languages;
use App\Http\Models\OrderNos;
use App\Http\Models\Orders;
use App\Http\Models\QuotationDetails;
use App\Http\Models\OrderDownloads;
use App\Http\Models\OtherProductDownloads;
use App\Http\Models\QuotationDownloads;
use App\Http\Models\QuotationOtherDetails;
use App\Http\Models\Quotations;
use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\WebConfigs;
use DB;
use Excel;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class OrdersController extends BackendController
{
    public function __construct()
    {
        $this->_ROLNAMES['view'] = array_merge($this->_ROLNAMES['view'], [
            "getquotations",
            "getstatus",
            "getquotation",
            "status",
            "datatable",
            "datatablestatus",
            "createcontract",
            "DesignRequest",
            "dowloadQuotation",
            "dowloadOtherQuotation",
            "startorder",
            "getUsers",
            "winning_bidding",
            "getconstructions",
            "uploadRequest",
            "ExportRevenueSlip",
        ]);
        $this->_ROLNAMES['update'] = array_merge($this->_ROLNAMES['update'], [
            "revenueView",
            "revenueUpdate"
        ]);
        parent::__construct();
        $this->_TABLE              = "orders";
        $this->_VIEW               = "orders";
        $this->_NAME               = "orders";
        $this->_ROUTE_FIX          = "orders";
        $this->_DATA["_PAGETITLE"] = "_order_management_";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".create");
        $m                         = \App\Http\Models\WebConfigs::where('key', '=', 'ContractID')->first();
        $this->ContractID          = 0;
        if ($m) {
            $this->ContractID = $m->value;
        }

    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_order_number_', 'data' => 'order_number', 'name' => 'order_number', 'responsivePriority' => 2],
            ['title' => '[_project_progress_]', 'orderable' => false, 'data' => 'project_progress', 'name' => 'project_progress', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_person_in_charge_', 'data' => 'userchange.name', 'name' => 'userchange.name'],
            ['title' => '[_total_cost_]','orderable' => false, 'data' => 'total_cost', 'name' => 'total_cost','responsivePriority' => 2],
            ['title' => '[_paid_cost_]','orderable' => false, 'data' => 'paid_cost', 'name' => 'paid_cost', 'responsivePriority' => 3],
            ['title' => '[_remind_cost_]','orderable' => false, 'data' => 'remind_cost', 'name' => 'remind_cost', 'responsivePriority' => 3],
            ['title' => '_planned_installation_date_', 'data' => 'planned_installation_date', 'name' => 'planned_installation_date', 'responsivePriority' => 3],
            ['title' => '_planned_completion_date_', 'data' => 'planned_completion_date', 'name' => 'planned_completion_date', 'responsivePriority' => 1],
            ['title' => '_discount_', 'data' => 'discount', 'name' => 'discount', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_total_', 'data' => 'total', 'name' => 'total', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_status_', 'responsivePriority' => 1 ,'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA['branchs'] = \App\Http\Models\Branchs::get();
        $this->_DATA['status']  =  $this->getListStatusByModels()->get();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }


    public function datatable(Request $request)
    {
        $query = Orders::with(
            ['status', 'status.status_name']
        )
        ->join('quotations', 'quotations.id', '=', 'orders.quotation_id')
        ->where('orders.is_delete','=',0)
        ->groupby('orders.id')
        ->select([Orders::getTableName() . '.*']);
        if (!$request->order) {
            $query->orderby('id', 'desc');
        }
        return datatables()->eloquent($query)
             ->editColumn('project_progress', function (Orders $order) {
                $contract = $order->contract;
                if ($contract) {
                    $total = $order->total;
                    $payments = $order->contract->payments->sum('payment_amount');
                    if($payments > 0 ){
                        $progress = ceil (($payments / $total) * 100);
                        return '<div class="progress" style="width:120px;height:15px">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ' . $progress . '%" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100">' . $progress . '%</div></div>';
                    }else
                    {
                        return '<div class="progress" style="width:120px;height:15px">
                        <div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width:0%" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100">0%</div></div>';
                    }
                } else {
                    return '';
                }
            })
            ->editColumn('total_cost', function (Orders $order) {
                $contract = $order->contract;
                if ($contract) {
                    return number_format($contract->value_has_vat)."VNĐ";
                } else {
                    return '';
                }
            })
            ->editColumn('paid_cost', function (Orders $order) {
                $contract = $order->contract;
                if ($contract) {
                	$contract_payment = $contract->payments;
                	if($contract_payment){
                		return number_format($contract_payment->sum('payment_amount'))."VNĐ";
                	} else {
	                    return '';
	                }
                } else {
                    return '';
                }
            })
            ->editColumn('remind_cost', function (Orders $order) {
                $contract = $order->contract;
                if ($contract) {
                	$contract_payment = $contract->payments;
                	if($contract_payment){
                		return number_format($contract->value_has_vat - $contract_payment->sum('payment_amount'))."VNĐ";
                	} else {
	                    return number_format($contract->value_has_vat)."VNĐ";
	                }
                } else {
                    return '';
                }
            })
            ->editColumn('userchange.name',
                function (Orders $order) {
                    return @$order->userchange->first_name . " ".  @$order->userchange->last_name;
                }
            )
            ->editColumn('status.status_name.name',
                function (Orders $order) {
                    return $order->status ? view($this->_VIEW . ".status", ["status" => $order->status]) : '';
                }
            )
            ->editColumn('Actions',
                function (Orders $order) {
                    if ($order->status) {
                        $this->_DATA['id']     = $order->id;
                        $this->_DATA['status'] = $order->status;
                        return view($this->_VIEW . '.context-menu', $this->_DATA);
                    }
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where('orders.order_number', 'like', "%" . $request->keyword . "%");
                }

                if ($request->created_at) {
                    $argDate = explode('-',$request->created_at);

                    if(@$argDate[0]){
                        $date = \DateTime::createFromFormat('d/m/Y', trim(@$argDate[0]))->format('Y-m-d');
                        $query->where('orders.created_at', '>=',  $date);
                    }
                    if(@$argDate[1]){
                        $date = \DateTime::createFromFormat('d/m/Y', trim(@$argDate[1]))->format('Y-m-d');
                        $query->where('orders.created_at', '<=',  $date);
                    }
                }


                if ($request->status) {
                    $query->where('orders.status_id', '=', $request->status);
                }
                if ($request->branch) {
                    $query->where('quotations.branch_id', '=', $request->branch);
                }

            })
            ->make(true);
    }

    public function status($id, Builder $builder)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_order_number_', 'data' => 'order_number', 'name' => 'order_number', 'responsivePriority' => 2],
            ['title' => '[_project_progress_]', 'orderable' => false, 'data' => 'project_progress', 'name' => 'project_progress', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_person_in_charge_', 'data' => 'userchange.name', 'name' => 'userchange.name'],
            ['title' => '_receiving_order_date_', 'data' => 'receiving_order_date', 'name' => 'receiving_order_date'],
            ['title' => '_planned_delivery_date_', 'data' => 'planned_delivery_date', 'name' => 'planned_delivery_date', 'responsivePriority' => 3],
            ['title' => '_planned_installation_date_', 'data' => 'planned_installation_date', 'name' => 'planned_installation_date', 'responsivePriority' => 3],
            ['title' => '_planned_completion_date_', 'data' => 'planned_completion_date', 'name' => 'planned_completion_date', 'responsivePriority' => 1],
            ['title' => '_discount_', 'data' => 'discount', 'name' => 'discount', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_total_', 'data' => 'total', 'name' => 'total', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_status_', 'responsivePriority' => 1,'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatablestatus', $id),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA['branchs'] = \App\Http\Models\Branchs::get();
        $this->_DATA['status']  =  $this->getListStatusByModels()->get();
        $this->_DATA['status_id'] = $id;
        return view($this->_VIEW . ".index", $this->_DATA);
    }


    public function datatablestatus(Request $request, $id)
    {
        $query = Orders::with(['status', 'status.status_name'])
             ->join('quotations', 'quotations.id', '=', 'orders.quotation_id')
            ->groupby('orders.id')
            ->where('orders.is_delete','=',0)
            ->where('orders.status_id', '=', $id)->select(Orders::getTableName() . '.*');
        if (!$request->order) {
            $query->orderby('id', 'desc');
        }
        return datatables()->eloquent($query)
            ->editColumn('status.status_name.name',
                function (Orders $order) {
                    return $order->status ? view($this->_VIEW . ".status", ["status" => $order->status]) : '';
                }
            )
            ->editColumn('userchange.name',
                function (Orders $order) {
                    return @$order->userchange->first_name . " ".  @$order->userchange->last_name;
                }
            )
            ->editColumn('project_progress', function (Orders $order) {
                $completion = collect($order->completion);
                $module = \App\Http\Models\Modules::where('controller', 'CompletionReport')->first();
                $status = collect($this->getListStatusByModels($module->id)->with('status_name')->get());
                $percent = $completion->where('status', $status->where('options', 'status-approved')->first()->id)->max('percent');
                $progress = $percent ? $percent : 0;
                return '<div class="progress" style="width:200px; height:20px"><div class="progress-bar progress-bar-striped bg-success" role="progressbar" style="width: ' . $progress . '%" aria-valuenow="' . $progress . '" aria-valuemin="0" aria-valuemax="100">' . ($progress > 0 ? $progress . '%' : '') . '</div></div>';
            })
            ->editColumn('Actions',
                function (Orders $order) {
                    $this->_DATA['id']     = $order->id;
                    $this->_DATA['status'] = $order->status;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where('orders.order_number', 'like', "%" . $request->keyword . "%");
                }
                if ($request->created_at) {
                    $argDate = explode('-',$request->created_at);

                    if(@$argDate[0]){
                        $date = \DateTime::createFromFormat('d/m/Y', trim(@$argDate[0]))->format('Y-m-d');
                        $query->where('orders.created_at', '>=',  $date);
                    }
                    if(@$argDate[1]){
                        $date = \DateTime::createFromFormat('d/m/Y', trim(@$argDate[1]))->format('Y-m-d');
                        $query->where('orders.created_at', '<=',  $date);
                    }
                }
                if ($request->status) {
                    $query->where('orders.status_id', '=', $request->status);
                }
                if ($request->branch) {
                    $query->where('quotations.branch_id', '=', $request->branch);
                }
            })
            ->make(true);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id        = @$request->id;
        $quotation = Quotations::find($id);
        $status    = $this->getListStatusByModels()->where("options", "=", '0')->first();
        $order     = new Orders();
        $order_no  = new OrderNos();
        $order_no->save();
        $products = null;
        if ($quotation) {
            $quotation['othproducts']  = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
            $order->status_id          = $status->id;
            $this->_DATA['quotation']  = $quotation;
            $customer                  = $quotation->customer;
            $construction              = $quotation->construction;
            $tax                       = $quotation->tax;
            $rate                      = $quotation->rate;
            $branch                    = $quotation->branch;
            $quotation                 = $quotation;
            $quotation['customer']     = @$customer;
            $quotation['construction'] = @$construction;
            $quotation['tax']          = @$tax;
            $quotation['rate']         = @$rate;
            $quotation['branch']       = @$branch;
            $quotation['short_name']   = @$branch ? $branch->short_name : '';
            $status                    = $order->status;
            $order->id                 = 0;
            $order                     = $order;
            $order['quotation']        = $quotation;
            $order['status']           = $status;
            $MstclassTBL       = \App\Http\Models\Mstclass::getTableName();
            $MstitemTBL        = \App\Http\Models\Mstitem::getTableName();
            $tbl1              = QuotationDetails::getTableName();
            $tbl2              = Quotations::getTableName();
            $m                 = \App\Http\Models\WebConfigs::where("key", "=", "ClassProduct")->first();
            $products          = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
                ->join($MstclassTBL, $MstclassTBL . ".ClassKey", "=", $tbl1 . ".product_id")
                ->where(
                    [
                        [$MstclassTBL . ".Class", "=", $m->value],
                        [$tbl1 . ".quotation_id", "=", $quotation->id],
                    ]
                )
                ->select([
                    $tbl1 . ".*",
                    $MstclassTBL . ".*",
                    DB::Raw("SUM(" . $tbl1 . ".discount) as NUMD"),
                    DB::Raw("SUM(" . $tbl1 . ".quantity) as NUMQ"),
                    DB::Raw("SUM(" . $tbl1 . ".price) as NUMP"),
                    DB::Raw("SUM(" . $tbl1 . ".saleprice) as NUMSP"),
                ])
                ->orderby($MstclassTBL . ".Class", "ASC")
                ->groupby($MstclassTBL . ".ClassKey")
                ->get();
            $this->_DATA['products'] = [];
            foreach ($products as $key => $value) {
                $value["factorys"]         = $order->factorysByProduct($value->ClassKey);
                $value["details"]          = $order->quotation->detailsByproduct($value->ClassKey)->get();
                $this->_DATA['products'][] = $value;
            }
            $order['quotation']['products'] = $products;
        } else {
            $branch             = Branchs::find($this->_USER->branch_id);
            $order->id          = 0;
            $order->status_id   = $status->id;
            $order['quotation'] = [
                'short_name' => $branch ? $branch->short_name : '',
                'not'        => false,
            ];
            $status          = $order->status;
            $order           = $order;
            $order['status'] = $status;
        }
        $order['order_no'] = $order_no;
        $m                              = \App\Http\Models\WebConfigs::where("key", "=", "ClassTax")->first();
        $this->_DATA["rate"]            = \App\Http\Models\Mstclass::where("Class", "=", $m->value)->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
        $order['factorys']              = $order->factorys();
        $order['person_in_charge']      =  \App\Http\Models\Users::
        select(['users.*',DB::Raw('(count(orders.id) + 100) as numberOrder')])  // Tạm thời 2019.09.23
        ->leftJoin('orders', function($join) {
          $join->on('users.id', '=', 'orders.person_in_charge');
        })
        ->groupby('users.id')
        ->where("users.id","=",$this->_USER->id)
        ->first();
        $this->_DATA['order']           = $order;
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($id, Request $request)
    {
    	// Added temp order from 100. Remove it late
    	$order_add_more = 100;
    	
        $data        = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $postData    = $request->post();
        $order       = Orders::find($id);
        $status_type = $request->status_id;
        $m           = \App\Http\Models\WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $status      = $this->getListStatusByModels()->where("options", "=", $status_type)->first();
        $statusAfter = $this->getListStatusByModels($m->value)->where("options", '=', '2')->first();
        $quotation   = Quotations::find($request->quotation_id);
        if ($order && $quotation->id != $order->quotation_id) {
            if ($quotation->status_id != $statusAfter->id) {
                $data["message"] = '_quotation_not_allow_add_order_';
                return view('layouts.translate', ['data' => $data]);
            }
        }
        if ($order != null) {
            $order->product_price   = $quotation->product_price;
            $order->other_price     = $quotation->other_price;
            $order->discount        = $quotation->discount;
            $order->sub_total       = $quotation->sub_total;
            $order->grand_sub_total = $quotation->grand_sub_total;
            $order->tax_price       = $quotation->tax_price;
            $order->total           = $quotation->total;
        } else {
            $order                  = new Orders();
            $order->product_price   = $quotation->product_price;
            $order->other_price     = $quotation->other_price;
            $order->discount        = $quotation->discount;
            $order->sub_total       = $quotation->sub_total;
            $order->grand_sub_total = $quotation->grand_sub_total;
            $order->tax_price       = $quotation->tax_price;
            $order->total           = $quotation->total;
        }
        $listColums = $this->_GetTableColumns(Orders::getTableName());
        if ($listColums) {
            foreach ($request->post() as $key => $value) {
                if (in_array($key, $listColums)) {
                    if ($key != "id") {
                        if (strpos($key, '_date') !== false) {
                            $value = \DateTime::createFromFormat('d/m/Y', $value)->format('Y-m-d');
                        }
                        $order->{$key} = $value;
                    }
                }
            }
            $order->status_id = $status->id;
        }
        $person_in_charge = $request->person_in_charge;
        $order->person_in_charge = $person_in_charge["id"];
        
        if(!@$order->id){
            $userchange = \App\Http\Models\Users::
            select(['users.*',DB::Raw('count(orders.id) as numberOrder')])
            ->leftJoin('orders', function($join) {
              $join->on('users.id', '=', 'orders.person_in_charge');
            })
            ->groupby('users.id')
            ->where("users.id","=",$this->_USER->id)
            ->first();
            $order_numberArg = explode('-', $order->order_number) ;
            unset($order_numberArg[count($order_numberArg) - 1]);
            $order->order_number  = implode('-', $order_numberArg) . '-'. ($userchange->numberOrder + 1 + $order_add_more); // Added: 2019.09.23
        }
        $order->save();
        $quotation->construction_id = $order->construction_id;
        $quotation->save();
        $data["data"]          = $order->toArray();
        $data["status"]        = 1;
        $data['_redirect']     = 1;
        $data['_redirect_url'] = route($this->_ROUTE_FIX . ".status", $order->status_id);
        return view('layouts.translate', ['data' => $data]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $order = Orders::find($id);
        if (!$order) {
            return Redirect(route($this->_ROUTE_FIX . ".create", $order->id));
        }
        if ($order) {
            $MstclassTBL  = \App\Http\Models\Mstclass::getTableName();
            $MstitemTBL   = \App\Http\Models\Mstitem::getTableName();
            $tbl1         = QuotationDetails::getTableName();
            $tbl2         = Quotations::getTableName();
            $quotation                = $order->quotation;
            $this->_DATA['quotation'] = $quotation;
            if ($quotation) {
                $customer                  = $quotation->customer;
                $tax                       = $quotation->tax;
                $rate                      = $quotation->rate;
                $quotation                 = $quotation;
                $quotation['customer']     = @$customer;
                $quotation['tax']          = @$tax;
                $quotation['rate']         = @$rate;
            }
            $qID                      = $quotation->id;
            $status                   = $order->status;
            $m   = \App\Http\Models\WebConfigs::where("key", "=", "ClassProduct")->first();
            $products = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
                ->join($MstclassTBL, $MstclassTBL . ".ClassKey", "=", $tbl1 . ".product_id")
                ->where(
                    [
                        [$MstclassTBL . ".Class", "=", $m->value],
                        [$tbl1 . ".quotation_id", "=", $quotation->id],
                    ]
                )
                ->select([
                    $tbl1 . ".*",
                    $MstclassTBL . ".*",
                    DB::Raw("SUM(" . $tbl1 . ".discount) as NUMD"),
                    DB::Raw("SUM(" . $tbl1 . ".quantity) as NUMQ"),
                    DB::Raw("SUM(" . $tbl1 . ".price) as NUMP"),
                    DB::Raw("SUM(" . $tbl1 . ".saleprice) as NUMSP"),
                ])
                ->orderby($MstclassTBL . ".Class", "ASC")
                ->groupby($MstclassTBL . ".ClassKey")
                ->get();
            $quotation['products']    = $products;
            $quotation['othproducts'] = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
            $quotation['othproducts'] = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
            $order['quotation']       = $quotation;
            $order['status']          = $status;
            $m                    = \App\Http\Models\WebConfigs::where("key", "=", "ClassTax")->first();
            $this->_DATA["rate"]  = \App\Http\Models\Mstclass::where("Class", "=", $m->value)->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
            $order['factorys']    = $order->factorys();
            $order['products']    = $products;
            $order['construction']  = $order->construction;
            $order['person_in_charge']  = \App\Http\Models\Users::find($order['person_in_charge']);
            $this->_DATA['order'] = $order;
        }
        return view($this->_VIEW . ".create", $this->_DATA);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function createcontract($id)
    {
        $status = $this->getListStatusByModels()->where("options", "=", '2')->first();
        $order  = Orders::find($id);
        if ($order && $order->status_id == $status->id) {
            return Redirect(route('contracts.create',['id' => $order->id]));
        }
        return Redirect(route($this->_ROUTE_FIX . '.index',['id' => $order->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $data = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $o   = \App\Http\Models\Orders::find($id);
        if($o){
            $o->is_delete = 1;
            $o->save();
            $m         = \App\Http\Models\WebConfigs::where('key', '=', 'QuotaitionID')->first();
            $status    = $this->getListStatusByModels($m->value)->where("options", '=', '2')->first();
            $quotation = \App\Http\Models\Quotations::find($o->quotation_id);
            $quotation->status_id = $status->id;
            $quotation->construction_id = null;
            $quotation->save();
        }
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function getquotations($id)
    {
        $data        = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $m           = \App\Http\Models\WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $statusAfter = $this->getListStatusByModels($m->value)->where("options", "=", 2)->first();
        $order       = Orders::find($id);
        if ($order) {
            $quotation = $order->quotation;
        }
        $MstclassTBL  = \App\Http\Models\Mstclass::getTableName();
        $MstitemTBL   = \App\Http\Models\Mstitem::getTableName();
        $tbl1         = QuotationDetails::getTableName();
        $tbl2         = Quotations::getTableName();
        $m            = \App\Http\Models\WebConfigs::where("key", "=", "ClassProduct")->first();
        $data["data"] = [];
        if ($statusAfter) {
            $quotations = Quotations::
                join(Branchs::getTableName(), Branchs::getTableName() . ".id", "=", Quotations::getTableName() . '.branch_id')
                ->where(Quotations::getTableName() . '.status_id', '=', $statusAfter->id)
                ->orwhere(Quotations::getTableName() . '.id', '=', (@$quotation ? $quotation->id : 0))
                ->select([Quotations::getTableName() . '.*', Branchs::getTableName() . '.short_name'])
                ->get();
            foreach ($quotations as $key => $quotation) {
                $products = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
                    ->join($MstclassTBL, $MstclassTBL . ".ClassKey", "=", $tbl1 . ".product_id")
                    ->where(
                        [
                            [$MstclassTBL . ".Class", "=", $m->value],
                            [$tbl1 . ".quotation_id", "=", $quotation->id],
                        ]
                    )
                    ->select([
                        $tbl1 . ".*",
                        $MstclassTBL . ".*",
                        DB::Raw("SUM(" . $tbl1 . ".discount) as NUMD"),
                        DB::Raw("SUM(" . $tbl1 . ".quantity) as NUMQ"),
                        DB::Raw("SUM(" . $tbl1 . ".price) as NUMP"),
                        DB::Raw("SUM(" . $tbl1 . ".saleprice) as NUMSP"),
                    ])
                    ->orderby($MstclassTBL . ".Class", "ASC")
                    ->groupby($MstclassTBL . ".ClassKey")
                    ->get();
                $quotation['products']    = $products;
                $quotation['othproducts'] = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
                $data["data"][]           = $quotation;

            }
        }
        $data["status"] = 1;
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function getquotation($id)
    {
        $data      = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $quotation = Quotations::find($id);
        if ($quotation) {
            $customer                  = $quotation->customer;
            $construction              = $quotation->construction;
            $tax                       = $quotation->tax;
            $rate                      = $quotation->rate;
            $quotation                 = $quotation->toArray();
            $quotation['customer']     = @$customer ? $customer->toArray() : null;
            $quotation['construction'] = @$construction ? $construction->toArray() : null;
            $quotation['tax']          = @$tax ? $tax->toArray() : null;
            $quotation['rate']         = @$rate ? $rate->toArray() : null;
        }
        $data['data']   = $quotation;
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function getstatus()
    {
        $data    = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $statusl = $this->getListStatus();
        $status  = [];
        foreach ($statusl as $key => $value) {
            $value["name"] = $value->get_name();
            $status[]      = $value->toArray();
        }
        $data['data']   = $status;
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function view($id)
    {
        $order = Orders::find($id);
        if ($order) {
            $this->_DATA["is_download"] = ($order->status->options >= 2);
            $quotation                  = $order->quotation;
            $this->_DATA['quotation']   = $quotation;
            if ($quotation) {
                $customer                  = $quotation->customer;
                $construction              = $quotation->construction;
                $tax                       = $quotation->tax;
                $rate                      = $quotation->rate;
                $quotation['customer']     = @$customer;
                $quotation['construction'] = @$construction;
                $quotation['tax']          = @$tax;
                $quotation['rate']         = @$rate;
            }
            $status                 = $order->status;
            $order['quotation']     = $quotation;
            $order['status']        = $status;
            $MstclassTBL            = \App\Http\Models\Mstclass::getTableName();
            $MstitemTBL             = \App\Http\Models\Mstitem::getTableName();
            $tbl1                   = QuotationDetails::getTableName();
            $tbl2                   = Quotations::getTableName();
            $m                      = \App\Http\Models\WebConfigs::where('key', '=', 'ClassProduct')->first();
            $langs                  = Languages::orderby("is_default", "DESC")->where("id", "!=", $this->_LANG_ID)->get();
            $lang                   = \App\Http\Models\Languages::find($this->_LANG_ID);
            $this->_DATA["langs"][] = $lang;
            foreach ($langs as $key => $value) {
                $this->_DATA["langs"][] = $value;
            }
            $qID                = $quotation->id;
            $qDetails           = $quotation->details;
            $status             = $order->status;
            $order['quotation'] = $quotation;
            $order['status']    = $status;
            $products           =
            Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
                ->join($MstclassTBL, $MstclassTBL . ".ClassKey", "=", $tbl1 . ".product_id")
                ->leftjoin(DB::Raw('(
                    select * from quotation_downloads
                    where quotation_downloads.quotation_id = ' . $quotation->id . '
                    group by product_id,quotation_id,
                    quotation_id order by id desc
                ) as tbl1'), function ($q) use ($tbl1) {
                    $q->on('tbl1.product_id', '=', $tbl1 . ".product_id");
                })
                ->where(
                    [
                        [$MstclassTBL . ".Class", "=", $m->value],
                        [$tbl1 . ".quotation_id", "=", $order->quotation_id],
                    ]
                )
                ->select([
                    $tbl1 . ".*",
                    $MstclassTBL . ".*",
                    DB::Raw("SUM(" . $tbl1 . ".discount) as NUMD"),
                    DB::Raw("SUM(" . $tbl1 . ".quantity) as NUMQ"),
                    DB::Raw("SUM(" . $tbl1 . ".price) as NUMP"),
                    DB::Raw("SUM(" . $tbl1 . ".saleprice) as NUMSP"),
                    "tbl1.created_at",
                ])
                ->orderby($MstclassTBL . ".Class", "ASC")
                ->groupby($MstclassTBL . ".ClassKey")
                ->get();
            $this->_DATA['products'] = [];
            foreach ($products as $key => $value) {
                $value["factorys"]         = $order->factorysByProduct($value->ClassKey);
                $value["details"]          = $order->quotation->detailsByproduct($value->ClassKey)->get();
                $this->_DATA['products'][] = $value;
            }
            $this->_DATA['OtherDownload1'] = OtherProductDownloads::where([
                ["quotation_id", "=", $quotation->id],
                ["type", "=", 1],
            ])->orderby("id", "DESC")->first();
            $this->_DATA['OtherDownload2'] = OtherProductDownloads::where([
                ["quotation_id", "=", $quotation->id],
                ["type", "=", 2],
            ])->orderby("id", "DESC")->first();
            $order["products"]            = $products;
            $this->_DATA['Otherproducts'] = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
            
            $person_in_charge = \App\Http\Models\Users::find($order['person_in_charge']);
            $order['person_in_charge']  = @$person_in_charge->first_name . ' ' .  @$person_in_charge->last_name;
            $this->_DATA['order']         = $order;
            
            $this->_DATA['status']        = $status;
            $this->_DATA['id']            = $id;
            
            $m                            = \App\Http\Models\WebConfigs::where("key", "=", "ClassTax")->first();
            $this->_DATA["rate"]          = \App\Http\Models\Mstclass::where("Class", "=", $m->value)->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
            $this->_DATA['internal'] 	  = \App\Http\Models\FactoryProductManufacturing::where('code_works','=',@$order->order_number)->orderby("id","asc")->get();
            $this->_DATA['external'] 	  = \App\Http\Models\PurchaseFeeOutsideNew::where('building_code','=',@$order->order_number)->orderby("id","asc")->get();
            return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
        } else {
            return Redirect(route($this->_ROUTE_FIX . ".index"));
        }

    }
    public function DesignRequest($orderID)
    {
        $order              = Orders::find($orderID);
        $download           = new OrderDownloads();
        $download->order_id = $order->id;
        $download->user_id  = $this->_USER->id;
        $download->save();
        $name = $this->getLangLableValue('[_design_request_]');
        return Excel::download(new RequestDesignExport($order),$name ."-". $order->order_number . '.xlsx');
    }
    public function dowloadQuotation($orderID, $productID)
    {
        $order   = Orders::find($orderID);
        $m       = \App\Http\Models\WebConfigs::where('key', '=', 'ClassProduct')->first();
        $product = \App\Http\Models\Mstclass::where([
            ["ClassKey", "=", $productID],
            ["Class", "=", $m->value],
        ])->first();
        $quotation              = $order->quotation;
        $name                   = $quotation->quotation_number . '-' . $product->ClassFullName;
        $download               = new QuotationDownloads();
        $download->user_id      = $this->_USER->id;
        $download->order_id     = $order->id;
        $download->quotation_id = $quotation->id;
        $download->product_id   = $product->ClassKey;
        $download->save();
        $name = $this->getLangLableValue('[_quotation_]');
        // return Excel::download(new ProductionRequirements($order, $product, $quotation), $product->ClassFullName ."-". $order->order_number . '.xls');
        
        return \Response::download(public_path('uploads/excels/file' . $detailID . '.xlsx'), $name . '.xlsx');
    }

    public function dowloadOtherQuotation($orderID, $detailID)
    {
        $order              = Orders::find($orderID);
        $name               = $detailID == 1 ? "Đơn xin mua vật tư, linh kiện các loại" : "Đơn xin mua hàng từ nhà cung cấp";
        $download           = new OtherProductDownloads();
        $download->user_id  = $this->_USER->id;
        $download->order_id = $order->id;
        $download->type     = $detailID;
        $download->save();
        if ($detailID == 1) {
            return Excel::download(new SuppliesExport($order), $name . '.xlsx');
        }
        return \Response::download(public_path('uploads/excels/file' . $detailID . '.xlsx'), $name . '.xlsx');
    }
    public function startorder($id)
    {
        $order = Orders::find($id);
        if ($order) {
            $m      = \App\Http\Models\WebConfigs::where('key', '=', 'QuotaitionID')->first();
            $status = $this->getListStatusByModels()->where("options", "=", 3)->first();
            if ($status->id == $order->status_id) {
                $status           = $this->getListStatusByModels()->where("options", "=", 4)->first();
                $order->status_id = $status->id;
                $order->save();
                return Redirect(route($this->_ROUTE_FIX . ".status", ['id' => $status->id]));
            } else {
                return Redirect(route($this->_ROUTE_FIX . ".index"));
            }
        } else {
            return Redirect(route($this->_ROUTE_FIX . ".index"));
        }
    }
    public function getUsers () {
        $data    = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $Users = \App\Http\Models\Users::
		// Set tam 100: 2019.09.23
        select(['users.*',DB::Raw('(count(orders.id) + 100) as numberOrder')])
        ->leftJoin('orders', function($join) {
          $join->on('users.id', '=', 'orders.person_in_charge');
        })
        ->groupby('users.id')
        ->get();
        $data['data']   = $Users;
        $data["status"] = 1;
        return \Response::json($data); // tam thoi, xoa di 100 sau nay di giup
    }

    public function dowload_export_order($id,Request $request){

    }

    public function winning_bidding() {
        $order_id = 3;
        $order = \App\Http\Models\Orders::find($order_id);
        $this->_DATA['order'] = $order;
        $this->_DATA['contract'] = $order->contract;
        $this->_DATA['quotation']= $order->contract->order->quotation;
        $this->_DATA['customer']  = $order->quotation->customer;
        $this->_DATA['construction'] = $order->quotation->construction;
        return view($this->_VIEW . ".winning_bidding", $this->_DATA);
    }
    public function getconstructions()
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["data"]    = \App\Http\Models\Constructions::roleStatus()->get()->toArray();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function uploadRequest (Request $request){

        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $key => $value) {
                if (!file_exists('uploads/orders/')) {
                    mkdir('uploads/orders/', 0777, true);
                }
                $file    = $value;
                $path    = $file->move('uploads/orders/',uniqid() . '-' . $file->getClientOriginalName());
                if($request->product_id){
                    $n = new \App\Http\Models\UploadDetailRequests();
                    $n->path = "/".$path;
                    $n->order_id = $request->order_id;
                    $n->quotation_id = $request->quotation_id;
                    $n->product_id = $request->product_id;
                    $n->name = $file->getClientOriginalName();
                    $n->save();
                }else{
                    $n = new \App\Http\Models\UploadRequests();
                    $n->path = "/".$path;
                    $n->order_id = $request->order_id;
                    $n->quotation_id = $request->quotation_id;
                    $n->name = $file->getClientOriginalName();
                    $n->save();
                }
                
            }
            
        }
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function ExportRevenueSlip($id, $lang = 2){
        $order = Orders::find($id);
        $quotation = $order->quotation;
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", 'revenue-slip')->first();
        if($ExcelTemplate){
            $name = $ExcelTemplate->language($lang)->name;
        }else{
            $name = $this->getLangLableValue('[_revenue_slip_]');
        }
        return Excel::download(new OrderRevenueSlipExports($quotation, $lang), $name.'-'.$order->order_number . "" . '.xlsx');
    }
    public function revenueView ($id){
        $order = Orders::find($id);
        $data  = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        if($order && $order->status->options == 5){
            $quotation = $order->quotation;
            $lang      = $this->_LANG_ID;
            $tbl1  = QuotationDetails::getTableName();
            $tbl2  = Quotations::getTableName();
            $tbl4  = Mstclass::getTableName();
            $tbl3  = Mstitem::getTableName();
            $tbl5  = QuotationDetailItems::getTableName();
            $m     = WebConfigs::where('key', '=', 'ClassProduct')->first();
            $products = Quotations::join($tbl1, $tbl1 . ".quotation_id", "=", $tbl2 . ".id")
            ->join($tbl4, $tbl4 . ".ClassKey", "=", $tbl1 . ".product_id")
            ->join($tbl5, $tbl5 . ".detail_id", "=", $tbl1 . ".id")
            ->join($tbl3, $tbl3 . ".ItemId", "=", $tbl5 . ".item_id")
            ->leftjoin("mstfactoryitem", "mstfactoryitem.FactoryCode", "=", $tbl3 . ".FactoryCode")
            ->leftjoin("order_revenues",function($join) use($tbl4,$tbl1,$m,$quotation,$order){
            	$join->on('order_revenues.quotation_id', '=', 'quotations.id')
            	->on("order_revenues.quotation_id","=",$tbl1.".quotation_id")
            	->on("order_revenues.product_id","=",$tbl1.".product_id")
            	->where([
            		["order_revenues.order_id","=",$order->id]
            	]);
            })
            ->where(
                [
                    [$tbl4 . ".Class", "=", $m->value],
                    [$tbl1 . ".quotation_id", "=", $quotation->id],
                    [$tbl5 . ".is_product", "=", 1],
                ]
            )
            ->select([
            	'order_revenues.*',
                'mstfactoryitem.FactoryName',
                $tbl3 . '.ItemName',
                $tbl5 . '.not_round_price as price',
                $tbl1 . '.installfee',
                $tbl1 . '.inlandfreightfee',
                $tbl1 . '.productprice',
                $tbl1 . '.code',
                $tbl4 . ".*",
                DB::Raw("SUM(" . $tbl1 . ".quantity) as Squantity,
                    SUM(" . $tbl1 . ".saleprice) as Ssaleprice,
                    SUM(" . $tbl1 . ".price) as Sprice,
                    SUM(" . $tbl1 . ".discount) as Sdiscount,
                    SUM(" . $tbl1 . ".installfee) as Sinstallfee,
                    SUM(" . $tbl1 . ".inlandfreightfee) as Sinlandfreightfee,
                    SUM(" . $tbl1 . ".installationqsmini) as Sinstallationqsmini,
                    SUM(" . $tbl1 . ".productprice) as Sproductprice,
                    SUM(" . $tbl1 . ".total) as Stotal,
                    (" . $tbl5 . ".width * " . $tbl5 . ".height)/1000000 AS Acreage"
                ),
            ])
            ->orderby($tbl4 . ".Class", "ASC")
            ->groupby($tbl4 . ".ClassKey")
            ->get();
            $order->user_change          = @$order->userchange->first_name . ' ' . @$order->userchange->last_name;
            $order->customer_code        = @$quotation->customer->code;
            $order->owner                = @$quotation->customer->owner;
            $order->authorized_name      = @$quotation->customer->authorized_name;
            $order->quotation_number     = @$quotation->quotation_number;
            $order->construction_name    = @$order->construction->name;
            $order->construction_address = @$order->construction->address;
            $order->products             = @$products;
            $order->quotation            = @$quotation;
            $data['data']['order']       = @$order;
            $data["status"] = 1;
        }
        return \Response::json($data);  
    }
    public function revenueUpdate ($id, Request $request){
        $products = $request->products;
        $order = Orders::find($id);
        if($products && $order){
        	$quotation = $order->quotation;
        	$listColums = $this->_GetTableColumns(\App\Http\Models\OrderRevenues::getTableName());
        	foreach ($products as $key => $value) {
        		$revenue = null;
        		if(!@$value["id"]){
        			$revenue = new \App\Http\Models\OrderRevenues();
        			$revenue->order_id = $order->id;
        			$revenue->quotation_id = $quotation->id;
        			$revenue->product_id = $value['ClassKey'];
        		}else{
        			$revenue = \App\Http\Models\OrderRevenues::find($value["id"]);
        		}
        		if ($listColums) {
        			foreach ($listColums as $keyTBL => $valueTBL) {
		                if ($valueTBL != "id") {
		                    if ($valueTBL != "product_id" && $valueTBL != "quotation_id" && $valueTBL != "created_at" && $valueTBL != "updated_at" && $valueTBL != "order_id") {
		                        $revenue->{$valueTBL} = @$value[$valueTBL];
		                    }
		                }
		            } 
        		}
        		$revenue->save();
        	}
        }
    }
}
