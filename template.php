<?php include("conf/config.php"); ?>

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
	<!-- Start -->
	
	<? include("tf/" . $pageref . ".php"); ?>
	
	<!-- Stop -->
</td>
  </tr>
</table>
<? include("htinc/footer.php");?>
</BODY>
</HTML>
