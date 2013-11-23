<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Isshinryu karate</title>
<meta http-equiv="content-type" content="text/html; charset=utf-8"/>
<meta name="description" content="brief synapses of page"/>
<meta name="keywords" content="important, keywords, about, page"/>

<link rel="stylesheet" href="style/index.css" />


</head>
<body>

<div id="head_container">
 <h1 id="page_title">Isshinryu karate</h1>
</div>


<div id="body_container">
  <a class="tab01" href="#" tabindex="1">&nbsp; Home &nbsp;</a>
  <a class="tab02" href="#" tabindex="2">About the Dojo</a>
  <a class="tab03" href="#" tabindex="3">Instructors</a>
  <a class="tab04" href="#" tabindex="4">Terminology</a>
  <a class="tab05" href="#" tabindex="5">Awards and Honors</a>
  


	<div class="tabcont" id="tab01cont">
	<img id="logo" src="fistsbeige7.png" alt="" />
		<div id="contact">
			<h2>Contact</h2>
			For more information and to book your free trial, call: <br />
			760-568 0961<br /><br />

			68225<br />
			Ramon Road<br />
			at Whispering Palms<br />
			Cathedral City<br />
		</div>
			
		<div id="sched_rates">
			<h2>Schedule and Rates</h2>
			$99.00 per month (8 classes) with new students starting weekly
			<ul>
			<li>Free Trial Class</li>
			<li>No contracts</li>
			<li>Free Uniform</li>
			<li>Veterans get 3 months of free instruction</li>
			<li>Family rates available</li>
			</ul>
			
			<h3>Kids 4 years and up</h3>
			Tuesdays and Thursdays<br />
			5pm - 6pm and<br />
			6pm - 7pm, parents choice. Child can attend the one hour classes or the two hour classes at no extra charge.
			<h3>Adults</h3>
			Tuesdays and Thursdays<br />
			7pm - 8pm<br />
		</div>
	</div>


  
	<div class="tabcont" id="tab02cont">
	<h1 class="tabtitle">About the Dojo</h1>
		<p>I hope that the following Pages that pertain to our Dojo will give you Pleasure and a few things to Think about. Perhaps, just Perhaps, you can also learn something!</br>
		Created for you... for your enjoyment... and mine as well.</br>
		Please notice Contributions by our Dojo Family on Thoughts, Point of View, and Commentary.</br>
		&nbsp; Sensei Arnold R Sandubrae</p>


		We  have enough room to comfortably do Sparring, Self Defence, Kata, and Weapons in <b>5 full sized permanent rings</b> with mirrors. We also have...
			<ul>
			<li>6 hanging bags</li>
			<li>Rubber floors</li>
			<li>A consultation and counselling room</li>
			<li>A room with about a 12 inch thick foam floor for beginners to learn to fall properly without the fear of hurting themselves</li>
			<li>Zen archery and knife throwing range</li>
			<li>Separate Men's and Women's restrooms with lockers</li>
			</ul>
            <br />
<p>Sensei Arnold Sandubrae began his Isshinryu Karate training in 1973, under the instruction of Sensei's Robert L. White, and Sam Santilli, students of Master Willie Adams. Several years later, he transferred to train directly under Master Willie Adams because Master Adams Dojo was located only blocks from Sensei Sandubrae's office. From 1973 until 1986 he amassed over 200 trophies in all categories, Kata, Kumite, Weapons, and Breaking.</p>

<p>Sensei Sandubrae has had  his own Karate School since 1978. That is when he retired from the business world, and moved to his home in Palm Springs, California.  At that time, with the approval of Master Willie Adams, Sensei Sandubrae went under the leadership of Master Harold Long, Ju Dan. Sensei Sandubrae remained his  student until Master Long's death in 1998. In June of 2002, Sensei Sandubrae went under the direction of an old time friend and Master instructor, Joel Chandler Ku Dan. Sensei Sandubrae remained his  student until Master Chandler's death in 2012.</p>

<p>For more than 20 years, Sensei Sandubrae donated ALL proceeds directly to the American Heart Association, an organization that he was a Board Member of for 21 years.</p>

<p>He has appeared on many National Television   shows and Radio programs furthering the art of Isshinryu Karate.  For 28 years,  Sensei Sandubrae was a Board Member of the prestigious Isshinryu Hall of Fame, and was a  Board Member of the Tatsuo-Kan Society. For many years he was a Board Member of the International Isshinryu Karate Association (IIKA).</p>

<p>Sensei Sandubrae has traveled, and continues to travel, to many places throughout the world, furthering the art of Isshinryu Karate by both attending and putting on training seminars in other countries. Sensei Sandubrae is the artist of the Bronze Bust presented to the Isshinryu Hall of Fame of Soke Tatsuo Shimabuku, and is the Writer and Producer of the Isshinryu Song.</p>

<p>He is also the Author and Publisher of the "Karate Passport" as well as being the Designer and Registered Trademark and Service mark holder of the now Internationally used stylized Isshinryu Fist and Obi.  Both, Service and Trademarks are owned solely by Sensei Sandubrae, and when permission is requested to use these Registered Trademarks and Service marks, Sensei Sandubrae considers their use and often gives his consent.</p>
	</div>

  
  <div class="tabcont" id="tab03cont">
	<h1 class="tabtitle">Instructors</h1>
	<!--	INSERT INSTRUCTOR QUERY	--> 

  
					<?php
					
                              //mysql_connect('209.129.8.3', '47924', '47924cis12');
                              //mysql_select_db('47924');
                                mysql_connect('localhost', 'root', '47924cis12');
                                mysql_select_db('47924');
                    
                            $query1="SELECT `aw2274434_karate_entity_instructors`.`image`, `aw2274434_karate_entity_instructors`.`name`, `aw2274434_karate_enum_belt`.`belt`, `aw2274434_karate_entity_instructors`.`bio` FROM `47924`.`aw2274434_karate_enum_belt` AS `aw2274434_karate_enum_belt`, `47924`.`aw2274434_karate_entity_instructors` AS `aw2274434_karate_entity_instructors` WHERE `aw2274434_karate_enum_belt`.`belt_id` = `aw2274434_karate_entity_instructors`.`belt_id` ORDER BY `aw2274434_karate_enum_belt`.`belt` DESC;";
                            $rs = mysql_query($query1);
                            if (!$rs) {
                                die('Invalid query: ' . mysql_error());
                            }
                                echo "<table width='599' class='table'>";
                                echo "<th colspan=4>Instructors</th>";
                            while ($re = mysql_fetch_array($rs))	{
                                    echo "<tr><td><img src='".$re['image']."'></td>";
									echo "<td>".$re['name']."</td>";
									echo "<td>".$re['belt']."</td>";
                                    echo "<td>".$re['bio']."</td></tr>";
                            }
                            echo "</table>";
                    ?> 
		</div>
  
  
    <div class="tabcont" id="tab04cont">
	<h1 class="tabtitle">Terminology</h1>	
					<?php
                              //mysql_connect('209.129.8.3', '47924', '47924cis12');
                              //mysql_select_db('47924');
                                mysql_connect('localhost', 'root', '47924cis12');
                                mysql_select_db('47924');
                    
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
Arnold R Sandubrae</p>
	
	

	</div>
  
  
	<div class="tabcont" id="tab05cont">
	<h1 class="tabtitle">Awards and Honors</h1>
		The following is a partial list of major awards and honors that have been bestowed upon Sensei Sandubrae and his Dojo since his entry into Isshinryu Karate :

		<ul>
			<li>World Champion 1977 - Isshinryu Grand Nationals</li>
			<li>Instructor of the year 1986 - Isshinryu Hall of Fame</li>
			<li>Karate School of the year 1987 - Isshinryu Hall of Fame</li>
			<li>Inducted into Isshinryu Hall of Fame - August 12, 1994</li>
			<li>Inducted into the  Masters and Legends Hall of Fame - May 17, 1998</li>
			<li>Inducted into the World Karate Union  Hall of Fame - June   27, 1998</li>
			<li>Awarded 7th Dan Rank by Master Harold Long - October 9, 1997</li>
			<li>Awarded Hanshi Certificate by Master Harold Long - October 9, 1997 </li>
			<li>Karate School of the year 2000 - Isshinryu Hall of Fame</li>
			<li>Inducted, North American Black Belt Hall of Fame - October 19, 2001</li>
			<li>Inducted into the I.A.M.A.  Hall of Fame - April 7th, 2002 </li>
			<li>Awarded 8th Dan Rank by Master Joel Chandler - June 22, 2002</li>
			<li>Named "Living Legend" United States Martial Arts Associations - August 9th 2003</li>
			<li>USA Martial Arts Hall of Fame"Hall of Heroes" April 10th 2013</li>
			<li>USA Martial Arts Hall of Fame"Master of the Year" May 4th 2013</li>
		</ul>
	</div>


</div>

</body>
</html>