<?php
switch($pageref){
		case 'deleteco':
			$qry = "select id from ships where co=$co";
			$allshipsqry = mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			$allships = mysql_fetch_array($allshipsqry);
			while($allships != 0){
				$qry = "update ships set co=0 where id=$allships[0]";
					mysql_query($qry,$link)
						or die(mysql_error() . "<br>while<br>$qry");
				//echo($qry);
				$allships = mysql_fetch_array($allshipsqry);
			}
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			
			header("Location: admintemplate.php?pageref=switchboard");
			break;

		case 'delship':
			$qry = "delete from crewlist where ship=$shipid";
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			$qry = "delete from monthrep where ship=$shipid";
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			$qry = "delete from ships where id=$shipid";
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			
			header("Location: admintemplate.php?pageref=switchboard");
			break;
			
		case 'addship':
			$qry = "insert into ships (id, name, registry, class, website, co, xo, mco, grp, status, image, sorder, lastmreport, missiontitle, shiprole) values(
				NULL,
				'$shipname',
				'$registry',
				'$shipclass',
				'none',
				0,0,0,100,
				'Waiting for a CO',
				'ships/imagena.jpg',
				$sorder,'2000-01-01','Waiting for a CO',''
				)";
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
				
			header("Location: admintemplate.php?pageref=switchboard");
			break;
		
		case 'manageship':
			header("Location: cotemplate.php?pageref=switchboard\nSet-Cookie: " . $randomstr . "=" . $cosid . "\n");
			break;
			
		case 'edit_ship_engine':
			$qry = "UPDATE ships SET ";
			$qry .= "name='" . addslashes($name) . "',";
			$qry .= "registry='" . addslashes($registry) . "',";
			$qry .= "class='" . addslashes($class) . "',";
			$qry .= "website='" . addslashes($website) . "',";
			$qry .= "co=" . $cosid . ",";
			$qry .= "grp=" . $grpid . ",";
			$qry .= "status='" . addslashes($status) . "',";
			$qry .= "missiontitle='" . addslashes($mission) . "',";
			$qry .= "sorder='" . addslashes($sorder) . "',";
			$qry .= "lastmreport='" . addslashes($lastreport) . "',";
			$qry .= "shiprole='" . addslashes($shiprole) . "',";
			$qry .= "image='" . $image . "' where id=" . $shipid;
	
			$insqry = mysql_query($qry,$link) 
				or die(mysql_error() . "<br>while<br>$qry");
	
			mysql_close($link);
			
			header("Location: admintemplate.php?pageref=switchboard");
			break;
		case 'edit_co_engine':
			$qry = "UPDATE co SET " .
				"charname='". addslashes($charname) . "'" .
				",rank=" . $rank. 
				",email='" . $email . "'" .
				",password='" . addslashes($password) . "'" .
				",realname='" . addslashes($realname) . "'" .
				",race='" . addslashes($race) . "'" .
				",tfrole='" . addslashes($tfrole) . "'" .
				" WHERE id=" . $id;
			$coqry = mysql_query($qry,$link) or die(mysql_error() . "<br>during<br>$qry");
	
			Header("Location: admintemplate.php?pageref=switchboard");
			break;

		case 'manage_grp_engine':
			$qry = "SELECT id FROM ships WHERE co=" . $frmcoid;
		        $shipqry = mysql_query($qry,$link) or die("Can't get ships");
        		$ship = mysql_fetch_array($shipqry);
			//$selectqry = $qry;
       			 $qry = "UPDATE grp SET co=" . $frmcoid . ",flagship=" . $ship[0] . ",name='$name' WHERE id=" . $grpid;
		        $updateqry = mysql_query($qry,$link) or die(mysql_error());

		        mysql_close($link);	

			header("Location: admintemplate.php?pageref=switchboard");
			//$pageref = "status";

			break;
                        
                case 'welcome_co':
                	$qry = "SELECT charname, rank.rankdesc, email, password FROM co inner join rank on co.rank=rank.rankid WHERE id=" . $co;
		        $coqry = mysql_query($qry,$link) or die("Can't get CO information");
        		$coq = mysql_fetch_array($coqry);
			
                            $mailerto = $coq[2] . "," . $OTHERwelcome;

                            $mailersubject= "Welcome to $taskforce_sn! ";
                            
                            $mailerbody = "$coq[1] $coq[0],\n\n";
                            $mailerbody = $mailerbody . "Welcome to Taskforce 72, Bravo Fleet. You're Command application has been accepted and you have been given the starting rank of $coq[1]. ";
                            $mailerbody = $mailerbody . "Now that you are prepared to become a Commanding Officer in our Task Force you'll need to attend the Bravo Fleet Command Academy. I will send you the information on it soon. \n\n";
                            $mailerbody = $mailerbody . "In the mean time you are encouraged to simm with the staff of our Starbase DS12. Captain Harper is the CO there. Her email address is kimberleyharper2000@yahoo.com. ";
                            $mailerbody = $mailerbody . "Captain Harper has also received a copy of this mail. Expect her to add you to her mailing list within a few days. \n\n";
                            $mailerbody = $mailerbody . "You may also begin logging into the CO's Lounge on the TF72 website (http://www.taskforce72.net/cotemplate.php?pageref=switchboard). \n";                            
                            $mailerbody = $mailerbody . "Your login name is the email address you are receiving this at, and your password is \"$coq[3]\" without the quotes. ";
                            $mailerbody = $mailerbody . "The Lounge is where you will keep a roster of your crew for myself, the TFXO and your TGCO to use, plus the Recruitment Officer uses this to determine needed positions to advertise for. Please keep your roster in the lounge as up to date as possible. ";
                            $mailerbody = $mailerbody . "Thanks for joining us, and let us know if you have any problems.\n\n";
                            $mailerbody = $mailerbody . "Regards, \n\n";
                            $mailerbody = $mailerbody . "VAdm Robert M Chadwick \n";
                            $mailerbody = $mailerbody . "Task Force Commanding Officer \n";
                            $mailerbody = $mailerbody . "Task Force 72 - Bravo Fleet ";

	
	$ExtraHeaders = "From: \"VAdm Robert M Chadwick\" <tf72@bravofleet.org> \n";

	mail ($mailerto, $mailersubject, $mailerbody,$ExtraHeaders);
   
                        
		        mysql_close($link);	

			header("Location: admintemplate.php?pageref=edit_co&co=$co");
			//$pageref = "status";

			break;
	}
	
?>
