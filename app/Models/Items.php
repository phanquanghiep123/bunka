<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use App\Models\ItemPrice;
use App\Models\ProductClass;

class Items extends Model
{
    //
    protected $table = 'mstitem';

    public $timestamps = false;

    protected $primaryKey = 'ItemId';

    public $ClassKey;

    private $itemPrice;

    public function __construct() {
        $this->itemPrice = new ItemPrice;
    }

    public function itemByClassKey($ClassKey)
    {
        return $this->itemPrice->itemPrices()->where('mstitemprice.GroupClassKey9', $ClassKey);
    }

    /**
     * Get danh sách Item theo ClassKey
     */
    public function getItemsByClassKey( $ClassKey)
    {
        return $this->itemByClassKey($ClassKey)->get();
    }

    public function getByItemClass($ItemClassId)
    {
        return $this->itemPrice->itemPrices()
            ->where('mstitem.ItemClassId', $ItemClassId)
            ->get();
    }

    /**
     * Lấy thông tin gần như đầy đủ phục vụ cho việc tính giá
     */
    public function itemDetail(Int $id)
    {
        $produceClass = new ProductClass;
        $query = DB::table($this->table . ' AS item')
            ->select([
                'item.ItemId',
                'item.Itemname AS ItemName',
                'item.ItemClassId',
                'item.PricePatternKey',
                'type.ItemClassName',
                'type.Unit',
                'type.WInputFlg',
                'type.HInputFlg',
                'type.QInputFlg',
                'type.PricePattern',
                'type.DispOrder',
                'type.ParentItemClassId',
                'type.FormatPattern',
                'price.GroupClassKey AS ProduceClass',
                'price.UnitPrice',
                'price.UnitPriceOther',
                DB::raw('MAX(price.ValidFrom) AS ValidFrom'),
                'price.ValidTo'
            ])
            ->leftJoin('mstitemclass AS type', 'item.ItemClassId', '=', 'type.ItemClassId')
            ->leftJoin('mstitemprice AS price', 'item.ItemId', '=', 'price.ItemId')
            ->where([
                ['item.ItemId', '=', $id],
                ['price.ValidFrom', '<', DB::raw('NOW()')]
            ])
            ->groupBy('price.ItemId');

        $result = $query->first();

        $result->ProduceClass = $produceClass->getProduceByClassKey($result->ProduceClass);

        return $result;
    }
}
