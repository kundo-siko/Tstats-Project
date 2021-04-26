  @php
$title = "View Special Tourist";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a table of all the Special Tourist Types. Review arrival details bellow.</p>
  </div>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Special Tourist Types</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="{{ url('add_special') }}" class="btn btn-sm btn-outline-secondary">Add Special Tourist Type <span data-feather="plus"></span></a>
            <a  href="{{ url('special_excel') }}" class="btn btn-sm btn-outline-secondary">Export <span data-feather="share"></span></a>
          </div>
          <!-- button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
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
              <th>Name</th>
              <th></th>
			  @if(Auth::user()->role == 'Admin')
              <th></th>
			  @endif
            </tr>
          </thead>
          <tbody>
			@php 
				$sn = '1';
			@endphp
			 @foreach ($special as $a)
            <tr>
              <td>{{ $sn++ }}</td>
              <td>{{ $a->id }}</td>
              <td>{{ $a->employee_no }}</td>
              <td>{{ $a->name }}</td>
			  @if(Auth::user()->role == 'Admin')
              <td>{{ $a->updated_at }}</td>
			  @endif
              <td> 
					@if(Auth::user()->employee_no == $a->employee_no || Auth::user()->role == 'Admin')
					<form class="needs-validation" novalidate  method="POST" action="edit_special">
								@csrf
						<input type="text" class="form-control" id="id" name="id" value="{{ $a->id }}" hidden>
						<button type="submit" class="btn btn-sm btn-outline-warning">
						<span data-feather="edit"></span></button> 
					</form>
					@endif
				</td>
				@if(Auth::user()->role == 'Admin')
              <td> 
			   <!-- Button trigger modal Delete -->
					<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete_{{ $a->id }}">
					 <span data-feather="trash-2"></span>
					</button>

					<!-- Modal -->
					<div class="modal fade" id="delete_{{ $a->id }}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Delete options for Special Tourist Type</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<div class="row">
								<div class="col-md-12">
								<h4>Are you sure?</h4>
								</div>
								<div class="col-md-12">
								<p>Number of Special Tourist Type: {{ $a->name }}</p>
								<h6>Yes, delete Record</h6>
										<form class="needs-validation" novalidate  method="POST" action="delete_special">
											@csrf
									<input type="text" class="form-control" id="id" name="id" value="{{ $a->id }}" hidden>
									<button type="submit" class="btn btn-sm btn-outline-danger">
									<span data-feather="trash"></span></button> 
										</form>									
								</div>
								
							</div>							
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
				<!-- Button trigger end Delete -->
				</td> 
					@endif
            </tr>
            @endforeach            
          </tbody>
        </table>
      </div>
	
	   <div class="col-md-12 order-md-1 pagination  pagination-sm">
	 
     {{ $special->links() }}
			</div>
			
		</div>
	  </div>
	  @endsection