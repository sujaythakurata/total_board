<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shift extends Model
{
    protected $table = 'shift_details';
    public $timestamps = false;
    public function scopeGetDetails($query)
    {	
    	$query;
    		
    }



    ///update the shfit
    public function scopeupdateshift($query, $start, $end, $id)
    {
    	$query
    	->where('shift_id', $id)
    	->update(["start_time"=>$start, "end_time"=>$end]);
    }
}
