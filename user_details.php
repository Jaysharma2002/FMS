<?php
// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details</title>
    <style>
        body {
            background-color: pink; /* Set the background color */
            background-image: url('every.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
        }

        h3 {
            font-size: 2.3rem;
            text-align: center;
            color: #6f42c1;
        }

        table {
            border-collapse: collapse;
            width: 80%; /* Width of the table */
            margin: 0 auto; /* Center the table */
        }

        th, td {
            border: 1px solid #ddd; /* Table border */
            padding: 10px; /* Padding inside table cells */
            text-align: center;
            background-color: white; /* Header background color */
            color: black;
        }

        th {
            background-color: #6f42c1; /* Header background color */
            color: white; /* Header text color */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Alternate row background color */
        }

        a {
            text-decoration: none;
            color: #6f42c1; /* Link color */
        }

        a:hover {
            text-decoration: underline; /* Underline on hover */
        }
    </style>
</head>
<body>

<?php
// Set the background color
// SQL query to retrieve user details
$query = pg_query("SELECT * FROM user1") or die("Cannot Select");

// Check if any rows are returned
if (pg_num_rows($query) > 0) {
    echo "<h3>User Details<br><br></h3>";
    echo "<table>
            <tr>
                <th>User ID</th>
                <th>First Name</th>
                <th>Middle Name</th>
                <th>Last Name</th>
                <th>Address</th>
                <th>Gender</th>
                <th>City</th>
                <th>Phone No.</th>
                <th>Password</th>
                <th>Medical History</th>
            </tr>";

    // Fetch and display the results
    while ($data = pg_fetch_assoc($query)) {
        echo "<tr>
                <td>{$data['uid']}</td>
                <td>{$data['fname']}</td>
                <td>{$data['mname']}</td>
                <td>{$data['lname']}</td>
                <td>{$data['address']}</td>
                <td>{$data['gender']}</td>
                <td>{$data['city']}</td>
                <td>{$data['phone']}</td>
                <td>{$data['pass']}</td>
                <td>{$data['mhist']}</td>
              </tr>";
    }

    echo "</table>";
} else {
    echo "<h3>No details found.</h3>";
}

// Provide a link to finish
echo "<center><h3><a href='admin_page.html'>Finish</a></h3></center>";

// Close the database connection
pg_close($db);
?>

</body>
</html>
