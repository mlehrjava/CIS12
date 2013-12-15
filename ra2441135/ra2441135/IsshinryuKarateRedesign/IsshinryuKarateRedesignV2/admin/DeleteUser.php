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
	    <?php # Script 10.2 - delete_user.php
// This page is for deleting a user record.
// This page is accessed through view_users.php.

$page_title = 'Delete a User';
echo '<h1>Delete a User</h1>';

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
	exit();
}

require ('IssKarConnect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	if ($_POST['sure'] == 'Yes') { // Delete the record.

		// Make the query:
		$q = "DELETE FROM ra2441135_isskar_entity_users WHERE userID=$id LIMIT 1";		
		$r = @mysqli_query ($con, $q);
		if (mysqli_affected_rows($con) == 1) 
		{ // If it ran OK.

			// Print a message:
			echo '<p>The user has been deleted.</p>';	

		} 
		else
		{ // If the query did not run OK.
			echo '<p class="error">The user could not be deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($con) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		}
	
	} 
	else
	{ // No confirmation of deletion.
		echo '<p>The user has NOT been deleted.</p>';	
	}

} 
else
{ // Show the form.

	// Retrieve the user's information:
	$q = "SELECT CONCAT(LastName, ', ', FirstName) FROM ra2441135_isskar_entity_users WHERE userID=$id";
	$r = @mysqli_query ($con, $q);

	if (mysqli_num_rows($r) == 1) 
	{ // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>Name: $row[0]</h3>
		Are you sure you want to delete this user?";
		
		// Create the form:
		echo '<form action="DeleteUser.php" method="post">
	<input type="radio" name="sure" value="Yes" /> Yes 
	<input type="radio" name="sure" value="No" checked="checked" /> No
	<input type="submit" name="submit" value="Submit" />
	<input type="hidden" name="id" value="' . $id . '" />
	</form>';
	} 
	else
	{ // Not a valid user ID.
		echo '<p class="error">This page has been accessed in error.</p>';
	}
} // End of the main submission conditional.
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