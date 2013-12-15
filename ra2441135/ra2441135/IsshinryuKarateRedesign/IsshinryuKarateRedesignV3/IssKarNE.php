<?php # IssKarNE.php - News and Events
// This page displays the News and Events.


// Start Session Before Sending Anything to Server
session_start();
$page_title = 'News and Events!';
$bgImg = 'images/NE.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>
    <h1>News and Events!</h1>
    <hr />
    <p>We Had a Blast at the BBQ out in the Desert.
    <br />
    Thanks to All Who Came out to Participate.
    <br />
    And to All of Those Who Couldn't Make it, We Missed You.
    <br />
    And we Hope to See You at our Next Event.
    </p>
    <?php include ('IssKarPictures.inc.php') ?>
    <br />
    <h2>Upcoming Events:</h2>
    <hr />
    <p>Upcoming Events TBD.</p>

<?php include ('IssKarFooter.inc.html'); ?>