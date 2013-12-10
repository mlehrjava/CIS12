<?php # CSAccessDenied.php - Access Denied
    // This page is displayed if a user tried to log into admin area and was redirected.

    // Start Session Before Sending Anything to Server
    session_start();
    $page_title = 'Access Denied!';
    $bgImg = 'images/AccessDenied.jpg';
    include ('CSHeader.inc.html');
?>
<header><style>#content{background:url(images/AccessDenied.jpg)no-repeat;}</style></header>
    <h1 style="font-size:48; text-align:center;" class="error">Access Denied!!!
    <br />
    You Are NOT an ADMIN of this SITE!!!</h1>


<?php include ('CSFooter.inc.html'); ?>