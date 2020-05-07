<?php

	namespace App\Services;

	class getweekday{

		public function day($id)
		{
			$weekday = array(

				0=>"Sunday",
				1=>"Monday",
				2=>"Tuesday",
				3=>"Wednesday",
				4=>"Thursday",
				5=>"Friday",
				6=>"Saturday"
			);

			return $weekday[$id];
		}
	}













?>