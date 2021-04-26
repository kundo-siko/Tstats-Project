 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($parkvisit != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>S/N</th>
              <th>Employee</th>
              <th># of Tourists</th>
              <th>Age Bracket</th>
              <th>Nationality</th>
              <th>Park Name</th>
              <th>Currency/Type</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $parkvisit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $park): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$park->employee_no.'</td>
                         <td>'.$park->number.'</td>          
                         <td>'.$park->age.'</td>          
                         <td>'.$park->nationality.'</td>          
                         <td>'.$park->park_name.'</td>          
                         <td>'.$park->fee_type.'</td>          
                         <td>'.$park->fee.'</td>          
                         <td>'.$park->month.'</td>          
                         <td>'.$park->year.'</td>          
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All National Park Visit '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Parks/park_vists_excel.blade.php ENDPATH**/ ?>