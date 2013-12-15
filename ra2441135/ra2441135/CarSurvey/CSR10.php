<?php # CSR10.php - Results 10
	// This Page Displays, Pagenates, and Sorts Results for Question 10.

	session_start(); // Start the session.
    // Set the page title and include the HTML header:
    $page_title = 'Results 10';
    include ('CSHeader.inc.html');
	
    // If no session value is present, redirect the user:
    if (!isset($_SESSION['userID'])) 
    {
    	// Need the functions:
        require ('CSLoginFunctions.inc.php');
        redirect_user();    
    }
?>
<div id="content">
<?php
echo '<h1>If you Could have any Fictional Vehicle,
<br />
What would it be?</h1>
<br />
<h2>Results:<h2>';
require_once ('CSConnect.php');

// Number of records to show per page:
$display = 10;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric ($_GET['p'])) 
{ // Already been determined.

	$pages = $_GET['p'];

} 
else
{ // Need to determine.

	// Count the number of records:
	$q = "SELECT COUNT(fVehicle) FROM ra2441135_survey_entity_fictional";
	$r = @mysqli_query ($con, $q);
	$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
	$records = $row[0];

	// Calculate the number of pages...
	if ($records > $display)
	{ // More than 1 page.
		$pages = ceil ($records/$display);
	}
	else
	{
		$pages = 1;
	}

} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric ($_GET['s']))
{
	$start = $_GET['s'];
}
else
{
	$start = 0;
}


// Define the query:
$q = "SELECT fVehicle
      	FROM ra2441135_survey_entity_fictional
		LIMIT $start, $display";
$r = @mysqli_query ($con, $q);

// Table header:
echo "<table align='center' cellspacing='0' cellpadding='5' width='50%' style='color:#EAEFDC;background-color:#515945;''>
<tr>
<td align='center'><b>Fictional Vehicle</b></td>
</tr>";

// Fetch and print all the records....

$bg = '#515945'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
{

	$bg = ($bg=='#515945' ? '#AFC388' : '#515945'); // Switch the background color.

	echo '<tr bgcolor="' . $bg . '">
	<td align="center">' . $row['fVehicle'] . '</td>
	</tr>';

} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($con);

// Make the links to other pages, if necessary.
if ($pages > 1) 
{

	// Add some spacing and start a paragraph:
	echo '<br /><p>';

	// Determine what page the script is on:
	$current_page = ($start/$display) + 1;

	// If it's not the first page, make a Previous link:
	if ($current_page != 1) 
	{
		echo '<a class="PagenateLink" href="CSR10.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) 
	{
		if ($i != $current_page) 
		{
			echo '<a class="PagenateLink" href="CSR10.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		}
		else
		{
			echo $i . ' ';
		}
	} // End of FOR loop.

// If it's not the last page, make a Next button:
	if ($current_page != $pages) 
	{
		echo '<a class="PagenateLink" href="CSR10.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}

	echo '</p>'; // Close the paragraph.

} // End of links section.
?>
<br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSHome.php';">Home Page</button>
  
<?php include('CSFooter.inc.html'); ?>
