<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiplication Table</title>
</head>

<body>
<h1>Multiplication Table</h1>
<?php
	$rows=$_GET["rows"];
	$cols=$_GET["cols"];
		echo 	"<p> Rows = $rows<br/> 
				Columns = $cols</p>";
				
				

	$multTab=array();
	for($row=0;$row<$rows;$row++){
		$multTab[$row]=array();
	}

	for($row=0;$row<$rows;$row++){
		for($col=0;$col<$cols;$col++){
			$multTab[$row][$col]=
			     ($row+1)*($col+1);
		}
	}
?>
<table width="200" border="1">
<?php

	$str="";
	for($row=0;$row<$rows;$row++){
		$str.="<tr>";
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
</body>
</html>