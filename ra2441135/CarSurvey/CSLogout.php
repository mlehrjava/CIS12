<?php # CSLogout.php - Logout using sessions
// This page lets the user logout.

session_start(); // Access the existing session.

// If no cookie is present, redirect the user:
if (!isset($_SESSION['userID'])) 
{
	// Need the function:
	require ('CSLoginFunctions.inc.php');
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
include ("CSHeader.inc.html");

// Print a customized message:
echo "<div id='content'";
echo "<h1>Logged Out!</h1>
<p>You are now Logged Out!</p>";

include ('CSFooter.inc.html');
?>