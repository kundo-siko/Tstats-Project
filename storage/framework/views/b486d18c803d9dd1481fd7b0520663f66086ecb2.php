 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($special != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
               <th>S/N</th>
              <th>ID</th>
              <th>Employee</th>
              <th>Name</th>   
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $special; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $special): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$special->id.'</td>
                         <td>'.$special->employee_no.'</td>
                         <td>'.$special->name.'</td>      
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Special Tourist Type '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Special_Tourist/special_excel.blade.php ENDPATH**/ ?>