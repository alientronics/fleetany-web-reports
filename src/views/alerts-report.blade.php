@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Alerts")}}</span>

@stop

@section('content')

<div class="mdl-grid demo-content">

	@include('includes.gridview', [
    	'filters' => ['sort_url' => ['id' => '', 'created_at' => '', 'status' => '', 'name' => '', 'vehicle' => '', 'position' => '']],
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => 'alerts-report',
         	'sortFilters' => [
                ["class" => "mdl-cell--2-col", "name" => "status", "lang" => "webreports.status"], 
                ["class" => "mdl-cell--2-col", "name" => "name", "lang" => "webreports.alertType"], 
                ["class" => "mdl-cell--2-col", "name" => "created_at", "lang" => "webreports.datetime"], 
                ["class" => "mdl-cell--2-col", "name" => "vehicle", "lang" => "webreports.vehicle"], 
                ["class" => "mdl-cell--2-col", "name" => "position", "lang" => "webreports.position"], 
    		] 
    	]
    ])
    
</div>

@stop   