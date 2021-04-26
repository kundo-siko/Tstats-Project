@php
$title = "Reset Password";
@endphp

@extends('layouts.header')

@section('title', 'Page Title')

@section('content')

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>
  
  <div class="row">
	<div class="col-md-6">
	<h4>Reset Password</h4>
	
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
  <!-- Danger Check -->
	<div class="col-md-12 order-md-1">
		@if(\Session::has('danger'))
			<div class="alert alert-danger">
				<p>{{ \Session::get('danger') }}</p>
			</div>
			@endif
	</div>
  <!-- Danger Check -->
	
	<div class="card">
  <div class="card-body">
   <h4 class="card-title">  User {{ $user->employee_no }}</h4>
    <h6 class="card-subtitle mb-2 text-muted">Change password here</h6>
	
	<form class="needs-validation" novalidate  method="POST" action="post_password_reset">
        @csrf
	
	<hr class="mb-4">
   
		 <div class="mb-3">           
            <input type="text" class="form-control" id="id" name="id" value="{{ $user->id }}" hidden>           
            <input type="text" class="form-control" id="p" name="p" value="{{ $p }}" hidden>           
          </div>
   
		 @if($p != '0' || Auth::user()->id == $user->id )
		<div class="mb-3">
            <label for="opassword">Old Password</label>			          
            <input type="text" class="form-control" id="hpassword" name="hpassword" value="{{ $user->password }}" hidden> 
            <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Password" value="" >
            <div class="invalid-feedback">
              Valid Password is required.
            </div>
          </div>
		@endif
		 
		  <div class="mb-3">
            <label for="password">New Password</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Password" value=""
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
			required>
            <div class="invalid-feedback">
              Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.
            </div>
          </div>
		
		<div class="mb-3">
            <label for="password_confirmation">Confirm New Password</label>
            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Confirm Password" value="" 
			pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters"
			required>
            <div class="invalid-feedback">
              Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters.
            </div>
          </div>
   
   <hr class="mb-4">
   <button class="btn btn-primary btn-lg" type="submit">Save</button>
      </form>	
  </div>
</div>
	
	
	</div>
	</div>
  
  
  @endsection