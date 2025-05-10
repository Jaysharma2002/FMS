<?php
session_start();
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$tid=$_GET['t_code'];
$type=$_GET['t_type'];
$desc=$_GET['desc'];
$cost=$_GET['cost'];
$did=$_SESSION['did'];
$uid=$_GET['uid'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   $query="INSERT INTO treatment(treat_id,treatment_type,description,cost,did,uid)values('$tid','$type','$desc','$cost','$did','$uid')";
   $result=pg_query($db,$query);
   if($result)
   {
           echo "<center><h3 style='font-size:300%;'>Data inserted Successfully<br>";
           header("Location:view.php");
   }
   else
           echo "<h3 style='font-size:300%;'>not inserted";

  //pg_free_result($res1);
  pg_close($db);
  
}								                                                                        
