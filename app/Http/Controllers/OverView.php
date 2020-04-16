<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;


class OverView extends Controller
{
    public function Getdata()
    {
    	//get the running batch details
    	$batch = Batch::ActiveBatchDetails()->get();

    	//if batch is running
    	if(count($batch)>0){

    		//get shift details
    		$shift = app()
    		->make('ShiftController')
    		->Getshiftstatus($batch);

    		//get production details
    		$prod = app()
    		->make('ProductionController')
    		->Getprodstatus($batch);

    		//get oee
    		$oee = app()->make('oee')->GetOeeDetails($batch);


    		///bottelprod/targetbottel cartonprod/targetcarton 
    		$bottel = $prod[0]['Bottles_produced']."/".$batch[0]['batch_qty'];
    		$carton = $prod[0]['carton_produced']."/".$batch[0]['batch_carton'];

    		//format the data
    		$data = array(
    			"timestamp"=>date('y-m-d H:i:s'),
    			"shift"=>$shift[0]['shift_id'],
    			"downtime"=>$shift[0]['shift_down_time'],
    			"bottel_count"=>$bottel,
    			"carton_count"=>$carton,
    			"oee"=>$oee,
    			"status"=>0
    		);


    		return Response(json_encode($data), 200)
    		->header('Content-type', 'application/json');
    	}else{

    		return Response(json_encode(array(
    			'status'=>1)), 200)
    		->header('Content-type', 'application/json');
    	}



    }
}
