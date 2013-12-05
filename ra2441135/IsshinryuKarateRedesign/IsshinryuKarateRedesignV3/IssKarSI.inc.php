<?php # IssKarSI.inc.php - Sign In
    // This page prints any errors associated with logging in
    // and it creates the entire login page, including the form.
    
    // Include the header:
    $page_title = 'Sign In';
    include ('IssKarHeader.inc.html');
    include ('IssKarNavbar.inc.html');

    // Print any error messages, if they exist:
    if (isset($errors) && !empty($errors)) 
    {
        echo '<h1>Error!</h1>
        <p class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) 
        {
            echo " - $msg<br />\n";
        }
        echo '</p><p>Please try again.</p>';
    }
?>
<!---  Display the form: -->
<h1>Sign In</h1>
<form action="IssKarLogin.php" method="post">
    <p>Email Address:
    <br />
    <input class="input_field" type="text" name="email" size="20" maxlength="60" /></p>
    <p>Password:
    <br />
    <input class="input_field" type="password" name="pass" size="20" maxlength="20" /></p>
    <p><input class="submit_button" type="submit" name="submit" value="Sign In" /></p>
</form>
<?php include ('IssKarFooter.inc.html'); ?>