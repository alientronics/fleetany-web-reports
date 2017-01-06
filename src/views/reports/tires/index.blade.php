@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Tires")}}</span>

@stop

@include('fleetany-web-reports::reports.filters.tires.index')

@section('content')

<div class="mdl-grid demo-content">

	@include('reports.gridview', [
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'reports-tires',
         	'sortFilters' => [
                ["class" => "", "name" => "number", "lang" => "webreports.number"], 
                ["class" => "", "name" => "sensor-number", "lang" => "webreports.sensorNumber"], 
                ["class" => "", "name" => "fleet-number", "lang" => "webreports.fleetNumber"], 
                ["class" => "", "name" => "plate", "lang" => "webreports.plate"], 
                ["class" => "", "name" => "position", "lang" => "webreports.position"], 
                ["class" => "", "name" => "lifecycle", "lang" => "webreports.lifecycle"], 
                ["class" => "", "name" => "number-of-alerts", "lang" => "webreports.numberOfAlerts"], 
                ["class" => "", "name" => "number-of-maintenances", "lang" => "webreports.numberOfMaintenances"],
                ["class" => "", "name" => "cost", "lang" => "webreports.purchaseCost", "mask" => "money"], 
    		] 
    	]
    ])
    
</div>

@stop   