<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\downtime_alert;

class alerthandler extends Controller
{
    public function handel()
    {

    	$data = downtime_alert::getalert()->get();
    	if(count($data)>0){
    	$data[0]["queued"] = count($data)-1;
    	$data[0]['status'] = 0;
    	return Response($data[0], 200)
    	->header('Content-type','application/json');

    }
    	else{
	    	return Response(json_encode(array("status"=>1)), 200)
	    	->header('Content-type','application/json');
    	}
    	
    }
}
