<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Batch extends Controller
{
    public function create(Request $req)
    {
    	//dd($req);
    	$valid = $req->validate([
    		"batch_no"=>["required", "numeric", "gt:0"],
    		"batch_qty"=>["required", "numeric", "gt:0"],
    		"batch_carton"=>["required", 'gt:0'],
    		"product_id"=>['required']
    	]);
    	app()->make("createbatch")->store($valid);
    	return redirect('/settings');
    }

    //start a new batch
    public function batchstart(Request $req)
    {
        $batch_no = $req['batch_no'];
        $res = app()->make("batchstart")->handel($batch_no);
        return $res;
    }

    //stop a batch
    public function batchstop(Request $req)
    {
        $batch_no = $req['batch_no'];
        $res = app()->make("batchstop")->handel($batch_no);
        return $res;
    }
}
