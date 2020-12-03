<?php

namespace App\Http\Controllers;
use App\Http\Cores\BackendController;
use App\Imports\CustomersImport;
use App\Exports\CustomersExport;
use Illuminate\Http\Request;
use Validator;
use Excel;
class CustomersController extends BackendController
{
    public function __construct(){
        $this->_ROLNAMES['delete'][] = "permanentlyDelete";
        $this->_ROLNAMES['view']     = array_merge($this->_ROLNAMES['view'], [
            "export",
        ]);
        parent::__construct();
        $this->_TABLE = "customers";
        $this->_VIEW  = "customers";
        $this->_NAME  = "customers";
        $this->_ROUTE_FIX = "customers";
        $this->_DATA["_PAGETITLE"] = "_CUSTOMER_";
        $this->_MODEL  = new \App\Http\Models\Customers();
        $this->_ADDURL = route($this->_ROUTE_FIX . ".store");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $this->_MODEL = \App\Http\Models\Customers::orderby("id","ASC");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("code","like","%".$keyword."%");
                $query->orWhere("authorized_name","like","%".$keyword."%");
                $query->orWhere("owner","like","%".$keyword."%");
                $query->orWhere("phone","like","%".$keyword."%");
                $query->orWhere("email","like","%".$keyword."%");
            });
        }
        if($request->input('date')){
            $date = $request->input('date');
            $this->_MODEL->where(function($query) use($date){
                $query->where("created_at"," >= ","%".$date."%");
            });
        }
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        $this->_DATA['status'] = $this->getListStatusByModels()->get();
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
    */
    public function store(Request $request) {
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        $rules = [
            'authorized_code'   => "required|unique:{$this->_TABLE},authorized_code",
            'authorized_name'   => 'required',
            'owner'             => 'required'
        ];
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()){
            $data ["message"] = $check->errors();
            return \Response::json($data);
        }
        $this->_MODEL = new \App\Http\Models\Customers();
        foreach ($post as $key => $value) {
            if(in_array($key, $listColums)){
                if($key != "id"){
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        if(@$this->_MODEL->id != null){
            $this->_MODEL->code = $this->get_code($this->_MODEL->id);
            $this->_MODEL->save();
        }
        if($request->page == 1){
            $data["_redirect"] = 1;
            $data["_redirect_url"] = route($this->_ROUTE_FIX.".index");
        }else{
            $data["_reload"] = 1;
        }
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function edit($id) {
        $this->_MODEL = \App\Http\Models\Customers::find($id);
        if(@$this->_MODEL == null){
            return redirect(route($this->_ROUTE_FIX .'.create'));
        }
        $this->_EDITURL = route($this->_ROUTE_FIX . ".update",$id);
        $this->_DATA['status'] = $this->getListStatusByModels()->get();
        $this->_DATA['record'] = $this->_MODEL->toArray();
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }


    public function update($id,Request $request) {
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $this->_MODEL = \App\Http\Models\Customers::find($id);
        if($this->_MODEL == null){
            $data["_redirect"] = 1;
            $data["_redirect_url"] = route($this->_ROUTE_FIX .'.create');
            return \Response::json($data);
        }
        $rules = [
            'authorized_code'   => "required|unique:{$this->_TABLE},authorized_code,".$id,
            'authorized_name'   => 'required',
            'owner'             => 'required'
        ];
        if($this->_MODEL->code != @$post['code']){
           //$rules['code'] = 'required|unique:customers,code';
        }

        $check = Validator::make($request->all(), $rules);
        if ($check->fails()){
            $data ["message"] = $check->errors();
            return \Response::json($data);
        }
        foreach ($post as $key => $value) {
            if(in_array($key, $listColums)){
                if($key != "id"){
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        if($this->_MODEL->code == null){
            $this->_MODEL->code = $this->get_code($this->_MODEL->id);
        }
        $this->_MODEL->save();
        if($request->page == 1){
            $data["_redirect"] = 1;
            $data["_redirect_url"] = route($this->_ROUTE_FIX.".index");
        }else{
            $data["_reload"] = 1;
        }
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
    */
    public function delete($id) {
        $data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Customers::destroy($id);
        return redirect(route($this->_ROUTE_FIX .'.index'));
    }


    private function get_code($id){
        $branch = \App\Http\Models\Branchs::find($this->_USER->branch_id);
        $Y      = date("Y");
        $Y      = substr($Y, strlen($Y) - 1);
        $No     = $id;
        for ($i = 1; $i < 3; $i++) {
            if (strlen($No) < 3) {
                $No = '0' . $No;
            }
        }
        return "B" . @$branch->short_name . '-' . $Y . '-' . $No;
    }

    public function import(Request $request) {
        $data = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        Excel::import(new CustomersImport, request()->file('file'));
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

    public function export()
    {
        return Excel::download(new CustomersExport(), 'Customers.xlsx');
    }
}
