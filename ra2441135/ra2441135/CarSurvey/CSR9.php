        <?php # CSR9.php - Results 9
            // This Page Displays and handles Results for Question 9.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Results 9';
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
            $a1 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE performance = '1'");
            $a2 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE extaesthetics = '1'");
            $a3 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE intaesthetics = '1'");
            $a4 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE power = '1'");
            $a5 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE size = '1'");
            $a6 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE manufacturer = '1'");
            $a7 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE comfort = '1'");
            $a8 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE fueleconomy = '1'");
            $a9 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE safety = '1'");
            $a10 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_importance WHERE rarity = '1'");
            
            $n1 = @mysqli_num_rows($a1);
            $n2 = @mysqli_num_rows($a2);
            $n3 = @mysqli_num_rows($a3);
            $n4 = @mysqli_num_rows($a4);
            $n5 = @mysqli_num_rows($a5);
            $n6 = @mysqli_num_rows($a6);
            $n7 = @mysqli_num_rows($a7);
            $n8 = @mysqli_num_rows($a8);
            $n9 = @mysqli_num_rows($a9);
            $n10= @mysqli_num_rows($a10);

            @mysqli_close($con);
           
            //turn answers into percentages 
            //then round down to avoid decimals
            $total= $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8+$n9+$n10;
            $p1 = floor((($n1 * 100) / $total));
            $p2 = floor((($n2 * 100) / $total));
            $p3 = floor((($n3 * 100) / $total));
            $p4 = floor((($n4 * 100) / $total));
            $p5 = floor((($n5 * 100) / $total));
            $p6 = floor((($n6 * 100) / $total));
            $p7 = floor((($n7 * 100) / $total));
            $p8 = floor((($n8 * 100) / $total));
            $p9 = floor((($n9 * 100) / $total));
            $p10 = floor((($n10 * 100) / $total));
            //display percentages
        ?>
        
        <h1>What is Most Important to You
        <br/ >
        When Choosing a Vehicle?</h1>
        <h2>Results:</h2>
        <br />
        <table id="favTable">
            <tr>
                <td id="favTxt">Performance</td> 
                <td id="favImg"><p><?php echo $p1; ?>%</p></td>
                <td id="favTxt">Exterior Aesthetics</td> 
                <td id="favImg"><p><?php echo $p2; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Interior Aesthetics</td> 
                <td id="favImg"><p><?php echo $p3; ?>%</p></td>
                <td id="favTxt">Engine Power</td> 
                <td id="favImg"><p><?php echo $p4; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Size</td> 
                <td id="favImg"><p><?php echo $p5; ?>%</p></td>
                <td id="favTxt">Manufacturer</td> 
                <td id="favImg"><p><?php echo $p6; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Comfort</td> 
                <td id="favImg"><p><?php echo $p7; ?>%</p></td>
                <td id="favTxt">Fuel Economy</td> 
                <td id="favImg"><p><?php echo $p8; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Safety Rating</td> 
                <td id="favImg"><p><?php echo $p9; ?>%</p></td>
                <td id="favTxt">Rarity</td> 
                <td id="favImg"><p><?php echo $p10; ?>%</p></td>
            </tr>
        </table>
        <br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ10.php';">Next Question</button>
    	<?php include ('CSFooter.inc.html'); ?>