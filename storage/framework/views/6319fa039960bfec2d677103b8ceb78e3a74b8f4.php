  <?php
$title = "View Users";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below is a table of all users of this system. Review their privilages and status.</p>
  </div>
  
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Users</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="<?php echo e(url('create_user')); ?>" class="btn btn-sm btn-outline-secondary">Add User <span data-feather="plus"></span></a>
            <!-- <a class="btn btn-sm btn-outline-secondary">Export <span data-feather="share"></span></a> -->
          </div>
        <!--  <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button> -->
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
  <!-- Danger Check -->
	<div class="col-md-12 order-md-1">
		<?php if(\Session::has('danger')): ?>
			<div class="alert alert-danger">
				<p><?php echo e(\Session::get('danger')); ?></p>
			</div>
			<?php endif; ?>
	</div>
  <!-- Danger Check -->
  
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>Employee #</th>
              <th>Position</th>
              <th>Role</th>
              <th>Status</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
		  <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $u): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td><?php echo e($u->employee_no); ?></td>
              <td><?php echo e($u->position); ?></td>
              <td><?php echo e($u->role); ?></td>
              <td>
				<?php if( $u->status == '1' ): ?>			  
					<h6 class="badge badge-success">Active</h6>
				<?php else: ?>
					<h6 class="badge badge-danger">Suspended</h6>
				<?php endif; ?>
			  </td>
              <td>
				<!-- Button trigger modal -->
					<button type="button" class="btn btn-sm btn-outline-warning" data-toggle="modal" data-target="#edit_<?php echo e($u->id); ?>">
					 <span data-feather="edit"></span>
					</button>

					<!-- Modal -->
					<div class="modal fade" id="edit_<?php echo e($u->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Edit options for <?php echo e($u->employee_no); ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<div class="row">
								<div class="col-md-12">
								<h4>Do you want to?</h4>
								</div>
								<div class="col-md-6">
									<h6>Edit user details</h6>
										<form class="needs-validation" novalidate  method="POST" action="edit_user">
											<?php echo csrf_field(); ?>
								<input type="text" class="form-control" id="id" name="id" value="<?php echo e($u->id); ?>" hidden>
								<button type="submit" class="btn btn-sm btn-outline-warning">
								<span data-feather="edit"></span></button> 
									</form>
								</div>
								<div class="col-md-6">
									<h6>Reset user password</h6>
										<form class="needs-validation" novalidate  method="POST" action="reset_password">
											<?php echo csrf_field(); ?>
									<input type="text" class="form-control" id="id" name="id" value="<?php echo e($u->id); ?>" hidden>
									<input type="text" class="form-control" id="p" name="p" value="0" hidden>
									<button type="submit" class="btn btn-sm btn-outline-primary">
									<span data-feather="lock"></span></button> 
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
				<!-- Button trigger end -->			
				</td>
              <td> 
				<!-- Button trigger modal Delete -->
					<button type="button" class="btn btn-sm btn-outline-danger" data-toggle="modal" data-target="#delete_<?php echo e($u->id); ?>">
					 <span data-feather="trash-2"></span>
					</button>

					<!-- Modal -->
					<div class="modal fade" id="delete_<?php echo e($u->id); ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
					  <div class="modal-dialog">
						<div class="modal-content">
						  <div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Delete options for <?php echo e($u->employee_no); ?></h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							  <span aria-hidden="true">&times;</span>
							</button>
						  </div>
						  <div class="modal-body">
							<div class="row">
								<div class="col-md-12">
								<h4>Are you sure?</h4>
								</div>
								<div class="col-md-6">
								<h6>Yes, delete user</h6>
										<form class="needs-validation" novalidate  method="POST" action="delete_user">
											<?php echo csrf_field(); ?>
									<input type="text" class="form-control" id="id" name="id" value="<?php echo e($u->id); ?>" hidden>
									<input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e($u->employee_no); ?>" hidden>
									<button type="submit" class="btn btn-sm btn-outline-danger">
									<span data-feather="trash"></span></button> 
										</form>									
								</div>
								<div class="col-md-6">
									<?php if( $u->status == '1' ): ?>
									<h6>Suspend user instead</h6>
									<?php else: ?>
									<h6>Activate user instead</h6>
									<?php endif; ?>
										<form class="needs-validation" novalidate  method="POST" action="suspend_user">
											<?php echo csrf_field(); ?>
								<input type="text" class="form-control" id="id" name="id" value="<?php echo e($u->id); ?>" hidden>
								<input type="text" class="form-control" id="status" name="status" value="<?php echo e($u->status); ?>" hidden>
								<input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e($u->employee_no); ?>" hidden>
								<button type="submit" class="btn btn-sm btn-outline-warning">
								<span data-feather="delete"></span></button> 
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
              
            </tr>
		<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>           
          </tbody>
        </table>		
      </div>
	  
	  <div class="col-md-12 order-md-1 pagination  pagination-sm">
	 
     <?php echo e($users->links()); ?>

	  </div>
	  
	  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Users/view_users.blade.php ENDPATH**/ ?>