<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mpt extends Model
{
    protected $table = "machine_product_type";


    ///the get machine product using machine_index (e.g. 1)
    public function scopeGetproduct($query, $m_index)
    {
    	$query
    	->select(["m_full_name", "product"])
    	->where('m_id', $m_index);
    }
}
