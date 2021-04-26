<?php
$title = "Reports";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">
    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are options you can use to generate reports. Each option will require you select a filter for your report. Choose an option below to generate a report</p>
 </div>
  
<!-- begin reports -->
   <div class="row">

  <div class="col-sm-12">
  <h4 class="mb-3">Reports Generation</h4>
  </div>
  
  <div class="col-sm-12 ">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Arivals and Departures</h5>
			<p class="card-text">Click the button below to generate reports on tourist arrivals and departures.</p>        
			  <a href="<?php echo e(url('by_arrivals')); ?>" class="btn btn-primary" type="button">Select </a>				  			
      </div>
    </div>
  </div>
  
   <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on National Park Visits</h5>
			<p class="card-text">Click the button below to generate reports on national parks and park visits.</p>        
			  <a href="<?php echo e(url('by_parks')); ?>" class="btn btn-primary" type="button">Select </a>				  			
      </div>
    </div>
  </div>
  
  <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Museum Visits</h5>
			<p class="card-text">Click the button below to generate reports on museums and museum visits.</p>        
			 <a href="<?php echo e(url('by_museums')); ?>" class="btn btn-primary" type="button">Select </a>			 			
      </div>
    </div>
  </div>
  
  <div class="py-2 col-sm-12">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Reports on Heritage Site Visits</h5>
			<p class="card-text">Click the button below to generate reports on heritage sites and site visits.</p>        
			  <a href="<?php echo e(url('by_heritage')); ?>" class="btn btn-primary" type="button">Select </a>		
      </div>
    </div>
  </div>
  
  
  </div>
  
  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Reports/reports.blade.php ENDPATH**/ ?>