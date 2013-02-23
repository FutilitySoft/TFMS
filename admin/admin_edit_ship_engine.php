<?php
	include("../conf/config.php");
	$adminid = $HTTP_COOKIE_VARS[$randomstr2];
	if($adminid == 0) {
		header ("Location: admin_login.php");
		exit;
	}

	$qry = "UPDATE ships SET ";
	$qry .= "name='" . addslashes($name) . "',";
	$qry .= "registry='" . addslashes($registry) . "',";
	$qry .= "class='" . addslashes($class) . "',";
	$qry .= "website='" . addslashes($website) . "',";
	$qry .= "co=" . $coid . ",";
	$qry .= "grp=" . $grpid . ",";
	$qry .= "status='" . addslashes($status) . "',";
	$qry .= "missiontitle='" . addslashes($mission) . "',";
	$qry .= "sorder='" . addslashes($sorder) . "',";
	$qry .= "lastmreport='" . addslashes($lastreport) . "',";
	$qry .= "shiprole='" . addslashes($shiprole) . "',";
	$qry .= "image='" . $image . "' where id=" . $shipid;
	
	$insqry = mysql_query($qry,$link) 
		or die(mysql_error() . "<br>while<br>$qry");
	
	mysql_close($link);
	
	header("Location: admin_switchboard.php");
?>
