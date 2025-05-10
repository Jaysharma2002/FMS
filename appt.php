<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$random_id=rand(1000,6000);
$name=$_GET['name'];
$age=$_GET['age'];
$height=$_GET['height'];
$weight=$_GET['weight'];
$no=$_GET['no'];
$date=$_GET['date'];
$doctor=$_GET['Doctor'];
$trainer=$_GET['Trainer'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   $query="INSERT INTO appointment(aid,name,age,height,weight,no,date,status,dname,tname)values('$random_id','$name','$age','$height','$weight','$no','$date','booked','$doctor','$trainer')";
   $result=pg_query($db,$query);
   if($result)
	   echo "<center>Data inserted Successfully<br>";
           
   else
	   echo "not inserted";
   $aa="Select * from appointment where name='$name'";
   $res1=pg_query($db,$aa);
   echo"<html><body><center><h2>Appointment Details<br><br>";
   echo"<table border=1><tr><th>aid</th><th>name</th><th>age</th><th>height</th><th>weight</th><th>no</th><th>date</th><th>Status</th></tr>";
  while($row=pg_fetch_row($res1))
      {
        echo"<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
  }
  
  echo"</table></h2></center></body></html>";
   pg_free_result($res1);

  pg_close($db);
  echo "<center><a href='bmi.html'>Calculate Your BMI....!!!!</a></center>";
  
}
