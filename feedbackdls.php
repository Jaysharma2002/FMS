<?php
// Get the query parameter
$q = $_GET['q'];

// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");

// Sanitize the input to avoid SQL injection
$q = pg_escape_string($q);

// Start HTML content
echo "<body bgcolor='pink'>";

// Execute the query to get payment details for the given name
$query = pg_query($db, "SELECT * FROM feedback WHERE mname='$q'") or die("Cannot execute query");

// Check if there are any results
if (pg_num_rows($query) > 0) {
    echo "<html><body><center><h5 style='font-size:300%;'>Feedback Details</h5><br><br>";
    echo"<table border=1><tr><th>Feedback_id</th><th>Name</th><th>Lname</th><th>email</th><th>phoneno</th><th>comment</th></tr>";

    // Fetch and display each row of the result
    while ($data = pg_fetch_row($query)) {
        echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>";
    }

    echo "</table></center></body></html>";
} else {
    // If no rows are found, display a message
    echo "<center><h5 style='font-size:300%;'>No payment details found for '$q'</h5></center>";
}

// Link to go back to the doctor's page
echo "<center><h5 style='font-size:300%;'><a href='doctor_page.html'>Finish</a></h5></center>";

// Close the database connection
pg_close($db);
?>