<?
	$postok = 1;
	
	
	// Verify realname
	if ($realname == "") {
		echo "You must supply your real name.<br>";
		$postok=0;
		}

	// Verify e-mail
	if ($email == "") {
		echo "You must supply your email address.  This is an <b>E-MAIL</b> simulation!<br>";
		$postok=0;
		}
		
	if ($charname == "") {
		echo "You must supply at least a last/common/family name for your character.<br>";
		$postok=0;
		}

	if ($charrace == "") {
		echo "You must choose a character race.<br>";
		$postok=0;
		}

	if($position == "NoPos") {
		echo "If you want to apply for the position of janitor, please continue.  Otherwise go back and pick a ship!<br>";
		$postok=0;
		}
	
	if($charbio == "") {
		echo "Ohh... a newborn how nice.... Go back an enter a character biography.<br>";
		$postok=0;
		} 
		
	if($rpgexp == "") {
		echo "You won't get a command with no experience.  Enter your experiences.<br>";
		$postok=0;
		} 

	if ($postok == "1") {
		$qry = "insert into co (id, charname, rank, email, password, realname, race, sex, physical, bio) values(NULL,'" . addslashes($charname) . "',20,'" . $email . "','" . $password;
		$qry = $qry . "','" . addslashes($realname) . "','" . $charrace . "','" . $sex . "','";
		$qry = $qry  . addslashes($charphysdesc) . "','" . addslashes($charbio) . "')";
		$result = mysql_query($qry,$link) or die("Failed on INSERT INTO VALUES");
		
		$qry2 = "select name from ships where id=" . $position;
		$shipqry = mysql_query($qry2,$link);
		$ship = mysql_fetch_row($shipqry);
		
		$mailersubject= "TF72: Application for the " . $ship[0] . " has arrived!";
		$mailerbody = "Real Name: " . $realname . "\n";
		$mailerbody = $mailerbody . "E-Mail: " . $email . "\n";
		$mailerbody = $mailerbody . "Personal Age: " . $rage . "\n";
		$mailerbody = $mailerbody . "AIM: " . $aim . "\n";
		$mailerbody = $mailerbody . "Player's Experience: " . $rpgexp . "\n\n";
		$mailerbody = $mailerbody . "Character Name: " . $charname . "\n";
		$mailerbody = $mailerbody . "Character Race: " . $charrace . "\n";
		$mailerbody = $mailerbody . "Character Gender: " . $SEX . "\n";
		$mailerbody = $mailerbody . "Character Biography: " . $charbio . "\n\n\n";
		$mailerbody = $mailerbody . "CO's OCC Duties:\n" . $occduty . "\n\n\n";
		$mailerbody = $mailerbody . "CO's IC Duties:\n" . $icduty. "\n\n\n";
		$mailerbody = $mailerbody . "CO and XO Relationship:\n" . $coxorel . "\n\n\n";
		$mailerbody = $mailerbody . "How will you recruit:\n" . $recruit . "\n\n\n";
		$mailerbody = $mailerbody . "Motivate a single player:\n" . $pmotivate . "\n\n\n";
		$mailerbody = $mailerbody . "Motivate a crew:\n" . $cmotivate . "\n\n\n";
		$mailerbody = $mailerbody . "IC character dislike spills over into OCC:\n" . $upsetplayer . "\n\n\n";
		$mailerbody = $mailerbody . "OCC Character fight:\n" . $occfight . "\n\n\n";
		$mailerbody = $mailerbody . "Unincluded player:\n" . $displayer . "\n\n\n";
		$mailerbody = $mailerbody . "Player doesn't like you or XO:\n" . $codislike . "\n\n\n";
		$mailerbody = $mailerbody . "How to include civilian:\n" . $civilian . "\n\n\n";
		$mailerbody = $mailerbody . "Overaggressive or Sexual post:\n" . $foul . "\n\n\n";
		$mailerbody = $mailerbody . "Request an x-fer:\n" . $xfer . "\n\n\n";
		$mailerbody = $mailerbody . "Issue w/ admiralty:\n" . $admissue . "\n\n\n";
		$mailerbody = $mailerbody . "Lost Staff:\n" . $loststaff . "\n\n\n";
		$mailerbody = $mailerbody . "Bored CO:\n" . $boredco . "\n\n\n";
		$mailerbody = $mailerbody . "Player promotions:\n" . $playerpromo . "\n\n\n";
		$mailerbody = $mailerbody . "Another sim tries to steal you:\n" . $scifing . "\n\n\n";
		$mailerbody = $mailerbody . "Samplepost:\n" . $samplepost . "\n\n\n";
		$mailerbody = $mailerbody . "References:\n" . $reference . "\n\n\n";
		//Added by Ed (Sorac Dunar)
		$ExtraHeaders = "From: $email \nReply-To: $email\n";

		// These two lines line sends a copy of all apps to the
		// TFCO, TFXO and OTHERemail 

		$mailerto ="$TFCOEmail , $TFXOEmail , $OTHERemail, $email";
		mail ($mailerto, $mailersubject, $mailerbody, $ExtraHeaders);

		echo "<H2>You application has been submitted to the command staff for review.  You will hear from them as soon as possible.</H2>";
		echo '<a href="main1.html">RETURN</a>';
		}
	else	{
		echo "<br><br><b>At least one error was encountered in the character submission.  Please click below and fix the errors.<br>";
		echo '<CENTER><a href="javascript:document.history.go(-1)">GO BACK AND TRY AGAIN</a></CENTER>';
		}
		
	mysql_close($link);
?>

