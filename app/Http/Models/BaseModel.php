<?php
namespace App\Http\Models;

use Illuminate\Database\Eloquent\Model;
use Auth;
use DB;
use Schema;
use Carbon\Carbon;
use DateTime;
class BaseModel extends Model
{


    public static function boot()
    {

        static::creating(function ($model) {
            $_USER = Auth::user();
            if (Schema::hasColumn($model->getTable(), 'user_created')) {
                $model->user_created = $_USER['id'];
            }
            
            return true;
        });
        static::updating(function ($model) {
            $_USER = Auth::user();
            if (Schema::hasColumn($model->getTable(), 'user_updated')) {
                $model->user_updated = $_USER['id'];
            }
            return true;
        });
        static::creating(function ($model) {
            $_USER = Auth::user();
            if (Schema::hasColumn($model->getTable(), 'created_by')) {
                $model->created_by = $_USER['id'];
            }
            
            return true;
        });
        static::updating(function ($model) {
            $_USER = Auth::user();
            if (Schema::hasColumn($model->getTable(), 'updated_by')) {
                $model->updated_by = $_USER['id'];
            }
            return true;
        });
        parent::boot();
    }
    
    public function status()
    {
        return $this->hasOne('App\Http\Models\Status', 'id', 'status_id');
    }
    protected function roleStatus($table = null, $level = 0)
    {
        if ($table == null) {
            $table = $this->getTable();
        }

        $columns = DB::getSchemaBuilder()->getColumnListing($table);
        if (in_array("status_id", $columns)) {
            return $this->join("status AS status_table", "status_table.id", "=", $table . ".status_id")
                ->select($table . ".*")
                ->where("status_table.level", ">", $level);
        }
        return $this;
    }
    public function get_name($lang_id = null)
    {
        if ($lang_id == null) {
            $lang_id = session('_LANG_ID');
        }

        $t = $this->getTable() . '_language';
        $c = Schema::hasTable($t);
        if ($c) {
            $key = $this->getKeyName();
            $r   = DB::table($t)->select($t.'.name')->join($this->getTable(), $this->getTable() . "." . $key, "=", $t . ".bind_key")->where(
                [
                    [$t . ".lang_id", "=", $lang_id],
                    [$this->getTable() . "." . $key, "=", $this->{$key}],
                ]
            )->first();
            if ($r) {
                return $r->name;
            } else {
                return "";
            }

        }
        return "";
    }
    protected function getTableName()
    {
        return $this->getTable();
    }
    protected function as($name){
        $this->setTable($this->getTableName() ." as " .$name);
        return $this;
    }
    public function language ($lang_id = null){
        if ($lang_id == null) {
            $lang_id = session('_LANG_ID');
        }
        $t = $this->getTable() . '_language';
        $c = Schema::hasTable($t);
        if ($c) {
            $key = $this->getKeyName();
            $r   = DB::table($t)->select('*')->join($this->getTable(), $this->getTable() . "." . $key, "=", $t . ".bind_key")->where(
                [
                    [$t . ".lang_id", "=", $lang_id],
                    [$this->getTable() . "." . $key, "=", $this->{$key}],
                ]
            )->first();
            $r->language = Languages::find($lang_id);
            return $r;
        }
        return null;
    }
    public  function bindDataToQuery($queryItem){
        $query = $queryItem['query'];
        $bindings = $queryItem['bindings'];
        $arr = explode('?',$query);
        $res = '';
        foreach($arr as $idx => $ele){
            if($idx < count($arr) - 1){
                $res = $res.$ele."'".$bindings[$idx]."'";
            }
        }
        $res = $res.$arr[count($arr) -1];
        return $res;
    }
    public function getLastSQL()
    {
        
        $queries = DB::getQueryLog();
        $last_query = end($queries);
        $last_query = $this->bindDataToQuery($last_query);     
        return $last_query;
    }
    public function getCreatedAtAttribute($date)
    {
        if(DateTime::createFromFormat('Y-m-d H:i:s', $date) !== FALSE){
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
        }
        return $date;  
    }

    public function getUpdatedAtAttribute($date)
    {
        if(DateTime::createFromFormat('Y-m-d H:i:s', $date) !== FALSE){
            return Carbon::createFromFormat('Y-m-d H:i:s', $date)->format('d/m/Y');
        }
        return $date;
    }

    
}
/**
 *
 */
