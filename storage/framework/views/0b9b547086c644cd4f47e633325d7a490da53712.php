<?php
$title = "Create User";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>
  
  <div class="row">

    <div class="col-md-10 order-md-1">
      <h4 class="mb-3">Create User</h4>
      <form class="needs-validation" novalidate>
        
          <div class="mb-3">
            <label for="lastName">Employee Number</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        	
		<div class="mb-3">
            <label for="lastName">Position</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
        		
		<div class="form-group">
			 <label for="poe">Role</label>
			<select class="form-control" id="poe">
			  <option>Choose Role</option>
			  <option value="Admin">Admin</option>
			  <option value="User">User</option>
			</select>
		</div>		
		  
        <hr class="mb-4">
		
		<div class="mb-3">
            <label for="lastName">Default Password</label>
            <input type="password" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
		<div class="mb-3">
            <label for="lastName">Confirm Default Password</label>
            <input type="password" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>
  
  
<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/create_user.blade.php ENDPATH**/ ?>