 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($museum_visit != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>S/N</th>
              <th>Employee</th>
              <th># of Tourist</th>
              <th>Age</th>
              <th>Nationality</th>
              <th>Museum Visited</th>
              <th>Fee Type/Currency</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $museum_visit; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $museum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$museum->employee_no.'</td>
                         <td>'.$museum->number.'</td>           
                         <td>'.$museum->age.' 18</td>           
                         <td>'.$museum->nationality.'</td>        
                         <td>'.$museum->museum.'</td>        
                         <td>'.$museum->fee_type.'</td>       
                         <td>'.$museum->fee.'</td>       
                         <td>'.$museum->month.'</td>       
                         <td>'.$museum->year.'</td>       
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Museums Visits '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   
		      <?php /**PATH C:\wamp64\www\Tstats\resources\views/Museums/museum_visit_excel.blade.php ENDPATH**/ ?>