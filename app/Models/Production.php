<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Production extends Model
{
	protected $table = "production_count";

	public function scopeGetProducedQtyDetails($query, $id, $starttime)
	{
		$query
		->select(DB::raw('sum(count) as carton_produced'))
		->where([['batch_id','=', $id],['machine_index', '=', '11'], ['created_time', '>', $starttime]]);
		# code...
	}
	public function scopeGetShiftWiseData($query, $start, $end, $id)
	{		
		$query
		->select(DB::raw('sum(count) as shiftwise_carton_produced'))
		->where([['batch_id', '=', $id],['machine_index', '=', '11'], ['created_time', '>', $start], ['created_time', "<", $end]]);
	}
}
