<?php
session_start();

$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$uid = $_GET['uid'];
$diet_id = $_GET['diet_code'];
$diet_name = $_GET['diet_name'];
$diet_type = $_GET['diet_type'];
$mdiet = $_GET['morning_diet'];
$adiet = $_GET['afternoon_diet'];
$ediet = $_GET['evening_diet'];
$cost = $_GET['cost'];
$tid = $_SESSION['tid']; 

echo "<body bgcolor='pink'></body>";

if ($db) {
    
    if ($tid) {
        
        $query = "INSERT INTO diet (diet_id, diet_name, diet_type, mdiet, adiet, ediet, cost, uid, tid) 
                  VALUES ('$diet_id', '$diet_name', '$diet_type', '$mdiet', '$adiet', '$ediet', '$cost', '$uid', '$tid')";
        $result = pg_query($db, $query);
        
        if ($result) {
            echo "<center><h3 style='font-size:300%;'>Data inserted successfully</h3></center>";
            header("Location: diet_view.php");  
        } else {
            echo "<h3 style='font-size:300%;'>Data not inserted</h3>";
        }
    } else {
        
        echo "<h3 style='font-size:300%;'>Trainer ID is missing. Please make sure you are logged in.</h3>";
    }
    
    pg_close($db);  
} else {
    echo "<h3 style='font-size:300%;'>Database connection failed</h3>";
}
?>
