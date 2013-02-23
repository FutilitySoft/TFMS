<?php
	include("conf/config.php");
	
	if ($pageref == "loginvfy")
	{
		$qry = "select id,email,password from co where email='" . $email ."'";
		$coqry = mysql_query($qry,$link) or die("Can't get CO's information");
		$valid = mysql_num_rows($coqry);
	
		if($valid != 0){
			$co = mysql_fetch_array($coqry);
			if($co["password"] == $password){
				Header("Location: cotemplate.php?pageref=switchboard\nSet-Cookie: " .$randomstr . "=" . $co[0] . "\n");
				$coid=$co[0];
			}
			else{
				$pageref="login";
				$code=1; 
			}
		}
		else{
			$pageref="login";
			$code=1;
		}
	
		mysql_close($link);

	
	}
	
	$coid = $HTTP_COOKIE_VARS[$randomstr];
	if($coid == 0) {
		$pageref= "login";
	}
	
	
	switch($pageref){
		case 'deletecrew':
			$qry = "DELETE FROM crewlist WHERE id=" . $id;
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
		
		case 'status':
			$qry = "UPDATE ships SET status='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
			
		case 'website':
			$qry = "UPDATE ships SET website='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
		
		case 'xo':
			$qry = "UPDATE ships SET xo=$variable " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
			
		case 'mco':
			$qry = "UPDATE ships SET mco=$variable " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
		
		case 'add':
			$qry = "INSERT INTO crewlist VALUES(" .
			"NULL,$shipid,'$charname',1,'$email','$position')";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());
			header("Location: cotemplate.php?pageref=switchboard");
			break;
			
		case 'mission':
			$qry = "UPDATE ships SET missiontitle='$variable' " .
				"where id=$shipid";
			$shipqry = mysql_query($qry,$link) 
				or die(mysql_error());	
			header("Location: cotemplate.php?pageref=switchboard");
			break;
		case 'edit_crew_engine':
			if( $name != "" && $email != "" && $position != ""){
	
				
		
				$qry = "SELECT id FROM ships WHERE co=" . $coid;
				$shipqry = mysql_query($qry,$link) or die("Can't get ships id");
				$ship = mysql_fetch_row($shipqry);
				$qry = "UPDATE crewlist SET charname='" . addslashes($name) . 
					"' WHERE id=" . $crewid;
				$update = mysql_query($qry,$link) or die("Can't update values");
				$qry = "UPDATE crewlist SET rank=" . $rank . " WHERE id=" . $crewid;
				$update = mysql_query($qry,$link) or die("Can't update values");
				$qry = "UPDATE crewlist SET email='" . $email . "' WHERE id=" . $crewid;
				$update = mysql_query($qry,$link) or die("Can't update values");
				$qry = "UPDATE crewlist SET position='" . 
					addslashes($position) . "' WHERE id=" . $crewid;
				$update = mysql_query($qry,$link) or die("Can't update values");
				header("Location: cotemplate.php?pageref=switchboard");			
			}
			else {
				$pageref="error";
				$errormsg = "You did not enter all required information.  Hit your BACK button and try again";
			}
			break;
		case 'month_report_engine':
			$qry = "SELECT id, name, registry, class, website, co, xo, mco, grp, status, image, sorder, lastmreport, missiontitle, shiprole FROM ships WHERE co=" . $coid;
			$shipqry = mysql_query($qry,$link) or die("Can't perform ship's query");
			$ship = mysql_fetch_row($shipqry);
	
			$qry = "SELECT email FROM co WHERE id=" . $coid;
			$coemailqry = mysql_query($qry,$link) or die("Can't get Co's email");
			$coemail = mysql_fetch_row($coemailqry);
	
			$qry = "SELECT id, ship, charname, rank, email, position FROM crewlist WHERE ship=" . $ship[0];
			$crewqry = mysql_query($qry,$link) or die("Can't perform crew's query");
			//$hascrew = mysql_fetch_array($crewqry);
			$crew = mysql_fetch_row($crewqry);
	
			$qry = "SELECT co FROM grp WHERE id=" . $ship[8];
			$tgcoqry = mysql_query($qry,$link);
			$tgco = mysql_fetch_row($tgcoqry);

			$qry = "SELECT email FROM co WHERE id=" . $tgco[0];
			$tgcoemailqry = mysql_query($qry,$link) or die(mysql_error());
			$tgcoemail = mysql_fetch_row($tgcoemailqry);
	
			$mailersubject= "Monthly Report for the " . $ship[1];
			$mailerbody = "Ship Name: " . $ship[1] . "\n";
			$mailerbody = $mailerbody . "Ship's Website: " . $ship[4] . "\n";
			$mailerbody = $mailerbody . "Ship's Status: " . $ship[9] . "\n";
			$mailerbody = $mailerbody . "Ship's Mission: " . $ship[13] . "\n";
			$mailerbody = $mailerbody . "Mission Summary: " . $missiondesc . "\n";
			$mailerbody .= "\n\nCrew List:\n";
	
			while ($crew != 0){
	
				$qry = "SELECT rankdesc FROM rank WHERE rankid=" . $crew[3];
				$rankqry = mysql_query($qry,$link) or die("Didn't get the rank");
				$rank = mysql_fetch_row($rankqry);
		
				$mailerbody = $mailerbody . $rank[0] . " " . $crew[2] . "\n" . $crew[5] . "\n" . $crew[4] . "\n\n";
		
				$crew = mysql_fetch_row($crewqry);
			}
	
			$mailerbody = $mailerbody . "\nShip Awards:\n " . $shipawards . "\n\n";
			$mailerbody = $mailerbody . "Crew Promotions:\n " . $promotions . "\n\n";
			$mailerbody = $mailerbody . "Website Changes:\n " . $websiteupdates . "\n\n";
	
			$header = "From: " . $coemail[0]; 

			$mailerto = "$TFCOEmail , $TFXOEmail , $tgcoemail[0] , $coemail[0]";

			mail ($mailerto, $mailersubject, $mailerbody, $header);

			$qry = "update ships set lastmreport=now() where id=" . $ship[0];
			mysql_query($qry,$link) or die(mysql_error() . "<br><br><br>$qry");

			$qry = "insert into monthrep values(NULL,'$ship[0]','$ship[4]','$ship[9]', '$shipawards','$promotions','$websiteupdates', '$missiondesc')";
			mysql_query($qry,$link) or die(mysql_error());

			//echo "<H2>You report has been submitted to the Admiral.</H2>";
			//echo "<a href='cotemplate.php?pageref=switchboard'>RETURN</a>";
			header("Location: cotemplate.php?pageref=switchboard");			
			
			mysql_close($link);
			break;
		case 'edit_co_engine':
			$qry = "UPDATE co SET charname='". addslashes($charname) . 
				"',email='" . addslashes($email) . 
				"',password='" . addslashes($password) . 
				"',realname='" . addslashes($realname) . 
				"',race='" . addslashes($race) . 
				"' WHERE id=" . $id;
			$coqry = mysql_query($qry,$link) or die(mysql_error() . "<br><b>WHILE</b><br>" . $qry);
	
			Header("Location: cotemplate.php?pageref=switchboard");	
			mysql_close($link); 
			break;
		case 'post_announcement_engine':
			$qry = "INSERT INTO announce VALUES(NULL,FROM_UNIXTIME(" . time() . "),'" . $message . "'," . $coid . ")";
			$insertqry = mysql_query($qry,$link) or die("Can't insert row");
	
			header("Location: cotemplate.php?pageref=switchboard");
	
			mysql_close($link);
			break;
	
	}
	
	
?>
<HTML>
<HEAD>
<TITLE>Task Force 72 - S.E.N.T.I.N.E.L.</TITLE>
<META CONTENT="This is the homepage for Task Force 72, Bravo Fleet.">
<link type="text/css" rel=stylesheet href="htinc/style.css">
</HEAD>
<script language="JavaScript" src="htinc/main.js"></script>
<BODY BGCOLOR="#000000" TEXT="#CCCCCC" ALINK="#008000" topmargin="0" marginheight="0" leftmargin="0" marginwidth="0">
<table width="100%">
  <tr>
    <td valign="top" width="140"><? include("htinc/menu.php");?></td>
	<td valign="top" style="padding-left:15;">
	<center><IMG SRC="banners/TF72_banner.jpg" ALT="TF72 banner" width="468" height="60"></center><br clear="all">
	
	<P><img alt="Task Force 72" src="images/title-taskforce.gif" width="400" height="40">
	<!-- Start -->
	
	<? include("co/" . $pageref . ".php"); ?>
	
	<!-- Stop -->
</td>
  </tr>
</table>
<? include("htinc/footer.php");?>
</BODY>
</HTML>
