<?php
session_start();
$username = $_POST['uname'];
$email = $_POST['email'];

echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Doctor Login</title>
    <style>
        body {
            background-color: pink;
            background-image: url('every.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
        }

        h1 {
            font-size: 3rem;
            text-align: center;
            color: Black;
            
        }

        .message {
            text-align: center;
            margin-top: 100px;
            font-size: 2.5rem;
            color: #6f42c1;
        }
    </style>
</head>
<body>
";

$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
$query = "SELECT * FROM doctor WHERE dname='$username' AND email='$email'";
$res = pg_query($db, $query);
$count = pg_num_rows($res);

if ($count > 0) {
    $query1 = "SELECT did FROM doctor WHERE dname='$username' AND email='$email'";
    $res1 = pg_query($db, $query1);
    if ($res1) {
        $row = pg_fetch_assoc($res1);
        if ($row) {
            $_SESSION['did'] = $row['did'];
            header("Location: doctor_page.html");
            exit();
        }
    }
} else {
    echo "<div class='message'><h1>Not Logged In</h1></div>";
    echo "<div class='message'><a href='doctor_login.html'>Go back</a></div>";
}

pg_close($db);

echo "</body></html>";
?>
