<?php

	if($tgid != 0){

		$none = "none";
	
		$qry = "SELECT * FROM grp WHERE id=" . $tgid;
		$grpqry = mysql_query($qry,$link) or die("Invalid group query");
		$group = mysql_fetch_row($grpqry);
		/*
			0 = id
			1 = name
			2 = flagship
			3 = co
		*/
		
		$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp, status, image, sorder, lastmreport, missiontitle, shiprole FROM ships where grp=" . $tgid . " order by sorder asc";
		$shipqry = mysql_query($qry,$link) or die("Invalid ship query");
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
			14 = role
		*/
		
		$qry = "SELECT * FROM ships WHERE id=" . $group[2];
		$flagqry = mysql_query($qry,$link) or die("Invalid Flaship Query");
		$flagship = mysql_fetch_row($flagqry);
		}
?>
	<P><img alt="Task Force Seventy-Two" src="images/title-taskforce_ships.gif" >
	<center>
<table border=0 cellpadding=0 cellspacing=0 width="100%">
	<tr>
		
<?
	if($tgid==0){
?>
<td width=100% valign="middle">
<p>Task Force Seventy-Two is made up of five Task Groups.</center><br>
                        <p>Click on the left to see the various organizational subunits of TF72's ships.
                        If you see a ship that interests you, you can find out how to join up with
                        that ship from their website.  Or alternatively, you can
                        submit an application to the CO of the Task Force by clicking the JOIN
                        link at the bottom of each page and they will place you with a ship
                        needed a crewmember with your qualifications.<br>
                        
</td>
<?
	}
	else{
?>
		<td width=100% valign="top">
		<center><h2 class="title4"><? echo $group[1]; ?></h2></center><br>
		Click on the graphic to visit the ships's website.  Click on the
                	CO's name to e-mail that CO.<br>
<!--GROUP MEMBER SHIPS START HERE IN A PHP LOOP -->
<? if($group[1] == 'Open Commands'){
		echo("<center><h2><b>Open Ships</b><h2></center><br>");
		echo("<br><center>Go to the <a href='co_apply.php'>Command Application</a> to apply!</center><br>");
	}
?>
<?
			while($ship != 0){
?>		
		<center>
		<hr>
		<table cellspacing="2" width="95%">
			<tr>
				<td width=340 rowspan=5 align="left" valign="center">
<?				if( $ship[4] != $none){
					echo '<a href="' . $ship[4] .'" target="_blank">';
					echo '<img src="images/ships/' . $ship[10] .'" border=0 width=376 height=110>';
					echo '</a>';
				}
				else {
					echo '<img src="images/ships/' . $ship[10] .'" border=0 width=376 height=110>';
				}
?>
				</td>
				<td width=100%><b><? echo stripslashes($ship[1])?>&nbsp;&nbsp;-&nbsp;&nbsp;<? echo stripslashes($ship[2])?><br>
				<? if($ship[14] != ""){
				?>&nbsp;&nbsp;&nbsp;&nbsp;<i><? echo stripslashes($ship[14]); ?></i><?
				}?>
				</td>
			</tr>
			<tr>
				<td width=100%><b>Class: </b><? echo stripslashes($ship[3]) ?> </td>
			</tr>
			
			<tr>
				<td width=100%>
<? 				
				if( $ship[5] != 0){
				$qry = "SELECT charname,rank,email,tfrole FROM co WHERE id=" . $ship[5];
				$shipcoqry = mysql_query($qry,$link) or die("Bad Ship CO query");
				$shipco = mysql_fetch_row($shipcoqry);
				
				$qry = "SELECT * FROM rank where rankid=" . $shipco[1];
				$rankcoqry = mysql_query($qry,$link) or die("Bad Ship CO Rank Query");
				$shipcorank = mysql_fetch_row($rankcoqry);
?>
				<b>Commanding Officer 
				<? if($shipco[3] != ""){ echo "and " . $shipco[3]; }?>: </b><br><a href="mailto:<? echo $shipco[2] ?>"><img src="images/<? echo $shipcorank[2] ?>" align="absmiddle" border=0>&nbsp;<? echo $shipcorank[1]. " " . stripslashes($shipco[0])?></a>
				</td>
<?
				}
				else{
?>
				<b>CO: </b>This ship is available.  See the CO's Lounge for a CO Application!</td>
<?
				}
?>
			</tr>
			<tr>
				<td width=100%>
<?
				if($ship[6] !=0)
				{
				$qry = "SELECT charname,rank,email FROM crewlist WHERE id=" . $ship[6];
				$shipxoqry = mysql_query($qry,$link) or die(mysql_error() . "while<br>" . $qry);
				$shipxo = mysql_fetch_row($shipxoqry);
				
				$qry = "SELECT * FROM rank where rankid=" . $shipxo[1];
				$rankxoqry = mysql_query($qry,$link) or die(mysql_error() . "while<br>" . $qry);
				$shipxorank = mysql_fetch_row($rankxoqry);
?>
				<b>Executive Officer:</b><br><a href="mailto:<? echo $shipxo[2] ?>"><img src="images/<? echo $shipxorank[2] ?>" align="absmiddle" border=0>&nbsp;<? echo $shipxorank[1]. " " . stripslashes($shipxo[0])?></a>
<?
				}
				else{
?>
				<b>Executive Officer:</b><br>&nbsp;&nbsp;&nbsp;Position is available! See ship's website.
<?
				}
?>
				</td>
			</tr>
			<tr>
				<td width=100%>
<?
				if($ship[7] > 0)
				{
				$qry = "SELECT charname,rank,email FROM crewlist WHERE id=" . $ship[7];
				$shipmcoqry = mysql_query($qry,$link) or die(mysql_error() . "while<br>" . $qry);
				$shipmco = mysql_fetch_row($shipmcoqry);
				
				$qry = "SELECT * FROM rank where rankid=" . $shipmco[1];
				$rankmcoqry = mysql_query($qry,$link) or die(mysql_error() . "while<br>" . $qry);
				$shipmcorank = mysql_fetch_row($rankmcoqry);
?>
				<b>Marine Commander:</b><br><a href="mailto:<? echo $shipmco[2] ?>"><img src="images/<? echo $shipmcorank[2] ?>" align="absmiddle" border=0>&nbsp;<? echo $shipmcorank[1]. " " . stripslashes($shipmco[0])?></a> 
<?
				}
				else if($ship[7] == 0){
?>
				<b>Marine Commander:</b><br>&nbsp;&nbsp;&nbsp;Position is available! See ship's website.
<?
				}
				else if($ship[7] == -1){
					echo "&nbsp;";
				}
?>
				</td>
			</tr>
			<tr>
				<td width="*" colspan="2"><b>Status: </b><? echo $ship[9] ?></td>
			</tr>
			<tr>
				<td width="*" colspan="2"><b>Current Mission: </b><? echo stripslashes($ship[13]) ?></td>
			</tr>
		</table>
		<br><br>
<?	
			$ship = mysql_fetch_row($shipqry);
			}
?>
				
		
		</td>
<?	}

mysql_close($link);
?>
		<td width="15">&nbsp;</td>
	</tr></table></center>
<br>
</td>
  </tr>
</table>


<!-- Begin The Elite Force Alliance Star Trek Banner Exchange Code -->
<BR><P><CENTER><A
HREF="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;banner=NonSSI;page=01" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/scripts/ads.pl?member=tf72;page=02" WIDTH=468
HEIGHT=60 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A><BR><A
HREF="http://www.elite-force-alliance.org/ads/index.htm" TARGET="_blank"><IMG
SRC="http://www.elite-force-alliance.org/ads/STBanExUnderbar.gif" WIDTH=468
HEIGHT=20 ALT="The Elite Force Alliance Star Trek Banner
Exchange" BORDER=0></A></CENTER>
<BR><!-- End The Elite Force Alliance Star Trek Banner Exchange Code -->
