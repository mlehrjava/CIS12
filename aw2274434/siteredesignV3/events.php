
<table class="event_table">
<tr class="eventheads">
<th>Date</th>
<th>Event</th>
<th>Details</th>
</tr>
<?php
error_reporting(0);
include("../mysqli_connect.php");
$escdate = ($_REQUEST["date"]);
$sql = "SELECT title, description, DATE_FORMAT(event_date,'%a %b %D %Y') AS event_date FROM aw2274434_karate_events WHERE event_date = '$escdate'";
$sql_result = @mysqli_query ($dbc, $sql) or die(mysqli_error($dbc));
if (mysqli_num_rows($sql_result) > 0){
while ($row = mysqli_fetch_array($sql_result, MYSQLI_ASSOC)) {

	echo '<tr><td>'.$row['event_date'].'</td>';
	echo '<td>'.$row['title'].'</td>';
	echo '<td>'.$row['description'].'</td></tr>';
}
mysqli_free_result($sql_result);
}
mysqli_close($dbc);	
?></table></tr></table>