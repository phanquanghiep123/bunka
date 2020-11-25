<?php

namespace App\Http\Helper;

use App\Models\Classes;
use App\Models\Items;
use App\Enums\Matrix;

class ItemHelper
{
    public $PricePatternKey;

    public $ItemId;

    public $Width;

    public $Height;

    public $Quantity;

    public $ProduceClass;

    public $TotalPrice;

    public $ParentPrice;

    public $UnitPrice;

    public $UnitPriceOther;

    private $_classes;

    private $_items;

    private $_item;

    public $detail;

    public function __construct(Int $ItemId = 0) {
        // Ah will do something here
        $this->_classes = new Classes();
        $this->_items = new Items();

        if ( $ItemId > 0 ) {
            $this->_item = $this->detail = $this->_items->itemDetail($ItemId);
            $this->PricePatternKey = $this->detail->PricePattern;
            $this->ItemId = $this->detail->ItemId;
            $this->ProduceClass = $this->detail->ProduceClass;
            $this->UnitPrice = $this->detail->UnitPrice;
            $this->UnitPriceOther = $this->detail->UnitPriceOther;
        }
    }

    private function CheckInputData(Type $var = null)
    {
        # code...
    }

    public function ExportPriceByPattern()
    {
        $result = 0.00;

        switch ($this->PricePatternKey)
        {
            case '01':
                if (!is_null($this->UnitPriceOther)) {
                    $result = ((((float)$this->Width / 1000) + (2 * ((float)$this->Height / 1000))) * (float)$this->UnitPriceOther) + ((float)$this->Width / 1000 * (float)$this->Height / 1000 * $this->UnitPrice);
                }
                break;

            case '02':
                $result = (float)$this->Width / 1000 * (float)$this->Height / 1000 * $this->UnitPrice;
                break;

            case '03':
                $result = ((float)$this->Width / 1000 * (float)$this->Height / 1000) * $this->UnitPrice + (float)$this->ProduceClass->BasePrice;
                break;

            case '04': // price pattern parent price
                $result = $this->ParentPrice * $this->UnitPrice;
                break;

            case '05':
                $result = (float)$this->Width / 1000 * $this->UnitPrice;
                break;

            case '06':
                $result = (float)$this->Height / 1000 * $this->UnitPrice;
                break;

            case '07':
                $result = (float)$this->Width / 1000 * (float)$this->Height / 1000 * (float)$this->Quantity * $this->UnitPrice;
                break;

            case '08':
                $result = (float)$this->Width / 1000 * (float)$this->Height / 1000 * (float)$this->Quantity * $this->UnitPrice;
                break;

            case '09':
                $result = (float)$this->Quantity * $this->UnitPrice;
                break;

            case '10': // install fee
                $max1 = (float)$this->ProduceClass->MinSquare >= ((float)$this->Width / 1000 * (float)$this->Height / 1000) ? (float)$this->ProduceClass->MinSquare : ((float)$this->Width / 1000 * (float)$this->Height / 1000);
                $max2 = ($max1 * $this->UnitPrice * (float)$this->Quantity) >= (float)$this->ProduceClass->InstallFeeFixed ? ($max1 * $this->UnitPrice * (float)$this->Quantity) : (float)$this->ProduceClass->InstallFeeFixed;
                $result = $max2;
                break;

            case '11': // inland fee
                $result = $this->TotalPrice * $this->UnitPrice;
                break;

            case '12': // matrix
                $item = is_null($this->_item) ? $this->_items->where('ItemId', $this->ItemId)->first() : $this->_item;
                $priceDoor = $this->_classes->getPriceByMatrix($item->PricePatternKey, Matrix::DoorMatrix, $this->Width, $this->Height);
                $priceFrame = $this->_classes->getPriceByMatrix($item->PricePatternKey, Matrix::FrameMatrix, $this->Width, $this->Height);
                $result = ($priceDoor + $priceFrame) * (float)$this->Quantity * (float)$this->ProduceClass->FactoryPrice;
                break;

            case '13': // yes no
                $result = (float)$this->UnitPrice;
                break;

            case '14':
                $result = ((float)$this->Width / 1000 + (2 * ((float)$this->Height / 1000))) * $this->UnitPrice;
                break;

            case '15':
                $result = ((float)$this->Width / 1000 + (float)$this->Height / 1000) * 4 * (float)$this->Quantity * $this->UnitPrice;
                break;

            case '16': // installation fee QSMini
                $result = (float)$this->UnitPrice;
                break;

            case '17':
                $result = ((2 * ((float)$this->Width / 1000)) + (2 * ((float)$this->Height / 1000))) * $this->Quantity * (float)$this->UnitPrice;
                break;

            case '18':
                if (((float)$this->Width / 1000 * (float)$this->Height / 1000) > 1) {
                    $result = (float)$this->Width / 1000 * (float)$this->Height / 1000 * (float)$this->Quantity * $this->UnitPrice;
                } else {
                    $result = (float)$this->Quantity * (float)$this->UnitPriceOther;
                }
                break;
        }

        return round($result, 2);
    }

    public function CheckExistPriceMaxtrixForWidthHeight()
    {
        $item = $this->_items->where('ItemId', $this->ItemId)->first();
        $price = $this->_classes->getPriceByMatrix($item->PricePatternKey, Matrix::DoorMatrix, $this->Width, $this->Height);
        return $price != 0;
    }
}
