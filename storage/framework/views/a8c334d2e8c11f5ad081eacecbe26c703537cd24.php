<?php
$title = "Edit User";
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

    <div class="col-md-10 order-md-1">
      <h4 class="mb-3">Edit User</h4>
      <form class="needs-validation" novalidate  method="POST" action="post_edit_user">
        <?php echo csrf_field(); ?>
		
          <div class="mb-3">
            <label for="employee_no">Employee Number</label>
            <input type="text" class="form-control" id="employee_no" name="employee_no" placeholder="Employee Number" value="<?php echo e($user->employee_no); ?>" required>
            <input type="text" class="form-control" id="id" name="id" value="<?php echo e($user->id); ?>" hidden>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		<div class="mb-3">
            <label for="position">Position</label>
            <input type="text" class="form-control" id="position" name="position" placeholder="Position" value="<?php echo e($user->position); ?>">
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        
        <?php if(Auth::user()->role == 'Admin'): ?> 		
		<div class="form-group">
			 <label for="role">Role</label>
			<select class="form-control" id="role" name="role">
			  <option>Choose Role</option>
			  <option value="Admin" <?php if($user->role == "Admin"): ?>selected <?php endif; ?> >Admin</option>
			  <option value="User" <?php if($user->role == "User"): ?>selected <?php endif; ?> >User</option>
			</select>
		</div>		
		 <?php endif; ?>
		 
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Users/edit_user.blade.php ENDPATH**/ ?>