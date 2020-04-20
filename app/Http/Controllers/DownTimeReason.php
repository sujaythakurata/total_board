<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\downtime_alert;


class DownTimeReason extends Controller
{
    public function dtreason(Request $res)
    {
    	try{
	    	$m_id = $res['m_id'];
	    	$main_cause = $res['c'];
	    	$sub_cause = $res['sc'];
	    	downtime_alert::updatealert($m_id, $main_cause, $sub_cause)->get();
	    	return Response(json_encode(array("status"=>0)), 200)
	    	->header('Content-type','application/json');
    	}catch(\Illuminate\Database\QueryException $ex){
    		return Response(json_encode(array("status"=>1)), 200)
	    	->header('Content-type','application/json');
    	}
    }
}
