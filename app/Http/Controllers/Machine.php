<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

///import batch model
use App\Models\Batch;
use App\Models\Mpt;
use App\Models\Production;
use App\Models\downtime;
use App\Models\mlinespeed;
use App\Models\Shift;

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

    public function machineoee($id)
    {
        //get running batch
        $batch =  Batch::ActiveBatchDetails()->get();

        if(count($batch)>0){

            ///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (4*60*60), false);
            date_default_timezone_set($timezone); 

            ///the current time
            $start = date('y-m-d H:i:s');
    
            ///get the end time 1 hour ago
            $end = date('y-m-d H:i:s', strtotime($start)-3600);

            //duration here hours wise
            $duration = 60;
    
            if(strtotime($end)<strtotime($batch[0]['batch_start_time'])){
                $end = $batch[0]['batch_start_time'];
                $duration = round((strtotime($start) - strtotime($end))/60);
            }
            ///get produced carton between every 1 hour
            $data = Production::
            Getcarton($batch[0]['batch_id'],$id,$start, $end)
            ->get();
    
            //////calculte total bottel produced
            $total_bottles = 
            $data[0]['carton_produced'];//*$running_batch[0]['no_of_bottle'];

            $data[0]['count'] = $total_bottles;
    
            ///get the downtime beteen this 1 hour
            $dt = downtime::Getdowntimemachinewise($start, $end, $id)->get();
            $dt = round($dt[0]['shift_down_time']/60);
    
            $data[0]['dt'] = $dt;
    
            //store start date and end date
    
            $data[0]['start'] = $start;
            $data[0]['end'] = $end;
            $data[0]['start_date'] = $batch[0]['batch_start_time'];
            $data[0]['duration'] = $duration;

            //get line speed
            $speed = mlinespeed::getspeed($id)->get();

            ///calculate oee
            $oee = app()->make('OEEcalculation')
            ->calculate((int)$duration, (int)$dt, (int)$total_bottles, $speed[0]['speed']);
            
            if($total_bottles ==Null)
                $total_bottles = 0;

            $res = array(
                "availability"=>$oee["availability"],
                "performance"=>$oee["performance"],
                "operation_time"=>$oee["operating_time"],
                'available_time'=>$oee['available_time'],
                "downtime"=>$dt,
                "operation_target"=>$oee["operating_target"],
                "machine_count"=>$total_bottles,
                "oee"=>$oee["oee"]

            );
    
            ///return the response
            print_r($res);

        }else{
            return 0;
        }

    }


    public function csm()
    {
        ///get the running batch details
        $batch_details = Batch::ActiveBatchDetails()->get();

        if(count($batch_details)>0)
        {
            $oee = new \App\Http\Controllers\OEEController;
            $oee = $oee->GetOeeDetails();
                $res = array(
                    "availability"=>$oee[0]["availability"],
                    "performance"=>$oee[0]["performance"],
                    "operation_time"=>$oee[0]["operation_time"],
                    'available_time'=>$oee[0]['available_time'],
                    "downtime"=>$oee[0]['downtime'],
                    "operation_target"=>$oee[0]["operation_target"],
                    "machine_count"=>$oee[0]['carton_produced'],
                    "oee"=>$oee[0]["oee"]

                );
        
                ///return the response
                print_r($res);
            }
        else{
            return response(0, 200);
        }

    }


}
