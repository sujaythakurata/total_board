<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\downtime_alert;
use App\Models\downtime;
use App\Models\Batch;

class reasonhandeler extends Controller
{
    public function handel($id)
    {	

    	//get the batch details;
    	$batch = Batch::ActiveBatchDetails()->get();
    	if(count($batch)>0)
		{
			///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (330*60), false);
             date_default_timezone_set($timezone);

            //start time
			$start = "2020-03-22 18:07:41"; //$batch[0]['batch_start_time'];

			//end time
    		$end = date('y-m-d H:i:s');

    		//get the data
    		$data = downtime_alert::getreason($start, $end, $id)->get();

    		return Response($data, 200)
    		->header('Content-type', 'application/json');
    	}
    	else{

    		return 0;
    	}
    }

    //top reasons
    public function topreason()
    {	

    	//get the batch details;
    	$batch = Batch::ActiveBatchDetails()->get();
    	if(count($batch)>0)
		{
			///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (330*60), false);
             date_default_timezone_set($timezone);

            //start time
			$start = "2020-03-22 18:07:41"; //$batch[0]['batch_start_time'];

			//end time
    		$end = date('y-m-d H:i:s');

    		//get the data
    		$data = downtime_alert::gettopreason($start, $end)->get();

    		return Response($data, 200)
    		->header('Content-type', 'application/json');
    	}
    	else{

    		return 0;
    	}
    }

    ///get shift reason
    public function shiftreason()
    {
    	

    	//get the batch details;
    	$batch = Batch::ActiveBatchDetails()->get();
    	if(count($batch)>0)
		{
			///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (330*60), false);
             date_default_timezone_set($timezone);

             //get shift info
             $shift = app()
             ->make("shiftinfo")
             ->Getinfo($batch);

             //total down time in this shift;
             $total = $shift[0]['downtime'];

             $dt = downtime::downtime($shift[0]['start'], $shift[0]['end'])->get();

            if($total>0)
			{for($i=0;$i<count($dt);$i++){
             	$dt[$i]['dt'] = number_format(($dt[$i]['dt']/$total)*100, 2);
             }}

             return $dt;

        }else{

        	return 0;
        }



    }
}
