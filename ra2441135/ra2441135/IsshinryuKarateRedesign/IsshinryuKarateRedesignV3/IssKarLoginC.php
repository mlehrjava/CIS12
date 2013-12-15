<?php # IssKarLoginC.php - Login using Cookies
// This page processes the login form submission using cookies rather than sessions.
// Upon successful login, the user is redirected.
// Two included files are necessary.
// Send NOTHING to the Web browser prior to the setcookie() lines!

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
		
		// Set the cookies:
		setcookie ('userID', $data['userID'], time()+3600, '/', '', 0, 0);
		setcookie ('FirstName', $data['FirstName'], time()+3600,'/','',0,0);
		
		// Redirect:
		redirect_user('IssKarLoggedInC.php');
			
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