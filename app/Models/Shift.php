<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Shift extends Model
{
    protected $table = 'shift_details';
    public function scopeGetDetails($query, $time)
    {	
    	$query;
    		
    }
    public function scopeSetTimeZone($query, $timezone)
	{	
		$query->select(DB::raw('set time_zone=$timezone'));
		
	}
}
