<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Models\Mpt;

class machinesnippet extends Controller
{
    public function getdata()
    {
    	//get running batch details
    	$batch = Batch::ActiveBatchDetails()->get();
    	if(count($batch)>0){

    		//get the production details of all machine
    		$prod = array();

    		//loopthrough all the machine
    		for($i=1;$i<=13;$i++){
	    		//get machine product type
	    		$product = Mpt::Getproduct($i)->get();
	    		//get target and produced qty
	    		$prod_details = app()->make('MprodDetails')
	    		->Getdetails($batch, $product[0]['product'],$i);
	    		array_push($prod, $prod_details[0]);
    		}
    		return $prod;

    	}else{

    		return 0;
    	}
    }

    //get downtime
    public function getdowntime()
    {
    	//get running batch details
    	$batch = Batch::ActiveBatchDetails()->get();
    	if(count($batch)>0){
    		//get the production details of all machine
    		$shift = array();

    		//loopthrough all the machine
    		for($i=1;$i<=13;$i++){
    			//get shiftwise prod and shiftwise downtime
    			array_push($shift,app()->make('SDT')->Getshiftprod($batch, $i)[0]['shift_down_time']);
    		}
    		return $shift;

    	}else{

    		return 0;
    	}
    }

    //get oee

    public function getoee()
    {
        //get running batch
        $batch =  Batch::ActiveBatchDetails()->get();

        if(count($batch)>0){
        	$oee = array();
        	for($i=1;$i<=13;$i++){
        		array_push($oee,app()->make('Shiftoee')->GetOeeDetails($batch, $i)[0]['oee']);
        	}

            return Response($oee, 200)
            ->header('Content-type', 'application/json');
        }else{
            return 0;
        }
    }
}
