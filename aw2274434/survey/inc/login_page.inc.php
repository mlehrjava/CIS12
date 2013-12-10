<?php # Script 12.1 - login_page.inc.php
// This page prints any errors associated with logging in
// and it creates the entire login page, including the form.

// Include the header:
$page_title = 'Login';
include ('inc/header.html');

// Print any error messages, if they exist:
if (isset($errors) && !empty($errors)) {
	echo '<h1>Error!</h1>
	<p class="error">The following error(s) occurred:<br />';
	foreach ($errors as $msg) {
		echo " - $msg<br />\n";
	}
	echo '</p><p>Please try again.</p>';
}
if (!isset($_SESSION['user_id'])) {
// Display the form:
echo '<h1>Login</h1></br>';
echo '<form action="login.php" method="post">';
echo '	Username:&nbsp<input type="text" name="username" size="20" maxlength="30" /></br></br>';
echo '	Password:&nbsp<input type="password" name="pass" size="20" maxlength="20" /></br></br>';
echo '	<input type="submit" name="submit" value="Login" />';
echo '</form>';

} else {
echo '<p>You are already logged in!';
}
?>



<?php include ('inc/footer.html'); ?>