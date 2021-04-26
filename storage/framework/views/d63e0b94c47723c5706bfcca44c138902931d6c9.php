<?php
$title = "Reports on Heritage Sites";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are options you can use to generate reports. Each option will require you select a filter for your report. Choose an option below to generate a report</p>
 </div>
    
<?php
	$park_n = $sites->count();
	$visits_n = $site_visits->sum('number');
	
	$point_a = $site_visits->mode('nationality');
	$point_d = $site_visits->mode('fee_type');
	$a = $point_a[0];
	$ta = $point_d[0];
?>

   <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h3">Overview <a  href="<?php echo e(url('overview')); ?>" class="btn btn-sm btn-outline-secondary"><span data-feather="eye"></span></a></h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="mr-2">
            <p><small>
			Total Number of Sites <span data-feather="users"></span>: <?php echo e($park_n); ?><br>
            Total Number of Site Visit <span data-feather="users"></span>: <?php echo e($visits_n); ?><br>
            Most Frequent Nationality <span data-feather="chevrons-left"></span>: <?php echo e($a); ?><br>
            Most Recived Fee Type/Currency <span data-feather="list"></span>: <?php echo e($ta); ?><br>
			</small></p>
          </div>
        </div>
      </div>
  
  
<!-- begin reports -->
   <div class="row">

  <div class="col-sm-12">
  <h4 class="mb-3">Reports on Heritage Site Visits</h4>
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
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="nationality" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Heritage Site Visits" hidden>
				
			<div class="mb-3">
            <label for="province">Nationality</label>
           <select class="form-control" id="myselect" onchange="myFunction()" name="filter"  value="" required>
					<option>Choose Nationality</option>
						<?php $__currentLoopData = $special; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<option><?php echo e($special->name); ?></option>
						<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>	
					  <?php echo $__env->make('Lists.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
        <h5 class="card-title">Report by Heritage Site</h5>
        <p class="card-text">Click the button below and select a museum.</p>
        
	<p> 
	  <button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#museum_c" aria-expanded="false" aria-controls="collapseExample">
		Select Site
	  </button>
	</p>
		<div class="collapse" id="museum_c">
		  <div class="card card-body">
		<!-- Begin Form -->
		  <form class="needs-validation" novalidate  method="POST" action="generate">
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="heritage_site" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Heritage Site Visits" hidden>
				
			<div class="mb-3">
            <label for="category_c">Site Name</label>
            <select class="form-control" id="contintent"  name="filter"  value="" required>
					<option>Choose Site</option>
					<?php $__currentLoopData = $sites; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					<option value="<?php echo e($p->name); ?>" ><?php echo e($p->name); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="fee_type" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Heritage Site Visits" hidden>
				
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
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="employee_no" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Heritage Site Visits" hidden>
				
			<div class="mb-3">
            <label for="employees">Employee Number</label>
            <input type="text" class="form-control" list="employee" id="employees" name="filter" placeholder="Employee Number" value="" required>
					<datalist class="form-group" id="employee">
					<?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <option><?php echo e($u->employee_no); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>					 
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
								<?php echo csrf_field(); ?>
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
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="year" hidden>
				<input type="text" class="form-control" id="type" name="type" value="Heritage Site Visits" hidden>
				
			<div class="mb-3">
            <label for="years">Year</label>
            <input type="text" class="form-control" list="year" id="years" name="filter" placeholder="Year" value="" required>
					<datalist class="form-group" id="year">
					<?php $__currentLoopData = $site_visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <option value="<?php echo e($ay->year); ?>"><?php echo e($ay->year); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					 				 
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
					<?php $__currentLoopData = $site_visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $ay): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
					 <option value="<?php echo e($ay->year); ?>"><?php echo e($ay->year); ?></option>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
					 				 
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
  
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Reports/by_heritage.blade.php ENDPATH**/ ?>