<?php
session_start();
$uid = $_SESSION['uid'];

// Database connection
$db = pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234") or die("Cannot connect");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Doctor Search</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background-color: #f8f9fa; /* Light gray background */
            color: #333; /* Dark text for readability */
            text-align: center; /* Centered text */
        }

        h1 {
            font-size: 2.5rem;
            margin: 20px 0;
            color: #6f42c1; /* Purple color */
        }

        input[type="text"] {
            padding: 10px;
            width: 300px; /* Set a fixed width for the input */
            margin: 20px 0;
            border: 2px solid #6f42c1; /* Purple border */
            border-radius: 5px; /* Rounded corners */
            font-size: 1.2rem;
            transition: border-color 0.3s; /* Smooth border transition */
        }

        input[type="text"]:focus {
            outline: none;
            border-color: #007bff; /* Blue border on focus */
        }

        #txtHint {
            font-size: 1.5rem;
            background-color: white; /* White background for the details */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
            margin-top: 20px;
            display: inline-block; /* Align it to the text */
        }
    </style>
    <script>
        function showUser(str) { // Get doctor details based on input
            if (str == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "t11.php?q=" + str, true); // Sending the input value as a parameter
                xmlhttp.send();
            }
        }
    </script>
</head>
<body bgcolor='pink'>
    <form>
        <h1>Enter Doctor Name <input type="text" name="q" onchange="showUser(this.value)"></h1>
    </form>
    <br>
    <h3><div id="txtHint"><b>Details are listed here...</b></div></h3>
</body>
</html>
