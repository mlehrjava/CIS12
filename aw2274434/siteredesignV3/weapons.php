	<?php
	require ('inc/config.inc.php');
	$page_title = 'Terminology&nbsp|&nbspWeapons';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab05 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Weapons------------------------------------->
			<h1 class="tabtitle">Terminology</h1>
			<?php
		include ('inc/termlinks.html');
		
		
		
			
			require ('../mysqli_connect.php');
			$display = 8;

			if (isset($_GET['p']) && is_numeric($_GET['p'])) {
				$pages = $_GET['p'];
				} else {
				$q = "SELECT COUNT(term_id) FROM aw2274434_karate_entity_terms WHERE termtype_id = 5";
				$r = @mysqli_query ($dbc, $q);
				$re = @mysqli_fetch_array ($r, MYSQLI_NUM);
				$records = $re[0];
				if ($records > $display) { 
					$pages = ceil ($records/$display);
				} else {
					$pages = 1;
				}
				}
			if (isset($_GET['s']) && is_numeric($_GET['s'])) {
				$start = $_GET['s'];
				} else {
				$start = 0;
				}
				
				
				$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'ts';
			switch ($sort) {
				case 'tm':
					$order_by = 'meaning ASC';
					break;
			
				default:
					$order_by = 'term ASC';
					$sort = 'ts';
					break;
				}
                    
            $q="SELECT * FROM aw2274434_karate_entity_terms aw2274434_karate_enum_termtype WHERE `aw2274434_karate_enum_termtype`.`termtype_id` = 5 ORDER BY $order_by LIMIT $start, $display";
            $r = mysqli_query($dbc, $q);
            if (!$r) {
            die('Invalid query: ' . mysqli_error());
            }
            echo "<table class='termtable'>";
            echo "<th colspan=2><h2>Weapons</h2></th>";
            echo '<tr><th><h3><a href="'.($_SERVER['PHP_SELF']).'?sort=ts">Term</a></th>';
            echo '<th><h3><a href="'.($_SERVER['PHP_SELF']).'?sort=tm">Meaning</a></th></tr>';
			
			
			
            while ($re = @mysqli_fetch_array($r, MYSQLI_ASSOC))	{
            echo "<tr><td>".$re['term']."</td>";
            echo "<td>".$re['meaning']."</td></tr>";
            }
            echo "</table>";
			
			
			
			mysqli_free_result ($r);
			mysqli_close($dbc);
			
if ($pages > 1) {
				echo '<br /><p>';
				$current_page = ($start/$display) + 1;
				if ($current_page != 1) {
					echo '<a href="'.($_SERVER['PHP_SELF']).'?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
					}
				for ($i = 1; $i <= $pages; $i++) {
					if ($i != $current_page) {
						echo '<a href="'.($_SERVER['PHP_SELF']).'?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
						} else {
						echo $i . ' ';
						}
					}
				if ($current_page != $pages) {
					echo '<a href="'.($_SERVER['PHP_SELF']).'?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
					}
				echo '</p>';	
				}
		
		?>
			
			
<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>