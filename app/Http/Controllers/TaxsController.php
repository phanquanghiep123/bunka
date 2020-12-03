<?php

namespace App\Http\Controllers;
use App\Http\Cores\BackendController;
use App\Http\Models\Taxs;
use Illuminate\Http\Request;

class TaxsController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();    
        $this->_TABLE      = "taxs";
        $this->_VIEW       = "taxs";
        $this->_NAME       = "taxs";
        $this->_ROUTE_FIX  = "taxs";
        $this->_DATA["_PAGETITLE"] = "_TAXS_";
        $this->_MODEL    = new \App\Http\Models\Taxs();
        $this->_ADDURL   = route($this->_ROUTE_FIX.".store");
     
    }
    public function index(Request $request)
    {
        $this->_MODEL = \App\Http\Models\Taxs::orderby("id","ASC");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("number","like","%".$keyword."%");
            });
        }
         if($request->input('created_at')){
            $created_at = $request->input('created_at');
            $this->_MODEL->where(function($query) use($created_at){
                $query->where("created_at",">=","%".$created_at."%");    
            });
        }
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
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
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        if($id){
            $this->_MODEL = \App\Http\Models\Taxs::find($id);
        }else{
            $this->_MODEL = new \App\Http\Models\Taxs();
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
     * @param  \App\Http\Models\Taxs  $taxs
     * @return \Illuminate\Http\Response
     */
    public function show(Taxs $taxs)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Http\Models\Taxs  $taxs
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Taxs::find($id);
        $data["status"] = 1;
        $data["data"] = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Http\Models\Taxs  $taxs
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Taxs $taxs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Http\Models\Taxs  $taxs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Taxs $taxs)
    {
        //
    }
}
