<?php
session_start();
if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else{
?>

<html>
<head>
<title>Crypto 2013 || Takneek</title>";
<?php
	include_once("includes/header.php");
?>

<div id="login" style="width:320px;float:left;margin-left:35%">
	<form action="login.php" method="POST">
	<div align="center">
		<font color="wheat" size=7><b>LOGIN </b></font>
	</div>
		<br/><b>Username:</b> &emsp;<input type='text' class='textbox' name='username' /> <br />
		<br/><b>Password: </b> &emsp;<input type='password' class='textbox' name='password'/><br /><br/>
		<input class = 'btn' type='submit' value='LOGIN'></form>
		&emsp;<a href="newuser.php"><input class = 'btn' type='submit' value='REGISTER'></a>
		<br/><br/> <a href="forgot.php">Forgot Password?</a><br />
	</div>
<?php
	include_once("includes/footer.php");
}
?>
