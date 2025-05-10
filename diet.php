<?php
session_start();
$uid = $_SESSION['uid'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Diet Details</title>
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

        h3 {
            font-size: 2rem;
            margin: 20px 0;
            color: #495057; /* Dark gray color */
        }

        #txtHint {
            font-size: 1.5rem;
            background-color: white; /* White background for the details */
            border-radius: 10px; /* Rounded corners */
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1); /* Subtle shadow */
            padding: 20px;
            margin-top: 20px;
        }

        input[type="button"] {
            padding: 10px 20px;
            font-size: 1.5rem;
            border: none;
            border-radius: 5px;
            background-color: #5cb85c; /* Green button */
            color: white; /* White text for the button */
            cursor: pointer; /* Pointer cursor on hover */
            transition: background-color 0.3s; /* Smooth background transition */
        }

        input[type="button"]:hover {
            background-color: #4cae4c; /* Darker green on hover */
        }
    </style>
    <script>
        function showUser() {
            var uid = "<?php echo $uid; ?>"; // Embedding the PHP $uid variable into JavaScript
            if (uid == "") {
                document.getElementById("txtHint").innerHTML = "";
                return;
            } else {
                var xmlhttp = new XMLHttpRequest();
                xmlhttp.onreadystatechange = function() {
                    if (this.readyState == 4 && this.status == 200) {
                        document.getElementById("txtHint").innerHTML = this.responseText;
                    }
                };
                xmlhttp.open("GET", "diet2.php?uid=" + uid, true); // Sending $uid as a parameter
                xmlhttp.send();
            }
        }
    </script>
</head>
<body bgcolor='pink'>
    <form>
        <h1>Click to Get Details <input type="button" value="Submit" onclick="showUser()"></h1>
    </form>
    <br>
    <h3><div id="txtHint"><b>Details are listed here...</b></div></h3>
</body>
</html>
