<?php

namespace App\Services\Machine;

use App\Models\downtime;
use App\Models\Shift;
use App\Models\Production;

/**
 * 
 */
class weekwisedata
{
	public function Get($batch, $m_id)
	{	

		///set the timezone now it is dubai
		$timezone = timezone_name_from_abbr("", (240*60), false);
		date_default_timezone_set($timezone);
		$shift_time = Shift::GetDetails()->get();

		//number of shift
		$num_shift = count($shift_time);


		///store the week wise down time data
		$shift_data_down = array();

		for($i=0;$i<$num_shift;$i++){
			array_push($shift_data_down, array());
		}

		//store weekwise production 
		$shift_data_prod = array();

		for($i=0;$i<$num_shift;$i++){
			array_push($shift_data_prod, array());
		}

		///label of the day
		$day_label = array();

		$datetime = new \App\Services\datetimechecker();

		//get last 7 days data

		for($i = 0; $i<7; $i++){
			//decreasing by 1 day
			$int = " - ".$i." days";

			//get the prev days
			$date = date('y-m-d', strtotime(date('y-m-d').$int));
			
			//get prev week day;
			array_push($day_label,app()->make('getweekday')
			->day(date('w', strtotime($date))));

			//loop over the shifts
			for($j = 0; $j<$num_shift; $j++){

				//shift start and end time
				$start_shift = $shift_time[$j]["start_time"];
				$end_shift = $shift_time[$j]["end_time"];

				//get the shift
				$shift = $datetime->check($date, $start_shift, $end_shift);

				//get downtime shift wise
				array_push($shift_data_down[$j], 
					number_format(downtime::Getdowntimemachinewise(
						$shift[1],//end time
						$shift[0],//start time
						$m_id
					)
					->get()[0]['shift_down_time']/3600, 
					2));

				//get production shift wise
				array_push(
					$shift_data_prod[$j],//container to store production
					Production::GetShiftWiseDataM(
						$shift[1],//end-time datetime
						$shift[0],//start datetime
						$batch[0]["batch_id"],//batchid
						$m_id  //machine id
					)->get()[0]['production']
				);

			}


		}

		for($i=0;$i<count($shift_data_prod);$i++){
			$shift_data_prod[$i] = array_reverse($shift_data_prod[$i]);
			$shift_data_down[$i] = array_reverse($shift_data_down[$i]);
		}

		return [$shift_data_prod, $shift_data_down, array_reverse($day_label)];
		# code...
	}
}





?>