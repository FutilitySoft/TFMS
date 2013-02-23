<?
	include("conf/config.php");

	$qry = "SELECT id,name,class FROM ships WHERE co=0 and grp!=100";
	$shipsqry = mysql_query($qry,$link) or die("Bad ships fetch query");
	$ships = mysql_fetch_row($shipsqry);
	/*
	0 = id
	1 = name
	2 = class
	*/
?>
	<P><img alt="Task Force Seventy-Two" src="images/title-command_application.gif"
	></p>
<center>
<table border=0 cellpadding=0 cellspacing=0>
	<tr>
		<td width="15">&nbsp;</td>
	
		<td width="100%">
		1)  As a CO of a ship in Bravo Fleet you are required to follow all the guidelines of running
		such a ship as outlines on the Bravo Fleet website at <a href="http://www.bravofleet.com">www.bravofleet.com</a>
		under the CO's Training section of the Bravo Fleet academy. If you are not familiar with these rules and
		regulations, look there first before you apply for a ship.  In addition, all CO's in BravoFleet are required to attend
		and graduate from the BravoFleet CO Academy before assuming independent, active command of their ship.  If you
		feel that your qualify for an exception to this (i.e. previous CO's training in another sim), please note that in your application below.<br>
		<br>
		2) As a CO of a ship in Bravo Fleet you are required to maintain a website for your ships and
		actively update and maintain said site.  Failure to do so can result in dismissal from command.<br>
		<br>
		3) When applying for a ship, be certain that you are applying for the ship name and class that you really want.  There
		is no possibilty to transfer your command to another ship.<br>
		<br>
		4) You are only allow to have one command in Bravo Fleet at a time.  Having more than one command is gounds for
		dismissal from BravoFleet.  In addition, one person may only have 5 characters in Bravo Fleet, including your command
		character.<br>
		<br>
		5) Resigining from command of a ship in Bravo Fleet comes with a 90-day suspension from command.  If you resign
		from a ship for whatever reason, you cannot apply to command another ship for 90 days.<br>
		<br>
		<i>Complete all information in the form.  Incomplete applications will not be considered and summarily rejected. Please
		take your time with this form and think it through.  Your success at getting the position you are requesting depends
		primarily on this application.<br>
		<br>
		<center>
		<form action="template.php?pageref=apply" method="post" align=center>
		<table>
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Real Name: </b></td>
				<td width="100%"><input type="text" name="realname" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>E-mail Address: </b></td>
				<td width="100%"><input type="text" name="email" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Password: </b></td>
				<td width="100%"><input type="text" name="password" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><font size="-1"><i>This password will allow you to access the ship status and reporting functions on the SEARCH website.</i></font></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Your Real Age: </b></td>
				<td width="100%"><input type="text" name="rage" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>IM Screenname and Type: </b></td>
				<td width="100%"><input type="text" name="aim" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2>
				Personal Role-Play Experience - Both PBeM and regular.  Include CO references where applicable<br>
				<textarea name="rpgexp" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Ship to Command: </b></td>
				<td width="100%">
				<SELECT NAME="position" size="1">
					<OPTION VALUE="NoPos" SELECTED="SELECTED">Choose a ship</OPTION>
<?
						while ($ships != 0){
?>	
					<OPTION VALUE="<? echo $ships[0] ?>"><? echo $ships[1] . " (" . $ships[2] . " Class)" ?></OPTION>
					<?
						$ships = mysql_fetch_row($shipsqry);
					}
					?>
				</SELECT>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Character Name: </b></td>
				<td width="100%"><input type="text" name="charname" size=30></td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Character Race: </b></td>
				<td width="100%"><input type="text" name="charrace" size=30></td>
			</tr>
						
			<tr>
				<td width=15>&nbsp;</td>
				<td width=150><b>Character Gender: </b></td>
				<td width="100%">
				 	<INPUT TYPE="RADIO" NAME="SEX" VALUE="Male"> Male<BR>
         					<INPUT TYPE="RADIO" NAME="SEX" VALUE="Female"> Female<BR>
         					<INPUT TYPE="RADIO" NAME="SEX" VALUE="unknown"> Unknown/Other<BR>
				</td>
			</tr>
						
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2>
				Character Biography:<br>
				<textarea name="charbio" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><hr><center>Application Questionaire</center><br>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2>
				Describe what you see as the out-of-character duties of a ship's commanding officer:<br>
				<textarea name="occduty" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Describe what you see as the in-character duties of a ship's commanding officer:<br>
				<textarea name="icduty" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Describe how you see the relationship between a CO and XO in running a ship:<br>
				<textarea name="coxorel" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				What will you do to recruit quality crewmembers to your ship:<br>
				<textarea name="recruit" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				How would you go about moviating a player that has lost interest:<br>
				<textarea name="pmotivate" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				How would you deal with a crew that has lost interest or where morale is low:<br>
				<textarea name="cmotivate" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: An IC character has taking a dislike to another player's character.  The second player
				feels that he or she is being singled out personally and reacts poorly or becomes upset.  What
				do you do?<br>
				<textarea name="upsetplayer" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: Two players in the sim have an OCC disagreement that spills into the sim's list and
				turns from a frieldly disagreement into an ugly fight.  What do you do?<br>
				<textarea name="occfight" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: A player come to your with a complaint that their character is never included
				in the storyline.  How do you determine if this is their fault for not writing themselves in
				or the nature of the storyline?  Explain how you would deal with the situation.<br>
				<textarea name="displayer" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: A player does not get along with you or the XO personally.  How do you deal
				with this situation?<br>
				<textarea name="codislike" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: You have a civilian character who is unsure how to become involved in your current
				plot becuase of the nature.  What do you tell them and how do you help them?<br>
				<textarea name="civilian" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: A player posts an overly aggressive, sexual or foul post.  What will you do?<br>
				<textarea name="foul" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: A player requests a transfer to another ship.  What will you do?<br>
				<textarea name="xfer" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Scenario: You have an issue with one of your superiors, what do you do?<br>
				<textarea name="admissue" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Situation: Your ship has lost staff.  What is your solution to maintaining your sim and staff?<br>
				<textarea name="loststaff" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Situation: You've become bored with the RPG for whatever reason.  What do you do?<br>
				<textarea name="boredco" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Situation: How do you detemine a player deserves a promotion?  What if you don't like the person?<br>
				<textarea name="playerpromo" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Situation: You are approached by another sim group to ask you to leave BravoFleet with your ship
				and join them.  What do you do?  What do you tell them?<br>
				<textarea name="scifing" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Sample Post:  Post on this situation: <br>
				It's 0330 hours and you're asleep in your quarters.  You're in the middle of a nice dream when
				the ship's red alert klaxon blares you awake and your XO is on the bridge saying "Captain to the
				bridge! Red alert!"<br>
				<textarea name="samplepost" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br>
				Marketing Data:  How did you hear about Bravo Fleet and why did you want to join?<br>
				<textarea name="reference" ROWS="5" COLS="60" WRAP="PHYSICAL"></textarea>
				</td>
			</tr>
			
			<tr>
				<td width=15>&nbsp;</td>
				<td width="100%" colspan=2><br><i>By submitting this application you agree that if you
				are approved by command, you will abide by the Bravo Fleet rules and regulations for a simulation
				commanding officer<br>
				<INPUT TYPE="SUBMIT" VALUE="Apply!"><INPUT TYPE="RESET" VALUE="Clear Form">
				</td>
			</tr>
		</table>
		</form>
		</center>
		</td>
		<td width="15">&nbsp;</td>
	</tr>
</table>
<? mysql_close($link) ?>

