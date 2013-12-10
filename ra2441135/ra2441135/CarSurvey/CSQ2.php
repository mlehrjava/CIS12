        <?php # CSQ2.php - Question 2
            // This Page Displays and handles Question 2.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 2';
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
        
        
        $e1=isset($_POST['1910-1920']) ? 1:0;
        $e2=isset($_POST['1920-1930']) ? 1:0;
        $e3=isset($_POST['1930-1940']) ? 1:0;
        $e4=isset($_POST['1940-1950']) ? 1:0;
        $e5=isset($_POST['1950-1960']) ? 1:0;
        $e6=isset($_POST['1960-1970']) ? 1:0;
        $e7=isset($_POST['1970-1980']) ? 1:0;
        $e8=isset($_POST['1980-1990']) ? 1:0;
        $e9=isset($_POST['1990-2000']) ? 1:0;
        $e10=isset($_POST['2000-present']) ? 1:0;


        if(empty($answerErr))
        {
            require ('CSConnect.php'); // Connect to the db.
            $e=$_SESSION['email'];
            $e=mysqli_real_escape_string( $con,$e);
        
            //check if email adress already exists
            $check="SELECT * FROM ra2441135_survey_entity_era WHERE email = '$e'";
            $rs = mysqli_query($con,$check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);
            if(isset($data))
            {
                echo "<p class='error'>You Already Answered This Question.
                <br />
                please <a class='createaccount' href='CSR2.php'>Click Here</a> for Results,
                <br />
                Or<a class='createaccount' href='CSQ3.php'>Click Here</a> for Next Question.</p><br />";
            }
            else
            {
                require ("CSConnect.php");

                //store INSERT INTO sql in a variable
                $sql="INSERT INTO ra2441135_survey_entity_era (FirstName, LastName, email, 10s, 20s, 30s, 40s, 50s, 60s, 70s, 80s, 90s, 00s) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]', '$_SESSION[email]', '$e1', '$e2', '$e3', '$e4', '$e5', '$e6', '$e7', '$e8', '$e9', '$e10')";
            
                //verify that VALUEs were inserted
                // Run the query.
                $r = @mysqli_query ($con, $sql); 
                if ($r) 
                { // If it ran OK.

                    // Print a message:
                    echo '<h3>Thank You, Please <a class="createaccount" href="CSR2.php">Click Here</a> to View Results for This Question,
		              <br />
		              or <a class="createaccount" href="CSQ3.php">Click Here</a> for the Next Question.</h3>';

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
        }
        else
        {
        echo '<h1 class="error">Error!</h1>';
        
        echo '<p class="error">Please Try Again.</p><p><br /></p>';
        }
    }
        ?>
        <h1>What is your Favorite Era(s) of Vehicle Design?</h1>
        <h3>Check All that Apply.</h3>
        <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="1910-1920">1910-1920</td>
                <td id="favImg"><img width="300px" src="images/10s.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="1920-1930">1920-1930</td>
                <td id="favImg"><img width="300px" src="images/20s.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="1930-1940">1930-1940</td>
                <td id="favImg"><img width="300px" src="images/30s.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="1940-1950">1940-1950</td>
                <td id="favImg"><img width="300px" src="images/40s.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="1950-1960">1950-1960</td>
                <td id="favImg"><img width="300px" src="images/50s.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="1960-1970">1960-1970</td>
                <td id="favImg"><img width="300px" src="images/60s.jpg"></td>
            </tr>
            <tr>
                <td id="favTxt"><input class="radio" type="checkbox" name="1970-1980">1970-1980</td>
                <td id="favImg"><img width="300px" src="images/70s.png"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="1980-1990">1980-1990</td>
                <td id="favImg"><img width="300px" src="images/80s.png"></td>
            </tr>
            <td id="favTxt"><input class="radio" type="checkbox" name="1980-1990">1990-2000</td>
                <td id="favImg"><img width="300px" src="images/90s.jpg"></td>
                <td id="favTxt"><input class="radio" type="checkbox" name="2000-present">2000-Present</td>
                <td id="favImg"><img width="300px" src="images/00s.jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
        <?php include ('CSFooter.inc.html'); ?>