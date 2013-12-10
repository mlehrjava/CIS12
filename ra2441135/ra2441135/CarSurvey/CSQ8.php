        <?php # CSQ8.php - Question 8
            // This Page Displays and handles Question 8.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Question 8';
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
        if (empty($_POST["aftermarket"]))
        {
            $answerErr = "Please Choose an Answer.";
        }
        
     
        
        



        if(empty($answerErr))
        {
            require ('CSConnect.php'); // Connect to the db.
            $e=$_SESSION['email'];
            $e=mysqli_real_escape_string( $con,$e);
        
            //check if email adress already exists
            $check="SELECT * FROM ra2441135_survey_entity_aftermarket WHERE email = '$e'";
            $rs = mysqli_query($con,$check);
            $data = mysqli_fetch_array($rs, MYSQLI_NUM);
            if(isset($data))
            {
                echo "<p class='error'>You Already Answered This Question.
                <br />
                please <a class='createaccount' href='CSR8.php'>Click Here</a> for Results,
                <br />
                Or<a class='createaccount' href='CSQ9.php'>Click Here</a> for Next Question.</p><br />";
            }
            else
            {
                require ("CSConnect.php");

                //store INSERT INTO sql in a variable
                $sql="INSERT INTO ra2441135_survey_entity_aftermarket (FirstName, LastName, email, aftermarket) VALUES ('$_SESSION[FirstName]', '$_SESSION[LastName]',  '$_SESSION[email]', '$_POST[aftermarket]')";
            
                //verify that VALUEs were inserted
                // Run the query.
                $r = @mysqli_query ($con, $sql); 
                if ($r) 
                { // If it ran OK.

                    // Print a message:
                    echo '<h3>Thank You, Please <a class="createaccount" href="CSR8.php">Click Here</a> to View Results for This Question,
		              <br />
		              or <a class="createaccount" href="CSQ9.php">Click Here</a> for the Next Question.</h3>';
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
            <h1>True or False?
            <br />
            You Prefer to Use Aftermarket
            <br />
            And/Or OEM Parts On Your Vehicle.</h1>
        <br />
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
        <table id="favTable">
            <tr>
                <td id="favTxt"><input type="radio" name="aftermarket" value="2">False</td> 
                <td id="favImg"><img width="300px" src="images/false.jpg"></td>
                <td id="favTxt"><input type="radio" name="aftermarket" value="1">True</td> 
                <td id="favImg"><img width="300px" src="images/true.jpg"></td>
            </tr>
        </table>
        <br />
        <input style="margin-left:500px; margin-right:auto;" class="submit_button" type="submit" name="submit" value="Submit">
        </form>
    <?php<?php include ('CSFooter.inc.html'); ?>