			<?php
	
	require ('inc/config.inc.php');
	$page_title = 'Event Calendar';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab03 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Calendar------------------------------------->



<?php
if (isset($_SESSION['user_id'])){
			if ($_SESSION['user_level'] == 1 ){
			
		require ('../mysqli_connect.php');
		
		
		
		
		
		
		
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
		
		
		
		
		
		
		if ($_POST){
		$trimmed = array_map('trim', $_POST);
			
				$m = $_POST['m'];
				$d = $_POST['d'];
				$y = $_POST['y'];
				$event_date = $y."-".$m."-".$d;
				
				} else {
				
				$m = $_GET['m'];
				$d = $_GET['d'];
				$y = $_GET['y'];
				
								
				}
				
				
			 
				// Formatting for SQL datetime (if this is edited, it will NOT work.)
				
				$title = mysqli_real_escape_string($dbc, $trimmed['title']);
				$description = mysqli_real_escape_string($dbc, $trimmed['description']);
			 
				$insEvent_sql = "INSERT INTO aw2274434_karate_events (title, description, event_date) VALUES ('$title', '$description', '$event_date')";
				$insEvent_res = @mysqli_query($dbc, $insEvent_sql)
						or die(mysqli_error($dbc));
						
						
					if (mysqli_affected_rows($dbc) == 1) {
					header("Location: calendarpage.php");
					
					} else {
					echo '<p class="error">Event could not be created due to a system error. We apologize for any inconvenience.</p>';
					}
			
	}
		// Show form for adding the event:
	 
	echo '
		<form method="post" action="calendarpage.php">
		<p><strong>Add Event:</strong><br/>
		Complete the form below then press the submit button when you are done.</p>
		<p><strong>Event Title:</strong><br/>
		<input type="text" name="title" size="25" maxlength="25" value="';
	if (isset($trimmed['title'])) echo $trimmed['title']; 
	echo '"/></p>
		<p><strong>Event Description:</strong><br/>
		<textarea name="description" rows="3" cols="40" maxlength="240" value="';
	if (isset($trimmed['description'])) echo $trimmed['description'];
	echo '"/></textarea></p>
		<p><strong>Event Date:</strong><br/>';
		
		
		
		
	$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');

// Make the months pull-down menu:
echo '<select name="m">';
foreach ($months as $key => $value) {
	echo '<option value="'.$key.'">'.$value.'</option>\n';
}
echo '</select>';

// Make the days pull-down menu:
echo '<select name="d">';
for ($d = 1; $d <= 31; $d++) {
	echo '<option value="'.$d.'">'.$d.'</option>\n';
}
echo '</select>';

// Make the years pull-down menu:
echo '<select name="y">';
for ($y = 2013; $y <= 2021; $y++) {
	echo '<option value="'.$y.'">'.$y.'</option>\n';
	}
echo '</select>';
	
	echo '
	
	<br/><br/>
	<input type="submit" name="submit" value="Add Event!">
	</form>';
	
	

	// Show the events for this day:
	$getEvent_sql = "SELECT event_id, title, description, date_format(event_date,'%a %b %D %Y') as fmt_date FROM aw2274434_karate_events WHERE event_date > curdate() - interval 1 year ORDER BY event_date";
	$getEvent_res = @mysqli_query($dbc, $getEvent_sql) or die(mysqli_error($dbc));
	if (mysqli_num_rows($getEvent_res) > 0){
	 
	
		echo "<p><strong>Events:</strong></p>

	    <hr/><ul>";
					while($row = mysqli_fetch_array($getEvent_res, MYSQLI_ASSOC)){
						
						echo '<a href="delete_event.php?event_id=' . $row['event_id'] . '">Delete</a>';
						echo '<li><strong> '.$row['fmt_date'].': '.$row['title'].'</strong><br/>';
						echo $row['description'].'</li><br/><br/>';
						
					}
					echo "</ul>";
					mysqli_free_result($getEvent_res);
					
					
	}
	
	
	
	
mysqli_close($dbc);	
}}
?>
<div id="Calendar"> </div>
<div id="Events"> </div>
<script language="javascript" src="calendar.js"></script>





<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>