<?php

namespace App\Http\Models;

 
class Mstitemclass extends BaseModel
{
    protected $table = 'mstitemclass';
    protected $primaryKey = 'ItemClassId';
    protected function getItemByClass($class_id,$class_key){
        return $this->select([$this->table.".*"])->join("mstitem","mstitem.ItemClassId","=",$this->table.".ItemClassId")
    	->join("mstitemprice","mstitem.ItemId","=","mstitemprice.ItemId")
    	->join("mstclass","mstclass.ClassKey","=","mstitemprice.GroupClassKey")
    	->where("mstclass.Class","=",$class_id)
    	->where("mstclass.ClassKey","=",$class_key)
    	->groupBy($this->table.".ItemClassId")
    	->orderBy($this->table.".DispOrder")
        ->orderBy($this->table.".ItemClassId");
    }
    public function Mstitems($class_id,$class_key){
    	return $this->select(["mstitem.*",$this->table.'.ParentItemClassId'])
        ->join("mstitem","mstitem.ItemClassId","=",$this->table.".ItemClassId")
    	->join("mstitemprice","mstitem.ItemId","=","mstitemprice.ItemId")
    	->join("mstclass","mstclass.ClassKey","=","mstitemprice.GroupClassKey")
    	->where("mstclass.Class","=",$class_id)
    	->where("mstclass.ClassKey","=",$class_key)
    	->where($this->table.".ItemClassId","=",$this->{$this->primaryKey})
    	->groupBy("mstitem.ItemId")
    	->orderBy("mstitem.ItemName","ASC");
    }
    public function GetItemByParent($class_id,$class_key,$parent_id){
        return $this->select(["mstitem.*",$this->table.'.ParentItemClassId'])->join("mstitem","mstitem.ItemClassId","=",$this->table.".ItemClassId")
        ->join("mstitemprice","mstitem.ItemId","=","mstitemprice.ItemId")
        ->join("mstclass","mstclass.ClassKey","=","mstitemprice.GroupClassKey")
        ->where("mstclass.Class","=",$class_id)
        ->where("mstclass.ClassKey","=",$class_key)
        ->where($this->table.".ItemClassId","=",$this->{$this->primaryKey})
        ->groupBy("mstitem.ItemId")
        ->orderBy("mstitem.ItemId","DESC");
    }
}
