<?php

namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use App\Http\Models\ExcelTemplates;
use App\Http\Models\ExcelTemplatesLanguage;
use App\Http\Models\Languages;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use DB;
class ExcelTemplatesController extends BackendController
{
    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES['view']     = array_merge($this->_ROLNAMES['view'], [
            "datatable",
        ]);
        parent::__construct();
        $this->_TABLE              = "excel_templates";
        $this->_VIEW               = "excel_templates";
        $this->_NAME               = "excel_templates";
        $this->_ROUTE_FIX          = "excel_templates";
        $this->_DATA["_PAGETITLE"] = "[_excel_template_]";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
        $this->_MODEL              = new ExcelTemplates();
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index(Builder $builder)
    {
        $langs = Languages::get();
        $table = [
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
        ];
        foreach (@$langs as $key => $value):
            $table[] = ['title' => $value->name, 'data' => 'value_' . $value->id, 'name' => 'value_' . $value->id, 'responsivePriority' => 2];
        endforeach;
        $table[]             = ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at', 'responsivePriority' => 2];
        $table[]             = ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $this->_DATA['html'] = $builder->columns($table)->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA["modules"] = \App\Http\Models\Modules::get();
        $this->_DATA["langs"]   = $langs;
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function datatable(Request $request)
    {
        $langs = Languages::get();
        $this->_MODEL = ExcelTemplates::where(ExcelTemplates::getTableName() .".id", "!=", "0");
        $selects      = [ExcelTemplates::getTableName() . ".*"];
        $tableValue   = [];
        if ($langs) {
            foreach ($langs as $key => $value) {
                $table        = "tbl" . $value["id"];
                $tableValue[] = $table;
                $selects[]    = $table . ".name AS value_" . $value["id"];
                $this->_MODEL->leftJoin(ExcelTemplatesLanguage::getTableName() . " as " . $table . "", function ($join) use ($table, $value) {
                    $join->on($table . ".bind_key", "=", ExcelTemplates::getTableName() . ".id")
                        ->on($table . ".lang_id", '=', DB::Raw($value["id"]));
                });
            }
        }
        $this->_MODEL->select($selects);
        if (!$request->order) {
            $this->_MODEL->orderby(ExcelTemplates::getTableName() .'.id', 'desc');
        }
        return datatables()->eloquent($this->_MODEL)
            ->editColumn('Actions',
                function (ExcelTemplates $ExcelTemplate) {
                    $this->_DATA['id'] = $ExcelTemplate->id;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where(function ($q) use ($request) {
                        $q->where('value', 'like', "%" . $request->keyword . "%");
                        $q->orwhere('key', 'like', "%" . $request->keyword . "%");
                    });
                }
                if ($request->created_at) {
                    $query->where('created_at', '>=', "%" . $request->created_at . "%");
                }
            })
            ->make(true);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->_DATA['languages'] = Languages::get();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->_MODEL = $this->_StoreItem($request);
        $langs        = Languages::get();
        $listColums   = $this->_GetTableColumns(ExcelTemplatesLanguage::getTableName());
        foreach ($langs as $key => $value) {
            $post = @$request->languages[$value->id];
            if (@$post) {
                $check = ExcelTemplatesLanguage::where(
                    [
                        ["lang_id", "=", $value->id],
                        ["bind_key", "=", $this->_MODEL->id],
                    ]
                )->first();
                if ($check == null) {
                    $check           = new ExcelTemplatesLanguage();
                    $check->lang_id  = $value->id;
                    $check->bind_key = $this->_MODEL->id;
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
        return Redirect(route($this->_ROUTE_FIX . ".edit", $this->_MODEL->id));

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $this->_MODEL = $this->_MODEL->find($id);
        $langs        = Languages::get();
        $languages    = [];
        foreach ($langs as $key => $value) {
            $languages[$value->id] = @$this->_MODEL->language($value->id);
        }
        $_MODEL                = $this->_MODEL->toArray();
        $_MODEL['languages']   = $languages;
        $this->_DATA["status"] = 1;
        $this->_DATA["data"]   = $_MODEL;
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
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
        $this->_MODEL = ExcelTemplates::find($id);
        $this->_MODEL = $this->_StoreItem($request);
        $langs        = Languages::get();
        $listColums   = $this->_GetTableColumns(ExcelTemplatesLanguage::getTableName());
        foreach ($langs as $key => $value) {
            $post = @$request->languages[$value->id];
            if (@$post) {
                $check = ExcelTemplatesLanguage::where(
                    [
                        ["lang_id", "=", $value->id],
                        ["bind_key", "=", $this->_MODEL->id],
                    ]
                )->first();
                if ($check == null) {
                    $check           = new ExcelTemplatesLanguage();
                    $check->lang_id  = $value->id;
                    $check->bind_key = $this->_MODEL->id;
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
        return Redirect(route($this->_ROUTE_FIX . ".edit", $this->_MODEL->id));
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
