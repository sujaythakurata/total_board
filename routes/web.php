<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
//dd(app()->make("CurrentbatchStatus")->GetStatus());
Route::get('/', "login@index")->middleware('login');
Route::post('/login', "login@loginprocess");
Route::get('/dashboard', "Dashboard@index")->middleware("check");
Route::get('/machine/{id}', "Machine@index")->middleware("check");
Route::get('/settings', "Settings@index")->middleware("check");


