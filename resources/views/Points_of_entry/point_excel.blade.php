 @php
		$x = 1; 
		
	//export.php  

$output = '';

 if($points != [])
 {
  $output .= '
   <table class="table" bordered="1">  
                    <tr>  
              <th>#</th>
              <th>Employee Number</th>
              <th>Name</th>
              <th>Region</th>
              <th>Type</th>     
                    </tr>
  ';
  @endphp
		@foreach ($points as $p)
   @php
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$p->employee_no.'</td>                         
                         <td>'.$p->name.'</td> 
                         <td>'.$p->region.'</td> 
                         <td>'.$p->type.'</td>       
                    </tr>
   ';
   	@endphp
			@endforeach
   @php
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=All Point of Entry/Exit.xls');
  echo $output;
 }

		 
			@endphp
		   