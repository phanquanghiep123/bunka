<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ProductClass;

class ItemPrice extends Model
{
    public $timestamps = false;

    protected $table = 'mstitemprice';
    // protected $primaryKey = 'ItemId';
    protected $fillable = [
        'ItemId',
        'UnitPrice',
        'UnitPriceOther',
        'ValidTo',
        'ValidFrom'
    ];
    //
    public function groupClass()
    {
        $productClass = new ProductClass;
        return $productClass->listProductClass();
    }

    //
    public function itemPrices()
    {
        return DB::table('mstitemprice')
            ->select(
                'groupclass.ClassName',
                'groupclass.ClassKey',
                'mstitem.ItemClassId',
                'mstitem.ItemName',
                'mstitemclass.ItemClassName',
                'mstitemprice.GroupClassKey',
                'mstitemprice.ItemId',
                'mstitemprice.UnitPrice',
                'mstitemprice.UnitPriceOther',
                'mstitemprice.ValidTo',
                DB::raw('MAX(mstitemprice.ValidFrom) AS ValidFrom')
            )
            ->leftJoin('mstitem', 'mstitem.ItemId', '=', 'mstitemprice.ItemId')
            ->leftJoin('mstitemclass', 'mstitemclass.ItemClassId', '=', 'mstitem.ItemClassId')
            ->leftJoinSub($this->groupClass(), 'groupclass', function ($join) {
                $join->on('groupclass.ClassKey', '=', 'mstitemprice.GroupClassKey');
            })
            ->where('ValidFrom', '<', DB::raw('NOW()'))
            ->groupBy('mstitemprice.ItemId');
    }

    public function byItemId($id)
    {
        return $this->itemPrices()->where('mstitemprice.ItemId', '=', $id)->first();
    }
}
