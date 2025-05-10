<?php
// Get the date from the query parameter
$date = $_GET['q'];

// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect to the database");

// Set a query to fetch appointments for the selected date
$query = pg_query($db, "SELECT * from appointment where date = '$date'") or die("Query failed");

if (pg_num_rows($query) > 0) {
    // Start displaying appointment details in a table
    echo "<table border='1' style='margin:auto; width: 80%; border-collapse: collapse;font-size:25px;'>";
    echo "<tr><th>Appointment_id</th><th>User_id</th><th>Age</th><th>Height</th><th>Weight</th><th>No</th><th>Date</th><th>Status</th></tr>";

    // Fetch and display each row
    while ($row = pg_fetch_row($query)) {
        echo"<tr style='font-weight:bolder;text-align:center;'><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
    }
    
    echo "</table>";
} else {
    // If no appointments match the selected date
    echo "<h3 style='color: red; text-align: center;'>No appointments found for the selected date.</h3>";
}

// Close the database connection
pg_close($db);
?>
