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
	
        $qry = "SELECT co.id, co.charname, co.email, co.admin,
		ships.id, ships.name, ships.co, ships.lastmreport,
		co.password
		from co left join ships on co.id=ships.co";
	$coqry = mysql_query($qry,$link) or die(mysql_error());
	$cos = mysql_fetch_array($coqry);
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
				<td colspan="3" class="SB_title"><b>COs in this system</b></td>
			</tr>

<?
		while($cos != 0){
?>

<tr>
<td><?=$cos[0]?>. <?=$cos[1]?><br><?=$cos[2]?><br><?=$cos[8]?></td>
<td><?=$cos[5]?><br><?=$cos[7]?></td>
<td>&nbsp;
<? if ($cos[5] == "") 
{ 
?>
<a href="admintemplate.php?pageref=removeco&remco=<?=$cos[0]?>">remove co # <?=$cos[0]?></a>
<?
}
?>
</td>
</tr>
<?
			$cos = mysql_fetch_array($coqry);
		}
?>
			</form>
		</table>
		</td>
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
