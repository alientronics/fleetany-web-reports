@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.VehiclesMaintenance")}}</span>

@stop

@include('fleetany-web-reports::reports.filters.vehicles.maintenance')

@section('content')

<div class="mdl-grid demo-content">

	@include('reports.gridview', [
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'reports-vehicles-maintenance',
         	'sortFilters' => [
                ["class" => "", "name" => "fleet-number", "lang" => "webreports.fleetNumber"], 
                ["class" => "", "name" => "number", "lang" => "webreports.number"], 
                ["class" => "", "name" => "plate", "lang" => "webreports.plate"], 
                ["class" => "", "name" => "datetime", "lang" => "webreports.dateAndTime"], 
                ["class" => "", "name" => "cost", "lang" => "webreports.cost", "mask" => "money"], 
                ["class" => "", "name" => "maintenance-type", "lang" => "webreports.maintenanceType"], 
    		] 
    	]
    ])
	
</div>

@stop   