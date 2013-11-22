<?php # IssKarLogoutS.php - Logout using sessions
// This page lets the user logout.

session_start(); // Access the existing session.

// If no cookie is present, redirect the user:
if (!isset($_SESSION['userID'])) 
{
	// Need the function:
	require ('IssKarLoginFunctions.inc.php');
	redirect_user();
} 
else
{ // Cancel the Session:
    $_SESSION = array(); // Clear the variables.
	session_destroy(); // Destroy the session itself.
	setcookie ('PHPSESSID', '', time()-3600, '/', '', 0, 0);
}

// Set the page title and include the HTML header:
$page_title = 'Logged Out!';
include ("IssKarHeader.inc.html");
include ("IssKarNavbar.inc.html");

// Print a customized message:
echo "<h1>Signed Out!</h1>
<p>You are now Signed Out!</p>";

include ('IssKarFooter.inc.html');
?>