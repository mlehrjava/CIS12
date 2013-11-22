<?php # IssKarAU.php - About Us
// This page displays information about the Dojo.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'About Us';
$bgImg = 'http://www.jerseykarate.com/Megami.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>
<h1 style="font-size:30px;">For those of you that don't know "US" here is a brief description of our Dojo:</h1>
        <p style="font-size:26px">We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
        <iframe class="locIframe" width="300" height="300" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.com/maps?client=firefox-a&amp;q=68225+ramon+rd.+cathedral+city&amp;ie=UTF8&amp;hq=&amp;hnear=68225+Ramon+Rd,+Cathedral+City,+California+92234&amp;t=m&amp;ll=33.815595,-116.471643&amp;spn=0.021393,0.025749&amp;z=14&amp;iwloc=A&amp;output=embed"></iframe><br /><small><a class="locIframe" href="https://maps.google.com/maps?client=firefox-a&amp;q=68225+ramon+rd.+cathedral+city&amp;ie=UTF8&amp;hq=&amp;hnear=68225+Ramon+Rd,+Cathedral+City,+California+92234&amp;t=m&amp;ll=33.815595,-116.471643&amp;spn=0.021393,0.025749&amp;z=14&amp;iwloc=A&amp;source=embed" style="clear:both;">View Larger Map</a></small>
        <h2 style="font-size:30px;">We have several accomodations in our Dojo,</h2>
        <h2 style="font-size:30px;text-align:center;">Including:</h2>
        <br />
        <ul style="font-size:26px;">
        <li>5 Full Size Permanent Rings with enough space to Spar and Practice Self Defense in.</li>
        <br />
        <li>Mirrors to help make the use of our kata and weapons more comfortable and safe.</li>
        <br />
        <li>6 hanging bags</li>
        <br />
        <li>Rubber Floors</li>
        <br />
        <li>A room for consultation and counseling.</li>
        <br />
        <li>A room with a 12 inch thick foam floor for beginners to learn to fall properly without fear of hurting themselves.</li>
        <br />
        <li>Storage space for our required supplies.</li>
        <br />
        <li>Seperate Men's and Women's rest rooms with  Lockers.</li>
        <br />
        <li>Knife Throwing, and Zen Archery Range.</li>
        </ul>
<?php include('IssKarFooter.inc.html'); ?>