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
<style>
div#body_container>a.tab04 {
	background:url(button-hov.png) no-repeat center;
	}
</style>
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
		
		<p style="font:bold 1em sans-serif;padding:10px 10px -40px 10px;text-align:center;">
			<a class="navtab" href="blocks_terms.php">Blocks</a>
			<a class="navtab" href="stances_terms.php">Stances</a>
			<a class="navtab" href="weapons_terms.php">Weapons</a>
			<a class="navtab" href="gen_terms.php">General Terms</a>
			<a class="navtab" href="strikes_terms.php">Strikes and Punches</a>
			<a class="navtab" href="tourn_terms.php">Tournament Terms</a>
			<a class="navtab" href="kicks_terms.php">Kicks and Foot Techniques</a>
			</p>

		<?php
		include("../connect.php");
                    
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
		?>

		</div>
		</div>
		</div>

</body>
</html>