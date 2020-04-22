<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Productdetails;
use App\Models\Batch;
use App\Models\mlinespeed;
use App\Models\Shift;
use App\Events\getresult;
class Settings extends Controller
{
    public function index(){
    	$list = Productdetails::getlist()->get();
        $data = Batch::getcurrentbatch()->get();
        $machine = mlinespeed::getlist()->get();
        $shift = Shift::all();
    	return view('setting', [
            "product"=>$list, 
            "data"=>$data,
            "machine"=>$machine,
            "shift"=>$shift
        ]);
    }

    public function getdata($id)
    {
    	///get the data
    	$data = Productdetails::getbottel($id)->get();
    	//return response
    	return Response($data, 200)
    	->header("Content-type","application/json");
    }

    ///update the machine line speed
    public function updatespeed(Request $req)
    {
        //get the machine list
       $machine_list = mlinespeed::getlist()->get();
       for($i=0;$i<count($machine_list);$i++){
            if($machine_list[$i]['speed'] != $req[$i]){
                mlinespeed::updatespeed(($i+1), (float)$req[$i])->get();
            }

        }

    }

    //batchdetals datewise
    public function getlist(Request $req)
    {
        $start = $req['date'];
        $end = date('y-m-d', strtotime($start)+(3600*24));
        $data = Batch::getlist($start, $end)->get();
        return Response($data, 200)
        ->header("Content-type", "application/json");
    }


    //update the shift

    public function updateshift(Request $req)
    {
        $start = $req['start'];
        $end = $req['end'];
        $id = $req['id'];
        Shift::updateshift((string)$start, (string)$end, $id)->get();
        

    }

    //add product
    public function addproduct(Request $req)
    {
        $valid = $req->validate([
            'product_name'=>['required', 'String'],
            'no_of_bottle'=>['required', 'gt:0'],
            'liters'=>['required', 'gt:0']
        ]);
        Productdetails::addproduct(
            $valid['product_name'],
            $valid['no_of_bottle'],
            $valid['liters']
        )->get();
        return redirect('/settings');
    }


}
