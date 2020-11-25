<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\DB;

class CurrencyController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "currency";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Currency Management");
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
            ['title' => 'Name', 'data' => 'ClassName', 'responsivePriority' => 2],
            ['title' => 'Exchange Rate', 'data' => 'ExchangeRate', 'responsivePriority' => 2],
            ['title' => 'Default', 'data' => 'Default', 'class' => 'text-center', 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
            ['title' => 'Actions', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.currency.datatable'),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            'searching' => false,
            'info' => false,
            'previous' => '&laquo; [_previous_]',
            'next' => '[_next_] &raquo;',
            // 'ordering' => false,
        ]);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * DataTable Data Generate
     */
    public function datatable()
    {
        $query = DB::table('mstclass')
            ->select('ClassKey', 'ClassName', 'Value1 as ExchangeRate', 'Value2 as IsDefault')
            ->where('Class', 2);

        return datatables($query)
            ->addColumn('Default', 'currency.default-button')
            ->addColumn('Actions', 'currency.context-menu')
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
    public function store(Request $request, Currency $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model->Class = 2; // Currency
        $model->ClassKey = $request->ClassKey;
        $model->ClassName = $request->ClassName;
        $model->Value1 = $request->ExchangeRate;
        $model->Value2 = $request->IsDefault ?? 0;

        try {
            if ($request->IsDefault == 1)
                $this->removeDefault();

            $response->error = !$model->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $response->message = $e->getMessage();
            $response->error = true;
        }

        return response()->json($response, $response->error ? 400 : 200);
    }

    private function removeDefault()
    {
        Currency::where('Class', '=', 2)
            ->update([
                'Value2' => 0
            ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id, Currency $currency)
    {
        //
        $response = $currency
            ->select('ClassKey','ClassName', 'Value1 as ExchangeRate', 'Value2 as IsDefault')
            ->where([
                ['ClassKey', '=', $id],
                ['Class', '=', 2] // Currency
            ])->first();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function edit(Currency $currency)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Currency $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model = $model->where([
            ['Class', '=', 2],
            ['ClassKey', '=', $request->Id]
        ]);

        try {
            if ($request->IsDefault == 1)
                $this->removeDefault();

            $response->error = !$model->update([
                'ClassName' => $request->ClassName,
                'Value1' => $request->ExchangeRate,
                'Value2' => $request->IsDefault ?? 0
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
     * @param  \App\Models\Currency  $currency
     * @return \Illuminate\Http\Response
     */
    public function destroy(Currency $currency)
    {
        //
    }
}
