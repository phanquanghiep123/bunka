<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Cores\BackendController;

class RulesController extends BackendController
{
    public function __construct()
    {
        parent::__construct();    
        $this->_TABLE      = "role_module";
        $this->_VIEW       = "rules";
        $this->_NAME       = "rules";
        $this->_ROUTE_FIX  = "rules";
        $this->_DATA["_PAGETITLE"] = "Role_Module";
     
    }

    public function edit($id){
    	$data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
    	$Models = \App\Http\Models\Role_Module::GetModulesAllow($id);
    	if(count($Models->toArray()) != 0)
            $data["data"] = $this->get_html_modules($Models->toArray(),0,"",true);
        else 
            $data["data"] = "";
        $data["status"] = 1;
        return \Response::json($data);
    }
    private $index = 1;
    private $html_modules = "";
    private function get_html_modules($data = null,$root = 0,$level = '', $table = true , $activer = -1){
          
        if ($data != null )
        {
            foreach ($data AS $key => $item_2 )
            {
                $active = '';
                $this->html_modules .= '<tr>'; 
                $this->html_modules .='<td>'.$level .'  '.$item_2['name'].'</td>';
                $this->html_modules .= '<td>'.$item_2['controller'].'</td>';
                if ($item_2['view'] == '1')
                {
                    $active = 'checked';
                }else{
                    $active = '';
                }
                $this->html_modules .='<td>
                    <div class="checkbox"> 
                        <input id="item-'.$item_2["id"].'-view" type="checkbox" class="styled onchangevalue" '.$active.'><label for="item-'.$item_2["id"].'-view"></label>
                        <input value="'.$item_2['view'].'" type="hidden" class="apply" name="view[]"/>
                    </div>
                </td>';
                if ($item_2['add'] == '1')
                {
                    $active = 'checked';
                }else{
                    $active = '';
                }
                $this->html_modules .='<td>
                    <div class="checkbox"> 
                        <input id="item-'.$item_2["id"].'-add" type="checkbox" class="styled onchangevalue" '.$active.'><label for="item-'.$item_2["id"].'-add"></label>
                        <input value="'.$item_2['add'].'" type="hidden" class="apply" name="add[]"/>
                    </div>
                </td>';
                
                if ($item_2['update'] == '1')
                {
                    $active = 'checked';
                }else{
                    $active = '';
                }
                $this->html_modules .='<td>
                    <div class="checkbox"> 
                        <input id="item-'.$item_2["id"].'-edit" type="checkbox" class="styled onchangevalue" '.$active.'><label for="item-'.$item_2["id"].'-edit"></label>
                        <input value="'.$item_2['update'].'" type="hidden" class="apply" name="update[]"/>
                    </div>
                </td>';
                if ($item_2['delete'] == '1')
                {
                    $active = 'checked';
                }else{
                    $active = '';
                }
                $this->html_modules .='<td>
                    <div class="checkbox"> 
                        <input id="item-'.$item_2["id"].'-delete" type="checkbox" class="styled onchangevalue" '.$active.'><label for="item-'.$item_2["id"].'-delete"></label>
                        <input value="'.$item_2['delete'].'" type="hidden" class="apply" value="'.$item_2['delete'].'" name="delete[]"/>
                    </div>
                    <input type="hidden" name="modules[]" value="'.$item_2["id"].'">
                </td>';
            }
        }
        return $this->html_modules;
    }
    public function update(Request $request){
    	$data = ["status" => 0,"_reload" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $modules  = $request->modules;
        $count    = count($modules);
        $allow    = $request->allow;
        $add      = $request->add;
        $update   = $request->update;
        $view     = $request->view;
        $delete   = $request->delete;
        $id       = $request->id;
        \App\Http\Models\Role_Module::where("role_id","=",$id)->update(["view" => 0]);
        if($count > 0){
            
            for($i = 0;$i <= $count ; $i++){
                if(@$modules[$i] != null){
                    $check = \App\Http\Models\Role_Module::where(
                        [
                            ["module_id","=",$modules[$i]],
                            ["role_id","=",$id]
                        ]
                    )->first();
                    if($check == null){
                        $Role_Module = new  \App\Http\Models\Role_Module();
                        $Role_Module->module_id = $modules[$i];
                        $Role_Module->add       = (@$add[$i]    == null) ? "0" : @$add[$i];
                        $Role_Module->update    = (@$update[$i] == null) ? "0" : @$update[$i];
                        $Role_Module->view      = (@$view[$i]   == null) ? "0" : @$view[$i];
                        $Role_Module->delete    = (@$delete[$i] == null) ? "0" : @$delete[$i];
                        $Role_Module->role_id   = $id;
                        $Role_Module->save();
                    }else{
                        \App\Http\Models\Role_Module::where(
                            [
                                ["module_id","=",$modules[$i]],
                                ["role_id","=",$id]
                            ]
                        )->update(
                            [
                                "add"       => (@$add[$i]    == null) ? "0" : @$add[$i],
                                "update"    => (@$update[$i] == null) ? "0" : @$update[$i],
                                "view"      => (@$view[$i]   == null) ? "0" : @$view[$i],
                                "delete"    => (@$delete[$i] == null) ? "0" : @$delete[$i]
                            ]
                        );
                    }
                     
                }
            }
            
        }
        $data["status"] = 1;
        return \Response::json($data);
    }
}
