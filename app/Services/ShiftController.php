<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Batch;
use App\Models\Production;

class ShiftController
{
	public function Getshiftstatus($runnig_batch)
	{
		$batch_id = $runnig_batch[0]['batch_id'];
		$timezone = timezone_name_from_abbr("", (330*60), false);
		date_default_timezone_set($timezone);
		$datetime = time();//strtotime('01:20:00');//current time
		$shifdetails = shift::GetDetails()->get();
		$row = count($shifdetails);
		$start = 0;
		$end = 0;
		$id = 0;


			//to get the shift id start time and end time
			for ($i=0; $i < $row; $i++) { 
				$start = strtotime($shifdetails[$i]['start_time']);
				$end = strtotime($shifdetails[$i]['end_time']);
				$diff = $start-$end;
				if($datetime>$start){
					if($datetime<$end){
						$id = $shifdetails[$i]['shift_id'];
						$start = date('y-m-d')." ".$shifdetails[$i]['start_time'];
						$end = date('y-m-d')." ".$shifdetails[$i]['end_time'];
						break;
					}else{
						if($diff>0){
							$id = $shifdetails[$i]['shift_id'];
							$start = date('y-m-d')." ".$shifdetails[$i]['start_time'];
							$date = date('y-m-d', strtotime(date('y-m-d').' + 1 days'));
							$end = $date." ".$shifdetails[$i]['end_time'];
							break;
						}
					}
				}

			}//end of for loop
			$data = Production::GetShiftWiseData($start, $end, $batch_id)->get();
			$data[0]['shiftwise_bottle_produced'] = $data[0]['shiftwise_carton_produced']*$runnig_batch[0]['no_of_bottle'];
			$data[0]['shift_id'] = $id;
			$data[0]['start'] = $shifdetails[$id-1]['start_time'];
			$data[0]['end'] = $shifdetails[$id-1]['end_time'];
			return $data;
	}
    //
}