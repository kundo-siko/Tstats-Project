 @php
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
              <th>Nationality</th>
              <th>Park Name</th>
              <th>Currency/Type</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  @endphp
		@foreach ($parkvisit as $park)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$park->employee_no.'</td>
                         <td>'.$park->number.'</td>         
                         <td>'.$park->nationality.'</td>          
                         <td>'.$park->park_name.'</td>          
                         <td>'.$park->fee_type.'</td>          
                         <td>'.$park->fee.'</td>          
                         <td>'.$park->month.'</td>          
                         <td>'.$park->year.'</td>          
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All National Park Visit '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   