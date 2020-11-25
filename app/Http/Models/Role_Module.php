<?php
namespace App\Http\Models;
use DB;

class Role_Module extends BaseModel
{
    protected $table = 'role_module';
    protected $fillable = [
        'module_id','role_id','add', 'update', 'view','delete'
    ];
    protected $primaryKey = (['module_id', 'role_id']);
    public $incrementing = false;
    protected function GetModulesAllow ($RoleID){
        return $this
        ->rightJoin("modules",function($q) use ($RoleID)
        {
            $q->on('modules.id', '=', 'role_module.module_id')
            
            ->on('role_module.role_id', '=', DB::raw($RoleID))
            ->orderBy("modules.sort");
        })
        ->join("status","modules.status_id","=","status.id")
        ->where("status.level",">",0)
        ->where([
            ["modules.is_common","=",2]
        ])
        ->select("modules.*","role_module.view","role_module.add","role_module.update","role_module.delete","role_module.all",DB::raw($RoleID." as role_id"))
        
        ->groupBy("modules.id")
        ->get();
    }
    protected function getModelByUser($RoleID){
        return $this->roleStatus("modules")
        ->join("modules","modules.id","=","role_module.module_id")
        ->join("roles","roles.id","role_module.role_id") 
        ->where("role_module.role_id","=",$RoleID)
        ->where("role_module.isview","=","1")
        ->orderBy("modules.sort_order")
        ->groupBy("modules.id")
        ->get();
    }
    protected function _validateRULE($role,$path,$action){
        $f = $this->join("modules","modules.id","=","role_module.module_id")
        ->select("modules.*")
        ->where(function ($query) use($role,$path,$action){
            $query->where([
                ["role_module.role_id","=",$role],
                ["role_module.".$action,"=",1],
                ["modules.controller","=",$path]
            ]);
        })
        ->first();
        if($f) return $f;

        $f = DB::table("modules")->select("modules.*")
        ->where([
            ["modules.is_common","=",1],
            ["modules.controller","=",$path]
        ])
        ->first();
        return $f;
    }
}
