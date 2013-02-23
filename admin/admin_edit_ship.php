<?php
	
	$adminid = $HTTP_COOKIE_VARS[$randomstr2];
	if($adminid == 0) {
		header ("Location: admin_login.php");
		exit;
	}
	
	$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp, status,image, sorder, lastmreport, missiontitle, shiprole  FROM ships WHERE id=" . $shipid;
	$shipqry = mysql_query($qry,$link) or die("Can't get ship 411");
	$ship = mysql_fetch_row($shipqry);
	
	$qry = "SELECT id,charname FROM co order by charname";
	$coqry = mysql_query($qry,$link) or die("Can't get co");
	$co = mysql_fetch_row($coqry);
		
	$qry = "SELECT id,name FROM grp";
	$grpqry = mysql_query($qry,$link) or die("Can't get groups");
	$grp = mysql_fetch_row($grpqry);
?>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="15">&nbsp;</td>
		<td width="100%" height="300">
		<center>
		<br>
		<form method="post" action="admintemplate.php?pageref=edit_ship_engine">
		<input type="hidden" name="shipid" value="<? echo $shipid ?>">
		<table width="640" cellspacing="1">
			<tr>
				<td width="150">Ship Name:</td>
				<td width="490"><input size="30" type="text" name="name" value="<? echo stripslashes($ship[1]) ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Ship Registry:</td>
				<td width="490"><input size="30" type="text" name="registry" value="<? echo $ship[2] ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Ship Class:</td>
				<td width="490"><input size="30" type="text" name="class" value="<? echo stripslashes($ship[3]) ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Task Group:</td>
				<td width="490">
					<SELECT NAME="grpid" size="1">
<?
	while($grp != 0){
		if($grp[0] == $ship[8]){
?>
						<OPTION value="<? echo $grp[0] ?>" selected="selected"><? echo $grp[1] ?></option>
<?
		}
		else{
?>
						<OPTION value="<? echo $grp[0] ?>"><? echo $grp[1] ?></option>
<?
		}
		
		$grp = mysql_fetch_row($grpqry);
	}
?>
					</SELECT>
				</td>
			</tr>
			
			<tr>
				<td width="150">Website:</td>
				<td width="490"><input size="30" type="text" name="website" value="<? echo $ship[4] ?>"></td>
			</tr>
			
			<tr>
				<td width="150">CO:</td>
				<td width="490">
					<select name="cosid" size="1">
					<option value="0" <? if($ship[5] == 0) {echo 'selected="selected"';} ?>>No CO</option>
<?
	while($co != 0){
		if($co[0] == $ship[5]){
?>
						<option value="<? echo $co[0] ?>" selected="selected"><? echo stripslashes($co[1]) ?></option>
<?
		}
		else{
?>						
						<option value="<? echo $co[0] ?>"><? echo stripslashes($co[1]) ?></option>
<?
		}
		
		$co = mysql_fetch_row($coqry);
	}
?>
					</select>
				</td>
			</tr>
			
			<tr>
				<td width="150">Status:</td>
				<td width="490"><input size="30" type="text" name="status" value="<? echo $ship[9]?>"></td>
			</tr>
			
			<tr>
				<td width="150">Mission:</td>
				<td width="490"><input size="30" type="text" name="mission" value="<? echo stripslashes($ship[13])?>"></td>
			</tr>
			
			<tr>
				<td width="150">Image:</td>
				<td width="490"><input size="30" type="text" name="image" value="<? echo $ship[10] ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Sort Order:</td>
				<td width="490"><input type="text" name="sorder" value="<? echo $ship[11] ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Last Report:</td>
				<td width="490"><input type="text" name="lastreport" value="<? echo $ship[12] ?>"></td>
			</tr>
			
			<tr>
				<td width="150">Ship's Role:</td>
				<td width="490"><input type="text" name="shiprole" value="<? echo stripslashes($ship[14]) ?>"></td>
			</tr>
			
			<tr>
				<td colspan="2"><INPUT TYPE="SUBMIT" VALUE="Edit"></td>
			</tr>
			
		</table>
		</form>
		</center>
		</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100 class="lcars" valign="top">&nbsp;</td>
		<td width="15"><img src="<? echo $BaseURL ?>/images/lcars/bottom-corner.jpg" border=0></td>
		<td width="100%" valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100><center><img src="<? echo $BaseURL ?>/images/lcars/red-lower-left.jpg" border=0></td>
		<td width="100%" class="lcars" colspan=3 align="right"><img src="<? echo $BaseURL ?>/images/lcars/nub-right-small.gif" border=0></td>
	</tr>
</table>
<? mysql_close($link) ?>
