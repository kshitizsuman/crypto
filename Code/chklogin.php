<?php
session_start();
if(isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else
{
	echo "You have been logged out. Please <a href=\"index.php\">login</a> again";
}
?>