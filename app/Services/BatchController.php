<?php

namespace App\Services;

use Illuminate\Http\Request;
use App\Models\Batch;

class BatchController
{

    public function Getdetails()
    {
    	$data = Batch::ActiveBatchDetails()->get();
    	return $data;
    }

}
