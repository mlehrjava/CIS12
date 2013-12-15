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
	
	$row['survey_table_name']= preg_replace('/_res/', '', $row['survey_table_name']);
	$row['survey_table_name']= preg_replace('/aw2274434_survey_enum_/', '', $row['survey_table_name']);
	$row['survey_table_name']= preg_replace('/_/', ' ', $row['survey_table_name']);
	
	
	
		echo '<li><a href="viewsurvey.php/?surveytablename=' . $row['survey_table_name'] . '">' . $row['survey_table_name'] . '</a></li>';		
		}
		
		echo '</ul>';
		
		
		
		
		echo '<form action="createsurvey1.php?newsurveyname=$newsurveyname&numtxtboxques=$numtxtboxques&numtxtareaques=$numtxtareaques&numrdiobutques=$numrdiobutques&numchckboxques=$numchckboxques&numdropdwnques=$numdropdwnques" method="get">';
		echo '<p>Name of new survey: <input type="text" name="newsurveyname" size="15" maxlength="40" value="';
		if (isset($trimmed['newsurveyname'])) echo $trimmed['newsurveyname'];
		echo '" /></p><br />';
		
		echo '<p>Survey Description: <textarea name="newsurveydetails" rows="3" cols="40" maxlength="500" value="';
		if (isset($trimmed['newsurveydetails'])) echo $trimmed['newsurveydetails'];
		echo '" /></textarea></p><br />';
		
		echo '<p>Number of textbox questions: ';
		echo '<select name="numtxtboxques">';
		for ($i = 0; $i <= 50; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>\n';
		}
		echo '</select></p>';
		
		echo '<p>Number of textarea questions: ';
		echo '<select name="numtxtareaques">';
		for ($i = 0; $i <= 50; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>\n';
		}
		echo '</select></p>';
		
		echo '<p>Number of radio button questions: ';
		echo '<select name="numradbutques">';
		for ($i = 0; $i <= 100; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>\n';
		}
		echo '</select></p>';
		
		echo '<p>Number of checkbox  questions: ';
		echo '<select name="numchckboxques">';
		for ($i = 0; $i <= 100; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>\n';
		}
		echo '</select></p>';
		
		echo '<p>Number of drop-down questions: ';
		echo '<select name="numdropdwnques">';
		for ($i = 0; $i <= 50; $i++) {
			echo '<option value="'.$i.'">'.$i.'</option>\n';
		}
		echo '</select></p>';
	
		echo '<p><input type="submit" name="submit" value="Submit" /></p>';
					//<input type="hidden" name="id" value="' . $id . '" />
		echo '</form>';
		
		
		
		
		?>
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>