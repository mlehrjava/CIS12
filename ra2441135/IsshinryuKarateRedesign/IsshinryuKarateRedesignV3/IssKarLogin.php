<?php # IssKarLoginS.php - Login with Sessions
// This page processes the login form submission.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// This script now uses Sessions
// Send NOTHING to the Web browser prior to the session_start() lines!

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{

	// For processing the login:
	require ('IssKarLoginFunctions.inc.php');
	
	// Need the database connection:
	require ('IssKarConnect.php');
		
	// Check the login:
	list ($check, $data) = check_login($con, $_POST['email'], $_POST['pass']);
	
	if ($check)
	{ // OK!
		
		// Set the session data:
		session_start();
		$_SESSION['userID'] = $data['userID'];
		$_SESSION['FirstName'] = $data['FirstName'];
		
		// Redirect:
		redirect_user('IssKarLoggedIn.php');
			
	} 
	else
	{ // Unsuccessful!

		// Assign $data to $errors for error reporting
		// in the login_page.inc.php file.
		$errors = $data;

	}
		
	mysqli_close($con); // Close the database connection.

} // End of the main submit conditional.

// Create the page:
include ('IssKarSI.inc.php');
?>