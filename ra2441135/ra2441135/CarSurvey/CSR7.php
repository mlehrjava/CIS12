        <?php # CSR7.php - Results 7
            // This Page Displays and handles Results for Question 7.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Results 7';
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
		$a1 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='green'");
		$a2 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='white'");
		$a3 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='black'");
		$a4 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='silver'");
		$a5 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='gray'");
		$a6 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='red'");
		$a7 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='blue'");
		$a8 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='brown'");
		$a9 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='yellow'");
		$a10 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_color WHERE color='other'");
		
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
        <h1>What Color is your Favorite on a Vehicle?</h1>
        <br />
        <h2>Results:</h2>
        <br />
        
        <table id="favTable">
            <tr>
                <td id="favTxt"><span style="background-color:#2A6F1B">Green</span></td> 
                <td id="favImg"><p><span style="color:#2A6F1B"><?php echo $p1; ?>%</span></p></td>
                <td id="favTxt"><span style="background-color:#D6E1D9">White</span></td> 
                <td id="favImg"><p><span style="color:#D6E1D9"><?php echo $p2; ?>%</span></p></td>
            </tr>
            <tr>
                <td id="favTxt"><span style="background-color:#10131E">Black</span></td> 
                <td id="favImg"><p><span style="color:#10131E"><?php echo $p3; ?>%</span></p></td>
                <td id="favTxt"><span style="background-color:#B8B8B8">Silver</span></td> 
                <td id="favImg"><p><span style="color:#B8B8B8"><?php echo $p4; ?>%</span></p></td>
            </tr>
            <tr>
                <td id="favTxt"><span style="background-color:#5C5C5C">Gray</span></td> 
                <td id="favImg"><p><span style="color:#5C5C5C"><?php echo $p5; ?>%</span></p></td>
                <td id="favTxt"><span style="background-color:#FA000C">Red</span></td> 
                <td id="favImg"><p><span style="color:#FA000C"><?php echo $p6; ?>%</span></p></td>
            </tr>
            <tr>
                <td id="favTxt"><span style="background-color:#227AE2">Blue</span></td> 
                <td id="favImg"><p><span style="color:#227AE2"><?php echo $p7; ?>%</span></p></td>
                <td id="favTxt"><span style="background-color:#6F4311">Brown</span></td> 
                <td id="favImg"><p><span style="color:#6F4311"><?php echo $p8; ?>%</span></p></td>
            </tr>
            <tr>
                <td id="favTxt"><span style="background-color:#C5C804">Yellow</span></td> 
                <td id="favImg"><p><span style="color:#C5C804"><?php echo $p9; ?>%</span></p></td>
                <td id="favTxt"><span style="background-color:#AD04C8">Other</span></td> 
                <td id="favImg"><p><span style="color:#AD04C8"><?php echo $p10; ?>%</span></p></td>
            </tr>
        </table>
        <br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ8.php';">Next Question</button>
	<?php include ('CSFooter.inc.html'); ?>