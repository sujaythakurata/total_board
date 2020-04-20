<?php
	
	namespace App\Services;

	/**
	 * 
	 */
	class OEEcalculation
	{
		public function calculate($avl_time, $dt_time, $bottles_prod, $line_cap)
		{
			$op_time = $avl_time - $dt_time;
			$net_time= $op_time/$avl_time;
			$op_target = $op_time * $line_cap;
			$performance = $bottles_prod/$op_target;
			$OEE = number_format($net_time * $performance*100, 2);
			$data = array(
				"performance"=>number_format($performance*100,2),
				"availability"=>number_format($net_time*100,2),
				"oee"=>$OEE
			);
			return $data;
		}
	}



?>