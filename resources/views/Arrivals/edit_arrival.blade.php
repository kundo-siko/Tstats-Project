@php
$title = "Edit Arrival";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
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
      <h4 class="mb-3">Edit Tourist Arrival Details</h4>
			@if(url()->current()!='http://127.0.0.1:8000/edit_my_arrival_details') 
      <form class="needs-validation" novalidate method="POST" action="post_edit_arrival">  <!-- Return to Arrivals -->
			@else
      <form class="needs-validation" novalidate method="POST" action="post_my_edit_arrival"> <!-- Return to Arrivals by User -->
			@endif
        @csrf
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ $arrival[0]->employee_no }}" hidden>
		 <input type="text" class="form-control" id="id" name="id" value="{{ $arrival[0]->id }}" hidden>
		
		
		 <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="{{ $arrival[0]->number }}" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

		<div class="row">
    <div class="col-md-6 order-md-2">
		
          <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality" required>
					<option>Choose Nationality</option>
					  @include('Lists.countries_edit')
					</select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
		    </div>
		  <div class="col-md-6 order-md-2">
		  
          <div class="mb-3">
            <label for="continent">Region/Continent</label>
                       <input type="text" class="form-control" id="memo" name="continent" placeholder="Region" value="{{ $arrival[0]->continent }}" readonly>
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
			  <option @if( $arrival[0]->point == $po->name )selected @endif >{{ $po->name }}</option>
			  @endforeach
			</select>
		</div>
		
		</div>
		<div class="col-md-8 order-md-2">
		
		
			<div id="txtHint">If you wish to edit this part, please select another point of enrty
			
			
			<div class="col-md-8 order-md-2">
		<div class="mb-3">
            <label for="point_region">Region</label>
            <input type="text" class="form-control" id="point_region" name="point_region" value="{{ $arrival[0]->point_region }}" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          </div>
		  <div class="col-md-8 order-md-2">
		<div class="mb-3">
            <label for="point_type">Type</label>
            <input type="text" class="form-control" id="point_type" name="point_type" value="{{ $arrival[0]->point_type }}" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          </div>		
			
			
			</div>
			
			
		</div>
		</div>
		
		<hr class="mb-4">
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month" name="month">
			  <option>Select Month</option>
			  <option value="January" @if( $arrival[0]->month == "January" )selected @endif >January</option>
			  <option value="Febuary" @if( $arrival[0]->month == "Febuary" )selected @endif >Febuary</option>
			  <option value="March" @if( $arrival[0]->month == "March")selected @endif >March</option>
			  <option value="April" @if( $arrival[0]->month == "April" )selected @endif >April</option>
			  <option value="May" @if( $arrival[0]->month == "May" )selected @endif >May</option>
			  <option value="June" @if( $arrival[0]->month == "June" )selected @endif >June</option>
			  <option value="July" @if( $arrival[0]->month == "July" )selected @endif >July</option>
			  <option value="August" @if( $arrival[0]->month == "August" )selected @endif >August</option>
			  <option value="September" @if( $arrival[0]->month == "September" )selected @endif >September</option>
			  <option value="October" @if( $arrival[0]->month == "October" )selected @endif >October</option>
			  <option value="November" @if( $arrival[0]->month == "November" )selected @endif >November</option>
			  <option value="December" @if( $arrival[0]->month == "December" )selected @endif >December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="year">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>		 
			 
			<select class="form-control" id="year" name="year">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>" @if($arrival[0]->year == $year )selected @endif ><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>
	   
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>

@endsection