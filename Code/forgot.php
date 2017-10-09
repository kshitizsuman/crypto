<?php
	session_start();
?>
<html>
<head>
<title>Crypto - Forgot Password || Takneek</title>

<?php
	include_once("includes/header.php");
?>

<div id="login" style="width:400px;float:left;margin-left:35%">
	<p>
		<h2>Enter your Username and Email-Id here:</h2>
	</p>
	<form action="fp2.php" method="POST">
		<br/><b>Username:</b> &emsp;<input type='text' class='textbox' name='username' /> <br />
		<br/><b>Email-Id: </b> &emsp;<input type='text' class='textbox' name='emailid'/><br /><br/>
		<input class = 'btn' type='submit' value='Submit'>&emsp;
	</form>

	<br/>
<?php
	include_once("includes/footer.php");
?>