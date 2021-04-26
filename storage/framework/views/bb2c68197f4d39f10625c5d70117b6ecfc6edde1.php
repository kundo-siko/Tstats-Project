<?php
$title = "Reset Password";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>
  
  <div class="row">
	<div class="col-md-6">
	<h4>Reset Password</h4>
	
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
  <!-- Danger Check -->
	<div class="col-md-12 order-md-1">
		<?php if(\Session::has('danger')): ?>
			<div class="alert alert-danger">
				<p><?php echo e(\Session::get('danger')); ?></p>
			</div>
			<?php endif; ?>
	</div>
  <!-- Danger Check -->
	
	<div class="card">
  <div class="card-body">
   <h4 class="card-title">  User <?php echo e($user->employee_no); ?></h4>
    <h6 class="card-subtitle mb-2 text-muted">Change password here</h6>
	
	<form class="needs-validation" novalidate  method="POST" action="post_password_reset">
        <?php echo csrf_field(); ?>
	
	<hr class="mb-4">
   
		 <div class="mb-3">           
            <input type="text" class="form-control" id="id" name="id" value="<?php echo e($user->id); ?>" hidden>           
            <input type="text" class="form-control" id="p" name="p" value="<?php echo e($p); ?>" hidden>           
          </div>
   
		 <?php if($p != '0' || Auth::user()->id == $user->id ): ?>
		<div class="mb-3">
            <label for="opassword">Old Password</label>			          
            <input type="text" class="form-control" id="hpassword" name="hpassword" value="<?php echo e($user->password); ?>" hidden> 
            <input type="password" class="form-control" id="opassword" name="opassword" placeholder="Password" value="" >
            <div class="invalid-feedback">
              Valid Password is required.
            </div>
          </div>
		<?php endif; ?>
		 
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
  
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Users/reset_password.blade.php ENDPATH**/ ?>