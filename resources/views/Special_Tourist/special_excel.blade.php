 @php
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
  @endphp
		@foreach ($special as $special)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$special->id.'</td>
                         <td>'.$special->employee_no.'</td>
                         <td>'.$special->name.'</td>      
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Special Tourist Type '.$date.'.xls');
  echo $output;
 }

		 
			@endphp
		   