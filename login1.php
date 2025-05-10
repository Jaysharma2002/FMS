<?php
$username=$_GET['q'];
echo "<body bgcolor='pink'>";
echo"</body>";
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$query="select * from user1 where fname='$username'";
$res=pg_query($db,$query);
$count=pg_num_rows($res);
if($count>0)
{
        
        echo"<html><body><center><h1 style='font-size:300%;'>Users Details<br><br></h1>";
        echo"<table border=1><tr><th>Fname</th><th>mname</th><th>lname</th><th>gender</th><th>city</th><th>address</th><th>phoneNo</tr>";
        while($row=pg_fetch_row($res))
        {
                echo"<p style='font-size:300%;'><tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td></tr></p>";

        }
        
}
else
{
	echo "<h1 style='font-size:300%;'>PLease register in the above given link<br></h1>";
}
 pg_close($db);
?>
