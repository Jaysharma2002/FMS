<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$fid=rand(100,500);
$fname=$_GET['fname'];
$lname=$_GET['lname'];
$email=$_GET['email'];
$phone=$_GET['phone'];
$comment=$_GET['comment'];
$mname=$_GET['mname'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   $query="INSERT INTO feedback(fid,fname,lname,email,phoneno,comment,mname)values('$fid','$fname','$lname','$email','$phone','$comment','$mname')";
   $result=pg_query($db,$query);
   if($result)
   {
	   echo "<h3 style='font-size:300%;'><center>Data inserted Successfully<br></h1>";
	   echo "<h3 style='font-size:300%;'><center>Thankyou So Much For your wonderful Time</center></h2>";
   }
   else
	   echo "not inserted";
  
  //pg_free_result($res1);
  pg_close($db);
  echo"<center><h3 style='font-size:300%;'><a href='appointment.html'>NEXT</a></h2></center>";
}
?>
<html>
<head>
</head>
<body style="background-image:url(feed.jpg);background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%">
</body>
</html>
