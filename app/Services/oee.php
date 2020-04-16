<?php

namespace App\Services;

use App\Models\Production;
use App\Models\Batch;
use App\Models\downtime;

class oee
{
    public function GetOeeDetails($running_batch)
    {
        ///get the running batch details
    	//$running_batch = Batch::ActiveBatchDetails()->get();

        if(count($running_batch)>0)
        {///set default time zone now is india
                $timezone = timezone_name_from_abbr("", (330*60), false);
                date_default_timezone_set($timezone);
        
                ///the current time
                $start = date('y-m-d H:i:s');
        
                ///get the end time 1 hour ago
                $end = date('y-m-d H:i:s', strtotime($start)-3600);

                //duration here hours wise
                $duration = 60;
        
                if(strtotime($end)<strtotime($running_batch[0]['batch_start_time'])){
                    $end = $running_batch[0]['batch_start_time'];
                    $duration = round((strtotime($start) - strtotime($end))/60);
                }
        
                ///get produced carton between every 1 hour
                $data = Production::
                Getcarton($running_batch[0]['batch_id'],11,$start, $end)
                ->get();
        
                //////calculte total bottel produced
                $total_bottles = 
                $data[0]['carton_produced']*$running_batch[0]['no_of_bottle'];

                $data[0]['total_bottles'] = $total_bottles;
        
                ///get the downtime beteen this 1 hour
                $dt = downtime::Getdowntimemachinewise($start, $end, 11)->get();
                $dt = round($dt[0]['shift_down_time']/60);
        
                $data[0]['dt'] = $dt;
        
                //store start date and end date
        
                $data[0]['start'] = $start;
                $data[0]['end'] = $end;
                $data[0]['start_date'] = $running_batch[0]['batch_start_time'];
                $data[0]['duration'] = $duration;

                ///calculate oee
                $oee = app()->make('OEEcalculation')
                ->calculate((int)$duration, (int)$dt, (int)$total_bottles, 38);

                //store the oee
                $data[0]['oee'] = $oee;
        
                ///return the response
                return $oee;}
        else{
            return 0.0;
        }

    }
}

?>