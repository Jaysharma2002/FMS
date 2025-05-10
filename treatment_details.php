<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$user_id = (int) $_POST['uid']; // Ensure the user ID is an integer for safety

$query = "SELECT * FROM treatment WHERE uid = $user_id";
$result = pg_query($db, $query);

if (!$result) {
    echo "An error occurred.\n";
    exit;
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Treatment Details</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            flex-direction: column;
            align-items: center;
            margin: 0;
            padding: 20px;
        }

        h2 {
            color: #333;
        }

        table {
            width: 80%;
            border-collapse: collapse;
            margin-top: 20px;
            background-color: white;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        th, td {
            padding: 10px;
            text-align: center;
            border: 1px solid #ddd;
        }

        th {
            background-color: #5cb85c;
            color: white;
        }

        tr:hover {
            background-color: #f1f1f1;
        }

        a {
            margin-top: 20px;
            text-decoration: none;
            color: #5cb85c;
            font-weight: bold;
        }

        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h5>Treatment Details</h5>

<?php
if (pg_num_rows($result) > 0) {
    echo "<table>";
    echo "<tr><th>Treatment_Id</th><th>Treatment_Type</th><th>Description</th><th>Cost</th><th>Doctor_Id</th><th>User_Id</th></tr>";
    while ($data = pg_fetch_row($result)) {
        echo "<tr><td>$data[0]</td><td>$data[1]</td><td>$data[2]</td><td>$data[3]</td><td>$data[4]</td><td>$data[5]</td></tr>";
    }
    echo "</table>";
} else {
    echo "<p>No records found.</p>";
}
?>
<a href='trainer_page.html'>Go back</a>

<?php
pg_close($db);
?>

</body>
</html>

