<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;
use App\Http\Models\Languages;
use App\Http\Models\Menus_Language;
use DB;
class MenusController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function __construct()
    {
        $this->_ROLNAMES['view'][]   = "tree";
        $this->_ROLNAMES['add'][]    = "additem";
        $this->_ROLNAMES['update'][] = "edititem";
        $this->_ROLNAMES['update'][] = "updatesort";
        $this->_ROLNAMES['delete'][] = "destroyitem";
        parent::__construct();    
        $this->_TABLE      = "menu_groups";
        $this->_VIEW       = "menus";
        $this->_NAME       = "menus";
        $this->_ROUTE_FIX  = "menus";
        $this->_DATA["_PAGETITLE"] = "Menus";
        $this->_ADDURL = route($this->_ROUTE_FIX.".store");
    }
    public function index(Request $request)
    {  
        $this->_MODEL = \App\Http\Models\Menu_Groups::orderby("id","ASC");
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
            $this->_MODEL = \App\Http\Models\Menu_Groups::find($id);
        }else{
            $this->_MODEL = new \App\Http\Models\Menu_Groups();
        }
        foreach ($post as $key => $value) {
            if(in_array($key, $listColums)){
                if($key != "id"){
                    $this->_MODEL->{$key} = $value;
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
        $this->_MODEL = \App\Http\Models\Menu_Groups::find($id);
        $data["status"] = 1;
        $data["data"] = $this->_MODEL->toArray();
        return \Response::json($data);
    }

    public function delete($id){
        $data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Menu_Groups::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function tree($id){  
        $langs = Languages::get();
        $this->_DATA["langs"] = $langs;     
        $menu = \App\Http\Models\Menu_Groups::find($id);
        if($menu == null) return Redirect()->back();
        $this->_DATA["_TREES"]   = \App\Http\Models\Menus::
        select(DB::Raw("modules.name as module_name,menus.*"))
        ->leftjoin("modules","modules.id","=","menus.module_id")
        ->where("menus.group_id","=",$id)->orderby("menus.sort")->get();
        $this->_DATA["roles"]    = \App\Http\Models\Roles::roleStatus()->get();
        $this->_DATA["group_id"] = $id;
        $this->_DATA["modules"] = \App\Http\Models\Modules::roleStatus()->get();
        $this->_DATA["get_html_modules"] =  $this->get_html_modules($this->_DATA["_TREES"],0);
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }
    public function additem (Request $request){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $listColums = $this->_GetTableColumns("menus");
        $post = $request->post();
        $id = $request->id;
        $this->_MODEL = null;
        if($id){
            $this->_MODEL = \App\Http\Models\Menus::find($id);
        }else{
            $this->_MODEL = new \App\Http\Models\Menus();
        }
        foreach ($post as $key => $value) {
            if(in_array($key, $listColums)){
                if($key != "id"){
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        if($this->_MODEL->pid == 0){
            $this->_MODEL->path_id = '/0/'.$this->_MODEL->id.'/';
        }else{
            $p = \App\Http\Models\Menus::find($this->_MODEL->pid);
            if($p){
                $this->_MODEL->path_id = $p->path_id.$this->_MODEL->id.'/';
                if($this->_MODEL->module_id == null){
                    $this->_MODEL->module_id = $p->module_id;
                }
            }else{
                $this->_MODEL->path_id = '/0/'.$this->_MODEL->id.'/';
            }
        }
        $this->_MODEL->save();
        $names = $request->names;
        if ($names) {
            foreach ($names as $key => $value) {
                $check = Menus_Language::where(
                    [
                        ["lang_id", "=", $key],
                        ["bind_key", "=", $this->_MODEL->id],
                    ]
                )->first();
                if ($check == null) {
                    $check           = new Menus_Language();
                    $check->lang_id  = $key;
                    $check->bind_key = $this->_MODEL->id;
                }
                $check->name        = $value;
                $check->description = "";
                $check->save();
            }
        }
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function edititem($id){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Menus::find($id);
        $data["status"] = 1;
        $langs = Languages::get();
        foreach ($langs as $key => $value) {
            $this->_MODEL['names[' . $value->id . ']'] = @$this->_MODEL->get_name($value->id);
        }
        $data["data"] = $this->_MODEL->toArray();
        $this->_DATA["_TREES"]    = \App\Http\Models\Menus::where([
            ["group_id","=",$this->_MODEL->group_id],
            ["id","!=",$id]
        ])->orderby("sort")->get(); 

        $data["get_html_modules"] =  $this->get_html_modules($this->_DATA["_TREES"],0,'',$this->_MODEL->pid);
        return \Response::json($data);
    }
    public function destroyitem($id){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $this->_MODEL = \App\Http\Models\Menus::destroy($id); 
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function updatesort(Request $request,$id){
        $data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $trees = $request->_data;
        if($trees){
            foreach ($trees as $key => $value) {
                if(is_numeric(@$value["item_id"])){
                    $item = \App\Http\Models\Menus::find(@$value["item_id"]);
                    $old_path    = $item->path_id;
                    if($item->pid == 0){
                        $item->path_id = '/0/'.$item->id.'/';
                    }else{
                        $p = \App\Http\Models\Menus::find($item->pid);
                        if($p){
                            $item->path_id = $p->path_id.$item->id.'/';
                            if($item->module_id == null){
                                $item->module_id = $p->module_id;
                            }
                        }else{
                            $item->path_id = '/0/'.$item->id.'/';
                        }
                        if($item->path_id != $old_path){
                            $update = \App\Http\Models\Menus::where('path_id', 'like', '%'.$old_path.'%')->update(["path_id" => DB::raw("replace( path_id , '".$old_path."', '".$item->path_id."')" )]);
                        }

                    }
                    $item->pid   = is_numeric(@$value["parent_id"]) ? @$value["parent_id"] : 0; 
                    $item->sort  = is_numeric(@$value["left"]) ? @$value["left"] : 0; 
                    $item->level = is_numeric(@$value["depth"]) ? @$value["depth"] : 0;
                    $item->save();
                }
            }
        }
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
    public function _TREEMENUS($trees = [] ,$root = 0){
        if($root == 0) 
            echo  '<ol class="sortable">';
        else 
            echo '<ol class="menu-group">';
        foreach ($trees as $key => $value) {
            if($value->pid === $root){
                unset($trees[$key]);
                echo '<li class="item-menu" id="list_'.$value->id.'">
                    <div class="content-box">'.@$value->get_name().' <label class="badge" style="background-color:'.@$value->status->bg.';color:'.@$value->status->color.'">'.@$value->status->get_name().'</label> </div>';
                    $this->_TREEMENUS($trees,$value->id);
                    echo '<div class="ns-actions">
                            '.@$value->get_name().' | '.$value->path.' | 
                            <a data-href="'.route($this->_ROUTE_FIX.".edititem",["id" => $value->id]).'" href="javascript:;" data-id="'.$value->id.'" id="edit-action"><i class="mdi mdi-pen" aria-hidden="true"></i></a> | 
                            <a class="modal-delete" data-href="'.route($this->_ROUTE_FIX.".destroyitem",["id" => $value->id]).'" href="javascript:;" data-id="'.$value->id.'"> <i class="mdi mdi-delete" aria-hidden="true" title=""></i></a>
                        </div>';
                echo '</li>';  
            }   
        }
        echo '</ol>';
    }
    private $html_modules = '<option value="0">--choose Parent--</option>';
    private function get_html_modules($data = null,$root = 0,$level = '', $activer = -1){
        $termsList = array();
        $new_listdata = array();
        if ($root != 0)
        {
            $level .= '&mdash;';
        }
        if ($data != null) { 
            foreach ($data AS $key => $item )
            {
                if ($item->pid == $root)
                {
                    $termsList[] = ($item);
                }
                else
                {
                    $new_listdata[] = ($item);
                }
            }
        }
        if ($termsList != null)
        {
            foreach ($termsList AS $key => $item_2 )
            {
                $active = '';
                if ($activer == $item_2->id)
                {
                    $active = 'selected';
                }
                $this->html_modules .= '<option value="' . $item_2->id . '" '. $active . '>' . $level . '  ' . $item_2->get_name() . '</option>';
                $this->get_html_modules($new_listdata, $item_2->id, $level, $activer);
            }
        }
        return $this->html_modules;
    }
}
