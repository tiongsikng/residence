<?php
//including the database connection file
include_once("db.php");
if ($_SESSION["loggedin"] != 1)
	header("Location: login.php");

if(isset($_POST['Submit'])) {	
	$HOUSE_ID = mysqli_real_escape_string($conn, $_POST['HOUSE_ID']);	
	$HOUSE_NO = mysqli_real_escape_string($conn, $_POST['HOUSE_NO']);
	$ROAD_NM = mysqli_real_escape_string($conn, $_POST['ROAD_NM']);
	$AREA_NM = mysqli_real_escape_string($conn, $_POST['AREA_NM']);
	$OWNER_NM = mysqli_real_escape_string($conn, $_POST['OWNER_NM']);
	$OWNER_TYPE = mysqli_real_escape_string($conn, $_POST['OWNER_TYPE']);
	$OWNER_EMAIL = mysqli_real_escape_string($conn, $_POST['OWNER_EMAIL']);
	$OWNER_CONTACTNO = mysqli_real_escape_string($conn, $_POST['OWNER_CONTACTNO']);		
	
	//initialize Errors
	$emailErr="";
		
	// checking empty fields
	if(empty($HOUSE_ID) || empty($HOUSE_NO) || empty($ROAD_NM) || empty($AREA_NM) || empty($OWNER_NM) || empty($OWNER_TYPE) || empty($OWNER_CONTACTNO)) {
				
		if(empty($HOUSE_ID) || empty($HOUSE_NO) || empty($ROAD_NM) || empty($AREA_NM) || empty($OWNER_NM) || empty($OWNER_TYPE) || empty($OWNER_CONTACTNO)) {
			echo "<font color='red'>Field is empty.</font><br/>";
		}			
		if (!filter_var($OWNER_EMAIL, FILTER_VALIDATE_EMAIL)) {
			$emailErr = "Invalid email format"; 
       }
		
		//link to the previous page
		echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
	} else { 
		// if all the fields are filled (not empty) 
			
		//insert data to database	
		//$query = "INSERT INTO houses(HOUSE_ID, HOUSE_NO, ROAD_NM, AREA_NM, OWNER_NM, OWNER_TYPE, OWNER_EMAIL, OWNER_CONTACTNO) VALUES('$HOUSE_ID', '$HOUSE_NO', '$ROAD_NM', '$AREA_NM', '$OWNER_NM', '$OWNER_TYPE', '$OWNER_EMAIL', '$OWNER_CONTACTNO')";
		
		//$query = "INSERT INTO payment (HOUSE_ID, PAYMENT_DATE, DATE_TEXT, OWNER_NM, ADDRESS)  VALUES ('$HOUSE_ID', CURDATE(), 'Registered', '$OWNER_NM', '$HOUSE_NO, $ROAD_NM, $AREA_NM')";
		
		//$result = mysqli_multi_query($conn, $query);
		
		$result = mysqli_query($conn, "INSERT INTO houses(HOUSE_ID, HOUSE_NO, ROAD_NM, AREA_NM, OWNER_NM, OWNER_TYPE, OWNER_EMAIL, OWNER_CONTACTNO) VALUES('$HOUSE_ID', '$HOUSE_NO', '$ROAD_NM', '$AREA_NM', '$OWNER_NM', '$OWNER_TYPE', '$OWNER_EMAIL', '$OWNER_CONTACTNO')");
		
		//$result = mysqli_query($conn, "INSERT INTO houseregistration (HOUSE_ID, NAME, REGISTRATION_DATE)  VALUES ('$HOUSE_ID', 'OWNER_NM', CURDATE())");
		
		$result1 = mysqli_query($conn, "INSERT INTO payment (HOUSE_ID, PAYMENT_DATE, DATE_TEXT)  VALUES ('$HOUSE_ID', CURDATE(), 'Registered')");
		
		//display success message
		//echo "<font color='green'>Data added successfully.";
		//echo "<br/><a href='houseslist.php'>View Result</a>";
		header("Location: houseslist.php");
	}
}
?>

<html>
<head>
	<title>Add Member</title>
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
	<a href="houseslist.php" style='font-size: 20px;'>Back</a>
	<p align="center" style='font-size: 18px;'><span class="error">* required field.</span></p><br/>	

	
	<form action="add.php" method="post" name="form1">
		<table align="center" width="50%" border="0">
			<tr> 
				<td style='font-size: 20px;'>House ID:</td>
				<td><input class="textbox" type="text" name="HOUSE_ID" style='font-size: 20px;'><span class="error">* </td>				
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>House Number:</td>
				<td><input class="textbox" type="text" name="HOUSE_NO" style='font-size: 20px;'><span class="error">* </td>
			</tr>			
			<tr> 
				<td style='font-size: 20px;'>Road Name:</td>
				<td><input class="textbox" type="text" name="ROAD_NM" style='font-size: 20px;'><span class="error">* </td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Area Name:</td>
				<td><input class="textbox" type="text" name="AREA_NM" style='font-size: 20px;'><span class="error">* </td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Resident Name:</td>
				<td><input class="textbox" type="text" name="OWNER_NM" style='font-size: 20px;'><span class="error">* </td>
			</tr>
			<tr> 
				<td style='font-size: 20px;'>Resident Type: </td>
				<td><select class="dropdown" name="OWNER_TYPE" style='font-size: 20px;'>
				<option value="Owner">Owner</option>
				<option value="Tenant">Tenant</option>				
				</select>	
				<span class="error">* </td>			
			</tr>
			<tr> 
				<td style='font-size: 20px;'>Resident E-mail Address:</td>
				<td><input class="textbox" type="text" name="OWNER_EMAIL" style='font-size: 20px;'></td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Resident Phone Number:</td>
				<td><input class="textbox" type="text" name="OWNER_CONTACTNO" style="font-size: 20px;" maxlength="15"><span class="error">* </td>
			</tr>			
			<tr> 
				<td><input style="position:absolute;right:100px"type="submit" class="button" name="Submit" value="Add" onClick="return confirm('Member Added.')"/></td>				
			</tr>
		</table>
	</form>
	</div>
</body>
</html>

