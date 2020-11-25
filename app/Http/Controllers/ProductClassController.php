<?php

namespace App\Http\Controllers;

use App\Models\ProductClass;
use App\Http\Cores\BackendController;
use App\Http\Helper\ItemHelper;
use Illuminate\Http\Request;
use App\Http\Models\Languages;
use App\Http\Models\MstclassLanguage;
use Yajra\DataTables\Services\DataTable;
use Yajra\DataTables\Html\Builder;
use DB;

class ProductClassController extends BackendController
{
    /**
     * Contruct
     */
    public function __construct() {
        parent::__construct();

        $this->_VIEW = "product-class";
        $this->_ROUTE_FIX  = "admin";
        $this->_DATA["_PAGETITLE"] = __("Product Class Manager");
        $this->_DATA['slug'] = 'product-class';
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
        $this->_DATA['html'] = $builder->columns([
            ['title' => 'Class Key', 'data' => 'ClassKey', 'responsivePriority' => 2, 'searchable' => true],
            ['title' => 'Class Name', 'data' => 'ClassName', 'responsivePriority' => 2],
            ['title' => 'Class Full Name', 'data' => 'ClassFullName', 'responsivePriority' => 3],
            ['title' => 'Keisuu', 'data' => 'Keisuu', 'responsivePriority' => 2, 'searchable' => true, 'name' => 'Value1'],
            ['title' => 'Min Square', 'data' => 'MinSquare', 'responsivePriority' => 2, 'searchable' => true, 'name' => 'Value2'],
            ['title' => 'Install Fee Fixed', 'data' => 'InstallFeeFixed', 'responsivePriority' => 2, 'searchable' => true, 'name' => 'Value3'],
            ['title' => 'Base Price', 'data' => 'BasePrice', 'responsivePriority' => 2, 'searchable' => true, 'name' => 'Value4'],
            ['title' => 'Factory Price', 'data' => 'FactoryPrice', 'responsivePriority' => 2, 'searchable' => true, 'name' => 'Value5'],
            ['title' => 'Class Full Name VN', 'data' => 'ClassFullNameVN', 'responsivePriority' => 4, 'name' => 'Value6'],
            ['title' => 'Class Full Name JP', 'data' => 'ClassFullNameJP', 'responsivePriority' => 4, 'name' => 'Value7'],
            ['title' => 'Actions', 'data' => 'Actions', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()', 'searchable' => false]
        ])
        ->ajax([
            'url' => route('admin.product-class.datatable'),
            'type' => 'POST',
        ])
        ->parameters($this->_ConfigTable);
        $langs = Languages::get();
        $this->_DATA["languages"]   = $langs;
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function datatable()
    {
        $query = DB::table('mstclass')
            ->select('ClassKey', 'ClassName', 'ClassFullName', 'Value1 as Keisuu', 'Value2 as MinSquare', 'Value3 as InstallFeeFixed', 'Value4 as BasePrice', 'Value5 as FactoryPrice', 'Value6 as ClassFullNameVN', 'Value7 as ClassFullNameJP')
            ->where('Class', 1);
            // ->leftJoin('mstitemclass', 'mstitem.ItemClassId', '=', 'mstitemclass.ItemClassId');

        return datatables($query)
            ->addColumn('Actions', 'product-class.context-menu')
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
    public function store(Request $request, ProductClass $model)
    {
        //
        $result = new \stdClass;
        $result->message = 'OK';
        $result->error = false;
        $status_code = 200;

        $model->Class = $model->ClassNumber;
        $model->ClassKey = $model->lastClassKey() + 1;
        $model->ClassName = $request->ClassName;
        $model->ClassFullName = $request->ClassFullName;
        $model->Value1 = $request->Keisuu;
        $model->Value2 = $request->MinSquare;
        $model->Value3 = $request->InstallFeeFixed;
        $model->Value4 = $request->BasePrice;
        $model->Value5 = $request->FactoryPrice;
        $model->Value6 = $request->ClassFullNameVN;
        $model->Value7 = $request->ClassFullNameJP;

        try {
            $result->error = !$model->save();
            $langs        = Languages::get();
            $listColums   = $this->_GetTableColumns(MstclassLanguage::getTableName());
            foreach ($langs as $key => $value) {
                $post = @$request->languages[$value->id];
                if (@$post) {
                    $check = MstclassLanguage::where(
                        [
                            ["lang_id", "=", $value->id],
                            ["bind_key", "=", $model->ClassKey],
                        ]
                    )->first();
                    if ($check == null) {
                        $check           = new MstclassLanguage();
                        $check->lang_id  = $value->id;
                        $check->bind_key = $model->ClassKey;
                    }

                    foreach ($post as $key1 => $value1) {
                        if (in_array($key1, $listColums)) {
                            if ($key1 != "id") {
                                $check->{$key1} = $value1;
                            }
                        }
                    }
                    $check->save();

                }
            }
        } catch (\Illuminate\Database\QueryException $e) {
            $result->message = $e->getMessage();
            $result->error = true;
            $status_code = 400;
        }

        return response()
            ->json($result, $status_code);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\ProductClass  $productClass
     * @return \Illuminate\Http\Response
     */
    public function show($id, ProductClass $model)
    {
        //
        $response = $model
            ->select('ClassKey', 'ClassName', 'ClassFullName', 'Value1 as Keisuu', 'Value2 as MinSquare', 'Value3 as InstallFeeFixed', 'Value4 as BasePrice', 'Value5 as FactoryPrice', 'Value6 as ClassFullNameVN', 'Value7 as ClassFullNameJP')
            ->where([
                ['Class', '=', 1],
                ['ClassKey', '=', $id]
            ])->first();
        $langs        = Languages::get();
        $languages    = [];
        foreach ($langs as $key => $value) {
            $languages[$value->id] = DB::table("mstclass_language")->where([
                ["bind_key","=",$id],
                ['lang_id' ,"=",$value->id]
            ])->first();
        }
        $response['languages'] = $languages;
        return response()->json($response, is_null($response) ? 404 : 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\ProductClass  $productClass
     * @return \Illuminate\Http\Response
     */
    public function edit(ProductClass $productClass)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\ProductClass  $productClass
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductClass $model)
    {
        //
        $result = new \stdClass;
        $result->message = 'OK';
        $result->error = false;
        $status_code = 200;

        $model = $model
            ->where('Class', '=', $model->ClassNumber)
            ->where('ClassKey', '=', $request->ClassKey);

        // $model->Class = 1;
        // $model->ClassKey = $request->ClassKey;
        // $model->Value6 = $request->ClassFullNameVN;
        // $model->Value7 = $request->ClassFullNameJP;

        //try {
            $result->error = !$model->update([
                'ClassName' => $request->ClassName,
                'ClassFullName' => $request->ClassFullName,
                'Value1' => $request->Keisuu,
                'Value2' => $request->MinSquare,
                'Value3' => $request->InstallFeeFixed,
                'Value4' => $request->BasePrice,
                'Value5' => $request->FactoryPrice,
            ]);
            $langs        = Languages::get();
            $listColums   = $this->_GetTableColumns(MstclassLanguage::getTableName());
            foreach ($langs as $key => $value) {
                $post = @$request->languages[$value->id];
                if (@$post) {
                    $check = MstclassLanguage::where(
                        [
                            ["lang_id", "=", $value->id],
                            ["bind_key", "=", $request->ClassKey],
                        ]
                    )->first();

                    if ($check == null) {
                        $check           = new MstclassLanguage();
                        $check->lang_id  = $value->id;
                        $check->bind_key = $request->ClassKey;
                    }

                    foreach ($post as $key1 => $value1) {
                        if (in_array($key1, $listColums)) {
                            if ($key1 != "id") {
                                $check->{$key1} = $value1;
                            }
                        }
                    }

                    $check->save();


                }
            }
        //} catch (\Illuminate\Database\QueryException $e) {
           // $result->message = $e->getMessage();
           // $result->error = true;
            //$status_code = 400;
        //}
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\ProductClass  $productClass
     * @return \Illuminate\Http\Response
     */
    public function destroy(ProductClass $productClass)
    {
        //
    }
}
