<?php
$host = "host=localhost";
$port = "port=5432";
$dbname = "dbname=project";
$cre = "user=postgres password=1234";

echo "<body style='background-color: #d4edda;'>"; // Light green background
echo "</body>";

$db = pg_connect("$host $port $dbname $cre");
$pname = $_GET['q'];

if ($db) {
    $aa = "SELECT * FROM payment WHERE name='$pname'";
    $res1 = pg_query($db, $aa);

    echo "<html><body>";
    echo "<center>";
    echo "<h3 style='font-size:200%; color: #155724;'>Payment Details</h3><br><br>"; // Dark green header text

    // Table styling
    echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto;'>";
    echo "<tr style='background-color: #28a745; color: white;'>"; // Green header row
    echo "<th style='padding: 10px;'>Payment ID</th>";
    echo "<th style='padding: 10px;'>User Name</th>";
    echo "<th style='padding: 10px;'>Payment Date</th>";
    echo "<th style='padding: 10px;'>Payment Mode</th>";
    echo "<th style='padding: 10px;'>Amount</th>";
    echo "</tr>";

    // Fetch and display each row with alternating row colors
    $rowIndex = 0;
    while ($row = pg_fetch_row($res1)) {
        $bgColor = ($rowIndex % 2 == 0) ? '#e9f7ef' : '#c3e6cb'; // Light green alternating row colors
        echo "<tr style='background-color: $bgColor;'>";
        echo "<td style='padding: 10px; text-align: center;'>$row[0]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[1]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[2]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[3]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[4]</td>";
        echo "</tr>";
        $rowIndex++;
    }

    echo "</table>";
    echo "</center>";
    echo "</body></html>";
    pg_close($db);
}
?>
