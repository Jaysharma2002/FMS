<?php
$username=$_GET['user'];
$password=$_GET['pass'];

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

$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");

if($username=='admin' && $password=='admin')
{
        header("Location:admin_page.html");
 }
else
{
        echo "<div class='message'><h1>Not Logged In</h1></div>";
        echo "<div class='message'><a href='admin_login.html'>Go back</a></div>";
}
 

pg_close($db);
?>

