<?php

namespace App\Http\Controllers;
use App\Http\Cores\BackendController;
use Illuminate\Http\Request;
use Validator;

class ConstructionCompletionController extends BackendController
{
    public function __construct(){
        parent::__construct();
        $this->_ROLNAMES["update"][] = "approve";
        $this->_TABLE = "construction_completion";
        $this->_VIEW  = "construction_completion";
        $this->_NAME  = "construction_completion";
        $this->_ROUTE_FIX = "construction_completion";
        $this->_DATA["_PAGETITLE"] = "[_construction_completion_]";
        $this->_MODEL  = new \App\Http\Models\ConstructionCompletion();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index(Request $request) {
        $sale     = \App\Http\Models\WebConfigs::where('key', '=', 'SaleID')->first();
        $status   = \App\Http\Models\WebConfigs::where('key', '=', 'StatusUserPublishID')->first();
        $this->_MODEL = \App\Http\Models\Users::where(['branch_id' => $this->_USER->branch_id])
            ->join('status','status.id', '=', 'users.status_id')
            ->join('roles','roles.id', '=', 'users.role_module_id')
            ->where(['roles.id' => $sale->value])
            ->where(['status.id' => $status->value])
            ->select('users.*');
        $this->_DATA['input']  = $request->input();
        $this->_DATA['year']  = ($request->input('year') != null ? $request->input('year') : date('Y'));
        $this->_DATA["models"] = $this->_MODEL->orderBy('users.id','DESC')->get();
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }

    public function update(Request $request) {
        $post = $request->input();
        $year = @$post['year'];
        if($year != null && $year >= date('Y')){
            $months  = $post['month'];
            $amount  = $post['amount'];
            if(isset($months) && $months != null){
                foreach ($months as $user_id => $list_month) {
                    if($user_id != null && $list_month != null){
                        $price = str_replace(",", "", $amount[$user_id]);
                        if($price != null){
                            $user_month = array();
                            foreach ($list_month as $key => $month) {
                                $temp = \App\Http\Models\ConstructionCompletion::where([
                                    'year'    => $year,
                                    'month'   => $month,
                                    'user_id' => $user_id
                                ])->first();
                                if(@$temp->id == null){
                                    $temp = new \App\Http\Models\ConstructionCompletion();
                                    $temp->user_id = $user_id;
                                    $temp->month   = $month;
                                    $temp->year    = $year;
                                    $temp->current = 0;
                                    $temp->percent = 0;
                                }
                                $temp->total  = $price;
                                $temp->target = ($price/count($list_month));
                                if($temp->current != 0){
                                    $temp->percent = ($temp->current/$temp->target)*100;
                                }
                                $temp->save();
                                $user_month[] = $month;
                            }

                            $delete = \App\Http\Models\ConstructionCompletion::where([
                                'year'    => $year,
                                'user_id' => $user_id
                            ])->whereNotIn('month', $user_month)->delete();
                        }
                    }
                }
            }
        }
        return redirect()->route('construction_completion.index', ['year' => $year]);
    }

    public function edit(Request $request){
        $year = $request->input('year');
        if($year == null){
            $year = date('Y');
        }
        $this->_MODEL = \App\Http\Models\ConstructionCompletion::where([
            'user_id' => $request->input('id'),
            'year'    => $year
        ]);
        $this->_DATA["models"]  = $this->_MODEL->orderBy('month','ASC')->get();//->where('current','!=','0')
        $this->_DATA["years"]   = \App\Http\Models\ConstructionCompletion::groupBy('year')->get();
        $this->_DATA['user_id'] = $request->input('id');
        $this->_DATA['year']    = $year;
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }

    public function approve(Request $request) {
        $target = $request->input('target');
        if($target != null){
            foreach ($target as $key => $value) {
                $temp = \App\Http\Models\ConstructionCompletion::where([
                    'user_id' => $request->input('id'),
                    'year'    => $request->input('year'),
                    'month'   => $key
                ])->first();
                if(@$temp->id != null){
                    $price = str_replace(",", "", $value);
                    if($price != null){
                        $temp->target = $price;
                        $temp->save();
                    }
                }
            }
        }
        return redirect()->route($this->_ROUTE_FIX . '.edit', ['year' => $request->input('year'),'id' => $request->input('id')]);
    }
}
