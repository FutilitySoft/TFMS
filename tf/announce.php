<?php
	
	$qry = "SELECT id, stamp, txt, postedby FROM announce order by stamp desc";
	$annqry = mysql_query($qry,$link);
	$announce = mysql_fetch_row($annqry);

?>
<P><img alt="Task Force Seventy-Two" src="images/title-announce.gif" >
		<center>Welcome to the <? echo $TF ?> announcement board.  Announcements can be posted by all CO's via the CO's Lounge.<br><br></center>
		<table width=100% border=0 cellspacing="0" cellpadding="5">
<?
		while($announce != 0) {
			$qry = "Select * from co where id=" . $announce[3];
			$coqry = mysql_query($qry,$link) or die("Bad CO's query. Did you Delete this CO?");
			$co = mysql_fetch_row($coqry);
			
			$qry = "select * from rank where rankid=" . $co[2];
			$rankqry = mysql_query($qry,$link) or die("Bad CO's rank query. Did you delete this CO?");
			$rank = mysql_fetch_row($rankqry);
?>
			
				<tr>
					<td colspan="2"><span class="title1">Posted by: </span><a href="mailto:<? echo $co[3]?>"><? echo $rank[1] . " " . $co[1]?></a></td>
					
				</tr>
				<tr>
					<td colspan="2" style="border: 1px #999999 solid">
						<? echo $announce[2] ?>
					</td>
				</tr>
				<tr>
					<td colspan="2">&nbsp;</td>
				</tr>

<?
		$announce = mysql_fetch_row($annqry);
		}
?>		  

