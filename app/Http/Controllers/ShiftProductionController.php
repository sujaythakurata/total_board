<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Shift;
use App\Models\Batch;

class ShiftProductionController extends Controller
{
	public function Getshiftstatus(Request $res)
	{

		$runnig_batch = Batch::ActiveBatchDetails()->get();
		if(count($runnig_batch)>0){
			$time_offset = $res->query('q'); //timeoffest respest to user tiemzone and utc timezone
			$timezone = timezone_name_from_abbr("", ($time_offset*60), false);
			date_default_timezone_set($timezone);
			Shift::SetTimeZone($timezone)->get();
			return $timezone;

		}else{
			return response(0, 200);
		}
	}
    //
}
