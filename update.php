<?php
$db=pg_connect("host=localhost port=5432 dbname=project user=postgres password=1234")or die("Cannot connect");
$uid=$_GET['uid'];
$name=$_GET['name'];
$address=$_GET['add'];
$phone=$_GET['phoneno'];
echo"<body bgcolor='pink'>";
echo"</body>";
if($db)
{
   $query="UPDATE user1 set fname='$name',address='$address',phone='$phone' where uid='$uid'";
   $result=pg_query($db,$query);
   if($result)
           echo "<center><h3 style='font-size:200%;'>Data Updated";
   else
           echo "not inserted";
   

  pg_close($db);
  
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
    xmlhttp.open("GET","update1.php?q="+str,true);
    xmlhttp.send();
  }
}
</script>
</head>
<body style="background-image:url(every.jpg);background-repeat: no-repeat; background-attachment: fixed; background-size: 100% 100%">

<form>
<h3 style='font-size:130%;'>enter user name</h3><input type="text" name="status" onchange="showUser(this.value)">
 </form>
<br>
<div id="txtHint"><b>Details are listed here...</b></div>
<h3><a href="admin_page.html">Finish</a></h3>
</body>
</html>
