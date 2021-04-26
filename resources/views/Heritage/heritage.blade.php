@php
$title = "Add Heritage Site";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below fields you can use to add a Heritage Site. Please fill in each field correctly.</p>
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
  
  <div class="row">

    <div class="col-md-10 order-md-1">
      <h4 class="mb-3">Add Heritage Site</h4>
      <form class="needs-validation" novalidate  method="POST" action="create_heritage">
        @csrf
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Heritage Site Name" value="" required>
            <div class="invalid-feedback">
              Valid name is required.
            </div>
          </div> 
		  
		  <div class="mb-3">
            <label for="province">Province</label>
            <select class="form-control"  name="province">
			  <option>Choose Province</option>
			  @include('Lists.provinces')
			</select>			
            <div class="invalid-feedback">
              Valid Province is required.
            </div>
          </div> 
		  
        <hr class="mb-4">
		
		 <div class="mb-3">
            <label for="domestic">Citizens/Domestic (ZK)</label>
            <input type="number" step="0.01" class="form-control" id="domestic" name="domestic" placeholder="ZK" value="" required>
            <div class="invalid-feedback">
              Valid Figure is required.
            </div>
          </div>
        
		<div class="mb-3">
            <label for="international">International (USD)</label>
            <input type="number" step="0.01" class="form-control" id="international" name="international" placeholder="USD" value="" required>
            <div class="invalid-feedback">
              Valid Figure is required.
            </div>
          </div>
        
		
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
@endsection