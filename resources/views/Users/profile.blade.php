  @php
$title = "View Profile";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is your profile, which shows your details and amounts of data you have entered into the system.</p>
  </div>

<!-- Error/Success Check -->
	<div class="col-md-12 order-md-1">
		@if(count($errors) > 0)
			<div class="alert alert-danger">
				<ul>
					@foreach($errors->all() as $error)
						<li>{{$error}}</li>
					@endforeach
				</ul>
			</div>
			@endif
	</div>
		
		<!-- Success Check -->
	<div class="col-md-12 order-md-1">
		@if(\Session::has('success'))
			<div class="alert alert-success">
				<p>{{ \Session::get('success') }}</p>
			</div>
			@endif
	</div>
  <!-- Error/Success Check -->
  <!-- Danger Check -->
	<div class="col-md-12 order-md-1">
		@if(\Session::has('danger'))
			<div class="alert alert-danger">
				<p>{{ \Session::get('danger') }}</p>
			</div>
			@endif
	</div>
  <!-- Danger Check -->

<div class="row">
		<div class="col-md-8">

<div class="card">
  <div class="card-body">
	<h4 class="card-title">User Profile</h4>
    <h6 class="card-subtitle mb-2 text-muted">View your user details</h6>
	<hr class="mb-4">
	<div class="row">
		<div class="col-sm-3">
		<h6>Empoyee #:</h6>
		</div>
		<div class="col-sm-9">
		<h6>{{ $user->employee_no }}</h6>
		</div>
		<div class="col-sm-3">
		<h6>Position:</h6>
		</div>
		<div class="col-sm-9">
		<h6>{{ $user->position }}</h6>
		</div>
		<div class="col-sm-3">
		<h6>Role:</h6>
		</div>
		<div class="col-sm-9">
		<h6>{{ $user->role }}</h6>
		</div>
	</div>    
	
	<hr class="mb-4">
	<h5 class="card-subtitle mb-2 text-muted">Overview</h5>
	
	<div class="row">
		<div class="col-sm-5">
			<h6>Points Created:</h6>
		</div>
			<div class="col-sm-7">
				<h6>{{ $points }}</h6>
			</div>
		<div class="col-sm-5">
			<h6>Arrivals Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $arrivals }}</h6>
			</div>
		<div class="col-sm-5">
			<h6>Departures Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $departures }}</h6>
			</div>
	</div>
		<hr class="mb-4">
	<div class="row">
		<div class="col-sm-5">
			<h6>Parks Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $parks }}</h6>
			</div>
		<div class="col-sm-5">
			<h6>Park Visits Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $park_visits }}</h6>
			</div>		
	</div>
	
	<hr class="mb-4">
	<div class="row">
		<div class="col-sm-5">
			<h6>Museums Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $museums }}</h6>
			</div>
		<div class="col-sm-5">
			<h6>Museum Visits Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $museum_visits }}</h6>
			</div>		
	</div>
	
	<hr class="mb-4">
	<div class="row">
		<div class="col-sm-5">
			<h6>Heritage Sites Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $sites }}</h6>
			</div>
		<div class="col-sm-5">
			<h6>Heritage Site Visits Added:</h6>
		</div>
			<div class="col-sm-7">
			<h6>{{ $site_visits }}</h6>
			</div>		
	</div>
	
	<hr class="mb-4">
	<div class="row">
		<div class="col-sm-2">
	<form class="needs-validation" novalidate  method="POST" action="edit_user">
											@csrf
								<input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" hidden>
	<button type="submit" class="btn btn-sm btn-outline-warning">Edit <span data-feather="edit"></span></button> 
	</form>
	</div>
		<div class="col-sm-9">
	<form class="needs-validation" novalidate  method="POST" action="reset_password">
											@csrf
									<input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" hidden>
									<input type="text" class="form-control" id="status" name="status" value="1" hidden>
	<button type="submit" class="btn btn-sm btn-outline-primary">Change Password <span data-feather="lock"></span></button> 
	</form>
	</div>
	</div>
  </div>
</div>

</div>
</div>

@endsection