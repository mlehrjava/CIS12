<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../phpstylesheet.css">
    <title>Isshinryu Karate</title>
    <style>
        #background
        {
            background-image:url("http://www.sfisshinryu.com/wp-content/themes/smallbiz/images/HomeImage.jpg");
        }
        h1
        {
            text-align:center;
        }
        h2
        {
            margin:-20px 150px 20px 150px;
            text-align:center;
        }
        p
        {
            font-size:24px;
        }
       
    </style>
</head>
<body>
    <div id="header">
        <img id="titleImg1" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
        <marquee width="750" height="73" align="bottom" loop="65" scrollamount="10">  Welcome to our <span style=color:#ff0000;>Dojo</span> in Cathedral City California ---- Sensei Sandubrae ---- Sensei McConnell ---- Sensei Tweedie  ---- Sensei Doster ---- Mr Kendel ---- Mr Manger ---- Mr G Petersen ---- Mr M Peterson ---- Mr Caballero ---- Mr Mota ---- </marquee>
        <a href="../IssKarSU.php"><img id="signupImg" src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
	<a class="signin" href="IssKarSI.php">Sign In</a>
        <img id="titleImg2" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
    </div>
    <div class="left">
        <ul>
            <li><a class="linkbar" href="../IssKarSSaP.html">School Schedule and Price</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarSU.php">Sign Up!</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarCA.php">Create Account</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarBT.html">Belt Testing</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarAU.html">About Us</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarSB.html">Sensei's Biography</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarAH.html">Sensei's Awards and Honors</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarBB.html">Active, Regularly Attending Black Belts</a></li>
            <br />
            <li><a class="linkbar" href="../IssKarT.php">Terminology</a></li>
        </ul>
    </div>
    <div class="right">
	    <?php # Script 10.3 - EditUser.php
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit a User';
echo '<h1>Edit a User</h1>';

// Check for a valid user ID, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) )
{ // From view_users.php
	$id = $_GET['id'];
}
elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) 
{ // Form submission.
	$id = $_POST['id'];
}
else
{ // No valid ID, kill the script.
	echo '<p class="error">This page has been accessed in error.</p>';
	include ('includes/footer.html'); 
	exit();
}

require ('IssKarConnect.php'); 

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{

	$errors = array();
	
	// Check for a first name:
	if (empty($_POST['FirstName'])) 
	{
		$errors[] = 'You forgot to enter your First Name.';
	} 
	else 
	{
		$fn = mysqli_real_escape_string($con, trim($_POST['FirstName']));
	}
	
	// Check for a last name:
	if (empty($_POST['LastName'])) 
	{
		$errors[] = 'You forgot to enter your Last Name.';
	} 
	else 
	{
		$ln = mysqli_real_escape_string($con, trim($_POST['LastName']));
	}

	// Check for an email address:
	if (empty($_POST['email'])) 
	{
		$errors[] = 'You forgot to enter your email address.';
	} 
	else 
	{
		$e = mysqli_real_escape_string($con, trim($_POST['email']));
	}
	
	if (empty($errors)) 
	{ // If everything's OK.
	
		//  Test for unique email address:
		$q = "SELECT userID FROM ra2441135_isskar_entity_users WHERE email='$e' AND userID != $id";
		$r = @mysqli_query($con, $q);
		if (mysqli_num_rows($r) == 0) 
		{

			// Make the query:
			$q = "UPDATE ra2441135_isskar_entity_users SET FirstName='$fn', LastName='$ln', email='$e' WHERE userID=$id LIMIT 1";
			$r = @mysqli_query ($con, $q);
			if (mysqli_affected_rows($con) == 1) 
			{ // If it ran OK.

				// Print a message:
				echo '<p>The user has been edited.</p>';	
				
			} 
			else
			{ // If it did not run OK.
				echo '<p class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($con) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} 
		else 
		{ // Already registered.
			echo '<p class="error">The email address has already been registered.</p>';
		}
		
	} 
	else
	{ // Report the errors.

		echo '<p class="error">The following error(s) occurred:<br />';
		foreach ($errors as $msg)
		{ // Print each error.
			echo " - $msg<br />\n";
		}
		echo '</p><p>Please try again.</p>';
	
	} // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT FirstName, LastName, email FROM ra2441135_isskar_entity_users WHERE userID=$id";		
$r = @mysqli_query ($con, $q);

if (mysqli_num_rows($r) == 1) 
{ // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="EditUser.php" method="post">
<p>First Name: <input type="text" name="FirstName" size="15" maxlength="15" value="' . $row[0] . '" /></p>
<p>Last Name: <input type="text" name="LastName" size="15" maxlength="30" value="' . $row[1] . '" /></p>
<p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
<p><input type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} 
else 
{ // Not a valid user ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($con);
?>
    </div>
    <div class="right" id="background">
        
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>