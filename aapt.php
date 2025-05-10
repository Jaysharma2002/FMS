<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$uid = $_SESSION['uid'];

if ($db) {	
    $aa = "SELECT * FROM appointment WHERE uid='$uid'";
    $res1 = pg_query($db, $aa);
    
    echo "<html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Appointment Details</title>
        <style>
            body {
                font-family: Arial, sans-serif;
                background-image: url('every.jpg');
                background-repeat: no-repeat;
                background-attachment: fixed;
                background-size: 100% 100%;
                color: white;
                text-align: center;
                padding: 20px;
            }

            h3 {
                font-size: 2.5rem;
                margin-bottom: 20px;
            }

            h2 {
                font-size: 2rem;
                margin-top: 20px;
                color: #5cb85c;
            }

            table {
                width: 90%;
                border-collapse: collapse;
                background-color: rgba(255, 255, 255, 0.8);
                box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
                margin: 20px auto;
                border-radius: 5px;
            }

            th, td {
                padding: 12px;
                text-align: center;
                border: 1px solid #ddd;
				background-color: white;
                color: #5cb85c;
            }

            th {
                background-color: #5cb85c;
                color: white;
            }


            a {
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
        <h3 style='font-size:300%;color:green;'><div id='txtHint'><b>Details are listed here...</b></div></h3>";
        
    echo "<table><tr><th>Appointment ID</th><th>User ID</th><th>Age</th><th>Height</th><th>Weight</th><th>No</th><th>Date</th><th>Status</th></tr>";
    
    while ($row = pg_fetch_row($res1)) {
        echo "<tr><td>$row[0]</td><td>$row[1]</td><td>$row[2]</td><td>$row[3]</td><td>$row[4]</td><td>$row[5]</td><td>$row[6]</td><td>$row[7]</td></tr>";
    }

    echo "</table>";
    pg_close($db);
} else {
    echo "<h3>Database connection failed</h3>";
}

echo "<h2><a href='bmi.html'>Calculate your BMI value</a></h2>";
echo "</center></body></html>";
?>
