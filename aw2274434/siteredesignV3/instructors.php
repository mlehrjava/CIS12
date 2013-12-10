	<?php
	ob_start();
	session_start();
	require ('inc/config.inc.php');
	$page_title = 'Instructors';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab02 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Instructors------------------------------------->
		<?php
		include ('inc/aboutlinks.html');
		?>
		
		
		<h1 class="tabtitle">Instructors</h1>
					<?php
					
                            include("../mysqli_connect.php");
                    
                            $q="SELECT * FROM aw2274434_karate_enum_belt, aw2274434_karate_entity_instructors WHERE `aw2274434_karate_enum_belt`.`belt_id` = `aw2274434_karate_entity_instructors`.`belt_id` ORDER BY image_yn DESC, belt DESC;";
                            $r = @mysqli_query($dbc, $q);
                            if (!$r) {
                                die('Invalid query: ' . mysqli_error());
                            }
                                echo "<table width='599' class='termtable'>";
                            
                            while ($re = @mysqli_fetch_array($r, MYSQLI_ASSOC))	{
                                    echo "<tr><td><img src='inc/img/".$re['image']."' width='100px'></td>";
									echo "<td>".$re['name']."</td>";
									echo "<td>".$re['belt']."</td>";
                                    echo "<td>".$re['bio']."</td></tr>";
                            }
                            echo "</table>";
                    ?> 
<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>