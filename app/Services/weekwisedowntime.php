<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\downtime;
use App\Models\Shift;

/**
 * 
 */
class weekwisedowntime
{
	public function Getdtweekwise()
	{	

		///set the timezone now it is india
		$timezone = timezone_name_from_abbr("", (240*60), false);
		date_default_timezone_set($timezone);
		$shift_time = Shift::GetDetails()->get();

		$num_shift = count($shift_time);

		///store the week wise down time data
		$shift_data_array = array();

		//store the day labels
		$day_label = array();

		//push all the array
		for($i=0;$i<$num_shift;$i++){
			array_push($shift_data_array, array());
		}

		$datetime = new \App\Services\datetimechecker();

		//last 7 days weekwise downtime 
		for($i=0;$i<7;$i++){
			//decreasing by 1 day
			$int = " - ".$i." days";

			//get the prev days
			$date = date('y-m-d', strtotime(date('y-m-d').$int));
			
			//get prev week day;
			array_push($day_label,app()->make('getweekday')
			->day(date('w', strtotime($date))));
			
			//loop over all the shift
			for($j=0;$j<$num_shift;$j++){

				//shift start and end time
				$start_shift = $shift_time[$j]["start_time"];
				$end_shift = $shift_time[$j]["end_time"];


				//get the shift
				$shift = $datetime->check($date, $start_shift, $end_shift);

				//get the data
				array_push($shift_data_array[$j], 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));
			}

		}

		for($i=0 ;$i<count($shift_data_array);$i++){
			$shift_data_array[$i] = array_reverse($shift_data_array[$i]);
		}

		return [$shift_data_array,array_reverse($day_label)];
		# code...
	}
}





?>