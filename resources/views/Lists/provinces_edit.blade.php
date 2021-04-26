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
  <option  value="<?php echo $province; ?>"  @if($prov[0]->province == $province)selected @endif >
 <?php echo $province; ?>
  </option> 
<?php } ?>