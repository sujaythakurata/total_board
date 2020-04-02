<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Batch;

class ActiveBatchController extends Controller
{

    public function Getdetails()
    {
    	$data = Batch::ActiveBatchDetails()->get();
    	// $temp= json_decode($data[0], true);
    	// $total_bottle = $data[0]['no_of_bottle']*$data[0]['batch_qty'];
    	// $temp["total_bottle"] = $total_bottle;
    	// $temp = json_encode($temp);
    	return Response($data, 200)->header("Content-Type", 'application/json');
    }
    public function Getstatus()
    {
    	$status = Batch::BatchStatus()->get();
    	return response($status, 200);
    }


}
