<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Batch;
use App\Models\Production;
use App\Models\downtime;

class shiftinfo
{
	public function Getinfo($runnig_batch)
	{
		//get the runnint_batch details
		$batch_id = $runnig_batch[0]['batch_id'];

		///set the timezone now is dubai 
		$timezone = timezone_name_from_abbr("", (240*60), false);
		date_default_timezone_set($timezone);


		$datetime = strtotime(date('H:i:s'));//current time

		//get shift details
		$shifdetails = shift::GetDetails()->get();
		$row = count($shifdetails);

		$shift = array();//store the curent shift start and end time
		$id = 0;//store the shift id

		$t = new \App\Services\datetimechecker();//to get the start and end date


			//to get the shift id start time and end time
			for ($i=0; $i < $row; $i++) {

					$start = $shifdetails[$i]['start_time']; //shift start time
					$end = $shifdetails[$i]['end_time']; //shift end time

					if($datetime>=strtotime($start)){

						if($datetime<=strtotime($end)){
							//if time within the current day
							$shift = $t->check(date('y-m-d'), $start, $end);
							$id = $shifdetails[$i]["shift_id"];
							break;
						}else{
							if(strtotime($start)-strtotime($end)>0){
								//if time within the current day
								$shift = $t->check(date('y-m-d'), $start, $end);
								$id = $shifdetails[$i]["shift_id"];
								break;
							}
						}
					}else{
							if(strtotime($start)-strtotime($end)>0){
								//time after 12 am means new day start
								$shift = $t->checkpre(date('y-m-d'), $start, $end);
								$id = $shifdetails[$i]["shift_id"];
								break;
							}
					}

				}


			$downtime = downtime::Getdowntime($shift[0], 
				$shift[1])->get();//this shift downtime

			$data[0]['downtime'] = $downtime[0]['shift_down_time']==null?0:$downtime[0]['shift_down_time'];
			//current shift start time
			$data[0]['start'] = $shift[0];
			//current shift end time
			$data[0]['end'] = $shift[1];

			//return the data
			return $data;
	}
    //
}