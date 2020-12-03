<?php

namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use App\Http\Models\FactoryProducts;
class FactoryPartitionController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES["view"][]   = 'datatable';
        $this->_TABLE                = "factorys";
        $this->_VIEW                 = "factorys";
        $this->_NAME                 = "factorys";
        $this->_ROUTE_FIX            = "factorys";
        $this->_DATA["_PAGETITLE"]   = "_factorys_";
    }

    public function index()
    {
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function import(Request $request)
    {   
        $getCalculatedValueColumn = [
            "A","M","N","O","P","Q","R","S"
        ];
        $ColumnsDatabase = [
            "A" => "received_date",
            "B" => "construction_code",
            "C" => "discount",
            "D" => "construction_name",
            "E" => "product_no",
            "F" => "product_type",
            "G" => "width",
            "H" => "height",
            "I" => "acreage",
            "J" => "position",
            "L" => "produce_code",
            "M" => "dissection_registration_date",
            "N" => "produce_registration_date",
            "O" => "success_registration_date",
            "P" => "success_date",
            "Q" => "export_registration_date",
            "S" => "export_date",
            "T" => "note_special",
            "W" => "factory_price",
            "X" => "reality_price",
            "V" => "price_of_department"
        ];
        $keyCode = "L";
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(request()->file('file'));
        $numberSheet = $spreadsheet->getSheetNames();
        foreach ($numberSheet as $key => $value) {
            $worksheet = $spreadsheet->getSheet($key);
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $key => $row) {
                if($key > 3){
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                    $cells = [];
                    foreach ($cellIterator as $key1 => $cell) {
                        if(@$ColumnsDatabase[$key1]){
                            $value = "";
                            if(substr(trim($cell->getValue()), 0, 1) == "="){
                                $value = $cell->getCalculatedValue();
                                
                            }else{
                                $value = $cell->getValue();
                            }
                            if(in_array($key1,$getCalculatedValueColumn)){
                                $value = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject($value)->format('Y-m-d H:i:s');;
                            }
                            $cells[$ColumnsDatabase[$key1]] = $value;
                        }
                        
                    }
                    $rows[] = $cells;
                } 
            }
            print_r($rows);
        }
       
        //Excel::import(new InternalFactoryPartitionImport($numberSheet), request()->file('file'));
    }

    public function export()
    {

    }
}
