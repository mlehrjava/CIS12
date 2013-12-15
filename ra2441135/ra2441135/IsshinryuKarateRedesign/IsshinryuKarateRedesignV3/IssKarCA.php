<?php # IssKarCA.php - Create Account
// This script creates a create account form to be displayed and handled.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Create An Account';
$bgImg = 'images/SU.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');

echo '<h1 align="center">Create Account</h1>
<h2 align="center">Please note that you must attend your first free trial class and obtain the <span id="ssPhrase">Super Secret Phrase</span> to create an account</h2>';

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
	
	if (empty($errors)) 
	{ // If everything's OK.
	
		// Register the user in the database...
		
		require ('IssKarConnect.php'); // Connect to the db.
		$fn=mysqli_real_escape_string( $con,$fn);
        $ln=mysqli_real_escape_string( $con,$ln);
        $e=mysqli_real_escape_string( $con,$e);
        $p=mysqli_real_escape_string( $con,$p);
        
        //check if email adress already exists
        $check="SELECT * FROM ra2441135_isskar_entity_users WHERE email = '$e'";
        $rs = mysqli_query($con,$check);
        $data = mysqli_fetch_array($rs, MYSQLI_NUM);
        if(isset($data))
        {
            echo "<p class='error'>A User With That E-mail Address Already Exists.</p><br/>";
        }
        else
        {
        	// check if email, first name, and last name match
        	$check="SELECT * FROM ra2441135_isskar_entity_students WHERE email = '$e' AND FirstName = '$fn' AND LastName = '$ln'";
        	$rs = mysqli_query($con,$check);
        	$data = mysqli_fetch_array($rs, MYSQLI_NUM);
        	if(!isset($data))
        	{
            	echo "<p class='error'>Your First Name, Last Name and/or Email Address Did Not
            	<br />
            	Match the One You Signed Up as a New Student With.</p><br/>";
        	}
        	else
        	{
				// Make the query:
				$q = "INSERT INTO ra2441135_isskar_entity_users (FirstName, LastName, email, pass, RegistrationDate) VALUES ('$fn', '$ln', '$e', SHA1('$p'), NOW() )";		
				$r = @mysqli_query ($con, $q); // Run the query.

				if ($r) 
				{ // If it ran OK.

				// Print a message:
				echo '<h1>Thank you '. $fn . '!</h1>
				<p>You are now registered.!</p><p><br /></p>';	

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
				exit();
			}//end of email, first name and last name check IF
		}//end of email already exists IF
	}
	else
	{ // Report the errors.
	
		echo '<h1>Error!</h1>
		<p class="suerror">The following error(s) occurred:<br />';
		foreach ($errors as $msg) { // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<p><span class="error">* required field.</span></p>
<form action="IssKarCA.php" method="post">
	<p>First Name:</p>
    <input class="input_field" type="text" name="FirstName" maxlength="20" value="<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>" />
    <span class="error">*</span>
    <br />
	<p>Last Name:</p>
    <input class="input_field" type="text" name="LastName"  maxlength="40" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>" />
    <span class="error">*</span>
    <br />
	<p>Email Address:</p>
    <input class="input_field" type="text" name="email"  maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"  />
    <span class="error">*</span>
    <br />
	<p>Password: must contain at least 8 characters, at least 1 letter, and at least 1 number.</p>
    <input class="input_field" type="password" name="pass1"  maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  />
    <span class="error">*</span>
    <br />
	<p>Confirm Password:</p>
    <input class="input_field" type="password" name="pass2" maxlength="20" value="<?php if (isset($_POST['pass2'])); ?>"  />
    <span class="error">*</span>
    <br />
	<p>Enter the Super Secret Phrase you received at your Free Trial Class:</p>
    <input class="input_field" type="text" name="SSP" maxlength="20" value="<?php if (isset($_POST['SSP'])) echo $_POST['SSP']; ?>"  />
    <span class="error">*</span>
    <br />
	<input class="submit_button" type="submit" value="Submit"/>
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
	