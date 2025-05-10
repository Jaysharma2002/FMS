<?php
session_start();
$dtype=$_SESSION['output'];
echo"<body bgcolor='pink'>";
echo"</body>";
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234" )or die("Cannot connect");
$uid=$_GET['uid'];
$query=pg_query("Select * from diet where uid='$uid'");
echo "<center><table border=2 height=50 width=50>";
if(pg_num_rows($query)>0)
{
    echo"<html><body><center><h3 style='font-size:130%;'>Diet Details<br><br>";
    echo"<table border=1><tr><th>Diet_id</th><th>Diet_Name</th><th>Diet_Type</th><th>Morning_Diet</th><th>Afternoon_Diet</th><th>Evening_Diet</th><th>Cost</th></tr>";
    while($data=pg_fetch_row($query))
    {
            echo"<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td><td>$data[6]</td></tr>";
    }
    if($dtype=='Normal')
{
echo("<center><button onclick= \"location.href='frame.html'\"><h5>Click here to get your Diet</h5></button><br><br></center>");
}
elseif($dtype=='Underweight')
{
        echo("<center><button onclick= \"location.href='frame2.html'\"><h5>Click here to get your Diet</h5></button><br><br></center>");     
}
elseif($dtype=='Obese'){

echo("<center><button onclick= \"location.href='frame1.html'\"><h5>Click here to get your Diet</h5></button><br><br></center>");
}
else
{
    echo "Invalid BMI type";
}
}
else{
    echo "<center><h3>You haven't got a response yet,Please Check later.</h3></center>";
    }
echo"</center></table><br><br>";
echo("<center><button onclick= \"location.href='bmi1.php'\"><h5>Go Back</h5></button><br><br></center>");
pg_close($db);
?>