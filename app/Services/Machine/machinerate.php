<?php

 	namespace App\Services\Machine;
	use App\Models\Production;


 	Class machinerate{
 		public function Getrate($batch, $m_id)
 		{
			///set default time zone now is dubai
            $timezone = timezone_name_from_abbr("", (240*60), false);
            date_default_timezone_set($timezone);

            ///the current time means the start time
           	$start = date('y-m-d H:i:s');
        
            ///get the end time 1 minute ago
            $end = date('y-m-d H:i:s', strtotime($start)-60);

            //duration here second wise
            $duration = 60; //sec

            //if start the batch and 1 minute not complete
            if(strtotime($end)<strtotime($batch[0]['batch_start_time'])){
                    $end = $batch[0]['batch_start_time'];
                    $duration = round((strtotime($start) - strtotime($end)));//sec wise
            }

            //get production machine wise 1 minute duration
            $prod = Production::GetShiftWiseDataM(
            	$start,
            	$end,
            	$batch[0]['batch_id'],
            	$m_id
            )->get()[0]['production'];

            //calculte the rate of the machine
            $rate = number_format(($prod/$duration)*100, 2);

            return $rate;

 		}
 	}



?>