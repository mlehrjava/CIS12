<?php # CSQ10.php - Question 10
// This page displays question 10.
// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Question 10';
include ('CSHeader.inc.html');
?>
<div id="content">
<h1>If you Could have any Fictional Vehicle,
<br />
What would it be?</h1>
<br />
<?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['fVehicle'])) 
        {
		$errors[] = 'Please Enter a Fictional Vehicle.';
	}
	else
	{
		$fVehicle = stripslashes(trim(($_POST["fVehicle"])));
            	// check if make only contains letters and whitespace
            	if (!preg_match("/^[\w ]*$/",$fVehicle))
            	{
                	$errors[] = 'Only letters numbers and white space allowed.';
            	}
		
	}
	
	if (empty($errors))
	{ // If everything's OK.
	
		// Enter the Make and Model in the database...
		
		require ('CSConnect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO ra2441135_survey_entity_fictional (FirstName, LastName, fVehicle) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$fVehicle')";		
		$r = @mysqli_query ($con, $q); // Run the query.
		if ($r) 
		{ // If it ran OK.
		
			// Print a message:
			echo '<h3>Thank You for participating in the Survey.
			<br />
			Please <a class="createaccount" href="CS10.php">Click Here</a> to see the Results!.</h3>';
		} 
		else
		{ // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">Your answer could not be processed due to a system error.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($con); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('CSFooter.inc.html');
		exit();
		
	} 
	else
	{ // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg)
		{ // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
            <p>Enter your Fictional Vehicle Here:</p>
            <input class="input_field" type="text"  name="fVehicle" maxlength="40" value= "<?php if (isset($_POST['fVehicle'])) echo $_POST['fVehicle']; ?>">
            <br />
            <br />
            <input class="submit_button" type="submit" name="submit" value="Submit">
        </form>
        <div id="picBar">
        <img height="220px" src="http://farm3.static.flickr.com/2475/3976343034_7562f225d3_o.jpg">
        <img height="220px" src="http://s1.cdn.autoevolution.com/images/news/real-life-black-beauty-chrysler-imperial-offered-as-prizt-26679_1.jpg">
        <img height="220px" src="http://www.asphaltandrubber.com/wp-content/uploads/2009/07/Tron-Legacy-lightcycle.jpg">
        </div>
<?php include ('CSFooter.inc.html'); ?>