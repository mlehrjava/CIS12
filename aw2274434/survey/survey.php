	<?php
	session_start();
	include ('inc/header.html');
	require ('inc/config.inc.php');
	?>
	<!---------------------------------------------->
    <h2 class="pgtitle">Survey</h1>
    <br />
	<?php
	if (isset($_SESSION['user_id'])){
	require ('../mysqli_connect.php');
	
	
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		$trimmed = array_map('trim', $_POST);
		
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
					
					
					
					
					
					$errors = array();
					
				if (empty($trimmed['last_name'])) {
						$errors[] = 'You forgot to enter your last name.';
						} else {
						$ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['last_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your last name.';
						} else {
						$ln = mysqli_real_escape_string($dbc, $trimmed['last_name']);
						}	
					
					
						if 	(empty($trimmed['first_name'])){
						$errors[] = 'You forgot to enter your first name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
						}
						
						if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['first_name'])){
						$errors[] = 'You may not use one or more of characters that you provided in your first_name.';
						} else {
						$fn = mysqli_real_escape_string($dbc, $trimmed['first_name']);
						}
					
					if (!empty($trimmed['fav_food'])) {
						$favfoo = mysqli_real_escape_string($dbc, $trimmed['fav_food']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['fav_food'])){
						$errors[] = 'You may not use one or more of characters that you provided for your favourite food.';
						} else {
						$favfoo = mysqli_real_escape_string($dbc, $trimmed['fav_food']);
						}	
					
					if (!empty($trimmed['fav_animal'])) {
						$favani = mysqli_real_escape_string($dbc, $trimmed['fav_animal']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,40}\s*$/', $trimmed['fav_animal'])){
						$errors[] = 'You may not use one or more of characters that you provided for you favourite animal.';
						} else {
						$favani = mysqli_real_escape_string($dbc, $trimmed['fav_animal']);
						}	
					
					
					if (!empty($trimmed['bio'])){
						$bio = mysqli_real_escape_string($dbc, $trimmed['bio']);
						}
						
					if (!preg_match('/^\s*[A-Za-z-.\'\s]{2,249}\s*$/', $trimmed['bio'])){
						$errors[] = 'You may not use one or more of characters that you provided in your bio.';
						} else {
						$bio = mysqli_real_escape_string($dbc, $trimmed['bio']);
						}	
					
					
					$blog = mysqli_real_escape_string($dbc, $trimmed['blogging_yn']);
					$animals = mysqli_real_escape_string($dbc, $trimmed['animals_yn']);					
					$cook = mysqli_real_escape_string($dbc, $trimmed['cooking_yn']);
					$writ = mysqli_real_escape_string($dbc, $trimmed['writing_yn']);
					$sew = mysqli_real_escape_string($dbc, $trimmed['sewing_yn']);
					$dan = mysqli_real_escape_string($dbc, $trimmed['dance_yn']);
					$sport = mysqli_real_escape_string($dbc, $trimmed['sports_yn']);
					$art = mysqli_real_escape_string($dbc, $trimmed['art_yn']);
					$fanfoot = mysqli_real_escape_string($dbc, $trimmed['fantasy_football_yn']);
					$magic = mysqli_real_escape_string($dbc, $trimmed['magic_yn']);
					$orig = mysqli_real_escape_string($dbc, $trimmed['origami_yn']);
					$read = mysqli_real_escape_string($dbc, $trimmed['reading_yn']);
					$congame = mysqli_real_escape_string($dbc, $trimmed['console_games_yn']);
					$trav = mysqli_real_escape_string($dbc, $trimmed['travel_yn']);
					$cosplay = mysqli_real_escape_string($dbc, $trimmed['cosplay_yn']);
					$larp = mysqli_real_escape_string($dbc, $trimmed['larping_yn']);	

					
			if (empty($errors)) {
			$q = "INSERT INTO aw2274434_survey_enum_survey1res(first_name, last_name, birthday, fav_color, fav_food, blogging_yn, animals_yn, cooking_yn, writing_yn, sewing_yn, dance_yn, sports_yn, art_yn, fantasy_football_yn, magic_yn, origami_yn, reading_yn, console_games_yn, travel_yn, cosplay_yn, larping_yn, bio, fav_animal) VALUES ('$fn', '$ln', '$bday', '$favcol', '$favfoo', '$blog', '$animals', '$cook', '$writ', '$sew', '$dan', '$sport', '$art', '$fanfoot', '$magic', '$orig', '$read', '$congame', '$trav', '$cosplay', '$larp', '$bio', '$favani')";
				$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
				if (mysqli_affected_rows($dbc) == 1) {
					echo '<h3>Survey Complete!</h3>';
					exit(); 
				} else { 
					echo '<p class="error">Your survey could not be entered into the database due to a system error. We apologize for any inconvenience.</p>';
				}			
				}
		}
		
		
		
		?>
		<form action="survey.php" method="post">
		<p>First Name: <input type="text" name="first_name" size="15" maxlength="40" value="<?php if (isset($trimmed['first_name'])) echo $trimmed['first_name']; ?>" /></p><br />
		<p>Last Name: <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($trimmed['last_name'])) echo $trimmed['last_name']; ?>" /></p><br />
		<p>Favourite Food: <input type="text" name="fav_food" size="15" maxlength="40" value="<?php if (isset($trimmed['fav_food'])) echo $trimmed['fav_food']; ?>" /></p><br />
		<p>Favourite Animal: <input type="text" name="fav_animal" size="15" maxlength="40" value="<?php if (isset($trimmed['fav_animal'])) echo $trimmed['fav_animal']; ?>" /></p><br />
	<?php
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
	?>
	<tr>
	<td><input type="checkbox" name="blogging_yn" value="<?php if (isset($trimmed['blogging_yn'])) echo $trimmed['blogging_yn']; ?>">Blogging</td>
	<td><input type="checkbox" name="animals" value="<?php if (isset($trimmed['animals_yn'])) echo $trimmed['animals_yn']; ?>">Animals</td>
	<td><input type="checkbox" name="cooking" value="<?php if (isset($trimmed['cooking_yn'])) echo $trimmed['cooking_yn']; ?>">Cooking</td>
	<td><input type="checkbox" name="writing" value="<?php if (isset($trimmed['writing_yn'])) echo $trimmed['writing_yn']; ?>">Writing</td></tr>
	<tr><td><input type="checkbox" name="sewing" value="<?php if (isset($trimmed['sewing_yn'])) echo $trimmed['sewing_yn']; ?>">Sewing</td>
	<td><input type="checkbox" name="dance" value="<?php if (isset($trimmed['dance_yn'])) echo $trimmed['dance_yn']; ?>">Dance</td>
	<td><input type="checkbox" name="sports" value="<?php if (isset($trimmed['sports_yn'])) echo $trimmed['sports_yn']; ?>">Sports</td>
	<td><input type="checkbox" name="art" value="<?php if (isset($trimmed['art_yn'])) echo $trimmed['art_yn']; ?>">Art</td></tr>
	<tr><td><input type="checkbox" name="fanfoot" value="<?php if (isset($trimmed['fantasy_football_yn'])) echo $trimmed['fantasy_football_yn']; ?>">Fantasy Football</td>
	<td><input type="checkbox" name="magic" value="<?php if (isset($trimmed['magic_yn'])) echo $trimmed['magic_yn']; ?>">Magic</td>
	<td><input type="checkbox" name="origami" value="<?php if (isset($trimmed['origami_yn'])) echo $trimmed['origami_yn']; ?>">Origami</td>
	<td><input type="checkbox" name="reading" value="<?php if (isset($trimmed['reading_yn'])) echo $trimmed['reading_yn']; ?>">Reading</td></tr>
	<tr><td><input type="checkbox" name="console_games" value="<?php if (isset($trimmed['console_games_yn'])) echo $trimmed['console_games_yn']; ?>">Console Games</td>
	<td><input type="checkbox" name="travel" value="<?php if (isset($trimmed['travel_yn'])) echo $trimmed['travel_yn']; ?>">Travel</td>
	<td><input type="checkbox" name="cosplay" value="<?php if (isset($trimmed['cosplay_yn'])) echo $trimmed['cosplay_yn']; ?>">Cosplay</td>
	<td><input type="checkbox" name="larping" value="<?php if (isset($trimmed['larping_yn'])) echo $trimmed['larping_yn']; ?>">LARPing</td></tr></p>
	</table>
	

	<p>Short Bio:</strong><br/>
	<textarea name="bio" rows="3" cols="40" maxlength="240" value="
	<?php if (isset($trimmed["bio"])) echo $trimmed["bio"];?>
	"/></textarea></p><br/><br/>
	<input type="submit" name="submit" value="Submit Survey!">
	</form>
	<?php
	} else {
	echo 'Please Login or Register to take a survey.';
	}
	?>	




	
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>