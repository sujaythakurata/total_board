<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\downtime;

/**
 * 
 */
class weekwisedowntime
{
	public function Getdtweekwise($batch)
	{	
		$timezone = timezone_name_from_abbr("", (330*60), false);
		date_default_timezone_set($timezone);
		$shift_1 = array();
		$shift_2 = array();
		$shift_3 = array();
		$wk = date('w', strtotime('y-m-d'));
		$j = $wk;
		for ($i=0; $i < $wk; $i++) {
			$int = " - ".$j." days";
			$start_3 = date('y-m-d', strtotime(date('y-m-d').$int))." 01:00:00";
			$end_3 = date('y-m-d', strtotime(date('y-m-d').$int))." 07:00:00";
			$data = downtime::Getdowntime($start_3, $end_3)->get();
			$data[0]['start'] = $start_3;
			$data[0]['end'] = $end_3;
			array_push($shift_3, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$start_1 = date('y-m-d', strtotime(date('y-m-d').$int))." 07:00:00";
			$end_1 = date('y-m-d', strtotime(date('y-m-d').$int))." 16:00:00";
			$data = downtime::Getdowntime($start_1, $end_1)->get();
			$data[0]['start'] = $start_1;
			$data[0]['end'] = $end_1;
			array_push($shift_1, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$start_2 = date('y-m-d', strtotime(date('y-m-d').$int))." 16:00:00";
			$p = $j - 1;
			$int = " - ".$p." days";
			$end_2 = date('y-m-d', strtotime(date('y-m-d').$int))." 01:00:00";
			$data = downtime::Getdowntime($start_2, $end_2)->get();
			$data[0]['start'] = $start_2;
			$data[0]['end'] = $end_2;
			array_push($shift_2, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$j -= 1;
		}
		$j = 0;
		for ($i=0; $i < 7-$wk; $i++) { 
			$int = " + ".$j." days";
			$start_3 = date('y-m-d', strtotime(date('y-m-d').$int))." 01:00:00";
			$end_3 = date('y-m-d', strtotime(date('y-m-d').$int))." 07:00:00";
			$data = downtime::Getdowntime($start_3, $end_3)->get();
			$data[0]['start'] = $start_3;
			$data[0]['end'] = $end_3;
			array_push($shift_3, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$start_1 = date('y-m-d', strtotime(date('y-m-d').$int))." 07:00:00";
			$end_1 = date('y-m-d', strtotime(date('y-m-d').$int))." 16:00:00";
			$data = downtime::Getdowntime($start_1, $end_1)->get();
			$data[0]['start'] = $start_1;
			$data[0]['end'] = $end_1;
			array_push($shift_1, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$start_2 = date('y-m-d', strtotime(date('y-m-d').$int))." 16:00:00";
			$p = $j+1;
			$int = " + ".$p." days";
			$end_2 = date('y-m-d', strtotime(date('y-m-d').$int))." 01:00:00";
			$data = downtime::Getdowntime($start_2, $end_2)->get();
			$data[0]['start'] = $start_2;
			$data[0]['end'] = $end_2;
			array_push($shift_2, number_format($data[0]['shift_down_time']/3600, 2, '.', ''));
			$j += 1;
		}
		
		return [$shift_1, $shift_2, $shift_3];
		# code...
	}
}





?>