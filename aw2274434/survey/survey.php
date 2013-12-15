<?php
session_start();
include ('inc/header.html');
require ('inc/config.inc.php');
?>
	<!---------------------------------------------->
    <h2>Survey</h2>
    <br />
	<?php
	if (isset($_SESSION['user_id'])){
	require ('../mysqli_connect.php');
	
	$trimmed = array_map('trim', $_POST);
	
	
	
	$id = $_SESSION['user_id'];
					$q = "SELECT first_name, last_name FROM aw2274434_survey_users WHERE user_id=$id";		
					$r = @mysqli_query ($dbc, $q);
					if (mysqli_num_rows($r) == 1) {
				$row = mysqli_fetch_array ($r, MYSQLI_NUM);
					$fn = $row[0];
					$ln = $row[1];
				}
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
		
		
				if ($_POST){	
				
				
				
				
				$m = $_POST['m'];
				$d = $_POST['d'];
				$y = $_POST['y'];
				$bday = $y."-".$m."-".$d;
				$favcol = $_POST['colour'];
				
				
				} else {
				
				$m = $_GET['m'];
				$d = $_GET['d'];
				$y = $_GET['y'];
				$favcol = $_GET['colour'];
								
				}
					
					$id = $_SESSION['user_id'];
					$blog = isset($_POST['blogging_yn']) ? 1 : 0;
					$animals = isset($_POST['animals_yn']) ? 1 : 0;
					$cook = isset($_POST['cooking_yn']) ? 1 : 0;
					$writ = isset($_POST['writing_yn']) ? 1 : 0;
					$sew = isset($_POST['sewing_yn']) ? 1 : 0;
					$dan = isset($_POST['dance_yn']) ? 1 : 0;
					$sport = isset($_POST['sports_yn']) ? 1 : 0;
					$art = isset($_POST['ar_yn']) ? 1 : 0;
					$fanfoot = isset($_POST['fantasy_football_yn']) ? 1 : 0;
					$magic = isset($_POST['magic_yn']) ? 1 : 0;
					$orig = isset($_POST['origami_yn']) ? 1 : 0;
					$read = isset($_POST['reading_yn']) ? 1 : 0;
					$congame = isset($_POST['console_games_yn']) ? 1 : 0;
					$trav = isset($_POST['travel_yn']) ? 1 : 0;
					$cosplay = isset($_POST['cosplay_yn']) ? 1 : 0;
					$larp = isset($_POST['larping_yn']) ? 1 : 0;
					
					
					$errors = array();
					
				if (empty($trimmed['fav_animal'])) {
						$errors[] = 'You forgot to enter your favourite animal.';
						} else {
						$favani = mysqli_real_escape_string($dbc, $trimmed['fav_animal']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,50}\s*$/', $trimmed['fav_animal'])){
						$errors[] = 'You may not use one or more of the characters that you provided in your favourite animal.';
						} else {
						$favani = mysqli_real_escape_string($dbc, $trimmed['fav_animal']);
						}	
						
						
						
						if (empty($trimmed['fav_food'])) {
						$errors[] = 'You forgot to enter your favourite animal.';
						} else {
						$favfoo = mysqli_real_escape_string($dbc, $trimmed['fav_food']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,50}\s*$/', $trimmed['fav_food'])){
						$errors[] = 'You may not use one or more of the characters that you provided in your favourite animal.';
						} else {
						$favfoo = mysqli_real_escape_string($dbc, $trimmed['fav_food']);
						}	
					
					
				
						
						if (!preg_match('/^\s*[A-Za-z-.\'\,\s]{2,250}\s*$/', $trimmed['bio'])){
						$errors[] = 'You may not use one or more of characters that you provided in your first_name.';
						} else {
						$bio = mysqli_real_escape_string($dbc, $trimmed['bio']);
						}	
					
					if (empty($errors)) {
			$q = "INSERT INTO aw2274434_survey_enum_survey1res (user_id, first_name, last_name, birthday, fav_color, fav_food, blogging_yn, animals_yn, cooking_yn, writing_yn, sewing_yn, dance_yn, sports_yn, art_yn, fantasy_football_yn, magic_yn, origami_yn, reading_yn, console_games_yn, travel_yn, cosplay_yn, larping_yn, bio, fav_animal, date_taken) VALUES ('$id', '$fn', '$ln', '$bday', '$favcol', '$favfoo', '$blog', '$animals', '$cook', '$writ', '$sew', '$dan', '$sport', '$art', '$fanfoot', '$magic', '$orig', '$read', '$congame', '$trav', '$cosplay', '$larp', '$bio', '$favani', NOW() )";
				$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
				
				if (mysqli_affected_rows($dbc) == 1) {
			echo '<h3>Survey Complete!</h3>';
				
				exit(); 
				
			} else { 
				echo '<p class="error">Your survey could not be entered into the database due to a system error. We apologize for any inconvenience.</p>';
			}			
			} else { 
					echo '<p class="error">The following error(s) occurred:<br />';
					foreach ($errors as $msg) {
						echo " - $msg<br />\n";}
						echo '</p><p>Please try again.</p>';
						}
			}
		
		
		
		
		
		if ($numtxtboxques = 6)	{
			$numtxtboxquesarr = array();
			for ($x=1; $x<=$numtxtboxques; $x++)	{
				
				echo '<p>Textbox Question # '.$x.': <textarea name="txtboxques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['txtboxques_'.$x])) echo $trimmed['txtboxques_'.$x];
				echo '" /></textarea></p>';
				echo '<br />';
				echo '<br />';
			$numtxtboxquesarr [] = $x;
			
			}
			print_r($numtxtboxquesarr);
			echo '<br />';
			echo '<br />';

		}
		
		
		
		
		
		
		
		echo '<form action="survey.php" method="post">';
		echo '<p>Favourite Food: <input type="text" name="fav_food" size="15" maxlength="40" value="';
		if (isset($trimmed['fav_food'])) echo $trimmed['fav_food'];
		echo '" /></p><br />';
		echo '<p>Favourite Animal: <input type="text" name="fav_animal" size="15" maxlength="40" value="';
		if (isset($trimmed['fav_animal'])) echo $trimmed['fav_animal'];
		echo '" /></p><br />';
	
	$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

	// Make the months pull-down menu:
	echo '<p>Birthday: <br />';
	echo '<p><select name="m">';
	foreach ($months as $key => $value) {
		echo '<option value="'.$key.'">'.$value.'</option>\n';
		}
	echo '</select>';

	// Make the days pull-down menu:
	echo '<select name="d">';
	for ($d = 1; $d <= 31; $d++) {
		echo '<option value="'.$d.'">'.$d.'</option>\n';
	}
	echo '</select>';

	// Make the years pull-down menu:
	echo '<select name="y">';
	for ($y = 1910; $y <= 2021; $y++) {
		echo '<option value="'.$y.'">'.$y.'</option>\n';
		}
	echo '</select></p><br />';

	echo '<p>Favourite Colour: <br />';
	$coloursarr = array (1 => 'Red', 'Orange', 'Yellow', 'Green', 'Blue', 'Indigo', 'Violet');
	echo '<select name="colour">';
	foreach ($coloursarr as $key => $value) {
		echo '<option value="'.$key.'">'.$value.'</option>\n';
	}
	echo '</select></p><br />';

	echo '<p>Hobbies:<br />';
	echo '<table>';
	echo '<tr>';
	echo '<td><input type="checkbox" name="blogging_yn" value="$blog">Blogging</td>';
	echo '<td><input type="checkbox" name="animals_yn" value="$animals">Animals</td>';
	echo '<td><input type="checkbox" name="cooking_yn" value="$cook">Cooking</td>';
	echo '<td><input type="checkbox" name="writing_yn" value="$writ">Writing</td></tr>';
	echo '<tr><td><input type="checkbox" name="sewing_yn" value="$sew">Sewing</td>';
	echo '<td><input type="checkbox" name="dance_yn" value="$dan">Dance</td>';
	echo '<td><input type="checkbox" name="sports_yn" value="$sport">Sports</td>';
	echo '<td><input type="checkbox" name="art_yn" value="$art">Art</td></tr>';
	echo '<tr><td><input type="checkbox" name="fantasy_football_yn" value="$fanfoot">Fantasy Football</td>';
	echo '<td><input type="checkbox" name="magic_yn" value="$magic">Magic</td>';
	echo '<td><input type="checkbox" name="origami_yn" value="$orig">Origami</td>';
	echo '<td><input type="checkbox" name="reading_yn" value="$read">Reading</td></tr>';
	echo '<tr><td><input type="checkbox" name="console_games_yn" value="$congame">Console Games</td>';
	echo '<td><input type="checkbox" name="travel_yn" value="$trav">Travel</td>';
	echo '<td><input type="checkbox" name="cosplay_yn" value="$cosplay">Cosplay</td>';
	echo '<td><input type="checkbox" name="larping_yn" value="$larp">LARPing</td></tr></p>';
	echo '</table>';
	

	echo '<p>Short Bio:</strong><br/>';
	echo '<textarea name="bio" rows="3" cols="40" maxlength="240" value="';
	
	if (isset($trimmed["bio"])) echo $trimmed["bio"];
	
	echo '"/></textarea></p><br/><br/>';
	echo '<input type="submit" name="submit" value="Submit Survey!">';
	echo '</form>';
	
	} else {
	echo 'Please Login or Register to take a survey.';
	}
	?>	




	
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>