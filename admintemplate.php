<?php

	// DO NOT MODIFY THIS SECTION OF THE CODE UNLESS YOU
	// FULLY UNDERSTAND HOW TO REPAIR IT!!
	
	// The Following modules are mainly included from other locations to 
	// provide for easier maintainance updates. 
	

	// This include file contains all the setup information we need
	require("conf/config.php");
	
	// This include file contains the Code to verify an admin login
	require("admin/include/admin_loginverify.php");
	
	// This Code here checks for the Secret Cookie placed by loginvfy.
	// If the cookie exists we do nothing, passing control straight over to the controller
	// if it doesn't exist we force the controller to use the "login" action
	$coid = $HTTP_COOKIE_VARS[$randomstr2];
	if($coid == 0) {
		$pageref= "login";
	}
	else
	{
            // This include contains the switch statement that controls Program flow
            require("admin/include/admin_controller.php");
	}

	
?>

<HTML>
<HEAD>
<TITLE>Task Force 72 - S.E.N.T.I.N.E.L.</TITLE>
<META CONTENT="This is the homepage for Task Force 72, Bravo Fleet.">
<link type="text/css" rel=stylesheet href="htinc/style.css">
</HEAD>
<script language="JavaScript" src="htinc/main.js"></script>
<BODY BGCOLOR="#000000" TEXT="#CCCCCC" ALINK="#008000" topmargin="0" marginheight="0" leftmargin="0" marginwidth="0">
<table width="100%">
  <tr>
    <td valign="top" width="140"><? include("htinc/menu.php");?></td>
	<td valign="top" style="padding-left:15;">
	<center><IMG SRC="banners/TF72_banner.jpg" ALT="TF72 banner" width="468" height="60"></center><br clear="all">
	
	<P><img alt="Task Force Seventy-Two" src="images/title-taskforce.gif" >
	<!-- Start include section
	It is not advised that you modify this line unless you are comfortable with
	PHP and know how server Side include files work.
	-->
	
	<? include("admin/admin_" . $pageref . ".php"); ?>
	
	<!-- End include section -->
</td>
  </tr>
</table>
<? include("htinc/footer.php");?>
</BODY>
</HTML>
<? mysql_close($link) ?>
