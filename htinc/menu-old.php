<table border="0" cellpadding="6" cellspacing="0" width="111">
  <tr>
    <td><a href="template.php?pageref=index"><image src="images/tf72-logo3.jpg" border="0"></a></td>
  </tr>
  </table>
  <img src="images/shim.gif" width="125" height="5" border="0">
  <table class="buttonbox">
  <tr>
    <td><image src="images/menu-titles-ships.gif" border="0"></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=tg&tgid=1">Independent Group</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=tg&tgid=2">Task Group Alpha</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=tg&tgid=3">Task Group Beta</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=tg&tgid=6">Task Group Gamma</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=tg&tgid=7">Task Group Delta</a></td>
  </tr>
  </table>
  <img src="images/shim.gif" width="125" height="5" border="0">
  <table class="buttonbox">
  <tr>
    <td><image src="images/menu-titles-visitors.gif" border="0"></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=staff">TF72 Staff</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=join">Crew Application</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=co_apply">CO Application</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=sample">Sample Application</a></td>
  </tr>
  </table>
  <img src="images/shim.gif" width="125" height="5" border="0">
  <table class="buttonbox">
  <tr>
    <td><image src="images/menu-titles-cos.gif" border="0"></td>
  </tr>
  <tr>
    <td><a href="cotemplate.php?pageref=switchboard">COs Lounge</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=announce">Announcements</a></td>
  </tr>
  <tr>
    <td><a href="admintemplate.php?pageref=switchboard">Admin Menu</a></td>
  </tr>
  </table>
  <img src="images/shim.gif" width="125" height="5" border="0">
  <table class="buttonbox">
  <tr>
    <td><image src="images/menu-titles-crewmen.gif" border="0"></td>
  </tr>
  <tr>
    <td><a href="http://www.bravofleet.info/bfforums" target="_New">Bravo Fleet Forums</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=awards">Awards</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=links">Links</a></td>
  </tr>
  <tr>
    <td><a href="template.php?pageref=vote">Vote for TF72</a></td>
  </tr>
  </table>
  <img src="images/shim.gif" width="125" height="5" border="0">
  <a href="javascript:OpenImageWindow('steamrunner017.jpg');"><img src="images/steamrunner017sm.jpg" width="125" height="100" border="0" alt="Image Courtesy of DevilsWorld6">
</a>

<p>
<?=$taskforce_ab?> Stats:<br>
<?
 $qry = "select count(id) from ships where status = 'active'";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] active ships<br>";
  
 $qry = "select count(ships.id) from ships inner join co on co.id=ships.co where grp <> 100";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] staffed ships<br>";

 $qry = "select count(email), count( distinct email) from crewlist";
 $activeqry = mysql_query($qry,$link);
 $active = mysql_fetch_array($activeqry);
 print "$active[0] active characters<br>$active[1] active players";


?>
</p>
