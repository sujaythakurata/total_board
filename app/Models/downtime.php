<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class downtime extends Model
{
    protected $table = 'down_time';

    public function scopeGetdowntime($query, $start, $end)
    {
    	$query
    	->select(DB::raw('sum(duration) as shift_down_time'))
    	->whereBetween('end_time', [$start,$end]);
    }
    public function scopeGetdowntimemachinewise($query, $start, $end,$id)
    {
        $query
        ->select(DB::raw('sum(duration) as shift_down_time'))
        ->where([['machine_index', '=', $id], ['end_time', '>=', $end], ['end_time', '<=', $start]]);
    }

}
