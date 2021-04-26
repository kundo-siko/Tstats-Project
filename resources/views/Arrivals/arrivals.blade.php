@php
$title = "Add Arrival";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are fields you an use to add tourist arrivals. Please fill in all the fields correctly.</p>
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

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">Tourist Arrival Details</h4>
      <form class="needs-validation" novalidate method="POST" action="create_arrival">
        @csrf
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		
          <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  
		  <div class="row">
    <div class="col-md-6 order-md-2">
		  <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality"  value="" required>
					<option>Choose Nationality</option>
						@foreach($special as $special)
						<option>{{ $special->name }}</option>
						@endforeach					  
					  @include('Lists.countries') 					  
					</select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
		  </div>
		  <div class="col-md-6 order-md-2">
		  
          <div class="mb-3">
            <label for="continent">Region/Continent</label>
                       <input type="text" class="form-control" id="memo" name="continent" placeholder="Region" value="" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
		</div>
		</div>
		
		 @include('Arrivals.trail')
		
		<hr class="mb-4">
		<h6>Point Of Entry</h6>
		
		<div class="row">
    <div class="col-md-4 order-md-2">
		<div class="form-group">
			 <label for="point_of_entry">Name</label>
			<select class="form-control"  name="point" onchange="showCustomer(this.value)">
			  <option>Choose Point of Entry</option>
			  @foreach($points as $po)
			  <option>{{ $po->name }}</option>
			  @endforeach
			</select>
		</div>
		
		</div>
		<div class="col-md-8 order-md-2">
		
		
			<div id="txtHint">Please Select a Point of Enrty</div>
			
			
		</div>
		</div>
		
		<hr class="mb-4"> 
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month" name="month">
			  <option>Select Month</option>
			  <option value="January">January</option>
			  <option value="Febuary">Febuary</option>
			  <option value="March">March</option>
			  <option value="April">April</option>
			  <option value="May">May</option>
			  <option value="June">June</option>
			  <option value="July">July</option>
			  <option value="August">August</option>
			  <option value="September">September</option>
			  <option value="October">October</option>
			  <option value="November">November</option>
			  <option value="December">December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="year">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>		 
			 
			<select class="form-control" id="year" name="year">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>       
        	
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>




@endsection