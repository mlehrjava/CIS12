<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
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
	    <?php # Script 12.4 - loggedin.php
// The user is redirected here from login.php.

// If no cookie is present, redirect the user:
if (!isset($_COOKIE['userID'])) 
{

	// Need the functions:
	require ('IssKarLoginFunctions.inc.php');
	redirect_user();	

}

// Set the page title and include the HTML header:
$page_title = 'Logged In!';

// Print a customized message:
echo "<h1>Logged In!</h1>
<p>You are now logged in, {$_COOKIE['FirstName']}!</p>
<p><a href=\"IssKarLogout.php\">Logout</a></p>";

?>
    </div>
    <div class="right" id="background">
        
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>