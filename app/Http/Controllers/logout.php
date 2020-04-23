<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class logout extends Controller
{
    public function logout(Request $req)
    {
    	$req->session()->flush();
    	return redirect()->action('login@index')->with('msg', "Logout Successfully");
    }
}
