<?php
$qry = "SELECT id,name,class FROM ships WHERE co>0";
        $shipsqry = mysql_query($qry,$link) or die("Bad ships fetch query");
//        $ships = mysql_fetch_row($shipsqry);
//        $ships2 = mysql_fetch_row($shipsqry);

        /*
                0 = id
                1 = name
                2 = class
        */

?>

	<P><img alt="Task Force Seventy-Two" src="images/title-application.gif"
	></p>
	<!-- Start -->
	<br>
<table width="600" align=center class="buttonbox">
  <tr>
    <td width=580>
	<P>Instructions:  This is the official application form to apply for service in <? echo $TF ?>.  
	Please keep in mind the following guidelines for new members:<br>
	<br>
	1. Please take your time on the application. You getting the position you're applying for depends in part on
	the quality of character that you design here on this form.  It will also partially depend on your ability to
	<i>proofread</i> what you have written.<br>
	<br>
	2. At all times, you as a Starfleet Officer or Crewmember are required to maintain the dignity of the position
	and to act according to the rules governing the simulation.  More plainly: flaming, trolling and profane-filled
	tirades will not be tolerated by any member of the simulation.  In addition, the mailng list for the the ship you belong to
	is not to be used in any way other than for e-mail simulation traffic.  Warez, serialz and porn are not welcome.
	Any person who engages in these activities will be warned once and then summarily dismissed from the simulation.<br>
	<br>
	<B>By submitting this form, you acknowledge you have read and agreed with the above.</B><br>
	<br>
	Okay, enough of the leaglize, on to the good stuff!<br>
	<br></p>
	<p class="title2">
	Items marked with * must be completed or your applicaiton will be ignored.  For Character Names, a last/common/family name is required
	however a first and middle are optional since many characters from Star Trek only have one name.</p>
    </td>
  </tr>
</table>
	<center>
	<form action="template.php?pageref=join_engine" method="post" align=center>
	<table width="600">
		<tr>
			<td width="580" colspan="2" align="left"><b>&nbsp;<br>Personal Information</b></td>
		</tr>
		<tr>
			<td width="180">*Real Name:</td>
			<td width="400"><input type="text" name="realname" size="30"></td>
		</tr>
		<tr>
			<td width="180">*E-mail Address:</td>
			<td width="400"><input type="text" name="email" size="30"></td>
		</tr>
		<tr>
			<td width="180">*Your Real Age:</td>
			<td width="400"><input
type="text" name="playerAge" size="30"></td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="left"><b>&nbsp;<br>Character Information</b></td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="left">Character Name: (*last, first middle)</td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="left">
				<input type="text" name="charlastname" size="20">,&nbsp;
				<input type="text" name="charfirstname" size="20">&nbsp;
				<input type="text" name="charmiddlename" size="20">
			</td>
		</tr>
		<tr>
			<td width="180">*Character Race:</td>
			<td width="400"><input type="text" name="race" size="30"></td>
		</tr>
		<tr>
			<td width="180">*Characer Gender:</td>
			<td width="400"><input type="text" name="sex" size=30></td>
		</tr>
		<tr>
			<td width="180">*Character Age:</td>
			<td width="400"><INPUT TYPE="text" NAME="age" size="10"></td>
		</tr>
		<tr>
			<td width="180">*Character Birthplace:</td>
			<td width="400"><INPUT TYPE="text" NAME="birthplace" size="30"></td>
		</tr>
		<tr>
			<td width="180">Requested Ship:</td>
			<td width="400"><SELECT NAME="ship1" size="1">
<?
$ships = mysql_fetch_row($shipsqry);
while ($ships != 0)
{
?>
<OPTION VALUE="<? echo $ships[0]; if ($ships[0]==20) {echo "\"SELECTED=\"SELECTED";} ?>"><? echo $ships[1] . " (" . $ships[2] . " Class)" ?></OPTION>
<?
$ships = mysql_fetch_row($shipsqry);
}
?>
</SELECT></td>
		</tr>
		<tr>
			<td width="180">Requested Ship (2nd choice):</td>
			<td width="400"><SELECT NAME="ship2" size="1">
<?
mysql_data_seek($shipsqry,0);
$ships = mysql_fetch_row($shipsqry);
while ($ships != 0)
{
?>
<OPTION VALUE="<? echo $ships[0]; if ($ships[0]==20) {echo "\"SELECTED=\"SELECTED";} ?>"><? echo $ships[1] . " (" . $ships[2] . " Class)" ?></OPTION>
<?
$ships = mysql_fetch_row($shipsqry);
}
?>
</SELECT></td>
		</tr>
		<tr>
			<td width="180">Requested Positions:</td>
			<td width="400"><INPUT TYPE="text" NAME="position" size="30"></td>
		</tr>
		<tr>
			<td>Rank Type:</td>
			<td>Commisioned <INPUT TYPE="radio" NAME="RankType" VALUE="Commisioned"> &nbsp &nbsp &nbsp
Enlisted <INPUT TYPE="radio" NAME="RankType" VALUE="Enlised"> &nbsp &nbsp &nbsp Warrent Officer <INPUT
TYPE="radio" NAME="RankType" VALUE="Warrent"><BR>
    <FONT SIZE="3"><B>Commisioned</B> officers have gone through Starfleet Academy and outrank all Enlisted and Warrent
officers.  They hold ranks like Ensign, Lieutenant, Commander, etc.<BR>
    <B>Enlisted</B> officers have completed a much shorter training period.  While they make up the bulk to Starfleet crews, they
are at the bottom of the Chain of Command.  They hold ranks like Crewman, Petty Officer, etc. <BR>
    <B>Warrent</B> officers hold their position "by warrent".  They are usually experienced enlisted officers.  Warrent officers
outrank Enlisted personnel, but are outranked by Commisioned officers.  They hold ranks like Warrent Officer, etc. </FONT><BR><BR>

</td>
		</tr>
<tr>

  <td>Have you attended <A HREF="http://www.geocities.com/hawkeye_island/">Bravofleet Academy</A>?</td>
  
  <td>Yes <INPUT TYPE="radio" NAME="Academy" VALUE="Yes"> &nbsp &nbsp &nbsp No <INPUT TYPE="radio" NAME="Academy" VALUE="No"></td>
</tr>
		<tr>
			<td width="580" colspan="2" align="left">
				*Brief description of character's appearance and general attitude:<br>
				<TEXTAREA NAME="appearance" ROWS="5" COLS="60" WRAP="PHYSICAL"></TEXTAREA>
			</td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="left">
				*Character's biography, history and other relavent factors:<br>
				<TEXTAREA NAME="history" ROWS="5" COLS="60" WRAP="PHYSICAL"></TEXTAREA>
			</td>
		</tr>
<tr>
<td colspan="2" aliiign="left">Scenario:<br>
  <textarea rows="10" name="situation" cols="50">Please reply to the following situation as you would as your first desired
position in post form.  Please delete all of this text when doing this.

"It's 0330 hours and you are asleep in your quarters.  The room is dark, quiet, and you're in the middle of a great dream... when
suddenly you hear the ships alarm, and someone comes over the comm and says "Red Alert!!"</textarea></td>
</tr>
		<tr>
			<td width="580" colspan="2" align="left">
				Past RPG Experience (both e-mail RPG and non-E-mail RPG experience is a plus)<br>
				<TEXTAREA NAME="exp" ROWS="5" COLS="60" WRAP="PHYSICAL"></TEXTAREA>
			</td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="center">
				By submitting this form, you agree to follow all the <A HREF="http://www.bravofleet.com/bravofleet/academy/bf-rules.htm" TARGET="_new">Bravo Fleet Rules</A>.
			</td>
		</tr>
		<tr>
			<td width="580" colspan="2" align="center">
				<INPUT TYPE="SUBMIT" VALUE="Apply!"><INPUT TYPE="RESET" VALUE="Clear Form">
			</td>
		</tr>
	</table>
	</form>
	</center>

