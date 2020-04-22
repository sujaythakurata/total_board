<?php
	
	namespace App\Services\setting;
	use App\Models\Batch;

	class batchstop{

		public function handel($batch_no)
		{
			//check if any batch is already running
			$cb = Batch::BatchStatus()->get();
			if(count($cb)>0){

				Batch::stopbatch($batch_no)->get();
				$res = json_encode(array(array(
					"batch_no"=>$batch_no,
					"response"=>200
				)));
				return Response($res, 200)
				->header("Content-type", "application/json");

			}else{

				$res = json_encode(array(
					"response"=>201
				));
				return Response($res, 200)
				->header("Content-type", "application/json");

			}

		}
	}



?>