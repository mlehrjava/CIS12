<?php # CSLogin.inc.php - Log In include page
    // This page prints any errors associated with logging in
    // and it creates the entire login page, including the form.
    
    // Include the header:
    $page_title = 'Log In';
    include ('CSHeader.inc.html');
?>
<div id="content">        
  <?php
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
<h1>Log In</h1>
<h2>If You Have Not Registered Yet Please <a class="createaccount" href="CSRegister.php">Click Here</a> to Do So.</h2>
<form action="CSLogin.php" method="post">
    <p>Email Address:
    <br />
    <input class="input_field" type="text" name="email" size="20" maxlength="60" /></p>
    <p>Password:
    <br />
    <input class="input_field" type="password" name="pass" size="20" maxlength="20" /></p>
    <p><input id="button" type="submit" name="submit" value="Log In" /></p>
</form>
<?php include ('CSFooter.inc.html'); ?>