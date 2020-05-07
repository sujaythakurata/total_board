<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class downtime_alert extends Model
{
    protected $table = 'downtime_alert';
    public $timestamps = false;

    public function scopeupdatealert($query, $id,$m_index, $cause, $sc)
    {
        $query
        ->where([['downtime_alert_id', "=", $id],
            ['machine_index', "=", $m_index]])
        ->limit(1)
        ->update(['stop_reason'=>$cause], ['sc'=>$sc]);
    }

    //get reason

    public function scopegetreason($query,$start, $end,$m_id)
    {
        DB::statement("SET SESSION sql_mode = ''");
        $query
        ->join('down_time', 'down_time.machine_index', '=',
            "downtime_alert.machine_index")
        ->select(DB::raw('count(downtime_alert.start_time) as frequency, stop_reason, sum(down_time.duration) as total_dt'))
        ->where([['downtime_alert.start_time', ">=", $start],
            ["downtime_alert.start_time", "<=", $end],
            ['downtime_alert.machine_index', "=", $m_id]
        ])
        ->groupBy('stop_reason')
        ->orderBy('total_dt', 'desc');
    }

    //get top reason
    public function scopegettopreason($query,$start, $end)
    {
        DB::statement("SET SESSION sql_mode = ''");
        $query
        ->join('down_time', 'down_time.machine_index', '=',
            "downtime_alert.machine_index")
        ->select(DB::raw('count(downtime_alert.start_time) as frequency, stop_reason, sum(down_time.duration) as total_dt'))
        ->where([['downtime_alert.start_time', ">=", $start],
            ["downtime_alert.start_time", "<=", $end]
        ])
        ->groupBy('stop_reason')
        ->orderBy('total_dt', 'desc');
    }

    public function scopegetalert($query)
    {
        $query
        ->select('downtime_alert_id','start_time', 'machine_index', 'device_id')
        ->where('stop_reason', "=", '');
    }


}
