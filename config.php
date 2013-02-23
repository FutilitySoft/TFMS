<?
	$taskforce_sn = "Task Force Seventy-Two";
	$taskforce_ln = "Task Force Seventy-Two, S.E.N.T.I.N.E.L.";
	$taskforce_ab = "TF72";
	
	$d_database_name = "tf72";
	$d_database_server = "localhost";
	$d_database_username = "tf72";
	$d_database_password = "tfsentinel";
	
	$TFCOName = "VAdm Robert Chadwick";
	$TFCOEmail = "tf72@bravofleet.com";
	
	$TFXOName = "Rear Admiral Deela T'Lar";
	$TFXOEmail = "ueymorgme2@aol.com";
	
	$OTHERemail = "co@uss-farragut.org";
	$OTHERwelcome = "xo@taskforce72.net, recruiter@taskforce72.net, co@taskforce72.net, kimberleyharper2000@yahoo.com";
	$BaseURL = "http://www.taskforce72.net";

	$randomstr = "12asdsadkjfasd8025r4q";
	$randomstr2 = "1204sfjkvdsfljkvr8334q";
	
	$link = mysql_pconnect($d_database_server,$d_database_username,
		$d_database_password) or die("Could not make DB connection");
	mysql_select_db($d_database_name);
?>
