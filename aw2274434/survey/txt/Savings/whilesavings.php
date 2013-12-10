<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Savings account</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <th>Years</th>
    <th>Savings</th>
  </tr>
<?php
		//retrieve Get Data
		$intRate=$_GET["intRate"];
		$numYrs=$_GET["numYrs"];
		$balance=$_GET["balance"];
		echo "<p> Initial Balance = $$balance</p>";
		echo "<p> Interest Rate = $intRate% / year</p>";
		//Fill Table with a For_lOOP
		$year=1;
		do{
			//calculations here
			//$balance=$balance*(1+$intrate/100);
			$balance*=(1+$intRate/100);
			$balance=number_format($balance, 2, '.', '');
			//display here
			echo "<tr><td>$year</td>";
			echo "<td>$balance</td></tr>";
		} while (++$year<=$numYrs){
			//calculations here
			//$balance=$balance*(1+$intrate/100);
			$balance*=(1+$intRate/100);
			$balance=number_format($balance, 2, '.', '');
			//display here
			echo "<tr><td>$year</td>";
			echo "<td>$balance</td></tr>";
		}
?>
</table>

</body>
</html>