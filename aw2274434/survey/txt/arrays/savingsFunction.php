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
	$i5=5e-2;//interest -> 5%
	$i6=6e-2;//interest -> 6%
	$i7=7e-2;//interest -> 7%
	$i8=8e-2;//interest -> 8%
	$i9=9e-2;//interest -> 9%
	$i10=10e-2;//interest -> 10%
	
	$n=5e1;//years -> 50
	$savings8=array();
	
	//Calculate savings for 0 to 50 years
	for($year=0;$year<=$n;$year++){
		$savings5[$year]=save($p,$i5,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings6[$year]=save($p,$i6,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings7[$year]=save($p,$i7,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings8[$year]=save($p,$i8,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings9[$year]=save($p,$i9,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings10[$year]=save($p,$i10,$year);
	}
	
	//Generate the result in a string
	$str='<table width="200" border="1">';
	$str.="<tr>";
	$str.="<th>YEAR</th>";
	$str.="<th>SAVINGS $ 5%</th>";
	$str.="<th>SAVINGS $ 6%</th>";
	$str.="<th>SAVINGS $ 7%</th>";
	$str.="<th>SAVINGS $ 8%</th>";
	$str.="<th>SAVINGS $ 9%</th>";
	$str.="<th>SAVINGS $ 10%</th>";
	$str.="</tr>";
	for($year=0;$year<=$n;$year++){
		$str.="<tr>";
		$str.="<th>$year</th>";
		$str.="<td>".number_format($savings5[$year],2)."</td>";
		$str.="<td>".number_format($savings6[$year],2)."</td>";
		$str.="<td>".number_format($savings7[$year],2)."</td>";
		$str.="<td>".number_format($savings8[$year],2)."</td>";
		$str.="<td>".number_format($savings9[$year],2)."</td>";
		$str.="<td>".number_format($savings10[$year],2)."</td>";
		$str.="</tr>";
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





