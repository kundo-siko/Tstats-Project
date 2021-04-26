 <?php
		$x = 1; 
		$date = date("m.d.y"); 
		
	//export.php  
$connect = mysqli_connect("localhost", "root", "", "tstats");
$output = '';
	
	if($type == 'arrival'){
	$query = "SELECT * FROM arrivals where $report = '$filter'";		
		$t = 'Entry';
		}else{
	$query = "SELECT * FROM departures where $report = '$filter'";
		$t = 'Exit';
		}
 $result = mysqli_query($connect, $query);
 if(mysqli_num_rows($result) > 0)
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
  while($row = mysqli_fetch_array($result))
  {
   $output .= '
					<tr>  
                         <td>'.$x++.'</td>  
                         <td>'.$row["employee_no"].'</td>
                         <td>'.$row["number"].'</td>
                         <td>'.$row["nationality"].'</td>
                         <td>'.$row["continent"].'</td>	
                         <td>'.$row["point"].'</td> 
                         <td>'.$row["point_region"].'</td> 
                         <td>'.$row["point_type"].'</td>  
                         <td>'.$row["month"].'</td>       
                         <td>'.$row["year"].'</td>       
                    </tr>
   ';
  }
  $output .= '</table>';
  header('Content-Type: application/xls');
  header('Content-Disposition: attachment; filename=Report by '.$type.' '.$date.'.xls');
  echo $output;
 }

		 
			?>
		   <?php /**PATH C:\wamp64\www\Tstats\resources\views/Reports/excel_report.blade.php ENDPATH**/ ?>