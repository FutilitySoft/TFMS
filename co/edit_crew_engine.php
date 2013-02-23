<HTML>
<?php
	include("../conf/config.php");
	$coid = $HTTP_COOKIE_VARS[$randomstr];
	if($coid == 0) {?>
	<script>
	document.location='login.php';
	</script>
	<?}

	if( $name != "" && $email != "" && $position != ""){
	
		//header("Location: switchboard.php");
		
		$qry = "SELECT id FROM ships WHERE co=" . $coid;
		//echo "$qry\n<br>";
		$shipqry = mysql_query($qry,$link) or die("Can't get ships id");
		$ship = mysql_fetch_row($shipqry);
		
		$qry = "UPDATE crewlist SET charname='" . addslashes($name) . 
			"' WHERE id=" . $crewid;
		//echo "$qry\n<br>";
		$update = mysql_query($qry,$link) or die("Can't update values");
		
		$qry = "UPDATE crewlist SET rank=" . $rank . " WHERE id=" . $crewid;
		//echo "$qry\n<br>";
		$update = mysql_query($qry,$link) or die("Can't update values");
		
		$qry = "UPDATE crewlist SET email='" . $email . "' WHERE id=" . $crewid;
		//echo "$qry\n<br>";
		$update = mysql_query($qry,$link) or die("Can't update values");
		
		$qry = "UPDATE crewlist SET position='" . 
			addslashes($position) . "' WHERE id=" . $crewid;
		//echo "$qry\n<br>";
		$update = mysql_query($qry,$link) or die("Can't update values");
		?>
	<script>
	document.location='switchboard.php';
	</script>
	<?			
		
	}
	else {
		echo "You did not enter all required information.  Hit your BACK button and try again";
	}
	
	mysql_close($link);
?>
<HTML>	
		
