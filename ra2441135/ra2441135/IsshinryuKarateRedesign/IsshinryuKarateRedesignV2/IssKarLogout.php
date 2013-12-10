<?php # IssKarLogout.php - Logout
// This page lets the user logout.

// If no cookie is present, redirect the user:
if (!isset($_COOKIE['userID'])) 
{
	// Need the function:
	require ('IssKarLoginFunctions.inc.php');
	redirect_user();
} 
else
{ // Delete the cookies:
	setcookie ('userID', '', time()-3600, '/', '', 0, 0);
	setcookie ('FirstName', '', time()-3600, '/', '', 0, 0);
}

// Set the page title and include the HTML header:
$page_title = 'Signed Out!';
include ('IssKarHeader.inc.html');

// Print a customized message:
echo "<h1>Signed Out!</h1>
<p>You are now Signed Out, {$_COOKIE['FirstName']}!</p>";

include ('IssKarFooter.inc.html');
?>