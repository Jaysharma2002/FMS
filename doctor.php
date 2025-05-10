<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$random_id=rand(1000,6000);
$name=$_GET['name'];
$phoneno=$_GET['phoneno'];
$spl=$_GET['spl'];
$exp=$_GET['exp'];
$email=$_GET['email'];
echo"<body bgcolor='pink'>";
echo"</body>"; 
if($db)
{
   $query="INSERT INTO doctor(did,dname,phoneno,specialization,experience,email)values('$random_id','$name','$phoneno','$spl','$exp','$email')";
   $result=pg_query($db,$query);
   if($result)
           echo "<center><h3 style='font-size:300%;'>Data inserted Successfully<br>";
   else
           echo "not inserted";
   
 
  pg_close($db);
   
}
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
    xmlhttp.open("GET","doctor1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<form>
enter user name <input type="text" name="status" onchange="showUser(this.value)">
 </form>
<br>
<div id="txtHint"><b>Details are listed here...</b></div>
<h3 style='font-size:300%;'><a href="admin_page.html">Finish</a></h3>
</body>
</html>
