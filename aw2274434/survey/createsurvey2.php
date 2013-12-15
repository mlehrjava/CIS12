<?php
session_start();
include ('inc/header.html');
require ('inc/config.inc.php');
?>
	<!---------------------------------------------->
    <h2>Create Survey</h2>
	
    <br />
	<?php
	// Show errors:
ini_set('display_errors', 1);

// Adjust error reporting:
error_reporting(E_ALL | E_STRICT);

	if ($_SESSION['user_level'] == 1) {	//IF ADMIN
	require ('../mysqli_connect.php');
	
	$trimmed = array_map('trim', $_GET);
	

	//if input is entered, it is given it's value
		if  (isset($_GET['newsurveyname'])) {
		$newsurveyname = $_GET['newsurveyname'];
		} elseif  (isset($_POST['newsurveyname'])) {
		$newsurveyname = $_POST['newsurveyname'];
		}
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
		
		//for ($x=1; $x<=$numdropdwnques; $x++)	{
		//if  (isset($_GET['dropdwnques_'.$x.'])) {
		//$dropdwnques_'.$x.' = $_GET['dropdwnques_'.$x.'];
		//} elseif (isset($_POST['dropdwnques_'.$x.'])) {
		//$dropdwnques_'.$x = $_POST['dropdwnques_'.$x.'];
		//}
		//}
		




echo "<br />";
echo "<br />";
		
		//$incdate = isset($_POST['incdate']) ? 1 : 0;
	if ($_SERVER['REQUEST_METHOD'] == 'POST') {
echo $txtboxques;
			$newsurveyname = $_POST['newsurveyname'];
	$q = "ALTER TABLE `aw2274434_survey_enum_".$newsurveyname."_res`";
	$q .= " ADD ";
	for ($x=1; $x<=$numtxtboxques; $x++)	{
	$q .= "'txtboxques_".$x."' TEXT NOT NULL, ";$q .= rtrim($q, ',');
	}
	
	
	echo "<br />";
	echo "<br />";
	echo $q;
	echo "<br />";
	echo "<br />";	
	$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
	if ($r == false) {
    die("The query did not work:".$q);
} else {
    die("The query was a success!");
}
//	for ($x=1; $x<=$numtxtareaques; $x++)	{
//	$q = "ALTER TABLE `aw2274434_survey_enum_".$newsurveyname."_res`";
//	$q .= " ADD ";
//	$q .= "'txtareaques_".$x."' TEXT NOT NULL, ";$q .= rtrim($q, ',');
	
//	echo "<br />";
//	echo "<br />";
//	echo $q;
//	echo "<br />";
//	echo "<br />";	
//	$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	if ($r == false) {
 //   die("The query did not work:".$q);
//} else {
 //   die("The query was a success!");
//}
//	}
//////////	for ($x=1; $x<=$numradbutques; $x++)	{
//	$q = "ALTER TABLE `aw2274434_survey_enum_".$newsurveyname."_res`";
//	$q .= " ADD ";
//	$q .= "'radbutques_".$x."' TEXT NOT NULL, ";$q .= rtrim($q, ',');
	
//	echo "<br />";
//	echo "<br />";
/////	echo $q;
//	echo "<br />";
//	echo "<br />";	
//	$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	if ($r == false) {
//    die("The query did not work:".$q);
//} else {
//    die("The query was a success!");
//}
//	}
//	for ($x=1; $x<=$numchckboxques; $x++)	{
//	$q = "ALTER TABLE `aw2274434_survey_enum_".$newsurveyname."_res`";
//	$q .= " ADD ";
//	$q .= "'chckboxques_".$x."' TEXT NOT NULL, ";$q .= rtrim($q, ',');
	
//	echo "<br />";
//	echo "<br />";
//	echo $q;
//	echo "<br />";
//	echo "<br />";	
//	$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	if ($r == false) {
//    die("The query did not work:".$q);
//} else {
//    die("The query was a success!");
//}
//	}
//	for ($x=1; $x<=$numdropdwnques; $x++)	{
//	$q = "ALTER TABLE `aw2274434_survey_enum_".$newsurveyname."_res`";
//	$q .= " ADD ";
//	$q .= "'dropdwnques_".$x."' TEXT NOT NULL, ";$q .= rtrim($q, ',');
	
//	echo "<br />";
//	echo "<br />";
//	echo $q;
//	echo "<br />";
//	echo "<br />";	
//	$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
//	if ($r == false) {
//    die("The query did not work:".$q);
//} else {
//    die("The query was a success!");
//}
	}
	
	
	

//$l = count($array);
//for ($x=1; $x<=$numdropdwnques; ++$x)	{


//}




	
	
$numtxtboxques = isset($_GET['numtxtboxques']);
$numtxtareaques = isset($_GET['numtxtareaques']);
$numradbutques = isset($_GET['numradbutques']);
$numchckboxques = isset($_GET['numchckboxques']);
$numdropdwnques = isset($_GET['numdropdwnques']);	

echo '<form action="createsurvey2.php" method="post">';
		
		
	//	function txtboxques()	{
	//	static $x=1;
	//	$x<=$numtxtboxques;
	//	$x++;
	//	echo $x;
	//	}
	//	txtboxques();
		
		
		
		
		$txtboxques = '';
			for ($x=1; $x<=$numtxtboxques; $x++)	{
			//$$x = 'txtboxques_';
			//echo "$x ${$x}";
				echo "The number is: $x <br>";
				echo '<p>Textbox Question # '.$x.': <br /><textarea name="txtboxques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['txtboxques_'.$x])) echo $trimmed['txtboxques_'.$x];
				echo '"></textarea></p><br />';
			$txtboxques .= 	$trimmed['txtboxques_'.$x];

			}
		
		
		
		
			for ($x=1; $x<=$numtxtareaques; $x++)	{
				echo "The number is: $x <br>";
				echo '<p>Textarea Question # '.$x.': <br /><textarea name="txtareaques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['txtareaques_'.$x])) echo $trimmed['txtareaques_'.$x];
				echo '"></textarea></p><br />';
			
			}
		
		
		
			for ($x=1; $x<=$numradbutques; $x++)	{
				echo "The number is: $x <br>";
				echo '<p>Radio Button Question # '.$x.': <br /><textarea name="radbutques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['radbutques_'.$x])) echo $trimmed['radbutques_'.$x];
				echo '"></textarea></p><br />';
			}
		
		
		
		
			for ($x=1; $x<=$numchckboxques; $x++)	{
				echo "The number is: $x <br>";
				echo '<p>Check Box Question # '.$x.': <br /><textarea name="chckboxques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['chckboxques_'.$x])) echo $trimmed['chckboxques_'.$x];
				echo '"></textarea></p><br />';
			}
		
		
		
			for ($x=1; $x<=$numdropdwnques; $x++)	{
				echo "The number is: $x <br>";
				echo '<p>Drop Down Question # '.$x.': <br /><textarea name="dropdwnques_'.$x.'" rows="3" cols="40" maxlength="500" value="';
					if (isset($trimmed['dropdwnques_'.$x])) echo $trimmed['dropdwnques_'.$x];
				echo '"></textarea></p><br />';
			}
			
		if (isset($trimmed['newsurveyname'])) echo $trimmed['newsurveyname'];
		echo '<input type="hidden" name="newsurveyname" value="' . $newsurveyname . '" />';
		
		echo '<input type="submit" name="submit" value="Submit Survey!">';
	echo '</form>';
	//echo '<td><input type="checkbox" name="incdate" value="$inc_date">Include a date?</td>';
	
	}
	
	
	
	?>
	
	
	
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>