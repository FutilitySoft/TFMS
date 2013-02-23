	<p align="justify"><img src="images/title-taskforce.gif" width="400" height="40" alt="Task Force 72 - S.E.N.T.I.N.E.L."><br>
	<img src="images/sentinel.jpg" border="0" width="135" height="185" align="right" alt="" hspace="5">Welcome to the home of Bravo Fleet's Task Force 72 - S.E.N.T.I.N.E.L.  Here you will find information on the various ships in this TF, as well as any other relevant information.  The Task Force is continually growing and expanding, so check back often for updates!</p>
	<p align="justify">27 Starships and 1 Deep Space Station form Task Force 72, with the mission of tactical interdiction and exploration.  We invite you to take a look at some of these ships, and maybe even join the crew.  We're always looking for new talent to add to the game!  If you feel confident and experienced, you can also try applying for command of a ship.  We still have a few ships in need of Commanding Officers and Executive Officers.  Use the apply forms on the left frame.  With your help, TF72 and Bravo Fleet can continue to provide quality simming to everyone.  Thanks!</p>
	<p align="justify">Task Force 72, and all of our simms (Ships) are active members of <a href="http://www.bravofleet.com">Bravo Fleet</a>. Currently, Bravo Fleet is one of the largest and most active Star Trek Simming organizations on the internet today.  At last count (Febuary 2002) We had almost 160 simms with staff on board. Each day that number continues to grow.  Along side that news is the even more important fact that we need crews to staff all those ships. It only takes a few players to create an active and thriving simm. Evey single player counts. So if you feel the call, and would love to be a part of the adventure Enlist now!	 <a href="template.php?pageref=join">Live the Adventure</a> Today!</p>

<p><center><font color="#7898AD"><strong>Task Force 72 Live Stats:</strong></font><br>
<?
 $qry = "select count(id) from ships where status = 'active'";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] Active Ships<br>";
  
 $qry = "select count(ships.id) from ships inner join co on co.id=ships.co where grp <> 100";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] Staffed Ships<br>";

 $qry = "select count(email), count( distinct email) from crewlist";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] Active Characters<br>$active[1] Active Players";
?>
</center></p>

	<p align="center">
	<img src="images/ruler.jpg">
	</p>
	<a href="template.php?pageref=announce"><img src="images/title-announce.gif"
	alt="Current Announcements" border="0"></a><br>
	<?
	
	
	$qry = "SELECT * FROM announce order by stamp desc limit 5";
	$annqry = mysql_query($qry,$link);
	$announce = mysql_fetch_row($annqry);

	
	$ANNOUNCE = 1;
	
?>
		Announcements can be posted by all CO's via the CO's Lounge.<br><br>
		<table width=100% border=0 cellspacing="0" cellpadding="5">
<?
		while($announce != 0) {
			$qry = "Select * from co where id=" . $announce[3];
			$coqry = mysql_query($qry,$link) or die("Bad CO's query. Did you Delete this CO?");
			$co = mysql_fetch_row($coqry);
			
			$qry = "select * from rank where rankid=" . $co[2];
			$rankqry = mysql_query($qry,$link) or die("Bad CO's rank query. Did yo udelete this CO?");
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
			</table>
			</center>


