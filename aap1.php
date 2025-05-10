<?php
session_start();
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$random_id = rand(1000, 6000);
$uid = $_SESSION['uid'];

// Get parameters from GET request
$age = $_GET['age']; 
$height = $_GET['height']; 
$weight = $_GET['weight'];
$no = $_GET['no'];
$date = $_GET['date'];
$did = $_GET['Doctor'];
$tid = $_GET['Trainer'];



echo "<body bgcolor='pink'></body>";

if ($db) {
    $check_user_appointment_query = "SELECT COUNT(*) FROM appointment WHERE uid = '$uid' AND date = '$date'";
    $check_user_appointment_result = pg_query($db, $check_user_appointment_query);

    $user_appointment_count = pg_fetch_result($check_user_appointment_result, 0, 0);  // Get the count of user's appointments

    if ($user_appointment_count > 0) {
        echo "<center><h1 style='font-size:300%; color:red;'>You have already booked an appointment for this date. Please choose a different date.<br></h1>";
        echo "<a href='appointment.html'>Go Back</a>";
        exit;
    }

    // Check if the doctor has reached 100 appointments for the given date
    $check_doctor_query = "SELECT COUNT(*) FROM appointment WHERE date = '$date' AND did = '$did'";
    $check_doctor_result = pg_query($db, $check_doctor_query);

    if (!$check_doctor_result) {
        echo "Error in doctor appointment query.";
        exit;
    }

    $doctor_count = pg_fetch_result($check_doctor_result, 0, 0);  // Get the count of doctor's appointments

    // Check if the trainer has reached 100 appointments for the given date
    $check_trainer_query = "SELECT COUNT(*) FROM appointment WHERE date = '$date' AND tid = '$tid'";
    $check_trainer_result = pg_query($db, $check_trainer_query);

    if (!$check_trainer_result) {
        echo "Error in trainer appointment query.";
        exit;
    }

    $trainer_count = pg_fetch_result($check_trainer_result, 0, 0);  // Get the count of trainer's appointments

    if ($doctor_count >= 100) {
        echo "<center><h1 style='font-size:300%; color:red;'>The doctor has already booked 100 appointments for this date. Please choose a different date.<br></h1>";
        echo "<a href='appointment.html'>Go Back</a>";
    } elseif ($trainer_count >= 100) {
        echo "<center><h1 style='font-size:300%; color:red;'>The trainer has already booked 100 appointments for this date. Please choose a different date.<br></h1>";
        echo "<a href='appointment.html'>Go Back</a>";
    } else {
        $query = "INSERT INTO appointment(aid, uid, age, height, weight, no, date, dstatus , tstatus, did, tid)
                  VALUES('$random_id', '$uid', '$age', '$height', '$weight', '$no', '$date', 'booked' , 'booked', '$did', '$tid')";

        $result = pg_query($db, $query);

        if ($result) {
            echo "<center><h1 style='font-size:300%;'>Appointment booked successfully!<br></h1>";
            header("Location:aapt.php");
        } else {
            echo "<center><h1 style='font-size:300%; color:red;'>Error in booking appointment. Please try again.<br></h1>";
        }
    }

    pg_close($db);
}
?>