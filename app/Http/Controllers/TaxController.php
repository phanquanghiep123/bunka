<?php

namespace App\Http\Controllers;

use App\Models\Tax;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;

class TaxController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "tax";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = "Tax Management";
        $this->_DATA['slug'] = 'tax';
        $this->_ROLNAMES = [
            'view' => ['index','datatable','show'],
            'delete' => ['delete','destroy'],
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
            ['title' => 'Name', 'data' => 'Name', 'responsivePriority' => 2],
            ['title' => 'Tax Rate (%)', 'data' => 'TaxRate', 'responsivePriority' => 2],
            ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.tax.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * DataTable Data Generate
     */
    public function datatable(Tax $tax)
    {
        $query = $tax->get();

        return datatables($query)
            ->addColumn('Actions', 'tax.context-menu')
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
    public function store(Request $request, Tax $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $maxClassKey = $model->lastClassKey();

        $model->Class = $model->ClassNumber;
        $model->ClassKey = $maxClassKey->ClassKey + 1;
        $model->ClassName = $request->Name;
        $model->Value1 = $request->TaxRate;

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
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function show($id, Tax $model)
    {
        //
        $response = $model->get()->where('ClassKey', $id)->first();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function edit(Tax $tax)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model = $model->where([
            ['Class', '=', 3],
            ['ClassKey', '=', $request->Id]
        ]);

        try {
            $response->error = !$model->update([
                'ClassName' => $request->Name,
                'Value1' => $request->TaxRate
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
     * @param  \App\Models\Tax  $tax
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        //
    }
}
