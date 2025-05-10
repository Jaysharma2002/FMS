<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$random_id=rand(1000,6000);
$fname=$_GET['fname'];
$mname=$_GET['mname'];
$lname=$_GET['lname'];
$gender=$_GET['gender'];
$city=$_GET['city'];
$address=$_GET['address'];
$phone=$_GET['phone'];
$pass=$_GET['pass'];
$mhist=$_GET['mhist'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   $query="INSERT INTO user1(fname,mname,lname,gender,city,address,phone,pass,mhist,uid)values('$fname','$mname','$lname','$gender','$city','$address','$phone','$pass','$mhist','$random_id')";
   $result=pg_query($db,$query);
   if($result)
           echo "<center><h1 style='font-size:300%;'>Data inserted Successfully</h1><br>";
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
    xmlhttp.open("GET","login1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body>

<form>
<h3 style='font-size:300%;'>enter user name<input type="text" name="status" onchange="showUser(this.value)"></h3>
 </form>
<br>
<div id="txtHint"><b>Details are listed here...</b></div>
<h2><a href="appointment.html">Book Appointment Here</a></h2>
</body>
</html>

