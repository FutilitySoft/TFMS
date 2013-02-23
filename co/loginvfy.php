<?php
	//include("../conf/config.php");
	
	$qry = "select id,email,password from co where email='" . $email ."'";
	$coqry = mysql_query($qry,$link) or die("Can't get CO's information");
	$valid = mysql_num_rows($coqry);
	
	if($valid != 0){
		$co = mysql_fetch_row($coqry);
		if($co[2] == $password){
			// The PHP needs to know that it's down one directory
			include("switchboard.php");
			//\nSet-Cookie: " . $randomstr . "=" . $co[0] . "\n"); 
		}
		else{
			include ("login.php?code=1"); 
		}
	}
	else{
		include ("login.php?code=1");
	}
	
	mysql_close($link);
?>
