<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Http\Models\Notifications;
use App\Http\Cores\BackendController;
class NotificationsControllers extends BackendController
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
  
    public function __construct()
    {
        $this->_ROLNAMES["view"][] = "check";
        parent::__construct();    
        $this->_TABLE      = "notifications";
        $this->_VIEW       = "notifications";
        $this->_NAME       = "notifications";
        $this->_ROUTE_FIX  = "notifications";
        $this->_DATA["_PAGETITLE"] = "_manage_notifications_";
        $this->_ADDURL = route($this->_ROUTE_FIX.".store");
    }
    public function check($token)
    {  
         
    } 
    
    
}
