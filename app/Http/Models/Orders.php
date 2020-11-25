<?php

namespace App\Http\Models;

class Orders extends BaseModel
{
    protected $table = "orders";
    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
        "receiving_order_date" => 'date:d/m/Y',
        "planned_delivery_date" => 'date:d/m/Y',
        "planned_installation_date" => 'date:d/m/Y',
        "planned_completion_date" => 'date:d/m/Y'
    ];
    public function quotation()
    {
        return $this->hasOne('App\Http\Models\Quotations', 'id', 'quotation_id');
    }
    public function request()
    {
        return $this->hasMany('App\Http\Models\RequestOrders', 'order_id', 'id')
            ->orderby("id", "DESC");
    }
    public function requests()
    {
        return $this->hasMany('App\Http\Models\RequestOrders', 'order_id', 'id');
    }
    public function oldrequset()
    {
        return $this->hasMany('App\Http\Models\RequestOrders', 'order_id ', 'id')
            ->where("status_change", "=", $this->status_id)
            ->orderby("id", "DESC");
    }
    public function download (){
        return $this->hasMany('App\Http\Models\OrderDownloads', 'order_id', 'id')
            ->orderby("id", "DESC");
    }
    public function contract(){
        return $this->hasOne('App\Http\Models\Contracts', 'order_id', 'id');
    }
    public function factorys (){
        $tbl1 = new Quotations();
        $tbl2 = new QuotationDetails();
        $tbl3 = new QuotationDetailItems();
        $tbl4 = new Mstitem();
        $tbl5 = new FactoryProductManufacturing();
        return $this->join($tbl1->getTableName(),$tbl1->getTableName().'.id','=',$this->table.'.quotation_id')
        ->join($tbl2->getTableName(),$tbl2->getTableName().'.quotation_id','=',$tbl1->getTableName().'.id')
        ->join($tbl3->getTableName(),$tbl3->getTableName().'.detail_id','=',$tbl2->getTableName().'.id')
        ->join($tbl4->getTableName(),$tbl4->getTableName().'.ItemId','=',$tbl3->getTableName().'.item_id')
        ->join($tbl5->getTableName(),$tbl5->getTableName().'.FactoryCode','=',$tbl4->getTableName().'.FactoryCode')
        ->where([
            [$tbl5->getTableName().'.code_works','=',$this->order_number]
        ])
        ->get();
    }

    public function factorysByProduct ($productID){
        $tbl1 = new Quotations();
        $tbl2 = new QuotationDetails();
        $tbl3 = new QuotationDetailItems();
        $tbl4 = new Mstitem();
        $tbl5 = new FactoryProductManufacturing();
        return $this->join($tbl1->getTableName(),$tbl1->getTableName().'.id','=',$this->table.'.quotation_id')
        ->join($tbl2->getTableName(),$tbl2->getTableName().'.quotation_id','=',$tbl1->getTableName().'.id')
        ->join($tbl3->getTableName(),$tbl3->getTableName().'.detail_id','=',$tbl2->getTableName().'.id')
        ->join($tbl4->getTableName(),$tbl4->getTableName().'.ItemId','=',$tbl3->getTableName().'.item_id')
        ->join($tbl5->getTableName(),$tbl5->getTableName().'.FactoryCode','=',$tbl4->getTableName().'.FactoryCode')
        ->where([
            [$tbl5->getTableName().'.code_works','=',$this->order_number],
            [$tbl2->getTableName().'.product_id','=',$productID]
        ])
        ->get();
    }

    public function completion()
    {
        return $this->hasMany('App\Models\CompletionReport', 'order_id');
    }
    public function userchange (){
        return $this->hasOne('App\Http\Models\Users', 'id', 'person_in_charge') ;
    }
    public function construction (){
        return $this->hasOne('App\Http\Models\Constructions', 'id', 'construction_id') ;
    }
    
}
