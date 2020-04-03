<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Batch;

class ProductionController
{
	public function Getprodstatus($running_batch)
	{
			$id = $running_batch[0]['batch_id']; //current runnig batch id
			$start_time = $running_batch[0]['batch_start_time'];//current batch start time
			$no_bottles = $running_batch[0]['no_of_bottle']; //current batch no_bottles

			$data = Production::GetProducedQtyDetails($id, $start_time)->get();//get produceQty data
			$data[0]['Bottles_produced'] = $data[0]['carton_produced']*$no_bottles;

			return $data;

	}
    //
}