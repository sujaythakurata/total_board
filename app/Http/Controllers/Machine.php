<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

///import batch model
use App\Models\Batch;
use App\Models\Mpt;

class Machine extends Controller
{
    //
    public function index($id){
    	//return $id;
    	return view('machine', ['id'=>$id]);
    }




    ///api function to get the machine master details index wise

    public function Getdetails($id)
    {
    	//get running batch details
    	$batch = Batch::ActiveBatchDetails()->get();

    	//if there is any running batch 
    	if(count($batch)>0){

    		//get machine product type
    		$product = Mpt::Getproduct($id)->get();

    		//get target and produced qty
    		$prod_details = app()->make('MprodDetails')
    		->Getdetails($batch, $product[0]['product'],$id);

    		//get shiftwise prod and shiftwise downtime
    		$shift_d = app()->make('SDT')->Getshiftprod($batch, $id);

    		//get machine rate per minute machineindex wise
    		$m_rate = app()->make('MR')
    		->Getrate($batch, $id);
    		
    		//get today shiftwise production
    		$shift = app()->make('TSP')->Getshiftwiseprod(
    			$batch,
    			$id);

            ///store the master data
            $masterdata = json_encode(array(
                "batch_start_time"=>$batch[0]["batch_start_time"],
                "batch_no"=>$batch[0]["batch_no"],
                "product_name"=>$batch[0]["product_name"],
                "m_full_name"=>$product[0]["m_full_name"],
                "product"=>$product[0]["product"],
                "produced"=>$prod_details[0]["production"],
                "target"=>$prod_details[0]["target"],
                "shift_prod"=>$shift_d[0]["production"],
                "shift_dt"=>$shift_d[0]["shift_down_time"],
                "shift_id"=>$shift_d[0]["shift_id"],
                "m_rate"=>$m_rate,
                "shift_prod_day"=>$shift
            ));


    		return Response($masterdata, 200)
    		->header('Content-type', 'application/json');
    	}else{

    		return Response(0, 200)
    		->header('Content-type', 'application/json');
    	}
    }

    public function GetWSDD($id)
    {
    	//get running batch details
    	$batch = Batch::ActiveBatchDetails()->get();

    	if(count($batch)>0){

    		//get weekwise production and downtime machinewise

    		$week_data = app()->make('WSDD')
    		->Get($batch, $id);

    		return Response($week_data, 200)
    		->header('Content-type', 'application/json');

    	}else{

    		return Response(0, 200)
    		->header('Content-type', 'application/json');
    	}
    }

    public function Getoee($id)
    {
        //get running batch
        $batch =  Batch::ActiveBatchDetails()->get();

        if(count($batch)>0){

            ///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (240*60), false);
            date_default_timezone_set($timezone);
            //get the oee

            //get the current date
            $current_date = date("y-m-d H:i:s");

            //previous day
            $prev_date = date("y-m-d 00:00:00");
            $h = strtotime($prev_date);
            //store the oee
            $oeelist = array();

            //loop through all the hours
            while(strtotime($current_date) > strtotime($prev_date)){
                $start_date = date("y-m-d H:i:s", strtotime($prev_date)+1);
                $h += 3600;
                $prev_date = date("y-m-d H:i:s", $h);

                //get the oee and store it
                array_push(
                    $oeelist, 
                    app()
                    ->make('oeehourwise')
                    ->GetOeelist($batch, $id, $prev_date, $start_date)
                );
                
            }
            return Response($oeelist, 200)
            ->header('Content-type', 'application/json');
        }else{
            return 0;
        }
    }


}
