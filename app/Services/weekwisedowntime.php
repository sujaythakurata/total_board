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

		///shift - 1 start and end time
		$s_1_s = $shift_time[0]['start_time'];
		$s_1_e = $shift_time[0]['end_time'];

		///shift - 2 start and end time

		$s_2_s = $shift_time[1]['start_time'];
		$s_2_e = $shift_time[1]['end_time'];


		///shift - 3 start and end time

		$s_3_s = $shift_time[2]['start_time'];
		$s_3_e = $shift_time[2]['end_time'];


		///store the week wise down time data
		$shift_1 = array();   /// shift 1 data
		$shift_2 = array();	 /// shift 2 data
		$shift_3 = array();	/// shift 3 data

		///Get the current week day
		$wk = date('w', strtotime(date('y-m-d')));


		$j = $wk;//intialize to the current weekday

		$datetime = new \App\Services\datetimechecker();

		//previous days
		for ($i=0; $i < $wk; $i++) {
			$int = " - ".$j." days"; ///decreasing day by 1

			//get the prev days
			$date = date('y-m-d', strtotime(date('y-m-d').$int));

			//shift - 1
			$shift = $datetime->check($date, $s_1_s, $s_1_e);
			array_push($shift_1, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			//shift - 2
			$shift = $datetime->check($date, $s_2_s, $s_2_e);
			array_push($shift_2, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			//shift - 3
			$shift = $datetime->check($date, $s_3_s, $s_3_e);
			array_push($shift_3, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			$j -= 1;
		}


		///foward days
		$j = 0;
		for ($i=0; $i < 7-$wk; $i++) { 
			$int = " + ".$j." days";
			//get the tommrrow days
			$date = date('y-m-d', strtotime(date('y-m-d').$int));

			//shift - 1
			$shift = $datetime->check($date, $s_1_s, $s_1_e);
			array_push($shift_1, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			//shift - 2
			$shift = $datetime->check($date, $s_2_s, $s_2_e);
			array_push($shift_2, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			//shift - 3
			$shift = $datetime->check($date, $s_3_s, $s_3_e);
			array_push($shift_3, 
				number_format(downtime::Getdowntime($shift[0], $shift[1])
				->get()[0]['shift_down_time']/3600, 
				2));

			$j += 1;
		}
		
		return [$shift_1, $shift_2, $shift_3];
		# code...
	}
}





?>