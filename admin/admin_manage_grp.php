<?	
	$qry = "SELECT id, name, flagship, co FROM grp WHERE id=" . $grpid;
	$grpqry = mysql_query($qry,$link) or die(mysql_error());
	$grp = mysql_fetch_array($grpqry);
	
	$qry = "SELECT id,charname FROM co";
	$coqry = mysql_query($qry,$link)or die("Can't get COs");
	$co = mysql_fetch_array($coqry);
	
?>

<p><a href="admintemplate.php?pageref=switchboard">Return to Switchboard</a></p>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="100%" height="300">
		<center>Edit the Group</center><br>
		<br>
		</center>
		<form
method="post" action="admintemplate.php?pageref=manage_grp_engine">
		<input type="hidden" name="grpid" value="<? echo $grpid ?>">
		<table>
		<tr>
			<td><b>Group Name:</b></td>
			<td><input type="text" name="name" value="<? echo $grp[1] ?>" /></td>
		</tr>
		<tr>
			<td><b>Select the CO of the Task Group:</b></td>
			<td><SELECT NAME="frmcoid" size="1">
<?		while($co !=0 ){
			?><option value="<? echo $co[0] ?>"
			<?
			if ($co["id"] == $grp["co"])
			echo "selected";
			?>
			><? echo $co[1] ?></option><?
			$co = mysql_fetch_array($coqry);
		}?>
			</td>
		</tr>
		<td colspan=2>
		<INPUT TYPE="SUBMIT" VALUE="Edit">
		</td>
		</tr>
		</table>
		</form>
		</td>
		<td width="15">&nbsp;</td>
	</tr>

</table>

<? mysql_close($link) ?>
