        <?php # CSQ1.php - Question 1
            // This Page Displays and handles Question 1.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 1';
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
        if (empty($_POST["favtype"]))
        {
            $answerErr = "Please Choose an Answer.";
        }
        
     
        
        



     if(empty($answerErr))
        {
            require ("CSConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_survey_entity_favtype (FirstName, LastName, favtype) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_POST[favtype]' )";
            
            //verify that VALUEs were inserted
            // Run the query.
            $r = @mysqli_query ($con, $sql); 
            if ($r) 
            { // If it ran OK.

                // Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR1.php">Click Here</a> to View Results for This Question,
		<br />
		or <a class="createaccount" href="CSQ2.php">Click Here</a> for the Next Question.</h3>';

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
        <h1>What is your Favorite Type of Vehicle?</h1>
        <br />
        <form action='<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>' method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input type="radio" name="favtype" value="sportscar">Sports Car</td> 
                <td id="favImg"><img width="300px" src="http://sportstoday.us/image/082013/2013%20Scion%20FR-S%20-%20Into%20The%20Wild%20Green%20Yonder_3.jpg"></td>
                <td id="favTxt"><input type="radio" name="favtype" value="luxury">Luxury</td> 
                <td id="favImg"><img width="300px" src="http://www.freefever.com/stock/rolls-royce-cars-wallpaper.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="favtype" value="compact">Compact</td> 
                <td id="favImg"><img width="300px" src="http://farm3.staticflickr.com/2791/4181843058_3e78daabd1_o.jpg"></td>
                <td id="favTxt"><input type="radio" name="favtype" value="pickup">Pickup</td> 
                <td id="favImg"><img width="300px" src="http://www.barrett-jackson.com/staging/carlist/items/Fullsize/Cars/70746/70746_Front_3-4_Web.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="favtype" value="supercar">Super Car</td> 
                <td id="favImg"><img width="300px" src="http://carwithmeaning.com/wp-content/uploads/2013/09/The-McLaren-P1-Green-Goblin.jpg"></td>
                <td id="favTxt"><input type="radio" name="favtype" value="suv">SUV</td> 
                <td id="favImg"><img width="300px" src="http://image.trucktrend.com/f/multimedia/photogallery/163_2012_range_rover_evoque_photo_gallery/37747757/2012-Range-Rover-Evoque-front-view-in-motion.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="favtype" value="motorcycle">Motorcycle</td> 
                <td id="favImg"><img width="300px" src="http://farm5.staticflickr.com/4113/4965857867_1af69de87b_z.jpg"></td>
                <td id="favTxt"><input type="radio" name="favtype" value="muscle">Muscle Car</td> 
                <td id="favImg"><img width="300px" src="http://farm2.static.flickr.com/1080/577126432_87effe7de6_m.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="favtype" value="van">Van</td> 
                <td id="favImg"><img width="300px" src="http://www.advancedcarcreations.com/custom/astro/images/astro1.jpg"></td>
                <td id="favTxt"><input type="radio" name="favtype" value="jeep">Jeep</td> 
                <td id="favImg"><img width="300px" src="http://www.jeep.com/en/2012/wrangler/colorizer/rubicon/gecko_soft_top.jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
    <?php<?php include ('CSFooter.inc.html'); ?>