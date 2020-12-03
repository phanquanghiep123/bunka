<?php

namespace App\Http\Controllers;

use App\Models\PricePattern;
use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\DB;

class PricePatternController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();
        $this->_VIEW = "price-pattern";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = "Price Pattern Management";
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
        $this->_DATA['html'] = $builder->columns([
            ['title' => 'ID', 'data' => 'ClassKey', 'responsivePriority' => 2],
            ['title' => 'Name', 'data' => 'ClassName', 'responsivePriority' => 2],
            ['title' => 'Full Name', 'data' => 'ClassFullName', 'responsivePriority' => 2],
            // ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.price-pattern.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * DataTable Data Generate
     */
    public function datatable()
    {
        $query = DB::table('mstclass')
            ->select('ClassKey', 'ClassName', 'ClassFullName')
            ->where('Class', 5);

        return datatables($query)
            // ->addColumn('Actions', 'price-pattern.context-menu')
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
     * @param  \App\Models\PricePattern  $pricePattern
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id, PricePattern $pricePattern)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PricePattern  $pricePattern
     * @return \Illuminate\Http\Response
     */
    public function edit(PricePattern $pricePattern)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PricePattern  $pricePattern
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PricePattern $pricePattern)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PricePattern  $pricePattern
     * @return \Illuminate\Http\Response
     */
    public function destroy(PricePattern $pricePattern)
    {
        //
    }
}
