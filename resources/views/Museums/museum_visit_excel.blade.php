 @php
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
  @endphp
		@foreach ($museum_visit as $museum)
   @php
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
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Museums Visits '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   
		      