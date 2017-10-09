<?php

include("dbconnect.php");
session_start();

$currentLevel=$_POST['level'];  
$answer=$_POST['ans'];

if(isset($_SESSION['user']) && isset($currentLevel) && isset($answer))
{
  $ip=$_SERVER["REMOTE_ADDR"]; 
  date_default_timezone_set('Asia/Calcutta');
  $today = date("F j, Y, g:i a");
  $user=$_SESSION['user'];
  $currentLevel=$_POST['level'];  
  $answer=md5($_POST['ans']);
  $questAnsMatch=mysql_query("select * from qnsans where level='$currentLevel' AND ans='$answer'", $db);
  $userRow=mysql_query("select * from players where username='$user'", $db);
  $userInfo=mysql_fetch_array($userRow);
  $presentActualLevel=$userInfo['level']; 

  switch ($userInfo['pool']) 
  {
    case 'A':
      $pool="Marathas";
      break;
    case 'B':
      $pool="Mauryans";
      break;
    case 'C':
      $pool="Mughals";
      break;
    case 'D':
      $pool="Rajputs";
      break;
	case 'E':
	  $pool="Veeras";
    default:
      $userpool=" ";
      break;
  }

  if($currentLevel>$presentActualLevel)
  {
    header("Location: userhome.php"); 
  }

  $rowCheck = mysql_num_rows($questAnsMatch);
  $nextLevel = $currentLevel+1; 

  if($rowCheck ==1 && $nextLevel>$presentActualLevel) 
  {
    $update=mysql_query("UPDATE players SET level='$nextLevel' WHERE username='$user'", $db);
    $filename="log.txt";
    $file=fopen($filename,"a");
    fwrite($file,($user."\t".$currentLevel."\t ".$pool."\t".$ip."\t".$today."\n"));
    header("Location: userhome.php");
  }
  else
  {
    header("Location: userhome.php"); 
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