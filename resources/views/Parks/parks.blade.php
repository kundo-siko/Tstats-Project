@php
$title = "Add National Park";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below fields you can use to add a national park. Please fil in each field correctly.</p>
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
      <h4 class="mb-3">Add National Park</h4>
      <form class="needs-validation" novalidate  method="POST" action="create_park">
        @csrf
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		
          <div class="mb-3">
            <label for="name">Park Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="National Park Name" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
			 <div class="mb-3 form-group">
         <label for="category">Park Category</label>	
			<select class="form-control" id="category" name="category">
			  <option>Select Category</option>
			  <option value="Category A" >Category A</option>
			  <option value="Category B" >Category B</option>
			  <option value="Category C"  >Category C</option>
			  <option value="Category D"  >Category D</option>
			</select>
		</div>
		
			<hr class="mb-4">
			
			 <div class="mb-3">
            <label for="province">Province</label>
            <select class="form-control"  name="province">
			  <option>Choose Province</option>
			  @include('Lists.provinces')
			</select>			
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div> 
		  
			<hr class="mb-4">
			<h5>Park Entry Fees</h5>
			
		 <div class="mb-3">
            <label for="citizens">Citizens (ZK)</label>
            <input type="number" step="0.01" class="form-control" id="citizens" name="citizens" placeholder="ZK" value="" required>
            <div class="invalid-feedback">
              Valid Figure is required.
            </div>
          </div>
        
       	<div class="mb-3">
            <label for="sadc">Residents/SADC Nationals (USD)</label>
            <input type="number" step="0.01" class="form-control" id="sadc" name="sadc" placeholder="USD" value="" required>
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
		  
		  <h5 class="card-subtitle mb-2 text-muted">If Applicable</h5>
		  
		  <div class="mb-3">
            <label for="self_drivers">Self Drives (Residents/Non-Residents) (USD)</label>
            <input type="number" step="0.01" class="form-control" id="self_drivers" name="self_drivers" placeholder="USD" value="">
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