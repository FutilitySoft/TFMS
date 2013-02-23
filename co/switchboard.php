<?php
	
	include("conf/config.php");
	$coid = $HTTP_COOKIE_VARS[$randomstr];
	
	
	$qry = "SELECT id, charname, rank, email, password, realname, race, tfrole  FROM co WHERE id=" . $coid;
	$coqry = mysql_query($qry,$link) or die("can't get co query: coid - $coid");
	$co = mysql_fetch_row($coqry);
	/*
		0 = id
		1 = charname
		2 = rank
		3 = email
		4 = password
		5 = realname
		6 = race
		7 = tfrole
	*/
	
	
	$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp,status, image, sorder, lastmreport, missiontitle FROM ships WHERE co=" . $coid;
	$shipqry = mysql_query($qry,$link) or die("Can't perform ship's query: coid - $coid");
	$ship = mysql_fetch_row($shipqry);
		/*
			0 = id
			1 = name
			2 = registry
			3 = class
			4 = website
			5 = co
			6 = xo
			7 = mco
			8= grp
			9= status
			10 = img
			11= sorder
			12 = last report date
			13 = mission title
		*/
	
	$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE ship=" . $ship[0];
	$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query: coid - $ship[0]");
	$hascrew = mysql_num_rows($crewqry);
	$crew = mysql_fetch_row($crewqry);

?>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="100%">
			<p>Welcome to the CO's Administration Interface for <?=$taskforce_sn?>.  Here you can maintain your crew
			list, post announcements and submit your monthly reports.</p>
			<p>You can no longer change your ships status through the
			lounge. Ship status changes must go through either your
			TFCO or TFXO. Plese contact them to have this change
			made.</p>
			<br>
		<table>
		<tr>
			<td><b>Ship Name: </b></td>
			<td><? echo stripslashes($ship[1]) ?></td>
		</tr>
		<tr>
			<td><b>Status:</b></td>
			<td>
				<!--form action="cotemplate.php?pageref=status" method="post">
				<input type="hidden" name="action" value="status" />
				<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
				<input type="text" name="variable" size="50" value="<? echo $ship[9] ?>" />
				<input type="submit" value="Edit" />
				</form-->
				<? echo $ship[9]; ?>
			</td>
		</tr>
		<tr>
			<td><b>Mission:</b></td>
			<td>
				<form action="cotemplate.php?pageref=mission" method="post">
				<input type="hidden" name="action" value="mission" />
				<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
				<input type="text" name="variable" size="50" value="<? echo stripslashes($ship[13]) ?>" />
				<input type="submit" value="Edit" />
				</form>
			</td>
		</tr>
		<tr>
			<td><b>Ship Website:</b></td>
			<td>
				<form action="cotemplate.php?pageref=website" method="post">
				<input type="hidden" name="action" value="website" />
				<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
				<input type="text" name="variable" size="50" value="<? echo $ship[4] ?>" />
				<input type="submit" value="Edit" />
				</form>
			</td>
		</tr>
		<tr>

			<td><b>Current XO:</b></td>
			<td>
				<form action="cotemplate.php?pageref=xo" method="post">
				<input type="hidden" name="action" value="xo" />
				<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
				<select name="variable">
				
<?
				if($ship[6] != 0){
					echo("<option value=\"0\" selected=\"selected\">No XO currently aboard</option>");
				}else{
					echo("<option value=\"0\">No XO currently aboard</option>");
				}
				while($crew != 0){
					if($ship[6] == $crew[0]){
						echo("<option value=\"$crew[0]\" selected=\"selected\">$crew[2]</option>");
					}
					else{
						echo("<option value=\"$crew[0]\">$crew[2]</option>");
					}
					$crew = mysql_fetch_row($crewqry);
				}
?>			
				</select>
				<input type="submit" value="Assign">
				</form>
			</td>

		</tr>
		<tr>
			<td><b>Current Marine CO:</b></td>
			<td>
				<form action="cotemplate.php?pageref=mco" method="post">
				<input type="hidden" name="action" value="mco" />
				<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
				<select name="variable">
				
<?
				if($ship[7] == 0){
					echo("<option value=\"0\" selected=\"selected\">No MCO currently aboard</option>");
				}else{
					echo("<option value=\"0\">No MCO currently aboard</option>");
				}
				if($ship[7] == -1){
					echo("<option value=\"-1\" selected=\"selected\">No MCO position - do not display</option>");
				}else{
					echo("<option value=\"-1\">No MCO position - do not display</option>");
				}
				
				$qry = "SELECT * FROM crewlist WHERE ship=" . $ship[0];
				$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query");
				$crew = mysql_fetch_row($crewqry);
				while($crew != 0){
					if($ship[7] == $crew[0]){
						echo("<option value=\"$crew[0]\" selected=\"selected\">$crew[2]</option>");
					}
					else{
						echo("<option value=\"$crew[0]\">$crew[2]</option>");
					}
					$crew = mysql_fetch_row($crewqry);
				}
?>			
				</select>
				<input type="submit" value="Assign">
				</form>
			</td>

		</tr>
		</table>
			<br>
			<b>Current Crew:</b>
			<table border=1>
				<tr>
					<td width=100><b>Rank</b></td>
					<td width=200><b>Name</b></td>
					<td width=200><b>Position</b></td>
					<td width=100><b>E-mail</b></td>
					<td colspan="2">&nbsp;</td>
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
				$qry = "SELECT * FROM crewlist WHERE ship=" . $ship[0];
				$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query");
				$hascrew = mysql_num_rows($crewqry);
				$crew = mysql_fetch_row($crewqry);
				while($crew != 0){
?>
				<tr>
<?
					if($crew[3] == 110){
?>
					<td width=100>Civilian</td>
<?
					}
					else{
					$qry = "SELECT rankdesc,image FROM rank WHERE rankid=" . $crew[3];
					$rankqry = mysql_query($qry,$link);
					$rank = mysql_fetch_row($rankqry);
?>
					<td width=100><img src="<? echo $BaseURL; ?>/images/<? echo $rank[1] ?>"></td>
<?
					}
?>
					
					<td width=200><? 
							if($crew[3] == 110){
								echo $crew[2];
							}
							else {
								echo $rank[0] . " " . stripslashes($crew[2]); 
							}
						      ?></td>					
					<td width=200><? echo $crew[5] ?></td>
					<td width=100><? echo $crew[4] ?></td>
					<td>
						<form action="cotemplate.php?pageref=edit_crew" method="post">
						<input type="hidden" name="id" value="<? echo $crew[0]; ?>"/>
						<input type="submit" value="Edit" />
						</form>
					</td>
					<td>
						<form name="crew_<?echo $crew[0];?>" action="cotemplate.php?pageref=deletecrew" method="post">
						<input type="hidden" name="action" value="deletecrew" />
						<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
						<input type="hidden" name="id" value="<?echo $crew[0];?>" />
						<input onclick="removecrew_<?echo $crew[0];?>()" type="button" value="Delete" />
						<script language="JavaScript">
						function removecrew_<?echo $crew[0];?>()
						{
						if (confirm("Are you sure you want to remove <?=$crew[2]?> from your roster? "))
						{
							document.crew_<?echo $crew[0];?>.submit();
						}
						}
						</script>
						</form>
					</td>
				</tr>
<?
					$crew = mysql_fetch_row($crewqry);
				}
			}
		
?>
		<tr>
			<form action="cotemplate.php?pageref=add" method="post">
			<input type="hidden" name="action" value="add" />
			<input type="hidden" name="shipid" value="<? echo $ship[0]; ?>">
			<td>&nbsp;</td>
			<td><input type="text" name="charname" size="20" /></td>
			<td><input type="text" name="position" size="20" /></td>
			<td><input type="text" name="email" size="20" /></td>
			<td>
				<input type="submit" value="Add" />
				
			</td>
			</form>
			<td>&nbsp;</td>
		</table>
		<center>
		Remember to add yourself to the crewlist!
		<br>
			[<a href="cotemplate.php?pageref=edit_co">Edit your CO Info</a>]&nbsp;&nbsp;
			[<a href="cotemplate.php?pageref=month_report">File Monthly Report</a>]&nbsp;&nbsp;
			[<a href="cotemplate.php?pageref=post_announcement">Post Announcement</a>]&nbsp;&nbsp;
		</td>
		<td width="15">&nbsp;</td>
	</tr>
</table>
<? mysql_close($link) ?>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=11" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
