 @php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  

$output = '';

 if($heritage_visit != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
             <th>S/N</th>
              <th>Employee</th>
              <th># of Tourist</th>
              <th>Age</th>
              <th>Nationality</th>
              <th>Site Visited</th>
              <th>Fee Type/Currency</th>
              <th>Fee</th>
              <th>Month</th>
              <th>Year</th>
                    </tr>
  ';
  @endphp
		@foreach ($heritage_visit as $h)
   @php
   $output .= '
					<tr>  
                          <td>'.$x++.'</td>  
                         <td>'.$h->employee_no.'</td>
                         <td>'.$h->number.'</td>           
                         <td>'.$h->age.' 18</td>           
                         <td>'.$h->nationality.'</td>        
                         <td>'.$h->heritage_site.'</td>        
                         <td>'.$h->fee_type.'</td>       
                         <td>'.$h->fee.'</td>       
                         <td>'.$h->month.'</td>       
                         <td>'.$h->year.'</td>        
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Heritage Sites '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   
		      