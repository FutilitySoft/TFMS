<?php
	include("../conf/config.php");

	$qry = "select id,email,password from co where email='" . $email ."'";
	$coqry = mysql_query($qry,$link) or die("Can't get CO's information");
	$valid = mysql_num_rows($coqry);
	$co = mysql_fetch_row($coqry);
	
	if($valid != 0){
		if($co[0] == 1 || $co[0] == 2 || $co[0] == 3 || $co[0] == 4){
			if($co[2] == $password){
				header("Location: admin_switchboard.php\nSet-Cookie: $randomstr2=" . $co[0] . "\n");
			}
			else{
				header("Location: admin_login.php?code=1"); 
			}
		}
		else{
			header("Location: admin_login.php?code=1"); 
		}
	}
	else{
		header ("Location: admin_login.php?code=1");
	}
	
	mysql_close($link);
?>
