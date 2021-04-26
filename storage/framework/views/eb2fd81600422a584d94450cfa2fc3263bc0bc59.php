 <?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "tstats";
$mysqli = new mysqli($severname, $username, $password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT category, citizens, sadc, international, self_drivers
FROM parks WHERE name = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($c, $ci, $sa, $in, $sd);
$stmt->fetch();
$stmt->close();



  if($c == 'Category A'){
	echo '
	 <h5 class="card-subtitle mb-2 text-muted">If Applicable.</h5>
	 <h6 class="card-subtitle mb-2 text-muted">Note: Does not apply to citizens</h6>
	<div class="col-md-12 order-md-2">
	<div class="form-check">
          <input class="form-check-input" type="radio" name="self_drivers" id="gridRadios1" value="Self Drivers" >
          <label class="form-check-label" for="gridRadios1">
            Self Drives (Residents/Non-Residents)
          </label>
        </div>
        <div class="form-check">
          <input class="form-check-input" type="radio" name="self_drivers" id="gridRadios1" value="Not Applicable" checked>
          <label class="form-check-label" for="gridRadios1">
            Not Applicable
          </label>
        </div>
        </div>
	';	
  }	else{
	  echo '
		<p><small>
			Citizens (ZK) : '.$ci.'<br>
            Residents/SADC Nationals (USD) : '.$sa.'<br>
            International (USD) : '.$in.'<br>
            Self Drives (Residents/Non-Residents) (USD) : '.$sd.'
			</small></p>
	  ';
  }  



?> <?php /**PATH C:\wamp64\www\Tstats\resources\views/Parks/fee.blade.php ENDPATH**/ ?>