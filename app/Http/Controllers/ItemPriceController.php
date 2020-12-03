<?php

namespace App\Http\Controllers;

use App\Models\ItemPrice;
use App\Models\ItemClass;
use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ItemPriceExport;
use App\Imports\ItemPriceImport;

class ItemPriceController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "item-price";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Item Price Management");
        $this->_DATA['slug'] = 'item-price';
        $this->_ROLNAMES = [
            'view' => ['index', 'datatable', 'show', 'export'],
            'delete' => ['delete'],
            'update' => ['update','show', 'import', 'importing'],
            'add' => ['create','store', 'import', 'importing']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder, ItemPrice $model)
    {
        $this->_DATA['html'] = $builder->columns([
            ['title' => __('Group Class Key'), 'data' => 'GroupClassKey', 'visible' => false],
            ['title' => __('Item Class Id'), 'data' => 'ItemClassId', 'name' => 'mstitem.ItemClassId', 'visible' => false],
            ['title' => __('Item'), 'data' => 'ItemName', 'name' => 'mstitem.ItemName'],
            ['title' => __('Product Class'), 'data' => 'ClassName', 'name' => 'groupclass.ClassName'],
            ['title' => __('Item Class'), 'data' => 'ItemClassName', 'name' => 'mstitemclass.ItemClassName'],
            ['title' => __('Unit Price'), 'data' => 'UnitPrice', 'class' => 'text-right', 'searchable' => false],
            ['title' => __('Unit Price Other'), 'data' => 'UnitPriceOther', 'class' => 'text-right', 'searchable' => false],
            ['title' => __('Valid From'), 'data' => 'ValidFrom', 'class' => 'text-center', 'searchable' => false],
            ['title' => __('Valid To'), 'class' => 'text-center', 'data' => 'ValidTo', 'render' => '(data) ? data : "-"', 'searchable' => false],
            ['title' => __('Actions'), 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ])->ajax([
            'url' => route('admin.item-price.datatable'),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            // 'searching' => false,
            'info' => false,
            'dom' => 'lrtip'
        ]);

        $this->_DATA['groupclass'] = $model->groupClass()->get();
        $this->_DATA['itemclass'] = ItemClass::select(['ItemClassId', 'ItemClassName'])->get();

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * DataTable service
     *
     * @return void
     */
    public function datatable(ItemPrice $model)
    {
        $query = $model->itemPrices();

        return datatables($query)
            ->addColumn('Actions', 'item-price.context-menu')
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
    public function store(Request $request, ItemPrice $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model->GroupClassKey = $request->ClassKey;
        $model->ItemId = $request->ItemId;
        $model->UnitPrice = $request->UnitPrice;
        $model->UnitPriceOther = $request->UnitPriceOther;

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
     * @param  \App\Models\ItemPrice  $itemPrice
     * @return \Illuminate\Http\Response
     */
    public function show(Int $id, ItemPrice $model)
    {
        //
        $response = $model->byItemId($id);

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\ItemPrice  $itemPrice
     * @return \Illuminate\Http\Response
     */
    public function edit(ItemPrice $itemPrice)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\ItemPrice  $itemPrice
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ItemPrice $model)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $model = $model->where('ItemId', '=', $request->Id);

        try {
            $response->error = !$model->update([
                'UnitPrice' => $request->UnitPrice,
                'UnitPriceOther' => $request->UnitPriceOther
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
     * @param  \App\Models\ItemPrice  $itemPrice
     * @return \Illuminate\Http\Response
     */
    public function destroy(ItemPrice $itemPrice)
    {
        //
    }

    /**
     * Export excel all item price
     */
    public function export()
    {
        return Excel::download(new ItemPriceExport, 'ItemPrice.xlsx');
    }

    public function import()
    {
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function importing(Request $request) {

        $this->validate($request, [
            'valid_date' => 'required|date',
            'importing_file' => 'required',
            'importing_file.*' => 'mimes:xls,xlsx'
        ]);

        if ($request->hasFile('importing_file')) {
            // Excel::import(new ItemPriceImport, $request->file('your_file'));
            $input_data = Excel::toArray(new ItemPriceImport, $request->file('importing_file'));
            $import_data = array_shift($input_data);
            $valid_date = $request->input('valid_date');
            $dbdata = DB::table('mstitemprice')
            ->select([
                'ItemId',
                'UnitPrice',
                'UnitPriceOther',
                DB::raw('MAX(ValidFrom) AS ValidFrom')
            ])
            ->where('ValidFrom', '<', DB::raw('NOW()'))
            ->groupBy('ItemId')->get()->toArray();

            // Prepairing input data to compare
            $import_data_array = array_map(function ($row) {
                return serialize([
                    "ItemId" => (int)$row['ItemId'],
                    "UnitPrice" => is_null($row['UnitPrice']) ? NULL : (float)$row['UnitPrice'],
                    "UnitPriceOther" => is_null($row['UnitPriceOther']) ? NULL : (float)$row['UnitPriceOther'],
                    "ValidFrom" => $row["ValidFrom"]
                ]);
            }, $import_data);

            // Prepairing data from database
            $dbdata_array = array_map(function ($row) {
                return serialize([
                    "ItemId" => $row->ItemId,
                    "UnitPrice" => $row->UnitPrice,
                    "UnitPriceOther" => $row->UnitPriceOther,
                    "ValidFrom" => $row->ValidFrom
                ]);
            }, $dbdata);

            $result = array_diff($import_data_array, array_unique($dbdata_array));

            // $result = array_map(function ($key) use ($import_data) {
            //     $import_data[$key]["ValidFrom"] = date("Y-m-d H:i:s");
            //     return $import_data[$key];
            // }, array_keys($result));

            foreach (array_keys($result) as $key) {
                $import_data[$key]["ValidFrom"] = date("Y-m-d H:i:s", strtotime("{$valid_date} 00:00:00"));
                $item = $import_data[$key];
                $search = ['ItemId' => $item['ItemId']];
                $update = [
                    'UnitPrice' => $item['UnitPrice'],
                    'UnitPriceOther' => $item['UnitPriceOther'],
                    'ValidFrom' => $item['ValidFrom'],
                    'ValidTo' => null
                ];

                // ItemPrice::updateOrCreate($search, $update);
                $itemPrice = new ItemPrice;
                $itemPrice->ItemId = $item['ItemId'];
                $itemPrice->GroupClassKey = ItemPrice::where('ItemId', $item['ItemId'])->first()->GroupClassKey;
                $itemPrice->UnitPrice = is_null($item['UnitPrice']) ? 0 : $item['UnitPrice'];
                $itemPrice->UnitPriceOther = $item['UnitPriceOther'];
                $itemPrice->ValidFrom = $item['ValidFrom'];
                $itemPrice->ValidTo = null;
                $itemPrice->save();
            }

            return redirect()->back()->with('message', 'Importing successfully!');
        }
    }
}
