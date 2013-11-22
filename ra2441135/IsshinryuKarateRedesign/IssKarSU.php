<!DOCTYPE HTML>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="stylesheet.css">
    <title>Isshinryu Karate</title>
    <style>
        #background
        {
            background-image:url("http://www.thealmightyguru.com/Database/Pictures/Karate.jpg");
        }
    </style>
</head>
<body>
    <div id="header">
        <img id="titleImg1" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
        <marquee width="750" height="73" align="bottom" loop="65" scrollamount="10">  Welcome to our <span style=color:#ff0000;>Dojo</span> in Cathedral City California ---- Sensei Sandubrae ---- Sensei McConnell ---- Sensei Tweedie  ---- Sensei Doster ---- Mr Kendel ---- Mr Manger ---- Mr G Petersen ---- Mr M Peterson ---- Mr Caballero ---- Mr Mota ---- </marquee>
        <a href="IssKarSU.html"><img id="signupImg" src="https://www.tabsite.com/i/button_sign_up_now.jpg" /></a>
        <img id="titleImg2" src="http://isshinryu-karate.com/images/0ee079d2df5c99036753aff72348ba5b_a9hq.jpg" />
    </div>
    <div class="left">
        <ul>
            <li><a class="linkbar" href="IssKarSSaP.html">School Schedule and Price</a></li>
            <br />
            <li><a class="linkbar" href="IssKarSU.html">Sign Up!</a></li>
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
            <li><a class="linkbar" href="IssKarT.php">Terminology</a></li>
        </ul>
    </div>
    <div class="right" id="background">
        
    </div>
    <div class="right">
        <h1 style="text-align:center;">Sign Up for Classes!</h1>
      
<?php
// define variables and set to empty values
$FirstNameErr = $LastNameErr = $emailErr = $ChildFirstNameErr = $ChildLastNameErr = $timesErr = "";
$FirstName = $LastName = $ChildFirstName = $ChildLastName = $email = $times = "";

if ($_SERVER["REQUEST_METHOD"] == "POST")
{
   if (empty($_POST["FirstName"]))
     {$FirstNameErr = "First Name is required";}
   else
     {
     $FirstName = test_input($_POST["FirstName"]);
     // check if FirstName only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$FirstName))
       {
       $FirstNameErr = "Only letters and white space allowed";
       }
     }
     
     if (empty($_POST["LastName"]))
     {$LastNameErr = "Last Name is required";}
   else
     {
     $LastName = test_input($_POST["LastName"]);
     // check if LastName only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$LastName))
       {
       $LastNameErr = "Only letters and white space allowed";
       }
     }
     
    $ChildFirstName = test_input($_POST["ChildFirstName"]);
     // check if ChildFirstName only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$ChildFirstName))
       {
       $ChildFirstNameErr = "Only letters and white space allowed";
       
       }
    $ChildLastName = test_input($_POST["ChildLastName"]);
     // check if ChildLastName only contains letters and whitespace
     if (!preg_match("/^[a-zA-Z ]*$/",$ChildLastName))
       {
       $ChildLastNameErr = "Only letters and white space allowed";
       }
  
   if (empty($_POST["email"]))
     {$emailErr = "Email is required";}
   else
     {
     $email = test_input($_POST["email"]);
     // check if e-mail address syntax is valid
     if (!preg_match("/([\w\-]+\@[\w\-]+\.[\w\-]+)/",$email))
       {
       $emailErr = "Invalid email format";
       }
     }
	if (empty($_POST["times"]))
     {$emailErr = "A Scheduled Time is Required";}
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
    First Name:
    <br />
    <input class="input_field" type="text" name="FirstName" value="<?php echo $FirstName;?>">
   <span class="error">* <?php echo $FirstNameErr;?></span>
    <br />
    Last Name:
    <br />
    <input class="input_field" type="text" name="LastName" value="<?php echo $LastName;?>">
    <span class="error">* <?php echo $LastNameErr;?></span>
    <br />
    Child First Name:
    <br />
    <input class="input_field" type="text" name="ChildFirstName" value="<?php echo $ChildFirstName;?>">
    <span class="error"><?php echo $ChildFirstNameErr;?></span>
    <br />
    Child Last Name:
    <br />
    <input class="input_field" type="text" name="ChildLastName" value="<?php echo $ChildLastName;?>">
    <span class="error"><?php echo $ChildLastNameErr;?></span>
    <br />
   	E-mail: 
   	<br />
   	<input class="input_field" type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
    <br />
    Choose Day and Time of Your/Your Child's' Free Trial Class:
            <br />
            <select name="times">
                <option value=></option>
                <option value="Kids 4 Years and Older: Tuesday 5:00PM to 6:00PM">Kids 4 Years and Older: Tuesday 5:00PM to 6:00PM</option>
                <option value="Kids 4 Years and Older: Tuesday 6:00PM to 7:00PM">Kids 4 Years and Older: Tuesday 6:00PM to 7:00PM</option>
                <option value="Kids 4 Years and Older: Thursday 6:00PM to 7:00PM">Kids 4 Years and Older: Thursday 5:00PM to 6:00PM</option>
                <option value="Kids 4 Years and Older: Thursday 6:00PM to 7:00PM">Kids 4 Years and Older: Thursday 6:00PM to 7:00PM</option>
                <option value="Adults: Tuesday 7:00PM to 8:00PM">Adults: Tuesday 7:00PM to 8:00PM</option>
                <option value="Adults: Thursday 7:00PM to 8:00PM">Adults: Thursday 7:00PM to 8:00PM</option>
            </select>
            <span class="error">* <?php echo $timesErr;?></span>
   <br /><br />
   
   <input class="submit_button" name="submit" type="submit" value="Submit">
</form>
<?php
        
            include ("IssKarConnect.php");
			if(isset($_POST['submit']))
		{
			echo "";	
		}
		else
		{
            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_isskar_entity_students (FirstName, LastName, 

ChildFirstName, ChildLastName, times)
            VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[ChildFirstName]','$_POST[ChildLastName]','$_POST[times]')";
            //verify that VALUEs were inserted
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
                echo "We&#39;re Sorry, there was an error processing your information. 

Please click here to <a href='IssKarSU.html' style='text-decoration:none;font-

weight:bold;color:#e71008;'>Try Again!</a>";
            }
            //Define and echo out welcome for new students
            $fName=$_POST["FirstName"];
            $lName=$_POST["LastName"];
            $cfName=$_POST["ChildFirstName"];
            $clName=$_POST["ChildLastName"];
            $times=$_POST["times"];
            
            if($cfName||$clName=true)
            {
                echo "<p>Welcome <span>$fName</span> and <span>$cfName</span>! We look 

forward to seeing you. You are scheduled for a Free Trial Class on <span>

$times</span>.</p>";
            }
            else
            {
                echo "<p>Welcome <span>$fName</span>! We look forward to seeing you. 

You are scheduled for a Free Trial Class for <span>$times</span>.</p>";
            }
            //echo "1 record added";
            //close connection
            mysqli_close($con);
		}
?>
    
    </div>
    <div id="footer">
        <p id="contact">Contact us! Call 760-568 0961 We are located at <a id=location href=https://maps.google.com/maps?client=firefox-a&q=68225+ramon+rd.+cathedral+city&ie=UTF-8&ei=z8ZbUoKmNOWTiAKvmICQDw&ved=0CAgQ_AUoAg>68225 Ramon Rd. Cathedral City, Ca.</a></p>
    </div>
</body>
</html>