<?php
$title = "Report";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a report of <?php echo e($type); ?> filterd by <?php echo e($report); ?>: <?php echo e($filter); ?>.</p>
  </div>
  
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Report</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="<?php echo e(url($u)); ?>" class="btn btn-sm btn-outline-secondary">Generate Another <span data-feather="filter"></span></a>
            <a class="btn btn-sm btn-outline-secondary" id="dropdown03" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Export <span data-feather="share"></span></a>
			<div class="dropdown-menu" aria-labelledby="dropdown03">
				<form class="needs-validation" novalidate  method="POST" action="excel_visit_report">
								<?php echo csrf_field(); ?>
				<!-- -->
				<input type="text" class="form-control" id="report" name="report" value="<?php echo e($report); ?>" hidden>
				<input type="text" class="form-control" id="type" name="type" value="<?php echo e($type); ?>" hidden>
				<input type="text" class="form-control" id="filter" name="filter" value="<?php echo e($filter); ?>" hidden>
				<input type="text" class="form-control" id="type" name="type" value="<?php echo e($type); ?>" hidden>
				<input type="text" class="form-control" id="to" name="to" value="<?php echo e($to); ?>" hidden>
          <button type="submit" class="dropdown-item">To Excel</button>
				<!-- -->
          
        </div>
		  </div>
          <!-- button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week excel_report
          </button -->
        </div>
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
  <?php if($rp != []): ?>
  
  </div>
	  <div class="align-items-center">
		<div class="row">
			<div class="col-md-1 order-md-1">
			</div>
			
		<div class="col-md-10 order-md-1">
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>S/N</th>
              <th>ID</th>
              <th>Employee</th>
              <th>Tourists</th>
              <th>Nationality</th>
              <th>Visited</th>
              <th>Fee Type/Currecy</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>        
            </tr>
          </thead>
          <tbody>
			<?php 
				$sn = '1';				
			?>
			 <?php $__currentLoopData = $rp; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $r): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($sn++); ?></td>
              <td><?php echo e($r->id); ?></td>
              <td><?php echo e($r->employee_no); ?></td>
              <td><?php echo e($r->number); ?></td>
              <td><?php echo e($r->nationality); ?></td>
              <td><?php echo e($r->$n); ?></td>
              <td><?php echo e($r->fee_type); ?></td>
              <td><?php echo e($r->fee); ?></td>
              <td><?php echo e($r->month); ?></td>
              <td><?php echo e($r->year); ?></td>
                
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
          </tbody>
        </table>
      </div>
	  
	    <div class="col-md-12 order-md-1 pagination  pagination-sm">
	 
     <?php echo e($rp->withQueryString()->links()); ?>

			</div>
	  
	<?php else: ?>
		<h1 class="h2">Report Not Found</h1>
	<?php endif; ?>
	</div>
	  </div> 
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Reports/show_visit_report.blade.php ENDPATH**/ ?>