<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="../stylesheet.css">
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
        <a href="IssKarSU.html"><img id="signupImg" src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
        <img id="titleImg2" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
    </div>
    <div class="left">
        <ul>
            <li><a class="linkbar" href="IssKarSSaP.html">School Schedule and Price</a></li>
            <br />
            <li><a class="linkbar" href="IssKarSU.html">Sign Up!</a></li>
            <br />
            <li><a class="linkbar" href="IssKarBT.html">Belt Testing</a></li>
            <br />
            <li><a class="linkbar" href="IssKarAU.html">About Us</a></li>
            <br />
            <li><a class="linkbar" href="IssKarSB.html">Sensei's Biography</a></li>
            <br />
            <li><a class="linkbar" href="IssKarAH.html">Sensei's Awards and Honors</a></li>
            <br />
            <li><a class="linkbar" href="IssKarBB.html">Active, Regularly Attending Black Belts</a></li>
            <br />
            <li><a class="linkbar" href="IssKarT.html">Terminology</a></li>
        </ul>
    </div>
    <div class="right">
    <h1>List of Users</h1>
    <!-------- use this as alias example 
    SELECT o.OrderID, e.LastName+', '+e.FirstName AS Name,  o.OrderDate
FROM Orders AS o
INNER JOIN Employees AS e
ON o.EmployeeID=e.EmployeeID; -->
        <!-- Insert data from form into Database -->
    <?php # Script 10.4 - view_users.php #4
// This script retrieves all the records from the users table.
// This new version paginates the query results.

 $page_title = 'View the Current Users';
 echo '<h1>Registered Users</h1>';

 require_once ('IssKarConnect.php');

// Number of records to show per page:
$display = 10;

// Determine how many pages there are...
if (isset($_GET['p']) && is_numeric ($_GET['p'])) { // Already been determined.

$pages = $_GET['p'];

} else { // Need to determine.

// Count the number of records:
$q = "SELECT COUNT(user_id) FROM ra2441135_isskar_entity_users";
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

// Define the query:
$q = "SELECT u.UserName, CONCAT(s.LastName,', ',s.FirstName) AS Name, CONCAT (s.ChildLastName,', ',s.ChildFirstName) AS 'ChildName', s.email, s.times
        FROM ra2441135_isskar_entity_users AS u
        INNER JOIN ra2441135_isskar_entity_students AS s
        ON (u.FirstName, u.LastName)=(s.FirstName, s.LastName)
		ORDER BY UserName ASC
		LIMIT $start, $display";
$r = @mysqli_query ($con, $q);

// Table header:
echo "<table align='center' cellspacing='0' cellpadding='5' width='75%' style='border:white 1px solid; color:white;'>
<tr>
<td align='left'><b>Username</b></td>
<td align='left'><b>Name</b></td>
<td align='left'><b>Child Name</b></td>
<td align='left'><b>Email</b></td>
<td align='left'><b>Time of Trial Class</b></td>
</tr>
";

// Fetch and print all the records....

$bg = '#000000'; // Set the initial background color.

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {

$bg = ($bg=='#000000' ? '#999999' : '#000000'); // Switch the background color.

echo '<tr bgcolor="' . $bg . '">
<td align="left">' . $row['UserName'] . '</td>
<td align="left">' . $row['Name'] . '</td>
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
echo '<a href="IssKarUsers.php?s=' . ($start - $display) .
'&p=' . $pages . '">Previous</a> ';
}
// Make all the numbered pages:
for ($i = 1; $i <= $pages; $i++) {
if ($i != $current_page) {
echo '<a href="IssKarUsers.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '">' . $i . '</a> ';
} else {
echo $i . ' ';
}
} // End of FOR loop.

// If it's not the last page, make a Next button:
if ($current_page != $pages) {
echo '<a href="IssKarUsers.php?s=' . ($start + $display) . '&p=' . $pages . '">Next</a>';
}

echo '</p>'; // Close the paragraph.

} // End of links section.

?>
    </div>
    <div class="right" id="background">
        
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>