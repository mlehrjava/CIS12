<?php
session_start();
require ('inc/config.inc.php');
$page_title = 'Registration';
include ('inc/header.html');
?>

<!-------------------------------------Survey Results------------------------------------->
				
				<?php
				
			echo '<h2 class="tabtitle">Survey Results</h1>';
			if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
			$id = $_GET['id'];
		} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
			$id = $_POST['id'];
		} else {
			echo '<p class="error">This page has been accessed in error.</p>';
			
		}
			require ('../mysqli_connect.php');
			
			
			
			$display = 8;

			if (isset($_GET['p']) && is_numeric($_GET['p'])) {
				$pages = $_GET['p'];
				} else {
				$q = "SELECT COUNT(result_id) FROM aw2274434_survey_enum_survey1res";
				$r = @mysqli_query ($dbc, $q);
				$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
				$records = $row[0];
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
				
			$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'ln';
			switch ($sort) {
				case 'ln':
					$order_by = 'last_name ASC';
					break;
				case 'fn':
					$order_by = 'first_name ASC';
					break;
				default:
					$order_by = 'last_name ASC';
					$sort = 'ln';
					break;
				}
			
			
			
			
			
			
			
			$q = "SELECT *, date_format(birthday, '%a %b %D %Y') as fmt_date FROM aw2274434_survey_enum_survey1res WHERE user_id=$id";
			$r = @mysqli_query($dbc, $q);
			if (!$r)	{
            die('Invalid query: ' . mysqli_error());
						}
						
						while ($re = @mysqli_fetch_array($r, MYSQLI_ASSOC))	{
						
						echo "<table class='table'>";
						
						 echo '<tr><td><h4><a href="surveyres.php?id='. $re['user_id'] .'&sort=fn">First Name</h4></td>';
									echo '<td><h4><a href="surveyres.php?id='. $re['user_id'] .'&sort=ln">Last Name</h4></td>';
									echo "<td><h4>Birthday</h4></td>";
									echo "<td><h4>Favourite Colour</h4></td>";
									echo "<td><h4>Favourite Food</h4></td>";
									echo "<td><h4>Favourite Animal</h4></td>";
									echo "<td><h4>Hobbies</h4></td>";
                                    echo "<td><h4>Bio</h4></td></tr>";
						
						
						while ($re = @mysqli_fetch_array($r, MYSQLI_ASSOC))	{
                            
                         
						
					if ($re['blogging_yn'] !=0)	{
					$hobbies = 'blogging, ';
					} else {
					$hobbies = "";
					}
					
					if ($re['animals_yn'] !=0)	{
					$hobbies .= 'animals, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['cooking_yn'] !=0)	{
					$hobbies .= 'cooking, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['writing_yn'] !=0)	{
					$hobbies .= 'writing, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['sewing_yn'] !=0)	{
					$hobbies .= 'sewing, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['dance_yn'] !=0)		{
					$hobbies .= 'dance, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['sports_yn'] !=0)	{
					$hobbies .= 'sports, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['art_yn'] !=0)	{
					$hobbies .= 'art, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['fantasy_football_yn'] !=0)	{
					$hobbies .= 'fantasy football, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['magic_yn'] !=0)	{
					$hobbies .= 'magic, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['origami_yn'] !=0)	{
					$hobbies .= 'origami, ';
					} else {
					$orig = "";
					}
					
					if ($re['reading_yn'] !=0)	{
					$hobbies .= 'reading, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['console_games_yn'] !=0)	{
					$hobbies .= 'console games, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['travel_yn'] !=0)	{
					$hobbies .= 'travel, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['cosplay_yn'] !=0)	{
					$hobbies .= 'cosplay, ';
					} else {
					$hobbies .= "";
					}
					
					if ($re['larping_yn'] !=0)	{
					$hobbies .= 'larping, ';
					} else {
					$hobbies .= "";
					}
					
					
					
					
					
					if ($re['fav_color'] !=0)	{
					switch ($re['fav_color']) {
					case 1:
						$re['fav_color'] = 'red';
						break;
					case 2:
						$re['fav_color'] = 'orange';
						break;
					case 3:
						$re['fav_color'] = 'yellow';
						break;
					case 4:
						$re['fav_color'] = 'green';
						break;
					case 5:
						$re['fav_color'] = 'blue';
						break;
					case 6:
						$re['fav_color'] = 'indigo';
						break;
					case 7:
						$re['fav_color'] = 'violet';
						break;
					}
					}
					
						
                        
                                    echo "<tr><td>".$re['first_name']."</td>";
									echo "<td>".$re['last_name']."</td>";
									echo "<td>".$re['fmt_date']."</td>";
									echo "<td>".$re['fav_color']."</td>";
									echo "<td>".$re['fav_food']."</td>";
									echo "<td>".$re['fav_animal']."</td>";
									echo "<td>";
									echo rtrim($hobbies, ", ");
									echo ".</td>";
                                    echo "<td>".$re['bio']."</td></tr>";
                            }
							}
                            echo "</table>";
			
			
			if ($pages > 1) {
				echo '<br /><p>';
				$current_page = ($start/$display) + 1;
				if ($current_page != 1) {
					echo '<a href="surveyres.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
					}
				for ($i = 1; $i <= $pages; $i++) {
					if ($i != $current_page) {
						echo '<a href="surveyres.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
						} else {
						echo $i . ' ';
						}
					}
				if ($current_page != $pages) {
					echo '<a href="surveyres.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
					}
				echo '</p>';	
				}
			
			

?>
<!---------------------------------------------->
<?php
include ('inc/footer.html');
?>