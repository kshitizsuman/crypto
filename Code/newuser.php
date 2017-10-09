<?php
session_start();
if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
else
{
?>
<html>
<head>
<title>Crypto || Takneek</title>
<script type="text/javascript" src="validate.js"></script>";
<?php
	include_once("includes/header.php");
?>
<div id="login" style="width:50%;float:left;margin-left:25%">
	<h1> Register </h1>
	<form name='regform' action='register.php' method='POST' onsubmit='return validator()'>
		<table>
			<tr>
				<td>Name</td>
				<td><input class='textbox' type='text' name='name' /></td>
			</tr>
			<tr>
				<td>Pool</td>
				<td><input type='radio' name='pool' value='A' /> Marathas 
					<input type='radio' name='pool' value='B' /> Mauryans 
					<input type='radio' name='pool' value='C' /> Mughals 
					<input type='radio' name='pool' value='D' /> Rajputs 
					<input type='radio' name='pool' value='E' /> Veeras
				</td>
			</tr>
			<tr>
				<td>Username </td>
				<td><input class=\"textbox\" type='text' name='username'/></td>
			</tr>
			<tr>
				<td>Password </td>
				<td><input class=\"textbox\" type='password' name='passwd1'/></td>
			</tr>
			<tr>
				<td>Confirm Password</td>
				<td><input class=\"textbox\" type='password' name='passwd2'/></td>
			</tr>
			<tr>
				<td>Email-Id </td>
				<td><input class=\"textbox\" type='text' name='emailid'/> </td>
			</tr>
		</table>
		<br/>
		<input class='btn' type='submit' value='Submit' />
		<br/>
	</form>
	<p>Do not enter any special characters in Username and Name</p>
	<p> In case you forget your password, your password will be reset and sent to the email-id you have provided.</p>

<?php
	include_once("includes/footer.php");
}
?>
 