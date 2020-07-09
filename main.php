<?php 
include("db.php"); 
if ($_SESSION["loggedin"] != 1)
	header("Location: login.php");
?>

<!DOCTYPE html>
<html>
<head>
<title>URSecure Main Page</title>
<link rel="stylesheet" href="styles.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>

<body>
<div class="sidenav">
<a style="color:white; font-size:40px; cursor:pointer" onclick="window.location.href = 'main.php'">URSecure</a><br><br><br>
  <a href="main.php">Dashboard <span style="right:-132px;" class="glyphicon glyphicon-home"></a>
  <a href="houseslist.php">Members <span style="right:-150px;" class="glyphicon glyphicon-th-list"></span></a>
  <a href="paymentlist.php">Payment <span style="right:-155px;" class="glyphicon glyphicon-list-alt"></a>  
  <a onClick="return confirm('Logout?')" href="logout.php" style="position:absolute; color:white; left:20px; bottom:20px;" class="logoutbutton"><span class="glyphicon glyphicon-log-out"></span> Log out</a>   
</div>

<div class="main">
<h1 align = "center">URSecure</h1><br><br>

<div align="center" style="width:1200px;">
<span style="background-color:#e6e6e6; padding:50px; margin: 50px; width:400px; left:0px;">
<input style="padding:20px; font-size:20px;width:350px; align:bottom;" type="button" class="button" name="submitotherpage" value="Manage Members" onclick="window.location.href = 'houseslist.php'"/>
</span>
<span style="background-color:#e6e6e6; padding:50px; margin: 50px; width:400px; right:0px;">
<input style="padding:20px; font-size:20px;width:350px; align:bottom;" type="button" class="button" name="submitotherpage" value="Manage Payment" onclick="window.location.href = 'paymentlist.php'"/>
</span>
</div>
<br>
<br>
<h2> Pending Payments: </h2>
</div>
</body>
</html>