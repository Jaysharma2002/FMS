<?php
echo"<body bgcolor='pink'>";
echo"</body>";
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234" )or die("Cannot connect");
$dname=$_GET['q'];
$query=pg_query("Select * from treatment where dname='$dname'");
echo "<center><table border=2 height=50 width=50>";
if(pg_num_rows($query)>0)
{
        echo"<center>Your Treatment Details are as follows <br><br>";
echo"<tr><th>treat_id</th><th>treatment_type</th><th>description</th><th>cost</th><th>dname</th></tr>";
while($data=pg_fetch_row($query))
{

        echo"<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>";
}
}
echo"</center></table><br><br>";
echo("<center><button onclick= \"location.href='dt2.html'\"><h5>Click here to get your Diet</h5></button><br><br></center>");

pg_close($db);
?>
