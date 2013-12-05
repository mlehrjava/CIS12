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
        <a href="IssKarSU.html"><img id="signupImg" src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
	<a class="signin" href="IssKarSI.php">Sign In</a>
        <img id="titleImg2" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
    </div>
    <div class="left">
        <ul>
            <li><a class="linkbar" href="IssKarSSaP.html">School Schedule and Price</a></li>
            <br />
            <li><a class="linkbar" href="IssKarSU.html">Sign Up!</a></li>
            <br />
            <li><a class="linkbar" href="IssKarCA.html">Create Account</a></li>
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
	    <?php # Script 9.4 - IssKarVU.php
    // This script retrieves all the records from the users table.

    $page_title = 'View the Current Users';

    // Page header:
    echo '<h1>Registered Users</h1>';

    require ('IssKarConnect.php'); // Connect to the db.
		
    // Make the query:
    $q = "SELECT LastName, FirstName, DATE_FORMAT(RegistrationDate, '%M %d, %Y') AS dr, userID FROM ra2441135_isskar_entity_users ORDER BY RegistrationDate ASC";		
    $r = @mysqli_query ($con, $q); // Run the query.
    // Count the number of returned rows:
    $num = mysqli_num_rows($r);
    if ($num > 0) 
    { // If it ran OK, display the records.
        echo "<p>There are currently $num registered users.</p>\n";
	    // Table header.
	    echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
        <tr>
        <td align="left"><b>Edit</b></td>
        <td align="left"><b>Delete</b></td>
        <td align="left"><b>Last Name</b></td>
        <td align="left"><b>First Name</b></td>
        <td align="left"><b>Date Registered</b></td>
        </tr>';
	
	    // Fetch and print all the records:
	    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
	    {
		    echo '<tr>
		    <td align="left"><a href="EditUser.php?id=' . $row['userID'] . '">Edit</a></td>
            <td align="left"><a href="DeleteUser.php?id=' . $row['userID'] . '">Delete</a></td>
		    <td align="left">' . $row['LastName'] . '</td>
		    <td align="left">' . $row['FirstName'] . '</td>
		    <td align="left">' . $row['dr'] . '</td>
		    </tr>';
	    }

	    echo '</table>'; // Close the table.
	
	    mysqli_free_result ($r); // Free up the resources.	

    }
    else
    { // If no records were returned.

	    // Public message:
	    echo '<p class="error">There are currently no registered users.</p>';
	
	    // Debugging message:
	    echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $q . '</p>';
	
    } // End of if ($r) IF.

    mysqli_close($con); // Close the database connection.

    ?>
    </div>
    <div class="right" id="background">
        
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>