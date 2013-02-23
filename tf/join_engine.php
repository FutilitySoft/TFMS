<?
	include("conf/config.php");

$qry = "SELECT ships.id,ships.name,co.email FROM ships, co WHERE ships.co=co.id AND ships.id=$ship1";
$shipsqry = mysql_query($qry,$link) or die("Bad ships fetch query");
$ships1 = mysql_fetch_row($shipsqry);
//echo "$ship1, $ships1[0], $ships1[1], $ships1[2]<br>";
$qry2 = "SELECT ships.id,ships.name,co.email FROM ships, co WHERE ships.co=co.id AND ships.id=$ship2";
$shipsqry2 = mysql_query($qry2,$link) or die("Bad ships fetch query");
$ships2 = mysql_fetch_row($shipsqry2);
//echo "$ship2, $ships2[0], $ships2[1], $ships2[2]<br>";
$ship1email = $ships1[2];
$ship2email = $ships2[2];
if ($ships1[0] == 20)
{
  $ship1email = "";
//  echo "<H1>Error</H1>";
}
if ($ships2[0] == 20)
{
  $ship2email = "";
//  echo "<H1>Error</H1>";
}

        /*
                0 = id
                1 = name
                2 = email
        */
	$mailerto = "$TFCOEmail , $TFXOEmail, " . $email;

	$mailersubject= "An Application to join $taskforce_ab has arrived!";
	$mailerbody = "If the desired position and the alternate position are both filled on your ship, then please forward this app to the Alternate Ship's CO, or send this to $TFCOName.  Thanks.\n\n";
	$mailerbody = $mailerbody . "Real Name:\t\t" . $realname . "\n";
	$mailerbody = $mailerbody . "E-Mail Addr:\t\t" . $email . "\n";
	$mailerbody = $mailerbody . "Player Age:\t\t" . $playerAge . "\n";
	$mailerbody = $mailerbody . "Character Name:\t\t" . $charfirstname . " " . $charmiddlename . " " . $charlastname . "\n";
	$mailerbody = $mailerbody . "Character Race:\t\t" . $race . "\n";
	$mailerbody = $mailerbody . "Character Gender:\t\t" . $sex . "\n";
	$mailerbody = $mailerbody . "Character Age:\t\t" . $age . "\n";
	$mailerbody = $mailerbody . "Character Home:\t\t" . $birthplace . "\n\n";
	$mailerbody = $mailerbody . "Requested Ship1\t\t" . $ships1[1] . " " . $ship1email . "\n\n";
	$mailerbody = $mailerbody . "Requested Ship2\t\t" . $ships2[1] . " " . $ship2email . "\n\n";
	$mailerbody = $mailerbody . "Requested Position\t\t" . $position . "\n\n";
	$mailerbody = $mailerbody . "Commissioned\t\t" . $RankType . "\n\n";
	$mailerbody = $mailerbody . "Academy\t\t" . $Academy . "\n\n";
	$mailerbody = $mailerbody . "Appearance & Attitude:\n";
	$mailerbody = $mailerbody . $appearance . "\n\n";
	$mailerbody = $mailerbody . "Biography:\n";
	$mailerbody = $mailerbody . $history . "\n\n";
	$mailerbody = $mailerbody . "Scenario\t\t\n==============================\n" . $situation . "=============================\n\n";
	$mailerbody = $mailerbody . "RPG Experience:\n";
	$mailerbody = $mailerbody . $exp . "\n";
	
	$ExtraHeaders = "From: $email \n";

	mail ($mailerto, $mailersubject, $mailerbody,$ExtraHeaders);
	
	echo '<html><Body bgcolor="black" text="white" link="yellow" vlink="blue">';
	echo "<H2>You application has been submitted.</H2><p>You should receive an automatic email confirmation shortly. If it does not arrive email ". $TFCOemail;
	echo '<p><a href="main1.html">RETURN</a></p></body></html>';


echo "<br><br><hr><br>";
echo "<p><b>TO:</b> $mailerto </P>";
echo "<p><b>Subject:</b> $mailersubject</p>";

echo "<p>" . nl2br($mailerbody) . "</p>";
?>
