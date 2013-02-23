<?
	

	$qry = "SELECT id, charname, rank, email, password, realname, race, tfrole, admin FROM co WHERE id=" . $co;
	$coqry = mysql_query($qry,$link) or die("Can't get co");
	$co = mysql_fetch_row($coqry);
	
	$qry = "SELECT * FROM rank";
	$rankqry = mysql_query($qry,$link) or die("Can't get ranks");
	$rank = mysql_fetch_row($rankqry);
	
	
	
?>

<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width=100 valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
		<td width="100%" height="300">
		<center>Edit the CO's Information</center><br>
		<br>
		</center>
		<form method="post" action="admintemplate.php?pageref=edit_co_engine">
		<input type="hidden" name="id" value=<? echo $co[0] ?>>
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
				<td width=150><b>Rank: </b></tr>
				<td width=490>
					 <select name="rank">
<?
				while($rank != 0){
					if($rank[0] == $co[2]){
						echo("<option value=\"$rank[0]\" selected=\"selected\">$rank[1]</option>");
					}
					else{
						echo("<option value=\"$rank[0]\">$rank[1]</option>");
					}
					$rank = mysql_fetch_row($rankqry);
				}
?>					</select>
				</td>
			</tr>
			
			<tr>
				<td width=150><b>TF Role: </b></tr>
				<td width=490><input type="text" name="tfrole" size="30" value="<? echo $co[7] ?>"></td>
			</tr>
			
			<tr>
				<td width=640 colspan=2><INPUT TYPE="SUBMIT" VALUE="Edit CO"><INPUT TYPE="RESET" VALUE="Clear Form"></td>
                                
			</tr>
			<tr>
				<td width=640 colspan=2><INPUT TYPE="Button" VALUE="Send Welcome Mail" onCLick="document.location='admintemplate.php?pageref=welcome_co&co=<? echo $co[0] ?>'"></td>
                                
			</tr>
		</table>
		</form>
		</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100 class="lcars" valign="top">&nbsp;</td>
		<td width="15"><img src="<? echo $BaseURL; ?>/images/lcars/bottom-corner.jpg" border=0></td>
		<td width="100%" valign="top">&nbsp;</td>
		<td width="15">&nbsp;</td>
	</tr>
	<tr>
		<td width=100><center><img src="<? echo $BaseURL; ?>/images/lcars/red-lower-left.jpg" border=0></td>
		<td width="100%" class="lcars" colspan=3 align="right"><img src="<? echo $BaseURL; ?>/images/lcars/nub-right-small.gif" border=0></td>
	</tr>
</table>
<? mysql_close($link) ?>
