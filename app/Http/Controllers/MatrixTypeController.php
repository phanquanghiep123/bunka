<?php

namespace App\Http\Controllers;

use App\Models\Matrix;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\DB;

class MatrixTypeController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "matrix";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Matrix Type Management");
        $this->_DATA['slug'] = "matrix-type";
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
        //
        $this->_DATA['html'] = $builder->columns([
            ['title' => 'ID', 'data' => 'ClassKey', 'responsivePriority' => 2],
            ['title' => 'Class Name', 'data' => 'ClassName', 'responsivePriority' => 2],
            ['title' => 'Class Full Name', 'data' => 'ClassFullName', 'responsivePriority' => 2],
            ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.matrix-type.datatable'),
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
        return datatables($matrix->matrixTypeFromClass())
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
    public function store(Request $request)
    {
        //
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
        $response = $this->matrixTypeFromClass()->where('ClassKey', '=', $id)->first();

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
        //
    }
}
