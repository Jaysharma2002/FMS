<?php
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$did = $_GET['diet_id'];
$md = $_GET['md'];
$ad = $_GET['ad'];
$ed = $_GET['ed'];
$cost = $_GET['cost'];

echo "<body style='background-color: #f8d7da;'>"; // Light pink background
echo "</body>";

if ($db) {
    $query = "UPDATE diet SET mdiet='$md', adiet='$ad', ediet='$ed', cost='$cost' WHERE diet_id='$did'";
    $result = pg_query($db, $query);

    if ($result) {
        echo "<center><h3 style='font-size:200%; color: #721c24;'>Data Updated Successfully</h3><br>";
    } else {
        echo "<h3 style='font-size:300%; color: #721c24;'>Data Not Updated</h3>";
    }

    $aa = "SELECT diet_id, mdiet, adiet, ediet, cost FROM diet";
    $res1 = pg_query($db, $aa);

    echo "<html><body><center>";
    echo "<h2 style='font-size:200%; color: #721c24;'>Diet Details</h2><br><br>";

    // Table styling
    echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto; background-color: rgba(255, 255, 255, 0.9);'>";
    echo "<tr style='background-color: #f5c6cb; color: #721c24;'>";
    echo "<th style='padding: 10px;'>Diet Code</th>";
    echo "<th style='padding: 10px;'>Morning Diet</th>";
    echo "<th style='padding: 10px;'>Afternoon Diet</th>";
    echo "<th style='padding: 10px;'>Evening Diet</th>";
    echo "<th style='padding: 10px;'>Cost</th>";
    echo "</tr>";

    // Fetch and display each row with alternating row colors
    $rowIndex = 0;
    while ($row = pg_fetch_row($res1)) {
        $bgColor = ($rowIndex % 2 == 0) ? 'rgba(255, 230, 232, 0.8)' : 'rgba(255, 210, 215, 0.8)'; // Alternate row background color
        echo "<tr style='background-color: $bgColor;'>";
        echo "<td style='padding: 10px; text-align: center;'>$row[0]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[1]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[2]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[3]</td>";
        echo "<td style='padding: 10px; text-align: center;'>$row[4]</td>";
        echo "</tr>";
        $rowIndex++;
    }

    echo "</table></center></body></html>";

    pg_free_result($res1);
    pg_close($db);
    echo "<center><h3 style='font-size:150%; color: #721c24;'><a href='trainer_page.html' style='color: #721c24; text-decoration: none;'>Finish</a></h3></center>";
}
?>
