<?php
$regions = array(
"Copperbelt and North-Western",
"Southern and Western",
"Lusaka and Eastern",
"Northern, Luapula and Muchinga"
);
foreach($regions as $region){
?>
  <option value="<?php echo $region; ?>" >
 <?php echo $region; ?>
  </option> 
<?php } 

?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Lists/region.blade.php ENDPATH**/ ?>