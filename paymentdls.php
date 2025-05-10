<?php
// Get the query parameter
$q = $_GET['q'];

// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");

// Sanitize the input to avoid SQL injection
$q = pg_escape_string($q);

// Start HTML content
?>
<!DOCTYPE html>
<html>
<head>
    <style>
        body {
            background-color: pink;
        }
        table {
            color: blueviolet;
            border-collapse: collapse;
            width: 100%;
        }
        th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: lightgray;
        }
        h5 {
            font-size: 300%;
        }
    </style>
</head>
<body>

<?php
// Execute the query to get payment details for the given name
$query = pg_query($db, "SELECT * FROM payment WHERE mname='$q'") or die("Cannot execute query");

// Check if there are any results
if (pg_num_rows($query) > 0) {
    echo "<center><h5>Payment Details</h5><br><br>";
    echo "<table><tr><th>Payment_id</th><th>Name</th><th>Date</th><th>Mode</th><th>Amount</th></tr>";

    // Fetch and display each row of the result
    while ($data = pg_fetch_row($query)) {
        echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td></tr>";
    }

    echo "</table></center>";
} else {
    // If no rows are found, display a message
    echo "<center><h5>No payment details found for '$q'</h5></center>";
}

// Link to go back to the doctor's page
echo "<center><h5><a href='doctor_page.html'>Finish</a></h5></center>";

// Close the database connection
pg_close($db);
?>

</body>
</html>