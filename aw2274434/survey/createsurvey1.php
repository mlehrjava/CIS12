<?php
session_start();
include ('inc/header.html');
require ('inc/config.inc.php');
?>
	<!---------------------------------------------->
    <h2>Create Survey</h2>
    <br />
	<?php
	
	if ($_SESSION['user_level'] == 1) {	//IF ADMIN
	require ('../mysqli_connect.php');
	
	$trimmed = array_map('trim', $_GET);
	
	
	//if input is entered, it is given it's value
		
		if ( (isset($_GET['numtxtboxques'])) && (is_numeric($_GET['numtxtboxques'])) ) {
		$numtxtboxques = $_GET['numtxtboxques'];
		} elseif ( (isset($_POST['numtxtboxques'])) && (is_numeric($_POST['numtxtboxques'])) ) {
		$numtxtboxques = $_POST['numtxtboxques'];
		}
		if ( (isset($_GET['numtxtareaques'])) && (is_numeric($_GET['numtxtareaques'])) ) {
		$numtxtareaques = $_GET['numtxtareaques'];
		} elseif ( (isset($_POST['numtxtareaques'])) && (is_numeric($_POST['numtxtareaques'])) ) {
		$numtxtareaques = $_POST['numtxtareaques'];
		}
		if ( (isset($_GET['numradbutques'])) && (is_numeric($_GET['numradbutques'])) ) {
		$numradbutques = $_GET['numradbutques'];
		} elseif ( (isset($_POST['numradbutques'])) && (is_numeric($_POST['numradbutques'])) ) {
		$numradbutques = $_POST['numradbutques'];
		}
		if ( (isset($_GET['numchckboxques'])) && (is_numeric($_GET['numchckboxques'])) ) {
		$numchckboxques = $_GET['numchckboxques'];
		} elseif ( (isset($_POST['numchckboxques'])) && (is_numeric($_POST['numchckboxques'])) ) {
		$numchckboxques = $_POST['numchckboxques'];
		}
		if ( (isset($_GET['numdropdwnques'])) && (is_numeric($_GET['numdropdwnques'])) ) {
		$numdropdwnques = $_GET['numdropdwnques'];
		} elseif ( (isset($_POST['numdropdwnques'])) && (is_numeric($_POST['numdropdwnques'])) ) {
		$numdropdwnques = $_POST['numdropdwnques'];
		}
		
		//$incdate = isset($_POST['incdate']) ? 1 : 0;
		
		
		if (isset ($_GET['newsurveyname'])) {
		$newsurveyname = mysqli_real_escape_string($dbc, $trimmed['newsurveyname']);
		
		} else {
		echo 'Survey name was not set.';
		}
		
		if (!preg_match('/^\s*[A-Za-z_\s]{2,50}\s*$/', $trimmed['newsurveyname'])){
		$errors[] = 'You may not use one or more of the characters that you provided in your survey name. Please use only characters A-Z, 0-9, and _.';
		} else {
		$newsurveyname = mysqli_real_escape_string($dbc, $trimmed['newsurveyname']);
		$newsurveyname = preg_replace('/\s+/', '_', $newsurveyname);
		}
		
		
		if (isset ($_GET['newsurveydetails'])) {
		$newsurveydetails = mysqli_real_escape_string($dbc, $trimmed['newsurveydetails']);
		} else {
		echo 'Survey description was not set.';
		}
		
		if (!preg_match('/^\s*[A-Za-z-.\'\,\s]{2,250}\s*$/', $trimmed['newsurveydetails'])){
		$errors[] = 'You may not use one or more of the characters that you provided in your survey descriptions.';
		} else {
		$newsurveydetails = mysqli_real_escape_string($dbc, $trimmed['newsurveydetails']);
		}

		
		
		if (empty($errors)) {
		
		
		$q= "INSERT INTO `aw2274434_survey_enum_key` (`survey_table_name`, `survey_details`) VALUES ('aw2274434_survey_enum_".$newsurveyname."_res', '$newsurveydetails')";
		$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
				
				if (mysqli_affected_rows($dbc) == 1) {
			$q = 'CREATE TABLE aw2274434_survey_enum_'.$newsurveyname.'_res (result_id INT NOT NULL AUTO_INCREMENT PRIMARY KEY)';
				if (@mysqli_query($dbc, $q)) {
			echo '<h3>Survey Added to db!</h3>';
			$newsurveyname = $_GET['newsurveyname'];
			$numtxtboxques = $_GET['numtxtboxques'];
			$numtxtareaques = $_GET['numtxtareaques'];
			$numradbutques = $_GET['numradbutques'];
			$numchckboxques = $_GET['numchckboxques'];
			$numdropdwnques = $_GET['numdropdwnques'];
			echo 'Click to continue';
			echo '<a href="createsurvey2.php?newsurveyname='.$newsurveyname.'&numtxtboxques='.$numtxtboxques.'&numtxtareaques='.$numtxtareaques.'&numradbutques='.$numradbutques.'&numchckboxques='.$numchckboxques.'&numdropdwnques='.$numdropdwnques.'">';
			echo '<b>Continue</b></a>';
			
			
			
			//echo '<form action="createsurvey2.php?newsurveyname=$newsurveyname&numtxtboxques=$numtxtboxques&numtxtareaques=$numtxtareaques&numradbutques=$numradbutques&numchckboxques=$numchckboxques&numdropdwnques=$numdropdwnques" method="get">';
			//echo '<input type="hidden" name="newsurveyname" value="' . $newsurveyname . '" />';
			//echo '<input type="hidden" name="numtxtboxques" value="' . $numtxtboxques . '" />';
			//echo '<input type="hidden" name="numtxtareaques" value="' . $numtxtareaques . '" />';
			//echo '<input type="hidden" name="numradbutques" value="' . $numradbutques . '" />';
			//echo '<input type="hidden" name="numchckboxques" value="' . $numchckboxques . '" />';
			//echo '<input type="hidden" name="numdropdwnques" value="' . $numdropdwnques . '" />';
		
		
				//echo '<input type="submit" name="submit" value="Submit Survey!">';
				//echo '</form>';
				
				
				
				exit(); 
				}	
				}
			} else { 
					echo '<p class="error">The following error(s) occurred:<br />';
					foreach ($errors as $msg) {
						echo " - $msg<br />\n";}
						echo '</p><p>Please try again.</p>';
						}
		
		
		
		
		
		
		
		
		
		
		
		
		
		
		
	
		
		


	
	} else { //IF NOT LOGGED IN			
              echo 'You are not authorized to view this page. Please log in or register.';
                 }
				 
				 
	?>	




	
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>