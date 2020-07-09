<?php
//including the database connection file
include_once("db.php");
if ($_SESSION["loggedin"] != 1)
	header("Location: login.php");

//fetching data in descending order (lastest entry first)
//$result = mysql_query("SELECT * FROM users ORDER BY id DESC"); // mysql_query is deprecated
$result = mysqli_query($conn, "SELECT * FROM payment ORDER BY HOUSE_ID ASC, DATE_TEXT DESC"); // using mysqli_query instead
?>

<html>
<head>	
	<title>Payment List</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	.left{
	float:left;
	}
	.right{
	float:right;	
	}
	
	tr:nth-of-type(odd) {
		background-color:#ccc;
	}	
	</style>
</head>

<body>
<div class="sidenav">
 <a style="color:white; font-size:40px; cursor:pointer; text-decoration:none;" onclick="window.location.href = 'main.php'">URSecure</a><br><br><br>
  <a href="main.php">Dashboard <span style="right:-132px;" class="glyphicon glyphicon-home"></a>
  <a href="houseslist.php">Members <span style="right:-150px;" class="glyphicon glyphicon-th-list"></span></a>
  <a href="paymentlist.php">Payment <span style="right:-155px;" class="glyphicon glyphicon-list-alt"></a> 
  <a onClick="return confirm('Logout?')" href="logout.php" style="position:absolute; color:white; left:20px; bottom:20px;" class="logoutbutton"><span class="glyphicon glyphicon-log-out"></span> Log out</a>  
</div>

<div class="main">
<div>
<a style="float: left;font-size:20px;" href="main.php" >Back to Main Page</a>
<a style="float: right;font-size:20px;" class='recordsbutton' style='text-decoration:none;' target="_blank" href="generatepdf.php" >Generate PDF</a>
</div>
<br>
<h1 align="center"> Payment List</h1>
	<table class="tablelist" align="center" width='80%' border=0>

	<tr bgcolor='#CCCCCC'>
		<td style="font-size:20px; font-weight:bold;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black;border-right: 1px solid black;">ID</td>				
		<td style="font-size:20px; font-weight:bold;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black;border-right: 1px solid black;">Payment Date</td>
		<td style="font-size:20px; font-weight:bold;border-top: 1px solid black; border-bottom: 1px solid black; border-left: 1px solid black;border-right: 1px solid black;">Manage Payments</td>
	</tr>
	<?php 
	//while($res = mysql_fetch_array($result)) { // mysql_fetch_array is deprecated, we need to use mysqli_fetch_array 
	while($res = mysqli_fetch_array($result)) { 		
		echo "<tr>";
		echo "<td style='font-size: 20px;border-left: 1px solid black; border-bottom: 1px solid black;border-right: 1px solid black;'>".$res['HOUSE_ID']."</td>";				
		echo "<td style='font-size: 20px;border-left: 1px solid black; border-bottom: 1px solid black;border-right: 1px solid black;'>".$res['DATE_TEXT']." (" .$res['PAYMENT_DATE'].") </td>";		
		echo "<td style='font-size: 20px; padding-left:5px;border-left: 1px solid black; border-bottom: 1px solid black;border-right: 1px solid black;'> <a class='recordsbutton' style='text-decoration: none;' href=\"payment.php?HOUSE_ID=$res[HOUSE_ID]\">View Payments </a> | <a class='deletebutton' style='text-decoration: none;' href=\"deletepayment.php?ID=$res[ID]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";		
	}
	?>
	</table>
	<input style="position:absolute;right:100px"type="submit" class="button" name="Submit" value="Add New Payment" onclick="window.location.href = 'addpayment.php'"/>
</div>
</body>
</html>
