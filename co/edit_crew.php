<?php
	
	$coid = $HTTP_COOKIE_VARS[$randomstr];
	if($coid == 0) {
		header ("Location: login.php");
		exit;
	}
	
	$qry = "SELECT * FROM rank ORDER BY rankid";
	$rankqry = mysql_query($qry,$link) or die("Can't perform rank query");
	$rank = mysql_fetch_row($rankqry);
	
	$qry = "SELECT * FROM crewlist WHERE id=" . $id;
	$crewqry = mysql_query($qry,$link) or die(mysql_error());
	$crew = mysql_fetch_row($crewqry);
	
?>

<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width=100 valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
		<td width="100%">
		<center><h2>Edit a Crewman</h2></center>
			<form method="post" action="cotemplate.php?pageref=edit_crew_engine">
			<input type="hidden" NAME="crewid" VALUE="<? echo $id ?>">
			<i>All of the following information is required.</i><br>
			<table>
				<tr>
					<td width=75><b>Name: </b></td>
					<td><input type="text" name="name" size=30 value="<? echo stripslashes($crew[2]) ?>"></td>
				</tr>
				<tr>
					<td colspan="2"><font size="-1"><i>DO NOT include the rank with the character's name.  It will be automatically generated when you pick the rank below</i></font></td>
				</tr>
				<tr>
					<td width=75><b>E-mail Address: </b></td>
					<td><input type="text" name="email" size=30 value="<? echo $crew[4] ?>"></td>
				</tr>
				<tr>
					<td width=75><b>Position: </b></td>
					<td><input type="text" name="position" size=30 value="<? echo stripslashes($crew[5]) ?>"></td>
				</tr>
				<tr>
					<td width=75><b>Rank: </b></td>
					<td>
						<SELECT NAME="rank" size="1">
<?
						while($rank != 0){
							if($rank[0] == $crew[3]){
?>
							<option value="<?echo $rank[0] ?>" selected="SELECTED"><? echo $rank[1] . " (" . $rank[3] . ")" ?></option>
<?
							$rank = mysql_fetch_row($rankqry);
							}
							else{
?>
							<option value="<? echo $rank[0] ?>"><? echo $rank[1] . " (" . $rank[3] . ")" ?></option>
<?
							$rank = mysql_fetch_row($rankqry);
							}
						}
?>
						</SELECT>
					</td>
				</tr>
				<tr>
					<td colspan="2"><font size="-1"><i>The rank is color sensitive.  Please make admin officers red, services orange, science blue, diplomat purple and marine staff green!</i></font></td>
				</tr>
				<tr>
					<td width="100%" colspan="2">
						<INPUT TYPE="SUBMIT" VALUE="Edit"><INPUT TYPE="RESET" VALUE="Clear Form">
					</td>
				</tr>
			</table>
			</form>
		</td>
		<td width="15">&nbsp;</td>
	</tr>
</table>
<? mysql_close($link) ?>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=15" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
