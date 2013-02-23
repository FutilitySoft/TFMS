<?
	include("../conf/config.php");
	$adminid = $HTTP_COOKIE_VARS[$randomstr2];
	
	if($adminid == 0) {
		header ("Location: admin_login.php");
		exit;
	}
	
	$qry = "UPDATE co SET " .
		"charname='". addslashes($charname) . "'" .
		",rank=" . $rank. 
		",email='" . $email . "'" .
		",password='" . addslashes($password) . "'" .
		",realname='" . addslashes($realname) . "'" .
		",race='" . addslashes($race) . "'" .
		",tfrole='" . addslashes($tfrole) . "'" .
		" WHERE id=" . $id;
	$coqry = mysql_query($qry,$link) or die(mysql_error() . "<br>during<br>$qry");
	
	Header("Location: admin_switchboard.php");	
	
mysql_close($link) 
?>
