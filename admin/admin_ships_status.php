<?php
	
	$adminid = $HTTP_COOKIE_VARS[$randomstr2];
	if($adminid == 0) {
		header ("Location: admin_login.php");
		exit;
	}
		
	$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp, status, image, sorder, lastmreport, missiontitle, shiprole FROM ships WHERE id=" . $shipid;
	$shipqry = mysql_query($qry,$link) or die("Can't perform ship's query");
	$ship = mysql_fetch_row($shipqry);
	
	if($ship[5] != 0){
		$qry = "SELECT id, charname, rank, email, password, realname, race, tfrole FROM co WHERE id=" . $ship[5];
		$coqry = mysql_query($qry,$link) or die("can't get co query");
		$co = mysql_fetch_row($coqry);
		/*
		  0 = id
		  1 = charname
		  2 = rank
		  3 = email
		  4 = password
		  5 = realname
		  6 = race
		  7 = birthplace
		  8 = sex
	 	 9 = height
		  10 = weight
		  11 = physical
		  12 = bio
		  13 = experience
		*/
	
		$qry = "SELECT rankid, rankdesc, image, color FROM rank WHERE rankid=" . $co[2];
		$corankqry = mysql_query($qry,$link) or die("Can't get CO rank");
		$corank = mysql_fetch_row($corankqry);
	}
	
	$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE ship=" . $ship[0];
	$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query");
	$hascrew = mysql_num_rows($crewqry);
	$crew = mysql_fetch_row($crewqry);
	

	if($ship[6] != 0){
		$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE id=" . $ship[6];
		$xoqry = mysql_query($qry,$link) or die("Can't select XO");
		$xo = mysql_fetch_row($xoqry);
		
		$qry = "SELECT rankid, rankdesc, image, color FROM rank WHERE rankid=" . $xo[3];
		$xorankqry = mysql_query($qry,$link) or die("Can't get XO rank");
		$xorank = mysql_fetch_row($xorankqry);
	}
	
	if($ship[7] > 1){
		$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE id=" . $ship[7];
		$mcoqry = mysql_query($qry,$link) or die("Can't select MCO");
		$mco = mysql_fetch_row($mcoqry);
		
		$qry = "SELECT rankid, rankdesc, image, color FROM rank WHERE rankid=" . $mco[3];
		$mcorankqry = mysql_query($qry,$link) or die("Can't get MCO rank");
		$mcorank = mysql_fetch_row($mcorankqry);
	}
?>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="100%">
			<b>Ship Name: </b><? echo $ship[1] ?><br>
			<img src="images/ships/<?=$ship[10] ?>"><br>
			<b>Status: </b><? echo $ship[9] ?><br>
			<b>Mission: </b><? echo $ship[13] ?><br>
			<b>Ship Website: </b><? echo $ship[4] ?><br>
<?
			if($ship[5] != 0){
?>
			<b>Current CO: </b><img src="<? echo $BaseURL ?>/images/<? echo $corank[2] ?>">&nbsp;<? echo $corank[1] . " " . $co[1]?><br>
<?
			}
			else{
?>
			<b>Current CO: </b>No CO currently assigned<br>
<?
			}
			if($ship[6] != 0){
?>
			<b>Current XO: </b><img src="<? echo $BaseURL ?>/images/<? echo $xorank[2] ?>">&nbsp;<? echo $xorank[1] . " " . $xo[2]?><br>
<?
			}
			else{
?>
			<b>Current XO: </b>No XO currently assigned<br>
<?
			}
			if($ship[7] > 0){
?>
			<b>Current MCO: </b><img src="<? echo $BaseURL ?>/images/<? echo $mcorank[2] ?>">&nbsp;<? echo $mcorank[1] . " " . $mco[2]?><br>
<?
			}
			else if($ship[7] == 0){
?>
			<b>Current MCO: </b>No MCO currently assigned<br>
<?
			}
			else{
				?><b>Current MCO:</b><i>Does not want an MCO</i><br><?
			}
?>
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
				while($crew != 0){
?>
				<tr>
<?
					if($crew[3] == 110){
?>
					<td width=100>Civillian</td>
<?
					}
					else{
					$qry = "SELECT rankdesc,image FROM rank WHERE rankid=" . $crew[3];
					$rankqry = mysql_query($qry,$link);
					$rank = mysql_fetch_row($rankqry);
?>
					<td width=100><img src="<? echo $BaseURL ?>/images/<? echo $rank[1] ?>"></td>
<?
					}
?>
					
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
		<center>[<a href="admintemplate.php?pageref=switchboard">Back to Admin Tools Menu</a>]</center>
		</td>
	</tr>

</table>
<? mysql_close($link) ?>
