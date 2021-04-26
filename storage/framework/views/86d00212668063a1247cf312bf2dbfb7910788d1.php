 <?php
		$x = 1; 
		
	//export.php  

$output = '';

 if($points != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>#</th>
              <th>Employee Number</th>
              <th>Name</th>
              <th>Region</th>
              <th>Type</th>     
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $points; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$p->employee_no.'</td>                         
                         <td>'.$p->name.'</td> 
                         <td>'.$p->region.'</td> 
                         <td>'.$p->type.'</td>       
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Point of Entry/Exit.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Points_of_entry/point_excel.blade.php ENDPATH**/ ?>