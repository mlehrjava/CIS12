        <?php # CSQ9.php - Question 9
            // This Page Displays and handles Question 9.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 9';
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
        $e1=isset($_POST['performance']) ? 1:0;
        $e2=isset($_POST['extaesthetics']) ? 1:0;
        $e3=isset($_POST['intaesthetics']) ? 1:0;
        $e4=isset($_POST['power']) ? 1:0;
        $e5=isset($_POST['size']) ? 1:0;
        $e6=isset($_POST['manufacturer']) ? 1:0;
        $e7=isset($_POST['comfort']) ? 1:0;
        $e8=isset($_POST['fueleconomy']) ? 1:0;
        $e9=isset($_POST['safety']) ? 1:0;
        $e10=isset($_POST['rarity']) ? 1:0;

        if(empty($answerErr))
        {
            require ("CSConnect.php");

            //store INSERT INTO sql in a variable
            $sql="INSERT INTO ra2441135_survey_entity_importance (FirstName, LastName, performance, extaesthetics, intaesthetics, power, size, manufacturer, comfort, fueleconomy, safety, rarity) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$e1', '$e2', '$e3', '$e4', '$e5', '$e6', '$e7', '$e8', '$e9', '$e10')";
            
            //verify that VALUEs were inserted
            // Run the query.
            $r = @mysqli_query ($con, $sql); 
            if ($r) 
            { // If it ran OK.

                // Print a message:
                echo '<h3>Thank You, Please <a class="createaccount" href="CSR9.php">Click Here</a> to View Results for This Question,
		<br />
		or <a class="createaccount" href="CSQ10.php">Click Here</a> for the Next Question.</h3>';

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
        <h1>What is Most Important to You
        <br/ >
            When Choosing a Vehicle?</h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="performance">Performance</td>
                <td id="favImg"><img width="300px" src="http://i.imgur.com/2o8dFJk.gif"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="extaesthetics" value="extaesthetics">Exterior Aesthetics</td>
                <td id="favImg"><img width="300px" src="http://www.tomorrowstechnician.com/Content/Site301/Articles/05_12_2013/1143020BuickRiv_00000064582.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="intaesthetics">Interior Aesthetics</td>
                <td id="favImg"><img width="300px" src="http://carzpage.com/wp-content/uploads/2008/03/288_18.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="power">Engine Power</td>
                <td id="favImg"><img width="300px" src="http://i83.photobucket.com/albums/j312/djw69Nova/misc%20autos/tubbedcrx2.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="size">Size</td>
                <td id="favImg"><img width="300px" src="http://i287.photobucket.com/albums/ll133/pointy-haired-dilbert/charts-of-week/aug-7/changing-size-of-cars-comparison.png"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="manufacturer">Manufacturer</td>
                <td id="favImg"><img width="300px" src="http://i.imgur.com/UfIigjZ.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="comfort">Comfort</td>
                <td id="favImg"><img width="300px" src="http://3.bp.blogspot.com/_6q-f-zD4xPY/TRkw2UhqgKI/AAAAAAAAaOk/s4QdPk4AFhw/s1600/Guy%2BSleeping%2BIn%2BCar.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="fueleconomy">Fuel Economy</td>
                <td id="favImg"><img width="300px" src="http://encikwan.com/wp-content/uploads/2008/05/gasguzzler.jpg"></td>
	    </tr>
	    <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="safety">Safety Rating</td>
                <td id="favImg"><img width="300px" src="http://i.dailymail.co.uk/i/pix/2011/10/23/article-2052533-0E7EAB9D00000578-307_964x541.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="rarity">Rarity</td>
                <td id="favImg"><img width="300px" src="http://www.microcarmuseum.com/tour/images/schmitt-tiger02.jpg"></td>
        </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
        <?php include ('CSFooter.inc.html'); ?>