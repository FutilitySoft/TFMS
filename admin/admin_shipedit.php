<?php
	include("../conf/config.php");
	
	$coid = $HTTP_COOKIE_VARS[$randomstr2];
	if($coid == 0) {
		header ("Location: admin_login.php");
		exit;
	}

	switch($action){
		case 'deleteco':
			$qry = "select id from ships where co=$co";
			$allshipsqry = mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			$allships = mysql_fetch_row($allshipsqry);
			while($allships != 0){
				$qry = "update ships set co=0 where id=$allships[0]";
					mysql_query($qry,$link)
						or die(mysql_error() . "<br>while<br>$qry");
				echo($qry);
				$allships = mysql_fetch_row($allshipsqry);
			}
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
			
			header("Location: admin_switchboard.php");
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
			
			header("Location: admin_switchboard.php");
			break;
			
		case 'addship':
			$qry = "insert into ships values(
				NULL,
				'$shipname',
				'$registry',
				'$shipclass',
				'none',
				0,0,0,7,
				'Waiting for a CO',
				'ships/imagena.jpg',
				$sorder,'2000-01-01','Waiting for a CO',''
				)";
			mysql_query($qry,$link)
				or die(mysql_error() . "<br>while<br>$qry");
				
			header("Location: admin_switchboard.php");
			break;
		
		case 'manageship':
			header("Location: $BaseURL/co/switchboard.php\n
				Set-Cookie: " . $randomstr . "=" . $coid . "\n");
			break;
	
	}

	
	mysql_close($link);
?>
	
		