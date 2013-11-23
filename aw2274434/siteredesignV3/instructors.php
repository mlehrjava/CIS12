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
div#body_container>a.tab03 {
	background:url(button-hov.png) no-repeat center;
	}
#tab03cont{
	visibility:visible;
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
		<h1 class="tabtitle">Instructors</h1>
					<?php
					
                              include("../connect.php");
                    
                            $query1="SELECT `aw2274434_karate_entity_instructors`.`image`, `aw2274434_karate_entity_instructors`.`name`, `aw2274434_karate_enum_belt`.`belt`, `aw2274434_karate_entity_instructors`.`bio` FROM `47924`.`aw2274434_karate_enum_belt` AS `aw2274434_karate_enum_belt`, `47924`.`aw2274434_karate_entity_instructors` AS `aw2274434_karate_entity_instructors` WHERE `aw2274434_karate_enum_belt`.`belt_id` = `aw2274434_karate_entity_instructors`.`belt_id` ORDER BY `aw2274434_karate_entity_instructors`.`image_yn` DESC, `aw2274434_karate_enum_belt`.`belt` DESC;";
                            $rs = mysql_query($query1);
                            if (!$rs) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table width='599' class='table'>";
                                echo "<th colspan=4>Instructors</th>";
                            while ($re = mysql_fetch_array($rs))	{
                                    echo "<tr><td><img src='".$re['image']."' width='100px'></td>";
									echo "<td>".$re['name']."</td>";
									echo "<td>".$re['belt']."</td>";
                                    echo "<td>".$re['bio']."</td></tr>";
                            }
                            echo "</table>";
                    ?> 
		</div>
</div>

</body>
</html>