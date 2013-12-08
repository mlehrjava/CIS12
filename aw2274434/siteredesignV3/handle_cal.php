<?php


include("../mysqli_connect.php");




(intval($_REQUEST["month"])>0) ? $cMonth = intval($_REQUEST["month"]) : $cMonth = date("m");
(intval($_REQUEST["year"])>0) ? $cYear = intval($_REQUEST["year"]) : $cYear = date("Y");

 
 $events = array();
$q = "SELECT title, description, DATE_FORMAT(event_date,'%Y-%m-%D') AS event_date FROM aw2274434_karate_events WHERE event_date LIKE '".$cYear."-".$cMonth."-%'";
$r = @mysqli_query ($dbc, $q) or die ('request "Could not execute SQL query" '.$q);
while($row = mysqli_fetch_assoc($r)) {
	$events[$row['event_date']][] = $row;
 }
 
$prev_year = $cYear;
$next_year = $cYear;
$prev_month = $cMonth-1;
$next_month = $cMonth+1;
 
if ($prev_month == 0 ) {
    $prev_month = 12;
    $prev_year = $cYear - 1;
}
if ($next_month == 13 ) {
    $next_month = 1;
    $next_year = $cYear + 1;
}

if ($prev_month<10) $prev_month = '0'.$prev_month;
if ($next_month<10) $next_month = '0'.$next_month;



?>

<table width="200">
<tr align="center">
<td bgcolor="#999999" style="color:#FFFFFF">
<table width="100%" border="0" cellspacing="0" cellpadding="0">
<tr>
<td class="mNav"width="50%" align="left"><a href="javascript:LoadMonth('<?php echo $prev_month; ?>', '<?php echo $prev_year; ?>')">&lt;&lt;Previous</a></td>
<td class="mNav"width="50%" align="right"><a href="javascript:LoadMonth('<?php echo $next_month; ?>', '<?php echo $next_year; ?>')">Next&gt;&gt;</a>  </td>
</tr>
</table>
</td>
</tr>
<tr>
<td align="center">
<table width="100%" border="0" cellpadding="2" cellspacing="2">
<tr align="center">
<td colspan="7"><strong><?php echo date("F, Y",strtotime($cYear."-".$cMonth."-01")); ?></strong></td>
</tr>
<tr>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>M</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>W</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>T</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>F</strong></td>
<td align="center" bgcolor="#999999" style="color:#FFFFFF"><strong>S</strong></td>
</tr>

<?php


//$timestamp = mktime(0,0,0,$cMonth,1,$cYear);
//$maxday = date("t",$timestamp);
//$thismonth = getdate ($timestamp);
//$startday = $thismonth['wday'];
//for ($i=0; $i<($maxday+$startday); $i++) {
//    if(($i % 7) == 0 ) echo "<tr>";
//    if($i < $startday) echo "<td></td>";
//    else echo "<td align='center' valign='middle' height='20px'>". ($i - $startday + 1) . "</td>";
 //   if(($i % 7) == 6 ) echo "</tr>";
$first_day_timestamp = mktime(0,0,0,$cMonth,1,$cYear); // time stamp for first day of the month used to calculate 
$maxday = date("t",$first_day_timestamp); // number of days in current month
$thismonth = getdate($first_day_timestamp); // find out which day of the week the first date of the month is
$startday = $thismonth['wday']; // 0 is for Sunday and as we want week to start on Mon we subtract 1
for ($i=0; $i<($maxday+$startday); $i++) {
	if (($i % 7) == 0 ) echo "<tr>";
	if ($i < $startday) { echo "<td>&nbsp;</td>"; continue; };
	$current_day = $i - $startday + 1;
	if ($current_day<10) $current_day = '0'.$current_day;
// set css class name based on number of events for that day
	if (isset($events[$cYear."-".$cMonth."-".$current_day])) {
		$css='withevent';
		$click = "onclick=\"LoadEvents('".$cYear."-".$cMonth."-".$current_day."')\"";
	} else {
		$css='noevent'; 		
		$click = '';
	}
	
	echo "<td class='".$css."'".$click.">". $current_day . "</td>";
	
	if (($i % 7) == 6 ) echo "</tr>";
}
	
	
	

echo '</table>
</td>
</tr>
</table>';
//echo '<h2 style="float:left; padding-right:30px;">'.date('F',mktime(0,0,0,$cMonth,1,$cYear)).' '.$cYear.'</h2>';
//echo '<div style="float:left;">'.$controls.'</div>';
//echo '<div style="clear:both;"></div>';
//echo draw_calendar($month,$year,$events);
//echo '<br /><br />';

?>