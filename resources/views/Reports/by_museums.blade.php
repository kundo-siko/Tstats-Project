@php
$title = "Reports on Museums";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are options you can use to generate reports. Each option will require you select a filter for your report. Choose an option below to generate a report</p>
 </div>
    
@php
	$park_n = $museums->count();
	$visits_n = $museum_visits->sum('number');
	
	$point_a = $museum_visits->mode('nationality');
	$point_d = $museum_visits->mode('fee_type');
	$a = $point_a[0];
	$ta = $point_d[0];
@endphp

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Overview <a  href="{{ url('overview') }}" class="btn btn-sm btn-outline-secondary"><span data-feather="eye"></span></a></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="mr-2">
            <p><small>
			Total Number of Museums <span data-feather="users"></span>: {{ $park_n }}<br>
            Total Number of Museum Visits <span data-feather="users"></span>: {{ $visits_n }}<br>
            Most Frequent Nationality <span data-feather="chevrons-left"></span>: {{ $a }}<br>
            Most Recived Fee Type/Currency <span data-feather="list"></span>: {{ $ta }}<br>
			</small></p>
          </div>
        </div>
      </div>
  
  
<!-- begin reports -->
   <div class="row">

  <div class="col-sm-12">
  <h4 class="mb-3">Reports on Museum Visits</h4>
  </div> 
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Report by Nationality</h5>
        <p class="card-text">Click the button below and select a nationality.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#nationality_c" aria-expanded="false" aria-controls="collapseExample">
		Select Nationality
	  </button>
	</p>
		<div class="collapse" id="nationality_c">
		  <div class="card card-body">
			<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="nationality" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="province">Nationality</label>
           <select class="form-control" id="myselect" onchange="myFunction()" name="filter"  value="" required>
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
				  
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
		  </div>
		</div>
		
      </div>
    </div>
  </div>
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Report by Museum</h5>
        <p class="card-text">Click the button below and select a museum.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#museum_c" aria-expanded="false" aria-controls="collapseExample">
		Select Museum
	  </button>
	</p>
		<div class="collapse" id="museum_c">
		  <div class="card card-body">
		<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="museum" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="category_c">Museum Name</label>
            <select class="form-control" id="contintent"  name="filter"  value="" required>
					<option>Choose Museum</option>
					@foreach($museums as $p)
					<option value="{{ $p->name }}" >{{ $p->name }}</option>
					@endforeach
					</select>					 
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
				  
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
		  </div>
		</div>
		
      </div>
    </div>
  </div>
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Report by Fee Type</h5>
        <p class="card-text">Click the button below and select a points of entry.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#point_c" aria-expanded="false" aria-controls="collapseExample">
		Select Fee Type
	  </button>
	</p>
		<div class="collapse" id="point_c">
		  <div class="card card-body">
		<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="fee_type" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="points">Fee Type</label>
           <select class="form-control" id="contintent"  name="filter"  value="" required>
					<option>Choose Fee Type</option>
					 <option value="Domestic (ZK)" >Domestic/Citizens (ZK)</option>
					  <option value="International (USD)"  >International (USD)</option>
					
					</select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		 		  
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
		  </div>
		</div>
		
      </div>
    </div>
  </div>
  
  </div>
  
  <hr>
  
  <div class="row">
	<div class="col-sm-4">
		<div class="card">
		  <div class="card-body">
			<h5 class="card-title">Report by Employee</h5>
			<p class="card-text">Click the button below and select an employee number.</p>
			
		<p> 
		  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#employee_c" aria-expanded="false" aria-controls="collapseExample">
			Select Employee
		  </button>
		</p>
			<div class="collapse" id="employee_c">
			  <div class="card card-body">
		<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="employee_no" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="employees">Employee Number</label>
            <input type="text" class="form-control" list="employee" id="employees" name="filter" placeholder="Employee Number" value="" required>
					<datalist class="form-group" id="employee">
					@foreach($user as $u)
					 <option>{{ $u->employee_no }}</option>
					@endforeach					 
					</datalist>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		 		 
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
			  </div>
			</div>
			
		  </div>
		</div>
  </div>
  
  <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Report by Month</h5>
        <p class="card-text">Click the button below and select a month.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#month_c" aria-expanded="false" aria-controls="collapseExample">
		Select Month
	  </button>
	</p>
		<div class="collapse" id="month_c">
		  <div class="card card-body">
<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="month" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="month">Month</label>
           <select class="form-control" id="month" name="filter">
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
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  	  
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
		  </div>
		</div>
		
      </div>
    </div>
  </div>
  
 <div class="col-sm-4">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Report by Year</h5>
        <p class="card-text">Click the button below and select a year.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#year_c" aria-expanded="false" aria-controls="collapseExample">
		Select Year
	  </button>
	</p>
		<div class="collapse" id="year_c">
		  <div class="card card-body">
	<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="year" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Museum Visits" hidden>
				
			<div class="mb-3">
            <label for="years">Year</label>
            <input type="text" class="form-control" list="year" id="years" name="filter" placeholder="Year" value="" required>
					<datalist class="form-group" id="year">
					@foreach($museum_visits as $ay)
					 <option value="{{ $ay->year }}">{{ $ay->year }}</option>
					@endforeach
					 				 
					</datalist>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  <!-- -->	
		  <!-- -->	
		  <div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h6 class="mb-0">
        <button class="btn btn-sm text-left" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Generate By Range
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">

		<div class="mb-3">
            <label for="to">To Year</label>
            <input type="text" class="form-control" list="year" id="to" name="to" placeholder="Year" value="">
					<datalist class="form-group" id="year">
					@foreach($museum_visits as $ay)
					 <option value="{{ $ay->year }}">{{ $ay->year }}</option>
					@endforeach
					 				 
					</datalist>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

      </div>
    </div>
  </div>
</div>
		 
		  <hr class="mb-4">
        <button class="btn btn-primary btn-sm" type="submit">Generate</button>
		<!-- -->
		</form>
		<!-- End Form -->
		  </div>
		</div>
		
      </div>
    </div>
  </div>
  
  </div>
  
  <hr>
  
  <!-- end reports -->
  
  @endsection