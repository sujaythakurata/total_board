<?php

	namespace App\Services\Machine;
	use App\Models\Shift;
	use App\Models\Production;

	class shiftwiseprod{
		public function Getshiftwiseprod($batch, $m_id)
		{
			//get shift details;
			$shift = Shift::GetDetails()->get();

			//shift count
			$row = count($shift);

			//get shiftwise time
			//store the time
			$shift_day_prod = array();

			//datetime checker instance;
			$datetime = new \App\Services\datetimechecker();

			//get shift wise production and srore it
			for ($i=0; $i < $row; $i++) { 
				$date = $datetime
				->check(date("y-m-d"), 
					$shift[$i]['start_time'],
					$shift[$i]['end_time']);
				$prod = Production::GetShiftWiseDataM(
					$date[1],
					$date[0],
					$batch[0]['batch_id'],
					$m_id
				)->get();
				array_push($shift_day_prod, $prod[0]['production']);

			}


			return $shift_day_prod;


		}
	}





?>