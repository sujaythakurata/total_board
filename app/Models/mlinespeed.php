<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class mlinespeed extends Model
{
    protected $table = "machine_line_speed";
    public $timestamps = false;

    //get line speed
    public function scopegetspeed($query, $m_id)
    {
        $query
        ->select('speed')
        ->where('m_id', $m_id);
    }

    public function scopegetlist($query)
    {
    	$query
    	->join('machine_product_type','machine_product_type.m_id',"=","machine_line_speed.m_id")
    	->select(
    			'machine_line_speed.speed',
    			'machine_product_type.m_full_name',
    			'machine_product_type.m_id'
    		);
    }

    public function scopeupdatespeed($query, $m_id, $new_speed)
    {
    	$query
    	->where('m_id', $m_id)
    	->update(['speed'=>$new_speed]);
    }
}
