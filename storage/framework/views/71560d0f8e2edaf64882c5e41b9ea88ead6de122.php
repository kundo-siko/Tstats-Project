  <?php
$title = "View Arrivals";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>
  
  
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3">
        <h1 class="h2">Arrivals</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group mr-2">
            <a href="<?php echo e(url('departures')); ?>" class="btn btn-sm btn-outline-secondary">Add Arrival <span data-feather="plus"></span></a>
            <a class="btn btn-sm btn-outline-secondary">Export <span data-feather="share"></span></a>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle">
            <span data-feather="calendar"></span>
            This week
          </button>
        </div>
      </div>
  
  
      <div class="table-responsive">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th>#</th>
              <th>Nationality</th>
              <th>Region</th>
              <th>Point of Entry</th>
              <th>Month</th>
              <th>Year</th>
              <th></th>
              <th></th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>1,001</td>
              <td>Lorem</td>
              <td>ipsum</td>
              <td>dolor</td>
              <td>sit</td>
              <td>sit</td>
              <td> <button type="button" class="btn btn-sm btn-outline-warning">
					<span data-feather="edit"></span></button> 
				</td>
              <td> <button type="button" class="btn btn-sm btn-outline-danger">
					<span data-feather="trash-2"></span></button> 
				</td>
              
            </tr>
            <tr>
              <td>1,002</td>
              <td>amet</td>
              <td>consectetur</td>
              <td>adipiscing</td>
              <td>elit</td>
              <td>elit</td>
              <td> <button type="button" class="btn btn-sm btn-outline-warning">
					<span data-feather="edit"></span></button> 
				</td>
              <td> <button type="button" class="btn btn-sm btn-outline-danger">
					<span data-feather="trash-2"></span></button> 
				</td>
            </tr>
            
            
            <tr>
              <td>1,014</td>
              <td>per</td>
              <td>inceptos</td>
              <td>himenaeos</td>
              <td>Curabitur</td>
              <td>Curabitur</td>
			  <td> <button type="button" class="btn btn-sm btn-outline-warning">
					<span data-feather="edit"></span></button> 
				</td>
              <td> <button type="button" class="btn btn-sm btn-outline-danger">
					<span data-feather="trash-2"></span></button> 
				</td>
            </tr>
            <tr>
              <td>1,015</td>
              <td>sodales</td>
              <td>ligula</td>
              <td>in</td>
              <td>libero</td>
              <td>libero</td>
			  <td> <button type="button" class="btn btn-sm btn-outline-warning">
					<span data-feather="edit"></span></button> 
				</td>
              <td> <button type="button" class="btn btn-sm btn-outline-danger">
					<span data-feather="trash-2"></span></button> 
				</td>
            </tr>
          </tbody>
        </table>
      </div>
	  
	  <?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/view_arrivals.blade.php ENDPATH**/ ?>