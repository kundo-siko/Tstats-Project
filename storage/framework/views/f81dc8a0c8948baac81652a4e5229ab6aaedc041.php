<?php
$continents = array(
   "Africa","Asia","Europe","North-America","South-America","Australia/Oceania"
   );
	 
foreach($continents as $continent){
?> 
  <option value="<?php echo $continent; ?>">
 <?php echo $continent; ?>
  </option> 
<?php } 

?>
<?php /**PATH C:\wamp64\www\Tstats\resources\views/Lists/continents.blade.php ENDPATH**/ ?>