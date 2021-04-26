<?php
$title = "Add Departure";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are fields you an use to add tourist departures. Please fill in all the fields correctly.</p>
  </div>

	<!-- Error/Success Check -->
	<div class="col-md-12 order-md-1">
		<?php if(count($errors) > 0): ?>
			<div class="alert alert-danger">
				<ul>
					<?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
						<li><?php echo e($error); ?></li>
					<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
				</ul>
			</div>
			<?php endif; ?>
	</div>
		
		<!-- Success Check -->
	<div class="col-md-12 order-md-1">
		<?php if(\Session::has('success')): ?>
			<div class="alert alert-success">
				<p><?php echo e(\Session::get('success')); ?></p>
			</div>
			<?php endif; ?>
	</div>
  <!-- Error/Success Check -->

  <div class="row">

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">Tourist Departure Details</h4>
      <form class="needs-validation" novalidate method="POST" action="create_departure">
        <?php echo csrf_field(); ?>
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e(Auth::user()->employee_no); ?>" hidden>
		
          <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  
		  <div class="row">
    <div class="col-md-6 order-md-2">
		  <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality"  value="" required>
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
		
		 <?php echo $__env->make('Arrivals.trail', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<hr class="mb-4">
		<h6>Point Of Exit</h6>
		
		<div class="row">
    <div class="col-md-4 order-md-2">
		<div class="form-group">
			 <label for="point_of_entry">Name</label>
			<select class="form-control"  name="point" onchange="showCustomer(this.value)">
			  <option>Choose Point of Exit</option>
			  <?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <option><?php echo e($po->name); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		
		</div>
		<div class="col-md-8 order-md-2">
		
		
			<div id="txtHint">Please Select a Point of Exit</div>
			
			
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




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Departures/departures.blade.php ENDPATH**/ ?>