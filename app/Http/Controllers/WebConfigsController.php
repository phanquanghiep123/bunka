<?php

namespace App\Http\Controllers;
use App\Http\Cores\BackendController;
use App\Http\Models\WebConfigs;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
class WebconfigsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->_ROLNAMES['view'] = array_merge($this->_ROLNAMES['view'], [
            "datatable"
        ]);
        parent::__construct();    
        $this->_TABLE      = "webconfigs";
        $this->_VIEW       = "webconfigs";
        $this->_NAME       = "webconfigs";
        $this->_ROUTE_FIX  = "webconfigs";
        $this->_DATA["_PAGETITLE"] = "_web_config_management_";
        $this->_MODEL    = new WebConfigs();
        $this->_ADDURL   = route($this->_ROUTE_FIX.".store");
     
    }
    public function index(Builder $builder)
    {
         $this->_DATA['html'] = $builder->columns([
            ['title' => '#', 'data' => 'DT_RowIndex', 'orderable' => false ,'responsivePriority' => 2, 'name' => 'id'],
            ['title' => 'Key', 'data' => 'key', 'name' => 'key', 'responsivePriority' => 2],
            ['title' => 'Value', 'data' => 'value', 'name' => 'value','responsivePriority' => 2],
            ['title' => '_created_at_', 'data' => 'created_at', 'name' => 'created_at'],
            ['title' => '_updated_at_', 'data' => 'updated_at', 'name' => 'updated_at'],
            ['title' => '_action_', 'data' => 'Actions', 'class' => 'text-center', 'orderable' => false, 'responsivePriority' => 1, 'render' => '$("<div />").html(data).text()'],
        ])->ajax([
            'url'  => route($this->_ROUTE_FIX . '.datatable'),
            'type' => 'POST',
        ])->parameters($this->_ConfigTable);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function datatable(Request $request)
    {
        $this->_MODEL = WebConfigs::where("id","!=","0");
        if(!$request->order){
           $this->_MODEL->orderby('id','desc');
        }
        return datatables()->eloquent($this->_MODEL)
            ->editColumn('Actions',
                function (WebConfigs $webconfig) {
                    $this->_DATA['id']     = $webconfig->id;
                    return view($this->_VIEW . '.context-menu', $this->_DATA);
                }
            )
            ->addIndexColumn()
            ->filter(function ($query) use ($request) {
                if ($request->keyword) {
                    $query->where(function($q) use ($request){
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
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        if($id){
            $this->_MODEL = WebConfigs::find($id);
        }else{
            $this->_MODEL = new WebConfigs();
        }
        foreach ($post as $key => $value) {
            if(in_array($key, $listColums)){
                if($key != "id"){
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

    /**
     * Display the specified resource.
     *
     * @param  Webconfigs  $webconfigs
     * @return \Illuminate\Http\Response
     */
    public function show(Webconfigs $webconfigs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Webconfigs  $webconfigs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = WebConfigs::find($id);
        $data["status"] = 1;
        $data["data"] = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Webconfigs  $webconfigs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WebConfigs $webconfigs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Webconfigs  $webconfigs
     * @return \Illuminate\Http\Response
     */
    public function destroy(WebConfigs $webconfigs)
    {
        //
    }
}
