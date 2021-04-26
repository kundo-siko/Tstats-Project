@php
$title = "Reports";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are options you can use to generate reports. Each option will require you select a filter for your report. Choose an option below to generate a report</p>
 </div>
  
<!-- begin reports -->
   <div class="row">

  <div class="col-sm-12">
  <h4 class="mb-3">Reports Generation</h4>
  </div>
  
  <div class="col-sm-12 ">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Arivals and Departures</h5>
			<p class="card-text">Click the button below to generate reports on tourist arrivals and departures.</p>        
			  <a href="{{ url('by_arrivals') }}" class="btn btn-primary" type="button">Select </a>				  			
      </div>
    </div>
  </div>
  
   <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on National Park Visits</h5>
			<p class="card-text">Click the button below to generate reports on national parks and park visits.</p>        
			  <a href="{{ url('by_parks') }}" class="btn btn-primary" type="button">Select </a>				  			
      </div>
    </div>
  </div>
  
  <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Museum Visits</h5>
			<p class="card-text">Click the button below to generate reports on museums and museum visits.</p>        
			 <a href="{{ url('by_museums') }}" class="btn btn-primary" type="button">Select </a>			 			
      </div>
    </div>
  </div>
  
  <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Heritage Site Visits</h5>
			<p class="card-text">Click the button below to generate reports on heritage sites and site visits.</p>        
			  <a href="{{ url('by_heritage') }}" class="btn btn-primary" type="button">Select </a>		
      </div>
    </div>
  </div>
  
  
  </div>
  
  @endsection