<?php # CSQ5.php - Question 5
// This page displays question 5.
// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Question 5';
include ('CSHeader.inc.html');
?>
<div id="content">
<h1>If Money Was Not an Object,
<br />
Which Vehicle Would You Want to Have?</h1>
<br />
<?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a Make:
	if (empty($_POST['make'])) 
        {
		$errors[] = 'Please Enter a Vehicle Make.';
	}
	else
	{
		$make = stripslashes(trim(($_POST["make"])));
            	// check if make only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$make))
            	{
                	$errors[] = 'Only letters, numbers, and white space allowed in Make.';
            	}
		
	}
	
	// Check for a Model:
	if (empty($_POST['model'])) 
	{
		$errors[] = 'Please Enter a Vehicle Model.';
	}
	else
	{
		$model = stripslashes(trim(($_POST["model"])));
            	// check if model only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z0-9 ]*$/",$model))
            	{
                	$errors[] = 'Only letters, numbers, and white space allowed in Model.';
            	};
	}

	if (empty($errors))
	{ // If everything's OK.
		require ('CSConnect.php'); // Connect to the db.
        $e=$_SESSION['email'];
        $e=mysqli_real_escape_string( $con,$e);
        
        //check if email adress already exists
        $check="SELECT * FROM ra2441135_survey_entity_dreamcar WHERE email = '$e'";
        $rs = mysqli_query($con,$check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
        if(isset($data))
        {
        	echo "<p class='error'>You Already Answered This Question.
            <br />
            please <a class='createaccount' href='CSR5.php'>Click Here</a> for Results,
            <br />
            Or<a class='createaccount' href='CSQ6.php'>Click Here</a> for Next Question.</p><br />";
		}
        else
        {
	
			// Enter the Make and Model in the database...
		
			require ('CSConnect.php'); // Connect to the db.

			// Make the query:
			$q = "INSERT INTO ra2441135_survey_entity_dreamcar (FirstName, LastName, email, make, model) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_SESSION[email]', '$make', '$model')";		
			$r = @mysqli_query ($con, $q); // Run the query.
			if ($r) 
			{ // If it ran OK.
		
				// Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR5.php">Click Here</a> to View Results for This Question,
				<br />
				or <a class="createaccount" href="CSQ6.php">Click Here</a> for the Next Question.</h3>';
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
            <p>Make:</p>
            <input class="input_field" type="text"  name="make" maxlength="20" value= "<?php if (isset($_POST['make'])) echo $_POST['make']; ?>">
            <br />
            <p>Model:</p>
            <input class="input_field" type="text"  name="model" maxlength="20" value= "<?php if (isset($_POST['model'])) echo $_POST['model']; ?>">
            <br />
            <br />
            <input class="submit_button" type="submit" name="submit" value="Submit">
        </form>
<?php include ('CSFooter.inc.html'); ?>