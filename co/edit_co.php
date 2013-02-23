<?
	

	$qry = "SELECT id, charname, rank, email, password, realname, race, tfrole FROM co WHERE id=" . $coid;
	$coqry = mysql_query($qry,$link) or die("Can't get co");
	$co = mysql_fetch_row($coqry);
	
	$qry = "SELECT rankid, rankdesc, image, color FROM rank";
	$rankqry = mysql_query($qry,$link) or die("Can't get ranks");
	$rank = mysql_fetch_row($rankqry);
	
	
	
?>
<center>
<table border=0 cellpadding=0 cellspacing=0>

	<tr>
		<td width="100%" height="300">
		<center>Edit the CO's Information</center><br>
		<br>
		</center>
		<form method="post" action="cotemplate.php?pageref=edit_co_engine">
		<input type="hidden" name="id" value=<? echo $coid ?>>
		<table width=640>
			<tr>
				<td width=150><b>Character Name: </b></tr>
				<td width=490><input type="text" name="charname" size="30" value="<? echo $co[1] ?>"></td>
			</tr>
				
			<tr>
				<td width=150><b>E-mail: </b></tr>
				<td width=490><input type="text" name="email" size="30" value="<? echo $co[3] ?>"></td>
			</tr>
			
			<tr>
				<td width=150><b>Password: </b></tr>
				<td width=490><input type="text" name="password" size="30" value="<? echo $co[4] ?>"></td>
			</tr>
			
			<tr>
				<td width=150><b>Real Name: </b></tr>
				<td width=490><input type="text" name="realname" size="30" value="<? echo $co[5] ?>"></td>
			</tr>
			
			<tr>
				<td width=150><b>Race: </b></tr>
				<td width=490><input type="text" name="race" size="30" value="<? echo $co[6] ?>"></td>
			</tr>
			
			<tr>
				<td width=640 colspan=2><INPUT TYPE="SUBMIT" VALUE="Edit CO"><INPUT TYPE="RESET" VALUE="Clear Form"></td>
			</tr>
		</table>
		</form>
		</td>
	</tr>

</table>
<? mysql_close($link) ?>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=16" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
