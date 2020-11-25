<?php
namespace App\Http\Controllers;

use App\Http\Cores\BackendController;
use App\Http\Models\Users;
use Auth;
use Cookie;
use Hash;
use Illuminate\Http\Request;
use Validator;

class ProfileController extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function __construct()
    {
        $this->_ROLNAMES["update"][] = "logout";
        $this->_ROLNAMES["update"][] = "PostchangePassword";
        $this->_ROLNAMES["view"][]   = "GetchangePassword";
        $this->_ROLNAMES["view"][]   = "seenotification";
        $this->_ROLNAMES["view"][]   = "notifycation";
        parent::__construct();
        $this->_TABLE              = "users";
        $this->_VIEW               = "profile";
        $this->_NAME               = "profile";
        $this->_ROUTE_FIX          = "profile";
        $this->_DATA["_PAGETITLE"] = "Profile";
        Validator::extend('old_password', function ($attribute, $value, $parameters, $validator) {
            return Hash::check($value, current($parameters));
        });
    }
    public function index()
    {
        $this->_DATA["user"]    = \App\Http\Models\Users::find($this->_USER->id);
        $this->_DATA["roles"]   = \App\Http\Models\Roles::roleStatus()->where('is_sys', '!=', 1)->get();
        $this->_DATA["branchs"] = \App\Http\Models\Branchs::roleStatus()->get();
        $this->_DATA['langs']   = \App\Http\Models\Languages::get();
        return view($this->_VIEW . "." . __FUNCTION__, $this->_DATA);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $data  = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $rules = [
            'email'      => 'required|email|unique:users,email,' . $this->_USER->id,
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
            $this->_MODEL = \App\Http\Models\Users::find($this->_USER->id);
            $this->_MODEL = $this->_StoreItem($request);
            if (strlen(trim($this->_MODEL->password) > 0)) {
                $this->_MODEL->password = Hash::make($this->_MODEL->password);
            }
            $this->_MODEL->photo = str_replace("\\", "/", $this->_MODEL->photo);
            $this->_MODEL->save();
            $data["status"]  = 1;
            $data["_reload"] = 1;
        }
        return \Response::json($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->forget('_BACKURL');
        Cookie::queue(Cookie::forget('remember'));
        return redirect()->route("auth.getlogin");
    }

    public function GetchangePassword()
    {
        return view($this->_VIEW . ".change-password", $this->_DATA);
    }
    public function PostchangePassword(Request $request)
    {
        $data  = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $id    = $this->_USER->id;
        $check = Validator::make($request->all(), [
            "current"  => "required|min:6|old_password:" . $this->_USER->password,
            'password' => 'min:6|required_with:confirm|same:confirm',
            'confirm'  => 'min:6',
        ]);
        if ($check->fails()) {
            $data["message"] = $check->errors();
        } else {
            $this->_MODEL           = Users::find($id);
            $this->_MODEL->password = Hash::make($request->password);
            $this->_MODEL->save();
            $data['status']  = 1;
            $data['message'] = $this->_SCRIP_LANGS['_change_data_success_'];
        }
        return \Response::json($data);
    }
    public function seenotification(Request $request)
    {
        \App\Http\Models\Notifications::where([
            ["user_receive", "=", $this->_USER->id],
            ['is_view', '=', 0],
        ])->update(
            [
                'is_view' => 1,
            ]
        );
        $data           = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $limit          = 10;
        $offset         = $request->offset * $limit;
        $notifications  = $this->getNotifications(0, 11);
        $data['status'] = 1;
        $data['more']   = $notifications->count() > 10;
        return \Response::json($data);

    }
    public function notifycation($offset)
    {
        $data           = ["status" => 0, "_redirect" => 0, "data" => null, "message" => ""];
        $limit          = 10;
        $offset         = $offset * $limit;
        $notifications  = $this->getNotifications($offset, $limit + 1);
        $data["more"]   = ($notifications->count() > 10);
        $data['status'] = 1;
        $data['data']   = [];
        foreach ($notifications as $key => $value) {
            if($key < 10){ 
                $data['data'][] = $value;
            }
        }
        return \Response::json($data);

    }
}
