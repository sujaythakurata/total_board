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

		///set the timezone now it is india
		$timezone = timezone_name_from_abbr("", (330*60), false);
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
		$shift_1_downtime = array();   /// shift 1 data
		$shift_2_downtime = array();	 /// shift 2 data
		$shift_3_downtime = array();	/// shift 3 data

		//store weekwise production 
		$shift_1_production = array();   /// shift 1 data
		$shift_2_production = array();	 /// shift 2 data
		$shift_3_production = array();	/// shift 3 data

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
			$shift = $datetime
			->check($date, $s_1_s, $s_1_e);

			///get the downtime for shift 1
			array_push($shift_1_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1],//end time
					$shift[0],//start time
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 1
			array_push(
				$shift_1_production,//container to store shift 1 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			//shift - 2
			$shift = $datetime
			->check($date, $s_2_s, $s_2_e);

			//get shift 2 downtime
			array_push($shift_2_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1], 
					$shift[0],
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 2
			array_push(
				$shift_2_production,//container to store shift 2 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			//shift - 3
			$shift = $datetime
			->check($date, $s_3_s, $s_3_e);

			//get shfit 3 downtime
			array_push($shift_3_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1], 
					$shift[0],
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 3
			array_push(
				$shift_3_production,//container to store shift 3 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			$j -= 1;
		}


		///foward days
		$j = 0;
		for ($i=0; $i < 7-$wk; $i++) { 
			$int = " + ".$j." days";
			//get the tommrrow days
			$date = date('y-m-d', strtotime(date('y-m-d').$int));

			//shift - 1
			$shift = $datetime
			->check($date, $s_1_s, $s_1_e);

			//get shfit 1 downtime
			array_push($shift_1_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1], 
					$shift[0],
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 1
			array_push(
				$shift_1_production,//container to store shift 1 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			//shift - 2
			$shift = $datetime
			->check($date, $s_2_s, $s_2_e);

			//get shift 2 downtime
			array_push($shift_2_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1], 
					$shift[0],
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 2
			array_push(
				$shift_2_production,//container to store shift 2 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			//shift - 3
			$shift = $datetime
			->check($date, $s_3_s, $s_3_e);

			//get shift 3 downtime
			array_push($shift_3_downtime, 
				number_format(downtime::Getdowntimemachinewise(
					$shift[1], 
					$shift[0],
					$m_id
				)
				->get()[0]['shift_down_time']/3600, 
				2));

			//get the production for shift 3
			array_push(
				$shift_3_production,//container to store shift 3 production
				Production::GetShiftWiseDataM(
					$shift[1],//end-time datetime
					$shift[0],//start datetime
					$batch[0]["batch_id"],//batchid
					$m_id  //machine id
				)->get()[0]['production']
			);

			$j += 1;
		}
		
		$data = json_encode(array(
			"shift_wise_downtime"=>[
				$shift_1_downtime,
				$shift_2_downtime,
				$shift_3_downtime],
			"shift_wise_production"=>[
				$shift_1_production,
				$shift_2_production,
				$shift_3_production
			]
		));

		return $data;
		# code...
	}
}





?>