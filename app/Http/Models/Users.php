<?php

namespace App\Http\Models;

use App\Notifications\ResetPassword as ResetPasswordNotification;
use App\Notifications\UserChangeQuotationStatus as UserChangeQuotationStatusNotification;
use App\Notifications\UserChangeOrderStatus as UserChangeOrderStatusNotification;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use Illuminate\Notifications\Notifiable;
use App\Mail\OrderChangeStatus as OrderChangeStatusMail;
use App\Mail\QuotationChangeStatus as QuotationChangeStatusMail;
use App\Mail\ContractChangeStatus as ContractChangeStatusMail;
class Users extends Authenticatable
{
    use Notifiable;


    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];
    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'created_at' => 'datetime:d/m/Y H:i:s',
        'updated_at' => 'datetime:d/m/Y H:i:s',
    ];
    public function sendPasswordResetNotification($token)
    {
        $this->notify(new ResetPasswordNotification($token, $this->email));
    }
    public function sendUserChangeStatusNotification($request)
    {
        $this->notify(new UserChangeQuotationStatusNotification($this->email, $request,$this));
    }

    public function sendUserChangeOrderStatusMail(RequestOrders $RequestOrder){
       
        Mail::to($this)->queue(new OrderChangeStatusMail($RequestOrder,$this));
    }
    public function sendQuotationChangeStatusMail(RequestQuotations $RequestQuotation){
        Mail::to($this)->queue(new QuotationChangeStatusMail($RequestQuotation,$this));
    }
    public function sendContractChangeStatusMail(Contracts $Contract){
        Mail::to($this)->queue(new ContractChangeStatusMail($Contract,$this));
    }
    public function sendUserChangeOrderStatusNotification($order)
    {
        $this->notify(new UserChangeOrderStatusNotification($this->email, $order,$this));
    }
    public function status()
    {
        return $this->hasOne('App\Http\Models\Status', 'id', 'status_id');
    }

    public function role()
    {
        return $this->hasOne('App\Http\Models\Roles', 'id', 'role_module_id');
    }
    public function hasTypeUserForQuotation($quotation = null)
    {
        $m     = WebConfigs::where('key', '=', 'QuotaitionID')->first();
        $tbl1  = Roles::getTableName();
        $tbl2  = Status_Roles::getTableName();
        $tbl3  = Status::getTableName();
        $check = $this->join($tbl1, $tbl1 . ".id", "=", $this->getTable() . ".role_module_id")
            ->join($tbl2, $tbl2 . ".role_id", "=", $tbl1 . ".id")
            ->join($tbl3, $tbl3 . ".id", "=", $tbl2 . ".status_id")
            ->where([
                [$tbl3 . ".options", "=", "2"],
                [$tbl3 . ".module_id", "=", $m->value],
                [$this->getTable() . ".id", "=", $this->id],
                
            ]);
         if($quotation){
            $check->where(
                [
                    [$this->getTable().".branch_id","=",@$quotation->branch_id],
                    [$this->getTable().".branch_id","!=",null]
                ]
            );
        } 
        $check->first();
        return $check ? 1 : 0;
    }

    protected function getTableName()
    {
        return $this->getTable();
    }

    public function hasTypeUserForOrder($order = null)
    {
        
        $m     = WebConfigs::where('key', '=', 'OrDerID')->first();
        $tbl1  = Roles::getTableName();
        $tbl2  = Status_Roles::getTableName();
        $tbl3  = Status::getTableName();
        $check = $this->join($tbl1, $tbl1 . ".id", "=", $this->getTable() . ".role_module_id")
            ->join($tbl2, $tbl2 . ".role_id", "=", $tbl1 . ".id")
            ->join($tbl3, $tbl3 . ".id", "=", $tbl2 . ".status_id")
            ->where([
                [$tbl3 . ".options", "=", "2"],
                [$tbl3 . ".module_id", "=", $m->value],
                [$this->getTable() . ".id", "=", $this->id],
                
            ]);
        if($order){
            $quotation = $order->quotation;
            if(!$quotation) return 0;
            $check->where(
                [
                    [$this->getTable().".branch_id","!=",@$quotation->branch_id],
                    [$this->getTable().".branch_id","!=",null]
                ]
            );
        }   
        $check->first();
        return $check ? 1 : 0;
    }

    public function hasTypeUserForContract($options,$contract = null)
    {
        
        $m     = WebConfigs::where('key', '=', 'ContractID')->first();
        $tbl1  = Roles::getTableName();
        $tbl2  = Status_Roles::getTableName();
        $tbl3  = Status::getTableName();
        $check = $this->join($tbl1, $tbl1 . ".id", "=", $this->getTable() . ".role_module_id")
            ->join($tbl2, $tbl2 . ".role_id", "=", $tbl1 . ".id")
            ->join($tbl3, $tbl3 . ".id", "=", $tbl2 . ".status_id")
            ->where([
                [$tbl3 . ".module_id", "=", $m->value],
                [$this->getTable() . ".id", "=", $this->id]
            ]);
        if($options){
            $check->where($tbl3 .'.options','=',$options);
        }
        if($contract){
            $order = $contract->order;
            if(!$order) return 0 ;
            $quotation = $order->quotation;
            if(!$quotation) return 0;
            $check->where(
                [
                    [$this->getTable().".branch_id","!=",@$quotation->branch_id],
                    [$this->getTable().".branch_id","!=",null]
                ]
            );
        }   
        $check->first();
        return $check ? 1 : 0;
    }

    public function construction_completions($year)
    {
        return $this->hasMany('App\Http\Models\ConstructionCompletion','user_id')->where("year", "=", $year);
    }
    
}
