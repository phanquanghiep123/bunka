<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use Hash;
use DB;
use Validator;
use Cookie;
use Password;
use ResetPasswordNotification;
use Illuminate\Support\Facades\Redirect;
use App\Http\Cores\BackendController;
class AuthController extends BackendController
{
	public $_VIEW       = "auth";
	public $_NAME       = "auth";
	public $_USER       = null;
    public $_ROUTE_FIX  = "auth";
	public function __construct()
    {
        parent::__construct();  
    }
    public function getlogin(){
    	if($this->_USER) {
            return Redirect(route("home.procedure")); 
        }
        $this->_DATA['lang_id'] = session('_LANG_ID');
        $this->_DATA['langs'] = \App\Http\Models\Languages::get();
    	return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }
    public function getforgot(){
        if($this->_USER) {
            return Redirect(route("home.procedure")); 
        }
        $this->_DATA['lang_id'] = session('_LANG_ID');
        $this->_DATA['langs'] = \App\Http\Models\Languages::get();
        return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
    }
    public function postforgot(Request $request){
        if($this->_USER) {
            return Redirect(route("home.procedure")); 
        }
        $check = Validator::make($request->all(), [
            'email'    => 'required|email',
        ]);
        if ($check->fails()){
            return Redirect(route($this->_NAME.".getforgot"))->withErrors($check->errors()); 
        }else{
            $email  = strtolower($request->email);
            $ck = \App\Http\Models\Users::where('email',"=",$email)->first();
            if($ck) {
                $user = \App\Http\Models\Users::find($ck->id);
                $token = app(\Illuminate\Auth\Passwords\PasswordBroker::class)->createToken($user);
                $user->sendPasswordResetNotification($token);
                return redirect()->back()->with('message',"An notification send to your inbox email, Please check your inbox email for change your password!");
            }else{
                return redirect()->back()->withErrors(["Email not exist!"]); 
            }       
        }
        return redirect()->back()->withErrors($check->errors()); 
    }
    public function resetpassword($token = null,Request $request){
        if($this->_USER) 
            return Redirect(route("home.procedure")); 
        if($token == null)
            return Redirect(route("home.procedure")); 
        $ck = \App\Http\Models\PasswordResets::where("email","=",$request->email)->first();
        if($ck == null)
            return Redirect(route("home.procedure")); 
        if ( Hash::check($token, $ck->token) ){
            $this->_DATA['lang_id'] = session('_LANG_ID');
            $this->_DATA['token'] = $token;
            $this->_DATA['email'] = $request->email;
            $this->_DATA['langs'] = \App\Http\Models\Languages::get();
            return view($this->_VIEW.".".__FUNCTION__,$this->_DATA);
        }else{ 
            return Redirect(route("home.procedure")); 
        }
        
    }
    public function changepassword(Request $request){
        if($this->_USER) {
            return Redirect(route("home.procedure")); 
        }
        $token = $request->token;
        $email = $request->email;
        $ck = \App\Http\Models\PasswordResets::where("email","=",$request->email)->first();
        if($ck == null)
            return Redirect(route("home.procedure")); 
        if ( Hash::check($token, $ck->token) ){
            $check = Validator::make($request->all(), [
                'password'      => 'required|min:6|same:cfpassword',
                'cfpassword'    => 'required|min:6',
            ]);
            if ($check->fails()){
                return redirect()->back()->withErrors($check->errors()); 
            }else{
                if($ck){
                    $email  = $request->email;
                    $user = \App\Http\Models\Users::where('email',"=",$email)->first();
                    if($user) {
                        $user->password = Hash::make($request->password);
                        $user->save(); 
                        \App\Http\Models\PasswordResets::where("email","=",$request->email)->delete();
                        return Redirect(route("auth.getlogin"))->with('message',"Change password success!,Please login");
                    }else{
                        return redirect()->back()->withErrors(["Email not exist!"]); 
                    }
                }
                       
            }
        }else{
            return Redirect( route("home.procedure")) ; 
        }
        
    }
    public function postlogin(Request $request){
    	if($this->_USER) {
            return Redirect(route("home.procedure")); 
        }
        $check = Validator::make($request->all(), [
            'email'    => 'required|email',
            'password' => 'required|min:6',
        ]);
        if ($check->fails()){
            return Redirect(route($this->_NAME.".getlogin"))->withErrors($check->errors()); 
        }else{
            $email    = strtolower($request->email);
            $password = $request->password;
            $remember = ($request->remember == 1) ? true : false;
            if( Auth::attempt(['email' => $email, 'password' => $password], $remember) ){
                $record = Auth::user();
                if($record->status->level > 0){
                    session([ '_USER' => $record]);
                    if($remember){
                        $record->remember_token = bcrypt(uniqid());
                        $record->save();
                        $minutes = ( 24 * 3 ) * 60 ;
                        Cookie::queue('remember',$record->remember_token,$minutes);
                    }
                    if($request->goto){
                        return Redirect($request->goto); 
                    }else{
                        return Redirect(route("home.procedure")); 
                    }
                    
                }else{
                    Auth::logout();
                    return Redirect(route($this->_NAME.".getlogin",['goto' => $request->goto]))->withErrors(["This Users not active!"]); 
                }
               
            }else{
            	return Redirect(route($this->_NAME.".getlogin",['goto' => $request->goto]))->withErrors(["Email or Password not match!"]); 
            }       
        }
        
    }
    public function changelang($id){
        $data = ["status" => 0,"_redirect" => 0,"data" => null,"message" => ""];
        $lang = \App\Http\Models\Languages::find($id);
        session([ '_LANG_ID' => $lang->id]);
        $data["status"] = 1;
        $data["_reload"] = 1;
        return \Response::json($data);
    }
}
