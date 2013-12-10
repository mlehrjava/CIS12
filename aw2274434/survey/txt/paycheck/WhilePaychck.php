<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paycheck Table</title>
</head>

<body>
<h1> Paycheck Table </h1>
<table width="200" border="1">
  <tr>
    <th>Hours</th>
    <th>Earnings $</th>
  </tr>
<?php
	//Retrieve Get Data
	$payRate=$_GET["payRate"];
	$ovrTime=$_GET["ovrTime"];
	$dblTime=$_GET["dblTime"];
	$trpTime=$_GET["trpTime"];
	$numHrs=$_GET["numHrs"];
	echo "<p> Initial Pay Rate = $payRate</p>";
	echo "<p> Overtime Starts = $ovrTime</p>";
	echo "<p> Doubletime Starts = $dblTime</p>";
	echo "<p> Tripletime Starts = $trpTime</p>";
	//Fill Table with a While-Loop
	$hours=1;
	while($hours<$ovrTime){
		$payChck=($payRate*$hours);
		$payChck=number_format($payChck, 2, '.', '');
		
		echo "<tr><td>$hours</td>";
		echo "<td>$payChck</td></tr>";
		++$hours;
	}
	
	
		//OVERTIME
	while($hours<$dblTime){
		$payChck=($payRate*$hours);
		$newOvr=($payRate/2)*($hours-$ovrTime+1);
		$finOvr=$payChck+$newOvr;
		$finOvr=number_format($finOvr, 2, '.', '');
		
		echo "<tr><td>$hours</td>";
		echo "<td>$finOvr</td></tr>";
		++$hours;
		}
		
		
		//DOUBLETIME
	while($hours<$trpTime){
		$payChck=($payRate*$hours);
		$newDbl=($payRate)*($hours-$dblTime+1);
		$finDbl=$payChck+$newOvr+$newDbl;
		$finDbl=number_format($finDbl, 2, '.', '');
		
		echo "<tr><td>$hours</td>";
		echo "<td>$finDbl</td></tr>";
		++$hours;
		}
		
		
		//TRIPLETIME
	while($hours<=$numHrs){
		$payChck=($payRate*$hours);
		$newTrp=($payRate*2)*($hours-$trpTime+1);
		$finTrp=$payChck+$newOvr+$newDbl+$newTrp;
		$finTrp=number_format($finTrp, 2, '.', '');
		
		echo "<tr><td>$hours</td>";
		echo "<td>$finTrp</td></tr>";
		++$hours;
		}
?>
</table>

</body>
</html>