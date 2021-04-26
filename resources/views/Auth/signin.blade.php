<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Tourism Statistics · Signin</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/sign-in/">

    <!-- Bootstrap core CSS -->
<link href="{{ asset('assets/dist/css/bootstrap.min.css') }}" rel="stylesheet">

    <style>
      .bd-placeholder-img {
        font-size: 1.125rem;
        text-anchor: middle;
        -webkit-user-select: none;
        -moz-user-select: none;
        -ms-user-select: none;
        user-select: none;
      }

      @media (min-width: 768px) {
        .bd-placeholder-img-lg {
          font-size: 3.5rem;
        }
      }
    </style>
    <!-- Custom styles for this template -->
    <link href="{{ asset('assets/signin.css') }}" rel="stylesheet">
  </head>
  <body class="text-center">
  
    <form class="form-signin" method="POST" action="authenticate">
        @csrf
  <h2>Ministry of Tourism and Arts</h2>
  <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
  
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
  
  
  <label for="employee_no" class="sr-only">Employee Number</label>
  <input type="text" id="employee_no" name="employee_no" class="form-control" placeholder="Employee Number" required autofocus>
  <label for="inputPassword" class="sr-only">Password</label>
  <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Password" required>
  <!--div class="checkbox mb-3">
    <label>
      
	  <input type="checkbox" value="remember-me"> Remember me
	
    </label>
  </div-->
  <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
  <p class="mt-5 mb-3 text-muted">TSTATS &copy; 2020</p>
</form>
</body>
</html>
