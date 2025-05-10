<?php
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$tid = $_GET['tid'];

echo "<body style='background-color: #f8d7da;'>"; // Soft pink background
echo "</body>";

if ($db) {
    $query = "DELETE FROM treatment WHERE treat_id='$tid'";
    $result = pg_query($db, $query);

    if ($result) {
        echo "<center><h3 style='font-size:200%; color: #721c24;'>Data Deleted Successfully</h3><br>";
    } else {
        echo "<h3 style='font-size:200%; color: #721c24;'>Data Deletion Failed</h3>";
    }

    $aa = "SELECT * FROM treatment";
    $res1 = pg_query($db, $aa);

    if (pg_num_rows($res1) > 0) {
        echo "<html><body><center>";
        echo "<h3 style='font-size:200%; color: #721c24;'>Treatment Details</h3><br><br>";

        // Table styling
        echo "<table border='1' style='border-collapse: collapse; width: 80%; margin: 20px auto; background-color: rgba(255, 255, 255, 0.9);'>";
        echo "<tr style='background-color: #f5c6cb; color: #721c24;'>";
        echo "<th style='padding: 10px;'>Treatment Code</th>";
        echo "<th style='padding: 10px;'>Treatment Type</th>";
        echo "<th style='padding: 10px;'>Description</th>";
        echo "<th style='padding: 10px;'>Cost</th>";
        echo "<th style='padding: 10px;'>Doctor Name</th>";
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
    }

    pg_free_result($res1);
    pg_close($db);

    echo "<center><h3 style='font-size:130%;'><a href='doctor_page.html' style='color: #721c24; text-decoration: none;'>Finish</a></h3></center>";
}
?>
