<?php
// Start Session Before Sending Anything to Server
session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<style>
    	.PagenateLink
		{
			color:white;
    		text-decoration:none;
    		font-family:sans-serif;
			
		}
		.PagenateLink:hover
		{
			font-weight:bold;
		}
		.sortLink
		{
    		color:#FFFFFF;
    		text-decoration:none;
		}
		.sortLink:hover
		{
			font-size:18px;
		}
    </style>
</head>
<body>
<div id="main">

<?php # IssKarTerms.php - List of Terms for Users
// This page displays a list of terms.

 require_once ('IssKarConnect.php');

// Number of records to show per page:
$display = 10;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric ($_GET['p'])) { // Already been determined.

$pages = $_GET['p'];

} else { // Need to determine.

// Count the number of records:
$q = "SELECT COUNT(termId) FROM ra2441135_isskar_entity_terminology";
$r = @mysqli_query ($con, $q);
$row = @mysqli_fetch_array ($r, MYSQLI_NUM);
$records = $row[0];

// Calculate the number of pages...
if ($records > $display) { // More than 1 page.
$pages = ceil ($records/$display);
} else {
$pages = 1;
}

} // End of p IF.

// Determine where in the database to start returning results...
if (isset($_GET['s']) && is_numeric ($_GET['s'])) {
$start = $_GET['s'];
} else {
$start = 0;
}

// Determine the sort...
// Default is by registration date.
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 't';

// Determine the sorting order:
switch ($sort) {
	case 't':
		$order = 'term ASC';
		break;
	case 'd':
		$order = 'definition ASC';
		break;
	case 'a':
		$order = 'alias ASC';
		break;
	default:
		$order = 'term ASC';
		$sort = 't';
		break;
}
	
	$q = "SELECT * FROM ra2441135_isskar_entity_terminology ORDER BY $order LIMIT $start, $display";
	$r = @mysqli_query ($con, $q);

// Table header:
echo "<table align='center' cellspacing='0' cellpadding='5' width='75%'border='1' style='border:white 1px solid; color:white;background-color:black;'>
<tr>
<td align='left'><a class='sortLink' href='IssKarTerms.php?sort=t'><b>Term</b></a></td>
<td align='left'><a class='sortLink' href='IssKarTerms.php?sort=d'><b>Definition</b></a></td>
<td align='left'><a class='sortLink' href='IssKarTerms.php?sort=a'><b>Alias</b></a></td>
</tr>
";

// Fetch and print all the records....

$bg = '#000000'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

$bg = ($bg=='#000000' ? '#999999' : '#000000'); // Switch the background color.

echo '<tr bgcolor="' . $bg . '">
<td align="left">' . $row['term'] . '</td>
<td align="left">' . $row['definition'] . '</td>
<td align="left">' . $row['alias'] . '</td>
</tr>';

} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($con);

// Make the links to other pages, if necessary.
if ($pages > 1) {

// Add some spacing and start a paragraph:
echo '<br /><p style="color:#999999;font-family:sans-serif;">';

// Determine what page the script is on:
$current_page = ($start/$display) + 1;

// If it's not the first page, make a Previous link:
if ($current_page != 1) {
echo '<a class="PagenateLink" href="IssKarTerms.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
}
// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
if ($i != $current_page) {
echo '<a class="PagenateLink" href="IssKarTerms.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
} else {
echo $i . ' ';
}
} // End of FOR loop.

// If it's not the last page, make a Next button:
if ($current_page != $pages) {
echo '<a class="PagenateLink" href="IssKarTerms.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
}

echo '</p>'; // Close the paragraph.

} // End of links section.

?> 


</div>
</body>
</html> 