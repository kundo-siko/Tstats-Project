@php
$title = "Overview";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a system overview showing different aggregates.</p>
 </div>
 
 @php
	$tourist_arrivls = $arrivals->sum('number');
	$tourist_departures = $departures->sum('number');
	
	$point_a = $arrivals->mode('point');	
	$type_a = $arrivals->mode('point_type');
	$month_a = $arrivals->mode('month');
	$year_a = $arrivals->mode('year');
	
	$point_d = $departures->mode('point');	
	$type_d = $departures->mode('point_type');
	$month_d = $departures->mode('month');
	$year_d = $departures->mode('year');
	
	$a = $point_a[0];
	$ta = $type_a[0];
	$ma = $month_a[0];
	$ya = $year_a[0];
	
	$d = $point_d[0];
	$td = $type_d[0];
	$md = $month_d[0];
	$yd = $year_d[0];	
@endphp

 <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Arrivals <span data-feather="users"></span><span data-feather="chevrons-left"></span></h1>
        
      </div>
   
   <div class="row">
		<div class="col-sm-4">
		<h6>Total Arrivals :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $tourist_arrivls }}</h6>
		</div>
		<div class="col-sm-4">
		<h6>Most used entry point :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $a }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most used entry point type :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $ta }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most active month :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $ma }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most active year :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $ya }}</h6>
		</div>
		
	</div>    
	
	
	<div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Departures <span data-feather="users"></span><span data-feather="chevrons-right"></span></h1>
       
      </div>
   
   <div class="row">
		<div class="col-sm-4">
		<h6>Total Departures :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $tourist_departures }}</h6>
		</div>
		<div class="col-sm-4">
		<h6>Most used exit point :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $d }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most used exit point type :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $td }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most active month :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $md }}</h6>
		</div>
		<div class="col-sm-4">
		<h6> Most active year :</h6>
		</div>
		<div class="col-sm-8">
		<h6>{{ $yd }}</h6>
		</div>
		
	</div>    
	
  @endsection