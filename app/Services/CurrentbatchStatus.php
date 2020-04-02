<?php
	namespace App\Services;

	class CurrentbatchStatus{

		public $batch;
		function __construct(){
			$this->batch = new \App\Models\Batch;
		}

		public function GetStatus(){
			$data = $this->batch
			->where('batch_status',1)
			->get();
			return $data;
		}
}


?>