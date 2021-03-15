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

//Route::get('/', function () {
//    return view('welcome');
//});

Route::get('/{filter?}','App\Http\Controllers\HomeController@index');
Route::get('/employee/index','App\Http\Controllers\EmployeeController@index');
Route::post('/employee/store','App\Http\Controllers\EmployeeController@store');
Route::get('/employee/edit/{id}','App\Http\Controllers\EmployeeController@edit');
Route::put('/employee/edit/{id}','App\Http\Controllers\EmployeeController@update');
Route::delete('/employee/delete/{id}','App\Http\Controllers\EmployeeController@delete');



