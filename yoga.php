<?php
$btype=$_GET['dietype'];
$fname=$_GET['first_name'];
$dname=$_GET['Doctor'];
echo"<body bgcolor='pink'>";
echo"</body>";

$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234" )or die("Cannot connect");
echo "<center><h3 style='font-size:300%;'>$fname</h3></center><br>";
echo "<center><h3 style='font-size:300%;'>$dname</h3></center><br>";
echo "<center><h3 style='font-size:300%;'>$btype</h3></center><br>";
echo "<center><h3 style='font-size:300%;'>$dname and Mehta the treatment you must follow</h3></center>";


pg_close($db);
?>
<html>
<head>
<script>
function showUser(str) {
  if (str == "") {
    document.getElementById("txtHint").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("txtHint").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET","yoga2.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<h3 style='font-size:300%;'>Enter DName<input type="text" name="status" onchange="showUser(this.value)"></h3>
 </form>
<br>
<h3 style='font-size:300%;'><div id="txtHint"><b>Details are listed here...</b></div>

</body>
</html>
