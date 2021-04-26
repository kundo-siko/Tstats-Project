@php
$title = "Edit User";
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

    <div class="col-md-10 order-md-1">
      <h4 class="mb-3">Edit User</h4>
      <form class="needs-validation" novalidate  method="POST" action="post_edit_user">
        @csrf
		
          <div class="mb-3">
            <label for="employee_no">Employee Number</label>
            <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="Employee Number" value="{{ $user->employee_no }}" required>
            <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" hidden>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		<div class="mb-3">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="{{ $user->position }}">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
        @if(Auth::user()->role == 'Admin') 		
		<div class="form-group">
			 <label for="role">Role</label>
			<select class="form-control" id="role" name="role">
			  <option>Choose Role</option>
			  <option value="Admin" @if($user->role == "Admin")selected @endif >Admin</option>
			  <option value="User" @if($user->role == "User")selected @endif >User</option>
			</select>
		</div>		
		 @endif
		 
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
@endsection