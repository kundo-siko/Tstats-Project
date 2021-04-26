 <?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "tstats";
$mysqli = new mysqli($severname, $username, $password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT name, domestic, international
FROM museums WHERE name = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($n, $ci, $in);
$stmt->fetch();
$stmt->close();



 
	  echo '
		<h6 class="card-subtitle mb-2 text-muted">Current Fees for '.$n.'</h6>
		<p><small>
			Citizens (ZK) : '.$ci.'<br>
            International (USD) : '.$in.'<br>
			</small></p>
	  ';

?> <?php /**PATH C:\wamp64\www\Tstats\resources\views/Museums/museum_fee.blade.php ENDPATH**/ ?>