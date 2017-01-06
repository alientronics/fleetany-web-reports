@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Vehicles")}}</span>

@stop

@include('fleetany-web-reports::reports.filters.vehicles.index')

@section('content')

<div class="mdl-grid demo-content">

	@include('reports.gridview', [
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'reports-vehicles',
         	'sortFilters' => [
                ["class" => "", "name" => "fleet-number", "lang" => "webreports.fleetNumber"], 
                ["class" => "", "name" => "plate", "lang" => "webreports.plate"], 
                ["class" => "", "name" => "vendor", "lang" => "webreports.vendor"],
                ["class" => "", "name" => "model", "lang" => "webreports.model"], 
                ["class" => "", "name" => "year", "lang" => "webreports.year"],
                ["class" => "", "name" => "number-of-tires", "lang" => "webreports.numberOfTires"],
                ["class" => "", "name" => "number-of-sensors", "lang" => "webreports.numberOfSensors"], 
                ["class" => "", "name" => "number-of-alerts", "lang" => "webreports.numberOfAlerts"], 
                ["class" => "", "name" => "number-of-maintenances", "lang" => "webreports.numberOfMaintenances"], 
                ["class" => "", "name" => "number-of-active-alerts", "lang" => "webreports.numberOfActiveAlerts"], 
    		] 
    	]
    ])

</div>

@stop   