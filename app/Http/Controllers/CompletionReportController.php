<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use Yajra\DataTables\Html\Builder as DataTablesHtmlBuilder;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Models\Contracts;
use App\Http\Models\ConstructionCompletion;
use App\Models\Media;
use App\Models\CompletionReport;
use DataTables;
use App\Http\Models\Orders;
use Illuminate\Support\Collection;
use stdClass;
use Illuminate\Support\Facades\DB;

class CompletionReportController extends BackendController
{
    private $table_columns;

    public function __construct() {
        parent::__construct();

        $this->_VIEW = "completion-report";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Completion Report");
        $this->_DATA['slug'] = 'completion-report';
        // $this->_DATA['filter_fields'] = $this->table_columns;
        $this->_ROLNAMES = [
            'view' => ['index','datatable','show', 'periods'],
            'delete' => ['delete'],
            'update' => ['update','show'],
            'add' => ['create','store']
        ];

        $this->table_columns = [
            // ['data' => 'id', 'title' => 'id'],
            ['data' => 'contract_number', 'title' => __('Contract Number')],
            ['data' => 'date_signed', 'title' => __('Date Signed')],
            ['data' => 'periods_count', 'title' => __('Completion'), 'render' => 'full.completion_count + "/" + data'],
            // ['data' => 'Unit', 'title' => 'Unit', 'class' => 'text-center', 'filter' => true],
            // ['data' => 'WInputFlg', 'title' => 'Width Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
            // ['data' => 'HInputFlg', 'title' => 'Height Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
            // ['data' => 'QInputFlg', 'title' => 'Quantity Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
            // ['data' => 'PricePattern', 'title' => 'Price Pattern', 'filter' => true],
            // ['data' => 'DispOrder', 'title' => 'Display Order', 'class' => 'text-center', 'filter' => true],
            // ['data' => 'ParentItemClassName', 'title' => 'Parent Item Class', 'name' => 'parentitemclass.ParentItemClassName', 'filter' => true],
            // ['data' => 'FormatPattern', 'title' => 'Format Pattern', 'filter' => true],
            // ['data' => 'ItemClassNameVN', 'title' => 'Item Class Name (VN)'],
            // ['data' => 'FormatPatternVN', 'title' => 'Format Pattern (VN)'],
            // ['data' => 'ItemClassNameJP', 'title' => 'Item Class Name (JP)'],
            // ['data' => 'FormatPatternJP', 'title' => 'Format Pattern (JP)'],
            ['title' => __('Actions'), 'data' => 'actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ];
    }


    public function index(DataTablesHtmlBuilder $builder)
    {
        $this->_DATA['html'] = $builder->columns($this->table_columns)->ajax([
            'url' => route("admin.{$this->_VIEW}.datatable"),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            // 'searching' => false,
            'info' => false,
            'order' => [
                [
                    0, 'asc'
                ]
            ],
            'dom' => 'lrtip'
        ]);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function datatable()
    {
        $model = Contracts::query()->withCount(['periods', 'completion']);
        return DataTables::eloquent($model)
            ->addColumn('actions', "{$this->_VIEW}.context-menu")
            ->make(true);
    }

    public function periods(Int $id)
    {
        $contract = Contracts::findOrFail($id)->with(['periods', 'completion'])->first()->toArray();
        $contract['periods'] = array_map(function ($period) use ($contract) {
            $period['completion'] = false;
            $index = array_search($period['id'], array_column($contract['completion'], 'period_id'));

            if (is_numeric($index)) {
                $period['completion'] = (object)$contract['completion'][$index];
            }

            return (object)$period;
        }, $contract['periods']);

        $this->_DATA['contract'] = (object)$contract;

        // Filtering period have submitted
        $new_periods = array_filter($contract['periods'], function ($period) {
            return $period->completion == false;
        });

        // Sorting by time
        usort($new_periods, function ($a, $b) {
            $a = strtotime($a->start_date);
            $b = strtotime($b->start_date);
            return $a - $b;
        });

        // Get first one to make current period
        $this->_DATA['current_period'] = array_shift($new_periods);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    private function _getStatus()
    {
        return collect($this->getListStatusByModels()
            ->join('status_language', 'status.id', '=', 'status_language.bind_key')
            // ->join('status_role', 'status.id', '=', 'status_role.status_id')
            ->where('status_language.lang_id', $this->_LANG_ID)
            // ->where('status_role.role_id', $this->_USER->role_module_id)
            ->select(['status.*','status_language.name'])
            ->get()
        );
    }

    public function create(Int $id)
    {
        $order = Orders::findOrFail($id);
        $sale = \App\Http\Models\Users::find($order['person_in_charge']);

        $completion = CompletionReport::where('order_id', $id)->with(['status_detail.status_name'])->orderBy('created_at', 'desc')->get();
        $collect_completion = collect($completion);

        $status = $this->_getStatus();

        $media = collect(Media::query()
            ->where('key', 'completion_report_id')
            ->whereIn('value', array_column($completion->all(), 'id'))->get());

        $status_approved = $status->where('options', 'status-approved')->first()->id;
        $status_pending = $status->where('options', 'status-pending')->first()->id;
        $progress = $collect_completion->where('status', $status_approved)->max('percent');

        $last_submit = $completion->first();

        if (!$last_submit) {
            $last_submit = new stdClass;
            $last_submit->percent = 0;
            $last_submit->status = 0;
        }

        $order['person_in_charge']  = implode(" ", [$sale->first_name, $sale->last_name]);

        $this->_DATA['order'] = (object)$order;
        $this->_DATA['progress'] = $progress ? $progress : 0;
        $this->_DATA['media'] = $media;
        $this->_DATA['completion'] = $completion;
        $this->_DATA['last_submit'] = $last_submit;
        $this->_DATA['submittable'] = $last_submit->status != $status_pending;
        $this->_DATA['status'] = $status;

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Add new period completion
     */
    public function store(Int $id, Request $request)
    {
        $this->validate($request, [
            'completion_report_id' => 'integer',
            'note' => 'required',
            'progress' => 'integer|required',
            'status' => 'integer|required',
            'documents' => 'required',
            'documents.*' => 'mimes:doc,pdf,docx,zip,png,jpg,jpeg,xls,xlsx'
        ]);

        if ($request->has('completion_report_id')) {
            $completion = CompletionReport::find($request->input('completion_report_id'));
        } else {
            $completion = new CompletionReport;
            $completion->order_id = $id;
        }

        $completion->percent = $request->input('progress');
        $completion->status = $request->input('status');
        $completion->note = $request->input('note');
        $completion->created_by = $this->_USER->id;

        $completion->save();

        // if ($request->ajax()) {
            if ($request->hasFile('documents')) {
                $files = $request->file('documents');
                $folderDir = 'uploads/completion-reports/';

                // this form uploads multiple files
                foreach ($files as $fileKey => $fileObject ) {
                    // make sure each file is valid
                    if ($fileObject->isValid()) {
                        // make destination file name
                        $destinationFileName = time() . '_' .  $fileObject->getClientOriginalName();
                        // move the file from tmp to the destination path
                        $fileObject->move($folderDir, $destinationFileName);
                        // save the the destination filename
                        $media = new Media;
                        $media->key = 'completion_report_id';
                        $media->value = $completion->id;
                        $media->name = $fileObject->getClientOriginalName();
			            $media->path = $folderDir . $destinationFileName;
			            $media->save();
                    }
                }
            }
        // }

        return redirect()->back()->with('message', __('Completion submitted successfully!'));
    }

    public function update(Int $id, Request $request)
    {
        $result = new stdClass;
        $result->status = false;

        $this->validate($request, [
            'id' => 'integer',
            'status' => 'string',
        ]);

        $status = $this->_getStatus()->where('options', $request->input('status'))->first();
        $status_approved = $this->_getStatus()->where('options', 'status-approved')->first()->id;
        $completion = CompletionReport::where([
            ['order_id', '=', $id],
            ['id', '=', $request->input('id')]
        ])->with(['status_detail.status_name'])->orderBy('created_at', 'desc')->get();

        if ($completion && $status) {
            $completion = CompletionReport::find($request->input('id'));
            $completion->status = $status->id;
            $completion->updated_by = $this->_USER->id;
            $completion->save();

            $result->status = true;
        }

        if ($completion->percent == 100 && $completion->status == $status_approved) {
            $module = \App\Http\Models\Modules::where('controller', 'Orders')->first();
            $order_status = collect($this->getListStatusByModels($module->id)->with('status_name')->get());

            $order = Orders::find($id);
            $order->status_id = $order_status->where('options', 5)->first()->id;
            $order->save();

            // Tăng chỉ tiêu
            $this->increaseTargetValue($id);
        }

        return response()->json($result);
    }

    private function increaseTargetValue(Int $order_id) {
        $order = Orders::findOrFail($order_id);
        $contract = Contracts::where('order_id', $order_id)->firstOrFail();

        $targetRow = [
            'user_id' => $order->person_in_charge,
            'month' => \Carbon\Carbon::parse($contract->date_signed)->format('m'),
            'year' => \Carbon\Carbon::parse($contract->date_signed)->format('Y')
        ];

        $completion = ConstructionCompletion::where($targetRow)->firstOrFail();

        if ($completion->target > 0) {
            $percent = ceil($contract->price_is_not_vat / $completion->target * 100);
        } else {
            $percent = 0;
        }

        ConstructionCompletion::where($targetRow)->increment('current', $contract->price_is_not_vat);
        ConstructionCompletion::where($targetRow)->increment('percent', $percent);
    }
}
