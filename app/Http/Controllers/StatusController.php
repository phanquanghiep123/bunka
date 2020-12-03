<?php

namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use App\Http\Models\Languages;
use App\Http\Models\Status_Language;
use App\Http\Models\Status;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use DB;
class StatusController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->_ROLNAMES['view'] = array_merge($this->_ROLNAMES['view'], [
            "datatable",
        ]);
        parent::__construct();
        $this->_TABLE              = "status";
        $this->_VIEW               = "status";
        $this->_NAME               = "status";
        $this->_ROUTE_FIX          = "status";
        $this->_DATA["_PAGETITLE"] = "_status_management_";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
        $this->_MODEL              = new Status();

    }
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
        $table[]             = ['title' => '[_module_]', 'data' => 'module.name', 'name' => 'module.name', 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $table[]             = ['title' => '_status_', 'data' => 'status', 'name' => 'status', 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $table[]             = ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'];
        $this->_DATA['html'] = $builder->columns($table)->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        $this->_DATA["modules"] = \App\Http\Models\Modules::get();
        $this->_DATA["langs"] = $langs;
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function datatable(Request $request)
    {
        $langs        = Languages::get();
        $this->_MODEL = Status::with('module')->select(Status::getTableName() . '.*');
        $selects      = [Status::getTableName() . ".*"];
        $tableValue   = [];
        if ($langs) {
            foreach ($langs as $key => $value) {
                $table        = "tbl" . $value["id"];
                $tableValue[] = $table;
                $selects[]    = $table . ".name AS value_" . $value["id"];
                $this->_MODEL->leftJoin(Status_Language::getTableName() . " as " . $table . "", function ($join) use ($table, $value) {
                    $join->on($table . "." . "bind_key", "=", Status::getTableName() . ".id")
                        ->on($table . "." . "lang_id", '=', DB::Raw($value["id"]));
                });
            }
        }
        $this->_MODEL->select($selects);
        if (!$request->order) {
            $this->_MODEL->orderby('id', 'desc');
        }
        return datatables()->of($this->_MODEL)->addColumn('status',
            function (Status $status) {
                return view($this->_VIEW . ".status", ["status" => $status]);
            }
        )
            ->addColumn('Actions',
                function (Status $status) {
                    $this->_DATA['id'] = $status->id;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->editColumn('module.name',
                function (Status $status) {
                    return @$status->module->name;
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request, $langs, $tableValue) {
                if ($request->keyword) {
                    $query->where(function ($q) use ($request, $langs, $tableValue) {
                        foreach ($tableValue as $key => $value) {
                            $q->orwhere($value . '.name', "LIKE", "%" . $request->keyword . "%");
                        }
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
        $data = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $id   = $request->id;
        if ($id == null || $id < 1) {
            $this->_MODEL = new $this->_MODEL;
        } else {
            $this->_MODEL = $this->_MODEL->find($id);
        }
        $this->_MODEL = $this->_StoreItem($request);
        if ($this->_MODEL->id != 0) {
            if ($request->page == 1) {
                $data["_redirect"]     = 1;
                $data["_redirect_url"] = route($this->_ROUTE_FIX . ".index");
            } else {
                $data["_reload"] = 0;
            }
            $data["status"] = 1;
        }
        $names = $request->names;
        if ($names) {
            foreach ($names as $key => $value) {
                $check = Status_Language::where(
                    [
                        ["lang_id", "=", $key],
                        ["bind_key", "=", $this->_MODEL->id],
                    ]
                )->first();
                if ($check == null) {
                    $check           = new Status_Language();
                    $check->lang_id  = $key;
                    $check->bind_key = $this->_MODEL->id;
                }
                $check->name        = $value;
                $check->description = "";
                $check->save();
            }
        }
        return \Response::json($data);
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
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL = $this->_MODEL->find($id);
        $langs        = Languages::get();
        foreach ($langs as $key => $value) {
            $this->_MODEL['names[' . $value->id . ']'] = @$this->_MODEL->get_name($value->id);
        }
        $data["status"] = 1;
        $data["data"]   = $this->_MODEL->toArray();
        return \Response::json($data);
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
        $data = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
}
