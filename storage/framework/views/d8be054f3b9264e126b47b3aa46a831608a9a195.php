 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($departures != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
               <th>S/N</th>
              <th>Employee</th>
              <th>Tourists</th>
              <th>Nationality</th>
              <th>Continent/Region</th>
              <th>Point of Exit</th>
              <th>Point Region</th>
              <th>Point Type</th>
              <th>Month</th>
              <th>Year</th>        
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $departures; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $departure): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$departure->employee_no.'</td>
                         <td>'.$departure->number.'</td>
                         <td>'.$departure->nationality.'</td>
                         <td>'.$departure->continent.'</td>		
                         <td>'.$departure->point.'</td> 
                         <td>'.$departure->point_region.'</td> 
                         <td>'.$departure->point_type.'</td> 
                         <td>'.$departure->month.'</td>  
                         <td>'.$departure->year.'</td>       
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Departures '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Departures/departure_excel.blade.php ENDPATH**/ ?>