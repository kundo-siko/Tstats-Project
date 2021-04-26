  <?php
$title = "View Heritage Site Visits";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a table of all the Heritage Site Visits in the system. Review arrival details bellow.</p>
  </div>
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Heritage Site Visits</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="<?php echo e(url('heritage_visit')); ?>" class="btn btn-sm btn-outline-secondary">Add Site Visit <span data-feather="plus"></span></a>
			<?php if(url()->current()!='http://127.0.0.1:8000/view_my_heritage_visits'): ?>
            <a href="<?php echo e(url('view_my_heritage_visits')); ?>" class="btn btn-sm btn-outline-secondary">By Me <span data-feather="user"></span></a>
				<?php else: ?>
			<a href="<?php echo e(url('view_heritage_visits')); ?>" class="btn btn-sm btn-outline-secondary">By All <span data-feather="users"></span></a>
				<?php endif; ?>
            <a  href="<?php echo e(url('heritage_visit_excel')); ?>" class="btn btn-sm btn-outline-secondary">Export <span data-feather="share"></span></a>
          </div>
          <!-- button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
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
              <th># of Tourist</th>
              <th>Age</th>
              <th>Nationality</th>
              <th>Site Visited</th>
              <th>Fee Type/Currency</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
              <th></th>
			  <?php if(Auth::user()->role == 'Admin'): ?>
              <th></th>
			  <?php endif; ?>
            </tr>
          </thead>
          <tbody>
			<?php 
				$sn = '1';
			?>
			 <?php $__currentLoopData = $heritage_visits; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $a): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($sn++); ?></td>
              <td><?php echo e($a->id); ?></td>
              <td><?php echo e($a->employee_no); ?></td>
              <td><?php echo e($a->number); ?></td>
              <td><?php echo e($a->age); ?> 18</td>
              <td><?php echo e($a->nationality); ?></td>
              <td><?php echo e($a->heritage_site); ?></td>
              <td><?php echo e($a->fee_type); ?></td>
              <td><?php echo e($a->fee); ?></td>
              <td><?php echo e($a->month); ?></td>
              <td><?php echo e($a->year); ?></td>
              <td> 
				<?php if(Auth::user()->employee_no == $a->employee_no || Auth::user()->role == 'Admin'): ?>
					<form class="needs-validation" novalidate  method="POST" action="edit_heritage_visit">
								<?php echo csrf_field(); ?>
						<input type="text" class="form-control" id="id" name="id" value="<?php echo e($a->id); ?>" hidden>
						<button type="submit" class="btn btn-sm btn-outline-warning">
						<span data-feather="edit"></span></button> 
					</form>
					<?php endif; ?>
				</td>
				<?php if(Auth::user()->role == 'Admin'): ?>
              <td> 
			   <!-- Button trigger modal Delete -->
					<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete_<?php echo e($a->id); ?>">
					 <span data-feather="trash-2"></span>
					</button>

					<!-- Modal -->
					<div class="modal fade" id="delete_<?php echo e($a->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Delete options for Museum Visit</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<div class="row">
								<div class="col-md-12">
								<h4>Are you sure?</h4>
								</div>
								<div class="col-md-12">
								<p>Number of Tourists: <?php echo e($a->number); ?> <br> Heritage Site: <?php echo e($a->heritage_site); ?>  </p>
								<h6>Yes, delete Record</h6>
										<form class="needs-validation" novalidate  method="POST" action="delete_heritage_visit">
											<?php echo csrf_field(); ?>
									<input type="text" class="form-control" id="id" name="id" value="<?php echo e($a->id); ?>" hidden>
									<button type="submit" class="btn btn-sm btn-outline-danger">
									<span data-feather="trash"></span></button> 
										</form>									
								</div>
								
							</div>							
						  </div>
						  <div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						  </div>
						</div>
					  </div>
					</div>
				<!-- Button trigger end Delete -->
				</td> 
					<?php endif; ?>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>            
          </tbody>
        </table>
      </div>
	
	   <div class="col-md-12 order-md-1 pagination  pagination-sm">
	 
     <?php echo e($heritage_visits->links()); ?>

			</div>
		</div>
	  </div>
	  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Heritage/view_heritage_visits.blade.php ENDPATH**/ ?>