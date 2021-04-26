 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($museums != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
             <th>S/N</th>
              <th>Employee</th>
              <th>Name</th>
              <th>Citizens (ZK)</th>
              <th>International (USD)</th>
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $museums; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $museum): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$museum->employee_no.'</td>
                         <td>'.$museum->name.'</td>           
                         <td>'.$museum->citizen.'</td>        
                         <td>'.$museum->international.'</td>       
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Museums '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   
		      <?php /**PATH C:\wamp64\www\Tstats\resources\views/Museums/museum_excel.blade.php ENDPATH**/ ?>