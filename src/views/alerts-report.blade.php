@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Alerts")}}</span>

@stop

@section('content')

<div class="mdl-grid demo-content">

	@include('includes.gridview', [
    	'filters' => ['vehicle_id' => $vehicle_id, 'sort_url' => ['id' => '', 'created_at' => '', 'status' => '']],
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'alerts-report',
         	'sortFilters' => [
                ["class" => "mdl-cell--6-col", "name" => "created_at", "lang" => "webreports.datetime"], 
                ["class" => "mdl-cell--3-col", "name" => "status", "lang" => "webreports.status"], 
    		] 
    	]
    ])
	
</div>

@stop   