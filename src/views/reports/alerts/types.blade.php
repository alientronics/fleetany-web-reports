@extends('layouts.default')

@section('header')
      
      <span class="mdl-layout-title">{{Lang::get("webreports.Alerts")}}</span>

@stop

@section('content')

<div class="mdl-grid demo-content">

	@include('includes.gridview', [
    	'filters' => ['sort_url' => ['id' => '', 'name' => '', 'position' => '', 'quantity' => '']],
    	'registers' => $registers,
    	'gridview' => [
    		'pageActive' => $entity_key.'-alerts-types-report',
         	'sortFilters' => [
                ["class" => "mdl-cell--6-col", "name" => "name", "lang" => "webreports.alertType"], 
                ["class" => "mdl-cell--3-col", "name" => "quantity", "lang" => "webreports.quantity"], 
    		] 
    	]
    ])
	
</div>

@stop   