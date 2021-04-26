@php
$title = "Add Museum Visit";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are fields you an use to add tourist visiting museums. Please fill in all the fields correctly.</p>
  </div>

  <div class="row">

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">Museum Visit Details</h4>
      <form class="needs-validation" novalidate method="POST" action="add_museum_visit">
        @csrf
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="{{ Auth::user()->employee_no }}" hidden>
		 <input type="text" class="form-control" id="id" name="id" value="x" hidden>
		
          <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  
		  <hr class="mb-4">
		  
		  <div class="row">
			 <h6 class="card-subtitle mb-2 text-muted">Note: Visitors under the age of 18 pay 50% of the entry fees into any Museum. Specify if:</h6>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="Below" checked>
					  <label class="form-check-label" for="gridRadios1">
						Tourists Are Below 18
					  </label>
					</div>
				</div>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="Above" >
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
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality"  value="" required>
					<option>Choose Nationality</option>
					<option>Foreign/Unspecified</option>
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
		
		 @include('Museums.pick')
		
		<hr class="mb-4">
		 
		
		<div class="row">
		
		 <div class="col-md-6 order-md-2">
		<div class="mb-3">
            <label for="location">Name of Museum</label>
            <select class="form-control"  name="museum" onchange="showCustomer(this.value)">
			  <option>Choose Museum</option>
			  @foreach($museums as $m)
			  <option>{{ $m->name }}</option>
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