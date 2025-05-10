<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
echo"<body bgcolor='pink'>";
echo"</body>";
$query=pg_query(" Select fname,mname,lname,gender,city,address,phoneno,mhist from user1")or die("Cannot Select");
if(pg_num_rows($query)>0)
{
         echo"<html><body><center><h2>User Details<br><br>";
echo"<table border=1><tr><th>fname</th><th>mname</th><th>lname</th><th>gender</th><th>City</th><th>Address</th><th>phoneNo</th><th>mhist</th></tr>";
while($data=pg_fetch_row($query))
{
        echo"<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td><td>$data[6]</td><td>$data[7]</td></tr>";
}
}
echo"</table></center></h2></body></html>";
 echo"<center><a href='trainer_page.html'>Finish</a></center>";
pg_close($db);

