<?php # IssKarSU.php - Sign Up
// This script creates a Sign Up form to be displayed and handled for new students wishing to attend a free trial class.

// Start Session Before Sending Anything to Server
session_start();
$page_title = 'Sign Up For Classes';
$bgImg = 'http://www.thealmightyguru.com/Database/Pictures/Karate.jpg';
include ('IssKarHeader.inc.html');
include ('IssKarNavbar.inc.html');
?>

<h1 style="text-align:center;">Sign Up for Classes!</h1>
        <h2 style="text-align:center;margin:0px 100px 0px 100px;">Once you have taken your Free Trial Class you may obtain the Super Secret Phrase and create an account <a class="createaccount" href="IssKarCA.php">HERE</a>.</h2>
      
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
     {$timesErr = "A Trial Class is required to be scheduled";}
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
    <input class="input_field" type="text" name="FirstName" value= " <?php echo $FirstName;?>">
   <span class="error">* <?php echo $FirstNameErr;?></span>
    <br />
    Last Name:
    <br />
    <input class="input_field" type="text" name="LastName" value="<?php echo $LastName;?>">
    <span class="error">* <?php echo $LastNameErr;?></span>
    <br />
    Child&#39;s First Name:
    <br />
    <input class="input_field" type="text" name="ChildFirstName" value="<?php echo $ChildFirstName;?>">
    <span class="error"><?php echo $ChildFirstNameErr;?></span>
    <br />
    Child&#39;s Last Name:
    <br />
    <input class="input_field" type="text" name="ChildLastName" value="<?php echo $ChildLastName;?>">
    <span class="error"><?php echo $ChildLastNameErr;?></span>
    <br />
   E-mail:
   <br />
   <input class="input_field" type="text" name="email" value="<?php echo $email;?>">
    <span class="error">* <?php echo $emailErr;?></span>
   <br />
   Choose Day and Time of Your/Your Child&#39;s Free Trial Class:
   <br />
   <select class="input_field" name="times" selected"<?php echo $times;?>">
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
   <input class="submit_button" type="submit" value="Submit" name="submit">
</form>
<?php
        if(empty($_POST['submit']))
		{
			echo "";
		}
		else
		{
            include ("IssKarConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_isskar_entity_students (FirstName, LastName, ChildFirstName, ChildLastName, email, times)
            VALUES ('$_POST[FirstName]','$_POST[LastName]','$_POST[ChildFirstName]','$_POST[ChildLastName]','$_POST[email]','$_POST[times]')";
            //verify that VALUEs were inserted
            if (!mysqli_query($con,$sql))
            {
                die('Error: ' . mysqli_error($con));
                echo "We&#39;re Sorry, there was an error processing your information. 

Please click here to <a href='IssKarSU.php' style='text-decoration:none;font-weight:bold;color:#e71008;'>Try Again!</a>";
            }
            //Define and echo out welcome for new students
            $fName=$_POST["FirstName"];
            $lName=$_POST["LastName"];
            $cfName=$_POST["ChildFirstName"];
            $clName=$_POST["ChildLastName"];
            $times=$_POST["times"];
            
            if(null!==($cfName||$clName))
            {
                echo "<p>Welcome <span>$fName</span> and <span>$cfName</span>! We look forward to seeing you.</p>";
            }
            else
            {
                echo "<p>Welcome <span>$fName</span>! We look forward to seeing you.</p>";
            }
            //echo "1 record added";
            //close connection
            mysqli_close($con);
		}
	include ('IssKarFooter.inc.html');
?>