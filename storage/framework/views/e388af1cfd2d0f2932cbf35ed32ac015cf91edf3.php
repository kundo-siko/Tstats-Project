 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($parks != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>S/N</th>
              <th>Employee</th>
              <th>Name</th>
              <th>Category</th>
              <th>Province</th>
              <th>Citizens (ZK)</th>
              <th>Residents/SADC Nationals (USD)</th>
              <th>International (USD)</th>
              <th>Self Drives (Residents/Non-Residents) (USD)</th>
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $parks; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $park): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$park->employee_no.'</td>
                         <td>'.$park->name.'</td>          
                         <td>'.$park->category.'</td>          
                         <td>'.$park->province.'</td>          
                         <td>'.$park->citizens.'</td>          
                         <td>'.$park->sadc.'</td>          
                         <td>'.$park->international.'</td>          
                         <td>'.$park->self_drivers.'</td>          
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All National Parks '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Parks/park_excel.blade.php ENDPATH**/ ?>