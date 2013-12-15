<?php # IssKarLoggedinC.php - Logged In using Cookies
// The user is redirected here from IssKarLoginC.php.

// If no cookie is present, redirect the user:
if (!isset($_COOKIE['userID'])) 
{

	// Need the functions:
	require ('IssKarLoginFunctions.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';
include ("IssKarHeader.inc.html");
include ("IssKarNavbar.inc.html");

// Print a customized message:
echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_COOKIE['FirstName']}!</p>
<p><a href=\"IssKarLogout.php\">Logout</a></p>";

include ("IssKarFooter.inc.html");
?>