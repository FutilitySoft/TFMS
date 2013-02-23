<?php
	
	$qry = "SELECT id, charname, rank, email, password, realname, race, tfrole FROM co WHERE id=" . $coid;
	$coqry = mysql_query($qry,$link) or die("can't get co query");
	$co = mysql_fetch_row($coqry);

	$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp, status, image, sorder, lastmreport, missiontitle, shiprole FROM ships WHERE co=" . $coid;
	$shipqry = mysql_query($qry,$link) or die("Can't perform ship's query");
	$ship = mysql_fetch_row($shipqry);
	
	$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE ship=" . $ship[0];
	$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query");
	$hascrew = mysql_num_rows($crewqry);
	$crew = mysql_fetch_row($crewqry);
	
?>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="100%">
		<form method="post" action="cotemplate.php?pageref=month_report_engine">
			Welcome to the monthly report generator.  As a CO of a ship in Bravo Fleet, you are required to submit
			a monthly report to the Task Force CO.  Please check and complete the following information<br>
			<br>
			<b>Ship Name: </b><? echo $ship[1] ?><br>
			<b>Status: </b><? echo $ship[9] ?><br>
			<b>Ship Website: </b><? echo $ship[4] ?><br>
			<br>
			<b>Current Crew:</b>
			<table border=1>
				<tr>
					<td width=100><b>Rank</b></td>
					<td width=200><b>Name</b></td>
					<td width=200><b>Position</b></td>
					<td width=100><b>E-mail</b></td>
				</tr>
				
<?
			if($hascrew == 0){
?>
				<tr>
					<td width="100%" colspan=4><center><i>No crew currently assigned</i><center></td>
				</tr>
<?
			}
			else {
				$crewcount = 0;
				while($crew != 0){
					$crewcount++;
?>
				<tr>
<?
					$qry = "SELECT rankdesc,image FROM rank WHERE rankid=" . $crew[3];
					$rankqry = mysql_query($qry,$link);
					$rank = mysql_fetch_row($rankqry);
?>
					<td width=100><img src="<? echo $BaseURL; ?>/images/<? echo $rank[1] ?>"></td>
					<td width=200><? 
							if($crew[3] == 110){
								echo $crew[2];
							}
							else {
								echo $rank[0] . " " . $crew[2]; 
							}
						      ?></td>
					<td width=200><? echo $crew[5] ?></td>
					<td width=100><? echo $crew[4] ?></td>
				</tr>
<?
					$crew = mysql_fetch_row($crewqry);
				}
			}
?>
		</table>
		<br>
		
		<p><b>Mission Description:</b><br>
		<textarea name="missiondesc" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea><br><br>
		<p><b>Ship Awards:</b><br>
		<textarea name="shipawards" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea><br><br>
		<p><b>Crew Promotions:</b><br>
		<textarea name="promotions" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea><br><br>
		<p><b>Website Updates:</b><br>
		<textarea name="websiteupdates" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea><br><br>
		<INPUT TYPE="SUBMIT" VALUE="Submit"><INPUT TYPE="RESET" VALUE="Clear Form">
		</form>
		</td>
	</tr>

</table>

<? mysql_close($link) ?>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=13" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
