<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\DB;

class MatrixValueController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "matrix";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Matrix Value Management");
        $this->_DATA['slug'] = "matrix-value";
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
    public function index(Builder $builder, Matrix $matrix)
    {
        //
        $this->_DATA['matrixtypes'] = $matrix->matrixTypeFromCache();
        $this->_DATA['html'] = $builder->columns([
            ['title' => 'ID', 'data' => 'ClassKey', 'responsivePriority' => 2],
            ['title' => 'Matrix Type', 'data' => 'ClassName', 'responsivePriority' => 2],
            ['title' => 'Class Full Name', 'data' => 'ClassFullName', 'responsivePriority' => 2],
            ['title' => 'Door/Frame', 'data' => 'DoorFrame', 'responsivePriority' => 2],
            ['title' => 'Width', 'data' => 'Width', 'responsivePriority' => 2],
            ['title' => 'Height', 'data' => 'Height', 'responsivePriority' => 2],
            ['title' => 'Price', 'data' => 'Price', 'responsivePriority' => 2],
            ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.matrix-value.datatable'),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            'searching' => false,
            'info' => false,
            // 'ordering' => false,
            'order' => [
                [
                    0, 'asc'
                ]
            ]
        ]);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * DataTable Data Generate
     */
    public function datatable(Matrix $matrix)
    {
        $query = DB::table('mstclass as class')
            ->select(
                DB::raw('CAST(class.ClassKey AS UNSIGNED INTEGER) as ClassKey'),
                'class.Value1 as MatrixType',
                DB::raw('(SELECT ClassName FROM mstclass WHERE Class = 6 AND ClassKey = class.Value1) AS ClassName'),
                DB::raw('(SELECT ClassFullName FROM mstclass WHERE Class = 6 AND ClassKey = class.Value1) AS ClassFullName'),
                'class.Value2 as DoorFrame',
                DB::raw('CAST(class.Value3 AS UNSIGNED INTEGER) as Width'),
                DB::raw('CAST(class.Value4 AS UNSIGNED INTEGER) as Height'),
                DB::raw('CAST(class.Value5 AS DECIMAL(10,2)) as Price')
            )
            ->where('class.Class', 7);

        return datatables($query)
            ->addColumn('Actions', 'matrix.context-menu')
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
    public function store(Request $request, Matrix $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $maxClassKey = $model->lastClassKey();

        $model->Class = 7; // Matrix Value
        $model->ClassKey = $maxClassKey->ClassKey + 1;
        $model->Value1 = $request->MatrixType;
        $model->Value2 = $request->DoorFrame ?? 0;
        $model->Value3 = $request->Width;
        $model->Value4 = $request->Height;
        $model->Value5 = $request->Price;

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
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function show($id, Matrix $model)
    {
        //
        $response = $model
            ->select(
                'ClassKey',
                'Value1 AS MatrixType',
                'Value2 AS DoorFrame',
                'Value3 AS Width',
                'Value4 AS Height',
                'Value5 AS Price'
            )
            ->where('ClassKey', '=', $id)->first();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function edit(Matrix $matrix)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Matrix $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model = $model->where([
            ['Class', '=', 7],
            ['ClassKey', '=', $request->Id]
        ]);

        try {
            $response->error = !$model->update([
                'Value1' => $request->MatrixType,
                'Value2' => $request->DoorFrame ?? 0,
                'Value3' => $request->Width,
                'Value4' => $request->Height,
                'Value5' => $request->Price
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
     * @param  \App\Models\Matrix  $matrix
     * @return \Illuminate\Http\Response
     */
    public function destroy(Matrix $matrix)
    {
        //
    }
}
