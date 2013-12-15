<?php # DeleteTerm.php - Delete a Term
// This page is for deleting a Term.
// This page is accessed through IssKarAdminTerms.php.

$page_title = 'Delete a Term';
echo '<h1>Delete a Term</h1>';

// Check for a valid termId, through GET or POST:
if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) 
{ // From IssKarAdminTerms.php
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
		$q = "DELETE FROM ra2441135_isskar_entity_terminology WHERE termId=$id LIMIT 1";		
		$r = @mysqli_query ($con, $q);
		if (mysqli_affected_rows($con) == 1) 
		{ // If it ran OK.

			// Print a message:
			echo '<p>The Term has been Deleted.</p>';	

		} 
		else
		{ // If the query did not run OK.
			echo '<p class="error">The Term could NOT be Deleted due to a system error.</p>'; // Public message.
			echo '<p>' . mysqli_error($con) . '<br />Query: ' . $q . '</p>'; // Debugging message.
		}
	
	} 
	else
	{ // No confirmation of deletion.
		echo '<p>The Term has NOT been deleted.</p>';	
	}

} 
else
{ // Show the form.

	// Retrieve the user's information:
	$q = "SELECT term FROM ra2441135_isskar_entity_terminology WHERE termId=$id";
	$r = @mysqli_query ($con, $q);

	if (mysqli_num_rows($r) == 1) 
	{ // Valid user ID, show the form.

		// Get the user's information:
		$row = mysqli_fetch_array ($r, MYSQLI_NUM);
		
		// Display the record being deleted:
		echo "<h3>Term Name: $row[0]</h3>
		Are you sure you want to Delete this Term?";
		
		// Create the form:
		echo '<form action="IssKarDeleteTerm.php" method="post">
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