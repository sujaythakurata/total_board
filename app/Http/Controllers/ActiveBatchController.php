<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Services\BatchController;

class ActiveBatchController extends Controller
{



    //get runnig batch details
    public function Getdetails()
    {
        //get batch details
    	$data = Batch::ActiveBatchDetails()->get();
    	return Response($data, 200)
        ->header("Content-Type", 'application/json');
    }

    //get runnig batch id
    public function Getstatus()
    {
    	$status = Batch::BatchStatus()->get();
    	return response($status, 200);
    }


    ///get runnig batch master details
    public function Getmasterdetails()
    {
        //running batch details
        $data = app()->make('BatchController')->Getdetails();

        if(count($data)>0){

            //runnig batch production details
            $prod = app()
            ->make('ProductionController')
            ->Getprodstatus($data);

            ///store the production details
            ///carton produced
            $data[0]['carton_produced'] = $prod[0]['carton_produced'];
            ///bottles produced
            $data[0]['Bottles_produced'] = $prod[0]['Bottles_produced'];

            ///get current shift details 
            $shift = app()
            ->make('ShiftController')
            ->Getshiftstatus($data);

            //store current shifit total carton produced
            $data[0]['shiftwise_carton_produced'] = 
            $shift[0]['shiftwise_carton_produced'];

            //store current shift total bottle produced
            $data[0]['shiftwise_bottle_produced'] = 
            $shift[0]['shiftwise_bottle_produced'];

            //current shift id
            $data[0]['shift_id'] = $shift[0]['shift_id'];

            //current shift start time
            $data[0]['start'] = $shift[0]['start'];

            //current shift end time
            $data[0]['end'] = $shift[0]['end'];

            //current shift downtime
            $data[0]['shift_down_time'] = $shift[0]['shift_down_time'];

            ///return response 
            return response($data, 200)
            ->header('Content-type', 'json')
            ->header('Cache-Control', 'No-Store')
            ->header('Retry-After', '3600');
            
        }else{

            //when no batch is running
            return response(0, 200);
        }
        
    }

    ///get shift wise week data
    public function Getwkwisedt()
    {
        ///get week wise shift data
        $time = app()->make('DownTime')->Getdtweekwise();

        //return response
        return response($time, 200)
        ->header('Content-type', 'json');
    }






///classs end

}
