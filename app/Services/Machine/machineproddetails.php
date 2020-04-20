<?php

	namespace App\Services\Machine;

	use App\Models\Production;

	Class machineproddetails{

		//get machine production count
		public function get($batch, $m_id)
		{
			//batch start time
			$start = $batch[0]['batch_start_time'];
			//batch id
			$batch_id = $batch[0]['batch_id'];

			//get production count form prodution table index wise
			$prod = Production::Mprod($batch_id, $start, $m_id)
			->get();

			return $prod;

		}

	}

?>