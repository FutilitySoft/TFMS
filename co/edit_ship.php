<?php
	$coid = $HTTP_COOKIE_VARS["tf86_login"];
	if($coid == 0) {
		header ("Location: login.php");
		exit;
	}
	
	$link = mysql_connect ("localhost","tf86","trek") or die ("Could not connect to DB");
	$dbname = "tf86";
	$result = mysql_select_db($dbname);
	
	$qry = "SELECT id FROM ships WHERE co=" . $coid;
	$shipidqry = mysql_query($qry,$link) or die("Can't get ships id");
	$shipid = mysql_fetch_row($shipidqry);
	
	$qry = "SELECT * FROM ships WHERE id=" . $shipid[0];
	$shipqry = mysql_query($qry,$link) or die("Can't get ship qry");
	$ship = mysql_fetch_row($shipqry);
	
?>
<HTML>
<HEAD>
<TITLE>SEARCH ~ Bravo Fleet</TITLE>
<link type="text/css" rel=stylesheet href="css/main.css">
</HEAD>
<body marginwidth=0 marginheight=0 topmargin=0 leftmargin=0>
<? $subtitle = "Ship Maintenance"; include("htinc/header.php") ?><br>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width=100><center><img src="images/lcars/red-upper-left.jpg" border=0></td>
		<td width="100%" class="lcars" colspan=3 align="right"><img src="images/lcars/nub-right-small.gif" border=0></td>
	</tr>
	<tr>
		<td width=100 class="lcars" valign="top">&nbsp;</td>
		<td width="15"><img src="images/lcars/top-corner.jpg" border=0></td>
		<td width="100%" valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100 class="lcars" valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
		<td width="100%">
		<center><h2>Edit Ship's Information</h2></center>
			<form method="post" action="edit_ship_engine.php">
			<input type="hidden" NAME="shipid" VALUE="<? echo $shipid[0] ?>">
			<i>All of the following information is required.</i><br>
			<table>
				<tr>
					<td width=75><b>Website: </b></td>
					<td><input type="text" name="website" size=30 value="<? echo $ship[4] ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><font
size="-1"><i>Note: Make sure you include the http:// in front of your
website or the link WILL NOT WORK!</i></font></td>
</tr>
				<tr>
					<td width=75><b>Status: </b></td>
					<td><input type="text" name="status" size=30 value="<? echo $ship[8] ?>"></td>
				</tr>
				
				<tr>
					<td width="100%" colspan=2">
						<INPUT TYPE="SUBMIT" VALUE="Save"><INPUT TYPE="RESET" VALUE="Clear Form">
					</td>
				</tr>
			</table>
			</form>
		</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100 class="lcars" valign="top">&nbsp;</td>
		<td width="15"><img src="images/lcars/bottom-corner.jpg" border=0></td>
		<td width="100%" valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100><center><img src="images/lcars/red-lower-left.jpg" border=0></td>
		<td width="100%" class="lcars" colspan=3 align="right"><img src="images/lcars/nub-right-small.gif" border=0></td>
	</tr>
</table>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=14" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code --> 
<? include("htinc/footer.html") ?>
</body> </HTML> <? mysql_close($link) ?>
