<?php
	$coid = $HTTP_COOKIE_VARS["tf86_login"];
	if($coid == 0) {
		header ("Location: login.php");
		exit;
	}
	
	$link = mysql_connect ("localhost","tf86","trek") or die ("Could not connect to DB");
	$dbname = "tf86";
	$result = mysql_select_db($dbname);
	
	
	if( $website != "" && $status != ""){
		
		$qry = "UPDATE ships SET website='" . $website . "' WHERE id=" . $shipid;
		$update = mysql_query($qry,$link) or die("Can't update values");
		
		$qry = "UPDATE ships SET status='" . $status . "' WHERE id=" . $shipid;
		$update = mysql_query($qry,$link) or die("Can't update values");

		header("Location: switchboard.php");
	}
	else {
		echo "You did not enter all required information.  Hit your BACK button and try again";
	}
	
	mysql_close($link);
?>
	
		