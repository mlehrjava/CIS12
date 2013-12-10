<?php # IssKarSU.php - Sign Up
// This script creates a Sign Up form to be displayed and handled for new students wishing to attend a free trial class.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Sign Up For Classes';
$bgImg = 'images/SU.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>
<h1 style="text-align:center;">Sign Up for Classes!</h1>
        <h2 style="text-align:center;margin:0px 100px 0px 100px;">Once you have taken your Free Trial Class you may obtain the Super Secret Phrase and create an account <a class="createaccount" href="IssKarCA.php">HERE</a>.</h2>
<?php
// Check for form submission:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize an error array.
	
	// Check for a first name:
	if (empty($_POST['FirstName'])) 
        {
		$errors[] = 'You forgot to enter your First Name.';
	}
	else
	{
		$fn = stripslashes(trim(($_POST["FirstName"])));
            	// check if FirstName only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z ]*$/",$fn))
            	{
                	$errors[] = 'Only letters and white space allowed in First Name.';
            	}
		
	}
	
	// Check for a last name:
	if (empty($_POST['LastName'])) 
	{
		$errors[] = 'You forgot to enter your Last Name.';
	}
	else
	{
		$ln = stripslashes(trim(($_POST["LastName"])));
            	// check if LastName only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z ]*$/",$ln))
            	{
                	$errors[] = 'Only letters and white space allowed in Last Name.';
            	};
	}
	// check if Child's First Name only contains letters and whitespace
	$cfn = stripslashes(trim(($_POST["ChildFirstName"])));

            	if (!preg_match("/^[a-zA-Z ]*$/",$cfn))
            	{
                	$errors[] = 'Only letters and white space allowed in Child&#39;s First Name.';
            	}
	
	$cln = stripslashes(trim(($_POST["ChildLastName"])));
            	// check if Child's Last Name only contains letters and whitespace
            	if (!preg_match("/^[a-zA-Z ]*$/",$cln))
            	{
                	$errors[] = 'Only letters and white space allowed in Child&#39;s Last Name.';
            	}

	// Check for an email address:
	if (empty($_POST['email'])) 
	{
		$errors[] = 'You forgot to enter your Email Address.';
	}
	else
	{
	    	$e = stripslashes(trim(($_POST["email"])));
            	// check if e-mail address syntax is valid
            	if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$e))
            	{
                	$errors[] = 'Invalid email format';
            	}
		
	}
	
	// Check for a time:
	if (empty($_POST['times'])) 
	{
		$errors[] = 'A Trial Class is required to be scheduled.';
	}
	else
	{
		$t = stripslashes(trim(($_POST["times"])));
	}
	
	if (empty($errors))
	{ // If everything's OK.
	
		// Register the user in the database...
		
		require ('IssKarConnect.php'); // Connect to the db.

		// Make the query:
		$q = "INSERT INTO ra2441135_isskar_entity_students (FirstName, LastName, ChildFirstName, ChildLastName, email, times, SignupDate)
            VALUES ('$fn','$ln','$cfn','$cln','$e','$t', NOW() )";		
		$r = @mysqli_query ($con, $q); // Run the query.
		if ($r) 
		{ // If it ran OK.
            
			// Print a message:
			if(empty($cfn) || empty($cln))
			{
			 
			    echo '<h1>Thank You ' . $fn . '!</h1>
			    <p>You&#39;ve Signed Up!
			    <br />
			    Your class is for ' . $t .'!</p>';
			}
			else
			{
			    echo '<h1>Thank You ' . $fn . ' and ' . $cfn . '!</h1>
			    <p>You&#39;ve Signed Up
			    <br />
			    Your Class is for ' . $t . '!</p>';
			}

		} 
		else
		{ // If it did not run OK.
	
			// Public message:
			echo '<h1>System Error</h1>
			<p class="error">You could not be signed up due to a system error.</p>'; 
	
			// Debugging message:
			echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
				
		} // End of if ($r) IF.
		
		mysqli_close($con); // Close the database connection.
		
		// Include the footer and quit the script:
		include ('IssKarFooter.inc.html');
		exit();
		
	} 
	else
	{ // Report the errors.
	
		echo '<p>Error!</p>
		<p class="suerror">The following error(s) occurred:<br />';
		foreach ($errors as $msg)
		{ // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p><p><br /></p>';
		
	} // End of if (empty($errors)) IF.

} // End of the main Submit conditional.
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    First Name:
    <br />
    <input class="input_field" type="text"  name="FirstName" maxlength="20" value= "<?php if (isset($_POST['FirstName'])) echo $_POST['FirstName']; ?>">
    <span class="error">*</span>
    <br />
    Last Name:
    <br />
    <input class="input_field" type="text" name="LastName" maxlength="40" value="<?php if (isset($_POST['LastName'])) echo $_POST['LastName']; ?>">
    <span class="error">*</span>
    <br />
    Child&#39;s First Name:
    <br />
    <input class="input_field" type="text" name="ChildFirstName" maxlength="20" value="<?php if (isset($_POST['ChildFirstName'])) echo $_POST['ChildFirstName']; ?>">
    <br />
    Child&#39;s Last Name:
    <br />
    <input class="input_field" type="text" name="ChildLastName" maxlength="40" value="<?php if (isset($_POST['ChildLastName'])) echo $_POST['ChildLastName']; ?>">
    <br />
    E-mail:
    <br />
    <input class="input_field" type="text"  name="email" maxlength="60" value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>">
    <span class="error">*</span>
    <br />
    Choose Day and Time of Your/Your Child&#39;s Free Trial Class:
   	<br />
   	<select class="input_field" name="times" selected"<?php echo $times;?>">
                <option value=></option>
                <option value="Kids 4 Years and Older on Tuesday 5:00PM to 6:00PM">Kids 4 Years and Older on Tuesday 5:00PM to 6:00PM</option>
                <option value="Kids 4 Years and Older on Tuesday 6:00PM to 7:00PM">Kids 4 Years and Older on Tuesday 6:00PM to 7:00PM</option>
                <option value="Kids 4 Years and Older on Thursday 6:00PM to 7:00PM">Kids 4 Years and Older on Thursday 5:00PM to 6:00PM</option>
                <option value="Kids 4 Years and Older on Thursday 6:00PM to 7:00PM">Kids 4 Years and Older on Thursday 6:00PM to 7:00PM</option>
                <option value="Adults on Tuesday 7:00PM to 8:00PM">Adults on Tuesday 7:00PM to 8:00PM</option>
                <option value="Adults on Thursday 7:00PM to 8:00PM">Adults on Thursday 7:00PM to 8:00PM</option>
            </select>
            <span class="error">*</span>
   	<br />
   	<input class="submit_button" type="submit" value="Submit" name="submit">
</form>
<?php include ('IssKarFooter.inc.html'); ?>