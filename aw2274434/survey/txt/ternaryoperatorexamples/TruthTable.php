<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Truth Table</title>
</head>

<body>
<table width="200" border="1">
<tr>
<th>x</th>
<th>y</th>
<th>!x</th>
<th>!y</th>
<th>x&&y</th>
<th>x||y</th>
<th>x^y</th>
<th>x^y^y</th>
<th>x^y^x</th>
<th>!(x&&y)</th>
<th>!|x||!y</th>
<th>!(x||y)</th>
<th>!x&&!y</th>
</tr>
<tr>
<?php
//First row of truth table
//set x and y
$x=true; $y=true;
//output the cells for this row
echo "<td>".($x?'T':'F')."</td>";
echo "<td>".($y?'T':'F')."</td>";
echo "<td>".(!$x?'T':'F')."</td>";
echo "<td>".(!$y?'T':'F')."</td>";
echo "<td>".($x&&$y?'T':'F')."</td>";
echo "<td>".($x||$y?'T':'F')."</td>";
echo "<td>".($x^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$x?'T':'F')."</td>";
echo "<td>".(!($x&&$y)?'T':'F')."</td>";
echo "<td>".(!$x||!$y?'T':'F')."</td>";
echo "<td>".(!($x||$y)?'T':'F')."</td>";
echo "<td>".(!$x&&!$y?'T':'F')."</td>";
?>
</tr>

<tr>
<?php
//Second row of truth table
//declare x and y
$y=false;
//output the cells for this row
echo "<td>".($x?'T':'F')."</td>";
echo "<td>".($y?'T':'F')."</td>";
echo "<td>".(!$x?'T':'F')."</td>";
echo "<td>".(!$y?'T':'F')."</td>";
echo "<td>".($x&&$y?'T':'F')."</td>";
echo "<td>".($x||$y?'T':'F')."</td>";
echo "<td>".($x^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$x?'T':'F')."</td>";
echo "<td>".(!($x&&$y)?'T':'F')."</td>";
echo "<td>".(!$x||!$y?'T':'F')."</td>";
echo "<td>".(!($x||$y)?'T':'F')."</td>";
echo "<td>".(!$x&&!$y?'T':'F')."</td>";
?>
</tr>

<tr>
<?php
//Third row of truth table
$x=false; $y=true;

echo "<td>".($x?'T':'F')."</td>";
echo "<td>".($y?'T':'F')."</td>";
echo "<td>".(!$x?'T':'F')."</td>";
echo "<td>".(!$y?'T':'F')."</td>";
echo "<td>".($x&&$y?'T':'F')."</td>";
echo "<td>".($x||$y?'T':'F')."</td>";
echo "<td>".($x^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$x?'T':'F')."</td>";
echo "<td>".(!($x&&$y)?'T':'F')."</td>";
echo "<td>".(!$x||!$y?'T':'F')."</td>";
echo "<td>".(!($x||$y)?'T':'F')."</td>";
echo "<td>".(!$x&&!$y?'T':'F')."</td>";
?>
</tr>

<tr>
<?php
//fourth row of truth table
$x=false; $y=false;

echo "<td>".($x?'T':'F')."</td>";
echo "<td>".($y?'T':'F')."</td>";
echo "<td>".(!$x?'T':'F')."</td>";
echo "<td>".(!$y?'T':'F')."</td>";
echo "<td>".($x&&$y?'T':'F')."</td>";
echo "<td>".($x||$y?'T':'F')."</td>";
echo "<td>".($x^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$y?'T':'F')."</td>";
echo "<td>".($x^$y^$x?'T':'F')."</td>";
echo "<td>".(!($x&&$y)?'T':'F')."</td>";
echo "<td>".(!$x||!$y?'T':'F')."</td>";
echo "<td>".(!($x||$y)?'T':'F')."</td>";
echo "<td>".(!$x&&!$y?'T':'F')."</td>";
?>
</tr>
</body>
</html>