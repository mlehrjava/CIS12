        <?php # CSQ6.php - Question 6
            // This Page Displays and handles Question 6.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 6';
            include ('CSHeader.inc.html');

            // If no session value is present, redirect the user:
            if (!isset($_SESSION['userID'])) 
            {
                // Need the functions:
                require ('CSLoginFunctions.inc.php');
                redirect_user();    
            }
        ?>
        <div id="content">
        <?php

            
                // define variables and set to empty values
    $answerErr =  "";
    $answer = "";
    

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($_POST["roadtrip"]))
        {
            $answerErr = "Please Choose an Answer.";
        }
        
     
        
        



     if(empty($answerErr))
        {
            require ("CSConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_survey_entity_roadtrip (FirstName, LastName, roadtrip) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_POST[roadtrip]' )";
            
            //verify that VALUEs were inserted
            // Run the query.
            $r = @mysqli_query ($con, $sql); 
            if ($r) 
            { // If it ran OK.

                // Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR6.php">Click Here</a> to View Results for This Question,
		<br />
		or <a class="createaccount" href="CSQ7.php">Click Here</a> for the Next Question.</h3>';
            }
            else
            { // If it did not run OK.
    
                // Public message:
                echo '<h1>System Error</h1>
                <p class="error">Your answer could not be processed due to a system error.</p>'; 
    
                // Debugging message:
                echo '<p>' . mysqli_error($con) . '<br /><br />Query: ' . $sql . '</p>';
                
            } // End of if ($r) IF.
            
            
                
                //echo "1 record added";
                //close connection
                mysqli_close($con);

                // Include the footer and quit the script:
                include ('CSFooter.inc.html'); 
                exit();
            
        }
        else
        {
        echo '<h1 class="error">Error!</h1>';
        
        echo '<p class="error">Please Try Again.</p><p><br /></p>';
        }
    }
        ?>
        <h1>What Class of Car Would You Take
        <br />
        On A Cross-Country Road Trip?
        </h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input type="radio" name="roadtrip" value="sportscar">Sports Car</td> 
                <td id="favImg"><img width="300px" src="http://1.bp.blogspot.com/-PfJDbWWgoXo/UnFGFtI_MfI/AAAAAAAAXpQ/WaWlcRh41JQ/s1600/photo+1-3.JPG"></td>
                <td id="favTxt"><input type="radio" name="roadtrip" value="luxury">Luxury</td> 
                <td id="favImg"><img width="300px" src="http://www.theautochannel.com/news/2011/06/28/538830-bentley-mulsanne-takes-grand-tour-to-its-namesake-french-town.2-lg.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="roadtrip" value="compact">Compact</td> 
                <td id="favImg"><img width="300px" src="http://www.smartcarofamerica.com/gallery/displayimage.php?imageid=9575"></td>
                <td id="favTxt"><input type="radio" name="roadtrip" value="pickup">Pickup</td> 
                <td id="favImg"><img width="300px" src="http://farm8.staticflickr.com/7421/9057082802_310a9f806c_z.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="roadtrip" value="supercar">Super Car</td> 
                <td id="favImg"><img width="300px" src="http://fast.swide.com/wp-content/uploads/2013/11/Grand-tour-italy-holidays-ferrari-lamborghini-540x317-cover-horizontal.jpg"></td>
                <td id="favTxt"><input type="radio" name="roadtrip" value="suv">SUV</td> 
                <td id="favImg"><img width="300px" src="http://news.cnet.com/i/bto/20090730/Audi_in_Glacier_610x405.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="roadtrip" value="motorcycle">Motorcycle</td> 
                <td id="favImg"><img width="300px" src="http://www.motorcycle.com/images/content/Event/Utah-3-.jpg"></td>
                <td id="favTxt"><input type="radio" name="roadtrip" value="muscle">Muscle</td> 
                <td id="favImg"><img width="300px" src="http://2.bp.blogspot.com/-KRd1x5qQ6Cc/UX5hyrMEexI/AAAAAAAAPNs/vA3Ql2cagpQ/s1600/Woodward+Dream+Cruise+in+Detroit.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="roadtrip" value="van">Van</td> 
                <td id="favImg"><img width="300px" src="http://www.yellowstoneexpeditions.com/images/photos/snowvans/hayden_van.jpg"></td>
                <td id="favTxt"><input type="radio" name="roadtrip" value="jeep">Jeep</td> 
                <td id="favImg"><img width="300px" src="http://images-2.drive.com.au/2011/09/30/2661013/Outbackcomparo-16-408x264.jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
    <?php<?php include ('CSFooter.inc.html'); ?>