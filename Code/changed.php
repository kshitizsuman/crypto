<?php
session_start();
if($_SESSION['sent']!=1)
{
	header("Location: userhome.php");
}
?>
<html>
<head>
<title>Crypto - Forgot Password || Takneek</title>
<?php
include_once("includes/header.php");
?>

<div id="login" style="width:400px;float:left;margin-left:35%">
   <b><big><big> A new password has been sent to the email you provided. Please check your inbox.</b></big></big>
<?php
include_once("includes/footer.php");
 ?>