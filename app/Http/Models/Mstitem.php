<?php

namespace App\Http\Models;
use DB;
class Mstitem extends BaseModel
{
    protected $table ='mstitem';
    protected $primaryKey = 'ItemId';
    protected function getLimitByParent ($ParentItemId,$ItemClassId,$Class,$ClassKey){
        return $this->select(["tbl4.*",'mstitemclass.ParentItemClassId'])->join("mstitemlimit",$this->table.".ItemId","=","mstitemlimit.ParentItemId")
        ->join("mstitem as tbl4","tbl4.ItemId","mstitemlimit.ItemId")
        ->join("mstitemclass","mstitemclass.ItemClassId","tbl4.ItemClassId")
        ->join ("mstitemprice","mstitemprice.ItemId","=","tbl4.ItemId")
        ->join("mstclass","mstclass.ClassKey","mstitemprice.GroupClassKey")
        ->where([
            ["mstitemlimit.ParentItemId","=",$ParentItemId],
            ["mstitemlimit.ItemClassId","=",$ItemClassId],
            ["mstclass.Class","=",$Class],
            ["mstclass.ClassKey","=",$ClassKey],
        ])
        ->groupBy("tbl4.ItemId");
    }
    protected function getItemLimit ($ItemClassId ,$MatrixValue = null,$ParentItemId = null) {
        $query =  $this
        ->select([$this->table.".*",'mstitemclass.ParentItemClassId','mstclass.Value2'])
        ->join ("mstitemprice","mstitemprice.ItemId","=",$this->table.".ItemId")
        ->join("mstclass","mstclass.ClassKey","mstitemprice.GroupClassKey")
        ->join("mstitemclass","mstitemclass.ItemClassId",$this->table.".ItemClassId");
        if($MatrixValue != null){
            $query->join("mstitemlimit","mstitemlimit.ItemId","=",$this->table.".ItemId")
            ->where([
                ["mstitemlimit.MatrixValue","=",$MatrixValue],
                ["mstitemlimit.ParentItemId","=",$ParentItemId],    
            ]);
        }
        return $query->where("mstitemclass.ItemClassId","=",$ItemClassId)
        ->orderBy("mstitem.ItemName","ASC")
        ->groupBy($this->table.".ItemId")->get();     
        
    }
    protected function KEYFILTER($ItemId,$Width,$Height,$Class = 7){
        $KEYFILTER =  $this->select(DB::raw("min(CAST(mstclass.Value2 as DECIMAL)) as MW , min(CAST(mstclass.Value3 as DECIMAL)) as MH , mstclass.Value6 as KEYFILTER"))->join("mstclass","mstclass.Value1","=",$this->table.".PricePatternKey")
        ->where([
            [$this->table.".ItemId","=",$ItemId],
            ["mstclass.Class","=",$Class],
            [DB::raw('CAST(mstclass.Value2 as DECIMAL)'),">=",$Width],
            [DB::raw('CAST(mstclass.Value3 as DECIMAL)'),">=",$Height]
        ])->first();
        if($KEYFILTER)
            return $KEYFILTER->KEYFILTER;
        return null;
    }
 
}





