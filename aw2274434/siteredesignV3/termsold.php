<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Isshinryu karate</title>
	<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
	<meta name="description" content="brief synapses of page"/>
	<meta name="keywords" content="important, keywords, about, page"/>
	<link rel="stylesheet" href="style/index.css" />
	<link rel="stylesheet" media="only screen and (max-width: 400px)" href="style/mobile.css" />
	<link rel="stylesheet" media="screen, handheld, print, projection href="style/mobile.css" />
</head>
<body>
<div id="head_container">
 <h1 id="page_title">Isshinryu karate</h1>
</div>


<div id="body_container">
  <a class="tab01" id="tabs" href="index.php" tabindex="1">&nbsp; Home &nbsp;</a>
  <a class="tab02" id="tabs" href="about.php" tabindex="2">About the Dojo</a>
  <a class="tab03" id="tabs" href="instructors.php" tabindex="3">Instructors</a>
  <a class="tab04" id="tabs" href="terms.php" tabindex="4">Terminology</a>
  <a class="tab05" id="tabs" href="awards.php" tabindex="5">Awards and Honors</a>
  


	<div class="tabcont" id="tab01cont">
	<img id="logo" src="fistsbeige7.png" alt="" />
		<div id="rightbox">
				<div id="control_panel">
				<ul id="navlist" >
				<li><a class="navtab" id="contact_tab" href="contact_form.php">Contact Form</a></li>
				<li><a class="navtab" id="reg_tab" href="register.php">Register</a></li>
				<li><a class="navtab" id="users_tab" href="view_users.php">View Users</a></li>
				</ul>
				</div>
			For more information and to book your free trial, call: <br />
			760-568 0961<br /><br />

			68225<br />
			Ramon Road<br />
			at Whispering Palms<br />
			Cathedral City<br />
			
		</div>
			
		<div id="leftbox">
		<h1 class="tabtitle">Terminology</h1>	
			<?php
                              include("../connect.php");
                    
                            $query2="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 1 ORDER BY `Term` ASC;";
                            $rs2 = mysql_query($query2);
                            if (!$rs2) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Blocks</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re2 = mysql_fetch_array($rs2))	{
                                      echo "<tr><td>".$re2['Term']."</td>";
                                      echo "<td>".$re2['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query3="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 2 ORDER BY `Term` ASC;";
                            $rs3 = mysql_query($query3);
                            if (!$rs3) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Strikes and Punches</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re3 = mysql_fetch_array($rs3))	{
                                      echo "<tr><td>".$re3['Term']."</td>";
                                      echo "<td>".$re3['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query4="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 3 ORDER BY `Term` ASC;";
                            $rs4 = mysql_query($query4);
                            if (!$rs4) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Stances (Dachi)</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re4 = mysql_fetch_array($rs4))	{
                                      echo "<tr><td>".$re4['Term']."</td>";
                                      echo "<td>".$re4['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query5="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 4 ORDER BY `Term` ASC;";
                            $rs5 = mysql_query($query5);
                            if (!$rs5) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Kicks and Foot Techniques</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re5 = mysql_fetch_array($rs5))	{
                                      echo "<tr><td>".$re5['Term']."</td>";
                                      echo "<td>".$re5['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query6="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 5 ORDER BY `Term` ASC;";
                            $rs6 = mysql_query($query6);
                            if (!$rs6) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Weapons</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re6 = mysql_fetch_array($rs6))	{
                                      echo "<tr><td>".$re6['Term']."</td>";
                                      echo "<td>".$re6['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query7="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 6 ORDER BY `Term` ASC;";
                            $rs7 = mysql_query($query7);
                            if (!$rs7) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>General Terminology</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re7 = mysql_fetch_array($rs7))	{
                                      echo "<tr><td>".$re7['Term']."</td>";
                                      echo "<td>".$re7['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							
							
							
							$query8="SELECT `aw2274434_karate_entity_terms`.`term` AS `Term`, `aw2274434_karate_entity_terms`.`meaning` AS `Meaning` FROM `47924`.`aw2274434_karate_entity_terms` AS `aw2274434_karate_entity_terms`, `47924`.`aw2274434_karate_enum_termtype` AS `aw2274434_karate_enum_termtype` WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 7 ORDER BY `Term` ASC;";
                            $rs8 = mysql_query($query8);
                            if (!$rs8) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table class='table'>";
                                echo "<th colspan=2><h2>Tournament Terminology</h2></th>";
                                echo "<tr><th>".'Term'."</th>";
                                echo "<th>".'Meaning'."</th></tr>";
                            while ($re8 = mysql_fetch_array($rs8))	{
                                      echo "<tr><td>".$re8['Term']."</td>";
                                      echo "<td>".$re8['Meaning']."</td></tr>";
                            }
                            echo "</table><br /><br /><br />";
							

			?>
			<p>The preceding Translations were borrowed with the permission of a great Web Site,  I requested permission to use the "Translations" and received permission… with the request that I would give credit to their site…..Well as we were retyping and editing  and adding and subtracting…….I lost the Site to whom I owe the credit for this page of Translations,……First my apologies….Secondly if anyone that reads this page can Please advise me of the site I will do the following……1. Apologize and 2. Give proper credit where it is due.</p>
			<br />
			Sincerely,  With Respect, <br /> 
			Arnold R Sandubrae
		</div>
		</div>
		</div>

</body>
</html>