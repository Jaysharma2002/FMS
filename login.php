<?php
session_start();
$username=$_POST['uname'];
$password=$_POST['pass'];

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
$query="select * from user1 where fname='$username' and pass='$password'";
$res=pg_query($db,$query);
$count=pg_num_rows($res);
if($count>0)
{
  $query1="select uid from user1 where fname='$username' and pass='$password'";
  $res1=pg_query($db,$query1);
  if($res1)
  {
    $row = pg_fetch_assoc($res1);
    if ($row) {
      $_SESSION['uid'] = $row['uid'];
      header("Location: appointment.html");
    }
  }
	
	
 }
else
{
	echo "<div class='message'><h1>Not Logged In</h1></div>";
  echo "<div class='message'><a href='user_login.html'>Go back</a></div>";
}

?>
<html>
<head>
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
    xmlhttp.open("GET","login1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body style="background-image:url(every.jpg); background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%;">
<?php 
if($count>0)
{

echo"<form>";
echo"<h3 style='font-size:300%;'>enter user name <input type='text' name='status' onchange='showUser(this.value)'></h3>";
 echo"</form>";
echo"<br>";
echo"<div id='txtHint'><b>Details are listed here...</b></div>";

}
pg_close($db);
?>
</body>
</html>

	
