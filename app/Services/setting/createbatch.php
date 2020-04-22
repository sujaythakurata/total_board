<?php
	namespace App\Services\setting;

	use App\Models\Batch;

	class createbatch{

		public function store($data)
		{
			//batch no
			$batch_no = $data["batch_no"];
			// batch qty
			$batch_qty = $data["batch_qty"];
			//batch carton
			$batch_carton = $data["batch_carton"];
			//batch status
			$batch_status = 0;
			//product id
			$product = $data['product_id'];

			Batch::store(
				$batch_no,
				$batch_qty,
				$batch_carton,
				$batch_status,
				$product
			)->get();
		}
	}












?>