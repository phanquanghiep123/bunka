<?php

namespace App\Http\Models;
class Quotations extends BaseModel
{
    protected $table      = "quotations";
    protected $casts = [
        'created_at' => 'date:d/m/Y',
        'updated_at' => 'date:d/m/Y',
        'date_start' => 'date:d/m/Y',
    ];
    public function order()
    {
        return $this->hasOne('App\Http\Models\Orders', 'quotation_id', 'id');
    }
    public function customer()
    {
        return $this->hasOne('App\Http\Models\Customers', 'id', 'customer_id');
    }
    public function branch()
    {
        return $this->hasOne('App\Http\Models\Branchs', 'id', 'branch_id');
    }
    public function area()
    {
        return $this->hasOne('App\Http\Models\Areas', 'id', 'area_id');
    }
    public function construction()
    {
        return $this->hasOne('App\Http\Models\Constructions', 'id', 'construction_id');
    }
    public function tax()
    {
        return $this->hasOne('App\Http\Models\Taxs', 'ClassKey', 'tax_id')->where("Class", "=", 3);
    }
    public function rate()
    {
        return $this->hasOne('App\Http\Models\Rates', 'ClassKey', 'rate_id')->where("Class", "=", 2);
    }
    public function request()
    {
        return $this->hasMany('App\Http\Models\RequestQuotations', 'quotation_id', 'id')
        ->orderby("id", "DESC");
    }
    public function requests()
    {
        return $this->hasMany('App\Http\Models\RequestQuotations', 'quotation_id','id');
    }
    public function details()
    {
        return $this->hasMany('App\Http\Models\QuotationDetails', 'quotation_id','id')->orderby("product_id",'ASC');
    }
    public function detailsByproduct($productID){
        return $this->hasMany('App\Http\Models\QuotationDetails', 'quotation_id','id')->where('product_id','=',$productID);
    }
    public function Otherdetail()
    {
        return $this->hasMany('App\Http\Models\QuotationOtherDetails', 'quotation_id','id');
    }
    public function dowload (){
        return $this->hasMany('App\Http\Models\QuotationDownloads', 'id', 'quotation_id')
            ->orderby("id", "DESC");
    }
    public function OrderParent(){
        return $this->hasOne('App\Http\Models\Orders', 'quotation_id', 'reversion_pid');
    }

    public function UploadRequests()
    {
        return $this->hasMany('App\Http\Models\UploadRequests', 'quotation_id', 'id')
        ->orderby("id", "DESC");
    }
    public function UploadDetailRequests($product_id,$order_id,$quotation_id)
    {
        return UploadDetailRequests::where([
            ["order_id","=",$order_id],
            ["product_id","=",$product_id],
            ["quotation_id","=",$quotation_id],
        ])
        ->orderby("id", "DESC")->get();
    }

    /**
     * Loading basic info of user who created
     */
    public function created_by()
    {
        return $this->hasOne('App\Http\Models\Users', 'id', 'user_created')->select([
            'id',
            'first_name',
            'last_name',
            'email'
        ]);
    }

    /**
     * Get winning bid rate
     */
    public function winrate()
    {
        return $this->hasOne('App\Http\Models\QuotationWinRate', 'quotation_id', 'id')->orderBy('id', 'desc');
    }
}
