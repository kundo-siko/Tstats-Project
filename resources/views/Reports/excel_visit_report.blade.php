 @php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($rp != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
             <th>S/N</th>
              <th>Employee</th>
              <th>Tourists</th>
              <th>Nationality</th>
              <th>Visited</th>
              <th>Fee Type/Currecy</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  @endphp
		@foreach ($rp as $p)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$p->employee_no.'</td>
                         <td>'.$p->number.'</td>              
                         <td>'.$p->nationality.'</td>              
                         <td>'.$p->$n.'</td>       
                         <td>'.$p->fee_type.'</td>       
                         <td>'.$p->fee.'</td>       
                         <td>'.$p->month.'</td>       
                         <td>'.$p->year.'</td>       
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All '.$type.' '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   
		      