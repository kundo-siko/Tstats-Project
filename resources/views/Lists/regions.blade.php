<?php
$regions = array(
"Copperbelt and North-Western",
"Southern and Western",
"Lusaka and Eastern",
"Northern, Luapula and Muchinga"
);
foreach($regions as $region){
?>
  <option value="<?php echo $region; ?>" @if( $points[0]->region == $region )selected @endif >
 <?php echo $region; ?>
  </option> 
<?php } 

?>