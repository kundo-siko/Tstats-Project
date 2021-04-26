@php
$title = "Report";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a report of {{ $type }} filterd by {{ $report }}: {{ $filter }}.</p>
  </div>
  
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Report</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url($u) }}" class="btn btn-sm btn-outline-secondary">Generate Another <span data-feather="filter"></span></a>
            <a class="btn btn-sm btn-outline-secondary" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export <span data-feather="share"></span></a>
			<div class="dropdown-menu" aria-labelledby="dropdown03">
				<form class="needs-validation" novalidate  method="POST" action="excel_visit_report">
								@csrf
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="{{ $report }}" hidden>
				<input type="text" class="form-control" id="type" name="type" value="{{ $type }}" hidden>
				<input type="text" class="form-control" id="filter" name="filter" value="{{ $filter }}" hidden>
				<input type="text" class="form-control" id="type" name="type" value="{{ $type }}" hidden>
				<input type="text" class="form-control" id="to" name="to" value="{{ $to }}" hidden>
          <button type="submit" class="dropdown-item">To Excel</button>
				<!-- -->
          
        </div>
		  </div>
          <!-- button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week excel_report
          </button -->
        </div>
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
  @if($rp != [])
  
  </div>
	  <div class="align-items-center">
		<div class="row">
			<div class="col-md-1 order-md-1">
			</div>
			
		<div class="col-md-10 order-md-1">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>ID</th>
              <th>Employee</th>
              <th>Tourists</th>
              <th>Nationality</th>
              <th>Visited</th>
              <th>Fee Type/Currecy</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>        
            </tr>
          </thead>
          <tbody>
			@php 
				$sn = '1';				
			@endphp
			 @foreach ($rp as $r)
            <tr>
              <td>{{ $sn++ }}</td>
              <td>{{ $r->id }}</td>
              <td>{{ $r->employee_no }}</td>
              <td>{{ $r->number }}</td>
              <td>{{ $r->nationality }}</td>
              <td>{{ $r->$n }}</td>
              <td>{{ $r->fee_type }}</td>
              <td>{{ $r->fee }}</td>
              <td>{{ $r->month }}</td>
              <td>{{ $r->year }}</td>
                
            </tr>
            @endforeach            
          </tbody>
        </table>
      </div>
	  
	    <div class="col-md-12 order-md-1 pagination  pagination-sm">
	 
     {{ $rp->withQueryString()->links() }}
			</div>
	  
	@else
		<h1 class="h2">Report Not Found</h1>
	@endif
	</div>
	  </div> 
@endsection 