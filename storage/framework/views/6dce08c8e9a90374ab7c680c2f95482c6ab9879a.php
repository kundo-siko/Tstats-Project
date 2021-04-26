<?php
$title = "Add Museum";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below fields you can use to add a museum. Please fill in each field correctly.</p>
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
      <h4 class="mb-3">Add Museum</h4>
      <form class="needs-validation" novalidate  method="POST" action="post_edit_museum">
        <?php echo csrf_field(); ?>
		
			<input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e(Auth::user()->employee_no); ?>" hidden>
			<input type="text" class="form-control" id="id" name="id" value="<?php echo e($museum[0]->id); ?>" hidden>
		
          <div class="mb-3">
            <label for="name">Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Museum Name" value="<?php echo e($museum[0]->name); ?>" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div> 
		  
		   <div class="mb-3">
            <label for="province">Province</label>
            <select class="form-control"  name="province">
			  <option>Choose Province</option>
			  <?php echo $__env->make('Lists.provinces_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
			</select>			
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>  
		  
        <hr class="mb-4">
		
		 <div class="mb-3">
            <label for="domestic">Citizens/Domestic (ZK)</label>
            <input type="number" step="0.01" class="form-control" id="domestic" name="domestic" placeholder="ZK" value="<?php echo e($museum[0]->domestic); ?>" required>
            <div class="invalid-feedback">
              Valid Figure is required.
            </div>
          </div>
        
		<div class="mb-3">
            <label for="international">International (USD)</label>
            <input type="number" step="0.01" class="form-control" id="international" name="international" placeholder="USD" value="<?php echo e($museum[0]->international); ?>" required>
            <div class="invalid-feedback">
              Valid Figure is required.
            </div>
          </div>
        
		
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Museums/edit_museum.blade.php ENDPATH**/ ?>