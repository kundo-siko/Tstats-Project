<?php
$title = "Add Arrival";
?>



<?php $__env->startSection('title', 'Page Title'); ?>

<?php $__env->startSection('content'); ?>

  <div class="py-5 text-center">

    <h2>Ministry of Tourisn and Arts</h2>
    <p class="lead">Below is an example form built entirely with Bootstrap’s form controls. Each required form group has a validation state that can be triggered by attempting to submit the form without completing it.</p>
  </div>

  <div class="row">

    <div class="col-md-10 order-md-2">
      <h4 class="mb-3">Tourist Arrival Details</h4>
      <form class="needs-validation" novalidate>
        
          <div class="mb-3">
            <label for="firstName">Nationality</label>
            <input type="text" class="form-control" list="country" id="firstName" placeholder="" value="" required>
					<datalist class="form-group" id="country">
					  <?php echo $__env->make('Lists.countries', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
					</datalist>
            <div class="invalid-feedback">
              Valid first name is required.
            </div>
          </div>
          
          <div class="mb-3">
            <label for="lastName">Region</label>
            <input type="text" class="form-control" id="lastName" placeholder="" value="" required>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
		
		<div class="form-group">
			 <label for="poe">Point Of Entry</label>
			<select class="form-control" id="poe">
			  <option>Choose Point of Entry</option>
			  <option>2</option>
			  <option>3</option>
			  <option>4</option>
			  <option>5</option>
			</select>
		</div>
		
      <div class="mb-3 form-group">
         <label for="address">Month</label>	
			<select class="form-control" id="month">
			  <option>Select Month</option>
			  <option value="January">January</option>
			  <option value="Febuary">Febuary</option>
			  <option value="March">March</option>
			  <option value="April">April</option>
			  <option value="May">May</option>
			  <option value="June">June</option>
			  <option value="July">July</option>
			  <option value="August">August</option>
			  <option value="September">September</option>
			  <option value="October">October</option>
			  <option value="November">November</option>
			  <option value="December">December</option>
			</select>
		</div>
		  
		 <div class="mb-3 form-group">
          <label for="address">Year</label>
           <?php $years = range(1900, strftime("%Y", time())); ?>
		 
			 <label for="poe">Point Of Exist</label>
			<select class="form-control" id="poe">
			  <option>Select Year</option>
			  <?php foreach($years as $year) : ?>
				<option value="<?php echo $year; ?>"><?php echo $year; ?></option>
			  <?php endforeach; ?>
			</select>
		</div>
       
        <hr class="mb-4">
        <button class="btn btn-primary btn-lg" type="submit">Save Details</button>
      </form>
    </div>
  </div>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('layouts.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/arrivals.blade.php ENDPATH**/ ?>