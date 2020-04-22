<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Batch extends Model
{
    protected $table = "batch_details";
    public $timestamps = false;

    public function scopeActiveBatchDetails($query)
    {
    	return $query->join('product_list', 'batch_details.product_id', '=', 'product_list.product_id')
    	->where('batch_status', 1);
    }
    public function scopeBatchStatus($query){
    	return $query->select('batch_id', "batch_no")->where('batch_status',1);
    }

    //store the new batch

    public function scopestore(
    	$query,
		$batch_no,
		$batch_qty,
		$batch_carton,
		$batch_status,
		$product
    )
    {
    	$query
    	->insert([
    		"batch_no"=>$batch_no,
    		"batch_qty"=>$batch_qty,
    		"batch_carton"=>$batch_carton,
    		"batch_status"=>$batch_status,
    		"product_id"=>$product
    	]);
    }

    //get current date batch
    public function scopegetcurrentbatch($query)
    {
    	$query
    	->join("product_list", [['batch_details.product_id', "=", 'product_list.product_id']])
    	->select(
    		"batch_details.batch_no",
    		"batch_details.batch_qty",
    		"batch_details.batch_carton",
    		"batch_details.batch_status",
    		"batch_details.batch_start_time",
    		"batch_details.last_edited",
    		"batch_details.created_time",
    		"product_list.product_name",
    		"product_list.no_of_bottle",
    		"product_list.liters"
    	)
    	->whereRaw('batch_details.created_time>=curdate()');
    }


    //start a new batch

    public function scopestartbatch($query, $batch_no)
    {
    	//set default time zone now is IST
    	$timezone = timezone_name_from_abbr("", (330*60), false);
		date_default_timezone_set($timezone);
    	$query
    	->where("batch_no", $batch_no)
    	->update(["batch_status"=>1,
    			"batch_start_time"=>date('y-m-d H:i:s')]);
    }

    //stop a batch
    public function scopestopbatch($query, $batch_no)
    {
    	$query
    	->where("batch_no", $batch_no)
    	->update(["batch_status"=>2]);
    }

    //get batch details date wise
    public function scopegetlist($query, $start, $end)
    {
        $query
        ->join("product_list", [['batch_details.product_id', "=", 'product_list.product_id']])
        ->select(
            "batch_details.batch_no",
            "batch_details.batch_qty",
            "batch_details.batch_carton",
            "batch_details.batch_status",
            "batch_details.batch_start_time",
            "batch_details.last_edited",
            "batch_details.created_time",
            "product_list.product_name",
            "product_list.no_of_bottle",
            "product_list.liters"
        )
        ->where([
            ['batch_details.created_time', '>', $start],
            ['batch_details.created_time', '<', $end]
        ]);
    }

}
