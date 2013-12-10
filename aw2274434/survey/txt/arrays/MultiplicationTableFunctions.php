<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Multiplication Table</title>
<?php
	function createArray($rows,$cols){
		//Declare the 2-dimensional array
		$array=array();
		for($row=0;$row<$rows;$row++){
			$array[$row]=array();
		}
		return $array;
	}
	function fillArray(&$array,$rows,$cols){
		//Fill table with information
		for($row=0;$row<$rows;$row++){
			for($col=0;$col<$cols;$col++){
				$array[$row][$col]=
			     ($row+1)*($col+1);
			}
		}
	}
	function displayArray($array,$rows,$cols){
		//Create the string and return
		$str='<table width="200" border="1">';
		for($row=0;$row<$rows;$row++){
			$str.="<tr>";
			for($col=0;$col<$cols;$col++){
				$str.=("<td>".
			       $array[$row][$col].
				   "</td>");
			}
			$str.="</tr>";
		}
		$str.="</table>";
		return $str;
	}
?>
</head>

<body>
<?php

	$rows=$_GET["rows"];
	$cols=$_GET["cols"];
		echo 	"<p> Rows = $rows<br/> 
				Columns = $cols</p>";
	//Declare the 2-dimensional array
	$multTab=createArray($rows,$cols);
	//Fill table with information
	fillArray($multTab,$rows,$cols);
    //Display the table
	$str=displayArray($multTab,$rows,$cols);
	echo $str;
?>
</body>
</html>