        <?php # CSR8.php - Results 8
            // This Page Displays and handles Results for Question 8.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Results 8';
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
            //connect to DB
            require_once ('CSConnect.php');
            //count all values for each answer
            $a1 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_aftermarket WHERE aftermarket = '2'");
            $a2 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_aftermarket WHERE aftermarket = '1'");
            
            $n1 = @mysqli_num_rows($a1);
            $n2 = @mysqli_num_rows($a2);

            @mysqli_close($con);
           
            //turn answers into percentages 
            //then round down to avoid decimals
            $total= $n1+$n2;
            $p1 = floor((($n1 * 100) / $total));
            $p2 = floor((($n2 * 100) / $total));
            //display percentages
        ?>
        
        <h1>True or False?
        <br />
        You Prefer to Use Aftermarket
        <br />
        And/Or OEM Parts On Your Vehicle.</h1>
        <br />
        <table id="favTable">
            <tr>
                <td id="favTxt">False</td> 
                <td id="favImg"><p><?php echo $p1; ?>%</p></td>
                <td id="favTxt">True</td> 
                <td id="favImg"><p><?php echo $p2; ?>%</p></td>
            </tr>
        </table>
        <br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ9.php';">Next Question</button>
    	<?php include ('CSFooter.inc.html'); ?>