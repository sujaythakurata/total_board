<?php

	namespace App\Services;

	class datetimechecker{

		public function check($start_date, $start, $end)
		{
			if(strtotime($start)-strtotime($end)<0){

				$start = $start_date." ".$start;
				$end = $start_date.' '.$end;
				return [$start, $end];

			}else{

				$start = $start_date." ".$start;
				//when time between two day
				$tmp = $start_date." ".$end;
				$end = date('y-m-d H:i:s', strtotime($tmp." + 1 days"));
				return [$start, $end];

			}
		}
		public function checkpre($start_date, $start, $end)
		{
			if(strtotime($start)-strtotime($end)<0){

				$start = $start_date." ".$start;
				$end = $start_date.' '.$end;
				return [$start, $end];

			}else{

				$end = $start_date." ".$end;
				//when time between two day
				$tmp = $start_date." ".$start;
				$start = date('y-m-d H:i:s', strtotime($tmp." - 1 days"));
				return [$start, $end];

			}
		}
	}


?>