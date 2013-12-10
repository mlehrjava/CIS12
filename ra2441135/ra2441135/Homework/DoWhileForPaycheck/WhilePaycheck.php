<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Paycheck</title>
</head>

<body>
<h1> Payrate Table </h1>
<table width="200" border="1">
  <tr>
      <th>Pay Rate $/hr</th>
    <th>Hours Worked</th>
    <th>Paycheck $</th>

  </tr>
<?php
	//Retrieve Get Data
	$payRate=$_GET["payRate"];
	$hrsWrkd=$_GET["hrsWrkd"];
	echo "<p> Payrate = $$payRate / hr.</p>";
	echo "<p> Hours Worked = $hrsWrkd hrs.</p>";
	//Fill Table with a For-Loop
	$hrs=1;
	while($hrs<=$hrsWrkd)
	{
		//Calculations here
		//$balance=$balance*(1+$intRate/100);
		 $payCheck=$hrs*$payRate;
		$payCheck=number_format($payCheck, 2, '.', '');
		//Display here
		echo "<tr><td>$payRate</td>";
		echo "<td>$hrs</td>";
		echo "<td>$payCheck</td></tr>";
		++$hrs
	}
?>
</table>

</body>
</html>
