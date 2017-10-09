<?php
	include ("dbconnect.php");
	$username=$_POST['username'];
	$password=$_POST['password'];
	if(isset($_SESSION['user'])) 
	{
		header( "Location: chklogin.php" );
	}
	if (!isset($username) || !isset($password)) 
	{
		header( "Location: index.php" );
	}
	elseif (empty($username) || empty($password))
	{
		header( "Location: index.php" );
	}
	else
	{
		$user = addslashes($_POST['username']);
		$invalidu=!preg_match('/^[a-zA-Z0-9]+$/', $user); 
		if($invalidu>0)
			{ 
				header("Location: index.php?user=invalid");
			}
		else{
				$pass = md5($_POST['password']);
				$result=mysql_query("select * from players where username='$user' AND password='$pass'", $db);
				$row = mysql_fetch_array($result);
				$rowCheck = mysql_num_rows($result);
				if($rowCheck == 1)
				{
					session_start();
					$_SESSION['user']=$_POST['username'];
					$_SESSION['name']=$row['Name'];
					date_default_timezone_set('Asia/Calcutta');
					$today = date("F j, Y, g:i a");
					$logfile=fopen("loginout.txt", "a");
					fwrite($logfile, $_SESSION['user']." logged in. Level: ".$row['level']."\n");
					fclose($logfile);
					header("Location:chklogin.php");
				}
  				else 
  				{
  					//if nothing is returned by the query, unsuccessful login code goes here...
					include_once("includes/header.php");
					echo "<div id='login' style='width:35%;float:left;margin-left:25%'>
							Incorrect login name or password. Please try <a href='index.php'>again</a>.<br/><br/>
  							<a href='forgot.php'>Forgot Password?</a></div>";

					include_once("includes/footer.php");
  				} 
			}
	}
?>