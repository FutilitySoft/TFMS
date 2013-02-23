<?
	include("../conf/config.php");
	$userid = $HTTP_COOKIE_VARS[$randomstr];
	if($userid == 0) {
		header ("Location: login.php");
		exit;
	}

	$qry = "UPDATE co SET charname='". addslashes($charname) . 
		"',email='" . addslashes($email) . 
		"',password='" . addslashes($password) . 
		"',realname='" . addslashes($realname) . 
		"',race='" . addslashes($race) . 
		"' WHERE id=" . $id;
	$coqry = mysql_query($qry,$link) or die(mysql_error() . "<br><b>WHILE</b><br>" . $qry);
	
	Header("Location: switchboard.php");	
	mysql_close($link); 
?>
