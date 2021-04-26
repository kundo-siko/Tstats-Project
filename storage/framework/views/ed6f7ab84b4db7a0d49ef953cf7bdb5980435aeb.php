<?php
$title = "Add National Park Visit";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourism and Arts</h2>
    <p class="lead">Below are fields you an use to add tourist visiting national parks. Please fill in all the fields correctly.</p>
  </div>

  <div class="row">

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">National Park Visit Details</h4>
      <form class="needs-validation" novalidate method="POST" action="create_park_visit">
        <?php echo csrf_field(); ?>
        
		
		 <input type="text" class="form-control" id="employee_no" name="employee_no" value="<?php echo e(Auth::user()->employee_no); ?>" hidden>
		<input type="text" class="form-control" id="id" name="id" value="<?php echo e($parkvisit[0]->id); ?>" hidden>

          <div class="mb-3">
            <label for="nationality">Number of Tourists</label>
            <input type="number" class="form-control" id="number" name="number" placeholder="Number" value="<?php echo e($parkvisit[0]->number); ?>" required>
					
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
		  
		  <!-- hr class="mb-4">
		  
		  <div class="row">
			 <h6 class="card-subtitle mb-2 text-muted">Note: Children under the age of five do not pay entry fees. Children aged between five and thirteen years pay 50% of the entry fees into any National Park. Specify if:</h6>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="below" <?php if( $parkvisit[0]->age == "below" ): ?>checked <?php endif; ?> >
					  <label class="form-check-label" for="gridRadios1">
						Tourists Are Below 13
					  </label>
					</div>
				</div>
				<div class="col-md-6 order-md-2">
					<div class="form-check">
					  <input class="form-check-input" type="radio" name="age" id="gridRadios1" value="above" <?php if( $parkvisit[0]->age == "above" ): ?>checked <?php endif; ?> >
					  <label class="form-check-label" for="gridRadios1">
						Tourists Are Above 13
					  </label>
					</div>
				</div>
			</div -->
		
		<hr class="mb-4">
		  <div class="row">
    <div class="col-md-6 order-md-2">
		  <div class="mb-3">
            <label for="nationality">Nationality</label>
            <select class="form-control" id="myselect" onchange="myFunction()" name="nationality"  value="" required>
					<option>Choose Nationality</option>
					  <?php echo $__env->make('Lists.countries_edit', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</select>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
		  </div>
		  <div class="col-md-6 order-md-2">
		  
          <div class="mb-3">
            <label for="continent">Region/Continent</label>
                       <input type="text" class="form-control" id="memo" name="continent" placeholder="Region" value="" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
		</div>
		</div>
		
		 <?php echo $__env->make('Parks.pick', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
		
		<hr class="mb-4">
		
		<div class="row">
    <div class="col-md-6 order-md-2">
		<div class="form-group">
			 <label for="park_name">Park Name</label>
			<select class="form-control"  name="park_name" onchange="showCustomer(this.value)">
			  <option>Choose Park</option>
			  <?php $__currentLoopData = $parks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $po): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
			  <option <?php if( $parkvisit[0]->park_name == $po->name ): ?>selected <?php endif; ?> ><?php echo e($po->name); ?></option>
			  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
			  
			</select>
		</div>
		
		</div>
		<div class="col-md-6 order-md-2">
		
		<input type="text" class="form-control" id="self_drivers" name="self_drivers" value="Not Applicable" hidden>
			<div id="txtHint">
			<p><small>
			Citizens (ZK) : <?php echo e($pa[0]->citizens); ?><br>
            Residents/SADC Nationals (USD) : <?php echo e($pa[0]->sadc); ?><br>
            International (USD) : <?php echo e($pa[0]->international); ?><br>
            Self Drives (Residents/Non-Residents) (USD) : <?php echo e($pa[0]->self_drivers); ?>

			</small></p>
			</div>
			
			
		</div>
		</div>
		
		<hr class="mb-4"> 
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month" name="month">
			  <option>Select Month</option>
			  <option value="January" <?php if( $parkvisit[0]->month == "January" ): ?>selected <?php endif; ?> >January</option>
			  <option value="Febuary" <?php if( $parkvisit[0]->month == "Febuary" ): ?>selected <?php endif; ?> >Febuary</option>
			  <option value="March" <?php if( $parkvisit[0]->month == "March" ): ?>selected <?php endif; ?> >March</option>
			  <option value="April" <?php if( $parkvisit[0]->month == "April" ): ?>selected <?php endif; ?> >April</option>
			  <option value="May" <?php if( $parkvisit[0]->month == "May" ): ?>selected <?php endif; ?> >May</option>
			  <option value="June" <?php if( $parkvisit[0]->month == "June" ): ?>selected <?php endif; ?> >June</option>
			  <option value="July" <?php if( $parkvisit[0]->month == "July" ): ?>selected <?php endif; ?> >July</option>
			  <option value="August" <?php if( $parkvisit[0]->month == "August" ): ?>selected <?php endif; ?> >August</option>
			  <option value="September" <?php if( $parkvisit[0]->month == "September" ): ?>selected <?php endif; ?> >September</option>
			  <option value="October" <?php if( $parkvisit[0]->month == "October" ): ?>selected <?php endif; ?> >October</option>
			  <option value="November" <?php if( $parkvisit[0]->month == "November" ): ?>selected <?php endif; ?> >November</option>
			  <option value="December" <?php if( $parkvisit[0]->month == "December" ): ?>selected <?php endif; ?> >December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="year">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>		 
			 
			<select class="form-control" id="year" name="year">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>" <?php if( $parkvisit[0]->year == $year ): ?>selected <?php endif; ?> ><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>       
        	
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>




<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Parks/edit_park_visit.blade.php ENDPATH**/ ?>