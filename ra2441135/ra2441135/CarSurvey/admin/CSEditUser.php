<?php #CSEditUser.php - Edit a User
// This page is for editting a user record.
// This page is accessed through CSLoU.php.
session_start();
include('../CSHeader.inc.html');
$page_title = 'Edit a User';
echo '<h1>Edit a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) )
{ // From view_users.php
	$id = $_GET['id'];
}
elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) 
{ // Form submission.
	$id = $_POST['id'];
}
else
{ // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('../CSFooter.html.inc'); 
	exit();
}

require ('../CSConnect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['FirstName'])) 
	{
		$errors[] = 'You forgot to enter your First Name.';
	} 
	else 
	{
		$fn = mysqli_real_escape_string($con, trim($_POST['FirstName']));
	}
	
	// Check for a last name:
	if (empty($_POST['LastName'])) 
	{
		$errors[] = 'You forgot to enter your Last Name.';
	} 
	else 
	{
		$ln = mysqli_real_escape_string($con, trim($_POST['LastName']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) 
	{
		$errors[] = 'You forgot to enter your email address.';
	} 
	else 
	{
		$e = mysqli_real_escape_string($con, trim($_POST['email']));
	}
	
	if (empty($errors)) 
	{ // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT userID FROM ra2441135_survey_entity_users WHERE email='$e' AND userID != $id";
		$r = @mysqli_query($con, $q);
		if (mysqli_num_rows($r) == 0) 
		{

			// Make the query:
			$q = "UPDATE ra2441135_survey_entity_users SET FirstName='$fn', LastName='$ln', email='$e' WHERE userID=$id LIMIT 1";
			$r = @mysqli_query ($con, $q);
			if (mysqli_affected_rows($con) == 1) 
			{ // If it ran OK.

				// Print a message:
				echo '<p>The user has been edited.</p>';	
				
			} 
			else
			{ // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($con) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} 
		else 
		{ // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} 
	else
	{ // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg)
		{ // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT FirstName, LastName, email FROM ra2441135_survey_entity_users WHERE userID=$id";		
$r = @mysqli_query ($con, $q);

if (mysqli_num_rows($r) == 1) 
{ // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="EditUser.php" method="post">
<p>First Name: <input class="input_field" type="text" name="FirstName" size="15" maxlength="20" value="' . $row[0] . '" /></p>
<p>Last Name: <input class="input_field" type="text" name="LastName" size="15" maxlength="40" value="' . $row[1] . '" /></p>
<p>Email Address: <input class="input_field" type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
<p><input type="submit" class="submit_button" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} 
else 
{ // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($con);
include('../CSFooter.inc.html');
?>