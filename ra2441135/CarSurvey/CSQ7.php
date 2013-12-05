        <?php # CSQ7.php - Question 7
            // This Page Displays and handles Question 7.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 7';
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
        if (empty($_POST["color"]))
        {
            $answerErr = "Please Choose an Answer.";
        }
        
     
        
        



     if(empty($answerErr))
        {
            require ("CSConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_survey_entity_color (FirstName, LastName, color) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_POST[color]' )";
            
            //verify that VALUEs were inserted
            // Run the query.
            $r = @mysqli_query ($con, $sql); 
            if ($r) 
            { // If it ran OK.

                // Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR7.php">Click Here</a> to View Results for This Question,
		<br />
		or <a class="createaccount" href="CSQ8.php">Click Here</a> for the Next Question.</h3>';

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
                <h1>What Color is your Favorite on a Vehicle?</h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input type="radio" name="color" value="green"><span style="background-color:#2A6F1B">Green</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/0dn5eNy3zedd4/0x600.jpg"></td>
                <td id="favTxt"><input type="radio" name="color" value="white"><span style="background-color:#D6E1D9">White</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/0f65ggxcoD7vr/0x600.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="color" value="black"><span style="background-color:#10131E">Black</span></td> 
                <td id="favImg"><img width="300px" src="http://www.blessthisstuff.com/imagens/stuff/img_confederate_motorcycles_p120_fighter.jpg"></td>
                <<td id="favTxt"><input type="radio" name="color" value="silver"><span style="background-color:#B8B8B8">Silver</span></td> 
                <td id="favImg"><img width="300px" src="http://www.carsession.com/news/photos/Ford/2013-Ford-Atlas-Concept-revealed-in-Detroit-previews-the-future-F-150-pick-up-truck-54042703.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="color" value="gray"><span style="background-color:#5C5C5C">Gray</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/07fd4NP4mx3ZG/0x600.jpg"></td>
                <td id="favTxt"><input type="radio" name="color" value="red"><span style="background-color:#FA000C">Red</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/0acN9JF1jl2nu/0x600.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="color" value="blue"><span style="background-color:#227AE2">Blue</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/0dqF6Xe60V1AW/0x600.jpg"></td>
                <td id="favTxt"><input type="radio" name="color" value="brown"><span style="background-color:#6F4311">Brown</span></td> 
                <td id="favImg"><img width="300px" src="http://specials-images.forbesimg.com/imageserve/08hi0HA9swaWH/0x600.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input type="radio" name="color" value="yellow"><span style="background-color:#C5C804">Yellow</span></td> 
                <td id="favImg"><img width="300px" src="http://image.motortrend.com/f/roadtests/suv/9250526/112_0604_28z_snow%2B2007_toyota_fj_cruiser%2Bfront_view.jpg"></td>
                <td id="favTxt"><input type="radio" name="color" value="other"><span style="background-color:#AD04C8">Other</span></td> 
                <td id="favImg"><img width="300px" src="http://st.gdefon.com/wallpapers_original/wallpapers/422410_McLarenchernyj_fon_raduga_avtomobili_mashiny_avto_2560x1600_(www.GdeFon.ru).jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
    <?php include ('CSFooter.inc.html'); ?>