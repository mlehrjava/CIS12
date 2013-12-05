<!DOCTYPE html>
<html>
<head>

</head>
<body>
<div id="main">

<?php
//create an ADO connection and open the database
$con=mysqli_connect("localhost","root","","47924");
// Check connection
if (mysqli_connect_errno())
  {
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }
  $result = mysqli_query($con,"SELECT * FROM ra2441135_isskar_entity_terminology");
echo "<table border='1' style='border:white 1px solid; color:white;background-color:black;'>"; 
echo "<tr><th>Term</th><th>Definition</th><th>Alias</th></tr>";
while($row = mysqli_fetch_array($result)) //looping through the recordset (until End Of File)
	{
		echo "<tr>";
		echo "<td>" . $row['term'] . "</td>";
		echo "<td>" . $row['definition'] . "</td>";
		echo "<td>" . $row['alias'] . "</td>";
		echo "</tr>";
	}
echo "</table>";
?> 


</div>
</body>
</html> 