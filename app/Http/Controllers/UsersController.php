<?php

namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use Hash;
use Illuminate\Http\Request;
use Validator;

class UsersController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        parent::__construct();
        $this->_TABLE              = "users";
        $this->_VIEW               = "users";
        $this->_NAME               = "users";
        $this->_ROUTE_FIX          = "users";
        $this->_DATA["_PAGETITLE"] = "_manage_member_";
        $this->_MODEL              = new \App\Http\Models\Users();
        $this->_ADDURL             = route($this->_ROUTE_FIX . ".store");
        $this->_STOREURL           = route($this->_ROUTE_FIX . ".update");

    }
    public function index(Request $request)
    {
        $this->_MODEL = \App\Http\Models\Users::orderby("id", "ASC");
        if ($request->input('keyword')) {
            $keyword = $request->input('keyword');
            $this->_MODEL->where(function ($query) use ($keyword) {
                $query->where("last_name", "like", "%" . $keyword . "%");
                $query->orWhere("first_name", "like", "%" . $keyword . "%");
                $query->orWhere("email", "like", "%" . $keyword . "%");
            });
        }
        if ($request->input('created_at')) {
            $created_at = $request->input('created_at');
            $this->_MODEL->where(function ($query) use ($created_at) {
                $query->where("created_at", ">=", date('Y-m-d', strtotime(str_replace('/', '-', $created_at))));
            });
        }
        $this->_MODEL->where('is_sys', '!=', 1);
        $this->_DATA["roles"]   = \App\Http\Models\Roles::roleStatus()->where('is_sys', '!=', 1)->get();
        $this->_DATA["branchs"] = \App\Http\Models\Branchs::roleStatus()->get();
        $this->_DATA["models"]  = $this->_MODEL->paginate($this->_PAGINGNUMBER);
        $this->_DATA["keyword"]  = isset($keyword) ? $keyword : '';
        $this->_DATA["created_at"]  = isset($created_at) ? date('Y-m-d', strtotime(str_replace('/', '-', $created_at))) : '';
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }
    public function create()
    {
        $this->_DATA["roles"]   = \App\Http\Models\Roles::roleStatus();
        $this->_DATA["branchs"] = \App\Http\Models\Branchs::roleStatus();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    public function store(Request $request)
    {
        $data  = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $id    = $request->id;
        $required = [
            'email'      => 'required|email|unique:users,email',
            'password'   => 'required|min:6',
            'first_name' => 'required',
            'last_name'  => 'required',
            'branch_id'  => 'required'
        ];
        //if($request->input('code') != null){
            //$required['code'] = 'required|unique:users,code';
        //}
        $check = Validator::make($request->all(),$required);
        if ($check->fails()) {
            $data["message"] = $check->errors();
        } else {

            if($request->input('code') == null){
                $branch = \App\Http\Models\Branchs::where("id", $request->input('branch_id'))->first();
                $short_name = @$branch->short_name;
                $list = \App\Http\Models\Users::where("code", "like", "%" . $short_name . '-' . "%")->get();
                $max = 0;
                foreach ($list as $key => $item) {
                    $arr = explode($short_name.'-', $item->code);
                    if(@$arr[1] != null){
                        $number = intval($arr[1]);
                        if($number >= $max){
                            $max = $number;
                        }
                    }
                }
                $max++;
                $request->merge(array('code' => $short_name . '-' . ($max < 10 ? '0'.$max : $max ) ));
            }

            $this->_MODEL = new $this->_MODEL;
            $this->_MODEL = $this->_StoreItem($request);
            if ($this->_MODEL->id != 0) {
                if ($request->page == 1) {
                    $data["_redirect"]     = 1;
                    $data["_redirect_url"] = route($this->_ROUTE_FIX . ".index");
                } else {
                    $data["_reload"] = 1;
                }
                $data["status"]         = 1;
                $this->_MODEL->password = Hash::make($request->input('password'));
                $this->_MODEL->photo = str_replace("\\","/", $this->_MODEL->photo);
                $this->_MODEL->save();
            }
        }
        return \Response::json($data);
    }

    public function edit($id)
    {
        $data = [
            "status"    => 0,
            "_redirect" => 0,
            "data"      => null,
            "message"   => "",
        ];
        $this->_MODEL        = $this->_MODEL->find($id);
        $this->_MODEL->photo = str_replace("\\", "/", $this->_MODEL->photo);
        $data["status"]      = 1;
        $data["data"]        = $this->_MODEL;
        return \Response::json($data);
    }

    public function update(Request $request)
    {
        $data  = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $id    = $request->id;
        $rules = [
            //'code'       => 'required|unique:users,code,' . $id,
            'email'      => 'required|email|unique:users,email,' . $id,
            'first_name' => 'required',
            'last_name'  => 'required',
        ];
        if (strlen(trim($request->password)) > 0) {
            $rules["password"] = 'min:6';
        }
        $check = Validator::make($request->all(), $rules);
        if ($check->fails()) {
            $data["message"] = $check->errors();
        } else {
            $this->_MODEL = $this->_MODEL->find($id);
            $this->_MODEL = $this->_StoreItem($request);
            if ($this->_MODEL->id != 0) {
                if (strlen(trim($this->_MODEL->password) > 0)) {
                    $this->_MODEL->password = Hash::make($this->_MODEL->password);
                }
                $this->_MODEL->photo = str_replace("\\","/", $this->_MODEL->photo);
                $this->_MODEL->save();
                $data["status"]  = 1;
                $data["_reload"] = 1;
            }
        }
        return \Response::json($data);
    }

    public function delete($id)
    {
        $data            = ["status" => 0, "_reload" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $this->_MODEL    = \App\Http\Models\Users::destroy($id);
        $data["status"]  = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }


}
