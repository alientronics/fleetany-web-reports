@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Sensors")}}</span>

@stop

@include('fleetany-web-reports::reports.filters.tires.sensors')

@section('content')

<div class="mdl-grid demo-content">

	@include('reports.gridview', [
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'reports-tires-sensors',
         	'sortFilters' => [
                ["class" => "", "name" => "sensor-number", "lang" => "webreports.sensorNumber"], 
                ["class" => "", "name" => "number", "lang" => "webreports.number"], 
                ["class" => "", "name" => "fleet-number", "lang" => "webreports.fleetNumber"], 
                ["class" => "", "name" => "plate", "lang" => "webreports.plate"], 
                ["class" => "", "name" => "position", "lang" => "webreports.position"], 
                ["class" => "", "name" => "activation-date", "lang" => "webreports.activationDate"],
                ["class" => "", "name" => "last-update-datetime", "lang" => "webreports.lastUpdateDatetime"],
                ["class" => "", "name" => "number-of-alerts", "lang" => "webreports.numberOfAlerts"], 
                ["class" => "", "name" => "cost", "lang" => "webreports.purchaseCost"], 
    		] 
    	]
    ])
	
</div>

@stop   