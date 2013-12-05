        <?php # CSQ4.php - Question 4
            // This Page Displays and handles Question 4.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 4';
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
        if (empty($_POST["leasttype"]))
        {
            $answerErr = "Please Choose an Answer.";
        }
        
     
        
        



     if(empty($answerErr))
        {
            require ("CSConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_survey_entity_leasttype (FirstName, LastName, leasttype) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_POST[leasttype]' )";
            
            //verify that VALUEs were inserted
            // Run the query.
            $r = @mysqli_query ($con, $sql); 
            if ($r) 
            { // If it ran OK.

                // Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR4.php">Click Here</a> to View Results for This Question,
		<br />
		or <a class="createaccount" href="CSQ5.php">Click Here</a> for the Next Question.</h3>';

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
        <h1>What is your Least Favorite Type of Vehicle?</h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input type="radio" name="leasttype" value="sportscar">Sports Car</td> 
                <td id="favImg"><img width="300px" src="http://www.gtspirit.com/wp-content/gallery/maserati-granturismo-mc-stradale-totaled-in-qatar/2012-06-23%20166.jpg"></td>
                <td id="favTxt"><input type="radio" name="leasttype" value="luxury">Luxury</td> 
                <td id="favImg"><img width="300px" src="http://www.carnewschina.com/wp-content/uploads/2012/02/rolls-royce-crash-china-jinghong-1-458x298.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="leasttype" value="compact">Compact</td> 
                <td id="favImg"><img width="300px" src="http://static.fjcdn.com/gifs/FOR+SCIENCE+.+That+s+one+way+to+get+rid+of+a_7c07b0_3747486.gif"></td>
                <td id="favTxt"><input type="radio" name="leasttype" value="pickup">Pickup</td> 
                <td id="favImg"><img width="300px" src="http://cjonline.com/sites/default/files/imagecache/superphoto/12649051.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="leasttype" value="supercar">Super Car</td> 
                <td id="favImg"><img width="300px" src="http://i.dailymail.co.uk/i/pix/2011/12/21/article-2076952-0F3DF6EC00000578-262_634x439.jpg"></td>
                <td id="favTxt"><input type="radio" name="leasttype" value="suv">SUV</td> 
                <td id="favImg"><img width="300px" src="http://www.newcar.nu/images/suv_wreck.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="leasttype" value="motorcycle">Motorcycle</td> 
                <td id="favImg"><img width="300px" src="http://www.dave911.com/ems/scenes/20060508_BFRS/BFRSe016_20060508_1148a400.jpg"></td>
                <td id="favTxt"><input type="radio" name="leasttype" value="muscle">Muscle</td> 
                <td id="favImg"><img width="300px" src="http://cdn.speednik.com/files/2012/07/parts_or_project.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="leasttype" value="van">Van</td> 
                <td id="favImg"><img width="300px" src="http://farm4.staticflickr.com/3455/3938360059_f25a04cdc8_z.jpg?zz=1"></td>
                <td id="favTxt"><input type="radio" name="leasttype" value="jeep">Jeep</td> 
                <td id="favImg"><img width="300px" src="http://i1118.photobucket.com/albums/k615/unlrubicon05/IMG_7010.jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
        <?php include ('CSFooter.inc.html'); ?>