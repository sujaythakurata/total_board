<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pallet extends Model
{
    protected $table = "pallet_formula";

    //get pallet size 
    public function scopeGetsize($query, $bottle, $liter)
    {
    	$query
    	->select('carton_per_pallet')
    	->where([['number_bottle', "=", $bottle],
    		["liter", "=", $liter]]);
    }
}
