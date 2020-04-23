<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\Validateform;
use App\Models\User;
class login extends Controller
{
    
    //return view always  
    public function index(Request $req){
      $status = $req->session()->get('msg');
    	return view('login', ['status'=>$status]);
    }



    //to handel the form and login
    public function loginProcess(Validateform $request)
    {
      $valid = $request->validated(); //valid the data

      if(count($valid)>0){
        $status = User::where([["username", "=", $valid["username"]],["password", "=", $valid["password"]]])->get();//get the data from database

        if(count($status)>0){
          $login_session = array("username"=>$status[0]["username"],
            "token"=>$request["_token"], "status"=>$status[0]["status"]);
          //create and store session
          $request->session()->put($login_session);
          return redirect("/dashboard");
        }else{
          //if no data found on database
          return redirect("/")->with("data","Username or Password is invalid");
        }


      }
   	 }
}
