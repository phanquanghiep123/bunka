<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Models\Areas;
use App\Http\Cores\BackendController;
class AreasController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES["update"][] = "updaterule";
        $this->_ROLNAMES["update"][] = "rule";
        parent::__construct();    
        $this->_TABLE      = "areas";
        $this->_VIEW       = "areas";
        $this->_NAME       = "areas";
        $this->_ROUTE_FIX  = "areas";
        $this->_DATA["_PAGETITLE"] = "_manage_areas_";
        $this->_ADDURL = route($this->_ROUTE_FIX.".store");
    }
    public function index(Request $request)
    {  
        $this->_MODEL = \App\Http\Models\Areas::orderby("id","ASC");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("name","like","%".$keyword."%");
                $query->orWhere("controller","like","%".$keyword."%");
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
    public function store (Request $request){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns($this->_TABLE);
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        if($id){
            $this->_MODEL = \App\Http\Models\Areas::find($id);
        }else{
            $this->_MODEL = new \App\Http\Models\Areas();
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
        $data["_redirect"] = 1;
        $data["_redirect_url"] = route($this->_ROUTE_FIX . '.index');
        return \Response::json($data);
    }
    public function create(){
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }
    public function edit($id){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Areas::find($id);
        $data["status"] = 1;
        $data["data"] = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    public function delete($id){
        $data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Areas::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }

   
    
}
