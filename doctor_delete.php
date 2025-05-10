<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$did=$_GET['did'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
    $q1="Select * from doctor where did='$did'";
    $r1=pg_query($db,$q1);
    if(pg_num_rows($r1)>0)
    {
   $query="Delete from doctor where did='$did'";
   $result=pg_query($db,$query);
   if($result)
           echo "<center><h3 style='font-size:300%;'>Data Deleted Successfully<br>";
   }
   else{
    echo "<h3 style='font-size:300%;'>No user found<br>";
   }
           

  pg_close($db);
  echo"<h3 style='font-size:300%;'><a href='admin_page.html'>Finish</a>"; 
}
?>