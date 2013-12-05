<?php # IssKarCA.php - Create Account
// This script creates a create account form to be displayed and handled.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Create An Account';
$bgImg = 'http://www.thealmightyguru.com/Database/Pictures/Karate.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');

// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['FirstName'])) {
		$errors[] = 'You forgot to enter your First Name.';
	} else {
		$fn = trim($_POST['FirstName']);
	}
	
	// Check for a last name:
	if (empty($_POST['LastName'])) {
		$errors[] = 'You forgot to enter your Last Name.';
	} else {
		$ln = trim($_POST['LastName']);
	}

	// Check for an email address:
	if (empty($_POST['email'])) {
		$errors[] = 'You forgot to enter your Email Address.';
	} else {
		$e = trim($_POST['email']);
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1'])) {
		if ($_POST['pass1'] != $_POST['pass2']) {
			$errors[] = 'Your Password did not match the Confirmed Password.';
		} else {
			$p = trim($_POST['pass1']);
		}
	} else {
		$errors[] = 'You forgot to enter your Password.';
	}
	// Define Super Secret Phrase
	$SSP = 'KarateROX';
	// Check for Super Secret Phrase
	if(!empty($_POST['SSP']))
	{
	    if($_POST['SSP'] !=$SSP)
	    {
	        $errors[] = 'The Super Secret Phrase is Incorrect.';
	    }
	    else
	    {
	        $s = trim($_POST['SSP']);
	    }
	}
	else
	{
	    $errors[] = 'Your forgot to enter the Super Secret Phrase.';
	}
	
	if (empty($errors)) { // If everything's OK.
	
		// Register the user in the database...
		
		require ('IssKarConnect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO ra2441135_isskar_entity_users (FirstName, LastName, email, pass, RegistrationDate) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
		$r = @mysqli_query ($con, $q); // Run the query.
		if ($r) { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you '. $fn . '!</h1>
		<p>You are now registered.!</p><p><br /></p>';	

		} else { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($con); // Close the database connection.
		
		// Include the footer and quit the script:
		exit();
		
	} else { // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<h1>Register</h1>
<form action="IssKarCA.php" method="post">
	<p>First Name:
    <br />
    <input class="input_field" type="text" name="FirstName" maxlength="20" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" /></p>
	<p>Last Name:
    <br />
    <input class="input_field" type="text" name="LastName"  maxlength="40" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" /></p>
	<p>Email Address:
    <br />
    <input class="input_field" type="text" name="email"  maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"  /> </p>
	<p>Password:
    <br />
    <input class="input_field" type="password" name="pass1"  maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  /></p>
	<p>Confirm Password:
    <br />
    <input class="input_field" type="password" name="pass2" maxlength="20" value="<?php if (isset($_POST['pass2'])); ?>"  /></p>
	<p>Enter the Super Secret Phrase you received at your Free Trial Class:
    <br />
    <input class="input_field" type="text" name="SSP" maxlength="20" value="<?php if (isset($_POST['SSP'])) echo $_POST['SSP']; ?>"  /></p>
	<p><input class="submit_button" type="submit" value="Submit"/></p>
</form>
        <!--<h1>Create Account</h1>
        <br />
        <h2>Please note that you must attend your first free trial class and obtain the <span id="ssPhrase">Super Secret Phrase</span> to create an account</h2>
        <br />
        <br />
        <form action="IssKarCASubmit.php" method="post">
        	<p>First Name:</p>
            <input class="input_field" type="text" name="FirstName" required>
            <p>Last Name:</p>
            <input class="input_field" type="text" name="LastName" required>
            <p>User Name:</p>
            <input class="input_field" type="text" name="UserName" required>
            <br />
            <p>Password:</p>
            <input class="input_field" type="password" name="password" required>
            <br />
            <p>Confirm Password:</p>
            <input class="input_field" type="password" name="password" required>
            <br />
            <p><span id="ssPhrase">Super Secret Phrase</span>:</p>
            <input class="input_field" type="text" name="ssPhrase" required>
            <br />
            <input class="submit_button" type="submit" value="Submit">
        </form>-->
<?php include ('IssKarFooter.inc.html'); ?>
	