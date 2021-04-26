 @php
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
              <th>Province</th>
              <th>Citizens/Domestic (ZK)</th>
              <th>International (USD)</th>
                    </tr>
  ';
  @endphp
		@foreach ($museums as $museum)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$museum->employee_no.'</td>
                         <td>'.$museum->name.'</td>              
                         <td>'.$museum->province.'</td>              
                         <td>'.$museum->domestic.'</td>        
                         <td>'.$museum->international.'</td>       
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Museums '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   
		      