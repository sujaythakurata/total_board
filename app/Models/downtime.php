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
    public function scopeGetwkwisetime($query, $start)
    {
    	$query
    	->select(DB::raw('sum(duration) as total_time, weekday(end_time) as wkday'))
    	->whereRaw(DB::raw("end_time>=concat(date_add('2020-04-03', interval -weekday('2020-04-03') day), ' 00:00:00') and end_time <=concat(date_add('2020-04-03', interval 6-weekday('2020-04-03') day), ' 00:00:00')"))
    	->groupBy(DB::raw("weekday(end_time)"));
    }

}
