<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/reports/alerts/vehicles', '\App\Http\Controllers\VehicleController@index');
Route::get('/reports/alerts/tires', '\App\Http\Controllers\TireController@index');
Route::get('/reports/alerts/{entity_type}/{entity_id}', '\Alientronics\FleetanyWebReports\Controllers\ReportController@alertsReport');
Route::get('/reports/alerts/{entity_type}/{entity_id}/type/{alert_type}', '\Alientronics\FleetanyWebReports\Controllers\ReportController@alertTypeReport');
Route::get('/reports/history/vehicles', '\App\Http\Controllers\VehicleController@index');
