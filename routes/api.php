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
Route::get('oee', 'OEEController@GetOeeDetails');
Route::post('dtreason', 'DownTimeReason@dtreason');
