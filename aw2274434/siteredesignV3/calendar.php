<?php

error_reporting(0);
require ('../mysqli_connect.php');


(intval($_REQUEST["month"])>0) ? $cMonth = intval($_REQUEST["month"]) : $cMonth = date("m");
(intval($_REQUEST["year"])>0) ? $cYear = intval($_REQUEST["year"]) : $cYear = date("Y");


$sql = "SELECT * FROM aw2274434_karate_events WHERE `event_date` LIKE '".$cYear."-".$cMonth."-%'";
$sql_result = @mysqli_query ($dbc, $sql) or die ('request "Could not execute SQL query" '.$sql);
while ($row = mysqli_fetch_assoc($sql_result)) {
	$events[$row["event_date"]]["title"] = $row["title"];
	$events[$row["event_date"]]["description"] = $row["description"];
}


$prev_year = $cYear;
$next_year = $cYear;
$prev_month = intval($cMonth)-1;
$next_month = intval($cMonth)+1;


if ($cMonth == 12 ) {
	$next_month = 1;
	$next_year = $cYear + 1;
} elseif ($cMonth == 1 ) {
	$prev_month = 12;
	$prev_year = $cYear - 1;
}

if ($prev_month<10) $prev_month = '0'.$prev_month;
if ($next_month<10) $next_month = '0'.$next_month;
?>  

<table><tr><table class="caltable">
<tr>
<td>
<table id="next_prev">
<tr>
<td id="prev" class="mNav" width="50%" align="left"><a href="javascript:LoadMonth('<?php echo $prev_month; ?>', '<?php echo $prev_year; ?>')">&lt;&lt;Previous&nbsp</a></td>
<td id="next" class="mNav" width="50%" align="right"><a href="javascript:LoadMonth('<?php echo $next_month; ?>', '<?php echo $next_year; ?>')">&nbspNext&gt;&gt;</a>  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<table class="caltable">
<tr align="center">
<td class="cMonth" colspan="7"><strong><?php echo date("F, Y",strtotime($cYear."-".$cMonth."-01")); ?></strong></td>
</tr>
<tr>
<td class="wDays"><strong>S</strong></td>
<td class="wDays"><strong>M</strong></td>
<td class="wDays"><strong>T</strong></td>
<td class="wDays"><strong>W</strong></td>
<td class="wDays"><strong>T</strong></td>
<td class="wDays"><strong>F</strong></td>
<td class="wDays"><strong>S</strong></td>
</tr>
</table>
<table class="caltable">
<?php 
$first_day_timestamp = mktime(0,0,0,$cMonth,1,$cYear); 
$maxday = date("t",$first_day_timestamp); 
$thismonth = getdate($first_day_timestamp); 
$startday = $thismonth['wday'];
for ($i=0; $i<($maxday+$startday); $i++) {
	if (($i % 7) == 0 ) echo "<tr>";
	if ($i < $startday) { echo "<td>&nbsp;</td>"; continue; };
	$current_day = $i - $startday + 1;
	if ($current_day<10) $current_day = '0'.$current_day;

	if ($events[$cYear."-".$cMonth."-".$current_day]<>'') {
		$css='withevent';
		$click = "onclick=\"LoadEvents('".$cYear."-".$cMonth."-".$current_day."')\"";
	} else {
		$css='noevent'; 		
		$click = '';
	}
	
	echo "<td class='".$css."'".$click.">". $current_day . "</td>";
	
	if (($i % 7) == 6 ) echo "</tr>";
}
?> 
</table>