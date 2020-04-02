<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProduceQty extends Model
{
	protected $table = 'produce_qty';
	public function scopeGetDetails($query, $id)
	{
		$query->where('batch_id', $id);
		# code...
	}
	public function scopeInsertData($query, $total_qty, $batch_id)
	{
		$query->insert(['batch_id'=>$batch_id, 'total_qty'=>$total_qty]);
		# code...
	}
	public function scopeUpdateTable($query, $value, $id, $time)
	{
		$query
		->where('batch_id', $id)
		->update(['total_qty'=>$value, 'updated_at'=>$time]);
		# code...
	}

    //
}
