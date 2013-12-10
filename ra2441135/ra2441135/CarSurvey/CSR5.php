<?php # CSR5.php - Results 5
	// This Page Displays, Pagenates, and Sorts Results for Question 5.

	session_start(); // Start the session.
    // Set the page title and include the HTML header:
    $page_title = 'Results 5';
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
echo '<h1>If Money Was Not an Object,
<br />
Which Vehicle Would You Want to Have?</h1>
<h2>Results</h2>';
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
	$q = "SELECT COUNT(make) FROM ra2441135_survey_entity_dreamcar";
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

// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'make';

// Determine the sorting order:
switch ($sort) 
{
	case 'make':
		$order = 'make ASC';
		break;
	case 'model':
		$order = 'model ASC';
		break;
	default:
		$order = 'make ASC';
		$sort = 'make';
		break;
}
// Define the query:
$q = "SELECT make, model
      	FROM ra2441135_survey_entity_dreamcar
      	ORDER BY $order
		LIMIT $start, $display";
$r = @mysqli_query ($con, $q);

// Table header:
echo "<table align='center' cellspacing='0' cellpadding='5' width='75%' border='1' style='color:#EAEFDC;background-color:#515945;>
<tr>
<th align='left'><a class='sortLink' href='CSR5.php?sort=make'></a></th>
<th align='left'><a class='sortLink' href='CSR5.php?sort=make'>Make</a></th>
<th align='left'><a class='sortLink' href='CSR5.php?sort=model'><b>Model</b></a></th>
</tr>";

// Fetch and print all the records....

$bg = '#515945'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) 
{

	$bg = ($bg=='#515945' ? '#AFC388' : '#515945'); // Switch the background color.

	echo '<tr bgcolor="' . $bg . '">
	<td align="left">' . $row['make'] . '</td>
	<td align="left">' . $row['model'] . '</td>
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
		echo '<a class="PagenateLink" href="CSR5.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
	}
	// Make all the numbered pages:
	for ($i = 1; $i <= $pages; $i++) 
	{
		if ($i != $current_page) 
		{
			echo '<a class="PagenateLink" href="CSR5.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
		}
		else
		{
			echo $i . ' ';
		}
	} // End of FOR loop.

// If it's not the last page, make a Next button:
	if ($current_page != $pages) 
	{
		echo '<a class="PagenateLink" href="CSR5.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
	}

	echo '</p>'; // Close the paragraph.

} // End of links section.
?>
<br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ6.php';">Next Question</button>
  
<?php include('CSFooter.inc.html'); ?>
