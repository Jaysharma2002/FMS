<?php
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$tid = $_GET['tid'];
$desc = $_GET['desc'];
$cost = $_GET['cost'];

echo "<body style='background-color: #f8d7da;'>"; // Light pink background
echo "</body>";

if ($db) {
    $query = "UPDATE treatment SET description='$desc', cost='$cost' WHERE treat_id='$tid'";
    $result = pg_query($db, $query);

    if ($result) {
        echo "<center><h3 style='font-size:200%; color: #721c24;'>Data Updated Successfully</h3><br>";
    } else {
        echo "<h3 style='font-size:300%; color: #721c24;'>Update Failed</h3>";
    }

    $query1 = pg_query("SELECT * FROM treatment") or die("Cannot Select");

    if (pg_num_rows($query1) > 0) {
        echo "<html><body><center>";
        echo "<h3 style='font-size:200%; color: #721c24;'>Treatment Details</h3><br><br>";

        // Table styling
        echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto; background-color: rgba(255, 255, 255, 0.9);'>";
        echo "<tr style='background-color: #f5c6cb; color: #721c24;'>";
        echo "<th style='padding: 10px;'>Treatment ID</th>";
        echo "<th style='padding: 10px;'>Type</th>";
        echo "<th style='padding: 10px;'>Description</th>";
        echo "<th style='padding: 10px;'>Cost</th>";
        echo "<th style='padding: 10px;'>Doctor Name</th>";
        echo "</tr>";

        // Fetch and display each row with alternating row colors
        $rowIndex = 0;
        while ($data = pg_fetch_row($query1)) {
            $bgColor = ($rowIndex % 2 == 0) ? 'rgba(255, 230, 232, 0.8)' : 'rgba(255, 210, 215, 0.8)'; // Alternating row colors
            echo "<tr style='background-color: $bgColor;'>";
            echo "<td style='padding: 10px; text-align: center;'>$data[0]</td>";
            echo "<td style='padding: 10px; text-align: center;'>$data[1]</td>";
            echo "<td style='padding: 10px; text-align: center;'>$data[2]</td>";
            echo "<td style='padding: 10px; text-align: center;'>$data[3]</td>";
            echo "<td style='padding: 10px; text-align: center;'>$data[4]</td>";
            echo "</tr>";
            $rowIndex++;
        }

        echo "</table></center></body></html>";
    }

    echo "<center><h3 style='font-size:200%;'><a href='doctor_page.html' style='color: #721c24; text-decoration: none;'>Finish</a></h3></center>";
    pg_close($db);
}
?>
