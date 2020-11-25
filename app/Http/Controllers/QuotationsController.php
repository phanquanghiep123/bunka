<?php
namespace App\Http\Controllers;

use App\Exports\DownloadSpecialQuotation;
use App\Exports\OrderReceiptExport;
use App\Exports\ProductionRequirements;
use App\Exports\QuotationExport;
use App\Exports\QuotationMerge;
use App\Exports\SuppliesExport;
use App\Http\Cores\BackendController;
use App\Http\Models\Branchs;
use App\Http\Models\calculatePrice;
use App\Http\Models\Languages;
use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\OrderDownloads;
use App\Http\Models\OtherProductDownloads;
use App\Http\Models\QuotationAllowChanges;
use App\Http\Models\QuotationDetailItems;
use App\Http\Models\QuotationDetailOtherItems;
use App\Http\Models\QuotationDetails;
use App\Http\Models\QuotationDownloads;
use App\Http\Models\QuotationMerges;
use App\Http\Models\QuotationNos;
use App\Http\Models\QuotationOtherDetails;
use App\Http\Models\QuotationRates;
use App\Http\Models\Quotations;
use App\Http\Models\QuotationWinRate;
use App\Http\Models\Status;
use App\Http\Models\Users;
use App\Http\Models\WebConfigs;
use DB;
use Excel;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class QuotationsController extends BackendController
{

    public $rootClass = [];
    public $notClones = [
        "id", "created_at", "updated_at",
    ];
    public $html_tress = "";
    public function __construct()
    {
        $this->_ROLNAMES['view'] = array_merge($this->_ROLNAMES['view'], [
            "getitemsproduct",
            "getpriceitemproduct",
            "gettotalproduct",
            'reloaditems',
            "customer",
            "rate",
            "adddetail",
            "deleteproduct",
            "deleteitemproduct",
            "deleteitemotherproduct",
            "deleteotherproduct",
            "getcustomers",
            "getconstructions",
            "getbranchs",
            "getareas",
            "viewtree",
            "status",
            "datatable",
            "datatablestatus",
            "createdorder",
            "copy",
            'getstatus',
            'view',
            'export',
            'reversion',
            'exportreceipt',
            'downloadSpecial',
            'viewreversion',
            'QuotationSetMerge',
            'downloadmerge',
            'getreversion',
            "DesignRequest",
            "dowloadQuotation",
            "dowloadOtherQuotation",
            'salesman',
        ]);
        parent::__construct();
        $this->_TABLE               = "quotations";
        $this->_VIEW                = "quotations";
        $this->_NAME                = "quotations";
        $this->_ROUTE_FIX           = "quotations";
        $this->_DATA["_PAGETITLE"]  = "_manage_quotations_";
        $this->_ADDURL              = route($this->_ROUTE_FIX . ".create");
        $this->rootClass['product'] = 1;
        $this->rootClass["rate"]    = 2;
        $this->rootClass["tax"]     = 3;
        $m                          = WebConfigs::where('key', '=', 'OrDerID')->first();
        $this->OrDerID              = 0;
        if ($m) {
            $this->OrDerID = $m->value;
        }

    }
    public function index(Builder $builder)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_quotation_number_', 'data' => 'quotation_number', 'name' => 'quotation_number', 'responsivePriority' => 2],
            //['title' => '_group_', 'data' => 'group', 'orderable' => false, 'name' => 'group', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '[_reversion_]', 'data' => 'reversion', 'orderable' => false, 'name' => 'reversion', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_project_', 'data' => 'project', 'name' => 'project', 'responsivePriority' => 2],
            ['title' => '_customer_', 'data' => 'customer.authorized_name', 'name' => 'customer.authorized_name', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_area_', 'data' => 'area.name', 'name' => 'area.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_branch_', 'data' => 'branch.name', 'name' => 'branch.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_START_DATE_', 'data' => 'date_start', 'name' => 'date_start'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_total_', 'data' => 'total', 'name' => 'total', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_status_', 'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA["branchs"] = Branchs::get();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function datatable(Request $request)
    {
        $statusAfter                   = $this->getListStatusOnSuccess();
        $this->_DATA['root_status_id'] = $statusAfter->id;
        $query                         = Quotations::where([
            ['index_reversion', '=', 1],
            ['is_delete', '=', 0],
        ])->with(['branch', 'status', 'status.status_name', 'customer', 'area'])
            ->select('quotations.*')
            ->groupby('quotations.id');
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
        /*->editColumn('group',
        function (Quotations $quotation) {
        return '<a class="treeview" href="' . route($this->_ROUTE_FIX . ".viewtree", $quotation->id) . '" data-id="' . $quotation->id . '"><i class="mdi mdi-share-variant" data-name="mdi-share-variant"></i></a>';
        }
        )*/
            ->editColumn('reversion',
                function (Quotations $quotation) {
                    if ($quotation->reversion > 0) {
                        return '<a viewreversion class="view-reversion" href="javascript:;" data-id="' . $quotation->id . '"><i class="menu-icon mdi mdi-file-tree" data-name="mdi mdi-file-tree">' . ($quotation->reversion + 1) . '</i></a> | <a class="treeview" href="' . route($this->_ROUTE_FIX . ".viewtree", $quotation->id) . '" data-id="' . $quotation->id . '"><i class="mdi mdi-share-variant" data-name="mdi-share-variant"></i></a>';
                    } else {
                        return ($quotation->reversion + 1);
                    }

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
            ->editColumn('Actions',
                function (Quotations $quotation) {
                    $this->_DATA['id']     = $quotation->id;
                    $this->_DATA['status'] = $quotation->status;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->project) {
                    $query->where('project', 'like', "%" . $request->project . "%");
                }
                if ($request->customer) {
                    $query->join("customers", "customers.id", "=", "quotations.customer_id");
                    $query->where('customers.authorized_name', 'like', "%" . $request->customer . "%");
                }
                if ($request->from_date) {
                    $from_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->from_date)));
                    $query->where('quotations.created_at', '>=', $from_date);
                }
                if ($request->to_date) {
                    $to_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->to_date)));
                    $query->where('quotations.created_at', '<=', $to_date);
                }

                if (@$request->branch === null) {
                    $query->where('quotations.branch_id', '=', "" . $this->_USER->branch_id . "");
                } else if (@$request->branch !== 0 && @$request->branch !== '0') {
                    $query->where('quotations.branch_id', '=', "" . $request->branch . "");
                }

                if ($request->salesman) {
                    $query->where('user_created', $request->salesman);
                }
            })
            ->make(true);

    }
    public function status($id, Builder $builder)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => '_quotation_number_', 'data' => 'quotation_number', 'name' => 'quotation_number', 'responsivePriority' => 2],
            //['title' => '_group_', 'data' => 'group', 'orderable' => false, 'name' => 'group', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '[_reversion_]', 'data' => 'reversion', 'orderable' => false, 'name' => 'reversion', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_project_', 'data' => 'project', 'name' => 'project', 'responsivePriority' => 2],
            ['title' => '_customer_', 'data' => 'customer.authorized_name', 'name' => 'customer.authorized_name', 'responsivePriority' => 2, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_area_', 'data' => 'area.name', 'name' => 'area.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_branch_', 'data' => 'branch.name', 'name' => 'branch.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_START_DATE_', 'data' => 'date_start', 'name' => 'date_start'],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_total_', 'data' => 'total', 'name' => 'total', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text().formatPrice()'],
            ['title' => '_status_', 'data' => 'status.status_name.name', 'name' => 'status.status_name.name', 'responsivePriority' => 3, 'render' => '$("<div />").html(data).text()'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatablestatus', $id),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA["branchs"] = Branchs::get();
        return view($this->_VIEW . ".index", $this->_DATA);
    }

    public function datatablestatus(Request $request, $id)
    {
        $statusAfter                   = $this->getListStatusOnSuccess();
        $this->_DATA['root_status_id'] = $statusAfter->id;
        $query                         = Quotations::where([
            ['index_reversion', '=', 1],
            ['is_delete', '=', 0],
        ])->with(['branch', 'status', 'status.status_name', 'customer', 'area'])
            ->select('quotations.*')
            ->where("quotations.status_id", "=", $id)
            ->groupby('quotations.id');

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
            ->editColumn('reversion',
                function (Quotations $quotation) {
                    if ($quotation->reversion > 0) {
                        return '<a viewreversion class="view-reversion" href="javascript:;" data-id="' . $quotation->id . '"><i class="menu-icon mdi mdi-file-tree" data-name="mdi mdi-file-tree">' . ($quotation->reversion + 1) . '</i></a> | <a class="treeview" href="' . route($this->_ROUTE_FIX . ".viewtree", $quotation->id) . '" data-id="' . $quotation->id . '"><i class="mdi mdi-share-variant" data-name="mdi-share-variant"></i></a>';
                    } else {
                        return ($quotation->reversion + 1);
                    }

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
            ->editColumn('Actions',
                function (Quotations $quotation) {
                    $this->_DATA['id']     = $quotation->id;
                    $this->_DATA['status'] = $quotation->status;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->project) {
                    $query->where('project', 'like', "%" . $request->project . "%");
                }
                if ($request->customer) {
                    $query->join("customers", "customers.id", "=", "quotations.customer_id");
                    $query->where('customers.authorized_name', 'like', "%" . $request->customer . "%");
                }
                if ($request->from_date) {
                    $from_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->from_date)));
                    $query->where('quotations.created_at', '>=', $from_date);
                }
                if ($request->to_date) {
                    $to_date = date('Y-m-d', strtotime(str_replace('/', '-', $request->to_date)));
                    $query->where('quotations.created_at', '<=', $to_date);
                }

                if (@$request->branch === null) {
                    $query->where('quotations.branch_id', '=', "" . $this->_USER->branch_id . "");
                } else if (@$request->branch !== 0 && @$request->branch !== '0') {
                    $query->where('quotations.branch_id', '=', "" . $request->branch . "");
                }

                if ($request->salesman) {
                    $query->where('user_created', $request->salesman);
                }
            })
            ->make(true);
    }
    public function viewtree($id)
    {
        $quotation      = Quotations::find($id);
        $quotations     = Quotations::where("reversion_root_id", "=", $quotation->reversion_root_id)->get();
        $data           = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["status"] = 1;
        $data['data']   = '<div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">View Group ' . $quotation->quotation_no . '</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-12 grid-margin">
                        <div class="card">
                            <div class="card-body">
                            <table id="price-before" class="table table-bordered dt-responsive nowrap" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>_quotation_number_</th>
                                        <th>_customer_</th>
                                        <th>_created_at_</th>
                                        <th>_updated_at_</th>
                                        <th>_dowload_quotation_</th>
                                    </tr>
                                </thead>
                                <tbody>' . $this->get_html_tree($quotations, 0) . '</tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>';
        return view("layouts.translate", ["data" => $data]);
    }
    public function copy($id)
    {
        $quotation = Quotations::find($id);
        if ($quotation == null) {
            Redirect(route($this->_ROUTE_FIX . ".index"));
        }
        $MstclassTBL                  = Mstclass::getTableName();
        $MstitemTBL                   = Mstitem::getTableName();
        $QuotationDetailsTBL          = QuotationDetails::getTableName();
        $QuotationDetailItemsTBL      = QuotationDetailItems::getTableName();
        $QuotationDetailOtherItemsTBL = QuotationDetailOtherItems::getTableName();
        $NQuotationOtherDetailsTBL    = QuotationOtherDetails::getTableName();
        $Qproducts                    = @Mstclass::
            join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
            ->where(
                [
                    [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                    [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                ]
            )
            ->select([
                $MstclassTBL . ".*",
            ])
            ->orderby($MstclassTBL . ".Class", "ASC")
            ->groupby($MstclassTBL . ".ClassKey")
            ->get();
        //clone quotation;
        $listColums = $this->_GetTableColumns($quotation->getTable());
        if ($listColums) {
            $Nquotation = new Quotations();
            foreach ($listColums as $keyTBL => $valueTBL) {
                if ($valueTBL != "id") {
                    if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                        $Nquotation->{$valueTBL} = $quotation->{$valueTBL};
                    }
                }
            }
            $branch       = Branchs::find($quotation->branch_id);
            $Y            = date("Y");
            $Y            = substr($Y, strlen($Y) - 1);
            $quotation_no = new QuotationNos();
            $quotation_no->save();
            $No = $quotation_no->id;
            for ($i = 1; $i < 3; $i++) {
                if (strlen($No) < 3) {
                    $No = '0' . $No;
                }
            }
            $name                         = "B" . $branch->short_name . '-' . $Y . '-' . $No;
            $Nquotation->quotation_number = $name;
            $Nquotation->quotation_no_id  = $quotation_no->id;
            $statusAfter                  = $this->getListStatusByModels()->where("options", '=', '0')->first();
            $Nquotation->status_id        = $statusAfter->id;
            $Nquotation->save();

            if ($Nquotation->id) {
                //clone quotation_detail
                $getDetails = QuotationDetails::where("quotation_id", "=", $quotation->id)->get();
                if ($getDetails->isNotEmpty()) {
                    $QuotationDetailColums = $this->_GetTableColumns($QuotationDetailsTBL);
                    if ($QuotationDetailColums) {
                        foreach ($getDetails as $key => $value) {
                            $NQuotationDetail = new QuotationDetails();
                            $OQuotationDetail = $value;
                            foreach ($QuotationDetailColums as $keyTBL => $valueTBL) {
                                if (!in_array($valueTBL, $this->notClones)) {
                                    if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                        $NQuotationDetail->{$valueTBL} = $OQuotationDetail->{$valueTBL};
                                    }
                                }
                            }

                            $NQuotationDetail->quotation_id = $Nquotation->id;
                            $NQuotationDetail->save();
                            if ($NQuotationDetail->id) {
                                //clone quotation_detail_items
                                $QuotationDetailItems = QuotationDetailItems::where("detail_id", "=", $OQuotationDetail->id)->get();
                                if ($QuotationDetailItems->isNotEmpty()) {
                                    $QuotationDetailItemColums = $this->_GetTableColumns($QuotationDetailItemsTBL);
                                    if ($QuotationDetailItemColums) {
                                        foreach ($QuotationDetailItems as $key1 => $value1) {
                                            $NQuotationDetailItem = new QuotationDetailItems();
                                            $OQuotationDetailItem = $value1;
                                            foreach ($QuotationDetailItemColums as $keyTBL => $valueTBL) {
                                                if (!in_array($valueTBL, $this->notClones)) {
                                                    if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                                        $NQuotationDetailItem->{$valueTBL} = $OQuotationDetailItem->{$valueTBL};
                                                    }
                                                }
                                            }
                                            $NQuotationDetailItem->detail_id = $NQuotationDetail->id;
                                            $NQuotationDetailItem->save();
                                        }
                                    }
                                }

                                //!clone quotation_detail_items

                                $QuotationDetailOtherItems = QuotationDetailOtherItems::where("detail_id", "=", $OQuotationDetail->id)->get();

                                if ($QuotationDetailOtherItems->isNotEmpty()) {
                                    $QuotationDetailOtherItemColums = $this->_GetTableColumns($QuotationDetailOtherItemsTBL);
                                    if ($QuotationDetailOtherItemColums) {
                                        foreach ($QuotationDetailOtherItems as $key2 => $value2) {
                                            $NQuotationDetailOtherItem = new QuotationDetailOtherItems();
                                            $OQuotationDetailOtherItem = $value2;
                                            foreach ($QuotationDetailOtherItemColums as $keyTBL => $valueTBL) {
                                                if (!in_array($valueTBL, $this->notClones)) {
                                                    if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                                        $NQuotationDetailOtherItem->{$valueTBL} = $OQuotationDetailOtherItem->{$valueTBL};
                                                    }
                                                }
                                            }
                                            $NQuotationDetailOtherItem->detail_id = $NQuotationDetail->id;
                                            $NQuotationDetailOtherItem->save();
                                        }

                                    }

                                }

                                //clone quotation_detail_other_items
                                //!clone quotation_detail_other_items
                            }
                        }
                    }
                }
                //!clone quotation_detail
                //clone quotation_detail_other
                $getOtherDetails = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
                if ($getOtherDetails->isNotEmpty()) {
                    foreach ($getOtherDetails as $key3 => $value3) {
                        $NQuotationOtherDetails     = new QuotationOtherDetails();
                        $QuotationOtherDetailColums = $this->_GetTableColumns($NQuotationOtherDetailsTBL);
                        $OQuotationOtherDetails     = $value3;
                        foreach ($QuotationOtherDetailColums as $keyTBL => $valueTBL) {
                            if (!in_array($valueTBL, $this->notClones)) {
                                if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                    $NQuotationOtherDetails->{$valueTBL} = $OQuotationOtherDetails->{$valueTBL};
                                }
                            }
                        }
                        $NQuotationOtherDetails->quotation_id = $Nquotation->id;
                        $NQuotationOtherDetails->save();
                    }
                }

                //!clone quotation_detail_other
            }
            $getListStatusBefore = $this->getListStatusByModels()->where("options", "=", '0')->first();
            if ($getListStatusBefore) {
                $Nquotation->status_id = $getListStatusBefore->id;
            }
            $Nquotation->reversion_pid     = 0;
            $Nquotation->reversion_root_id = $Nquotation->id;
            $Nquotation->index_reversion   = 1;
            $Nquotation->reversion         = 0;
            $Nquotation->path_reversion    = '/0/' . $Nquotation->id . '/';
            $Nquotation->pid               = $quotation->id;
            $Nquotation->path              = $quotation->path . $Nquotation->id . '/';
            $Nquotation->save();
            $QuotationAllowChange               = new QuotationAllowChanges();
            $QuotationAllowChange->user_create  = $this->_USER->id;
            $QuotationAllowChange->user_id      = $this->_USER->id;
            $QuotationAllowChange->quotation_id = $Nquotation->id;
            $QuotationAllowChange->save();
            $users = Users::where("id", "!=", $this->_USER->id)->get();
            foreach ($users as $keyuser => $valueuser) {
                if ($valueuser->hasTypeUserForQuotation() == 1) {
                    $QuotationAllowChange               = new QuotationAllowChanges();
                    $QuotationAllowChange->user_create  = $this->_USER->id;
                    $QuotationAllowChange->user_id      = $valueuser->id;
                    $QuotationAllowChange->quotation_id = $Nquotation->id;
                    $QuotationAllowChange->save();
                }
            }
        }
        //!clone quotation;
        return Redirect(route($this->_ROUTE_FIX . ".edit", $Nquotation->id));
    }
    public function reversion($id)
    {
        $quotation = Quotations::find($id);
        if ($quotation == null) {
            Redirect(route($this->_ROUTE_FIX . ".index"));
        }
        $MstclassTBL                  = Mstclass::getTableName();
        $MstitemTBL                   = Mstitem::getTableName();
        $QuotationDetailsTBL          = QuotationDetails::getTableName();
        $QuotationDetailItemsTBL      = QuotationDetailItems::getTableName();
        $QuotationDetailOtherItemsTBL = QuotationDetailOtherItems::getTableName();
        $NQuotationOtherDetailsTBL    = QuotationOtherDetails::getTableName();
        $Qproducts                    = @Mstclass::
            join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
            ->where(
                [
                    [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                    [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                ]
            )
            ->select([
                $MstclassTBL . ".*",
            ])
            ->orderby($MstclassTBL . ".Class", "ASC")
            ->groupby($MstclassTBL . ".ClassKey")
            ->get();
        $statusAfter = $this->getListStatusByModels()->wherein("options", ['2', '3'])->get();
        $statusAllow = [];
        foreach ($statusAfter as $key => $value) {
            $statusAllow[] = $value->id;
        }

        if (in_array($quotation->status_id, $statusAllow)) {
            //clone quotation;
            $listColums = $this->_GetTableColumns($quotation->getTable());

            if ($listColums) {
                $Nquotation = new Quotations();
                foreach ($listColums as $keyTBL => $valueTBL) {
                    if ($valueTBL != "id") {
                        if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                            @$Nquotation->{$valueTBL} = @$quotation->{$valueTBL};
                        }
                    }
                }

                $statusAfter  = $this->getListStatusByModels()->where("options", '=', '0')->first();
                $quotationAll = Quotations::where("reversion_root_id", '=', $quotation->reversion_root_id)->orderby("reversion", "DESC")->first();
                Quotations::where('reversion_root_id', '=', $quotation->reversion_root_id)->update([
                    'index_reversion' => 0,
                ]);
                $Nquotation->reversion_pid   = $quotation->id;
                $Nquotation->index_reversion = 1;
                $Nquotation->reversion       = $quotationAll->reversion + 1;
                $Nquotation->status_id       = $statusAfter->id;
                $Nquotation->save();

                if ($Nquotation->id) {
                    //clone quotation_detail
                    $getDetails = QuotationDetails::where("quotation_id", "=", $quotation->id)->get();
                    if ($getDetails->isNotEmpty()) {
                        $QuotationDetailColums = $this->_GetTableColumns($QuotationDetailsTBL);
                        if ($QuotationDetailColums) {
                            foreach ($getDetails as $key => $value) {
                                $NQuotationDetail = new QuotationDetails();
                                $OQuotationDetail = $value;
                                foreach ($QuotationDetailColums as $keyTBL => $valueTBL) {
                                    if (!in_array($valueTBL, $this->notClones)) {
                                        if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                            $NQuotationDetail->{$valueTBL} = $OQuotationDetail->{$valueTBL};
                                        }
                                    }
                                }

                                $NQuotationDetail->quotation_id = $Nquotation->id;
                                $NQuotationDetail->save();
                                if ($NQuotationDetail->id) {
                                    //clone quotation_detail_items
                                    $QuotationDetailItems = QuotationDetailItems::where("detail_id", "=", $OQuotationDetail->id)->get();
                                    if ($QuotationDetailItems->isNotEmpty()) {
                                        $QuotationDetailItemColums = $this->_GetTableColumns($QuotationDetailItemsTBL);
                                        if ($QuotationDetailItemColums) {
                                            foreach ($QuotationDetailItems as $key1 => $value1) {
                                                $NQuotationDetailItem = new QuotationDetailItems();
                                                $OQuotationDetailItem = $value1;
                                                foreach ($QuotationDetailItemColums as $keyTBL => $valueTBL) {
                                                    if (!in_array($valueTBL, $this->notClones)) {
                                                        if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                                            $NQuotationDetailItem->{$valueTBL} = $OQuotationDetailItem->{$valueTBL};
                                                        }
                                                    }
                                                }
                                                $NQuotationDetailItem->detail_id = $NQuotationDetail->id;
                                                $NQuotationDetailItem->save();
                                            }
                                        }
                                    }

                                    //!clone quotation_detail_items

                                    $QuotationDetailOtherItems = QuotationDetailOtherItems::where("detail_id", "=", $OQuotationDetail->id)->get();

                                    if ($QuotationDetailOtherItems->isNotEmpty()) {
                                        $QuotationDetailOtherItemColums = $this->_GetTableColumns($QuotationDetailOtherItemsTBL);
                                        if ($QuotationDetailOtherItemColums) {
                                            foreach ($QuotationDetailOtherItems as $key2 => $value2) {
                                                $NQuotationDetailOtherItem = new QuotationDetailOtherItems();
                                                $OQuotationDetailOtherItem = $value2;
                                                foreach ($QuotationDetailOtherItemColums as $keyTBL => $valueTBL) {
                                                    if (!in_array($valueTBL, $this->notClones)) {
                                                        if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                                            $NQuotationDetailOtherItem->{$valueTBL} = $OQuotationDetailOtherItem->{$valueTBL};
                                                        }
                                                    }
                                                }
                                                $NQuotationDetailOtherItem->detail_id = $NQuotationDetail->id;
                                                $NQuotationDetailOtherItem->save();
                                            }

                                        }

                                    }

                                    //clone quotation_detail_other_items
                                    //!clone quotation_detail_other_items
                                }
                            }
                        }
                    }
                    //!clone quotation_detail
                    //clone quotation_detail_other
                    $getOtherDetails = QuotationOtherDetails::where("quotation_id", "=", $quotation->id)->get();
                    if ($getOtherDetails->isNotEmpty()) {
                        foreach ($getOtherDetails as $key3 => $value3) {
                            $NQuotationOtherDetails     = new QuotationOtherDetails();
                            $QuotationOtherDetailColums = $this->_GetTableColumns($NQuotationOtherDetailsTBL);
                            $OQuotationOtherDetails     = $value3;
                            foreach ($QuotationOtherDetailColums as $keyTBL => $valueTBL) {
                                if (!in_array($valueTBL, $this->notClones)) {
                                    if ($valueTBL != "created_at" && $valueTBL != "updated_at") {
                                        $NQuotationOtherDetails->{$valueTBL} = $OQuotationOtherDetails->{$valueTBL};
                                    }
                                }
                            }
                            $NQuotationOtherDetails->quotation_id = $Nquotation->id;
                            $NQuotationOtherDetails->save();
                        }
                    }

                    //!clone quotation_detail_other
                }
                $getListStatusBefore = $this->getListStatusByModels()->where("options", "=", '0')->first();
                if ($getListStatusBefore) {
                    $Nquotation->status_id = $getListStatusBefore->id;
                }
                $Nquotation->path_reversion = $quotation->path_reversion . $Nquotation->id . '/';
                $Nquotation->save();
                $QuotationAllowChange               = new QuotationAllowChanges();
                $QuotationAllowChange->user_create  = $this->_USER->id;
                $QuotationAllowChange->user_id      = $this->_USER->id;
                $QuotationAllowChange->quotation_id = $Nquotation->id;
                $QuotationAllowChange->save();
                $users = Users::where("id", "!=", $this->_USER->id)->get();
                foreach ($users as $keyuser => $valueuser) {
                    if ($valueuser->hasTypeUserForQuotation() == 1) {
                        $QuotationAllowChange               = new QuotationAllowChanges();
                        $QuotationAllowChange->user_create  = $this->_USER->id;
                        $QuotationAllowChange->user_id      = $valueuser->id;
                        $QuotationAllowChange->quotation_id = $Nquotation->id;
                        $QuotationAllowChange->save();
                    }
                }

                $rates = QuotationRates::where("quotation_id", "=", $quotation->id)->get();
                foreach ($rates as $key => $value) {
                    $qR               = new QuotationRates();
                    $qR->quotation_id = $Nquotation->id;
                    $qR->rate_id      = $value->rate_id;
                    $qR->name         = $value->name;
                    $qR->format       = $value->format;
                    $qR->is_default   = $value->is_default;
                    $qR->value        = $value->value;
                    $qR->save();
                }
            }
            //!clone quotation;
            return Redirect(route($this->_ROUTE_FIX . ".edit", $Nquotation->id));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $quotation_no = new \App\Http\Models\QuotationNos();
        $quotation_no->save();
        $this->_DATA["quotation_no"] = $quotation_no->toArray();
        $rates                       = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->get();
        $this->_DATA["taxs"]         = [
            WebConfigs::where("key", "=", "TaxLocation")->select('*', DB::Raw("'[in_country]' as name "))->first(),
            WebConfigs::where("key", "=", "TaxForeign")->select('*', DB::Raw("'[out_country]' as name"))->first(),
            WebConfigs::where("key", "=", "NoneTax")->select('*', DB::Raw("'[none_tax]' as name"))->first(),
        ];
        $this->_DATA["products"]      = Mstclass::where("Class", "=", $this->rootClass["product"])->orderby("Class", "ASC")->get()->toArray();
        $this->_DATA["max_quotation"] = \App\Http\Models\Quotations::where("user_created", "=", $this->_USER->id)->orderby("id", "DESC")->first();
        $quotation_index_by_sale      = 1;
        if ($this->_DATA["max_quotation"] != null) {
            $quotation_number = @$this->_DATA["max_quotation"]["quotation_number"];
            $arr_parse        = explode("-", $quotation_number);
            if (is_numeric($arr_parse[count($arr_parse) - 1])) {
                $quotation_index_by_sale = intval($arr_parse[count($arr_parse) - 1]) + 1;
            }
        }
        $this->_DATA["quotation_index_by_sale"] = $quotation_index_by_sale;

        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $this->_DATA["NotPlus"]         = [$PricePatternInlandFee->value];
        $this->_DATA["OnloadPrice"]     = [$PricePatternInstallFee->value, $PricePatternInstallationQSMini->value, $PricePatternInlandFee->value];
        $Status                         = $this->getListStatus();
        $this->_DATA["Status"]          = [];
        foreach ($Status as $key => $value) {
            $value["name"]           = $value->get_name();
            $this->_DATA["Status"][] = $value->toArray();
        }
        $branch    = \App\Http\Models\Branchs::find($this->_USER->branch_id);
        $quotation = [
            "id"            => 0,
            "products"      => [],
            "Otherproducts" => [
                [
                    'name'      => '',
                    'quantity'  => '',
                    'remarks'   => '',
                    'saleprice' => '',
                    'price'     => '',
                    'type'      => 1,
                    'WInputFlg' => 1,
                    'HInputFlg' => 1,
                    'QInputFlg' => 1,
                    'saved'     => false,
                ],
            ],
            "rate"          => @$this->_DATA["rates"][0],
            "branch"        => @$branch ? @$branch->toArray() : null,
            "date_start"    => '',
            "discount"      => 0,
            "customer"      => '',
            "construction"  => '',
            "area"          => '',
            "tax"           => @$this->_DATA["taxs"][0],
            "status"        => @$this->_DATA["Status"][0],
            "saved"         => false,
            "quotation_no"  => $quotation_index_by_sale, //$quotation_no,
            "user_id"       => $this->_USER->id,
            "winrate"       => 0,
        ];
        $langs                  = Languages::orderby("is_default", "DESC")->where("id", "!=", $this->_LANG_ID)->get()->toArray();
        $lang                   = \App\Http\Models\Languages::find($this->_LANG_ID)->toArray();
        $this->_DATA["langs"][] = $lang;
        foreach ($langs as $key => $value) {
            $this->_DATA["langs"][] = $value;
        }
        $rate_default                = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
        $quotation['rate_name']      = $rate_default->ClassName;
        $quotation['rate_value']     = 1;
        $this->_DATA["quotation"]    = $quotation;
        $this->_DATA["rate_default"] = $rate_default;
        $this->_DATA["rates"]        = [];
        foreach ($rates as $key => $value) {
            $value->Value1     = ((double) $rate_default->Value1) / ((double) $value->Value1);
            $value->is_default = 0;
            if ($value->Value2 == 1) {
                $value->is_default = 1;
            }
            $this->_DATA["rates"][] = $value;
        }
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function edit($id)
    {
        $quotation = Quotations::find($id);
        if ($quotation == null) {
            return Redirect(route("quotations.create"));
        }
        $this->_DATA['request']       = $quotation->request->first();
        $MstclassTBL                  = Mstclass::getTableName();
        $MstitemTBL                   = Mstitem::getTableName();
        $QuotationDetailsTBL          = QuotationDetails::getTableName();
        $QuotationDetailItemsTBL      = QuotationDetailItems::getTableName();
        $QuotationDetailOtherItemsTBL = QuotationDetailOtherItems::getTableName();
        $NQuotationOtherDetailsTBL    = QuotationOtherDetails::getTableName();
        $Qproducts                    = @Mstclass::
            join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
            ->where(
                [
                    [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                    [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                ]
            )
            ->select([
                $MstclassTBL . ".*",
            ])
            ->orderby($MstclassTBL . ".Class", "ASC")
            ->groupby($MstclassTBL . ".ClassKey")
            ->get();
        $quotation   = Quotations::find($id);
        $statusAfter = $this->getListStatusByModels()->wherein("options", ['2', '3'])->get();
        $statusAllow = [];
        foreach ($statusAfter as $key => $value) {
            $statusAllow[] = $value->id;
        }
        if (in_array($quotation->status_id, $statusAllow)) {
            return Redirect(route($this->_ROUTE_FIX . ".view", ["id" => $quotation->id]));
        }
        $tax     = WebConfigs::where("id", "=", $quotation->tax_id)->first();
        $OldRate = Mstclass::where(
            [
                ["Class", "=", $this->rootClass["rate"]],
                ["ClassKey", "=", $quotation->rate_id],
            ]
        )->first();
        $OldRate = $OldRate ? $OldRate->toArray() : false;
        if ($OldRate) {
            $OldRate["Value1"] = $quotation->current_rate;
        }
        $customer                       = \App\Http\Models\Customers::find($quotation->customer_id);
        $branch                         = \App\Http\Models\Branchs::find($quotation->branch_id);
        $area                           = \App\Http\Models\Areas::find($quotation->area_id);
        $construction                   = \App\Http\Models\Constructions::find($quotation->construction_id);
        $status                         = \App\Http\Models\Status::find($quotation->status_id);
        $this->_DATA["customers"]       = \App\Http\Models\Customers::roleStatus()->get()->toArray();
        $this->_DATA["rates"]           = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->get()->toArray();
        $this->_DATA['products']        = Mstclass::where("Class", "=", $this->rootClass["product"])->orderby("Class", "ASC")->get()->toArray();
        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $this->_DATA["NotPlus"]         = [$PricePatternInlandFee->value];
        $this->_DATA["OnloadPrice"]     = [$PricePatternInstallFee->value, $PricePatternInstallationQSMini->value, $PricePatternInlandFee->value];
        $Status                         = $this->getListStatus();
        $this->_DATA["Status"]          = [];
        foreach ($Status as $key => $value) {
            $value["name"]           = $value->get_name();
            $this->_DATA["Status"][] = $value->toArray();
        }
        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $products                       = [];
        foreach ($Qproducts as $key => $product) {
            $product         = $product->toArray();
            $product["list"] = [];
            $productLists    = @Mstclass::
                join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
                ->where(
                    [
                        [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                        [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                    ]
                )
                ->select([
                    $MstclassTBL . ".*",
                    $QuotationDetailsTBL . ".id",
                    $QuotationDetailsTBL . ".code",
                    $QuotationDetailsTBL . ".quantity",
                    $QuotationDetailsTBL . ".discount",
                    $QuotationDetailsTBL . ".discount1",
                    $QuotationDetailsTBL . ".discount2",
                    $QuotationDetailsTBL . ".discount_active",
                    $QuotationDetailsTBL . ".price",
                    $QuotationDetailsTBL . ".saleprice",
                    $QuotationDetailsTBL . ".other_price",
                    $QuotationDetailsTBL . ".plus_price",
                    $QuotationDetailsTBL . ".inlandfreightfee",
                    $QuotationDetailsTBL . ".installfee",
                    $QuotationDetailsTBL . ".productprice",
                ])
                ->orderby($QuotationDetailsTBL . ".id", "ASC")
                ->where($MstclassTBL . ".ClassKey", "=", $product['ClassKey'])
                ->get();
            if ($productLists) {
                foreach ($productLists as $key => $list) {
                    $detail       = $list;
                    $Mstitemclass = \App\Http\Models\Mstitemclass::getItemByClass($product['Class'], $product['ClassKey'])->get();
                    $OtherClasses = QuotationDetailOtherItems::select(['*', DB::Raw('true as saved')])->where("detail_id", "=", $detail->id)->get()->toArray();
                    $dataR        = [];
                    foreach ($Mstitemclass as $key => $value) {
                        $items          = \App\Http\Models\Mstitemclass::find($value->ItemClassId);
                        $value          = $value->toArray();
                        $value['items'] = $items->Mstitems($product['Class'], $product['ClassKey'])->get()->toArray();
                        if ($detail != null) {
                            $value['item'] = @\App\Http\Models\Mstitem::
                                join($QuotationDetailItemsTBL, $QuotationDetailItemsTBL . ".item_id", "=", $MstitemTBL . ".ItemId")
                                ->where([
                                    [$QuotationDetailItemsTBL . ".detail_id", "=", $detail->id],
                                    [$MstitemTBL . ".ItemClassId", "=", $value["ItemClassId"]],
                                ])
                                ->select([
                                    $QuotationDetailItemsTBL . ".id",
                                    $MstitemTBL . ".*",
                                    $QuotationDetailItemsTBL . ".width",
                                    $QuotationDetailItemsTBL . ".height",
                                    $QuotationDetailItemsTBL . ".quantity",
                                    $QuotationDetailItemsTBL . ".price",
                                    $QuotationDetailItemsTBL . ".saleprice",
                                ])
                                ->first();
                            $value['item'] = $value['item'] ? $value['item']->toArray() : null;
                        } else {
                            $value['item'] = null;
                        }
                        if ($value["WInputFlg"] == 1) {
                            $value["width"] = @$value['item']['width'];
                        }
                        if ($value["HInputFlg"] == 1) {
                            $value["height"] = @$value['item']['height'];
                        }
                        if ($value["QInputFlg"] == 1) {
                            $value["quantity"] = @$value['item']['quantity'];
                        }
                        $value["Q"]         = @$value['item']['quantity'];
                        $value["H"]         = @$value['item']['height'];
                        $value["W"]         = @$value['item']['width'];
                        $value["price"]     = $value['item'] ? $value['item']['price'] : 0;
                        $value["saleprice"] = $value['item'] ? $value['item']['saleprice'] : 0;
                        $value["type"]      = 0;
                        $value["saved"]     = true;
                        $dataR[]            = $value;
                    }
                    $othersClasses     = QuotationDetailOtherItems::where("detail_id", "=", $detail->id)->orderby("id", "ASC")->get();
                    $othersClasses     = $othersClasses ? $othersClasses->toArray() : null;
                    $list["Classes"]   = array_merge($dataR, $othersClasses);
                    $list              = $list->toArray();
                    $product["list"][] = $list;
                }
            }
            $Mstitemclass                   = \App\Http\Models\Mstitemclass::getItemByClass($product['Class'], $product['ClassKey'])->get();
            $dataR                          = [];
            $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
            $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
            $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
            foreach ($Mstitemclass as $key => $value) {
                $items          = \App\Http\Models\Mstitemclass::find($value->ItemClassId);
                $value          = $value->toArray();
                $value['items'] = $items->Mstitems($product['Class'], $product['ClassKey'])->get();
                if ($value['PricePattern'] == $PricePatternInstallFee->value || $value['PricePattern'] == $PricePatternInstallationQSMini->value || $value['PricePattern'] == $PricePatternInlandFee->value) {
                    $value['item'] = @$value['items'][0];
                } else {
                    $value['item'] = null;
                }
                $value["type"] = 0;
                $dataR[]       = $value;
            }
            $product['quantity']        = 1;
            $product['total']           = 0;
            $product['saved']           = false;
            $product['price']           = 0;
            $product["Classes"]         = $dataR;
            $product["discount_active"] = 0;
            $product["OtherClasses"]    = [];
            $products[]                 = $product;

        }
        $quotationNo = \App\Http\Models\QuotationNos::find($quotation->quotation_no_id);
        $quotation   = $quotation->toArray();
        $rate        = QuotationRates::
            select(['name as ClassName', 'format as ClassFullName', 'rate_id as ClassKey', 'value as Value1', 'is_default'])
            ->where(
                [
                    ["is_default", "=", 1],
                    ["quotation_id", "=", $quotation['id']],
                ])->first();
        if ($rate == null) {
            $rate_default         = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
            $rates                = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->get();
            $this->_DATA["rates"] = [];
            foreach ($rates as $key => $value) {
                $value->Value1          = ((double) $rate_default->Value1) / ((double) $value->Value1);
                $this->_DATA["rates"][] = $value;
            }
        } else {
            $rates = QuotationRates::select('name as ClassName', 'format as ClassFullName', 'rate_id as ClassKey', 'value as Value1', 'is_default')->where(
                [
                    ["quotation_id", "=", $quotation['id']],
                ])->orderby('is_default', 'DESC')->get();
            $this->_DATA["rates"] = $rates;
        }
        $quotation["rate"]            = $rate ? $rate : $rates[0];
        $quotation["status"]          = $status->toArray();
        $quotation["tax"]             = @$tax ? @$tax->toArray() : null;
        $quotation["products"]        = $products;
        $quotation["customer"]        = @$customer ? @$customer->toArray() : null;
        $quotation["quotation_no"]    = @$quotationNo ? @$quotationNo->toArray() : null;
        $quotation["branch"]          = @$branch ? @$branch->toArray() : null;
        $quotation["area"]            = @$area ? @$area->toArray() : null;
        $quotation["construction"]    = @$construction ? @$construction->toArray() : null;
        $quotation["saved"]           = false;
        $quotation["Otherproducts"]   = QuotationOtherDetails::where("quotation_id", "=", $id)->select(['*', DB::raw('1 as saved')])->get()->toArray();
        $quotation["Otherproducts"][] = [
            'name'      => '',
            'quantity'  => '',
            'remarks'   => '',
            'saleprice' => '',
            'price'     => '',
            'type'      => 1,
            'WInputFlg' => 1,
            'HInputFlg' => 1,
            'QInputFlg' => 1,
            'saved'     => false,
        ];
        $quotation["winrate"] = Quotations::find($id)->winrate->win_rate ?? 0;

        $this->_DATA["quotation"] = $quotation;
        $langs                    = Languages::orderby("is_default", "DESC")->where("id", "!=", $this->_LANG_ID)->get();
        $lang                     = \App\Http\Models\Languages::find($this->_LANG_ID);
        $this->_DATA["langs"][]   = $lang;
        foreach ($langs as $key => $value) {
            $this->_DATA["langs"][] = $value;
        }
        $this->_DATA["taxs"] = [
            WebConfigs::where("key", "=", "TaxLocation")->select('*', DB::Raw("'[in_country]' as name "))->first(),
            WebConfigs::where("key", "=", "TaxForeign")->select('*', DB::Raw("'[out_country]' as name"))->first(),
            WebConfigs::where("key", "=", "NoneTax")->select('*', DB::Raw("'[none_tax]' as name"))->first(),
        ];
        return view($this->_VIEW . ".create", $this->_DATA);
    }

    public function view($id)
    {
        $quotation = Quotations::find($id);
        if ($quotation == null) {
            return Redirect(route("quotations.create"));
        }
        $MstclassTBL                  = Mstclass::getTableName();
        $MstitemTBL                   = Mstitem::getTableName();
        $QuotationDetailsTBL          = QuotationDetails::getTableName();
        $QuotationDetailItemsTBL      = QuotationDetailItems::getTableName();
        $QuotationDetailOtherItemsTBL = QuotationDetailOtherItems::getTableName();
        $NQuotationOtherDetailsTBL    = QuotationOtherDetails::getTableName();
        $Qproducts                    = @Mstclass::
            join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
            ->where(
                [
                    [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                    [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                ]
            )
            ->select([
                $MstclassTBL . ".*",
            ])
            ->orderby($MstclassTBL . ".Class", "ASC")
            ->groupby($MstclassTBL . ".ClassKey")
            ->get();
        $quotation = Quotations::find($id);
        $tax       = null;
        if ($quotation->tax_id) {
            $tax = WebConfigs::where('id', '=', $quotation->tax_id)->first();
            if ($tax) {
                $quotation->tax_value = floatval($tax->value);
                $quotation->tax_price = ($quotation->grand_sub_total / 100) * $quotation->tax_value;
            }
        } else {
            $quotation->tax_price = 0;
        }
        $OldRate = Mstclass::where(
            [
                ["Class", "=", $this->rootClass["rate"]],
                ["ClassKey", "=", $quotation->rate_id],
            ]
        )->first();
        $OldRate = $OldRate ? $OldRate->toArray() : false;
        if ($OldRate) {
            $OldRate["Value1"] = $quotation->current_rate;
        }
        $customer     = \App\Http\Models\Customers::find($quotation->customer_id);
        $branch       = \App\Http\Models\Branchs::find($quotation->branch_id);
        $area         = \App\Http\Models\Areas::find($quotation->area_id);
        $construction = \App\Http\Models\Constructions::find($quotation->construction_id);
        $status       = \App\Http\Models\Status::find($quotation->status_id);
        $created_by   = $quotation->created_by;
        $winrate      = $quotation->winrate;

        $this->_DATA["customers"] = \App\Http\Models\Customers::roleStatus()->get()->toArray();
        $this->_DATA["rates"]     = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->get()->toArray();
        $this->_DATA["taxs"]      = Mstclass::where("Class", "=", $this->rootClass["tax"])->orderby("Class", "ASC")->get()->toArray();
        $this->_DATA['products']  = Mstclass::where("Class", "=", $this->rootClass["product"])->orderby("Class", "ASC")->get()->toArray();

        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $this->_DATA["NotPlus"]         = [$PricePatternInlandFee->value];
        $this->_DATA["OnloadPrice"]     = [$PricePatternInstallFee->value, $PricePatternInstallationQSMini->value, $PricePatternInlandFee->value];
        $Status                         = $this->getListStatus();
        $this->_DATA["Status"]          = [];
        foreach ($Status as $key => $value) {
            $value["name"]           = $value->get_name();
            $this->_DATA["Status"][] = $value->toArray();
        }
        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $products                       = [];

        foreach ($Qproducts as $key => $product) {
            $product         = $product->toArray();
            $product["list"] = [];
            $productLists    = @Mstclass::
                join($QuotationDetailsTBL, $QuotationDetailsTBL . ".product_id", '=', $MstclassTBL . ".ClassKey")
                ->where(
                    [
                        [$MstclassTBL . ".Class", "=", $this->rootClass["product"]],
                        [$QuotationDetailsTBL . ".quotation_id", "=", $quotation->id],
                    ]
                )
                ->select([
                    $MstclassTBL . ".*",
                    $QuotationDetailsTBL . ".id",
                    $QuotationDetailsTBL . ".code",
                    $QuotationDetailsTBL . ".quantity",
                    $QuotationDetailsTBL . ".discount",
                    $QuotationDetailsTBL . ".discount1",
                    $QuotationDetailsTBL . ".discount2",
                    $QuotationDetailsTBL . ".discount_active",
                    $QuotationDetailsTBL . ".price",
                    $QuotationDetailsTBL . ".saleprice",
                    $QuotationDetailsTBL . ".inlandfreightfee",
                    $QuotationDetailsTBL . ".installfee",
                    $QuotationDetailsTBL . ".productprice",
                ])
                ->orderby($QuotationDetailsTBL . ".id", "ASC")
                ->where($MstclassTBL . ".ClassKey", "=", $product['ClassKey'])
                ->get();

            if ($productLists) {
                foreach ($productLists as $key => $list) {
                    $detail       = $list;
                    $Mstitemclass = \App\Http\Models\Mstitemclass::getItemByClass($product['Class'], $product['ClassKey'])->get();
                    $OtherClasses = QuotationDetailOtherItems::where("detail_id", "=", $detail->id)->get()->toArray();
                    $dataR        = [];
                    foreach ($Mstitemclass as $key => $value) {
                        $items          = \App\Http\Models\Mstitemclass::find($value->ItemClassId);
                        $value          = $value->toArray();
                        $value['items'] = $items->Mstitems($product['Class'], $product['ClassKey'])->get()->toArray();
                        if ($detail != null) {
                            $value['item'] = @\App\Http\Models\Mstitem::
                                join($QuotationDetailItemsTBL, $QuotationDetailItemsTBL . ".item_id", "=", $MstitemTBL . ".ItemId")
                                ->where([
                                    [$QuotationDetailItemsTBL . ".detail_id", "=", $detail->id],
                                    [$MstitemTBL . ".ItemClassId", "=", $value["ItemClassId"]],
                                ])
                                ->select([
                                    $QuotationDetailItemsTBL . ".id",
                                    $MstitemTBL . ".*",
                                    $QuotationDetailItemsTBL . ".width",
                                    $QuotationDetailItemsTBL . ".height",
                                    $QuotationDetailItemsTBL . ".quantity",
                                    $QuotationDetailItemsTBL . ".price",
                                    $QuotationDetailItemsTBL . ".saleprice",
                                ])
                                ->first();
                            $value['item'] = $value['item'] ? $value['item']->toArray() : null;
                        } else {
                            $value['item'] = null;
                        }
                        if ($value["WInputFlg"] == 1) {
                            $value["width"] = @$value['item']['width'];
                        }
                        if ($value["HInputFlg"] == 1) {
                            $value["height"] = @$value['item']['height'];
                        }
                        if ($value["QInputFlg"] == 1) {
                            $value["quantity"] = @$value['item']['quantity'];
                        }
                        $value["Q"]         = @$value['item']['quantity'];
                        $value["H"]         = @$value['item']['height'];
                        $value["W"]         = @$value['item']['width'];
                        $value["price"]     = $value['item'] ? $value['item']['price'] : 0;
                        $value["saleprice"] = $value['item'] ? $value['item']['saleprice'] : 0;
                        $value["type"]      = 0;
                        $value["saved"]     = true;
                        $dataR[]            = $value;
                    }
                    $othersClasses     = QuotationDetailOtherItems::where("detail_id", "=", $detail->id)->orderby("id", "ASC")->get();
                    $othersClasses     = $othersClasses ? $othersClasses->toArray() : null;
                    $list["Classes"]   = array_merge($dataR, $othersClasses);
                    $list              = $list->toArray();
                    $product["list"][] = $list;
                }
            }
            $Mstitemclass                   = \App\Http\Models\Mstitemclass::getItemByClass($product['Class'], $product['ClassKey'])->get();
            $dataR                          = [];
            $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
            $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
            $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
            foreach ($Mstitemclass as $key => $value) {
                $items          = \App\Http\Models\Mstitemclass::find($value->ItemClassId);
                $value          = $value->toArray();
                $value['items'] = $items->Mstitems($product['Class'], $product['ClassKey'])->get();
                if ($value['PricePattern'] == $PricePatternInstallFee->value || $value['PricePattern'] == $PricePatternInstallationQSMini->value || $value['PricePattern'] == $PricePatternInlandFee->value) {
                    $value['item'] = @$value['items'][0];
                } else {
                    $value['item'] = null;
                }
                $value["type"] = 0;
                $dataR[]       = $value;
            }
            $product['quantity']        = 1;
            $product['total']           = 0;
            $product['saved']           = true;
            $product['price']           = 0;
            $product["Classes"]         = $dataR;
            $product["discount_active"] = 0;
            $product["OtherClasses"]    = [];
            $products[]                 = $product;

        }
        $rate = QuotationRates::
            select(['name as ClassName', 'format as ClassFullName', 'rate_id as ClassKey', 'value as Value1', 'is_default'])
            ->where(
                [
                    ["is_default", "=", 1],
                    ["quotation_id", "=", $quotation['id']],
                ])->first();

        if ($rate == null) {
            $rate_default         = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
            $rates                = Mstclass::where("Class", "=", $this->rootClass["rate"])->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->get();
            $this->_DATA["rates"] = [];
            foreach ($rates as $key => $value) {
                $value->Value1          = ((double) $rate_default->Value1) / ((double) $value->Value1);
                $this->_DATA["rates"][] = $value;
            }
        } else {
            $rates = QuotationRates::select('name as ClassName', 'format as ClassFullName', 'rate_id as ClassKey', 'value as Value1', 'is_default')->where(
                [
                    ["quotation_id", "=", $quotation['id']],
                ])->orderby('is_default', 'DESC')->get();
            $this->_DATA["rates"] = $rates;
        }

        $quotationNo                = \App\Http\Models\QuotationNos::find($quotation->quotation_no_id);
        $quotation["rate"]          = $rate ? $rate : $rates[0];
        $quotation["status"]        = $status->toArray();
        $quotation["tax"]           = @$tax ? @$tax->toArray() : null;
        $quotation["products"]      = $products;
        $quotation["customer"]      = @$customer ? @$customer->toArray() : null;
        $quotation["quotation_no"]  = @$quotationNo ? @$quotationNo->toArray() : null;
        $quotation["branch"]        = @$branch ? @$branch->toArray() : null;
        $quotation["area"]          = @$area ? @$area->toArray() : null;
        $quotation["construction"]  = @$construction ? @$construction->toArray() : null;
        $quotation["saved"]         = false;
        $quotation["Otherproducts"] = QuotationOtherDetails::where("quotation_id", "=", $id)->select(['*', DB::raw('1 as saved')])->get()->toArray();
        $quotation["created_by"]    = $created_by;
        $quotation["winrate"]       = $winrate;

        $this->_DATA["quotation"] = $quotation;

        $langs                  = Languages::orderby("is_default", "DESC")->where("id", "!=", $this->_LANG_ID)->get();
        $lang                   = \App\Http\Models\Languages::find($this->_LANG_ID);
        $this->_DATA["langs"][] = $lang;

        foreach ($langs as $key => $value) {
            $this->_DATA["langs"][] = $value;
        }

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function customer($id)
    {
        $data = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        if ($id) {
            $customer       = \App\Http\Models\Customers::find($id)->toArray();
            $data["data"]   = $customer;
            $data["status"] = 1;
        }
        return \Response::json($data);
    }
    public function rate($id)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL = \App\Models\Mstclass::where(
            [
                ["Class", "=", $this->rootClass["rate"]],
                ["ClassName", "=", $id],
            ]
        )->first();
        $data["data"]   = $this->_MODEL->toArray();
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function getitemsproduct($id)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL = Mstclass::where(
            [
                ["Class", "=", $this->rootClass["product"]],
                ["ClassKey", "=", $id],
            ]
        )->first();
        if ($this->_MODEL) {
            $Mstitemclass                   = \App\Http\Models\Mstitemclass::getItemByClass($this->_MODEL->Class, $this->_MODEL->ClassKey)->get();
            $dataR                          = [];
            $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
            $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
            $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
            foreach ($Mstitemclass as $key => $value) {
                $items          = \App\Http\Models\Mstitemclass::find($value->ItemClassId);
                $value          = $value->toArray();
                $value['items'] = $items->Mstitems($this->_MODEL->Class, $this->_MODEL->ClassKey)->get();
                if ($value['PricePattern'] == $PricePatternInstallFee->value || $value['PricePattern'] == $PricePatternInstallationQSMini->value || $value['PricePattern'] == $PricePatternInlandFee->value) {
                    $value['item'] = @$value['items'][0];
                } else {
                    $value['item'] = null;
                }
                $value["type"] = 0;
                $dataR[]       = $value;
            }
            $data["status"]             = 1;
            $product                    = $this->_MODEL->toArray();
            $product['quantity']        = 1;
            $product['total']           = 0;
            $product['price']           = 0;
            $product["Classes"]         = $dataR;
            $product["discount_active"] = 0;
            $product["discount"]        = 0;
            $product["discount1"]       = 0;
            $product["discount2"]       = 0;
            $product["OtherClasses"]    = [];
            $data["data"]               = $product;
        }
        return \Response::json($data);
    }
    public function getpriceitemproduct(Request $request)
    {
        $keisu_inlandfreightfee = WebConfigs::where('key', '=', 'keisu_inlandfreightfee')->select('value')->first();
        $keisu_installfee       = WebConfigs::where('key', '=', 'keisu_installfee')->select('value')->first();

        $data        = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $ItemClassId = $request->ItemClassId;
        $ItemId      = $request->ItemId;
        $ClassKey    = $request->ClassKey;
        if ($ItemId) {
            $priceItem = new calculatePrice();
            $postData  = $request->post();
            foreach ($postData as $key => $value) {
                if (isset($priceItem->{$key})) {
                    if (in_array($key, $priceItem->_Paremeter)) {
                        $priceItem->{$key} = $value;
                    }
                }
            }
            $priceItem->Run($ClassKey, $ItemId);
            if ($priceItem->CheckWH() != false) {
                $data["data"]['keisu_inlandfreightfee'] = $keisu_inlandfreightfee;
                $data["data"]['keisu_installfee']       = $keisu_installfee;
                if ($priceItem->RATE == 1) {
                    $data["data"]['saleprice'] = round($priceItem->sellPrice() / 1000) * 1000;
                    $data["data"]['price']     = round($priceItem->getPrice() / 1000) * 1000;
                    $data["data"]['object']    = json_decode(json_encode($priceItem), true);
                    $data["status"]            = 1;
                } else {
                    $data["data"]['saleprice'] = round($priceItem->sellPrice());
                    $data["data"]['price']     = round($priceItem->getPrice());
                    $data["data"]['object']    = json_decode(json_encode($priceItem), true);
                    $data["status"]            = 1;
                }
            } else {
                $data["message"] = "Not exist price for inputed width and height.";
            }
        } else {
            $data["data"]['saleprice'] = 0;
            $data["data"]['price']     = 0;
            $data["status"]            = 1;
        }
        return \Response::json($data);
    }
    public function gettotalproduct(Request $request)
    {
        $ClassKey  = $request->ClassKey;
        $priceItem = new calculatePrice($ClassKey);
        $postData  = $request->post();
        foreach ($postData as $key => $value) {
            if (isset($priceItem->{$key})) {
                if (in_array($key, $priceItem->_Paremeter)) {
                    $priceItem->{$key} = $value;
                }
            }
        }
        $priceItem->Run();
        $saleprice                 = $priceItem->GetTotalsellPriceProduct($request->saleprice);
        $price                     = $priceItem->GetTotalProduct($saleprice);
        $data["data"]['saleprice'] = $saleprice;
        $data["data"]['price']     = $price;
        $data["status"]            = 1;
        return \Response::json($data);
    }
    public function reloaditems(Request $request)
    {
        $data      = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $KEYFILTER = \App\Http\Models\Mstitem::KEYFILTER($request->ItemId, $request->Width, $request->Height);
        if ($request->ItemClassIds) {
            foreach ($request->ItemClassIds as $key => $value) {
                $ch = \App\Http\Models\Mstitemlimit::where(
                    [
                        ["ParentItemId", "=", $request->ItemId],
                        ["ItemClassId", "=", $value],
                    ]
                )->count();
                $Mstitemclass = @\App\Http\Models\Mstitemclass::find($value);
                if ($Mstitemclass) {
                    $Mstitemclass = $Mstitemclass->toArray();
                }
                if ($ch > 0) {
                    $items          = \App\Http\Models\Mstitem::getItemLimit($value, @$KEYFILTER->KEYFILTER, @$request->ItemId, @$request->Width, @$request->Height)->toArray();
                    $data["data"][] = [
                        "items" => $items,
                        "item"  => (@$Mstitemclass['PricePattern'] == '11' || @$Mstitemclass['PricePattern'] == '10') ? @$items[0] : null,
                    ];
                } else {
                    $items          = \App\Http\Models\Mstitem::getItemLimit($value, null, $request->ItemId, $request->Width, $request->Height)->toArray();
                    $data["data"][] = [
                        "items" => $items,
                        "item"  => (@$Mstitemclass['PricePattern'] == '11' || @$Mstitemclass['PricePattern'] == '10') ? @$items[0] : null,
                    ];
                }
            }
        }
        $data["status"] = 1;
        return \Response::json($data);

    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data               = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $isNEW              = false;
        $quotation          = null;
        $oldstatus          = 0;
        $status_type        = $request->status_id;
        $status             = $this->getListStatusByModels()->where("options", "=", $status_type)->first();
        $request->status_id = $status->id;
        if (@$request->id > 0) {
            $quotation = \App\Http\Models\Quotations::find($request->id);
            $oldstatus = $quotation->status_id;

            // Hmm, updateOrCreate damn not working
            $winrate = $quotation->winrate ? QuotationWinRate::find($quotation->winrate->id) : new QuotationWinRate();
        }
        if ($quotation == null) {
            $quotation = new \App\Http\Models\Quotations();
            $isNEW     = true;

            // Hmm, updateOrCreate damn not working
            $winrate = new QuotationWinRate();
        }
        $quotation->onsave = 1;
        $listColums        = $this->_GetTableColumns($quotation->getTable());

        if ($listColums) {

            foreach ($request->post() as $key => $value) {
                if (in_array($key, $listColums)) {
                    if ($key != "id") {
                        $quotation->{$key} = $value;
                    }
                }
            }
            $quotation->status_id  = $status->id;
            $date_start            = $request->date_start;
            $date_start            = \DateTime::createFromFormat('d/m/Y', $date_start)->format('Y-m-d');
            $quotation->date_start = $date_start;
            $quotation_saved       = $quotation->save();

            if ($isNEW == true) {
                $quotation->pid                     = 0;
                $quotation->path                    = '/0/' . $quotation->id . '/';
                $quotation->reversion_pid           = 0;
                $quotation->reversion_root_id       = $quotation->id;
                $quotation->reversion               = 0;
                $quotation->path_reversion          = '/0/' . $quotation->id . '/';
                $quotation_saved                    = $quotation->save();
                $QuotationAllowChange               = new QuotationAllowChanges();
                $QuotationAllowChange->user_create  = $this->_USER->id;
                $QuotationAllowChange->user_id      = $this->_USER->id;
                $QuotationAllowChange->quotation_id = $quotation->id;
                $QuotationAllowChange->save();
                $users = Users::where("id", "!=", $this->_USER->id)->get();
                foreach ($users as $keyuser => $valueuser) {
                    if ($valueuser->hasTypeUserForQuotation() == 1) {
                        $QuotationAllowChange               = new QuotationAllowChanges();
                        $QuotationAllowChange->user_create  = $this->_USER->id;
                        $QuotationAllowChange->user_id      = $valueuser->id;
                        $QuotationAllowChange->quotation_id = $quotation->id;
                        $QuotationAllowChange->save();
                    }
                }
            }

            if ($quotation_saved) {
                $winrate->quotation_id = $quotation->id;
                $winrate->win_rate     = $request->winrate;
                $winrate->created_by   = $this->_USER->id;
                $winrate->save();
            }
        }

        if ($quotation->status->options == '2') {
            $order              = $quotation->OrderParent;
            $createdOrderStatus = $this->getListStatusByModels()->where("options", "=", '3')->first();
            if ($order != null) {
                $order->quotation_id    = $quotation->id;
                $order->product_price   = $quotation->product_price;
                $order->other_price     = $quotation->other_price;
                $order->discount        = $quotation->discount;
                $order->sub_total       = $quotation->sub_total;
                $order->grand_sub_total = $quotation->grand_sub_total;
                $order->tax_price       = $quotation->tax_price;
                $order->total           = $quotation->total;
                $order->save();
                $quotation->status_id = $createdOrderStatus->id;
                $quotation->save();

            }
        }

        $rates = $request->rates;
        foreach ($rates as $key => $value) {
            $check = QuotationRates::where([
                ["quotation_id", "=", $quotation->id],
                ["rate_id", "=", $value['ClassKey']],
            ])->first();
            $qR = $check;
            if ($check == null) {
                $qR               = new QuotationRates();
                $qR->quotation_id = $quotation->id;
                $qR->rate_id      = $value['ClassKey'];
                $qR->name         = $value['ClassName'];
                $qR->format       = $value['ClassFullName'];
            }
            if ($value['ClassKey'] == $quotation->rate_id) {
                $qR->is_default = 1;
            } else {
                $qR->is_default = 0;
            }
            $qR->value = $value['Value1'];
            $qR->save();
        }

        $data["data"]   = $quotation;
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function adddetail(Request $request)
    {
        $data           = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $P              = [];
        $products       = $request->products;
        $others         = $request->others;
        $productsR      = [];
        $classesIDs     = [0];
        $classotherIDs  = [0];
        $productIDs     = [0];
        $othersIDs      = [0];
        $othersR        = [];
        $QuotationPrice = 0;
        $Quotation      = Quotations::find($request->quotation_id);
        if (!$Quotation) {
            return \Response::json($data);
        }
        $RateActive = QuotationRates::where([
            ["quotation_id", "=", $Quotation->id],
            ["is_default", "=", 1],
        ])->first();
        $cell = 1;
        if ($RateActive->value != 1) {
            $cell = $RateActive->value;
        }
        $PricePatternInstallFee         = WebConfigs::where("key", "=", "PricePatternInstallFee")->first();
        $PricePatternInstallationQSMini = WebConfigs::where("key", "=", "PricePatternInstallationQSMini")->first();
        $PricePatternInlandFee          = WebConfigs::where("key", "=", "PricePatternInlandFee")->first();
        $NotPlus                        = [$PricePatternInlandFee->value];
        $OnloadPrice                    = [$PricePatternInstallFee->value, $PricePatternInstallationQSMini->value, $PricePatternInlandFee->value];
        if (!$Quotation) {
            return \Response::json($data);
        }
        $rate                       = 1;
        $QuotationDetails           = new QuotationDetails();
        $QuotationDetailItems       = new QuotationDetailItems();
        $QuotationDetailOtherItems  = new QuotationDetailOtherItems();
        $QuotationOtherDetails      = new QuotationOtherDetails();
        $DetailslistColums          = $this->_GetTableColumns($QuotationDetails->getTable());
        $DetailItemslistColums      = $this->_GetTableColumns($QuotationDetailItems->getTable());
        $DetailOtherItemslistColums = $this->_GetTableColumns($QuotationDetailOtherItems->getTable());
        $OtherDetailslistColums     = $this->_GetTableColumns($QuotationOtherDetails->getTable());
        $calculatePrice             = new calculatePrice();
        $priceItemparent            = new calculatePrice();
        if ($products) {
            foreach ($products as $key => $value) {
                $productPrice     = $productsalepricePrice     = 0;
                $QuotationDetails = new QuotationDetails();
                if (@$value['id']) {
                    $QuotationDetails = QuotationDetails::find($value['id']);
                }
                if ($DetailslistColums) {
                    foreach ($value as $key1 => $value1) {
                        if (in_array($key1, $DetailslistColums)) {
                            if ($key1 != "id") {
                                $QuotationDetails->{$key1} = $value1;
                            }
                        }
                    }
                    $QuotationDetails->save();
                    if ($QuotationDetails->id) {
                        $productR = [
                            "id"      => $QuotationDetails->id,
                            "classes" => [],
                            "others"  => [],
                        ];
                        $classes       = @$value["classes"];
                        $othersClasses = @$value["others"];
                        if ($classes) {
                            $installProduct = [];
                            foreach ($classes as $key2 => $value2) {
                                if ($value2["type"] == 0) {
                                    if (!in_array($value2["PricePattern"], $OnloadPrice)) {
                                        $QuotationDetailItems = new QuotationDetailItems();
                                        if (@$value2['id']) {
                                            $QuotationDetailItems = QuotationDetailItems::find($value2['id']);
                                        }

                                        foreach ($value2 as $key3 => $value3) {
                                            if (in_array($key3, $DetailItemslistColums)) {
                                                $QuotationDetailItems->{$key3} = $value3;
                                            }
                                        }

                                        if (@$value2['item_id']) {
                                            $calculatePrice->reset();
                                            foreach ($value2 as $key4 => $value4) {
                                                if (isset($calculatePrice->{$key4})) {
                                                    if (in_array($key4, $calculatePrice->_Paremeter)) {
                                                        $calculatePrice->{$key4} = $value4;
                                                    }
                                                }
                                            }
                                            $calculatePrice->RTTS = 0;
                                            $calculatePrice->RATE = $rate;
                                            if ($value2["ParentItemClassId"] != 0) {
                                                $parent = null;
                                                foreach ($classes as $keyparent => $valueparent) {
                                                    if ($valueparent["ItemClassId"] == $value2["ParentItemClassId"]) {
                                                        $parent = $valueparent;
                                                        break;
                                                    }
                                                }
                                                if ($parent) {
                                                    //$priceItemparent = new calculatePrice($QuotationDetails->product_id, $parent['item_id']);
                                                    $priceItemparent->reset();
                                                    foreach ($parent as $key4 => $value4) {
                                                        if (isset($priceItemparent->{$key4})) {
                                                            if (in_array($key4, $priceItemparent->_Paremeter)) {
                                                                $priceItemparent->{$key4} = $value4;
                                                            }
                                                        }
                                                    }
                                                    $calculatePrice->PW    = $parent['width'];
                                                    $calculatePrice->PH    = $parent['height'];
                                                    $calculatePrice->PQ    = $parent['quantity'];
                                                    $priceItemparent->RATE = $rate;
                                                    $priceItemparent->Run($QuotationDetails->product_id, $parent['item_id']);
                                                    if ($priceItemparent->CheckWH() != false) {
                                                        $calculatePrice->RTTS = $priceItemparent->sellPrice();
                                                    }
                                                }
                                            }
                                            $calculatePrice->Run($QuotationDetails->product_id, $value2['item_id']);
                                            if ($calculatePrice->CheckWH() != false) {
                                                $QuotationDetailItems->not_round_price     = $calculatePrice->getPrice();
                                                $QuotationDetailItems->not_round_saleprice = $calculatePrice->sellPrice();
                                                $QuotationDetailItems->price               = round($QuotationDetailItems->not_round_price / 1000) * 1000;
                                                $QuotationDetailItems->saleprice           = round($QuotationDetailItems->not_round_saleprice / 1000) * 1000;
                                                if ($value2['DispOrder'] == 1 || $value2['DispOrder'] == '1') {
                                                    $QuotationDetails->productprice   = $QuotationDetailItems->price;
                                                    $QuotationDetailItems->is_product = 1;
                                                    $QuotationDetails->save();
                                                }
                                            }
                                        }
                                        $QuotationDetailItems->detail_id = $QuotationDetails->id;
                                        $QuotationDetailItems->save();
                                        $productR["classes"][] = $QuotationDetailItems->id;
                                        $classesIDs[]          = $QuotationDetailItems->id;
                                    } else {
                                        $installProduct[] = $value2;
                                    }
                                } else if ($value2["type"] == 1) {
                                    $QuotationDetailOtherItems = new QuotationDetailOtherItems();
                                    if (@$value2['id']) {
                                        $QuotationDetailOtherItems = QuotationDetailOtherItems::find(@$value2['id']);
                                    }

                                    foreach ($value2 as $key3 => $value3) {
                                        if (in_array($key3, $DetailOtherItemslistColums)) {
                                            if ($key3 == "price" || $key3 == "saleprice") {
                                                $QuotationDetailOtherItems->{$key3} = floatval($value3) * $cell;
                                            } else {
                                                $QuotationDetailOtherItems->{$key3} = $value3;
                                            }
                                        }
                                    }
                                    $QuotationDetailOtherItems->detail_id = $QuotationDetails->id;
                                    $QuotationDetailOtherItems->save();
                                    $productR["others"][] = $QuotationDetailOtherItems->id;
                                    $classotherIDs[]      = $QuotationDetailOtherItems->id;
                                }
                            }
                            if ($installProduct) {
                                $PriceNotInstall = QuotationDetailItems::where('detail_id', '=', $QuotationDetails->id)->where([
                                    ["is_inlandfreightfee", "=", 0],
                                    ["is_installfee", "=", 0],
                                    ["is_installationqs", "=", 0],
                                ])->sum('price');
                                foreach ($installProduct as $key2 => $value2) {
                                    $QuotationDetailItems = new QuotationDetailItems();
                                    if (@$value2['id']) {
                                        $QuotationDetailItems = QuotationDetailItems::find($value2['id']);
                                    }
                                    foreach ($value2 as $key3 => $value3) {
                                        if (in_array($key3, $DetailItemslistColums)) {
                                            $QuotationDetailItems->{$key3} = $value3;
                                        }
                                    }
                                    if (@$value2['item_id']) {
                                        $calculatePrice->reset();
                                        foreach ($value2 as $key4 => $value4) {
                                            if (isset($calculatePrice->{$key4})) {
                                                if (in_array($key4, $calculatePrice->_Paremeter)) {
                                                    $calculatePrice->{$key4} = $value4;
                                                }
                                            }
                                        }
                                        $calculatePrice->RTTS = 0;
                                        $calculatePrice->RATE = $rate;
                                        if ($value2["ParentItemClassId"] != 0) {
                                            $parent = null;
                                            foreach ($classes as $keyparent => $valueparent) {
                                                if ($valueparent["type"] == 0) {
                                                    if ($valueparent["ItemClassId"] == $parent["ParentItemClassId"]) {
                                                        $parent = $valueparent;
                                                        break;
                                                    }
                                                }

                                            }
                                            if ($parent) {
                                                foreach ($parent as $key4 => $value4) {
                                                    $priceItemparent->reset();
                                                    if (isset($priceItemparent->{$key4})) {
                                                        if (in_array($key4, $priceItemparent->_Paremeter)) {
                                                            $priceItemparent->{$key4} = $value4;
                                                        }
                                                    }
                                                }
                                                $calculatePrice->PW    = $parent['width'];
                                                $calculatePrice->PH    = $parent['height'];
                                                $calculatePrice->PQ    = $parent['quantity'];
                                                $priceItemparent->RATE = $rate;
                                                $priceItemparent->Run($QuotationDetails->product_id, $parent['item_id']);
                                                if ($priceItemparent->CheckWH() != false) {
                                                    $calculatePrice->RTTS = $priceItemparent->sellPrice();
                                                }
                                            }
                                        }
                                        $calculatePrice->TT = $PriceNotInstall;
                                        $calculatePrice->Q  = $QuotationDetails->quantity;
                                        $calculatePrice->Run($QuotationDetails->product_id, $value2['item_id']);
                                        if ($calculatePrice->CheckWH() != false) {
                                            $QuotationDetailItems->not_round_price     = $calculatePrice->getPrice();
                                            $QuotationDetailItems->not_round_saleprice = $calculatePrice->sellPrice();
                                            $QuotationDetailItems->saleprice           = round($QuotationDetailItems->not_round_saleprice / 1000) * 1000;
                                            $QuotationDetailItems->price               = floatval($value2["price"]) * $cell;
                                        }
                                        if ($value2["PricePattern"] == $PricePatternInstallFee->value) {
                                            $QuotationDetailItems->is_installfee = 1;
                                            $QuotationDetails->installfee        = $QuotationDetailItems->price;
                                            $QuotationDetails->installfee_sale   = $QuotationDetailItems->saleprice;
                                            $QuotationDetails->save();
                                        }
                                        if ($value2["PricePattern"] == $PricePatternInlandFee->value) {
                                            $QuotationDetailItems->is_inlandfreightfee = 1;
                                            $QuotationDetails->inlandfreightfee        = $QuotationDetailItems->price;
                                            $QuotationDetails->inlandfreightfee_sale   = $QuotationDetailItems->saleprice;
                                            $QuotationDetails->save();
                                        }
                                        if ($value2["PricePattern"] == $PricePatternInstallationQSMini->value) {
                                            $QuotationDetailItems->is_installationqs = 1;
                                            $QuotationDetails->installationqsmini    = $QuotationDetailItems->price;
                                            $QuotationDetails->save();
                                        }
                                    }
                                    $QuotationDetailItems->detail_id = $QuotationDetails->id;
                                    $QuotationDetailItems->save();
                                    $productR["classes"][] = $QuotationDetailItems->id;
                                    $classesIDs[]          = $QuotationDetailItems->id;
                                }

                            }
                        }
                        $productsR[] = $productR;
                    }
                }
                $productIDs[] = $QuotationDetails->id;
                if (@$classotherIDs) {
                    QuotationDetailOtherItems::
                        where("detail_id", "=", $QuotationDetails->id)
                        ->whereNotIn('id', $classotherIDs)->delete();
                }

                if (@$classesIDs) {
                    QuotationDetailItems::
                        where("detail_id", "=", $QuotationDetails->id)
                        ->whereNotIn('id', $classesIDs)->delete();
                }
                $OtherPrice      = QuotationDetailOtherItems::where('detail_id', '=', $QuotationDetails->id)->sum('price');
                $OtherSalePrice  = QuotationDetailOtherItems::where('detail_id', '=', $QuotationDetails->id)->sum('saleprice');
                $PriceNotInstall = QuotationDetailItems::where('detail_id', '=', $QuotationDetails->id)->where([
                    ["is_inlandfreightfee", "=", 0],
                    ["is_installfee", "=", 0],
                    ["is_installationqs", "=", 0],
                ])->sum('price');
                $PriceHasInstall = QuotationDetailItems::where('detail_id', '=', $QuotationDetails->id)
                    ->where(
                        function ($q) {
                            $q->where("is_inlandfreightfee", "=", 1)
                                ->orwhere("is_installfee", "=", 1)
                                ->orwhere("is_installationqs", "=", 1);
                        }
                    )->sum('price');
                $SalePriceNotInstall = QuotationDetailItems::where('detail_id', '=', $QuotationDetails->id)->where([
                    ["is_inlandfreightfee", "=", 0],
                    ["is_installfee", "=", 0],
                    ["is_installationqs", "=", 0],
                ])->sum('saleprice');
                $SalePriceHasInstall = QuotationDetailItems::where('detail_id', '=', $QuotationDetails->id)
                    ->where(
                        function ($q) {
                            $q->where("is_inlandfreightfee", "=", 1)
                                ->orwhere("is_installfee", "=", 1)
                                ->orwhere("is_installationqs", "=", 1);
                        }
                    )->sum('saleprice');
                $discount                      = $QuotationDetails->discount ? $QuotationDetails->discount : 0;
                $QuotationDetails->discount    = $discount * $cell;
                $QuotationDetails->other_price = ($OtherPrice * $QuotationDetails->quantity);
                $QuotationDetails->plus_price  = $OtherPrice + $PriceNotInstall;
                $QuotationDetails->price       = ($OtherPrice * $QuotationDetails->quantity) + ($PriceNotInstall * $QuotationDetails->quantity) + $PriceHasInstall;
                $QuotationDetails->saleprice   = ($OtherSalePrice * $QuotationDetails->quantity) + ($SalePriceNotInstall * $QuotationDetails->quantity) + $SalePriceHasInstall;
                $QuotationDetails->total       = $QuotationDetails->price - ($QuotationDetails->discount);
                $QuotationDetails->save();
            }
        }
        if ($others) {
            foreach ($others as $key => $value) {
                $QuotationOtherDetails = new QuotationOtherDetails();
                if (@$value['id']) {
                    $QuotationOtherDetails = QuotationOtherDetails::find($value['id']);
                }
                if ($OtherDetailslistColums) {
                    foreach ($value as $key1 => $value1) {
                        if (in_array($key1, $OtherDetailslistColums)) {
                            if ($key1 != "id") {
                                if ($key1 == "price" || $key1 == "saleprice") {
                                    $QuotationOtherDetails->{$key1} = floatval($value1) * floatval($cell);
                                } else {
                                    $QuotationOtherDetails->{$key1} = $value1;
                                }

                            }
                        }
                    }
                    $discount                        = $QuotationOtherDetails->discount ? $QuotationOtherDetails->discount : 0;
                    $QuotationOtherDetails->discount = $discount;
                    $QuotationOtherDetails->total    = floatval($QuotationOtherDetails->price) - floatval($QuotationOtherDetails->discount);
                    $QuotationOtherDetails->save();
                    $othersR[]   = $QuotationOtherDetails->id;
                    $othersIDs[] = $QuotationOtherDetails->id;
                }
            }
        }
        if (@$productIDs) {
            \App\Http\Models\QuotationDetails::
                where("quotation_id", "=", $Quotation->id)
                ->whereNotIn('id', $productIDs)->delete();
        }

        if (@$othersIDs) {
            QuotationOtherDetails::
                where("quotation_id", "=", $Quotation->id)
                ->whereNotIn('id', $othersR)->delete();
        }
        $Quotation->product_price   = QuotationDetails::where('quotation_id', '=', $Quotation->id)->sum('total');
        $Quotation->other_price     = QuotationOtherDetails::where('quotation_id', '=', $Quotation->id)->sum('total');
        $Quotation->sub_total       = $Quotation->product_price + $Quotation->other_price;
        $Quotation->discount        = $Quotation->discount ? $Quotation->discount : 0;
        $Quotation->grand_sub_total = $Quotation->sub_total - $Quotation->discount;
        if ($Quotation->tax_id) {
            $tax = WebConfigs::where('id', '=', $Quotation->tax_id)->first();
            if ($tax) {
                $Quotation->tax_value = floatval($tax->value);
                $Quotation->tax_price = ($Quotation->grand_sub_total / 100) * $Quotation->tax_value;
            }
        } else {
            $Quotation->tax_price = 0;
        }
        $Quotation->onsave = 0;
        $Quotation->total  = $Quotation->grand_sub_total + $Quotation->tax_price;
        $Quotation->save();
        $data["data"] = [
            "othersR"   => $othersR,
            "productsR" => $productsR,
        ];
        $data["status"]        = 1;
        $data['_redirect']     = 1;
        $data['_redirect_url'] = route($this->_ROUTE_FIX . ".status", $Quotation->status_id);
        return \Response::json($data);
    }
    public function deleteproduct($id)
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $this->_MODEL    = \App\Http\Models\QuotationDetails::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function deleteitemproduct($id)
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $this->_MODEL    = QuotationDetailItems::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function deleteitemotherproduct($id)
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $this->_MODEL    = QuotationDetailOtherItems::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function deleteotherproduct($id)
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $this->_MODEL    = QuotationOtherDetails::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
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
        $q    = Quotations::find($id);
        if ($q) {
            $parent = Quotations::find($q->reversion_pid);
            if ($parent) {
                $parent->index_reversion = 1;
                $parent->save();
            }
            $q->is_delete = 1;
            $q->save();
        }
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function getcustomers()
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["data"]    = \App\Http\Models\Customers::roleStatus()->get()->toArray();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function getconstructions()
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["data"]    = \App\Http\Models\Constructions::roleStatus()->get()->toArray();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function getbranchs()
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["data"]    = \App\Http\Models\Branchs::roleStatus()->get()->toArray();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function getareas()
    {
        $data            = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $data["data"]    = \App\Http\Models\Areas::roleStatus()->get()->toArray();
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    private function get_html_tree($data = null, $root = 0, $level = '', $activer = -1)
    {
        $langs  = \App\Http\Models\Languages::get();
        $option = '';
        foreach ($langs as $key => $value) {
            $option .= '<option value="' . $value->id . '">' . $value->name . '</option>';
        }
        $termsList    = array();
        $new_listdata = array();
        if ($root != 0) {
            $level .= '&mdash;';
        }
        if ($data != null) {
            foreach ($data as $key => $item) {
                if ($item->reversion_pid == $root) {
                    $termsList[] = ($item);
                } else {
                    $new_listdata[] = ($item);
                }
            }
        }
        if ($termsList != null) {
            foreach ($termsList as $key => $item_2) {
                $class = 1 == $item_2->index_reversion ? "activer" : "";
                $this->html_tress .= '
                <tr value="' . $item_2->id . '" class="' . $class . '">
                    <td>' . $level . '  No. ' . $item_2->quotation_number . '</td>
                    <td><a href="' . route('customers.edit', $item_2->customer_id) . '"> ' . $item_2->customer->authorized_name . '</a></td>
                    <td>' . $item_2->created_at . '</td>
                    <td>' . $item_2->updated_at . '</td>
                    <td>
                        <div class="row parent-row" >
                            <div class="col-4">
                                <a onclick="funDowloadQuotation(this)" data-href="' . route($this->_ROUTE_FIX . '.export', $item_2->id) . '" href="javascript:;" class="btn btn-primary btn-block" target="_blank"><i class="mdi-cloud-download mdi"></i></a>
                            </div>
                            <div class="col-8">
                                <select ng-model="langs[' . $key . ']" class="form-control select-value-lang">' . $option . '</select>
                            </div>
                        </div>
                    </td>
                </tr>';
                $this->get_html_tree($new_listdata, $item_2->id, $level, $activer);
            }
        }
        return $this->html_tress;
    }
    public function createdorder($id)
    {

        $status = $this->getListStatusByModels()->where("options", "=", 2)->first();
        if ($status) {
            $quotation = Quotations::where([
                ["id", "=", $id],
                ["status_id", "=", $status->id],
            ])->first();
            if ($quotation) {
                if ($status) {
                    return Redirect(route("orders.create", ['id' => $quotation->id]));
                }
            }
        }
        return Redirect(route($this->_ROUTE_FIX . ".index"));
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
    public function export($id, $lang)
    {
        $quotation = Quotations::find($id);
        $name      = $this->getLangLableValue('_quotation_');
        return Excel::download(new QuotationExport($quotation, $lang), $name . '-' . $quotation->quotation_number . "" . '.xlsx');
    }
    public function exportreceipt($id, $lang = 2)
    {
        $quotation     = Quotations::find($id);
        $ExcelTemplate = \App\Http\Models\ExcelTemplates::where("key", "=", '001')->first();
        if ($ExcelTemplate) {
            $name = $ExcelTemplate->language($lang)->name;
        } else {
            $name = $this->getLangLableValue('[_winning_bidding_]');
        }
        return Excel::download(new OrderReceiptExport($quotation, $lang), $name . '-' . $quotation->quotation_number . "" . '.xlsx');
    }
    public function downloadSpecial($id)
    {
        $quotation = Quotations::find($id);
        $name      = $this->getLangLableValue('_dowload_special_quotation_');
        return Excel::download(new DownloadSpecialQuotation($quotation), $name . '-' . $quotation->quotation_number . "" . '.xlsx');
    }
    public function viewreversion(Request $request)
    {
        $id   = $request->id;
        $data = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $NQ   = Quotations::find($id);
        if ($NQ) {
            $rootID        = $NQ->reversion_root_id;
            $OQ            = Quotations::find($rootID);
            $ND            = $OD            = [];
            $details       = $NQ->details;
            $ND['folders'] = [];
            foreach ($details as $key => $value) {
                $items           = $value->items;
                $product         = $value->product->toArray();
                $value           = $value->toArray();
                $value           = array_merge($product, $value);
                $value['items']  = $items;
                $ND['folders'][] = $value;
            }

            $details       = $OQ->details;
            $OD['folders'] = [];
            foreach ($details as $key => $value) {
                $items           = $value->items;
                $product         = $value->product->toArray();
                $value           = $value->toArray();
                $value           = array_merge($product, $value);
                $value['items']  = $items;
                $OD['folders'][] = $value;
            }
            $NQ->price            = $NQ->details->sum('price');
            $NQ->inlandfreightfee = $NQ->details->sum('inlandfreightfee');
            $NQ->installfee       = $NQ->details->sum('installfee');
            $NQ->quantity         = $NQ->details->sum('quantity');
            $NQ->total            = $NQ->details->sum('total');
            $ND["quotation"]      = $NQ;

            $OQ->price            = $OQ->details->sum('price');
            $OQ->inlandfreightfee = $OQ->details->sum('inlandfreightfee');
            $OQ->installfee       = $OQ->details->sum('installfee');
            $OQ->quantity         = $OQ->details->sum('quantity');
            $OQ->total            = $OQ->details->sum('total');
            $reversions           = Quotations::where([
                ["reversion_root_id", "=", $OQ->reversion_root_id],
                ['id', '!=', $NQ->id],
            ])->orderby('reversion', 'ASC')->get();
            $OD["quotation"] = $OQ;
            $data['data']    = [
                'folder1'    => $OD,
                'folder2'    => $ND,
                'reversions' => $reversions,
            ];
            $data["status"] = 1;
        }
        return \Response::json($data);
    }
    public function QuotationSetMerge(Request $request)
    {
        $QuotationMerges               = new QuotationMerges();
        $QuotationMerges->user_id      = $this->_USER->id;
        $QuotationMerges->quotation_id = $request->quotation_id;
        $QuotationMerges->key_id       = md5(time());
        $QuotationMerges->folder1      = $request->folder1;
        $QuotationMerges->folder2      = $request->folder2;
        $QuotationMerges->save();
        $data = ["status" => 1, "data" => route($this->_ROUTE_FIX . ".downloadmerge", ['id' => $QuotationMerges->id]), "message" => ""];
        return \Response::json($data);

    }
    public function downloadmerge($id)
    {
        $qm        = QuotationMerges::find($id);
        $quotation = Quotations::find($qm->quotation_id);
        return Excel::download(new QuotationMerge($qm), $quotation->quotation_number . '.xlsx');
    }
    public function getreversion(Request $request)
    {
        $id            = $request->id;
        $data          = ["status" => 0, "_redirect" => 0, "data" => [], "message" => ""];
        $OQ            = Quotations::find($id);
        $OD            = [];
        $details       = $OQ->details;
        $OD['folders'] = [];
        foreach ($details as $key => $value) {
            $items           = $value->items;
            $product         = $value->product->toArray();
            $value           = $value->toArray();
            $value           = array_merge($product, $value);
            $value['items']  = $items;
            $OD['folders'][] = $value;
        }
        $OQ->price            = $OQ->details->sum('price');
        $OQ->inlandfreightfee = $OQ->details->sum('inlandfreightfee');
        $OQ->installfee       = $OQ->details->sum('installfee');
        $OQ->quantity         = $OQ->details->sum('quantity');
        $OQ->total            = $OQ->details->sum('total');
        $OD["quotation"]      = $OQ;
        $data['data']         = [
            'folder' => $OD,
        ];
        $data["status"] = 1;
        return \Response::json($data);

    }

    public function DesignRequest($orderID)
    {
        $order              = Orders::find($orderID);
        $download           = new OrderDownloads();
        $download->order_id = $order->id;
        $download->user_id  = $this->_USER->id;
        $download->save();
        $name = $this->getLangLableValue('[_design_request_]');
        return Excel::download(new RequestDesignExport($order), $name . "-" . $order->order_number . '.xlsx');
    }

    public function dowloadQuotation($quotationID, $productID)
    {
        $quotation = Quotations::find($quotationID);
        $m         = WebConfigs::where('key', '=', 'ClassProduct')->first();
        $product   = Mstclass::where([
            ["ClassKey", "=", $productID],
            ["Class", "=", $m->value],
        ])->first();
        $name                   = $quotation->quotation_number . '-' . $product->ClassFullName;
        $download               = new QuotationDownloads();
        $download->user_id      = $this->_USER->id;
        $download->quotation_id = $quotation->id;
        $download->product_id   = $product->ClassKey;
        $download->save();
        $order = $quotation->order;
        $name  = $this->getLangLableValue('[_quotation_]');
        return Excel::download(new ProductionRequirements($order, $product, $quotation), $product->ClassFullName . "-" . $quotation->quotation_number . '.xls');
    }

    public function dowloadOtherQuotation($quotationID, $detailID)
    {
        $quotation              = Quotations::find($quotationID);
        $name                   = $detailID == 1 ? "Đơn xin mua vật tư, linh kiện các loại" : "Đơn xin mua hàng từ nhà cung cấp";
        $download               = new OtherProductDownloads();
        $download->user_id      = $this->_USER->id;
        $download->quotation_id = $quotation->id;
        $download->type         = $detailID;
        $download->save();
        $order = $quotation->order;
        if ($detailID == 1) {
            return Excel::download(new SuppliesExport($order), $name . '.xlsx');
        }
        return \Response::download(public_path('uploads/excels/file' . $detailID . '.xlsx'), $name . '.xlsx');
    }

    public function salesman(Request $request)
    {

        // Fetch all salesman from system
        $salesman = \App\Http\Models\Users::where('role_module_id', 3)
            ->orWhere('role_module_id', 1) // System Admin
            ->orWhere('role_module_id', 5) // Director
            ->select([
                'id', 'code', 'first_name', 'last_name',
            ]);

        if ((int) $request->branch) {
            $salesman->where('branch_id', (int) $request->branch);
        }

        $response = $salesman->get();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

}
