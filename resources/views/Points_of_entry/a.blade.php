<!DOCTYPE html>
<html>
<style>
table,th,td {
  border : 1px solid black;
  border-collapse: collapse;
}
th,td {
  padding: 5px;
}
</style>
<body>

<h2>The XMLHttpRequest Object</h2>

<form action=""> 
  <select name="customers" onchange="showCustomer(this.value)">
    <option value="">Select a customer:</option>
    <option value="Jimbe">Jimbe</option>
    <option value="Kipushi ">Kipushi</option>
    <option value="Kasumbalesa">Kasumbalesa</option>
  </select>
</form>
<br>
<div id="txtHint">Customer info will be listed here...</div>
<div id="demoo">here</div>

<script>
function showCustomer(str) {
  var xhttp;  
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  }
  xhttp = new XMLHttpRequest();
  xhttp.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      document.getElementById("txtHint").innerHTML = this.responseText;	  
    }
  };
  document.getElementById("demoo").innerHTML = str;
  xhttp.open("GET", "p?q="+str, true);
  xhttp.send();
}
</script>
</body>
</html>

