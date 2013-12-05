<?php # IssKarSSaP.php - School Schedule and Prices
// This page displays a The Schools Schedule and Prices, it is the HOME PAGE.


// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Isshinryu Karate!';
$bgImg = 'http://www.sfisshinryu.com/wp-content/themes/smallbiz/images/HomeImage.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>
<table valign="top" style="height:100%; width:100%;">
        <tr>
        <th colspan="2">
            <h1 style="text-align:center;">School Schedule and Price</h1>
        </th>
        </tr>
        <tr>
        <td>
        <h2 id="heading2">Children 4 Years and Older Classes:</h2>
        <p>Tuesdays and Thursdays</p>
        <br />
        <p>5:00 PM - 6:00 PM</p>
        <br />
        <p>OR</p>
        <br />
        <p>6:00 PM - 7:00 PM</p>
        <br />
        <p>OR</p>
        <br />
        <p>5:00 PM - 7:00 PM with <span style="color:#cc0200"><u><b>NO</b></u> ADDED COST</span> for extra hour!!!</p>
        <br />
        <h2 id="heading2">Adults Only Classes:</h2>
        <br />
        <p>Tuesdays and Thursdays</p>
        <br />
        <p>7:00 PM - 8:00 PM</p>
        <hr />
        <h2 id="heading2">Prices:</h2>
        <p>$99.00 Per Month.</p>
        <br />
        <p>Free Uniform</p>
        <br />
        <p>Free Trial Class</p>
        <br />
        <p>No Contracts</p>
        <br />
        <p>Veteran Receive 3 Months Free</p>
        <br />
        <p>Ask About Special Family Rates</p>
        <br />
        <p>New Students Are Starting Every Week</p>
        <br />
        </td>
        <td valign="top" style="text-align:center; font-size:36px;"><h2>Click Here to Sign Up!</h2>
        <br />
            <a href="IssKarSU.php"><img  src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
        </td>
        </tr>
        </table>
<?php include ('IssKarFooter.inc.html'); ?>