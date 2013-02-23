<?
	//include("../conf/config.php");
	$coid = $HTTP_COOKIE_VARS[$randomstr2];
	
	
?>

<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="100%" height=300>
			<center>
			Please enter your e-mail address and password to access the Admin Functions
			<?
				if($code==1){
			?>
			<br><b><i>Invalid E-mail/Password Combination</i></b>
			<?
				}
			?>
			<hr width="75%">
			<form method="post" action="admintemplate.php?pageref=loginvfy">
			<table>
				<tr>
					<td><b>Email Address: </b></td>
					<td><input type="text" name="email" size=30><br></td>
				</tr>
				
				<tr>
					<td><b>Password: </b></td>
					<td><input type="password" name="password" size=30><br></td>
				</tr>
				
				<tr>
					<td colspan=2><center><INPUT TYPE="SUBMIT" VALUE="Login"><INPUT TYPE="RESET" VALUE="Clear Form"></center></td>
				</tr>
			</table>
			<hr width="75%">
			</center>
		</td>
		<td width="15">&nbsp;</td>
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
