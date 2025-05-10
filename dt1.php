<?php
$btype=$_GET['dietype'];
$fname=$_GET['first_name'];
$dname=$_GET['Doctor'];
echo"<body bgcolor='pink'>";
echo"</body>";

$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234" )or die("Cannot connect");
echo "<center><h3 style='font-size:300%;'>$fname</center><br></h3>";
echo "<center><h3 style='font-size:300%;'>Doctor Name $dname</center><br></h3>";
echo "<center><h3 style='font-size:300%;>'Your BMI Type is $btype</center><br></h3>";
echo "<center><h3 style='font-size:300%;'>According $dname the treatment you must follow</center></h3>";
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
    xmlhttp.open("GET","dt2.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<h1>Enter DName<input type="text" name="status" onchange="showUser(this.value)"></h1>
 </form>
<br>
<div id="txtHint"><b>Details are listed here...</b></div>

</body>
</html>
