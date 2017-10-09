<?php
function genRandomString() {
  
     return substr(str_shuffle(str_repeat("0123456789abcdefghijklmnopqrstuvwxyz", 5)), 0, 5);
    
}
include('dbconnect.php');
session_start();

if (isset($_SESSION['user']))
{
	header("Location:userhome.php");
}
elseif (empty($_POST['username']) ||  empty($_POST['emailid']))
{
	header( "Location:forgot.php" );
}
else
{
	$user=$_POST['username'];
	$emailid=$_POST['emailid'];
	$invalidu=!preg_match('/^[a-zA-Z0-9]+$/', $user);
	$invalide=!preg_match('/^[a-zA-Z0-9@.\_]+$/', $emailid); 
	if($invalidu>0 || $invalide>0)
	{ 
		$_SESSION['check']=1;header("Location:forgot.php");
	}
	else
	{
		$query="select * from players where username='$user' AND emailid='$emailid'";
		$result=mysql_query($query,$db);
		$rowCheck = mysql_num_rows($result);
		if($rowCheck>0)
		{
			$p=genRandomString();
			$phashed=md5($p);
			$up=mysql_query("UPDATE players SET password='$phashed' WHERE username='$user' AND emailid='$emailid'",$db);
			$sent=mail($emailid, 'Crypto Password Reset' , "Dear ".$user.", \n\n Your password has been reset at Crypto'13. \n Your new password is ".$p."\n Have fun Decrypting\n \n Regards,\n Saurav Kumar","From:2020saurav@gmail.com");
			if($sent)
			{
				$_SESSION['sent']=1;
				header("Location:changed.php");
			}
			else
			{
				$_SESSION['sent']=2;
				header("Location:forgot.php");
			}
		}
		else
		{ 
			$_SESSION['check']=1;
			header("Location:forgot.php");
		}
	}
}

?>
	