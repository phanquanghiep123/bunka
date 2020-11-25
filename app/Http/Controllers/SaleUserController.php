<?php

namespace App\Http\Controllers;
use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use Validator;

class SaleUserController extends BackendController
{
    public function __construct(){
        parent::__construct();
        $this->_TABLE = "construction_completion";
        $this->_VIEW  = "sale_user";
        $this->_NAME  = "sale_user";
        $this->_ROUTE_FIX = "sale_user";
        $this->_DATA["_PAGETITLE"] = "[_sales_]";
        $this->_MODEL  = new \App\Http\Models\ConstructionCompletion();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $year = $request->input('year');
        if($year == null){
            $year = date('Y');
        }
        $this->_MODEL = \App\Http\Models\ConstructionCompletion::where([
            'user_id' => $this->_USER->id,
            'year'    => $year
        ]);
        $this->_DATA["models"] = $this->_MODEL->orderBy('month','ASC')->get();
        $this->_DATA["years"]  = \App\Http\Models\ConstructionCompletion::where(['user_id' => $this->_USER->id])->groupBy('year')->get();
        $this->_DATA['year']   = $year;
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }

    public function update(Request $request) {
        $post = $request->input();
        $year = @$post['year'];
        if($year != null){
            $prices   = $post['price'];
            $expected = $post['expected'];
            if(isset($prices) && $prices != null){
                foreach ($prices as $month => $amount) {
                    if($month != null){
                        $price = str_replace(",", "", $amount);
                        if($price != null){
                            $temp = \App\Http\Models\ConstructionCompletion::where([
                                'year'    => $year,
                                'month'   => $month,
                                'status'  => 0,
                                'user_id' => $this->_USER->id
                            ])->first();
                            if(@$temp->id != null){
                                $expected_price = intval(str_replace(",", "", @$expected[$month]));
                                $temp->current  = $price;
                                $temp->expected = $expected_price;
                                if($temp->target != 0){
                                    $temp->system_percent = round((intval($price)/$temp->target)*100,2);
                                }
                                if(@$expected_price != 0){
                                    $temp->percent = round((intval($price)/$expected_price)*100,2);
                                }
                                $temp->save();
                            }
                        }
                    }
                }
            }
        }
        return redirect()->route($this->_ROUTE_FIX.'.index', ['year' => $year]);
    }
}
