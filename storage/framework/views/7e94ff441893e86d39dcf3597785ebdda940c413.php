 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($heritage != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
             <th>S/N</th>
              <th>Employee</th>
              <th>Name</th>
              <th>Province</th>
              <th>Citizens/Domestic (ZK)</th>
              <th>International (USD)</th>
              <th>Date Added</th>
                    </tr>
  ';
  ?>
		<?php $__currentLoopData = $heritage; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $site): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
   <?php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$site->employee_no.'</td>
                         <td>'.$site->name.'</td>          
                         <td>'.$site->province.'</td>          
                         <td>'.$site->domestic.'</td>         
                         <td>'.$site->international.'</td>          
                         <td>'.$site->created_at.'</td>          
                    </tr>
   ';
   	?>
			<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
   <?php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Heritage Sites '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Heritage/heritage_excel.blade.php ENDPATH**/ ?>