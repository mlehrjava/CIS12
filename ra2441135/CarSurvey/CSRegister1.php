<?php # CSRegister.php - Register
// This script creates a Register form to be displayed and handled.
// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Register';
include ('CSHeader.inc.html');
?>
<div id="content">
<h1 style="text-align:center;">Register</h1>
        <h2 style="text-align:center;margin:0px 100px 0px 100px;">Once you Register you can Log In and take the Survey <a class="createaccount" href="CSLogin.php">HERE</a>.</h2>
<?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['FirstName'])) 
        {
		$errors[] = 'You forgot to enter your First Name.';
	}
	else
	{
		$fn = stripslashes(trim(($_POST["FirstName"])));
            	// check if FirstName only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z ]*$/",$fn))
            	{
                	$errors[] = 'Only letters and white space allowed in First Name.';
            	}
		
	}
	
	// Check for a last name:
	if (empty($_POST['LastName'])) 
	{
		$errors[] = 'You forgot to enter your Last Name.';
	}
	else
	{
		$ln = stripslashes(trim(($_POST["LastName"])));
            	// check if LastName only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z ]*$/",$ln))
            	{
                	$errors[] = 'Only letters and white space allowed in Last Name.';
            	};
	}

	// Check for an email address:
	if (empty($_POST['email'])) 
	{
		$errors[] = 'You forgot to enter your Email Address.';
	}
	else
	{
	    	$e = stripslashes(trim(($_POST["email"])));
            	// check if e-mail address syntax is valid
            	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$e))
            	{
                	$errors[] = 'Invalid email format';
            	}
		
	}
	
	// Check for a password and match against the confirmed password:
	if (!empty($_POST['pass1']))
	{
		if ($_POST['pass1'] != $_POST['pass2']) 
		{
			$errors[] = 'Your Password did not match the Confirmed Password.';
		}
		else
		{
			$p = stripslashes(trim(($_POST["pass1"])));
            		// check if pass1 only contains at least 8 characters, at least 1 letter, and at least 1 number.
            		if (!preg_match("/^(?=.{8})(?=.*[a-zA-Z])(?=.*\d)[-+%#a-zA-Z\d]+$/",$p))
            		{
                		$errors[] = 'Password must contain at least 8 characters, at least 1 letter, and at least 1 number.';
            		}
			
		}
	} 
	else
	{
		$errors[] = 'You forgot to enter your Password.';
	}
	
	if (empty($errors))
	{ // If everything's OK.
	
		// Register the user in the database...
		
		require ('CSConnect.php'); // Connect to the db.
        $fn=mysqli_real_escape_string( $con,$fn);
        $ln=mysqli_real_escape_string( $con,$ln);
        $e=mysqli_real_escape_string( $con,$e);
        $p=mysqli_real_escape_string( $con,$p);
        
        //check if email adress already exists
        $check="SELECT * FROM ra2441135_survey_entity_users WHERE email = '$e'";
        $rs = mysqli_query($con,$check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
        if($data[0] > 1)
        {
            echo "<p class='error'>A User With That E-mail Address Already Exists.</p><br/>";
        }
        else
        {
		    // Make the query:
		    $q = "INSERT INTO ra2441135_survey_entity_users (FirstName, LastName, email, pass, RegistrationDate) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
		    $r = @mysqli_query ($con, $q); // Run the query.
		    if ($r) 
		    { // If it ran OK.

			// Print a message:
			echo '<h1>Thank you '. $fn . '!</h1>
			<p>You are now registered.!</p><p><br /></p>
			<p><a href="CSLogin.php" class="createaccount">Click Here<a/> to Log In so you can take the survey.</p>';
		    }		
		    else
		    { // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be registered due to a system error.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
				
		    } // End of if ($r) IF.
		
		    mysqli_close($con); // Close the database connection.
		
		    // Include the footer and quit the script:
		    include ('CSFooter.inc.html');
		    exit();
        }//end of $check IF
	}//end of SQL IF
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
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name:
    <br />
    <input class="input_field" type="text"  name="FirstName" maxlength="20" value= "<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">
    <span class="error">*</span>
    <br />
    Last Name:
    <br />
    <input class="input_field" type="text" name="LastName" maxlength="40" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>">
    <span class="error">*</span>
    <br />
    E-mail:
    <br />
    <input class="input_field" type="text"  name="email" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    <span class="error">*</span>
    <br />
    Password: (Password must contain at least 8 characters, at least 1 letter, and at least 1 number.)
    <br />
    <input class="input_field" type="password"  name="pass1" maxlength="20" value= "<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>">
    <span class="error">*</span>
    <br />
    Confirm Password:
    <br />
    <input class="input_field" type="password"  name="pass2" maxlength="20" value= "<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>">
    <span class="error">*</span>
    <br />
    <input id="button" type="submit" value="Submit" name="submit">
</form>
<?php include ('CSFooter.inc.html'); ?>