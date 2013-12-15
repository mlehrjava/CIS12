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
<?php # IssKarLoU.php - List of Users
// This page displays a list of users to the admin.
 
 include ('../IssKarHeader.inc.html');
 include ('../IssKarNavbar.inc.html');

 $page_title = 'View the Current Users';
 echo '<h1>Registered Users</h1>';

 require_once ('IssKarConnect.php');

// Number of records to show per page:
$display = 5;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric ($_GET['p'])) { // Already been determined.

$pages = $_GET['p'];

} else { // Need to determine.

// Count the number of records:
$q = "SELECT COUNT(userID) FROM ra2441135_isskar_entity_users";
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
$sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

// Determine the sorting order:
switch ($sort) {
	case 'ln':
		$order = 'LastName ASC';
		break;
	case 'fn':
		$order = 'FirstName ASC';
		break;
	case 'rd':
		$order = 'RegistrationDate ASC';
		break;
	case 'cn':
		$order = 'ChildName ASC';
		break;
	case 'e':
		$order = 'u.email ASC';
		break;
	case 't':
		$order = 's.times ASC';
		break;
	default:
		$order = 'RegistrationDate ASC';
		$sort = 'rd';
		break;
}
// Define the query:
$q = "SELECT u.userID, s.LastName, s.FirstName, CONCAT (s.ChildLastName,', ',s.ChildFirstName) AS 'ChildName', u.email, s.times, DATE_FORMAT(RegistrationDate, '%M %d, %Y') AS dr
        FROM ra2441135_isskar_entity_users AS u
        INNER JOIN ra2441135_isskar_entity_students AS s
        ON (u.FirstName, u.LastName)=(s.FirstName, s.LastName)
		ORDER BY $order
		LIMIT $start, $display";
$r = @mysqli_query ($con, $q);

// Table header:
echo "<table align='center' cellspacing='0' cellpadding='5' width='75%' border='1' style='border:white 1px solid; color:white;background-color:black;''>
<tr>
<td align='left'><b>Edit</b></td>
<td align='left'><b>Delete</b></td>
<td align='left'><b><a class='sortLink' href='IssKarLoU.php?sort=rd'>Date Registered</a></b></td>
<td align='left'><a class='sortLink' href='IssKarLoU.php?sort=ln'><b>Last Name</b></a></td>
<td align='left'><a class='sortLink' href='IssKarLoU.php?sort=fn'><b>First Name</b></a></td>
<td align='left'><a class='sortLink' href='IssKarLoU.php?sort=cn'><b>Child Name</b></a></td>
<td align='left'><a class='sortLink' href='IssKarLoU.php?sort=e'><b>Email</b></a></td>
<td align='left'><a class='sortLink' href='IssKarLoU.php?sort=t'><b>Time of Trial Class</b></a></td>
</tr>
";

// Fetch and print all the records....

$bg = '#000000'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

$bg = ($bg=='#000000' ? '#999999' : '#000000'); // Switch the background color.

echo '<tr bgcolor="' . $bg . '">
<td align="left"><a class="sortLink" href="EditUser.php?id=' . $row['userID'] . '">Edit</a></td>
<td align="left"><a class="sortLink" href="DeleteUser.php?id=' . $row['userID'] . '">Delete</a></td>
<td align="left">' . $row['dr'] . '</td>
<td align="left">' . $row['LastName'] . '</td>
<td align="left">' . $row['FirstName'] . '</td>
<td align="left">' . $row['ChildName'] . '</td>
<td align="left">' . $row['email'] . '</td>
<td align="left">' . $row['times'] . '</td>
</tr>';

} // End of WHILE loop.

echo '</table>';
mysqli_free_result ($r);
mysqli_close($con);

// Make the links to other pages, if necessary.
if ($pages > 1) {

// Add some spacing and start a paragraph:
echo '<br /><p>';

// Determine what page the script is on:
$current_page = ($start/$display) + 1;

// If it's not the first page, make a Previous link:
if ($current_page != 1) {
echo '<a class="PagenateLink" href="IssKarLoU.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a> ';
}
// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
if ($i != $current_page) {
echo '<a class="PagenateLink" href="IssKarLoU.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a> ';
} else {
echo $i . ' ';
}
} // End of FOR loop.

// If it's not the last page, make a Next button:
if ($current_page != $pages) {
echo '<a class="PagenateLink" href="IssKarLoU.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
}

echo '</p>'; // Close the paragraph.

} // End of links section.
include('../IssKarFooter.inc.html');

?>
