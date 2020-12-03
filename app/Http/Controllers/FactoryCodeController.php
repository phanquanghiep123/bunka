<?php

namespace App\Http\Controllers;

use App\Models\FactoryItem;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use App\Models\FactoryItemExtends;
use App\Models\FactoryItemNotes;
use stdClass;
use Yajra\DataTables\Html\Builder as DataTablesHtmlBuilder;
use Yajra\DataTables\Facades\DataTables;

class FactoryCodeController extends BackendController
{
    private $slug = 'factory-code';
    /**
     * Contructor
     */
    public function __construct() {
        parent::__construct();
        $this->_ROUTE_FIX  = 'admin';
        $this->_VIEW = $this->slug;
        $this->_DATA["_PAGETITLE"] = __('Factory Code Management');
        $this->_DATA['slug'] = $this->slug;
        $this->_ROLNAMES = [
            'view' => ['index', 'datatable', 'show'],
            'delete' => ['delete', 'destroy'],
            'update' => ['update', 'show', 'edit'],
            'add' => ['create', 'store']
        ];

        $this->table_columns = [
            ['data' => 'FactoryCode', 'title' => __('Factory Number')],
            ['data' => 'FactoryName', 'title' => __('Factory Name')],
            ['data' => 'type', 'title' => __('Product Type')],
            ['data' => 'note', 'title' => __('Note')],
            ['data' => 'items_count', 'title' => __('Items'), 'searchable' => false],
            ['title' => __('Actions'), 'data' => 'actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ];
    }

    /**
     * Datatable for index
     */
    public function datatable(FactoryItem $factoryItems)
    {
        # code...
        $model = FactoryItem::query()->withCount('items')->with(['note','type']);
        return DataTables::eloquent($model)
            ->editColumn('note', function ($row) {
                return $row->note === null ? '' : $row->note->note;
            })
            ->editColumn('type', function ($row) {
                return $row->type->Type;
            })
            ->addColumn('actions', "{$this->slug}.context-menu")
            ->make(true);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(DataTablesHtmlBuilder $builder)
    {
        //
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

        $this->_DATA['languages'] = \App\Http\Models\Languages::select(['id','locale', 'is_default','name'])->get();

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $factoryItem = new FactoryItem;
        $factoryItem->FactoryCode = $request->FactoryCode;
        $factoryItem->FactoryName = $request->FactoryName;

        $response = $factoryItem->save();

        if ($response) {
            $factoryItemExtend = new FactoryItemExtends;
            $factoryItemExtend->FactoryCode = $request->FactoryCode;
            $factoryItemExtend->Type = $request->FactoryType;
            $response = $factoryItemExtend->save();

            $notes = array_map(function ($lang_id) use ($request) {
                return [
                    'lang_id' => $lang_id,
                    'factory_code' => $request->FactoryCode,
                    'note' => $request->Note[$lang_id]
                ];
            }, array_keys($request->Note));

            if (!empty($notes)) {
                $response = FactoryItemNotes::insert($notes);
            }
        }

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FactoryItem  $factoryItem
     * @return \Illuminate\Http\Response
     */
    public function show(String $id, FactoryItem $factoryItem)
    {
        //
        $response = FactoryItem::with(['type','notes'])->where('FactoryCode', $id)->first();

        if (!is_null($response)) {
            $data = new stdClass;
            $data->FactoryCode = $response->FactoryCode;
            $data->FactoryName = $response->FactoryName;
            $data->FactoryType = $response->type->Type;

            if (!empty($response->notes)) {
                foreach ($response->notes as $key => $note) {
                    $data->{"Note[$note->lang_id]"} = $note->note;
                }
            }

            $response = $data;
        }

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FactoryItem  $factoryItem
     * @return \Illuminate\Http\Response
     */
    public function edit(FactoryItem $factoryItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\FactoryItem  $factoryItem
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
        $response = $request;

        $factoryItem = FactoryItem::find($request->FactoryCode);
        $factoryItem->FactoryName = $request->FactoryName;

        $response = $factoryItem->save();

        if ($response) {
            FactoryItemExtends::where('FactoryCode', $request->FactoryCode)->update([
                'Type' => $request->FactoryType
            ]);

            foreach ($request->Note as $lang_id => $note) {
                FactoryItemNotes::updateOrCreate(
                    ['note' => $note],
                    ['factory_code' => $request->FactoryCode, 'lang_id' => $lang_id]
                );
            }
        }

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FactoryItem  $factoryItem
     * @return \Illuminate\Http\Response
     */
    public function destroy(Int $id, FactoryItem $factoryItem)
    {
        //
        $response = FactoryItem::where('FactoryCode', $id)->delete();

        if ($response) {
            FactoryItemExtends::where('FactoryCode', $id)->delete();
            FactoryItemNotes::where('factory_code', $id)->delete();
        }

        return response()->json($response, is_null($response) ? 404 : 200);
    }
}
