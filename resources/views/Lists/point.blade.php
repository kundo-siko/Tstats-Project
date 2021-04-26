<?php
$points = array(
"Simon Mwansa Kapwepwe International Airport",
"Sakania",
"Mukambo",
"Kipushi",
"Jimbe",
"Victoria Falls",
"Katoma Mulilo",
"Kazungula",
"Harry Mwanga Nkumbula International Airport",
"Kenneth Kaunda International Airport",
"Chirundu",
"Kariba",
"Feria/Luangwa",
"Mwami",
"Mfuwe",
"Nakonde",
"Mpulungu",
"Nsumbu",
);
foreach($points as $point){
?>
  <option value="<?php echo $point; ?>" >
 <?php echo $point; ?>
  </option> 
<?php } 

?>