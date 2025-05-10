<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$tname=$_GET['q'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   
   $aa="Select * from trainer where tname='$tname'";
   $res1=pg_query($db,$aa);
   echo"<html><body><center><h3 style='font-size:150%;'>Trainers Table<br><br>";
   echo"<table border=1><tr><th>ID</th><th>Name</th><th>PhoneNo</th><th>Specialization</th><th>Experience</th><th>Email</th></tr>";
  while($row=pg_fetch_row($res1))
      {
        echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td></tr>";
  }
  echo"</table></h2></center></body></html>";
  pg_free_result($res1);
  pg_close($db);
 
}
?>
<html>
<body style="background-image:url(every.jpg);background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%">
</html>
