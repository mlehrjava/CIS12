	<?php
	ob_start();
	session_start();
	require ('inc/config.inc.php');
	$page_title = 'Delete Event';
	include ('inc/header.html');
	?>
	<style>
div#body_container>a.tab01 {
	background:url(inc/img/button-hov.png) no-repeat center;
	}
</style>




<!-------------------------------------Delete Event------------------------------------->
		
		<?php
			if (isset($_SESSION['user_id'])) {	//IF LOGGED IN
		if ($_SESSION['user_level'] == 1) {	//IF ADMIN
		$page_title = 'Delete an Event';
		echo '<h1>Delete an Event</h1>';
		if ( (isset($_GET['event_id'])) && (is_numeric($_GET['event_id'])) ) {
			$event_id = $_GET['event_id'];
		} elseif ( (isset($_POST['event_id'])) && (is_numeric($_POST['event_id'])) ) {
			$event_id = $_POST['event_id'];
		} else {
			echo '<p class="error">This page has been accessed in error.</p>';
			exit();
		}
		require ('../mysqli_connect.php');
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			if ($_POST['sure'] == 'Yes') {
				$q = "DELETE FROM aw2274434_karate_events WHERE event_id=$event_id LIMIT 1";		
				$r = @mysqli_query ($dbc, $q);
				if (mysqli_affected_rows($dbc) == 1) {
					echo '<p>The event has been deleted.</p>';	
					} else {
					echo '<p class="error">The event could not be deleted due to a system error.</p>';
					echo '<p>' . mysqli_error($dbc) . '<br />Query: ' . $q . '</p>';
					}
			} else {
				echo '<p>The event has NOT been deleted.</p>';
				}
			} else {
				$q = "SELECT CONCAT(event_date, ', ', title) FROM aw2274434_karate_events WHERE event_id=$event_id";
				$r = @mysqli_query ($dbc, $q);
				if (mysqli_num_rows($r) == 1) {
					$row = mysqli_fetch_array ($r, MYSQLI_NUM);
					echo "<h3>Event: ".$row[0]."</h3>
						Are you sure you want to delete this event?";
					echo '<form action="delete_event.php" method="post">
						<input type="radio" name="sure" value="Yes" /> Yes 
						<input type="radio" name="sure" value="No" checked="checked" /> No
						<input type="submit" name="submit" value="Submit" />
						<input type="hidden" name="event_id" value="' . $event_id . '" />
						</form>';
				} else { 
					echo '<p class="error">This page has been accessed in error.</p>';
					}
				}
		mysqli_close($dbc);
		
		}
			} else { //IF NOT LOGGED IN			
              echo 'You are not authorized to view this page. Please log in or register.';
                 }
		?>
<!---------------------------------------------->
			<?php
	include ('inc/footer.html');
	?>