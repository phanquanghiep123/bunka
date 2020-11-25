<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
class LanguagesController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
        parent::__construct();
        $this->_TABLE      = "languages";
        $this->_VIEW       = "languages";
        $this->_NAME       = "languages";
        $this->_ROUTE_FIX  = "languages";
        $this->_DATA["_PAGETITLE"] = __("Languages");
        $this->_ADDURL = route($this->_ROUTE_FIX.".store");
    }
    public function index(Request $request)
    {
        $this->_MODEL = \App\Http\Models\Languages::orderby("id","ASC");
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
            $this->_MODEL = \App\Http\Models\Languages::find($id);
        }else{
            $this->_MODEL = new \App\Http\Models\Languages();
        }
        foreach ($listColums as $value) {
            if($value != "id"){
                if(@$request->{$value} != null){
                    if ($request->hasFile($value)) {
                        $file = $request->{$value};
                        $path = $file->move('uploads', uniqid (). '-' .$file->getClientOriginalName());
                        $this->_MODEL->{$value} = $path;
                    } else{
                        if($value != "id"){
                            $this->_MODEL->{$value} = $request->{$value};
                        }
                    }
                }

            }
        }
        if($id){
            $this->_MODEL->slug = $this->_HELPER->slug($this->_TABLE,"slug",$this->_MODEL->name,[["id","!=",$id]]);
        }else{
            $this->_MODEL->slug = $this->_HELPER->slug($this->_TABLE,"slug",$this->_MODEL->name);
        }
        $this->_MODEL->save();
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function edit($id){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Languages::find($id);
        $data["status"] = 1;
        $data["data"] = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    public function delete($id){
        $data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Languages::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
}
