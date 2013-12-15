        <?php # CSR2.php - Results 2
            // This Page Displays and handles Results for Question 2.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Results 2';
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
            $a1 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 10s = '1'");
            $a2 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 20s = '1'");
            $a3 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 30s = '1'");
            $a4 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 40s = '1'");
            $a5 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 50s = '1'");
            $a6 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 60s = '1'");
            $a7 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 70s = '1'");
            $a8 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 80s = '1'");
            $a9 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 90s = '1'");
            $a10 = @mysqli_query ($con,"SELECT  * FROM ra2441135_survey_entity_era WHERE 00s = '1'");
            
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
        
        <h1>What is your Favorite Era(s) of Vehicle Design?</h1>
        <h2>Results:</h2>
        <br />
        <table id="favTable">
            <tr>
                <td id="favTxt">1910-1920</td> 
                <td id="favImg"><p><?php echo $p1; ?>%</p></td>
                <td id="favTxt">1920-1930</td> 
                <td id="favImg"><p><?php echo $p2; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">1930-1940</td> 
                <td id="favImg"><p><?php echo $p3; ?>%</p></td>
                <td id="favTxt">1940-1950</td> 
                <td id="favImg"><p><?php echo $p4; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">1950-1960</td> 
                <td id="favImg"><p><?php echo $p5; ?>%</p></td>
                <td id="favTxt">1960-1970</td> 
                <td id="favImg"><p><?php echo $p6; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">1970-1980</td> 
                <td id="favImg"><p><?php echo $p7; ?>%</p></td>
                <td id="favTxt">1980-1990</td> 
                <td id="favImg"><p><?php echo $p8; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">1990-2000</td> 
                <td id="favImg"><p><?php echo $p9; ?>%</p></td>
                <td id="favTxt">2000-Present</td> 
                <td id="favImg"><p><?php echo $p10; ?>%</p></td>
            </tr>
        </table>
        <br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ3.php';">Next Question</button>
    	<?php include ('CSFooter.inc.html'); ?>