<?php

	namespace App\Services;
	use App\Models\Pallet;

	Class MprodDetails{

		public function Getdetails($batch, $product, $m_id)
		{

			//get production count machinewise
			$prod = app()->make('MDT')->get($batch, $m_id);

			///now check if product type is pallet carton or bottel
			if($product=="pallet"){
				//get bottel and liter
				$bottel = $batch[0]['no_of_bottle'];
				$liter = $batch[0]['liters'];

				///get the pallet size
				$size = Pallet::Getsize($bottel, $liter)
				->get()[0]['carton_per_pallet'];

				//calculate target pallet
				$target = round($batch[0]["batch_carton"]/$size);

				$prod[0]['target'] = $target;
			}
			else if($product=="carton"){

				$prod[0]["target"] = $batch[0]["batch_carton"];

			}else{
				$prod[0]["target"] = $batch[0]["batch_qty"];
			}

			return $prod;
			
		}

	}
















?>