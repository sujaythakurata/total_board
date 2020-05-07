<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Production;
use App\Models\Batch;
use App\Models\downtime;
use App\Models\mlinespeed;
use App\Models\Shift;
class OEEController extends Controller
{
    public function GetOeeDetails()
    {
        ///get the running batch details
    	$batch_details = Batch::ActiveBatchDetails()->get();

        if(count($batch_details)>0)
        {       
            ///set default time zone now is dubai
            $timezone = timezone_name_from_abbr("", (240*60), false);
            date_default_timezone_set($timezone);

            $datetime = strtotime(date('H:i:s'));//current time

            //get shift details
            $shifdetails = shift::GetDetails()->get();
            $row = count($shifdetails);

            $shift = array();//store the curent shift start and end time
            $id = 0;//store the shift id

            $t = new \App\Services\datetimechecker();//to get the start and end date


            //to get the shift id start time and end time
            for ($i=0; $i < $row; $i++) {

                    $start = $shifdetails[$i]['start_time']; //shift start time
                    $end = $shifdetails[$i]['end_time']; //shift end time

                    if($datetime>=strtotime($start)){

                        if($datetime<=strtotime($end)){
                            //if time within the current day
                            $shift = $t->check(date('y-m-d'), $start, $end);
                            $id = $shifdetails[$i]["shift_id"];
                            break;
                        }else{
                            if(strtotime($start)-strtotime($end)>0){
                                //if time within the current day
                                $shift = $t->check(date('y-m-d'), $start, $end);
                                $id = $shifdetails[$i]["shift_id"];
                                break;
                            }
                        }
                    }else{
                            if(strtotime($start)-strtotime($end)>0){
                                //time after 12 am means new day start
                                $shift = $t->checkpre(date('y-m-d'), $start, $end);
                                $id = $shifdetails[$i]["shift_id"];
                                break;
                            }
                    }

                }
            
            if(count($shift)>0){
        
                ///the current time
                $end = $shift[0];
        
                ///get the end time current time
                $start = date('y-m-d H:i:s');

                //duration here hours wise
                $duration = round((strtotime($start)-strtotime($end))/60);
        
                ///get produced carton between shift
                $data = Production::
                Getcarton(
                    $batch_details[0]['batch_id'],
                    11,$start,$end)->get();
        
                ///get the downtime beteen shift
                $dt = downtime::Getdowntime($shift[0], $shift[1])->get();
                $dt = round($dt[0]['shift_down_time']/60);

                $data[0]['downtime'] = $dt;
        
                //store start date and end date
                $data[0]['duration'] = $duration;

                ///get line speed
                $speed = mlinespeed::getspeed(11)->get();

                ///calculate oee
                $oee = app()->make('OEEcalculation')
                ->calculate((int)$duration, (int)$dt, (int)$data[0]['carton_produced'], $speed[0]['speed']);

                $data[0]['carton_produced'] = 
                $data[0]['carton_produced']==Null?0:
                $data[0]['carton_produced'];

                //store the oee
                $data[0]["availability"]=$oee["availability"];
                $data[0]["performance"]=$oee["performance"];
                $data[0]["operation_time"]=
                $oee["operating_time"];
                $data[0]['available_time']
                =$oee['available_time'];
                $data[0]["operation_target"]=
                $oee["operating_target"];
                $data[0]["oee"]=$oee["oee"];
        
                ///return the response
                return $data;
            }
            else{
                $data[0]['carton_produced'] = 0;
                $data[0]['downtime'] = 0;
                $data[0]['duration'] = 0;
                $data[0]["availability"]=0;
                $data[0]["performance"]=0;
                $data[0]["operation_time"]=0;
                $data[0]['available_time']=0;
                $data[0]["operation_target"]=0;
                $data[0]["oee"]=0;
                return $data;
            }

            }

        else{
            return response(0, 200);
        }

    }


    public function shift($m_id)
    {
        $running_batch = Batch::ActiveBatchDetails()->get();
        if(count($running_batch)>0)
        {///set default time zone now is india
            $timezone = timezone_name_from_abbr("", (4*60*60), false);
                date_default_timezone_set($timezone);

            $datetime = strtotime(date('H:i:s'));//current time

            //get shift details
            $shifdetails = shift::GetDetails()->get();
            $row = count($shifdetails);

            $shift = array();//store the curent shift start and end time
            $id = 0;//store the shift id

            $t = new \App\Services\datetimechecker();//to get the start and end date


            //to get the shift id start time and end time
            for ($i=0; $i < $row; $i++) {

                    $start = $shifdetails[$i]['start_time']; //shift start time
                    $end = $shifdetails[$i]['end_time']; //shift end time

                    if($datetime>=strtotime($start)){

                        if($datetime<=strtotime($end)){
                            //if time within the current day
                            $shift = $t->check(date('y-m-d'), $start, $end);
                            $id = $shifdetails[$i]["shift_id"];
                            break;
                        }else{
                            if(strtotime($start)-strtotime($end)>0){
                                //if time within the current day
                                $shift = $t->check(date('y-m-d'), $start, $end);
                                $id = $shifdetails[$i]["shift_id"];
                                break;
                            }
                        }
                    }else{
                            if(strtotime($start)-strtotime($end)>0){
                                //time after 12 am means new day start
                                $shift = $t->checkpre(date('y-m-d'), $start, $end);
                                $id = $shifdetails[$i]["shift_id"];
                                break;
                            }
                    }

                }
            
            
            if(count($shift)>0){
                ///the current time
                $start = date('y-m-d H:i:s');
        
                ///get the end time 1 hour ago
                $end = $shift[0];

                //duration here hours wise
                $duration = round((strtotime($start)-strtotime($end))/60);
                        

                ///get produced carton between every 1 hour
                $data = Production::
                Getcarton($running_batch[0]['batch_id'],$m_id,$start, $end)
                ->get();
        
                //////calculte total bottel produced
                $total_bottles = 
                $data[0]['carton_produced'];//*$running_batch[0]['no_of_bottle'];

                $data[0]['total_bottles'] = $total_bottles;
        
                ///get the downtime beteen this 1 hour
                $dt = downtime::Getdowntimemachinewise($start, $end, $m_id)->get();
                $dt = round($dt[0]['shift_down_time']/60);
        
                $data[0]['dt'] = $dt;
        
                //store start date and end date
        
                $data[0]['start'] = $start;
                $data[0]['end'] = $end;
                $data[0]['start_date'] = $running_batch[0]['batch_start_time'];
                $data[0]['duration'] = $duration;

                //get line speed
                $speed = mlinespeed::getspeed($m_id)->get();

                ///calculate oee
                $oee = app()->make('OEEcalculation')
                ->calculate((int)$duration, (int)$dt, (int)$total_bottles, $speed[0]['speed']);
                

                //store the oee
                $data[0]["oee"] = $oee["oee"];
                //store the performance
                $data[0]['performance']= $oee["performance"];
                //store the availability
                $data[0]['availability']= $oee["availability"];
        
                $res = array(
                    "availability"=>$oee["availability"],
                    "performance"=>$oee["performance"],
                    "operation_time"=>$oee["operating_time"],
                    'available_time'=>$oee['available_time'],
                    "downtime"=>$dt,
                    "operation_target"=>$oee["operating_target"],
                    "machine_count"=>$total_bottles,
                    "oee"=>$oee["oee"]
                );
        
                ///return the response
                print_r($res);

            }
            else{
                $res = array(
                    "availability"=>0,
                    "performance"=>0,
                    "operation_time"=>0,
                    'available_time'=>0,
                    "downtime"=>0,
                    "operation_target"=>0,
                    "machine_count"=>0,
                    "oee"=>0
                );
        
                ///return the response
                print_r($res);
            }

        }
        else{
            return 0.0;
        }

    }

    



    
}
