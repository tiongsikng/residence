<?php
// including the database connection file
include_once("db.php");
if ($_SESSION["loggedin"] != 1)
	header("Location: login.php");

if(isset($_POST['update']))
{	

	$ID = mysqli_real_escape_string($conn, $_POST['ID']);
	
	$HOUSE_ID = mysqli_real_escape_string($conn, $_POST['HOUSE_ID']);
	$HOUSE_NO = mysqli_real_escape_string($conn, $_POST['HOUSE_NO']);
	$ROAD_NM = mysqli_real_escape_string($conn, $_POST['ROAD_NM']);
	$AREA_NM = mysqli_real_escape_string($conn, $_POST['AREA_NM']);
	$OWNER_NM = mysqli_real_escape_string($conn, $_POST['OWNER_NM']);
	$OWNER_TYPE = mysqli_real_escape_string($conn, $_POST['OWNER_TYPE']);
	$OWNER_EMAIL = mysqli_real_escape_string($conn, $_POST['OWNER_EMAIL']);
	$OWNER_CONTACTNO = mysqli_real_escape_string($conn, $_POST['OWNER_CONTACTNO']);
	
	// checking empty fields
	if(empty($HOUSE_ID) || empty($HOUSE_NO) || empty($HOUSE_NO) || empty($ROAD_NM) || empty($AREA_NM) || empty($OWNER_NM) || empty($OWNER_TYPE) || empty($OWNER_CONTACTNO)) {	
			
		if(empty($OWNER_CONTACTNO)) {
			echo "<font color='red'>Field is empty.</font><br/>";
		}		
		
	} else {	
		//updating the table
		$result = mysqli_query($conn, "UPDATE houses SET HOUSE_ID='$HOUSE_ID', HOUSE_NO='$HOUSE_NO', ROAD_NM='$ROAD_NM', AREA_NM='$AREA_NM', OWNER_NM='$OWNER_NM', OWNER_TYPE='$OWNER_TYPE', OWNER_EMAIL='$OWNER_EMAIL', OWNER_CONTACTNO='$OWNER_CONTACTNO' WHERE ID=$ID");
		
		//redirectig to the display page. In our case, it is index.php
		header("Location: houseslist.php");
	}
}
?>
<?php
//getting id from url
$ID = $_GET['ID'];

//selecting data associated with this particular id
$result = mysqli_query($conn, "SELECT * FROM houses WHERE ID=$ID");

while($res = mysqli_fetch_array($result))
{
	$HOUSE_ID = $res['HOUSE_ID'];
	$HOUSE_NO = $res['HOUSE_NO'];
	$ROAD_NM = $res['ROAD_NM'];
	$AREA_NM = $res['AREA_NM'];
	$OWNER_NM = $res['OWNER_NM'];
	$OWNER_TYPE = $res['OWNER_TYPE'];
	$OWNER_EMAIL = $res['OWNER_EMAIL'];
	$OWNER_CONTACTNO = $res['OWNER_CONTACTNO'];
}
?>
<html>
<head>	
	<title>Edit Data</title>
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
	<a href="houseslist.php" style='font-size: 20px;'>Return to House List</a>	
	<p align="center" style='font-size: 18px;'><span class="error">* required field.</span></p><br/>
	
	<form name="form1" method="post" action="edit.php">
		<table border="0" align="center">
			<tr> 
				<td style='font-size: 20px;'>House ID:</td>				
				<td style='font-size: 20px;'><input class="textbox" type="text" name="HOUSE_ID" value="<?php echo $HOUSE_ID;?>" style='font-size: 20px;'><span class="error">* </td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>House Number:</td>				
				<td style='font-size: 20px;'><input class="textbox" type="text" name="HOUSE_NO" value="<?php echo $HOUSE_NO;?>" style='font-size: 20px;'><span class="error">* </td>
			</tr>			
			<tr> 
				<td style='font-size: 20px;'>Road Name:</td>				
				<td style='font-size: 20px;'><input class="textbox" type="text" name="ROAD_NM" value="<?php echo $ROAD_NM;?>" style='font-size: 20px;'><span class="error">* </td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Area Name:</td>				
				<td style='font-size: 20px;'><input class="textbox" type="text" name="AREA_NM" value="<?php echo $AREA_NM;?>" style='font-size: 20px;'><span class="error">* </td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Resident Name:</td>				
				<td style='font-size: 20px;'><input class="textbox" type="text" name="OWNER_NM" value="<?php echo $OWNER_NM;?>" style='font-size: 20px;' style='font-size: 20px;'><span class="error">* </td>
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
				<td style='font-size: 20px;'><input class="textbox" type="text" name="OWNER_EMAIL" value="<?php echo $OWNER_EMAIL;?>" style='font-size: 20px;'></td>
			</tr>	
			<tr> 
				<td style='font-size: 20px;'>Resident Phone Number:</td>
				<td style='font-size: 20px;'><input class="textbox" maxlength="15" type="text" name="OWNER_CONTACTNO" value="<?php echo $OWNER_CONTACTNO;?>" style='font-size: 20px;'><span class="error">* </td>
			</tr>						
			<tr>
				<td style='font-size: 20px;'><input type="hidden" name="ID" value=<?php echo $_GET['ID'];?>></td>				
				<td><input style="position:absolute;right:100px"type="submit" class="button" name="update" value="Update" onclick="window.location.href = 'add.html'"/></td>				
			</tr>
		</table>
	</form>
</div>
</body>
</html>
