<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class downtime_alert extends Model
{
    protected $table = 'downtime_alert';
    public $timestamps = false;

    public function scopeupdatealert($query, $m_index, $cause)
    {
    	$query
    	->where('machine_index', $m_index)
    	->orderBy('start_time', 'desc')
    	->limit(1)
    	->update(['stop_reson'=>$cause]);
    }
}
