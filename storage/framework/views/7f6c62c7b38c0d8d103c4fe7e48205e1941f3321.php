<?php
$provinces = array(
    "Central Province", 
    "Copperbelt Province ",
    "Eastern Province",
    "Luapula Province", 
    "Lusaka Province", 
    "Muchinga Province", 
    "Northern Province", 
    "North-Western Province ",
    "Southern Province", 
    "Western Province" 
	);
 foreach($provinces as $province){
?>
  <option  value="<?php echo $province; ?>">
 <?php echo $province; ?>
  </option> 
<?php } ?><?php /**PATH C:\wamp64\www\Tstats\resources\views/Lists/provinces.blade.php ENDPATH**/ ?>