<!-- 
	You should not be editing this file unless you are making a new
	version of the TFadmin software. If you wish to make stylistic changes
	to this it should all be done through the websites stylesheets. 
	
	Future Versions of the TFadmin project will most likely overwrite the 
	entire contents of this directory and all the files contained therein.
	Therefore to make life easier for all involved please leave this alone.
	
-->

<?
	include("conf/config.php");
	$coid = $HTTP_COOKIE_VARS[$randomstr2];
	
	$qry = "SELECT ships.id as shipid, ships.name as shipname, rank.rankdesc, co.charname,
		co.email as coemail, ships.missiontitle, 
		grp.name as grpname, co.id as coid, ships.grp, ships.status, ships.lastmreport 
		FROM ships,rank,co,grp 
		WHERE ships.co = co.id AND co.rank = rank.rankid
		AND ships.grp = grp.id AND ships.co <> 0 ORDER BY ships.grp, ships.sorder";
	$shipsqry = mysql_query($qry,$link) or die(mysql_error());
	$ships = mysql_fetch_array($shipsqry);
?>

<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width=100 valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
		<td width="100%" height="300">
		<center>Welcome to the Administration Tool for the <? echo $taskforce_ab; ?> Website</center><br>
		<br>
		
		<table border="1" width="100%">
			<tr>
				<td colspan="3" class="SB_title"><b>Current Crewed Ships</b></td>
			</tr>

<?
		$TGname = "none";
		while($ships != 0){

		if ($TGname != $ships["grpname"])
		{
			$TGname = $ships["grpname"];
			$TGqry = "SELECT grp.co as tgcoid, co.charname as TGCOname, co.email as TGCOemail from grp, co where grp.co=co.id and grp.name='". $ships["grpname"] ."'";
			$TGquery = mysql_query($TGqry,$link) or die(mysql_error());
			$TGCO_RS = mysql_fetch_array($TGquery);
		
?>
			<tr>
				<td colspan="2" class="groupname"><? echo $ships["grpname"]; ?> (<a href="mailto:<?=$TGCO_RS["TGCOemail"]?>"><? echo $TGCO_RS["TGCOname"];?></a>)</td>
				<td class="groupname"><form action="admintemplate.php?pageref=manage_grp" method="post">
					<input type="hidden" name="grpid" value="<? echo $ships["grp"] ?>" />
					<input type="submit" value="Edit" />
					</form></td>
			</tr>
			<tr>
				<td class="SB_header">Ship Name</td>
				<td class="SB_header">CO</td>
				<td class="SB_header">&nbsp;</td>
			</tr>
<?
		}
?>
			<tr>
				<td>
					<div class="shipname"><? echo $ships["shipname"]; ?></div>
					<?
					$qry = "SELECT count(id) as count FROM crewlist where ship=" . $ships["shipid"];
					$crewqry = mysql_query($qry,$link) or die(mysql_error());
					$crewcount = mysql_fetch_array($crewqry);
					
					if ((int)$crewcount["count"] < 5 )
					{
					  echo "<div class=\"ShipInactive\">";
					}
					else
					{
					  echo "<div>";
					}
					?>
					
					Crew: <?=$crewcount["count"]?></div>
					Status: <? echo $ships["status"]; ?>
					<table width="100%">
					<tr>
					<td>
					<form action="admintemplate.php?pageref=edit_ship" method="post">
					<input type="hidden" name="shipid" value="<? echo $ships["shipid"] ?>" />
					<input type="submit" value="Edit" />
					</form>
					</td>
					<td>
					<form action="admintemplate.php?pageref=shipedit" method="post">
					<input type="hidden" name="shipid" value="<? echo $ships["shipid"] ?>" />
					<input type="hidden" name="action" value="delship" />
					<!--input type="submit" value="Delete" /-->
					</form>
					</td>
					<td>
					<form action="admintemplate.php?pageref=ships_status" method="post">
					<input type="hidden" name="shipid" value="<? echo $ships["shipid"] ?>" />
					<input type="submit" value="Status" />
					</form>					
					</td>
					<td>
					<form action="admintemplate.php?pageref=manageship" method="post">
					<input type="hidden" name="action" value="manageship" />
					<input type="hidden" name="cosid" value="<? echo $ships["coid"] ?>" />
					<input type="submit" value="Manage" />
					</form>					
					</td>
					</tr>
					</table>
				</td>
				<td>
					<div class="coname"><? echo $ships["rankdesc"] . " " . stripslashes($ships["charname"]); ?></div>
					<table width="100%">
					<tr>
					<td>
					<form action="admintemplate.php?pageref=edit_co" method="post">
					<input type="hidden" name="co" value="<? echo $ships["coid"] ?>" />
					<input type="hidden" name="action" value="status" />
					<input type="submit" value="Edit" />
					</form>
					</td>
					<td>
					<form action="admintemplate.php?pageref=deleteco" method="post">
					<input type="hidden" name="co" value="<? echo $ships["coid"] ?>" />
					<input type="hidden" name="action" value="deleteco" />
					<input type="submit" value="Delete" />
					</form>
					</td>
					<td>
					&nbsp;
										
					</td>
					</tr>
					</table>
				
				</td>
				<td>
					<p class="coemail">email: <?=$ships["coemail"]?></p>	
					<p class="mission">Mission: <?=$ships["missiontitle"]?></p>
					<P class="mission">Report: <?=$ships["lastmreport"]?></p>
				</td>
			</tr>
<?
			$ships = mysql_fetch_array($shipsqry);
		}
?>
			<tr>
				<td colspan="3"><b>Open Commands and Mothballs</b></td>
			</tr>
			<tr>
				<td><b>Ship Name</b></td>
				<td><b>CO</b></td>
				<td><b>TG</b></td>
			</tr>
<?
		$qry = "SELECT ships.id, ships.name, grp.name FROM ships,grp 
			WHERE ships.co = 0 AND ships.grp = grp.id ORDER BY ships.grp";
		$shipsqry = mysql_query($qry,$link) or die(mysql_error());
		$ships = mysql_fetch_array($shipsqry);
		while($ships != 0){
?>
			<tr>
				<td>
				<? echo $ships[1]; ?>
				<table width="100%">
				<tr>
				<td>
				<form action="admintemplate.php?pageref=edit_ship" method="post">
				<input type="hidden" name="shipid" value="<? echo $ships[0] ?>" />
				<input type="submit" value="Edit" />
				</form>
				</td>
				<td>
				<form action="admintemplate.php?pageref=delship" method="post">
				<input type="hidden" name="shipid" value="<? echo $ships[0] ?>" />
				<input type="hidden" name="action" value="delship" />
				<input type="submit" value="Delete" />
				</form>
				</td>
				<td>
					<form action="admin_manageship.php" method="post">
					<input type="hidden" name="shipid" value="<? echo $ships[0] ?>" />
					<input type="hidden" name="action" value="status" />
					<!--input type="submit" value="Manage" /-->
					</form>					
				</td>
				</tr>
				</table>
				</td>
				<td>&nbsp;</td>
				<td><? echo $ships[2]; ?>
				<form action="admintemplate.php?pageref=manage_grp" method="post">
					<input type="hidden" name="grpid" value="<? echo $ships[6] ?>" />
					<input type="submit" value="Edit" />
					</form>

				</td>
			</tr>
<?
			$ships = mysql_fetch_array($shipsqry);
		}
?>
			<tr>
				<td colspan="3"><b>Add a ship</b></td>
			</tr>
				<td><b>Ship Name</b></td>
				<td><b>Class</b></td>
				<td><b>Registry #</b></td>
			</tr>
			<form action="admintemplate.php?pageref=addship" method="post">
			<tr>
				
				<input type="hidden" name="action" value="addship" />
				<td><input type="text" name="shipname" size="20" /></td>
				<td><input type="text" name="shipclass" size="20" /></td>
				<td><input type="text" name="registry" size="20" /></td>
			</tr>
						</tr>
				<td><b>Status</b></td>
				<td><b>Sort Order</b></td>
				<td>&nbsp;</td>
			</tr>
			<tr>
				<td><input type="text" name="status" size="20" /></td>
				<td><input type="text" name="sorder" size="10" /></td>
				<td><input type="submit" value="Add Ship" /></td>
			</tr>
			</form>
		</table>
		</td>
	</tr>
	<tr>
		<td colspan="3"><a href="admintemplate.php?pageref=colist">CO List</a></td>
	</tr>
</table>
<? mysql_close($link) ?>
<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=17" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
