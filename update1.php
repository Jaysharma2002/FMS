<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$name=$_GET['q'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
  
   $aa="Select fname,mname,lname,gender,address,phone,uid from user1 where fname='$name'";
   $res1=pg_query($db,$aa);
   echo"<html><body><center><h3 style='font-size:130%;'>User Details<br><br>";
   echo"<table border=1><tr><th>firstname</th><th>middlename</th><th>lastname</th><th>gender</th><th>address</th><th>PhoneNo</th><th>UID</th></tr>";
  while($row=pg_fetch_row($res1))
      {
        echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr>";
  }

  echo"</table></center></body></html>";

   pg_free_result($res1);

  pg_close($db);
  
}
?>
