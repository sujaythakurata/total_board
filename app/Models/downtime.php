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

    //get machine wise downtime shift wise

    public function scopedowntime($query, $start, $end)
    {
        DB::statement("SET SESSION sql_mode = ''");

        $query
        ->join('machine_product_type',  "machine_product_type.m_id", "=", 'down_time.machine_index')
        ->select(DB::raw('sum(down_time.duration) as dt, down_time.machine_index, machine_product_type.m_full_name'))
        ->where([['down_time.end_time', ">=", $start], ['down_time.end_time', "<=", $end]])
        ->groupBy('machine_index')
        ->orderBy('dt', 'desc');
    }
    

}
