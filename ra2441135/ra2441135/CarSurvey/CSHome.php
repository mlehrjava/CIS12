    <?php #CSHome.php - Car Survey Home Page
    //This Page Displays the Home Page to the Car Survey
    session_start(); // Start the session.
    $page_title="Vehicle Survey";
    include ('CSHeader.inc.html');
?>
<div id="content">
        <div id="banner">
            
            <div id="bannerTxt1">
                <p>There are Many Different Types of Road Vehicles in the World today.</p>
            </div>
            <div id="bannerImg1">
                <img height="400px" src="images/GreenLambo.jpg">
            </div>
            <div id="bannerImg2">
                <img height="400px" src="images/GreenKawasaki.jpg">
            </div>
            <div id="bannerTxt2">
                <p>They Vary from Year to Year. Different Type, Size, Class, Make, Model, and even Trim.</p>
            </div>
            <div id="bannerTxt3">
                <p>Please Take this Survey and Tell Us Which You Prefer.</p>
            </div>
            <div id="bannerImg3">
                <img height="400px" src="images/GreenConceptTruck.jpg">
            </div>
            <a  href="CSLogin.php"><img id="gobutton" src="images/GreenGoButton.png"></a>
        </div>
<?php include ('CSFooter.inc.html'); ?>