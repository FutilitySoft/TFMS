<?
	include("../conf/config.php");
	$adminid = $HTTP_COOKIE_VARS[$randomstr2];
	if($adminid == 0) {
		header ("Location: admin_login.php");
		exit;
	}

	$qry = "SELECT id FROM ships WHERE co=" . $coid;
	$shipqry = mysql_query($qry,$link) or die("Can't get ships");
	$ship = mysql_fetch_row($shipqry);
	
	$qry = "UPDATE grp SET co=" . $coid . ",flagship=" . $ship[0] . ",name='$name' WHERE id=" . $grpid;
	$updateqry = mysql_query($qry,$link) or die(mysql_error());
	
	header("Location: admin_switchboard.php");
	
	mysql_close($link);
	
?>
