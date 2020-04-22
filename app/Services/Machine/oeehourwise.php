<?php

namespace App\Services\Machine;

use App\Models\Production;
use App\Models\Batch;
use App\Models\downtime;
use App\Models\mlinespeed;

class oeehourwise
{
    public function GetOeelist($running_batch, $m_id, $start, $end)
    {
        $duration = 60;
        
        //if there is no 1 hour complete
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
        
        $data[0]['end'] = $start;
        $data[0]['start'] = $end;
        $data[0]['start_date'] = $running_batch[0]['batch_start_time'];
        $data[0]['duration'] = $duration;

        //line speed
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
        return $data;
    }
}

?>