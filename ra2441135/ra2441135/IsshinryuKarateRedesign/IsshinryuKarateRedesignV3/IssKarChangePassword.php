<?php # IssKarChangePassword.php - Change Password
// This page lets a user change their password.
session_start(); // Start the session.
$page_title = 'Change Your Password';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
// If no session value is present, redirect the user:
if (!isset($_SESSION['userID'])) 
{
    // Need the functions:
    require ('IssKarLoginFunctions.inc.php');
    redirect_user();    
}
echo '<h1>Change Your Password</h1>';
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	require ('IssKarConnect.php'); // Connect to the db.
		
	$errors = array(); // Initialize an error array.
	

	// Check for the current password:
	if (empty($_POST['pass'])) 
	{
		$errors[] = 'You forgot to enter your current password.';
	}
	else
	{
		$p = mysqli_real_escape_string($con, stripslashes(trim($_POST['pass'])));
		// check if pass1 only contains at least 8 characters, at least 1 letter, and at least 1 number.
        if (!preg_match("/^(?=.{8})(?=.*[a-zA-Z])(?=.*\d)[-+%#a-zA-Z\d]+$/",$p))
        {
        	$errors[] = 'Password must contain at least 8 characters, at least 1 letter, and at least 1 number.';
        }
	}

	// Check for a new password and match 
	// against the confirmed password:
	if (!empty($_POST['pass1']))
	{
		if ($_POST['pass1'] != $_POST['pass2']) 
		{
			$errors[] = 'Your new password did not match the confirmed password.';
		}
		else
		{
			$np = mysqli_real_escape_string($con, stripslashes(trim($_POST['pass1'])));
			// check if pass1 only contains at least 8 characters, at least 1 letter, and at least 1 number.
            if (!preg_match("/^(?=.{8})(?=.*[a-zA-Z])(?=.*\d)[-+%#a-zA-Z\d]+$/",$np))
            {
            	$errors[] = 'New Password must contain at least 8 characters, at least 1 letter, and at least 1 number.';
            }
		}
	} 
	else
	{
		$errors[] = 'You forgot to enter your new password.';
	}
	
	if (empty($errors)) 
	{ // If everything's OK.

		// Check that they've entered the right email address/password combination:
		$q = "SELECT userID FROM ra2441135_isskar_entity_users WHERE (email='$_SESSION[email]' AND pass=SHA1('$p') )";
		$r = @mysqli_query($con, $q);
		$num = @mysqli_num_rows($r);
		if ($num == 1) { // Match was made.
	
			// Get the user_id:
			$row = mysqli_fetch_array($r, MYSQLI_NUM);

			// Make the UPDATE query:
			$q = "UPDATE ra2441135_isskar_entity_users SET pass=SHA1('$np') WHERE userID=$row[0]";		
			$r = @mysqli_query($con, $q);
			
			if (mysqli_affected_rows($con) == 1) 
			{ // If it ran OK.

				// Print a message.
				echo '<h1>Thank you!</h1>
				<p>Your password has been updated.</p><p><br /></p>';	

			} 
			else
			{ // If it did not run OK.

				// Public message:
				echo '<h1>System Error</h1>
				<p class="error">Your password could not be changed due to a system error. We apologize for any inconvenience.</p>'; 
	
				// Debugging message:
				echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
	
			}

			mysqli_close($con); // Close the database connection.

			// Include the footer and quit the script (to not show the form).
			include ('IssKarFooter.inc.html'); 
			exit();
				
		}
		else
		{ // Invalid email address/password combination.
			echo '<h1>Error!</h1>
			<p class="error">The Current Password does not match the one on file.</p>';
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

	mysqli_close($con); // Close the database connection.
		
} // End of the main Submit conditional.
?>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
	<p>Current Password:</p> <input class="input_field" type="password" name="pass" size="10" maxlength="20" value="<?php if (isset($_POST['pass'])) echo $_POST['pass']; ?>"  />
	<p>New Password:</p> <input class="input_field" type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>"  />
	<p>Confirm New Password:</p> <input class="input_field" type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>"  />
	<br />
	<input class="submit_button" type="submit" name="submit" value="Submit" />
</form>
<?php include ('IssKarFooter.inc.html'); ?>