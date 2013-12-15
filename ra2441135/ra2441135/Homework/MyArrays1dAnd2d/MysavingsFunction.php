<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Writing our Own Functions</title>
<?php
	//Using loops
	function save($p,$i,$n){
		$sav=$p;
		for($year=1;$year<=$n;$year++){
			$sav*=(1+$i);
		}
		return $sav;
	}
?>
</head>

<body>
<?php
	//Test our function
	//Declare and initialize variables
	$p=1e2;//principle -> $100
	$i=5e-2;//interest -> 5%
	$i2=6e-2;//interest -> 6%
	$i3=7e-2;//interest -> 7%
	$i4=8e-2;//interest -> 8%
	$i5=9e-2;//interest -> 9%
	$i6=10e-2;//interest -> 10%
	$n=5e1;//years -> 50
	$savings=array();
	$savings2=array();

	//Calculate savings for 0 to 50 years

	//for interest rate 5%($i,$savings)
	for($year=0;$year<=$n;$year++){
		$savings[$year]=save($p,$i,$year);
	}
	//for interest rate 6%($i2,$savings2)
	for($year=0;$year<=$n;$year++){
		$savings2[$year]=save($p,$i2,$year);
	}
	//for interest rate 7%($i3,$savings3)
	for($year=0;$year<=$n;$year++){
		$savings3[$year]=save($p,$i3,$year);
	}
	//for interest rate 8%($i4,$savings4)
	for($year=0;$year<=$n;$year++){
		$savings4[$year]=save($p,$i4,$year);
	}
	//for interest rate 9%($i5,$savings5)
	for($year=0;$year<=$n;$year++){
		$savings5[$year]=save($p,$i5,$year);
	}
	//for interest rate 10%($i6,$savings6)
	for($year=0;$year<=$n;$year++){
		$savings6[$year]=save($p,$i6,$year);
	}

	//Generate the result in a string
	$str='<table width="200" border="1">';
	$str.="<tr>";
	$str.="<th>YEAR</th>";
	$str.="<th>SAVINGS AT 5% $</th>";
	$str.="<th>SAVINGS AT 6% $</th>";
	$str.="<th>SAVINGS AT 7% $</th>";
	$str.="<th>SAVINGS AT 8% $</th>";
	$str.="<th>SAVINGS AT 9% $</th>";
	$str.="<th>SAVINGS AT 10% $</th>";
	$str.="</tr>";
	for($year=0;$year<=$n;$year++){
		$str.="<tr>";
		$str.="<th>$year</th>";
		$str.="<td>".number_format($savings[$year],2)."</td>";
		$str.="<td>".number_format($savings2[$year],2)."</td>";
		$str.="<td>".number_format($savings3[$year],2)."</td>";
		$str.="<td>".number_format($savings4[$year],2)."</td>";
		$str.="<td>".number_format($savings5[$year],2)."</td>";
		$str.="<td>".number_format($savings6[$year],2)."</td>";

	}

	$str.="</table>";

	//Output
	echo $str;
?>

  <tr>

    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>


<tr></tr>
<tr></tr>


