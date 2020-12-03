<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
class ConverDbController extends Controller
{
    public function index (){
    	$DB  = DB::connection('mysql');
    	$DB1 = DB::connection('mysql1');
    	$DB2 = DB::connection('mysql2');
    	$DB3 = DB::connection('mysql3');
    	for ($i = 1; $i < 3; $i++) { 
    		$currentDB = DB::connection('mysql'.$id);
    		//Clone Quotation 
    			$columnMapQuotation = [
    				"QuotationNo" => "quotation_number",
				];
    		//!Clone Quotation
    	}
    }
}
