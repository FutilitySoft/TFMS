<?php
	include("../conf/config.php");
	$coid = $HTTP_COOKIE_VARS[$randomstr];
	if($coid == 0) {
		header ("Location: login.php");
		exit;
	}

	switch($action){
		case 'deletecrew':
			$qry = "DELETE FROM crewlist WHERE id=" . $id;
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
		
		case 'status':
			$qry = "UPDATE ships SET status='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
			
		case 'website':
			$qry = "UPDATE ships SET website='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
		
		case 'xo':
			$qry = "UPDATE ships SET xo=$variable " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
			
		case 'mco':
			$qry = "UPDATE ships SET mco=$variable " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
		
		case 'add':
			$qry = "INSERT INTO crewlist VALUES(" .
			"NULL,$shipid,'$charname',1,'$email','$position')";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			break;
			
		case 'mission':
			$qry = "UPDATE ships SET missiontitle='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());	
			break;
	
	}
	header("Location: switchboard.php");
	
	mysql_close($link);
?>
	
		