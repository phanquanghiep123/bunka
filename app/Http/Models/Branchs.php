<?php
namespace App\Http\Models;
class Branchs extends BaseModel
{
    protected $casts = [
        'created_at' => 'datetime:Y/m/d',
        'updated_at' => 'datetime:Y/m/d',
    ];
    
    public function getMatrix($key){
        $WebConfig = WebConfigs::where("key","=",$key)->first();
        if($WebConfig != null) 
            return $WebConfig->value;
        else 
            return false;
    }

    public function status()
    {
        return $this->hasOne('App\Http\Models\Status','status_id','id');
    }

}
