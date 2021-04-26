@php
$title = "Add Point Of Entry";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below fields you can use to add a point of entry/exit. Please fil in each field correctly.</p>
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
      <h4 class="mb-3">Add Point Of Entry</h4>
      <form class="needs-validation" novalidate  method="POST" action="create_point">
        @csrf
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		
          <div class="mb-3">
            <label for="name">Point Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Point of Entry Name" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		<div class="mb-3">
            <label for="region">Point Region</label>
            <select class="form-control" id="region" name="region">
			  <option>Choose Point of Entry Region</option>
			  @include('Lists.region')
			</select>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
        		
		<div class="form-group">
			 <label for="type">Point Type</label>
			<select class="form-control" id="type" name="type">
			  <option>Choose Point of Entry Type</option>
			  <option value="Road">Road</option>
			  <option value="Air">Air</option>
			  <option value="Water">Water</option>
			  <option value="Rail">Rail</option>
			</select>
		</div>		
		  
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
@endsection