<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;
use App\Services\BatchController;

class ActiveBatchController extends Controller
{

    public function Getdetails()
    {
    	$data = Batch::ActiveBatchDetails()->get();
    	// $temp= json_decode($data[0], true);
    	// $total_bottle = $data[0]['no_of_bottle']*$data[0]['batch_qty'];
    	// $temp["total_bottle"] = $total_bottle;
    	// $temp = json_encode($temp);
    	return Response($data, 200)->header("Content-Type", 'application/json');
    }
    public function Getstatus()
    {
    	$status = Batch::BatchStatus()->get();
    	return response($status, 200);
    }
    public function Getmasterdetails()
    {
        $data = app()->make('BatchController')->Getdetails();
        if(count($data)>0){

            $prod = app()->make('ProductionController')->Getprodstatus($data);
            $data[0]['carton_produced'] = $prod[0]['carton_produced'];
            $data[0]['Bottles_produced'] = $prod[0]['Bottles_produced'];
            $shift = app()->make('ShiftController')
            ->Getshiftstatus($data);
            $data[0]['shiftwise_carton_produced'] = $shift[0]['shiftwise_carton_produced'];
            $data[0]['shiftwise_bottle_produced'] = $shift[0]['shiftwise_bottle_produced'];
            $data[0]['shift_id'] = $shift[0]['shift_id'];
            $data[0]['start'] = $shift[0]['start'];
            $data[0]['end'] = $shift[0]['end'];
            $data[0]['shift_down_time'] = $shift[0]['shift_down_time'];
            return response($data, 200)
            ->header('Content-type', 'json');
            
        }else{
            return response(0, 200);
        }
        
    }
    public function Getwkwisedt()
    {
        $status= Batch::BatchStatus()->get();
        if(count($status)>0){
            $time = app()->make('DownTime')->Getdtweekwise();
            return response($time, 200)
            ->header('Content-type', 'json');
        }else{
            return response(0, 200);
        }
    }


}
