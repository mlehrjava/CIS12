<?php # IssKarLoggedinS.php - Logged in using Session
// The user is redirected here from IssKarLoginS.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['user_id'])) 
{
	// Need the functions:
	require ('IssKarLoginFunctions.inc.php');
	redirect_user();	
}

// Set the page title and include the HTML header:
$page_title = 'Signed In!';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');

// Print a customized message:
echo "<h1>Signed In!</h1>
<p>You are now Signed in, {$_SESSION['FirstName']}!</p>
<p><a href=\"IssKarLogout.php\">Sign Out</a></p>";

include ('IssKarFooter.inc.html');
?>
