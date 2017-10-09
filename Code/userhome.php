<?php
	include("dbconnect.php");
	session_start();
	if(isset($_SESSION['user']))
	{
		$user=$_SESSION['user'];
		$row=mysql_query("select * from players where username='$user'" , $db);
		$result=mysql_fetch_array($row);
		date_default_timezone_set('Asia/Calcutta');
		$today = date("F j, Y, g:i a");
		$logfile=fopen("log1.txt", "a");
		fwrite($logfile, $_SESSION['user']." at ".$today." Level: ".($result['level']-1)."\n");
		fclose($logfile);
		$x=$result['level'];
		if($result['level']<8 )
		{
			$quest=mysql_query("select * from qdb where qno='$x'");
			$questd=mysql_fetch_array($quest);
			?>
			<html>
			<head>
			<title><?=$questd['title']?> | Crypto</title>
			<?php
				include_once("includes/header.php");
			?>	

			<div id='login' style='width:50%;float:left;margin-left:35%'>
				<h2> Question <?=$questd['qno']?> </h2>
					<p><?=$questd['mainq']?></p>
				<?php		
					if($questd['img']!="NULL")
						echo "<img src='photos/".$questd['img'].".jpg' class='image' align='middle' /><br />";
					echo "<!-- ".$questd['tagline']." -->";
				?>
				<p>
					<form action='chkans.php' method='POST'>
						<div align='center'>
							<input type='text' class='textbox' name='ans' />&emsp;
							<input type='submit' class='btn' value='Submit' /></div> <br />
							<?php echo "<input type='hidden' name='level' value='$x' />"; ?>
						</div>
					</form>
				</p>

			<?php
			include_once("includes/footer.php");
		}

		elseif ($result['level']==8)
		{
			$fp=fopen("final.txt", "a");
			fwrite($fp, $_SESSION['user']." at ".$today." from ".$_SERVER["REMOTE_ADDR"]."\n");
			fclose($fp);
			include_once("includes/header.php");
			echo "<div id='login' style='width:50%;float:left;margin-left:35%'>
			Completed!
			Now Get Lost<br/><br/><a href='logout.php'>Logout</a></div>";
			
			include_once("includes/footer.php");

		}
	}
	elseif (!isset($username) || !isset($password)) 
	{
		header( "Location: index.php" );
	}
	elseif (empty($username) || empty($password)) 
	{
		header( "Location: index.php" );
	}
?>