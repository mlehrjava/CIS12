<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiplication Table</title>
<link href="main.css" rel="stylesheet" type="text/css" />
</head>

<body>
<center>
<h1>Multiplication table</h1>
<?php
	// Retrieve form values
	// 	i.e. Declare the rows and columns
	//         desired in the multiplication table
	$rows=$_GET["rows"];
	$cols=$_GET["cols"];

	//Declare the 2-dimensional array
	$multTab=array();
	for($row=0;$row<$rows;$row++){
		$multTab[$row]=array();
	}
	//Fill table with information
	for($row=0;$row<$rows;$row++){
		for($col=0;$col<$cols;$col++){
			$multTab[$row][$col]=
			     ($row+1)*($col+1);
		}
	}
?>
<!--<table width="200" border="1">
take off width attribute so you can size table
dynamically-->
<table border="1"> 
<?php
    //Display the table
	$str=" ";
	$str.="<th>x</th>";
		// puts x at beginning of header
	for($col=1;$col<=$cols;$col++) {
			$str.="<th>$col</th>";
	}
	for($row=0;$row<$rows;$row++){
		$str.="<tr>";
		$str.="<th>".($row +1)."</th>"; 
			// this adds the row header
		for($col=0;$col<$cols;$col++){
			$str.=("<td>".
			       $multTab[$row][$col].
				   "</td>");
		}
		$str.="</tr>";
	}
	echo $str;
?>
</table>
</center>
</body>
</html>