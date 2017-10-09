<?php
	include('dbconnect.php');
	session_start();
	$results=mysql_query("SELECT * FROM players ORDER BY level DESC");
	$rownum = mysql_num_rows($results);
?>
<html>
<head>
<title>Crypto || Takneek</title>

<?php
	include_once("includes/header.php");
?>
<div id='rank' style='margin-left:35%;'>
	<table id='gradient-style'>
		<thead>
		    <tr>
		    	<th scope='col'>Rank</th>
				<th scope='col'>Username</th>
				<th scope='col'>Pool</th>
				<th scope='col'>Points</th>
	        </tr>
	    </thead>
		<tbody>
<?php
		for ($i=0 ; $i<$rownum ; $i++)
		{
			$row = mysql_fetch_array($results);
			switch ($row['pool']) 
			{
					case 'A':
						$userpool="Marathas";
						break;
					case 'B':
						$userpool="Mauryans";
						break;
					case 'C':
						$userpool="Mughals";
						break;
					case 'D':
						$userpool="Rajputs";
						break;
					case 'E':
						$userpool="Veeras";
					default:
						$userpool=" ";
						break;
			}

			echo "<tr>
					<td>".($i+1)."</td>
					<td width='180px'>".$row['username']."</td>
					<td width='150px'>".$userpool."</td>
					<td width='150px'>".($row['level']-1)."</td>
				</tr>";
}
?>
	    </tbody>
	</table>
</div>
<?php
	include_once("includes/footer.php");
?>
