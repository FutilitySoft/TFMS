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
	<P><img alt="Task Force Seventy-Two" src="images/title-taskforce_ships.gif" width="400" height="40">
	<center>
<table border=0 cellpadding=0 cellspacing=0 width="100%">
	<tr>
		
<?
	if($tgid==0){
?>
<td width=100% valign="middle">
<p>Task Force 72 is made up of five Task Groups.</center><br>
<p>Click on the left to see the various organizational subunits of TF72's ships. If you see a ship that interests you, you can find out how to join up with that ship from their website.  Or alternatively, you can submit an application to the CO of the Task Force by clicking the JOIN link at the bottom of each page and they will place you with a ship needed a crewmember with your qualifications.</p>
</td>
<?
	}
	else{
?>
		<td width=100% valign="top">
		<center><h1><font size="5" color="#7898AD"><? echo $group[1]; ?></font></h1></center><br>
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
		<table cellspacing="0" width="100%">




		<tr>
		    <td width="100%" colspan="2" align="center" height="81"><b><font size="5" color="#7898AD"><strong><? echo stripslashes($ship[1])?></strong></font><br><? echo stripslashes($ship[2])?></b><br>
		    <? if($ship[14] != ""){ ?><strong><font size="4"><i><? echo stripslashes($ship[14]); ?></i></font></strong><? }?><br></font>
		    </td>
		</tr>
		<tr>
		<td colspan="2" align="center"><font color="#7898AD" size="4">Current Mission: </font><font size="4"><? echo stripslashes($ship[13]) ?></font></td>
		</tr>
		<tr><td>
		<table width="600" border="0" align="center">
		<tr>
				<td width="50%" align="right" valign="center">
<?				if( $ship[4] != $none){
					echo '<a href="' . $ship[4] .'" target="_blank">';
					echo '<img src="images/ships/' . $ship[10] .'" border=0 width=376>';
					echo '</a>';
				}
				else {
					echo '<img src="images/ships/' . $ship[10] .'" border=0 width=376>';
				}
?>
				</td>
				<td width="50%" valign="top">
				<table border="0" width="100%" valign="top">
				<tr>
				<td width="100%"><font color="#7898AD"><b>Class: </b></font><? echo stripslashes($ship[3]) ?></td>
			        </tr>
				<tr>
				<td width="100%"><font color="#7898AD"><b>Status: </b></font><? echo stripslashes($ship[9]) ?></td>
				</tr>
				<tr>
<? 
$qry = "SELECT count(id) as count FROM crewlist WHERE ship=" . $ship[0];
$crewqry = mysql_query($qry,$link) or die("Invalid Crewlist Query");
$crewcount = mysql_fetch_array($crewqry);
?>
				<td width="100%"><font color="#7898AD"><b>Members: </b></font><? echo $crewcount["count"] ?></td>
				</tr>
				</table>
				</td>
			</tr>

			<tr>
				<td width="100%" colspan="2">
				<table width="85%" align="center" border="0">
				<tr>
				<td>
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
				<b>CO: </b><a href="<? $BaseURL ?>template.php?pageref=co_apply">This ship is available. Apply Today!</td>
<?
				}
?>
			</tr>
			<tr>
				<td>
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
				<b>Executive Officer:</b><br>&nbsp;&nbsp;&nbsp;Available! Apply today!.
<?
				}
?>
				</td>
			</tr>
			<tr>
				<td>
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
				<b>Marine Commander:</b><br>&nbsp;&nbsp;&nbsp;Available! Apply today!
<?
				}
				else if($ship[7] == -1){
					echo "&nbsp;";
				}
?>
				</td>
			</tr>
			</table>
			</td></tr></table>
			</td>
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

