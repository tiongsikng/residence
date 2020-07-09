<?php include("db.php"); ?>

<!DOCTYPE html>
<html>
<head><title>Register</title>

<style>
body {
    background-color: #1ABC9C;
}
h1{
	color: white;
	font-size:80px;
	text-shadow: 2px 2px #009999;
	font-family:sans-serif;
}

.textbox{
	background-color:white;	
	width: 1000px;
	height: 35px;
	border: 1px solid lightgrey; 
	border-radius: 10px;
	padding-left: 10px;
	font-size: 22px;
}

.textbox:focus{ 
border: 1px solid #1ABC9C; 
border-radius: 10px;
padding-left: 10px;
font-size: 22px;
outline: 0;
}

.button {
    background-color: #1ABC9C;
    border: none;
    color: white;
    padding: 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    font-size: 25px;
    margin: 4px 2px;
	border-radius: 12px;
	width: 1000px;
	cursor:pointer;
}

.button:hover {
background-color: #48C9B0;
 box-shadow: 0 5px 15px rgba(145, 92, 182, .4);
}

.inner-addon { 
    position: relative; 
}

.inner-addon .glyphicon {
  position: absolute;
  padding: 10px;
  pointer-events: none;
}

.left-addon .glyphicon  { left:  0px;}
.right-addon .glyphicon { right: 0px;}


</style>
</head>
<body>
<br><br><br><br><br>
<h1 align = "center">URSecure</h1>

<div style="background-color:#e6e6e6; align:center; padding:50px; margin: 50px;">
<form align = "center" name="registerForm" method="post" action="">

	<p style="font-size:24px;font-family:sans-serif;"> Register New Admin </p>
	<p style="font-size:20px;font-family:sans-serif;"><strong>Username: </strong><input class="textbox" class="textbox" type="text" name="p_username">		
	<p style="font-size:20px;font-family:sans-serif;"><strong>Password : </strong><input class="textbox" class="textbox" type="password" name="p_password">
	<p><input align = "left" class="button" type="submit" name="registerButton" onClick="return confirm('Successfully Registered')" value="REGISTER" style="height:50px;"><br><br>
	<a style="font-size:16px;color:#1ABC9C;font-family:sans-serif;text-decoration:none;" href="login.php"> Go to Login Page </a>

</form>
</div>
</body>
</html>

<?php

if (isset($_POST["registerButton"])) 	
{
	$u_username = $_POST["p_username"];    		
	$u_password = md5($_POST["p_password"]); 
	
	$result = mysqli_query($conn, "INSERT INTO login (username, password) VALUES ('$u_username', '$u_password')");
	$row = mysqli_fetch_assoc($result);
	
	
	?>
		<script type = "text/javascript">
			alert("Registered");
		</script>
	<?php
	
		$_SESSION["sess_login"] = $row["student_id"];
		$_SESSION["loggedin"] = 1;
		header("Location:login.php");	
	
	
	mysqli_close($conn);
}
?>