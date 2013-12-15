<?php
session_start();
include ('inc/header.html');
?>
	<!---------------------------------------------->
    <h2>Surveys</h2>
    <ul>
	<?php
	
	
	
	echo '<h1>Take Survey</h1>';
	
				if ( (isset($_GET['id'])) && (is_numeric($_GET['id'])) ) {
					$id = $_GET['id'];
					} elseif ( (isset($_POST['id'])) && (is_numeric($_POST['id'])) ) {
					$id = $_POST['id'];
					}
					require ('../mysqli_connect.php'); 
					if ($_SERVER['REQUEST_METHOD'] == 'POST') {
					$errors = array();
					
					
					
					
					if (empty($errors)) { 			
					$q = 'SELECT * FROM aw2274434_survey_enum_key WHERE survey_id=$id';
					$r = @mysqli_query($dbc, $q);
						while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
						$surv_nm = $row['survey_table_name']
						}
						} else { 
							echo '<p class="error">The following error(s) occurred:<br />';
							foreach ($errors as $msg) {
								echo " - $msg<br />\n";}
								echo '</p><p>Please try again.</p>';
								}
					}
					
					
					
					$q = 'SELECT * FROM $surv_nm, aw2274434_survey_enum_formtype WHERE $surv_nm.`formtype_id` = `aw2274434_survey_enum_formtype`.`formtype_id`';
				$r = @mysqli_query($dbc, $q); 
				if (mysqli_num_rows($r) == 1) {
					$row = mysqli_fetch_array($r, MYSQLI_ASSOC);
						
						
						
						
						$formtype = $row['formtype_id']
					switch ($formtype)	{
						case"1":
							$formtype = $text_form;
							break;
						case"2":
							$formtype = $radio_form;
							break;
						case"3":
							$formtype = $checkbox_form;
							break;
						case"4":
							$formtype = $textarea_form;
							break;
						case"5":
							$formtype = $password_form;
							break;
							
							
							'<textarea name="' . $row["question"] . '" rows="3" cols="40" maxlength="240" value="';if (isset($trimmed['txtarea_answer'])) echo $trimmed['txtarea_answer'];echo '"/></textarea></p>';
						$text_form = .$row['question'].'<input type="text" name="'.$row['shortquestion'].'" size="15" maxlength="40" value="' if (isset($trimmed[$row['shortquestion']])) echo $trimmed[$row['shortquestion']]; ?>" />	
							
							
							
							
							
							
				/*	$formtype = $row['formtype_id']
					switch ($formtype)	{
						//case"1":
						//	echo ';
						//	break;
						case"2":
							echo '<input type="radio" name="'.$row["question"].'" value="'.'">'.$row["question"].'<br>';
							break;
						//case"3":
						//	echo;
						//	break;
						case"4":
							echo '<textarea name="' . $row["question"] . '" rows="3" cols="40" maxlength="240" value="';
							if (isset($trimmed['txtarea_answer'])) echo $trimmed['txtarea_answer'];
							echo '"/></textarea></p>';
							break;
						case"5":
							echo;
							break;*/
					
					echo '<li>'.$row['question'].'</li>';
					echo '<li>$formtype</li>';
					echo '';
					echo '';
					
					
					
					//$str='SELECT * FROM aw2274434_survey_enum_key WHERE survey_id=$id;SELECT * FROM $surv_nm where form;'; // say $str="select * from texts; insert into date ('time') values ('2012');";

					//$query = explode(';',$str);

					// Run the queries
				//	foreach($query as $index => $sql)
				//	{
				//	   $result = mysql_query($sql);    
					   // Perform an additional operations here
				//	   $surv_nm = $row['survey_table_name']
				//	   echo '<li>'.$row['question'].'</li>';
					   
					
					
					
					
		

		
		

		
		
			
			
				
					
		
		
		?>
	
    
    
    
    <!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>