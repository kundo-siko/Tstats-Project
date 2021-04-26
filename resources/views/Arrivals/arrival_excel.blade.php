 @php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($arrivals != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
               <th>S/N</th>
              <th>Employee</th>
              <th>Tourists</th>
              <th>Nationality</th>
              <th>Continent/Region</th>
              <th>Point of Entry</th>
              <th>Point Region</th>
              <th>Point Type</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  @endphp
		@foreach ($arrivals as $arrival)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$arrival->employee_no.'</td>
                         <td>'.$arrival->number.'</td>
                         <td>'.$arrival->nationality.'</td>
                         <td>'.$arrival->continent.'</td>		
                         <td>'.$arrival->point.'</td> 
                         <td>'.$arrival->point_region.'</td> 
                         <td>'.$arrival->point_type.'</td> 
                         <td>'.$arrival->month.'</td>  
                         <td>'.$arrival->year.'</td>          
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Arrivals '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   