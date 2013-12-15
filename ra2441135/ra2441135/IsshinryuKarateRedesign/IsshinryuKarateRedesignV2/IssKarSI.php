<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="phpstylesheet.css">
    <title>Isshinryu Karate</title>
    <style>
        #background
        {
            background-image:url

("http://www.thealmightyguru.com/Database/Pictures/Karate.jpg");
        }
        h1
        {
            text-align:center;
            font-size:42px;
        }
        p
        {
            font-size:36px;
            
        }
        form
        {
            margin: 0 auto auto 30%;
        }
        .error
        {
            margin:0px auto auto 60%;
            font-size:24px;
        }
    </style>
</head>
<body>
    <div id="header">
        <img id="titleImg1" src="http://isshinryu-

karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
        <marquee width="750" height="73" align="bottom" loop="65" scrollamount="10">Welcome to our <span style=color:#ff0000;>Dojo</span> in Cathedral City California ---- Sensei Sandubrae ---- Sensei McConnell ---- Sensei Tweedie  ---- Sensei Doster ---- Mr Kendel ---- Mr Manger ---- Mr G Petersen ---- Mr M Peterson ---- Mr Caballero ---- Mr Mota ---- </marquee>
        <a href="IssKarSU.html"><img id="signupImg"src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
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
            <li><a class="linkbar" href="IssKarAH.html">Sensei's Awards and 

Honors</a></li>
            <br />
            <li><a class="linkbar" href="IssKarBB.html">Active, Regularly Attending 

Black Belts</a></li>
            <br />
            <li><a class="linkbar" href="IssKarT.php">Terminology</a></li>
        </ul>
    </div>
    <div class="right" id="background">
        
    </div>
    <div class="right">
    <h1>Please Enter Your User Name and Password</h1>
        
        <?php
// define variables and set to empty values
$emailErr = $passwordErr = "";
$email = $password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
    if (empty($_POST["email"]))
    {
        $UserNameErr = "Email Adress is Required";
    }
    if (empty($_POST["pass"]))
    {
        $passwordErr = "Password is Required";
    }
}
function test_input($data)
{
     $data = trim($data);
     $data = stripslashes($data);
     $data = htmlspecialchars($data);
     return $data;
}
?>
<p><span class="error">* required field.</span></p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
    Username:
    <br />
    <input class="input_field" type="text" name="UserName" value="<?php echo $UserName;?>">
   <span class="error">* <?php echo $UserNameErr;?></span>
    <br />
    Password:
    <br />
    <input class="input_field" type="password" name="LastName" value="<?php echo $password;?>">
    <span class="error">* <?php echo $LastNameErr;?></span>
    <br /><br />
    <input class="submit_button" type="submit" value="Submit" name="submit">
</form>

if(empty($_POST['submit']))
		{
			echo "";
		}
		else
		{
		    echo "You are Signed In.";
        }

    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location 

href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral

+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral 

City, Ca.</a></p>
    </div>
</body>
</html>