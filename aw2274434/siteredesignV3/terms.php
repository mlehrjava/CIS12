<?php
ob_start();
session_start();
require ('inc/config.inc.php');
$page_title = 'Terminology';
include ('inc/header.html');
?>
	<style>
div#body_container>a.tab05 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Terms------------------------------------->
		<h1 class="tabtitle">Terminology</h1>
			<?php
		include ('inc/termlinks.html');
		
		
		
		
		if (isset($_SESSION['user_id'])){
			if ($_SESSION['user_level'] == 1 ){
			
				require ('../mysqli_connect.php');
				if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				$trimmed = array_map('trim', $_POST);
		
		
			
				
			 
				// Formatting for SQL datetime (if this is edited, it will NOT work.)
				
				$term = mysqli_real_escape_string($dbc, $trimmed['term']);
				$meaning = mysqli_real_escape_string($dbc, $trimmed['meaning']);
				$termtype_id = $_POST['ttypes'];
			 
				$q = "INSERT INTO aw2274434_karate_entity_terms (term, meaning, termtype_id) VALUES ('$term', '$meaning', '$termtype_id')";
				$r = @mysqli_query($dbc, $q) or die(mysqli_error($dbc));
						
						
					if (mysqli_affected_rows($dbc) == 1) {
					header("Location: terms.php");
					
					} else {
					echo '<p class="error">Term could not be created due to a system error. We apologize for any inconvenience.</p>';
					}
			
	}
		// Show form for adding the term:
	 
	echo '
		<form method="post" action="terms.php">
		<p><strong>Add Term:</strong><br/>
		Complete the form below then press the submit button when you are done.</p>
		<p><strong>Term:</strong><br/>
		<input type="text" name="term" size="25" maxlength="25" value="';
	if (isset($trimmed['term'])) echo $trimmed['term']; 
	echo '"/></p>
		<p><strong>Term Meaning:</strong><br/>
		<textarea name="meaning" rows="3" cols="40" maxlength="240" value="';
	if (isset($trimmed['meaning'])) echo $trimmed['meaning'];
	echo '"/></textarea></p>
		<p><strong>Term Type:</strong><br/>';
		
		
		
		
	$ttypes = array (1 => 'Blocks', 'Strikes and Punches', 'Stances', 'Kicks and Foot Techniques', 'Weapons', 'General Terms', 'Tournament Terms');

// Make the months pull-down menu:
echo '<select name="ttypes">';
foreach ($ttypes as $key => $value) {
	echo '<option value="'.$key.'">'.$value.'</option>\n';
}
echo '</select>';
	
	echo '<br/><br/>
	<input type="submit" name="submit" value="Add Term!">
	</form>';
		
		
		}}
		
		
		?>
			<p>The preceding Translations were borrowed with the permission of a great Web Site,  I requested permission to use the "Translations" and received permission… with the request that I would give credit to their site…..Well as we were retyping and editing  and adding and subtracting…….I lost the Site to whom I owe the credit for this page of Translations,……First my apologies….Secondly if anyone that reads this page can Please advise me of the site I will do the following……1. Apologize and 2. Give proper credit where it is due.</p>
			<br />
			Sincerely,  With Respect, <br /> 
			Arnold R Sandubrae</p>
			
			
<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>