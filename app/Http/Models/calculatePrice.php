<?php
namespace App\Http\Models;

use App\Http\Models\Mstclass;
use App\Http\Models\Mstitem;
use App\Http\Models\Mstitemclass;
use App\Http\Models\Mstitemprice;
use App\Http\Models\WebConfigs;
use DB;

class calculatePrice
{
    public $Mstitem           = null;
    public $W                 = 0; // width of item;
    public $H                 = 0; // height of item;
    public $PW                = 0; // width of parent item;
    public $PH                = 0; // height of parent item;
    public $Q                 = 0; // quantity of item;
    public $PQ                = 0; // quantity of parent item;
    public $RTTS              = 0; // Root total Sale Price
    public $TT                = 0; // total item not install ;
    public $I                 = 0; // installation  parent item;
    public $M                 = 0; // Matrix parent item;
    public $KS                = 0; // Keisu parent item;
    public $UP                = 0; // UnitPrice parent item
    public $UPQ               = 0; // UnitPriceOther parent item
    public $FP                = 0; // FactoryPrice Mstclass item
    public $IF                = 0; // Install Fee Fixed Mstclass item
    public $MS                = 0; // MinSquare Mstclass item
    public $PP                = 0; // ParentPrice item
    public $Mstitemclass      = null;
    public $Mstclass          = null;
    public $Mstclassitemclass = null;
    public $sellPrice         = 0;
    public $Price             = 0;
    public $strCalculate      = "";
    public $Class             = "";
    public $ClassKey          = "";
    public $ClassPattern      = "";
    public $Outstring         = "";
    public $RATE              = 1;
    public $_sale             = 0;
    public $_price            = 0;
    public $_Paremeter        = [
        "RTTS", "UPQ", "TT", "UP", "PW", "PH", "FP", "PQ", "IF", "MS", "Q", "W", "H", "I", "M", "RATE",
    ];
    private $_rateDefault = null;
    public function __construct($ClassKey = null, $ItemId = null)
    {

        $this->Class        = $this->getMatrix("ClassProduct");
        $this->ClassPattern = $this->getMatrix("ClassPattern");
        $this->_rateDefault = Mstclass::where("Class", "=", 2)->orderby(DB::raw("CAST(Value2 as Decimal)"), "DESC")->first();
    }

    public function Run($ClassKey = null, $ItemId = null)
    {
        if ($ClassKey) {
            $this->ClassKey = $ClassKey;
        }
        if ($ItemId) {
            $this->Mstitem = Mstitem::find($ItemId);
        }
        $this->Mstclass = Mstclass::where([
            ["ClassKey", "=", $this->ClassKey],
            ["Class", "=", $this->Class],
        ])->first();
        if ($this->Mstclass) {
            $this->IF = $this->Mstclass->Value3;
            $this->FP = $this->Mstclass->Value5;
            $this->KS = $this->Mstclass->Value1;
            $this->MS = $this->Mstclass->Value2;
            if ($this->Mstitem != null) {
                $this->Mstitemclass = Mstitemclass::find($this->Mstitem->ItemClassId);
                $this->Mstitemprice = Mstitemprice::where(
                    [
                        ['ItemId', '=', $this->Mstitem->ItemId],
                        ['GroupClassKey', '=', $this->ClassKey],
                    ]
                )->first();
                if ($this->Mstitemprice) {
                    $this->UP  = $this->Mstitemprice->UnitPrice;
                    $this->UPQ = $this->Mstitemprice->UnitPriceOther;
                }
                $this->Mstclassitemclass = Mstclass::where([
                    ["Class", "=", $this->ClassPattern],
                    ["ClassKey", "=", $this->Mstitemclass->PricePattern],
                ])->first();
                $this->I = $this->FuncI();
                $this->M = $this->FuncM();
            }
            if ($this->Mstclassitemclass) {
                $this->strCalculate = $this->Mstclassitemclass->Value1;
            }

        }
        $this->TT   = floatval($this->TT) / floatval($this->_rateDefault->Value1) * floatval($this->RATE);
        $this->RTTS = floatval($this->RTTS) / floatval($this->_rateDefault->Value1) * floatval($this->RATE);

    }
    public function reset (){
    	foreach ($this->_Paremeter as $key => $value) {
    		if($value != "RATE"){
    		 	$this->{$value} = 0;
    		}else{
    		 	$this->{$value} = 1;
    		}
    	}
    } 
    public function sellPrice()
    {
        $exString   = explode("|", $this->strCalculate);
        $trueString = "";
        $replace    = [];
        $find       = [];
        foreach ($this->_Paremeter as $key => $value) {
            $find[]    = $value;
            $replace[] = isset($this->{$value}) ? $this->{$value} : null;
        }
        foreach ($exString as $key => $value) {
            $string    = $value;
            $Argstring = explode(":", $string);
            $check     = false;
            if (count($Argstring) > 1) {
                $string1    = $Argstring[0];
                $new_string = str_ireplace($find, $replace, $string1);
                @eval("\$check = $new_string;");
                if ($check) {
                    $trueString = $Argstring[1];
                    break;
                }
            } else {
                $trueString = $Argstring[0];
            }
        }
        $new_string      = str_ireplace($find, $replace, $trueString);
        $this->Outstring = $new_string;
        @eval("\$CT = $new_string ; ");
        $this->_sale = (@$CT * floatval($this->_rateDefault->Value1)) / floatval($this->RATE);
        return $this->_sale;
    }
    public function getPrice()
    {
        $exString   = explode("|", $this->strCalculate);
        $trueString = "";
        $replace    = [];
        $find       = [];
        foreach ($this->_Paremeter as $key => $value) {
            $find[]    = $value;
            $replace[] = isset($this->{$value}) ? $this->{$value} : null;
        }
        foreach ($exString as $key => $value) {
            $string    = $value;
            $Argstring = explode(":", $string);
            $check     = false;
            if (count($Argstring) > 1) {
                $string1    = $Argstring[0];
                $new_string = str_ireplace($find, $replace, $string1);
                @eval("\$check = $new_string ; ");
                if ($check) {
                    $trueString = $Argstring[1];
                    break;
                }

            } else {
                $trueString = $Argstring[0];
            }
        }
        $new_string = str_ireplace($find, $replace, $trueString);
        @eval("\$CT = $new_string ; ");
        $this->_price = ((@$CT * $this->KS) * floatval($this->_rateDefault->Value1)) / floatval($this->RATE);
        return $this->_price;
    }
    public function GetTotalsellPriceProduct($sellPrice)
    {
        return ($sellPrice * $this->Q);
    }
    public function GetTotalProduct($sellPrice)
    {
        return ($sellPrice * $this->KS);
    }
    public function getMatrix($key)
    {
        $WebConfig = WebConfigs::where("key", "=", $key)->first();
        if ($WebConfig != null) {
            return $WebConfig->value;
        } else {
            return false;
        }

    }
    public function GetPriceByMatrix($PricePatternKey, $Matrix, $ClassFactoryPriceKey)
    {
        $W   = ($this->W ? $this->W : ($this->PW ? $this->PW : 0));
        $H   = ($this->H ? $this->H : ($this->PH ? $this->PH : 0));
        $sql = "SELECT
              CAST(T1.Value5 AS DECIMAL(10,2)) AS MatrixPrice
            FROM mstclass AS T1
            INNER JOIN (SELECT
              MIN(CAST(MC.Value3 AS Decimal)) WI,
              MIN(CAST(MC.Value4 AS Decimal)) HE
            FROM mstclass AS MC
            WHERE MC.Class = '{$ClassFactoryPriceKey}'
            AND MC.Value1 = '{$PricePatternKey}'
            AND MC.Value2 = '{$Matrix}'
            AND CAST(MC.Value3 AS Decimal) >= $W
            AND CAST(MC.Value4 AS Decimal) >= $H) T2
              ON CAST(T1.Value3 AS Decimal) = T2.WI
              AND CAST(T1.Value4 AS Decimal) = T2.HE
            WHERE T1.Class = '{$ClassFactoryPriceKey}'
            AND T1.Value1 = '{$PricePatternKey}'
            AND T1.Value2 = '{$Matrix}' LIMIT 1";
        $data = DB::select(DB::raw($sql));
        if ($data) {
            return $data[0]->MatrixPrice;
        } else {
            return "";
        }

    }
    public function FuncM()
    {
        $priceDoor  = floatval($this->GetPriceByMatrix($this->Mstitem->PricePatternKey, $this->getMatrix("DoorMatrix"), $this->getMatrix("ClassFactoryPriceKey")));
        $priceFrame = floatval($this->GetPriceByMatrix($this->Mstitem->PricePatternKey, $this->getMatrix("FrameMatrix"), $this->getMatrix("ClassFactoryPriceKey")));
        return ($priceDoor + $priceFrame);
    }
    public function FuncI()
    {
        if ($this->MS >= (($this->W / 1000) * ($this->H / 1000))) {
            $max1 = $this->MS;
        } else {
            $max1 = ($this->W / 1000) * ($this->W / 1000);
        }
        if (($max1 * $this->UP * $this->Q) >= $this->IF) {
            return ($max1 * $this->UP * $this->Q);
        } else {
            return $this->IF;
        }
    }
    public function CheckWH()
    {
        if ($this->Mstitemclass && $this->Mstitemclass->ParentItemClassId == 0 && $this->Mstitemclass->WInputFlg == 1 && $this->Mstitemclass->HInputFlg == 1) {
            $W                    = ($this->W ? $this->W : ($this->PW ? $this->PW : 0));
            $ClassFactoryPriceKey = $this->getMatrix("ClassFactoryPriceKey");
            $DoorMatrix           = $this->getMatrix("DoorMatrix");
            $sql                  = "SELECT CAST(T1.Value5 AS DECIMAL(10,2)) AS MatrixPrice
			FROM mstclass T1
			INNER JOIN
			  (SELECT MIN(CAST(MC.Value3 AS DECIMAL(10,2))) WI,
			          MIN(CAST(MC.Value4 AS DECIMAL(10,2))) HE
			   FROM mstclass MC
			   WHERE MC.Class = '{$ClassFactoryPriceKey}'
			     AND MC.Value1= '{$this->Mstitem->PricePatternKey}'
			     AND MC.Value2= '{$DoorMatrix}'
			     AND CAST(MC.Value3 AS DECIMAL(10,2))>= {$W}
			     AND CAST(MC.Value4 AS DECIMAL(10,2))>= {$W} ) AS T2 ON CAST(T1.Value3 AS DECIMAL(10,2)) = T2.WI
			AND CAST(T1.Value4 AS DECIMAL(10,2)) = T2.HE
			WHERE T1.Class = '{$ClassFactoryPriceKey}'
			  AND T1.Value1= '{$this->Mstitem->PricePatternKey}'
			  AND T1.Value2= '{$DoorMatrix}'";
            $data = DB::select(DB::raw($sql));
            if ($data) {
                return $data[0]->MatrixPrice;
            } else {
                return false;
            }

        } else {
            return true;
        }

    }
}
