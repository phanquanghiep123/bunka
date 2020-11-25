<?php
namespace App\Http\Controllers;

use App\Exports\LanguageLabelsExport;
use App\Http\Cores\BackendController;
use App\Http\Models\LanguageLabels;
use App\Http\Models\Languages;
use App\Http\Models\LanguageValues;
use App\Imports\LanguageLabelsImport;
use DB;
use Excel;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;

class LanguageLabelsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        
        $this->_ROLNAMES['view']     = array_merge($this->_ROLNAMES['view'], [
            "datatable",
            "export",
        ]);
        parent::__construct();
        $this->_TABLE              = "language_labels";
        $this->_VIEW               = "language_labels";
        $this->_NAME               = "language_labels";
        $this->_ROUTE_FIX          = "language_labels";
        $this->_DATA["_PAGETITLE"] = "_Language_Labels_Management_";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
    }
    public function index(Builder $builder)
    {
        $langs                = Languages::get();
        $this->_DATA["langs"] = $langs;
        $table                = [
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false, 'responsivePriority' => 2, 'name' => 'id'],
            ['title' => 'Ikey', 'data' => 'key_id', 'name' => 'key_id', 'responsivePriority' => 2],
        ];
        foreach (@$langs as $key => $value):
            $T       = "tbl" . $value["id"];
            $table[] = ['title' => $value->name, 'data' => 'value_' . $value->id, 'name' => 'value_' . $value->id, 'responsivePriority' => 2];
        endforeach;
        $table[]             = ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at', 'responsivePriority' => 2];
        $table[]             = ['title' => '_status_', 'data' => 'status', 'name' => 'status', 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $table[]             = ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $this->_DATA['html'] = $builder->columns($table)->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function datatable(Request $request)
    {
        $langs        = Languages::get();
        $this->_MODEL = LanguageLabels::select(LanguageLabels::getTableName() . '.*');
        $selects      = [LanguageLabels::getTableName() . ".*"];
        $tableValue   = [];
        if ($langs) {
            foreach ($langs as $key => $value) {
                $table        = "tbl" . $value["id"];
                $tableValue[] = $table;
                $selects[]    = $table . ".value AS value_" . $value["id"];
                $this->_MODEL->leftJoin(LanguageValues::getTableName() . " as " . $table . "", function ($join) use ($table, $value) {
                    $join->on($table . "." . "label_id", "=", LanguageLabels::getTableName() . ".id")
                        ->on($table . "." . "lang_id", '=', DB::Raw($value["id"]));
                });
            }
        }
        $this->_MODEL->select($selects);
        if (!$request->order) {
            $this->_MODEL->orderby('id', 'desc');
        }
        $R = datatables()->of($this->_MODEL);
        return $R->addColumn('status',
            function (LanguageLabels $LanguageLabels) {
                return $LanguageLabels->status ? view($this->_VIEW . ".status", ["status" => $LanguageLabels->status]) : '';
            }
        )
            ->addColumn('Actions',
                function (LanguageLabels $LanguageLabels) {
                    $this->_DATA['id'] = $LanguageLabels->id;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request, $langs, $tableValue) {
                if ($request->keyword) {
                    $query->where(function ($q) use ($request, $langs, $tableValue) {
                        $q->where(LanguageLabels::getTableName() . '.key_id', 'like', "%" . $request->keyword . "%");
                        foreach ($tableValue as $key => $value) {
                            $q->orwhere($value . '.value', "LIKE", "%" . $request->keyword . "%");
                        }
                    });
                }
                if ($request->created_at) {
                    $query->where('created_at', '>=', "%" . $request->created_at . "%");
                }
            })
            ->make(true);
    }
    public function store(Request $request)
    {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $listColums   = $this->_GetTableColumns($this->_TABLE);
        $post         = $request->post();
        $id           = $request->id;
        $this->_MODEL = null;
        if ($id) {
            $this->_MODEL = LanguageLabels::find($id);
        } else {
            $this->_MODEL = new LanguageLabels();
        }
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        $langs  = $request->lang_ids;
        $values = $request->values;
        foreach ($langs as $key => $value) {
            $ck = \App\Http\Models\LanguageValues::where([
                ["lang_id", "=", $value],
                ["label_id", "=", $this->_MODEL->id],
            ])->first();
            if ($ck) {
                $language_label = $ck;
            } else {
                $language_label           = new \App\Http\Models\LanguageValues();
                $language_label->lang_id  = $value;
                $language_label->label_id = $this->_MODEL->id;
            }
            $language_label->value = $values[$key];
            $language_label->save();
        }
        $data["status"] = 1;
        return \Response::json($data);
    }
    public function edit($id)
    {
        $data           = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL   = LanguageLabels::find($id);
        $dataM          = $this->_MODEL->toArray();
        $LanguageValues = \App\Http\Models\LanguageValues::where("label_id", "=", $this->_MODEL->id)->get();
        foreach ($LanguageValues as $key => $value) {
            $dataM["lang_" . $value->lang_id . ""] = $value->value;
        }
        $data["data"]   = $dataM;
        $data["status"] = 1;
        return \Response::json($data);
    }

    public function destroy($id)
    {
        $data            = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL    = \App\Http\Models\LanguageValues::where("label_id", "=", $id)->delete();
        $this->_MODEL    = LanguageLabels::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function export()
    {
        return Excel::download(new LanguageLabelsExport(), 'LanguageLabelsExport.xlsx');
    }
    public function import(Request $request)
    {
        $data = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        Excel::import(new LanguageLabelsImport, request()->file('file'));
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);

    }

}
