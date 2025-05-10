<?php
session_start();
$tid = $_SESSION['tid']; // Trainer ID stored in the session

// Connect to the PostgreSQL database
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");

// Check if a "Mark as Completed" request was made
if (isset($_POST['appointments'])) {
    // Retrieve the array of selected appointment IDs from the checkbox
    $appointment_ids = $_POST['appointments'];
    
    foreach ($appointment_ids as $aid) {
        // Update the status to 'Completed' for each selected appointment ID
        $update_query = pg_query($db, "UPDATE appointment SET tstatus = 'Completed' WHERE aid = '$aid' AND tid = '$tid'") or die("Update query failed");
    }
}

// Query to retrieve the trainer's appointments with status 'Booked'
$query = pg_query($db, "SELECT * FROM appointment WHERE tid = '$tid' AND tstatus = 'booked'") or die("Cannot Select");

// Display the appointments in a table
if (pg_num_rows($query) > 0) {
    echo "<h3 style='font-size:130%; text-align: center;'>Appointment Details</h3><br>";
    echo "<form method='POST' action=''>"; // Added form tag for submission
    echo "<table style='width: 100%; border-collapse: collapse; margin: 20px auto;'>
            <tr style='background-color: #f2f2f2;'>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Select</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Appointment ID</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>User ID</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Age</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Height</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Weight</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Phone No</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Appointment Date</th>
                <th style='padding: 10px; border: 1px solid #dddddd;'>Status</th>
            </tr>";

    while ($row = pg_fetch_assoc($query)) {
        echo "<tr>
                <td style='padding: 10px; border: 1px solid #dddddd;'><input type='checkbox' name='appointments[]' value='{$row['aid']}'></td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['aid']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['uid']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['age']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['height']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['weight']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['no']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['date']}</td>
                <td style='padding: 10px; border: 1px solid #dddddd;'>{$row['tstatus']}</td>
              </tr>";
    }

    echo "</table>";
    echo "<div id='checkbox-container' style='text-align: center; margin-top: 20px;'>
            <label for='mark-completed' style='margin-right: 10px;'>Mark selected appointments as Completed</label>
            <input type='submit' id='submit-button' value='Submit' style='padding: 10px 20px; background-color: #4CAF50; color: white; border: none; cursor: pointer;'>
          </div>";
    echo "</form>"; // Closing the form tag
} else {
    echo "<center><h3>No booked appointments found for this trainer.</h3></center>";
}

// Close the database connection
pg_close($db);
?>
<a href="trainer_page.html" style="display: block; text-align: center; margin-top: 20px; color: blue; text-decoration: none;">Go Back</a>
