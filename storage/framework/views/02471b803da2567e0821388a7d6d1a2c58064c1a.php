<?php
$title = "Edit Departure";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
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
      <h4 class="mb-3">Edit Tourist Departure Details</h4>
	  <?php if(url()->current()!='http://127.0.0.1:8000/edit_my_departure_details'): ?>
      <form class="needs-validation" novalidate method="POST" action="post_edit_departure">
	  <?php else: ?>
      <form class="needs-validation" novalidate method="POST" action="post_my_edit_departure">
	  <?php endif; ?>
        <?php echo csrf_field(); ?>
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e($departure[0]->employee_no); ?>" hidden>
		 <input type="text" class="form-control" id="id" name="id" value="<?php echo e($departure[0]->id); ?>" hidden>
		
           <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="<?php echo e($departure[0]->number); ?>" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>

		<div class="row">
    <div class="col-md-6 order-md-2">
		
          <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality" required>
					<option>Choose Nationality</option>
					  <?php echo $__env->make('Lists.countries_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
		    </div>
		  <div class="col-md-6 order-md-2">
		  
          <div class="mb-3">
            <label for="continent">Region/Continent</label>
                       <input type="text" class="form-control" id="memo" name="continent" placeholder="Region" value="<?php echo e($departure[0]->continent); ?>" readonly>
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
			  <option <?php if( $arrival[0]->point == $po->name ): ?>selected <?php endif; ?> ><?php echo e($po->name); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			</select>
		</div>
		
		</div>
		<div class="col-md-8 order-md-2">
		
		
			<div id="txtHint">If you wish to edit this part, please select another point of exit
			
			
			<div class="col-md-8 order-md-2">
		<div class="mb-3">
            <label for="point_region">Region</label>
            <input type="text" class="form-control" id="point_region" name="point_region" value="<?php echo e($departure[0]->point_region); ?>" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          </div>
		  <div class="col-md-8 order-md-2">
		<div class="mb-3">
            <label for="point_type">Type</label>
            <input type="text" class="form-control" id="point_type" name="point_type" value="<?php echo e($departure[0]->point_type); ?>" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          </div>
			
			
			
			</div>
			
			
		</div>
		</div>
		
		<hr class="mb-4">
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month" name="month">
			  <option>Select Month</option>
			  <option value="January" <?php if($departure[0]->month == "January" ): ?>selected <?php endif; ?> >January</option>
			  <option value="Febuary" <?php if($departure[0]->month == "Febuary" ): ?>selected <?php endif; ?> >Febuary</option>
			  <option value="March" <?php if($departure[0]->month == "March"): ?>selected <?php endif; ?> >March</option>
			  <option value="April" <?php if($departure[0]->month == "April" ): ?>selected <?php endif; ?> >April</option>
			  <option value="May" <?php if($departure[0]->month == "May" ): ?>selected <?php endif; ?> >May</option>
			  <option value="June" <?php if($departure[0]->month == "June" ): ?>selected <?php endif; ?> >June</option>
			  <option value="July" <?php if($departure[0]->month == "July" ): ?>selected <?php endif; ?> >July</option>
			  <option value="August" <?php if($departure[0]->month == "August" ): ?>selected <?php endif; ?> >August</option>
			  <option value="September" <?php if($departure[0]->month == "September" ): ?>selected <?php endif; ?> >September</option>
			  <option value="October" <?php if($departure[0]->month == "October" ): ?>selected <?php endif; ?> >October</option>
			  <option value="November" <?php if($departure[0]->month == "November" ): ?>selected <?php endif; ?> >November</option>
			  <option value="December" <?php if($departure[0]->month == "December" ): ?>selected <?php endif; ?> >December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="year">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>		 
			 
			<select class="form-control" id="year" name="year">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>" <?php if($departure[0]->year == $year ): ?>selected <?php endif; ?> ><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>
       
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Departures/edit_departure.blade.php ENDPATH**/ ?>