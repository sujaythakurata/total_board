<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    protected $table = "batch_details";

    public function scopeActiveBatchDetails($query)
    {
    	return $query->join('product_list', 'batch_details.product_id', '=', 'product_list.product_id')
    	->where('batch_status', 1);
    }
    public function scopeBatchStatus($query){
    	return $query->select('batch_id')->where('batch_status',1);
    }
}
