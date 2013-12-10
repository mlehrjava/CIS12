<?php # CSLoggedin.php - Logged in using Session
// The user is redirected here from CSLoginS.php.

session_start(); // Start the session.

// If no session value is present, redirect the user:
if (!isset($_SESSION['userID'])) 
{
	// Need the functions:
	require ('CSLoginFunctions.inc.php');
	redirect_user();	
}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ('CSHeader.inc.html');

// Print a customized message:
echo "<div id='content'";
echo "<h1>Logged In!</h1>
<p>You are now Logged in, {$_SESSION['FirstName']}!</p>
<br />
<p><a href='CSQ1.php' class='createaccount'>Click Here</a> to Take the Survey.</p>
<br />
<p><a href='CSLogout.php' class='createaccount'>Click Here</a> to Log Out</p>";

include ('CSFooter.inc.html');
?>
