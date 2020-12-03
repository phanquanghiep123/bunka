<?php
namespace App\Http\Cores;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Helper\Common;
use App\Http\Models\Menus;
use App;
use DB;
use Hook;
use Auth;
class BackendController extends Controller
{
    public $_USER         = null;
    public $_VIEW         = "";
    public $_NAME         = "";
    public $_TABLE        = "";
    public $_URLFIX       = "";
    public $_ROUTE_FIX    = "";
    public $_URL          = "";
    public $_DATA         = [];
    public $_MODULE       = null;
    public $_PAGINGNUMBER = 30;
    public $_LISTPAGE     = false;
    public $_HELPER       = false;
    public $_ADDURL       = "";
    public $_LANG         = null;
    public $_SCRIP_LANGS  = null;
    public $_LANGS        = null;
    public $_LANG_ID      = 0;
    public $_ROLNAMES     = [
        "add"      => ["create","store","import"],
        "delete"   => ["delete","remove","destroy"],
        "view"     => ["show","view","review","index","export","datatable","status","exportreceipt"],
        "update"   => ["update","edit"]
    ];
    public  $_ConfigTable  = [];
    private $_COMMONROUTE  = [];
    public  $_MODEL    = null;
    public function __construct()
    {
        $this->_HELPER = new Common();
        $this->_DATA["_SEFF"]       = $this;
        $this->_DATA["_PAGETITLE"]  = "Backend";
        $this->_DATA["_ADMINMENU"]  = "";
        $this->_COMMONROUTE = [
            "auth",
            "auth.login",
            "auth.postlogin",
            "auth.postforgot",
            "auth.getforgot",
            "auth.resetpassword",
            "auth.changepassword",
            "auth.changelang",
            "home",
            "home.index",
            "home.logout",
            "home.notallow",
            "home.notallowajax",
            "home.procedure"
        ];
        $this->middleware(function ($request, $next) {
            $this->_USER = Auth::user();
            $AllowURL = $this->_validateRULE(@$this->_USER->role_module_id);
            if(session('_LANG_ID')){
                $this->_LANG_ID = session('_LANG_ID');
                $this->_LANG = \App\Http\Models\Languages::find($this->_LANG_ID);
                App::setLocale($this->_LANG->locale);
            }else{
                if(@$this->_USER->lang_id){
                    $this->_LANG = \App\Http\Models\Languages::where("id","=",$this->_USER->lang_id)->first();
                }else{
                    $this->_LANG = \App\Http\Models\Languages::where("is_default","=",1)->first();
                }
                
                if($this->_LANG){
                    $this->_LANG_ID = $this->_LANG->id;
                    App::setLocale($this->_LANG->locale);
                    session([ '_LANG_ID' => $this->_LANG_ID]);
                }
            }
            $this->_LANGS = \App\Http\Models\Languages::get();
            $LanguageLabels = \App\Http\Models\LanguageValues::
                join("language_labels","language_values.label_id","=","language_labels.id")
                ->where("language_values.lang_id","=",$this->_LANG_ID)
                ->select("language_values.value","language_labels.key_id",DB::Raw('CHAR_LENGTH(language_labels.key_id) as number_string'))
                ->orderby(DB::Raw('CHAR_LENGTH(language_labels.key_id)'),"DESC")
                ->get()->toArray();
            foreach ($LanguageLabels as $key => $value) {
                $this->_SCRIP_LANGS[$value["key_id"]] = $value["value"];
            }
            $this->_DATA["_SCRIP_LANGS"]   = $this->_SCRIP_LANGS;
            Hook::listen('template.ReplaceLanguage', function ($callback, $output, $variables) use ($LanguageLabels) {
                $keys = $values = [];
                foreach ($LanguageLabels as $key => $value) {
                    $keys[]   = $value["key_id"];
                    $values[] = $value["value"];
                }
                $output = str_ireplace($keys, $values, $output);
                return $output;
            });

            if($AllowURL == false){
                if($request->ajax() == false){
                    return Redirect(route("home.notallow"));  
                }else{
                    return Redirect(route("home.notallowajax"));
                }
            }
            if($request->ajax() == false){
                $this->_DATA["_BACKURL"]   = $this->lookget_BACKURL();
                $this->_DATA["_ADMINMENU"] = $this->_ADMINMENU($this->_GETMENU());
            }
            
            $this->_ConfigTable = [
                'lengthChange' => false,
                'searching'    => false,
                'info'         => false,
                'ordering'     => true,
                'order'        => [],
                'pageLength'   => $this->_PAGINGNUMBER,
                "language"     => [
                    "paginate" => [
                        'previous' => '&laquo; [_previous_]',
                        'next'     => '[_next_] &raquo;',
                    ],
                    "emptyTable" => "[_table_emty_]"
                ],

            ];
            $LanguageLabels = \App\Http\Models\LanguageValues::
                join("language_labels", "language_values.label_id", "=", "language_labels.id")
                ->where("language_values.lang_id", "=", $this->_LANG_ID)
                ->where('language_labels.key_id', 'like', '%[_javascript_validate_%')
                ->select("language_values.value", "language_labels.key_id", DB::Raw('CHAR_LENGTH(language_labels.key_id) as number_string'))
                ->orderby(DB::Raw('CHAR_LENGTH(language_labels.key_id)'), "DESC")
                ->get()->toArray();
            $newdata      = [];
            $stringRemove = '[_javascript_validate_';
            foreach ($LanguageLabels as $key => $value) {
                $key_id    = $value["key_id"];
                $key_value = $value["value"];
                if (strpos($key_id, '[_javascript_validate_array_') !== false) {
                    $stringRemove = '[_javascript_validate_array_';
                    $value        = json_decode(@$key_value);
                } else {
                    $value        = $key_value;
                    $stringRemove = '[_javascript_validate_';
                }
                $keyR           = str_replace($stringRemove, "", $key_id);
                $keyR           = str_replace('_]', "", $keyR);
                $newdata[$keyR] = $value;
            }
            $this->_DATA["_ValiDateMessege"] = $newdata;
            if(@$this->_USER){
                $url = $request->url();
                \App\Http\Models\Notifications::where([
                    ["user_receive","=",$this->_USER->id],
                    ["url_detail","=",$url],
                    ["view_detail","=",0]
                ])->update(["view_detail" => 1,"is_view" => 1]);
            }
            if($request->ajax() == false && $request->isMethod('get')){
                $this->add_BACKURL();  
            } 
            return $next($request);
        });
		ob_end_clean(); // this
		ob_start(); // and this
    }
    public function _StoreItem($request){
        $listColums = $this->_GetTableColumns($this->_TABLE);
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
        $this->_MODEL->save();
        return $this->_MODEL;
    }
    public function _GetTableColumns($table)
    {
        return DB::getSchemaBuilder()->getColumnListing($table);
    }
    private function add_BACKURL (){
        $fullUrl = \Request::fullUrl();
        $backcurrent_url = session('_BACKURL');
        if($backcurrent_url !=null && count($backcurrent_url) > 20){
            unset ($backcurrent_url[0]);
        }
        if($backcurrent_url != null){
            foreach ($backcurrent_url as $key => $value) {
                if($value != $fullUrl){
                    $arg_url[] = $value;
                }
            }
        }
        $arg_url [] = $fullUrl;
        \Request::session()->forget('_BACKURL');
        session(['_BACKURL' => $arg_url]);
    }
    private function lookget_BACKURL(){
        $arg = session('_BACKURL');
        if($arg != null){
            for ($i = (count($arg) - 1); $i > 0 ; $i--) {
                if($arg[$i] != \Request::fullUrl()){
                    $url = $arg[$i];
                    unset ($arg[$i]);
                    session(['_BACKURL' => $arg]);
                    return $url;
                }
            }
        }
        return asset($this->_URL);
    }

    public function _ADMINMODULES($role_module_id = null){
        $models = DB::table('modules')
        ->join('role_module', 'modules.id', '=', 'role_module.module_id')
        ->where([
            ["role_module.role_id","=",$role_module_id],
            ["modules.is_common","=",0]
        ])
        ->select('modules.*')
        ->get();
        return $models;
    }
    private function _GETMENU (){
        $menuItems  = $this->GetMenuBySlug("admin-menu");
        return $menuItems;
    }
    private function doShortcode($string){
        $string = '$this->'.$string;
        $string .= '()';
        @eval("\$CT = $string ; ");
        return @$CT;
    }
    private function QuotationsMenusStatus(){
        $m = \App\Http\Models\WebConfigs::where('key','=','QuotaitionID')->first();
        $lis = "";
        if($m){
            $status =\App\Http\Models\Status::where("module_id","=",$m->value)->orderby('sort','ASC')->get();
            if($status->count()){
                 foreach ($status as $key => $value) {
                    $count  = \App\Http\Models\Quotations::where([
                        ['index_reversion','=',1],
                        ['status_id','=',$value->id],
                        ['is_delete','=',0]
                    ])->get()->count();
                    $lis .= '
                        <li class="nav-item">
                        <a class="nav-link" href="'.route('quotations.status',$value->id).'"><i class="mdi mdi-chevron-right menu-icon"></i><span class="menu-title">'.$value->get_name().'</span><label class="badge" style="background-color:'.$value->bg.';color:'.$value->color.'">'.$count.'</label></a>
                    </li>';
                }
            }
        }
        return $lis;  
    }
    private function OrderMenusStatus(){
        $m = \App\Http\Models\WebConfigs::where('key','=','OrDerID')->first();
        $lis = "";
        if($m){
            $status =\App\Http\Models\Status::where("module_id","=",$m->value)->orderby('sort','ASC')->get();
            if($status->count()){
                 foreach ($status as $key => $value) {
                    $count  = \App\Http\Models\Orders::where([
                        ['status_id','=',$value->id],
                        ['is_delete','=',0]
                    ])->get()->count();
                    $lis .= '
                        <li class="nav-item">
                        <a class="nav-link" href="'.route('orders.status',$value->id).'"><i class="mdi mdi-chevron-right menu-icon"></i><span class="menu-title">'.$value->get_name().'</span><label class="badge" style="background-color:'.$value->bg.';color:'.$value->color.'">'.$count.'</label></a>
                    </li>';
                }
            }
        }
        return $lis;  
    }
    private function _ADMINMENU ($data,$id = 0,$ram ="",$parent = null){
        $Route = \Route::getCurrentRoute();
        $uri   = asset($Route->uri);
        $termsList = array();
        $new_listdata = array();
        if ($data != null) {
            foreach ($data AS $key => $item )
            {
                if ($item->pid == $id)
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
        {   if($id == 0){
                $this->_DATA["_ADMINMENU"] .= '<ul class="nav">';
            }else{
                $show = (@$parent != null && @$this->_MODULE != null && @$parent->pid == 0 && $parent->module_id == $this->_MODULE->id) ? 'show' : '';
                $this->_DATA["_ADMINMENU"] .= '<div class="collapse '.$show.'" id="'.$ram.'"><ul class="nav flex-column sub-menu">';
            }
            foreach ($termsList AS $key => $item_2 )
            {
                if($this->_USER->is_sys == 0){
                    $module   = $item_2->module;
                    $rotename = app('router')->getRoutes()->match(app('request')->create($item_2->path))->getName();
                    if(!in_array($rotename, $this->_COMMONROUTE)){
                        $pathArg  = explode(".", $rotename);
                        if(count($pathArg) == 1){
                            $afterPath = "index";
                        }else{
                            $afterPath = @$pathArg[count($pathArg) - 1];
                        }
                        if($module){
                            $PathNamespace = '\App\Http\Controllers\\'.$module->controller .'Controller'; 
                            if(class_exists($PathNamespace)){
                                $Class = new $PathNamespace();
                                $_ROLNAMES = $Class->_ROLNAMES;
                                $checkKey = "";
                                foreach ($_ROLNAMES as $key => $value) {
                                    if(in_array($afterPath, $value)){
                                        $checkKey = $key;
                                        break;
                                    }
                                }
                                if(!$this->checkUserAllowAction($checkKey,$item_2->module_id)) continue;
                            }
                        }else{
                            continue;
                        }
                    }
                }
                $url  = $this->_URLFIX.$item_2->path;
                $url  = str_replace("////","/", $url);
                $url  = str_replace("///","/", $url);
                $url  = str_replace("//","/", $url); 
                $get_name = $item_2->get_name(); 
                $ram = uniqid();    
                $item_2->icon = $item_2->icon ? $item_2->icon : "mdi mdi-chevron-right" ;     
                if(@$item_2->show != "no"){
                    if($uri == asset($item_2->path)){
                        $this->_DATA["_ADMINMENU"] .= '<li class="nav-item '.$item_2->class_name.'">';
                    }else{
                        $this->_DATA["_ADMINMENU"] .= '<li class="nav-item '.$item_2->class_name.'">';

                    }
                    $arrow = $item_2->is_parent > 0 ?  '<i class="menu-arrow"></i>' : '';
                    if($item_2->is_parent > 0 ){
                         $this->_DATA["_ADMINMENU"] .='<a href="#'.$ram.'" class="nav-link collapsed" data-toggle="collapse" aria-expanded="false" aria-controls="'.$ram.'">
                            <i class="'.$item_2->icon.' menu-icon"></i>
                            <span class="menu-title">'.$get_name.'</span>
                            '.$arrow.'
                        </a>';
                    }else{
                        if($uri !== "" && $uri == asset($item_2->path)){
                            $this->_DATA["_ADMINMENU"] .= '
                            <a href="'.asset($item_2->path).'" class="nav-link active">
                                <i class="'.$item_2->icon.' menu-icon"></i>
                                <span class="menu-title">'.$get_name.'</span>
                            </a>';
                        }else{
                            $this->_DATA["_ADMINMENU"] .= '
                            <a href="'.asset($item_2->path).'" class="nav-link">
                                <i class="'.$item_2->icon.' menu-icon"></i>
                                <span class="menu-title">'.$get_name.'</span>
                            </a>';
                        }
                    }

                    $this->_ADMINMENU ($new_listdata, $item_2->id,$ram,$item_2);
                    $this->_DATA["_ADMINMENU"] .= '</li>';
                    $this->_DATA["_ADMINMENU"] .= '</li>';
                }
            }
            if($id == 0){
                $this->_DATA["_ADMINMENU"] .= "</ul>";
            }else{
                if($parent != null  && $parent->shortcode) $this->_DATA["_ADMINMENU"] .= $this->doShortcode($parent->shortcode);
                $this->_DATA["_ADMINMENU"] .= "</ul></div>";
            }

        }
        return $this->_DATA["_ADMINMENU"];
    }

    public function _validateRULE($role = null){
        $Route      = \Route::getCurrentRoute();
        $ControllerName = "";
        $ActionName = "";
        if($Route){
            $argC  = explode('\\', $Route->getActionName());
            $argC  = $argC[(count($argC) - 1)];
            $argC  = explode('Controller@',$argC);
            $ControllerName = $argC[0];
            $ActionName     = $argC[1];
        }else return false;
        
        if(in_array(strtolower($ControllerName), $this->_COMMONROUTE)) return true;
        foreach ($this->_ROLNAMES as $key => $value) {
           if(in_array($ActionName, $value)){
                $action = $key;
                $this->_ROLNAME = $key;
                if($key == "view") $this->_LISTPAGE = true;
                if($this->_USER->is_sys == 0)
                    $this->_MODULE = \App\Http\Models\Role_Module::_validateRULE($role,$ControllerName,$action);
                else
                    $this->_MODULE = \App\Http\Models\Modules::where([
                        ["controller","=",$ControllerName]
                    ])->first();
                break;
           }
        }
        if($this->_MODULE != null){
            session(['_MODULE_ID' => $this->_MODULE->id]); 
            return true;
        }
        else
            return false;
    }
    public function GetMenuBySlug($slug = null){
        $role = @$this->_USER->role_module_id;
        if($slug == null) return false;
        if($role == null) return false;
        $menu = DB::table("menu_groups")->where("slug","=",$slug)->first();
        if($menu == null) return false;
        $tbl1 = Menus::getTableName();
        if($this->_USER->is_sys == 1){
            $menuItems  = Menus::orderBy($tbl1.".sort","ASC")
            ->join("status","status.id",'=',$tbl1.".status_id")
            ->select($tbl1.".*",DB::raw("(select count(tbl2.id) from menus as tbl2 where(tbl2.pid = ".$tbl1.".id)) as is_parent "))
             ->where([
                [$tbl1.".group_id","=",$menu->id],
                ["status.level",">",0]
            ])
            ->get();
        }else{
            $menuItems  = Menus::orderBy($tbl1.".sort","ASC")
            ->join(DB::raw("
                (select tbl2.* from `modules` as `tbl2` join `role_module` as `tbl3` on `tbl2`.`id` = `tbl3`.`module_id` where (`tbl3`.`role_id` = {$role} and `tbl3`.`view` = 1) 
                    UNION
                    select tbl2.* from `modules` as `tbl2` where tbl2.is_common = 1
                ) as tbl3
                "),"tbl3.id","=",$tbl1.".module_id") 
            ->join("status","status.id",'=',$tbl1.".status_id")
            ->select($tbl1.".*",DB::raw("(select count(tbl2.id) from menus as tbl2 where(tbl2.pid = ".$tbl1.".id)) as is_parent "))

            ->where([
                [$tbl1.".group_id","=",$menu->id],
                ["status.level",">",0]
            ])
            ->get();
        }

        return $menuItems;
    }
    public function GetStatus(){
        $status = [
            'Shut down',
            'Active'
        ];
        return $status;
    }
    public function getListStatus ($module_id = null){
        $module_id = $module_id == null  ? $this->_MODULE->id : $module_id; 
        if($this->_USER->is_sys == 0){
            $statusARG = \App\Http\Models\Status::
            join("status_role","status.id","=","status_role.status_id")
            ->where("module_id","=",$module_id)
            ->where("status_role.role_id","=",$this->_USER->role_module_id)
            ->select(["status.id"])
            ->get();
        }
        else{
            $statusARG = \App\Http\Models\Status::
            where("module_id","=",$module_id)
            ->select(["status.id"])
            ->get();
        }
        $ids = [0];
        foreach ($statusARG as $key => $value) {
            $ids [] = $value->id;
        }
        return \App\Http\Models\Status::wherein("id",$ids)->where("not_select","!=",1)->orderby("status.sort","ASC")->get();
    }
    public function getListStatusOnSuccess (){
        $statusARG = \App\Http\Models\Status::
        where("module_id","=",$this->_MODULE->id)
        ->where("options","=",1)
        ->select(["status.*"])
        ->orderby("status.sort","DESC")->first();
        return $statusARG;
    }
    public function getListStatusByModels ($module_id = null){
        if($module_id == null) $module_id = $this->_MODULE->id;
        $statusARG = \App\Http\Models\Status::
        where("module_id","=",$module_id)
        ->select(["status.*"])
        ->orderby("status.sort","DESC");
        return $statusARG;
    }
    public function getListStatusBefore (){
        $statusARG = \App\Http\Models\Status::
        where("module_id","=",$this->_MODULE->id)
        ->select(["status.*"])
        ->orderby("status.sort","ASC")->first();
        return $statusARG;
    }
    public function getCommonListStatus (){
        $statusARG = \App\Http\Models\Status::where("is_common","=",1)
        ->WhereNull('module_id')->get();
        return $statusARG;
    }
    function getIsCommonList(){
        $list = [];
        $cm1 = new IsCommon();
        $cm1->id = 1;
        $cm1->name = '_YES_';
        $cm2 = new IsCommon();
        $cm2->id = 2;
        $cm2->name = '_NO_';
        $list[] = $cm2;
        $list[] = $cm1;
        return $list;
    }
    function activerCommon($id){
        $list = $this->getIsCommonList();
        foreach ($list as $key => $value) {
            if($id == $value->id)
                return $value->name;
        }
    }
    public function getAllRoute(){
        return $this->_ROLNAMES;
    }
    public function getCurrentModule(){
        return $this->_MODULE;
    }
    public function checkUserAllowAction ($type,$module_id = null){
        if($this->_USER->is_sys == 1) return true;
        if(in_array($type, ['add','update','view','delete'])){
            if($module_id == null) $module_id = $this->_MODULE->id;
            $r = \App\Http\Models\Role_Module::where([
                ["module_id","=",$module_id],
                ["role_id","=",$this->_USER->role_module_id],
                [$type,"=",1]
            ])->first();
            return $r ? true : false;
        }
        return true;
    }
    public function checkUserAllowStatus ($options,$module_id = null){
        if($this->_USER->is_sys == 1) return true;
        if($module_id == null) $module_id = $this->_MODULE->id;
        $r = \App\Http\Models\Status_Roles::
        join(\App\Http\Models\Role_Module::getTableName(),\App\Http\Models\Role_Module::getTableName().'.role_id','=',\App\Http\Models\Status_Roles::getTableName().'.role_id')
        ->join(\App\Http\Models\Status::getTableName(),\App\Http\Models\Status::getTableName().'.id','=',\App\Http\Models\Status_Roles::getTableName().'.status_id')
        ->where([
            [\App\Http\Models\Status::getTableName().".options","=",$options],
            [\App\Http\Models\Role_Module::getTableName().'.module_id','=',$module_id],
            [\App\Http\Models\Role_Module::getTableName().".role_id","=",$this->_USER->role_module_id]
        ])->first();
        return $r ? true : false;
    }
    public function getcountNotifications(){
        $c = \App\Http\Models\Notifications::where([
            ['user_receive','=',$this->_USER->id],
            ['is_view','=',0]
        ])->get()->count();
        return $c;
    }
    public function getNotifications($offset = 0,$limit = 10,$type = true){
        return \App\Http\Models\Notifications::where([
            ['user_receive','=',$this->_USER->id]
        ])
        ->orderby("view_detail",'ASC')
        ->orderby("id",'DESC')
        ->skip($offset)->take($limit)->get();
    }
    public function getLangLableValue ($key,$searchs = null,$replaces = null){
        $LanguageLabels = \App\Http\Models\LanguageLabels::where('key_id','=',$key)->first();
        if($LanguageLabels){
            $value = \App\Http\Models\LanguageValues::where('label_id','=',$LanguageLabels->id)->where('lang_id','=',$this->_LANG_ID)->first();
            if( $value){
                if($searchs && $replaces){
                    return str_ireplace($searchs, $replaces, $value->value);
                }else{
                    return $value->value;
                }
            }      
        }
        return '';
    }
}

/**
 *
 */
class IsCommon
{
    public $id;
    public $name;
}
