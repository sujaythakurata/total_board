<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('batchdetails', 'ActiveBatchController@Getdetails');
Route::get('batchstatus', 'ActiveBatchController@Getstatus');
Route::get('prodstatus', 'ProductionController@Getprodstatus');
Route::get('shiftstatus', 'ShiftProductionController@Getshiftstatus');
Route::get('masterdetails', 'ActiveBatchController@Getmasterdetails');
Route::get('wkwisedt', 'ActiveBatchController@Getwkwisedt');

//get oeee
Route::get('oee', 'OEEController@GetOeeDetails');

//submit dtreason
Route::post('dtreason', 'DownTimeReason@dtreason');

//for app get overview data
Route::get('overview', 'OverView@Getdata');

///use to get the mahcine master details index wise
Route::get('/machine/{id}', "Machine@Getdetails");

///use to get the weekwise shfit downtime and production
Route::get('/machine/wsdd/{id}', "Machine@GetWSDD");

//get machine wise oee
Route::get('/machine/oee/{id}', "Machine@Getoee");

//get machine number of bottels
Route::get('/setting/prod/{id}', "Settings@getdata");

//handel batch update start a new batch
Route::post('/batch/start', "Batch@batchstart");

//handel batch update stop a batch
Route::post('/batch/stop', "Batch@batchstop");

//update machine speed
Route::post('/setting/speed', "Settings@updatespeed");

//get the batch details datewise
Route::post('/setting/batchdetails', "Settings@getlist");

//update the shift
Route::post('/setting/shift', "Settings@updateshift");

//reason handeler machine wise
Route::get('/reason/{id}', "reasonhandeler@handel");
//dashboard top reason
Route::get('/topreason', "reasonhandeler@topreason");

//get machine wise downtime percentage shiftwise
Route::get('/shiftrea', "reasonhandeler@shiftreason");

///get all machine data
Route::get('/machinedata', "machinesnippet@getdata");

///get all machine downtime
Route::get('/machinedata/dt', "machinesnippet@getdowntime");
///get all machine oee
Route::get('/machinedata/oee', "machinesnippet@getoee");