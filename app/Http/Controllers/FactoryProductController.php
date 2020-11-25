<?php

namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use App\Http\Models\FactoryProductManufacturing;
use App\Http\Models\PurchaseFeeOutside;
use Yajra\DataTables\Html\Builder;
use Illuminate\Support\Facades\DB;

class FactoryProductController extends BackendController
{

    public function __construct()
    {
        parent::__construct();
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES["view"][]   = 'datatable';
        $this->_TABLE                = "factory_product";
        $this->_VIEW                 = "factory_product";
        $this->_NAME                 = "factory_product";
        $this->_ROUTE_FIX            = "factory_product";
        $this->_DATA["_PAGETITLE"]   = "[_factory_]";
        $this->_ROLNAMES["view"][]   = "external";
        $this->_ROLNAMES["update"][] = "import_external";
        $this->_MODEL                = new \App\Http\Models\FactoryProductManufacturing();
    }

    public function index(Request $request){
        $this->_MODEL = \App\Http\Models\FactoryProductManufacturing::orderby("id","desc");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("code_works","like","%".$keyword."%");
                $query->orWhere("produce_code","like","%".$keyword."%");
                $query->orWhere("ss_no","like","%".$keyword."%");
            });
        }
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function import(Request $request) {   
        $data = ['status' => 'error'];
        $getCalculatedValueColumn = [
            "A","M","N","O","P","Q","R"
        ];

        $ColumnsPrice = ["V","W","X","Y"];

        $ColumnsDatabase = [
            "A" => "received_date",
            "B" => "code_works",
            "E" => "ss_no",
            "F" => "type",
            "G" => "w",
            "H" => "h",
            "I" => "m2",
            "J" => "position",
            "L" => "produce_code",
            "M" => "registration_date_of_separation",
            "N" => "date_registration",
            "O" => "date_registration_complete",
            "P" => "date_complete",
            "Q" => "date_registration_export",
            "R" => "date_export",
            "S" => "complete",
            "T" => "comment",
            "U" => "xb1",
            "V" => "price_of_sales_department",
            "W" => "price_factory",
            "X" => "price_real",
            "Y" => "price_no_sale",
        ];
        $keyCode = "B";
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(request()->file('file'));
        $numberSheet = $spreadsheet->getSheetNames();
        $i = 0;
        foreach ($numberSheet as $key => $value) {
            $worksheet = $spreadsheet->getSheet($key);
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $key => $row) {
                if($key > 3){
                    $i++;
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                    $cells = [];
                    foreach ($cellIterator as $key1 => $cell) {
                        if(@$ColumnsDatabase[$key1]){
                            $value = "";
                            if(substr(trim($cell->getValue()), 0, 1) == "="){
                                $value = $cell->getCalculatedValue();
                            }
                            else{
                                $value = $cell->getValue();
                            }

                            if(in_array($key1,$getCalculatedValueColumn) && $value != ''){
                                try{
                                   $value = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($value))->format('Y-m-d H:i:s');
                                }
                                catch (Exception $e){
                                }
                            }

                            if(in_array($key1,$ColumnsPrice) && $value != ''){
                                $value = intval(str_replace(",","",$value));
                            }

                            //$ColumnsPrice
                            if($key1 == 'F'){
                                $cells[$ColumnsDatabase[$key1]] = $value;
                                $type = explode(' ', $value);
                                $type1 = explode(':', $type[0]);
                                $query = DB::table('mstfactoryitem')
                                    ->select('FactoryCode','FactoryName')
                                    ->where('FactoryName', @$type1[1])->first();
                                if(@$query->FactoryCode != null){
                                    $cells['FactoryCode'] = $query->FactoryCode;
                                }
                            }
                            else{
                                $cells[$ColumnsDatabase[$key1]] = $value;
                            }
                        }
                    }
                    if(@$cells['price_factory'] != null && @$cells['code_works'] != null && @$cells['type'] != null){
                        $rows[] = $cells;
                    }
                } 
            }
            if(count($rows) > 0) {
                foreach ($rows as $key => $row) {
                    if(@$row['produce_code'] != null){
                        $check = FactoryProductManufacturing::where(['produce_code' => $row['produce_code']])->first();
                        if(@$check->id == null){
                            $item = new FactoryProductManufacturing;
                            foreach ($row as $field => $value) {
                                if(in_array($field,$ColumnsPrice)){
                                    $item->{$field} = ($value != null ? $value : 0);
                                }
                                else{
                                    $item->{$field} = ($value != null ? $value : '');
                                }
                            }
                            $item->save();
                        }
                    }
                }
                
            }
            $data['status'] = 'success';
            break;
        }
        return $data;
    }

    public function external(Request $request){
        $this->_MODEL = \App\Http\Models\PurchaseFeeOutsideNew::orderby("id","desc");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("document_number","like","%".$keyword."%");
                $query->orWhere("building_code","like","%".$keyword."%");
                $query->orWhere("explains","like","%".$keyword."%");
            });
        }
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW . ".external", $this->_DATA);
    }

    public function import_external(Request $request) {   
        $data = ['status' => 'error'];
        $getCalculatedValueColumn = ["E"];
        $ColumnsPrice = ["I","J","K"];
        $ColumnsDatabase = [
            "A" => "number",
            "B" => "building_code",
            "C" => "back_order",
            "D" => "sales",
            "E" => "document_date",
            "F" => "document_number",
            "G" => "explains",
            "H" => "reciprocal_account",
            "I" => "debt_side",
            "J" => "have_side",
            "K" => "total"
        ];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(request()->file('file'));
        $numberSheet = $spreadsheet->getSheetNames();
        $i = 0;
        $message = '';
        foreach ($numberSheet as $key => $value) {
            $worksheet = $spreadsheet->getSheet($key);
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $key => $row) {
                if($key >= 11){
                    $i++;
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                    $cells = [];
                    foreach ($cellIterator as $key1 => $cell) {
                        if(@$ColumnsDatabase[$key1]){
                            $value = "";
                            if(substr(trim($cell->getValue()), 0, 1) == "="){
                                $value = $cell->getCalculatedValue();
                            }
                            else{
                                $value = $cell->getValue();
                            }

                            if(in_array($key1,$getCalculatedValueColumn) && $value != ''){
                                try{
                                   $value = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($value))->format('Y-m-d H:i:s');
                                }
                                catch (Exception $e){
                                }
                            }

                            if(in_array($key1,$ColumnsPrice) && $value != ''){
                                $value = intval(str_replace(",","",$value));
                            }

                            $cells[$ColumnsDatabase[$key1]] = $value;
                        }
                    }
                    if(@$cells['building_code'] != null && @$cells['total'] != null){
                        $rows[$key] = $cells;
                    }
                } 
            }
            if(count($rows) > 0) {
                foreach ($rows as $key => $row) {
                    $building_code = @$row['building_code'];
                    $check_order = \App\Http\Models\Orders::where(['order_number' => $building_code])->first();
                    if(@$check_order->order_number != null){
                        if(@$row['document_number'] != null && @$row['document_date'] != null){
                            $check = \App\Http\Models\PurchaseFeeOutsideNew::where([
                                'document_number' => $row['document_number'],
                                'document_date'   => $row['document_date'],
                                'building_code'   => $row['building_code']
                            ])->first();
                            if(@$check->id == null){    
                                $item = new \App\Http\Models\PurchaseFeeOutsideNew;
                                foreach ($row as $field => $value) {
                                    if(in_array($field,$ColumnsPrice)){
                                        $item->{$field} = ($value != null ? $value : 0);
                                    }
                                    else{
                                        $item->{$field} = ($value != null ? $value : '');
                                    }
                                }
                                $item->save();
                            }
                        }
                    }
                    else{
                        if(@$this->_LANG->slug == 'english'){
                            $message .= 'The ' . $key . ' building code  "'.$building_code.'" does not exist.<br/>';
                        }
                        elseif(@$this->_LANG->slug == 'japan'){
                            $message .= $key .'コード "'.$building_code.'"は存在しません。<br/>';
                        }
                        else{
                            $message .= 'Dòng ' . $key . ' mã công trình "'.$building_code.'" không tồn tại.<br/>';
                        }
                    }
                }
            }
            if($message != ''){
                $data['status']  = 'fail';
            }
            else{
                $data['status']  = 'success';
            }
            $data['message'] = $message;
            break;
        }
        return $data;
    }

    public function external_bk(Request $request){
        $this->_MODEL = \App\Http\Models\PurchaseFeeOutside::orderby("id","desc");
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("document_number","like","%".$keyword."%");
                $query->orWhere("building_code","like","%".$keyword."%");
            });
        }
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW . ".external", $this->_DATA);
    }

    public function import_external_bk(Request $request) {   
        $data = ['status' => 'error'];
        $getCalculatedValueColumn = ["A","C"];
        $ColumnsPrice = ["G","H","I","J"];
        $ColumnsDatabase = [
            "A" => "date_of_recording",
            "B" => "document_number",
            "C" => "document_date",
            "D" => "explains",
            "E" => "reciprocal_account",
            "F" => "number_of_debt_incurred",
            "G" => "the_number_arises_there",
            "H" => "outstanding_balance",
            "I" => "credit"
        ];
        $spreadsheet = \PhpOffice\PhpSpreadsheet\IOFactory::load(request()->file('file'));
        $numberSheet = $spreadsheet->getSheetNames();
        $i = 0;
        $message = '';
        foreach ($numberSheet as $key => $value) {
            $worksheet = $spreadsheet->getSheet($key);
            $rows = [];
            foreach ($worksheet->getRowIterator() AS $key => $row) {
                if($key > 11){
                    $i++;
                    $cellIterator = $row->getCellIterator();
                    $cellIterator->setIterateOnlyExistingCells(FALSE); // This loops through all cells,
                    $cells = [];
                    foreach ($cellIterator as $key1 => $cell) {
                        if(@$ColumnsDatabase[$key1]){
                            $value = "";
                            if(substr(trim($cell->getValue()), 0, 1) == "="){
                                $value = $cell->getCalculatedValue();
                            }
                            else{
                                $value = $cell->getValue();
                            }

                            if(in_array($key1,$getCalculatedValueColumn) && $value != ''){
                                try{
                                   $value = \PhpOffice\PhpSpreadsheet\Shared\Date::excelToDateTimeObject(intval($value))->format('Y-m-d H:i:s');
                                }
                                catch (Exception $e){
                                }
                            }

                            if(in_array($key1,$ColumnsPrice) && $value != ''){
                                $value = intval(str_replace(",","",$value));
                            }

                            $cells[$ColumnsDatabase[$key1]] = $value;
                        }
                    }
                    if(@$cells['date_of_recording'] != null && @$cells['explains'] != null){
                        $rows[$key] = $cells;
                    }
                } 
            }
            if(count($rows) > 0) {
                foreach ($rows as $key => $row) {
                    $explains = explode(" ", @$row['explains']);
                    $building_code = @$explains[0];
                    $check_order = \App\Http\Models\Orders::where(['order_number' => $building_code])->first();
                    if(@$check_order->order_number != null){
                        $row['building_code'] = $building_code;
                        if(@$row['document_number'] != null && @$row['document_date'] != null && @$row['building_code'] != null){
                            $check = PurchaseFeeOutside::where([
                                'document_number' => $row['document_number'],
                                'document_date'   => $row['document_date'],
                                'building_code'   => $row['building_code']
                            ])->first();
                            if(@$check->id == null){    
                                $item = new PurchaseFeeOutside;
                                foreach ($row as $field => $value) {
                                    if(in_array($field,$ColumnsPrice)){
                                        $item->{$field} = ($value != null ? $value : 0);
                                    }
                                    else{
                                        $item->{$field} = ($value != null ? $value : '');
                                    }
                                }
                                $item->save();
                            }
                        }
                    }
                    else{
                        if(@$this->_LANG->slug == 'english'){
                            $message .= 'The ' . $key . ' building code  "'.$building_code.'" does not exist.<br/>';
                        }
                        elseif(@$this->_LANG->slug == 'japan'){
                            $message .= $key .'コード "'.$building_code.'"は存在しません。<br/>';
                        }
                        else{
                            $message .= 'Dòng ' . $key . ' mã công trình "'.$building_code.'" không tồn tại.<br/>';
                        }
                    }
                }
            }
            if($message != ''){
                $data['status']  = 'fail';
            }
            else{
                $data['status']  = 'success';
            }
            $data['message'] = $message;
            break;
        }
        return $data;
    }
}
