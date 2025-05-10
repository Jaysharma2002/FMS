<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$did = $_SESSION['did'];

echo "<body style='background-color: #f8d7da;'>"; // Light pink background
echo "</body>";

$query = pg_query("SELECT * FROM treatment WHERE did='$did'") or die("Cannot Select");
if (pg_num_rows($query) > 0) {
    echo "<html><body><center>";
    echo "<h3 style='font-size:200%; color: #721c24;'>Treatment Details</h3><br><br>"; // Dark red header

    // Table styling
    echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto; background-color: rgba(255, 255, 255, 0.9);'>";
    echo "<tr style='background-color: #f5c6cb; color: #721c24;'>"; // Header row with light red and dark red text
    echo "<th style='padding: 10px;'>Treatment ID</th>";
    echo "<th style='padding: 10px;'>Type</th>";
    echo "<th style='padding: 10px;'>Description</th>";
    echo "<th style='padding: 10px;'>Cost</th>";
    echo "</tr>";

    // Fetch and display each row with alternating row colors
    $rowIndex = 0;
    while ($data = pg_fetch_row($query)) {
        $bgColor = ($rowIndex % 2 == 0) ? 'rgba(255, 230, 232, 0.8)' : 'rgba(255, 210, 215, 0.8)'; // Light pink alternating row colors with slight transparency
        echo "<tr style='background-color: $bgColor;'>";
        echo "<td style='padding: 10px; text-align: center;'>$data[0]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[1]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[2]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[3]</td>";
        echo "</tr>";
        $rowIndex++;
    }

    echo "</table></center>";
    echo "</body></html>";
}

pg_close($db);
echo "<center><h3 style='font-size:130%;'><a href='doctor_page.html' style='color: #721c24; text-decoration: none;'>Go Back</a></center>"; // Go back link styled
?>
