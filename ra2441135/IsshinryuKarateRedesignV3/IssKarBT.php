<?php # IssKarBT.php - Belt Testing
// This page displays a list of people with upcoming Belt Tests.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Belt Testing';
$bgImg = 'http://www.centurymartialarts.com/portals/0/Images/Products/13012-010-LG.JPG';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>

<h1><span style="background-color:#FFFFFF; color:#000000">White Belts</span> Testing on</h1>
        <h2>Tuesday, August 20th:</h2>
        <ul>
            <li>Juan</li>
            <li>Dominic</li>
            <li>Marissa</li>
            <li>Faith</li>
        </ul>
        <h1><span style="background-color:#F4FA29; color:#000000">Yellow Belts</span> Testing on</h1>
        <h1><span style="background-color:#FA7B29; color:#000000">Orange Belts</span> Testing on</h1>
        <h1><span style="background-color:#398320; color:#000000">Green Belts</span> Testing on</h1>
        <h2>Tuesday, August 20th:</h2>
        <ul>
            <li>Denise</li>
        </ul>
        <h1><span style="background-color:#A35514; color:#000000">Brown Belts</span> Testing on</h1>
        <ul>
            <li>Gracie</li>
        </ul>
        <h1><span style="background-color:#000000; color:#FFFFFF;">Black Belts</span> Testing on</h1>
        
<?php include('IssKarFooter.inc.html');?>