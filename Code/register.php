<?php
include ("dbconnect.php");
session_start();
if(isset($_SESSION['user'])) {
	header("Location:userhome.php");
}
else {
	if(empty($_POST['emailid']) || empty($_POST['username']) || empty($_POST['passwd1'])|| empty($_POST['passwd2']) || empty($_POST['pool']))  
	{
		header( "Location: index.php" );
	}
	else
	{
		$invalidu=0;
		$name=$_POST['name'];
		$username=$_POST['username'];
		$invalidu=!preg_match('/^[a-zA-Z0-9\_]+$/', $username); 
		$pass=md5($_POST['passwd1']);
		$emailid = $_POST['emailid'];
		$pool = $_POST['pool'];
		$result=mysql_query("SELECT * FROM players WHERE emailid='$emailid' OR username='$username'" ,$db);
		$rowCheck = mysql_num_rows($result);
		if($rowCheck==0)
		{
			if($_POST['passwd1']==$_POST['passwd2'])
			{
			$add=mysql_query("INSERT INTO players (Name, username, password , pool, emailid, level)
			VALUES ('$name', '$username', '$pass' , '$pool' , '$emailid' , 1)" , $db);
			include_once("includes/header.php");
			header("Location:userhome.php");
			include_once("includes/footer.php");
			}
			else {

				include_once("includes/header.php");
			echo "<div id='login' style='width:320px;float:left;margin-left:35%'> Passwords did not match<br/>";
			echo "<a href='newuser.php'>Click here to register again</a></div>";
			include_once("includes/footer.php");

			}
		}
		else {

			include_once("includes/header.php");
			echo "<div id='login' style='width:320px;float:left;margin-left:35%'>";

			die("Username or email already registered! Use a different one.");
			echo "<br/><a href='newuser.php'>Click here to register</a></div>";
			include_once("includes/footer.php");
		}
	}
}
?>