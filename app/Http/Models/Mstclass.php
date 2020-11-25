<?php

namespace App\Http\Models;
use DB;
class Mstclass extends BaseModel
{
    protected $table = 'mstclass';
    public function Mstitemprice(){
    	return $this->hasMany('App\Http\Models\Mstitemprice','GroupClassKey','ClassKey');
    }
    protected function getItemsForPricePatternKey ($PricePatternKey,$W,$H) {
    	$t = "( SELECT MIN(CAST(MC.Value3 AS DECIMAL)) WI, MIN(CAST(MC.Value4 AS DECIMAL)) HE FROM MstClass MC WHERE MC.Class = '7' AND MC.Value1= '".$PricePatternKey."' AND MC.Value2 = '1' AND CAST(MC.Value3 as DECIMAL) >= ".$W." AND CAST(MC.Value4 as DECIMAL)>= ".$H." ) as tbl2";
    	return $this->select([$this->table.'.Value6 As KeyLimit'])->join( DB::raw($t), DB::raw("CAST(mstclass.Value3 as DECIMAL)"),"=","tbl2.WI")
		->where([
			[$this->table.".Class","=",7],
			[$this->table.".Value1","=",$PricePatternKey],
			[$this->table.".Value2","=",1]
		]);
    }
}
