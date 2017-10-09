<?php

include("dbconnect.php");
session_start();

if(isset($_SESSION['user'])) 
{
	$user=$_SESSION['user'];
	$lev=mysql_query("select * from players where username='$user'", $db);
	$result=mysql_fetch_array($lev);
	date_default_timezone_set('Asia/Calcutta');
	$today = date("F j, Y, g:i a");
	$logfile=fopen("loginout.txt", "a");
	fwrite($logfile, $_SESSION['user']." logged out at ".$today." from ".$_SERVER["REMOTE_ADDR"]." Level: ".$result['level']."\n");
	fclose($logfile);
	session_unset();
	session_destroy();
	header( "Location: index.php" );
}
else
{
	header( "Location: index.php" );
}
?>
