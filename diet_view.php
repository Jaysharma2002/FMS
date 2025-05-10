<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$tid = $_SESSION['tid'];

echo "<body style='background-color: #f8d7da;'>"; // Soft pink background
echo "</body>";

$query = pg_query("SELECT * FROM diet WHERE tid='$tid'") or die("Cannot Select");

if (pg_num_rows($query) > 0) {
    echo "<html><body><center>";
    echo "<h3 style='font-size:200%; color: #721c24;'>Diet Details</h3><br><br>";

    // Table styling
    echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto; background-color: rgba(255, 255, 255, 0.9);'>";
    echo "<tr style='background-color: #f5c6cb; color: #721c24;'>";
    echo "<th style='padding: 10px;'>Diet ID</th>";
    echo "<th style='padding: 10px;'>Diet Name</th>";
    echo "<th style='padding: 10px;'>Diet Type</th>";
    echo "<th style='padding: 10px;'>Morning Diet</th>";
    echo "<th style='padding: 10px;'>Afternoon Diet</th>";
    echo "<th style='padding: 10px;'>Evening Diet</th>";
    echo "<th style='padding: 10px;'>Cost</th>";
    echo "</tr>";

    // Fetch and display each row with alternating row colors
    $rowIndex = 0;
    while ($data = pg_fetch_row($query)) {
        $bgColor = ($rowIndex % 2 == 0) ? 'rgba(255, 230, 232, 0.8)' : 'rgba(255, 210, 215, 0.8)'; // Alternate row background color
        echo "<tr style='background-color: $bgColor;'>";
        echo "<td style='padding: 10px; text-align: center;'>$data[0]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[1]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[2]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[3]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[4]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[5]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$data[6]</td>";
        echo "</tr>";
        $rowIndex++;
    }

    echo "</table></center></body></html>";
}

pg_close($db);
echo "<center><h2 style='font-size:150%; color: #721c24;'><a href='trainer_page.html' style='color: #721c24; text-decoration: none;'>Go Back</a></h2></center>";
?>
