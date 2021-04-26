@php
$title = "Edit Museum Visit";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are fields you an use to edit tourist visiting museums. Please fill in all the fields correctly.</p>
  </div>

  <div class="row">

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">Museum Visit Details</h4>
      <form class="needs-validation" novalidate method="POST" action="add_museum_visit">
        @csrf
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ $museum_visit[0]->employee_no }}" hidden>
		 <input type="text" class="form-control" id="id" name="id" value="{{ $museum_visit[0]->id }}" hidden>
		
          <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="{{ $museum_visit[0]->number }}" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  
		  <hr class="mb-4">
		  
		  <div class="row">
			 <h6 class="card-subtitle mb-2 text-muted">Note: Visitors under the age of 18 pay 50% of the entry fees into any Museum. Specify if:</h6>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="Below" @if( $museum_visit[0]->age == "Below" )checked @endif >
					  <label class="form-check-label" for="gridRadios1">
						Tourists Are Below 18
					  </label>
					</div>
				</div>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="Above" @if( $museum_visit[0]->age == "Above" )checked @endif >
					  <label class="form-check-label" for="gridRadios1">
						Tourists Are Above 18
					  </label>
					</div>
				</div>
			</div>
		
		<hr class="mb-4">
		  <div class="row">
    <div class="col-md-6 order-md-2">
		  <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality"  value="{" required>
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
                       <input type="text" class="form-control" id="memo" name="continent" placeholder="Region" value="" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
		</div>
		</div>
		
		 @include('Museums.pick')
		
		<hr class="mb-4">
		 
		
		<div class="row">
		
		 <div class="col-md-6 order-md-2">
		<div class="mb-3">
            <label for="location">Name of Museum</label>
            <select class="form-control"  name="museum" onchange="showCustomer(this.value)">
			  <option>Choose Museum</option>
			  @foreach($museums as $m)
			  <option value="{{ $m->name }}" @if( $museum_visit[0]->museum == $m->name )selected @endif >{{ $m->name }}</option>
			  @endforeach
			</select>			
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div> 
          </div> 
		  
		<div class="col-md-6 order-md-2">
		
			<div id="txtHint">Select a Museum</div>
				<h6 class="card-subtitle mb-2 text-muted">Note: Prices calculated when a museum chosen</h6>
			
		</div>
		</div>
		
		<hr class="mb-4"> 
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month" name="month">
			  <option>Select Month</option>
			  <option value="January" @if($departure[0]->month == "January" )selected @endif >January</option>
			  <option value="Febuary" @if($departure[0]->month == "Febuary" )selected @endif >Febuary</option>
			  <option value="March" @if($departure[0]->month == "March")selected @endif >March</option>
			  <option value="April" @if($departure[0]->month == "April" )selected @endif >April</option>
			  <option value="May" @if($departure[0]->month == "May" )selected @endif >May</option>
			  <option value="June" @if($departure[0]->month == "June" )selected @endif >June</option>
			  <option value="July" @if($departure[0]->month == "July" )selected @endif >July</option>
			  <option value="August" @if($departure[0]->month == "August" )selected @endif >August</option>
			  <option value="September" @if($departure[0]->month == "September" )selected @endif >September</option>
			  <option value="October" @if($departure[0]->month == "October" )selected @endif >October</option>
			  <option value="November" @if($departure[0]->month == "November" )selected @endif >November</option>
			  <option value="December" @if($departure[0]->month == "December" )selected @endif >December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="year">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>		 
			 
			<select class="form-control" id="year" name="year">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>" @if($departure[0]->year == $year )selected @endif ><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>       
        	
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>




@endsection