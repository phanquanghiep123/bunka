<?php

namespace App\Http\Models;
use DB;

class QuotationDetails extends BaseModel
{
    protected $table = 'quotation_details';
    protected $hidden = ["created_at", "updated_at"];
    public function items () {
    	return $this->hasMany('App\Http\Models\QuotationDetailItems', 'detail_id','id')
    	->select([
            'quotation_detail_items.is_inlandfreightfee',
            'quotation_detail_items.is_installfee',
            'quotation_detail_items.is_installationqs',
    		'quotation_detail_items.width',
    		'quotation_detail_items.height',
    		'quotation_detail_items.quantity',
    		'quotation_detail_items.saleprice',
    		'quotation_detail_items.price',
    		'mstitemclass.ItemClassName',
    		'mstitemclass.ItemClassId',
    		'mstitemclass.FormatPattern',
            'mstitem.ItemId',
    		'mstitem.ItemName'
    	])
    	->join('mstitem',  'mstitem.ItemId','=','quotation_detail_items.item_id')
    	->join('mstitemclass','mstitemclass.ItemClassId','=','mstitem.ItemClassId')
        ->orderBy("quotation_detail_items.is_product","DESC")
    	->orderBy("mstitemclass.DispOrder")
        ->orderBy("mstitemclass.ItemClassId")
        ->orderBy("quotation_detail_items.created_at");
    }
    
    public function items_other () {
    	return $this->hasMany('App\Http\Models\QuotationDetailOtherItems', 'detail_id','id')
    	->select([
            'quotation_detail_other_items.name',
            'quotation_detail_other_items.remarks',
    		'quotation_detail_other_items.width',
    		'quotation_detail_other_items.height',
    		'quotation_detail_other_items.quantity',
    		'quotation_detail_other_items.saleprice',
    		'quotation_detail_other_items.price'
    	])
        ->orderBy("quotation_detail_other_items.created_at","DESC");
    }
    
    public function product () {
    	$m = WebConfigs::where("key",'=','ClassProduct')->first();
    	return $this->hasOne('App\Http\Models\Mstclass', 'ClassKey','product_id')->where('Class','=',$m->value);
    }

    public function mstfactoryitem() {
        return $this->hasOne('App\Http\Models\Mstfactoryitem', 'FactoryCode','code');
    }

    public function mstfactoryitem_by_code($code){
        return \App\Http\Models\Mstfactoryitem::where('FactoryCode','=',$code)->first();
    }

    public function quotation_detail_other_items(){
        return $this->hasMany('App\Http\Models\QuotationDetailOtherItems', 'detail_id', 'id');
    }

    public function factory_product_by_code($code,$code_works){
        return \App\Http\Models\FactoryProductManufacturing::where('FactoryCode','=',$code)->where('code_works',$code_works)->sum('price_real');
    }

    public function get_factory_code($detail_id){
        $query = DB::table('quotation_detail_items AS tbl1')
                ->join('mstitem AS tbl2', 'tbl1.item_id', '=', 'tbl2.ItemId')
                ->join('mstfactoryitem AS tbl3', 'tbl2.FactoryCode', '=', 'tbl3.FactoryCode')
                ->where('tbl1.detail_id', $detail_id)
                ->whereNotNull('tbl2.FactoryCode')
                ->first();
        return @$query;
    }

   
}
