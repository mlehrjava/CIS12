<!DOCTYPE HTML>
<html>
<head><link type="text/css" rel="stylesheet" href="stylesheet.css"><style>body{background-image:none;background-color:none;}</style></head>
<body>
<?php # IssKarEditTerm.php - Edit Term
// This page is for editing a user record.
// This page is accessed through view_users.php.

$page_title = 'Edit a Term';
echo '<h1>Edit a Term</h1>';
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
	
	// Check for a term name:
	if (empty($_POST['term'])) 
	{
		$errors[] = 'You forgot to enter a Term Name.';
	} 
	else 
	{
		$tn = mysqli_real_escape_string($con, trim($_POST['term']));
	}
	
	// Check for a definition:
	if (empty($_POST['definition'])) 
	{
		$errors[] = 'You forgot to enter a Definition.';
	} 
	else 
	{
		$def = mysqli_real_escape_string($con, trim($_POST['definition']));
	}

	// Check for an alias:
	if (!empty($_POST['alias'])) 
	{
		$a = mysqli_real_escape_string($con, trim($_POST['alias']));
	}
	
	if (empty($errors)) 
	{ // If everything's OK.
	
		//  Test for unique Term Name:
		$q = "SELECT termId FROM ra2441135_isskar_entity_terminology WHERE term='$tn' AND termID != $id";
		$r = @mysqli_query($con, $q);
		if (mysqli_num_rows($r) == 0) 
		{

			// Make the query:
			$q = "UPDATE ra2441135_isskar_entity_terminology SET term='$tn', definition='$def', alias='$a' WHERE termId=$id LIMIT 1";
			$r = @mysqli_query ($con, $q);
			if (mysqli_affected_rows($con) == 1) 
			{ // If it ran OK.

				// Print a message:
				echo '<p>The Term has been Edited.</p>';	
				
			} 
			else
			{ // If it did not run OK.
				echo '<p class="error">The Term could Not be Edited due to a System Error. We apologize for any inconvenience.</p>'; // Public message.
				echo '<p>' . mysqli_error($con) . '<br />Query: ' . $q . '</p>'; // Debugging message.
			}
				
		} 
		else 
		{ // Already registered.
			echo '<p class="error">The Term already Exists.</p>';
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
$q = "SELECT term, definition, alias FROM ra2441135_isskar_entity_terminology WHERE termId=$id";		
$r = @mysqli_query ($con, $q);

if (mysqli_num_rows($r) == 1) 
{ // Valid user ID, show the form.

	// Get the user's information:
	$row = mysqli_fetch_array ($r, MYSQLI_NUM);
	
	// Create the form:
	echo '<form action="IssKarEditTerm.php" method="post">
<p>Term Name: 
<br />
<input type="text" name="term" size="30" maxlength="50" value="' . $row[0] . '" /></p>
<p>Definition:
<br />
<textarea name="definition" rows="5" cols="30" maxlength="225" value="' . $row[1] . '"></textarea></p>
<p>Alias:
<br />
<input type="text" name="alias" size="30" maxlength="50" value="' . $row[2] . '"  /> </p>
<p><input class="submit_button" type="submit" name="submit" value="Submit" /></p>
<input type="hidden" name="id" value="' . $id . '" />
</form>';

} 
else 
{ // Not a valid term ID.
	echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($con);
?>
</body>
</html>