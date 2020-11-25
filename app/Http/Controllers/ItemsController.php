<?php

namespace App\Http\Controllers;

use App\Models\Items;
use App\Models\ItemClass;
use App\Models\ItemPrice;
use App\Models\Classes;
use App\Models\FactoryItem;
use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use DB;
use Illuminate\Support\Facades\Input;

class ItemsController extends BackendController
{
    private $table_columns;

    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "items";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = "Items Management";
        $this->_DATA['slug'] = 'items';
        $this->_DATA['itemclass'] = ItemClass::select(['ItemClassId', 'ItemClassName'])->get();
        $this->_ROLNAMES = [
            'view' => ['index','datatable','show'],
            'delete' => ['delete'],
            'update' => ['update','show', 'query','by_item_class'],
            'add' => ['create','store', 'query','by_item_class']
        ];

        $this->table_columns = [
            ['title' => __('ID'), 'data' => 'ItemId', 'responsivePriority' => 2],
            ['title' => __('Name'), 'data' => 'ItemName', 'responsivePriority' => 2],
            ['title' => __('Item Class'), 'data' => 'ItemClassName', 'responsivePriority' => 2, 'name' => 'mstitemclass.ItemClassName'],
            ['title' => __('Price Key'), 'data' => 'ClassName', 'responsivePriority' => 2, 'name' => 'mstclass.ClassName'],
            ['title' => __('VN'), 'data' => 'ItemNameVN', 'responsivePriority' => 3],
            ['title' => __('JP'), 'data' => 'ItemNameJP', 'responsivePriority' => 3],
            ['title' => __('Factory Name'), 'data' => 'FactoryName', 'responsivePriority' => 2, 'name' => 'mstfactoryitem.FactoryName'],
            ['title' => __('Actions'), 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()']
        ];
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Builder $builder)
    {
        $this->_DATA['itemclasses'] = ItemClass::select(['ItemClassId', 'ItemClassName'])->get();
        $this->_DATA['pricekeys'] = Classes::select(['ClassKey', 'ClassName'])->where('Class', 6)->get();
        $this->_DATA['factoryitems'] = FactoryItem::all();
        $this->_DATA['html'] = $builder->columns($this->table_columns)->ajax([
            'url' => route('admin.items.datatable'),
            'type' => 'POST',
        ])->parameters([
            'lengthChange' => false,
            // 'searching' => false,
            'info' => false,
            // 'ordering' => false,
            'dom' => 'lrtip'
        ]);

        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function datatable()
    {
        $query = DB::table('mstitem')
            ->select('mstitem.ItemId','mstitem.ItemName','mstitemclass.ItemClassName','mstitem.ItemNameVN','mstitem.ItemNameJP','mstitem.FactoryCode','mstclass.ClassName', 'mstfactoryitem.FactoryName')
            ->leftJoin('mstitemclass', 'mstitem.ItemClassId', '=', 'mstitemclass.ItemClassId')
            ->leftJoin('mstfactoryitem', 'mstitem.FactoryCode', '=', 'mstfactoryitem.FactoryCode')
            ->leftJoin('mstclass', function ($join) {
                $join->on('mstclass.ClassKey', '=', 'mstitem.PricePatternKey')->whereIn('mstclass.Class', [6]);
            });
            // ->whereNotNull('mstitem.PricePatternKey');

        return datatables($query)
            ->addColumn('Actions', 'items.context-menu')
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
    public function store(Request $request, Items $items)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $items->ItemName = $request->ItemName;
        $items->ItemNameVN = $request->ItemNameVN;
        $items->ItemNameJP = $request->ItemNameJP;
        $items->ItemClassId = $request->ItemClassId;
        $items->PricePatternKey = $request->PricePatternKey;
        $items->FactoryCode = $request->FactoryCode;

        try {
            $response->error = !$items->save();
        } catch (\Illuminate\Database\QueryException $e) {
            $response->message = $e->getMessage();
            $response->error = true;
        }

        return response()->json($response, $response->error ? 400 : 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function show($id, Items $items)
    {
        //
        $response = $items
            ->where('ItemId', $id)->first();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function edit(Items $items)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Items $items)
    {
        //
        $response = new \stdClass;
        $response->message = 'OK';
        $response->error = false;

        $items = $items->where('ItemId', '=', $request->Id);

        try {
            $response->error = !$items->update([
                'ItemName' => $request->ItemName,
                'ItemClassId' => $request->ItemClassId,
                'PricePatternKey' => $request->PricePatternKey,
                'FactoryCode' => $request->FactoryCode
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
     * @param  \App\Models\Items  $items
     * @return \Illuminate\Http\Response
     */
    public function destroy(Items $items)
    {
        //
    }

    /**
     *
     */
    public function query(Items $items, ItemPrice $itemPrice)
    {
        //
        $classKey = Input::get('class', 0);
        $itemClass = Input::get('type', 0);
        $term = Input::get('term', '');
        $page = Input::get('page', 0);
        $price = Input::get('price', 0);

        $response = [
            'results' => []
        ];

        if (intval($page) > 0) {
            $response['pagination'] = [
                'more' => intval($page) > 0
            ];
        }

        $query = $itemPrice->itemPrices()
            ->select('mstitemprice.ItemId as id', 'mstitem.ItemName as text')
            ->where('mstitemprice.GroupClassKey', $classKey);

        if (intval($itemClass) > 0) {
            $query->whereIn('mstitem.ItemClassId', [$itemClass]);
        }

        if (!empty($term)) {
            $query->where('mstitem.ItemName', 'like', "%{$term}%");
        }

        if($price > 0) {
            $query->where('mstitemprice.UnitPrice', '>', 0);
        }

        $response['results'] = $query->get();

        return response()->json($response, is_null($response) ? 404 : 200);
    }

    public function by_item_class(Items $items)
    {
        $itemClass = Input::get('type', 0);
        $term = Input::get('term', '');
        $response = [
            'results' => []
        ];

        if ($itemClass > 0) {
            $query = $items->where('ItemClassId', $itemClass)
                ->select('ItemId as id', 'ItemName as text');

            if (!empty($term)) {
                $query->where('ItemName', 'like', "%{$term}%");
            }

            $response['results'] = $query->get();
        }

        return response()->json($response, is_null($response) ? 404 : 200);
    }
}
