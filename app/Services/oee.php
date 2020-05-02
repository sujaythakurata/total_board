<?php

namespace App\Services;

use App\Models\Production;
use App\Models\Batch;
use App\Models\downtime;
use App\Models\mlinespeed;

class oee
{
    public function GetOeeDetails($running_batch, $m_id)
    {

        if(count($running_batch)>0)
        {///set default time zone now is india
                $timezone = timezone_name_from_abbr("", (4*60*60), false);
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
                Getcarton($running_batch[0]['batch_id'],$m_id,$start, $end)
                ->get();
        
                //////calculte total bottel produced
                $total_bottles = 
                $data[0]['carton_produced']*$running_batch[0]['no_of_bottle'];

                $data[0]['total_bottles'] = $total_bottles;
        
                ///get the downtime beteen this 1 hour
                $dt = downtime::Getdowntimemachinewise($start, $end, $m_id)->get();
                $dt = round($dt[0]['shift_down_time']/60);
        
                $data[0]['dt'] = $dt;
        
                //store start date and end date
        
                $data[0]['start'] = $start;
                $data[0]['end'] = $end;
                $data[0]['start_date'] = $running_batch[0]['batch_start_time'];
                $data[0]['duration'] = $duration;

                //get line speed
                $speed = mlinespeed::getspeed($m_id)->get();
                

                ///calculate oee
                $oee = app()->make('OEEcalculation')
                ->calculate((int)$duration, (int)$dt, (int)$total_bottles, $speed[0]['speed']);

                //store the oee
                $data[0]["oee"] = $oee["oee"];
                //store the performance
                $data[0]['performance']= $oee["performance"];
                //store the availability
                $data[0]['availability']= $oee["availability"];
        
                ///return the response
                return $data;}
        else{
            return 0.0;
        }

    }
}

?>