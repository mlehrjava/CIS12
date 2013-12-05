        <?php # CSR3.php - Results 3
            // This Page Displays and handles Results for Question 3.

            session_start(); // Start the session.
            // Set the page title and include the HTML header:
            $page_title = 'Results 3';
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
		$a1 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='america'");
		$a2 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='germany'");
		$a3 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='britain'");
		$a4 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='italy'");
		$a5 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='japan'");
		$a6 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='sweden'");
		$a7 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='france'");
		$a8 = @mysqli_query ($con,"SELECT * FROM ra2441135_survey_entity_country WHERE country='korea'");
		
        $n1 = @mysqli_num_rows($a1);
        $n2 = @mysqli_num_rows($a2);
        $n3 = @mysqli_num_rows($a3);
        $n4 = @mysqli_num_rows($a4);
        $n5 = @mysqli_num_rows($a5);
        $n6 = @mysqli_num_rows($a6);
        $n7 = @mysqli_num_rows($a7);
        $n8 = @mysqli_num_rows($a8);

        @mysqli_close($con);
		//turn answers into percentages 
		//then round down to avoid decimals
		$total= $n1+$n2+$n3+$n4+$n5+$n6+$n7+$n8;
            $p1 = floor((($n1 * 100) / $total));
            $p2 = floor((($n2 * 100) / $total));
            $p3 = floor((($n3 * 100) / $total));
            $p4 = floor((($n4 * 100) / $total));
            $p5 = floor((($n5 * 100) / $total));
            $p6 = floor((($n6 * 100) / $total));
            $p7 = floor((($n7 * 100) / $total));
            $p8 = floor((($n8 * 100) / $total));
		//display percentages
	?>
        <h1>Which is your Favorite Country When it Comes
	    <br />
	    to Vehicle Manufacturing?</h1>
        <br />
        <h2>Results:</h2>
        <br />
        <table id="favTable">
            <tr>
                <td id="favTxt">America</td> 
                <td id="favImg"><p><?php echo $p1; ?>%</p></td>
                <td id="favTxt">Germany</td> 
                <td id="favImg"><p><?php echo $p2; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Britain</td> 
                <td id="favImg"><p><? php echo $p3; ?>%</p></td>
                <td id="favTxt">Italy</td> 
                <td id="favImg"><p><?php echo $p4; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">Japan</td> 
                <td id="favImg"><p><? php echo $p5; ?>%</p></td>
                <td id="favTxt">Sweden</td> 
                <td id="favImg"><p><?php echo $p6; ?>%</p></td>
            </tr>
            <tr>
                <td id="favTxt">France</td> 
                <td id="favImg"><p><?php echo $p7; ?>%</p></td>
                <td id="favTxt">Korea</td> 
                <td id="favImg"><p><?php echo $p8; ?>%</p></td>
            </tr>
        </table>
        <br />
        <button style="margin-left:450px; margin-right:auto;" class="NextButton" type="button" onclick="location.href='CSQ4.php';">Next Question</button>
    	<?php include ('CSFooter.inc.html'); ?>