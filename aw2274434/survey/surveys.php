	<?php
	session_start();
	include ('inc/header.html');
	?>
	<!---------------------------------------------->
    <h2>Surveys</h2>
    <ul>
	<?php
	require ('../mysqli_connect.php'); 
	$q = 'SELECT * FROM aw2274434_survey_enum_key';		
			$r = @mysqli_query ($dbc, $q);
	while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
	
		echo '<li><a href="surveypage.php/?id=' . $row['survey_id'] . '">' . $row['survey_name'] . '</a></li>';		
		}
		
		echo '</ul>';
		
		
		?>
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>