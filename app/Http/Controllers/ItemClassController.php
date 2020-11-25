<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use App\Models\ItemClass;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use DB;

class ItemClassController extends BackendController
{
    private $table_columns = [
        ['data' => 'ItemClassName', 'title' => 'Item Class Name'],
        ['data' => 'Unit', 'title' => 'Unit', 'class' => 'text-center', 'filter' => true],
        ['data' => 'WInputFlg', 'title' => 'Width Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
        ['data' => 'HInputFlg', 'title' => 'Height Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
        ['data' => 'QInputFlg', 'title' => 'Quantity Input', 'class' => 'text-center', 'render' => '(data == 1) ? \'<i class="mdi mdi-check"></i>\':\'\'', 'filter' => true],
        ['data' => 'PricePattern', 'title' => 'Price Pattern', 'filter' => true],
        ['data' => 'DispOrder', 'title' => 'Display Order', 'class' => 'text-center', 'filter' => true],
        ['data' => 'ParentItemClassName', 'title' => 'Parent Item Class', 'name' => 'parentitemclass.ParentItemClassName', 'filter' => true],
        ['data' => 'FormatPattern', 'title' => 'Format Pattern', 'filter' => true],
        // ['data' => 'ItemClassNameVN', 'title' => 'Item Class Name (VN)'],
        // ['data' => 'FormatPatternVN', 'title' => 'Format Pattern (VN)'],
        // ['data' => 'ItemClassNameJP', 'title' => 'Item Class Name (JP)'],
        // ['data' => 'FormatPatternJP', 'title' => 'Format Pattern (JP)'],
        ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
    ];

    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "item-class";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Item Class Management");
        $this->_DATA['slug'] = 'item-class';
        $this->_DATA['filter_fields'] = $this->table_columns;
        $this->_ROLNAMES = [
            'view' => ['index','datatable','show'],
            'delete' => ['delete'],
            'update' => ['update','show'],
            'add' => ['create','store']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $this->_DATA['parents'] = ItemClass::select(['ItemClassId', 'ItemClassName'])->get();
        $this->_DATA['patterns'] = DB::table('mstclass')->select('ClassKey', 'ClassName as PricePattern')->where('Class', 5)->get();
        $this->_DATA['html'] = $builder->columns($this->table_columns)->ajax([
            'url' => route('admin.item-class.datatable'),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            // 'searching' => false,
            'info' => false,
            'order' => [
                [
                    6, 'asc'
                ]
            ],
            'dom' => 'lrtip'
        ]);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function datatable()
    {
        // $query = ItemClass::query()->hasOne('App\Models\Classes', 'ClassKey', 'PricePattern');
        $mstclass = DB::table('mstclass')
            ->select('ClassKey', 'ClassName as PricePattern', 'ClassFullName as Description')
            ->where('Class', 5);

        $mstitemclass = DB::table('mstitemclass')
            ->select('ItemClassId as Id', 'ItemClassName as ParentItemClassName');

        $query = DB::table('mstitemclass')
            ->leftJoinSub($mstclass, 'mstclass', function ($join) {
                $join->on('mstclass.ClassKey','=','mstitemclass.PricePattern');
            })
            ->leftJoinSub($mstitemclass, 'parentitemclass', function ($join) {
                $join->on('parentitemclass.Id','=','mstitemclass.ParentItemClassId');
            });

        return datatables($query)
            ->addColumn('Actions', 'item-class.context-menu')
            ->toJson();
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
    public function store(Request $request, ItemClass $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model->ItemClassName = $request->ItemClassName;
        $model->ParentItemClassId = $request->ParentItemClassId;
        $model->Unit = $request->Unit;
        $model->PricePattern = $request->PricePattern;
        $model->DispOrder = $request->DispOrder;
        $model->FormatPattern = $request->FormatPattern;
        $model->DispOrder = $request->DispOrder ?? 999;
        $model->WInputFlg = $request->WInputFlg ?? 0;
        $model->HInputFlg = $request->HInputFlg ?? 0;
        $model->QInputFlg = $request->QInputFlg ?? 0;

        try {
            $response->error = !$model->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $response->message = $e->getMessage();
            $response->error = true;
        }

        return response()->json($response, $response->error ? 400 : 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id, ItemClass $model)
    {
        //
        $response = $model
            ->where('ItemClassId', $id)->first();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemClass $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model = $model->where('ItemClassId', '=', $request->ItemClassId);

        try {
            $response->error = !$model->update([
                'ItemClassName' => $request->ItemClassName,
                'ParentItemClassId' => $request->ParentItemClassId,
                'Unit' => $request->Unit,
                'PricePattern' => $request->PricePattern,
                'DispOrder' => $request->DispOrder,
                'FormatPattern' => $request->FormatPattern,
                'DispOrder' => $request->DispOrder ?? 999,
                'WInputFlg' => $request->WInputFlg ?? 0,
                'HInputFlg' => $request->HInputFlg ?? 0,
                'QInputFlg' => $request->QInputFlg ?? 0
            ]);
        } catch (\Illuminate\Database\QueryException $e) {
            $response->message = $e->getMessage();
            $response->error = true;
        }

        return response()->json($response, $response->error ? 400 : 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
