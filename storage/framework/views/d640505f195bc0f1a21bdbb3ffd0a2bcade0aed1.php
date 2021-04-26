<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Jekyll v4.1.1">
    <title>Tourism Statistics - <?php echo e($title); ?></title>

    <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/checkout/">
	 <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/navbars/">
	 <link rel="canonical" href="https://getbootstrap.com/docs/4.5/examples/dashboard/">

    <!-- Bootstrap core CSS -->
<link href="<?php echo e(asset('assets/dist/css/bootstrap.min.css')); ?>" rel="stylesheet">

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
    <link href="<?php echo e(asset('assets/form-validation.css')); ?>" rel="stylesheet">
	 <link href="<?php echo e(asset('assets/navbar.css')); ?>" rel="stylesheet">
	 <link href="<?php echo e(asset('assets/dashboard.css')); ?>" rel="stylesheet">
  </head>
  <body class="bg-light">
  
  <!-- Nav Bar -->
  <nav class="navbar navbar-expand-sm navbar-dark bg-dark">
  <a class="navbar-brand" href="<?php echo e(url('home')); ?>">Tourist Statistics</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample03" aria-controls="navbarsExample03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarsExample03">
    <ul class="navbar-nav mr-auto">
	 <?php if(Auth::user()->status == '1'): ?>
	
      <li class="nav-item <?php if(url()->current()=='http://127.0.0.1:8000/profile'){ echo 'active';} ?>">
        <a class="nav-link" href="<?php echo e(url('profile')); ?>">Profile <!--span class="sr-only">(current)</span--></a>
      </li>
      
	  <?php if(Auth::user()->role == 'Admin'): ?>
      <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/create_user' || url()->current()=='http://127.0.0.1:8000/view_users'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Users</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('create_user')); ?>">Create User</a>
          <a class="dropdown-item" href="<?php echo e(url('view_users')); ?>">View Users</a>
        </div>
      </li>
		<li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/add_point' || url()->current()=='http://127.0.0.1:8000/view_points'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Points</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('add_point')); ?>">Add Point</a>
          <a class="dropdown-item" href="<?php echo e(url('view_points')); ?>">View Points</a>
        </div>
      </li>
		<?php endif; ?>
		
   <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/arrivals' || url()->current()=='http://127.0.0.1:8000/view_arrivals'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Arrivals</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('arrivals')); ?>">Add Arrival</a>
          <a class="dropdown-item" href="<?php echo e(url('view_arrivals')); ?>">View Arrivals</a>
        </div>
      </li>
    <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/departures' || url()->current()=='http://127.0.0.1:8000/view_departures'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Departures</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('departures')); ?>">Add Departure</a>
          <a class="dropdown-item" href="<?php echo e(url('view_departures')); ?>">View Departures</a>
        </div>
      </li>
	  <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/parks' || url()->current()=='http://127.0.0.1:8000/view_parks'|| url()->current()=='http://127.0.0.1:8000/add_park_visit'|| url()->current()=='http://127.0.0.1:8000/all_park_visits'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">National Parks</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('parks')); ?>">Add Park</a>
          <a class="dropdown-item" href="<?php echo e(url('view_parks')); ?>">View Parks</a>
          <a class="dropdown-item" href="<?php echo e(url('add_park_visit')); ?>">Add Park Visit</a>
          <a class="dropdown-item" href="<?php echo e(url('all_park_visits')); ?>">View Park Visits</a>
        </div>
      </li>
	  <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/museums' || url()->current()=='http://127.0.0.1:8000/view_museums'|| url()->current()=='http://127.0.0.1:8000/museum_visit'|| url()->current()=='http://127.0.0.1:8000/view_museum_visits'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Museums</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('museums')); ?>">Add Museum</a>
          <a class="dropdown-item" href="<?php echo e(url('view_museums')); ?>">View Museums</a>
          <a class="dropdown-item" href="<?php echo e(url('museum_visit')); ?>">Add Museum Visit</a>
          <a class="dropdown-item" href="<?php echo e(url('view_museum_visits')); ?>">View Museum Visits</a>
        </div>
      </li>
	  <li class="nav-item dropdown <?php if(url()->current()=='http://127.0.0.1:8000/heritage' || url()->current()=='http://127.0.0.1:8000/view_heritage'|| url()->current()=='http://127.0.0.1:8000/heritage_visit'|| url()->current()=='http://127.0.0.1:8000/view_heritage_visits'){ echo 'active';} ?>">
        <a class="nav-link dropdown-toggle" href="#" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Heritage Sites</a>
        <div class="dropdown-menu" aria-labelledby="dropdown03">
          <a class="dropdown-item" href="<?php echo e(url('heritage')); ?>">Add Site</a>
          <a class="dropdown-item" href="<?php echo e(url('view_heritage')); ?>">View Sites</a>
          <a class="dropdown-item" href="<?php echo e(url('heritage_visit')); ?>">Add Site Visit</a>
          <a class="dropdown-item" href="<?php echo e(url('view_heritage_visits')); ?>">View Site Visits</a>
        </div>
      </li>
	  
	  <li class="nav-item <?php if(url()->current()=='http://127.0.0.1:8000/reports'){ echo 'active';} ?>">
        <a class="nav-link" href="<?php echo e(url('reports')); ?>">Reports</a>
      </li>
	  <?php endif; ?>
	  
    </ul>
	
	<?php if(Auth::check()): ?>
    <div class="form-inline my-2 my-md-0">
		 <h6 class="text-white bg-dark px-md-3 font-weight-light border-right"><small>Employee #: <?php echo e(Auth::user()->employee_no); ?></small></h6> 
		<h6 class="text-white bg-dark px-md-3 font-weight-light "><small>Role #: <?php echo e(Auth::user()->role); ?></small></h6> 
		<a class="btn btn-sm btn-light" href="<?php echo e(url('signout')); ?>">Logout</a>
    </div>
	<?php endif; ?>
	
  </div>
</nav>
  <!-- Nav Bar -->
  
    <div class="container">
	
	 <?php echo $__env->yieldContent('content'); ?>
	
  <footer class="my-5 pt-5 text-muted text-center text-small">
    <p class="mb-1">&copy; 2020 Tstats</p>
    <ul class="list-inline">
      <li class="list-inline-item"><a href="<?php echo e(url('home')); ?>">Home</a></li>
      <!-- li class="list-inline-item"><a href="#">Privacy</a></li -->
      <!-- li class="list-inline-item"><a href="#">Terms</a></li -->
      <li class="list-inline-item"><a href="<?php echo e(url('support')); ?>">Support</a></li>
	   <?php if(Auth::user()->status == '1'): ?>
      <li class="list-inline-item px-md-2 border-left"><a href="<?php echo e(url('profile')); ?>"><?php echo e(Auth::user()->employee_no); ?></a></li>
	  <?php else: ?>
	   <li class="list-inline-item"><a href="<?php echo e(url('signout')); ?>">Logout</a></li>
	  <?php endif; ?>
    </ul>
  </footer>
</div>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
      <script>window.jQuery || document.write('<script src="<?php echo e(asset('assets/js/vendor/jquery.slim.min.js')); ?>"><\/script>')</script><script src="<?php echo e(asset('assets/dist/js/bootstrap.bundle.min.js')); ?>"></script>
		 <script src="https://cdnjs.cloudflare.com/ajax/libs/feather-icons/4.9.0/feather.min.js"></script>
	   <script src="<?php echo e(asset('assets/form-validation.js')); ?>"></script><script src="<?php echo e(asset('assets/dashboard.js')); ?>"></script></body>
</html>
<?php /**PATH C:\wamp64\www\Tstats\resources\views/layouts/header.blade.php ENDPATH**/ ?>