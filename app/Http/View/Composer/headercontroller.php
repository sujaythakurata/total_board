<?php
	namespace App\Http\View\Composer;
	use Illuminate\View\View;

	class headercontroller{

		public function compose(View $view){
			$status = app()->make('CurrentbatchStatus')->GetStatus();
			if(count($status)>0){
				$product = app()->make('ProductDetails')->GetProductDetails($status[0]["product_id"]);
				$data = array(
					"batchno"=>$status[0]['batch_no'],
					"pdname"=>trim($product[0]['product_name']),
					"batchtarget"=>$status[0]["batch_qty"],
					"batchcarton"=>$status[0]["batch_carton"],
					"bs"=>$status[0]["batch_start_time"],
				);
				$view->with("data", $data);

			}else{
				$view->with("data", "no batch is started");
			}
		}

	}


?>