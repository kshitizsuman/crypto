<?php
echo"
<link href='includes/crypto.css' rel='stylesheet' type='text/css' />
<meta name='author' content='Saurav Kumar' />

</head>
<body>
  <font face='Crypto'>
<div id='background'>
    <img src='takneek.jpg' class='stretch' alt='' />
</div>
<div id='top' style='height:50px; width=100%; '>

  <img src='crypto.jpg' style='max-height:100%'> ";


include("dbconnect.php");

if (isset($_SESSION['user']))
{ 
$user=$_SESSION['user'];
$row=mysql_query("select * from players where username='$user'" , $db);
$result=mysql_fetch_array($row);
echo"

<div id='top-right' style='float:right';>
<font color=#ffc579>
<h3>
 Welcome, "; echo $result['Name']; 
  echo"

&emsp;<div class=\"numberCircle\">";
 echo ($result['level']-1);
 echo"</div>
&emsp;<font color=\"grey\">|</font>";
echo"


&emsp; <a href ='logout.php' style=' color: #ffc579; text-decoration: none'> LOGOUT </a>&emsp;</h3>
</font>
</div>
"
;

}

echo"


</div>
<div id='gap' style='height:100px; width=100%'></div>


<div id='leftpane' style='position:fixed; height:100%; float:left;'>

  <a href='userhome.php'><input class = 'button' type='submit' value='Home'></a><br/><br />
  <a href='intro.php'><input class = 'button' type='submit' value='Introduction'></a><br/><br />
  <a href='instruct.php'><input class = 'button' type='submit' value='Instructions'></a><br/><br />
  <a href='rank.php'><input class = 'button' type='submit' value='Ranking'></a><br/><br />
  <a href='#'><input class = 'button' type='submit' value='Forum'></a><br/><br />
  <a href='team.php'><input class = 'button' type='submit' value='Team'></a><br/><br />



</div>"

?>
