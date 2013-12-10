<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Savings Calulator</title>
<?php

	function save5($p,$i5,$n){
		$sav5=$p;
		for($year=1;$year<=$n;$year++){
			$sav5*=(1+$i5);
		}
		return $sav5;
	}
	
	function save6($p,$i6,$n){
		$sav6=$p;
		for($year=1;$year<=$n;$year++){
			$sav6*=(1+$i6);
		}
		return $sav6;
	}
	
	function save7($p,$i7,$n){
		$sav7=$p;
		for($year=1;$year<=$n;$year++){
			$sav7*=(1+$i7);
		}
		return $sav7;
	}
	
	function save8($p,$i8,$n){
		$sav8=$p;
		for($year=1;$year<=$n;$year++){
			$sav8*=(1+$i8);
		}
		return $sav8;
	}
	
	function save9($p,$i9,$n){
		$sav9=$p;
		for($year=1;$year<=$n;$year++){
			$sav9*=(1+$i9);
		}
		return $sav9;
	}
	
	function save10($p,$i10,$n){
		$sav10=$p;
		for($year=1;$year<=$n;$year++){
			$sav10*=(1+$i10);
		}
		return $sav10;
	}

?>
</head>

<body>
<?php

		$n=$_GET["numYrs"];
		$p=$_GET["balance"];
		echo "<p> Initial Balance = $$p</p>";



	
	/*
	$p=1e2;
	$p5=1e2;//principle
	$p6=1e2;
	$p7=1e2;
	$p8=1e2;
	$p9=1e2;
	$p10=1e2;						*/
	$i5=5e-2;//interest
	$i6=6e-2;
	$i7=7e-2;
	$i8=8e-2;
	$i9=9e-2;
	$i10=10e-2;
	/*$n5=5e1;//years
	$n6=5e1;
	$n7=5e1;
	$n8=5e1;
	$n9=5e1;
	$n10=5e1;						*/
	$savings5=array();
	$savings6=array();
	$savings7=array();
	$savings8=array();
	$savings9=array();
	$savings10=array();
	
	//Calculations
	for($year=0;$year<=$n;$year++){
		$savings5[$year]=save5($p,$i5,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings6[$year]=save6($p,$i6,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings7[$year]=save7($p,$i7,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings8[$year]=save8($p,$i8,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings9[$year]=save9($p,$i9,$year);
	}
	for($year=0;$year<=$n;$year++){
		$savings10[$year]=save10($p,$i10,$year);
	}
	
	//string
	$str='<table width="200" border="1">';
	$str.="<tr>";
	$str.="<th rowspan='2'>YEAR</th>";
	$str.="<th colspan='7'>INTEREST RATE</th>";
	$str.="</tr>";
	$str.="<tr>";
	$str.="<th>5%</th>";
	$str.="<th>6%</th>";
	$str.="<th>7%</th>";
	$str.="<th>8%</th>";
	$str.="<th>9%</th>";
	$str.="<th>10%</th>";
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



</body>
</html>





