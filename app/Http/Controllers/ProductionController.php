<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Batch;

class ProductionController extends Controller
{
	public function Getprodstatus()
	{
		$running_batch= Batch::ActiveBatchDetails()->get();//active batch details

		if(count($running_batch)>0){
			$id = $running_batch[0]['batch_id']; //current runnig batch id
			$start_time = $running_batch[0]['batch_start_time'];//current batch start time
			$no_bottles = $running_batch[0]['no_of_bottle']; //current batch no_bottles

			$data = Production::GetProducedQtyDetails($id, $start_time)->get();//get produceQty data
			$data[0]['Bottles_produced'] = $data[0]['carton_produced']*$no_bottles;

			return response($data, 200)
			->header('Content-type', 'application/json');


		}else{
			return response(0, 200);
		}
	}
    //
}
