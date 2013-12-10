<?php # IssKarSSaP.php - School Schedule and Prices
    // This page displays a The Schools Schedule and Prices, it is the HOME PAGE.


    // Start Session Before Sending Anything to Server
    session_start();
    $page_title = 'Access Denied!';
    $bgImg = 'images/AccessDenied.jpg';
    include ('IssKarHeader.inc.html');
    include ('IssKarNavbar.inc.html');
?>
    <h1 style="font-size:48; text-align:center;" class="error">Access Denied!!!
    <br />
    You Are NOT an ADMIN of this SITE!!!</h1>


<?php include ('IssKarFooter.inc.html'); ?>