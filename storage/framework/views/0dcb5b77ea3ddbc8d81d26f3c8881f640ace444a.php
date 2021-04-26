  <?php
$title = "View Users";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

<div class="card">
  <div class="card-body">
	<h4 class="card-title">User Profile</h4>
    <h6 class="card-subtitle mb-2 text-muted">View your user details</h6>
	<hr class="mb-4">
	
    <h6>Empoyee #: ...</h6>
    <h6>Position: ...</h6>
    <h6>Role: ...</h6>
	
	<hr class="mb-4">
	<button type="button" class="btn btn-sm btn-outline-warning">Edit <span data-feather="edit"></span></button> 
	<button type="button" class="btn btn-sm btn-outline-primary">Change Password <span data-feather="edit"></span></button> 
  </div>
</div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/profile.blade.php ENDPATH**/ ?>