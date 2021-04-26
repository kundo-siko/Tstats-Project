 <?php
$severname = "localhost";
$username = "root";
$password = "";
$database = "tstats";
$mysqli = new mysqli($severname, $username, $password, $database);
if($mysqli->connect_error) {
  exit('Could not connect');
}

$sql = "SELECT region, type
FROM points WHERE name = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_GET['q']);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($region, $type);
$stmt->fetch();
$stmt->close();


echo '<div class="row">';
echo '<div class="col-md-8 order-md-2">';
echo '<div class="mb-3">';
echo '<label for="point_region">Region</label>';
echo '<input type="text" class="form-control" id="point_region" name="point_region" value="'.$region.'" readonly>';
echo '<div class="invalid-feedback">';
echo 'Valid last name is required.';
echo '</div>';
echo '</div>';
echo '</div>';
		 
		  
echo '
		<div class="col-md-4 order-md-2">
		<div class="mb-3">
            <label for="point_type">Type</label>
            <input type="text" class="form-control" id="point_type" name="point_type" value="' .$type. '" readonly>
            <div class="invalid-feedback">
              Valid last name is required.
            </div>
          </div>
          </div>
          </div>
		  
		  ';
		  


?> 
<?php /**PATH C:\wamp64\www\Tstats\resources\views/Points_of_entry/p.blade.php ENDPATH**/ ?>