@php
$title = "Home";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')


 @if(Auth::user()->status != '1')
  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Your profile has been temporarily suspended. Contact the Administrator.</p>
  </div>
 @endif
 
 @if(Auth::user()->status == '1')
  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Welcome! Record and Review data on tourist arrivals and departures. Below are actions you can perform on this site. Each gives a brief overview of what it does. Choose an action to begin.</p>
  </div>

 <div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Arrivals</h5>
        <p class="card-text">Add and review tourist arrivals.</p>
        <a href="{{ url('arrivals') }}" class="btn btn-primary">Add Arrival</a>
        <a href="{{ url('view_arrivals') }}" class="btn btn-primary">View Arrivals</a>
			 @if(Auth::user()->role == 'Admin')
        <a href="{{ url('add_special') }}" class="btn btn-primary">Special Tourist Type</a>
			@endif
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Departures</h5>
        <p class="card-text">Add and review tourist departures.</p>
        <a href="{{ url('departures') }}" class="btn btn-primary">Add Departure</a>
        <a href="{{ url('view_departures') }}" class="btn btn-primary">View Departures</a>
      </div>
    </div>
  </div>
  </div>
  
  <hr>
  
   <div class="row">
 <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">National Parks</h5>
        <p class="card-text">Add and review national parks and visits to these parks.</p>
			<div class="btn-group">
			   <a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Parks </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('parks') }}">Add Park</a>
						<a class="dropdown-item" href="{{ url('view_parks') }}">View Parks</a>
					</div>
			</div>
			<div class="btn-group">
				<a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Park Visits </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('add_park_visit') }}">Add Park Visit</a>
						<a class="dropdown-item" href="{{ url('all_park_visits') }}">View Park Visits</a>
					</div>
			</div>		
      </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Museums</h5>
        <p class="card-text">Add and review museums and visits to museums.</p>
		   <div class="btn-group">
			   <a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Museums </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('museums') }}">Add Museum</a>
						<a class="dropdown-item" href="{{ url('view_museums') }}">View Museums</a>
					</div>
			</div>
			<div class="btn-group">
				<a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Museum Visits </a>
					<div class="dropdown-menu">
						<a class="dropdown-item" href="{{ url('museum_visit') }}">Add Museum Visit</a>
						<a class="dropdown-item" href="{{ url('view_museum_visits') }}">View Museum Visits</a>
					</div>
			</div>
	  </div>
    </div>
  </div>
  </div>
  
  <hr>
  
  <div class="row">
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Heritage Sites</h5>
        <p class="card-text">Add and review heritage sites and visits to these sites.</p>
		 <div class="btn-group">
		   <a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Heritage Sites </a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{ url('heritage') }}">Add Site</a>
					<a class="dropdown-item" href="{{ url('view_heritage') }}">View Sites</a>
				</div>
		</div>
		<div class="btn-group">
			<a  class="btn btn-primary dropdown-toggle" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> Heritage Site Visits </a>
				<div class="dropdown-menu">
					<a class="dropdown-item" href="{{ url('heritage_visit') }}">Add Site Visit</a>
					<a class="dropdown-item" href="{{ url('view_heritage_visits') }}">View Site Visits</a>
				</div>
		</div>
	 </div>
    </div>
  </div>
  <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports</h5>
        <p class="card-text">Generate reports on all the records in the system</p>
        <a href="{{ url('reports') }}" class="btn btn-primary">Generate Reports</a>
      </div>
    </div>
  </div>
</div>

 <hr>
  
  <div class="row">
   <div class="col-sm-6">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Profile</h5>
        <p class="card-text">Review your user profile.</p>
        <a href="{{ url('profile') }}" class="btn btn-primary">View Profile</a>
      </div>
    </div>
  </div>
</div>
@endif


@endsection