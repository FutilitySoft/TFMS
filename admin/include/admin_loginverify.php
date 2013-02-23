<?php
	if ($pageref == "loginvfy")
	{
	$qry = "select id,email,password, admin from co where email='" . $email ."'";
	$coqry = mysql_query($qry,$link) or die("Can't get CO's information");
	$valid = mysql_num_rows($coqry);
	$co = mysql_fetch_row($coqry);
	
	if($valid != 0){
		if($co[3] == 1){
			if($co[2] == $password){
				header("Location: admintemplate.php?pageref=switchboard\nSet-Cookie: $randomstr2=" . $co[0] . "\n");
			}
			else{
				//header("Location: admin_login.php?code=1"); 
				$pageref="login";
				$code=1;
			}
		}
		else{
			//header("Location: admin_login.php?code=1"); 
			$pageref="login";
			$code=1;
		}
	}
	else{
		//header ("Location: admin_login.php?code=1");
		$pageref="login";
		$code=1;
	}
	
	mysql_close($link);

	
	}
?>