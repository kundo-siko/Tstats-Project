@php
$title = "Add Special Tourist";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below fields you can use to add a Special Tourist. Please fil in each field correctly. <a href="{{ url('view_special') }}">View Special Tourist Types</a></p>
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
      <h4 class="mb-3">Add Special Tourist Type</h4>
      <form class="needs-validation" novalidate  method="POST" action="create_special">
        @csrf
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		
          <div class="mb-3">
            <label for="name">Point Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Point of Entry Name" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		
		  
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
@endsection