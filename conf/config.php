<?

        # Update all these descriptors for your website
	$taskforce_sn = "Task Force ##";
	$taskforce_ln = "Task Force ## - Name";
	$taskforce_ab = "TF##";
	
	$d_database_name = "xxxx";
	$d_database_server = "localhost";
	$d_database_username = "xxxx";
	$d_database_password = "xxxx";
	
	$TFCOName = "Admiral No Name";
	$TFCOEmail = "You@yourdomain.org";
	
	$TFXOName = "Rear Admiral Something orOther";
	$TFXOEmail = "orother2@yourdomain.com";

        #These fields are comma seperated lists of other email addresses that should be CCed.
	$OTHERemail = "";
	$OTHERwelcome = "";

        # This shoudl the direct path to your index.php page.
        $BaseURL = "http://www.yourdomain.net/tfms";

        # CHANGE THIS RANDOM GIBERISH
        # NO SPACES AND KEEP THIS CONFIDENTIAL
	$randomstr = "sdlfjasldkfjsadlfkjlkjdfasdf";
	$randomstr2 = "lskdjfsodkfjsaldfhasdkfjhsdf";
	
        
        # Don't mess with this unless you know what you're doing
	$link = mysql_pconnect($d_database_server,$d_database_username,
		$d_database_password) or die("Could not make DB connection");
	mysql_select_db($d_database_name);
?>
