<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="phpstylesheet.css">
    <title>Isshinryu Karate</title>
    <style>
        #background
        {
            background-image:url("http://www.sfisshinryu.com/wp-content/themes/smallbiz/images/HomeImage.jpg");
        }
        p
        {
            font-size:50px;
            font-family:ariel, sans-serif;
            text-align:center;
            margin:50px 100px 50px 100px;
            line-height:2.0;
        }
        span
        {
        font-weight:bold;
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
        
        
        <!-- Insert data from form into Database -->
        <?php
        
            include ("IssKarConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_isskar_entity_students (FirstName, LastName, ChildFirstName, ChildLastName, times)
            VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[ChildFirstName]','$_POST[ChildLastName]','$_POST[times]')";
            //verify that VALUEs were inserted
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
                echo "We&#39;re Sorry, there was an error processing your information. Please click here to <a href='IssKarSU.html' style='text-decoration:none;font-weight:bold;color:#e71008;'>Try Again!</a>";
            }
            //Define and echo out welcome for new students
            $fName=$_POST["FirstName"];
            $lName=$_POST["LastName"];
            $cfName=$_POST["ChildFirstName"];
            $clName=$_POST["ChildLastName"];
            $times=$_POST["times"];
            
            if($cfName||$clName=true)
            {
                echo "<p>Welcome <span>$fName</span> and <span>$cfName</span>! We look forward to seeing you. You are scheduled for a Free Trial Class on <span>$times</span>.</p>";
            }
            else
            {
                echo "<p>Welcome <span>$fName</span>! We look forward to seeing you. You are scheduled for a Free Trial Class for <span>$times</span>.</p>";
            }
            //echo "1 record added";
            //close connection
            mysqli_close($con);
        ?>
    </div>
    <div class="right" id="background">
        
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>