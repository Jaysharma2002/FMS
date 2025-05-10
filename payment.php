<?php
$host="host=localhost";
$port="port=5432";
$dbname="dbname=project";
$cre="user=postgres password=1234";
$pid=rand(100,500);
$pname=$_POST['first_name'];
$d=$_POST['p_date'];
$pm=$_POST['p_mode'];
$pa=$_POST['p_amt'];
$mname=$_POST['mname'];

echo "<h3 style='font-size:300%; color: white; text-align: center;'>Payment Gateway</h3>";

$db=pg_connect("$host $port $dbname $cre");
if($db) {
    $qq = "INSERT INTO Payment VALUES('$pid', '$pname', '$d', '$pm', '$pa', '$mname')";
    $res = pg_query($db, $qq);
    if ($res) {
        echo "<h3 style='font-size:200%; color: green; text-align: center;'>Payment Successful!</h3>";
    } else {
        echo "<h3 style='font-size:200%; color: red; text-align: center;'>Payment Unsuccessful!</h3>";
    }

    pg_close($db);
}
?>
<html>
<head>
    <style>
        body {
            background-image: url('pay1.jpg');
            background-repeat: no-repeat;
            background-attachment: fixed;
            background-size: 100% 100%;
            font-family: Arial, sans-serif;
        }

        h3 {
            font-size: 130%;
            text-align: center;
            color: white;
        }

        .form-container {
            margin: 50px auto;
            width: 400px;
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
        }

        .form-container input[type="text"] {
            width: 80%;
            padding: 10px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        .form-container input[type="submit"], .form-container a {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 10px;
        }

        .form-container a:hover {
            background-color: #45a049;
        }

        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }

        .result-container {
            margin-top: 20px;
            text-align: center;
            font-size: 120%;
            color: black;
            background-color: rgba(255, 255, 255, 0.7);
            padding: 10px;
            border-radius: 8px;
        }

        img {
            display: block;
            margin: 0 auto;
            border-radius: 10px;
            box-shadow: 0px 4px 8px rgba(0,0,0,0.2);
        }

        h3 a {
            text-decoration: none;
            color: blue;
            display: block;
            margin-top: 20px;
        }
    </style>
    <script>
        function showUser(str) {
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
                xmlhttp.open("POST","payment1.php?q="+str,true);
                xmlhttp.send();
            }
        }
    </script>
</head>
<body>
    <div class="form-container">
        <form>
            <label for="status">Enter Username:</label><br>
            <input type="text" name="status" onchange="showUser(this.value)">
        </form>
        <input type="submit" value="Submit">
    </div>

    <div class="result-container" id="txtHint">
        <b>Details are listed here...</b>
    </div>

    <h3><a href="feedback.html">Feedback</a></h3>
</body>
</html>
