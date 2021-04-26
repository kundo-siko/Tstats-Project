<?php
$title = "Edit Point Of Entry";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is where you can edit the selected point of entry/exit. Make sure to fill in the needed feilds accuratly. If a field does not need to be changed, leave it as is.</p>
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

    <div class="col-md-10 order-md-1">
      <h4 class="mb-3">Add Point Of Entry</h4>
      <form class="needs-validation" novalidate  method="POST" action="post_edit_point">
        <?php echo csrf_field(); ?>
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e($points[0]->employee_no); ?>" hidden>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo e($points[0]->id); ?>" hidden>
		
          <div class="mb-3">
            <label for="name">Point Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Point of Entry Name" value="<?php echo e($points[0]->name); ?>" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		<div class="mb-3">
            <label for="region">Point Region</label>
            <select class="form-control" id="region" name="region">
			  <option>Choose Point of Entry Region</option>
			  <?php echo $__env->make('Lists.regions', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</select>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
        		
		<div class="form-group">
			 <label for="type">Point Type</label>
			<select class="form-control" id="type" name="type">
			  <option>Choose Point of Entry Type</option>
			  <option value="Road" <?php if( $points[0]->type == "Road" ): ?>selected <?php endif; ?> >Road</option>
			  <option value="Air" <?php if( $points[0]->type == "Air" ): ?>selected <?php endif; ?> >Air</option>
			  <option value="Water" <?php if( $points[0]->type == "Water" ): ?>selected <?php endif; ?> >Water</option>
			  <option value="Rail" <?php if( $points[0]->type == "Rail" ): ?>selected <?php endif; ?> >Rail</option>
			</select>
		</div>		
		  
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Points_of_entry/edit_point.blade.php ENDPATH**/ ?>