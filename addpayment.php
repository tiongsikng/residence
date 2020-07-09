<?php
//including the database connection file
include_once("db.php");
if ($_SESSION["loggedin"] != 1)
	header("Location: login.php");

if(isset($_POST['Submit'])) {	
	$HOUSE_ID = mysqli_real_escape_string($conn, $_POST['HOUSE_ID']);	
	$DATE_TEXT = mysqli_real_escape_string($conn, $_POST['DATE_TEXT']);	
	
	//initialize Errors
	$emailErr="";
		
	if (isset($_POST["Submit"])) 	
	{
	// checking empty fields
	if(empty($HOUSE_ID) || empty($DATE_TEXT)) {
				
		if(empty($HOUSE_ID) || empty($DATE_TEXT)) {
			echo "<font color='red'>Field is empty.</font><br/>";
		}						
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		$result = mysqli_query($conn, "INSERT INTO payment(HOUSE_ID, DATE_TEXT, PAYMENT_DATE) VALUES('$HOUSE_ID', '$DATE_TEXT', CURDATE())");				
		
		//display success message
		//echo "onClick=\'return confirm('Added')\'";
		header("Location: paymentlist.php");
	}
	}
}
?>

<html>
<head>
	<title>Add Payment</title>
	<link rel="stylesheet" href="styles.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<style>
	.error {color: #FF0000;}
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
	<a href="paymentlist.php" style='font-size: 20px;'>Back</a>
	<p align="center" style='font-size: 18px;'><span class="error">* required field.</span></p><br/>

	<div>
	<form action="addpayment.php" method="post" name="form1">
		<table align="center" width="50%" border="0">
			<tr> 
				<td style='font-size: 20px;'>House ID: </td>
				<td><input class="textbox" type="text" name="HOUSE_ID" style='font-size: 20px;'><span class="error">*</td>						
			</tr>				
			<tr> 
				<td style='font-size: 20px;'>Date: </td>
				<td><select class='dropdown' name="DATE_TEXT" style='font-size: 20px;'>
				<option value="Apr 2018">Apr 2018</option>
				<option value="May 2018">May 2018</option>		
				<option value="Jun 2018">Jun 2018</option>
				<option value="Jul 2018">Jul 2018</option>
				<option value="Aug 2018">Aug 2018</option>
				<option value="Sep 2018">Sep 2018</option>
				<option value="Oct 2018">Oct 2018</option>
				<option value="Nov 2018">Nov 2018</option>
				<option value="Dec 2018">Dec 2018</option>
				<option value="Jan 2019">Jan 2019</option>
				<option value="Feb 2019">Feb 2019</option>
				<option value="Mar 2019">Mar 2019</option>
				<option value="Apr 2019">Apr 2019</option>
				<option value="May 2019">May 2019</option>
				<option value="Jun 2019">Jun 2019</option>
				<option value="Jul 2019">Jul 2019</option>
				<option value="Aug 2019">Aug 2019</option>
				<option value="Sep 2019">Sep 2019</option>
				<option value="Oct 2019">Oct 2019</option>
				<option value="Nov 2019">Nov 2019</option>
				<option value="Dec 2019">Dec 2019</option>
				<option value="Jan 2020">Jan 2020</option>
				</select><span class="error">* </td>
			</tr>						
		</table>
		<input onClick="return confirm('Payment Added.')" style="position:absolute;right:100px"type="submit" class="button" name="Submit" value="Add""/>
	</form>
	</div>
	</div>
</body>
</html>

