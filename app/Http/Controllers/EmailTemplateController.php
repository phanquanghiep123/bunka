<?php
namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use App\Http\Models\EmailTemplate;
use App\Http\Models\Languages;
use App\Http\Models\EmailTemplateValue;
use DB;
use Illuminate\Http\Request;
use Yajra\DataTables\Html\Builder;
use Yajra\DataTables\Services\DataTable;
use Validator;

class EmailTemplateController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */

    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "updatesort";
        $this->_ROLNAMES['view']     = array_merge($this->_ROLNAMES['view'], [
            "datatable",
        ]);
        parent::__construct();
        $this->_TABLE              = "emailtemplate";
        $this->_VIEW               = "email_template";
        $this->_NAME               = "email_template";
        $this->_ROUTE_FIX          = "email_template";
        $this->_DATA["_PAGETITLE"] = "Email Template";
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request) {
        $this->_MODEL = EmailTemplate::orderby("id","ASC");
        $this->_MODEL->join('emailtemplate_values', function ($join) {
            $join->on('emailtemplate.id','=', 'emailtemplate_values.emailtemplate_id');
        });
        $this->_MODEL->where(function($query){
            $query->where("emailtemplate_values.lang_id",session('_LANG_ID'));
        });
        if($request->input('keyword')){
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function($query) use($keyword){
                $query->where("emailtemplate_values.title","like","%".$keyword."%");
            });
        }
        $this->_MODEL->select('emailtemplate_values.*','emailtemplate.status','emailtemplate.key_id');
        $this->_DATA['input']  = $request->input();
        $this->_DATA["models"] = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function create() {
        $this->_DATA['languages']  = Languages::get();
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }


    public function store(Request $request) {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $listColums   = $this->_GetTableColumns($this->_TABLE);
        $rules        = [
            'key_id'  => 'required|unique:' . $this->_TABLE . ',key_id',
            'status'  => 'required',
        ];
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
            return \Response::json($data);
        }

        $post         = $request->post();
        $this->_MODEL = new EmailTemplate();
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        $titles   = $request->title;
        $contents = $request->content;
        if(isset($titles) && $titles != null){
            foreach ($titles as $lang_id => $title) {
                if($title != null){
                    $template_value = new EmailTemplateValue();
                    $template_value->emailtemplate_id = $this->_MODEL->id;
                    $template_value->lang_id = $lang_id;
                    $template_value->title   = $title;
                    $template_value->content = @$contents[$lang_id];
                    $template_value->save();
                }
            }
        }
        $data["_redirect"] = route($this->_ROUTE_FIX . ".edit",$this->_MODEL->id);
        $data["status"] = 1;
        return \Response::json($data);
    }


    public function edit($id) {
        $this->_DATA['languages']  = Languages::get();
        $this->_MODEL   = EmailTemplate::find($id);
        if(@$this->_MODEL->id == null){
            return redirect(route($this->_ROUTE_FIX .'.create'));
        }
        $this->_DATA['edit_url']   = route($this->_ROUTE_FIX . ".update",$id);
        $dataM          = $this->_MODEL->toArray();
        $TemplateValue  = EmailTemplateValue::where("emailtemplate_id", "=", $this->_MODEL->id)->get();
        foreach ($TemplateValue as $key => $value) {
            $dataM["title_" . $value->lang_id . ""] = $value->title;
            $dataM["content_" . $value->lang_id . ""] = $value->content;
        }
        $this->_DATA['record'] = $dataM;
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }

    public function update($id,Request $request) {
        $data         = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $listColums   = $this->_GetTableColumns($this->_TABLE);
        $this->_MODEL = EmailTemplate::find($id);
        if(@$this->_MODEL->id == null){
            return redirect(route($this->_ROUTE_FIX .'.create'));
        }
        $rules        = [
            'status'  => 'required',
        ];
        if($request->post('key_id') != $this->_MODEL->key_id){
            $rules['key_id'] = 'required|unique:' . $this->_TABLE . ',key_id';
        }
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
            return \Response::json($data);
        }

        $post         = $request->post();
        foreach ($post as $key => $value) {
            if (in_array($key, $listColums)) {
                if ($key != "id") {
                    $this->_MODEL->{$key} = $value;
                }
            }
        }
        $this->_MODEL->save();
        $titles   = $request->title;
        $contents = $request->content;
        if(isset($titles) && $titles != null){
            foreach ($titles as $lang_id => $title) {
                if($title != null){
                    $template_value = EmailTemplateValue::where(['lang_id' => $lang_id,'emailtemplate_id' => $id])->first();
                    if($template_value == null){
                        $template_value = new EmailTemplateValue();
                        $template_value->lang_id = $lang_id;
                        $template_value->emailtemplate_id = $this->_MODEL->id;
                    }
                    $template_value->title   = $title;
                    $template_value->content = @$contents[$lang_id];
                    $template_value->save();
                }
            }
        }
        $data["_redirect"] = route($this->_ROUTE_FIX . ".edit",$this->_MODEL->id);
        $data["status"] = 1;
        return \Response::json($data);
    }


    public function destroy($id){
        $data            = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL    = EmailTemplateValue::where("emailtemplate_id", "=", $id)->delete();
        $this->_MODEL    = EmailTemplate::destroy($id);
        return redirect(route($this->_ROUTE_FIX .'.index'));
    }
}