<table>
<tr>
<td bgcolor="gray">Name</td><td bgcolor="gray">Occupation</td><td bgcolor="gray">Age</td>
</tr>
<?php

/*
*	Code Written by Shane Perreault
*	http://shaneprrlt.tumblr.com
*	Written for WebDevRefinery.com
*
*	Notes:
*	
*	We will be learning PDO today. PDO or PHP Data Objects 
*	is a library of PHP that is much faster, secure, and in my
*	opinion, easier to write in. We will be covering these ideas.
*	*Connect to a DB
*	*Passing Queries with Prepared Statements
*	*Parameterizing Queries
*	*Looping While Statements for DB items
*	
*/

//Connect to DB
$host = "localhost"; //Host Name
$port = '3306'; //Default MySQL Port
$dbname = "PDO_TEST"; //Database Name
$db_username = "root"; //MySQL Username
$db_password = "47924cis12"; //MySQL Password
$table_n = "people"; //Our Table where we will hold people

$dsn = "mysql:host=$host;port=$port;dbname=$dbname"; //Data Source Name = Mysql
$db = new PDO($dsn, $db_username, $db_password); //Connect to DB

//I like to first make a query string and put it in a variable.
$query = "SELECT * FROM $table_n WHERE name = ?";

//Now let's create our Statement where we will do our query.
$statement = $db->prepare($query); //We are calling the DB which is an object
//	And telling it to prepare our query. All operators will be displayed below.

//Our Name will be Bob
$name = "Bob";

//Now let's execute our query
$statement->execute(array($name));

//Now we create a while loop for every entry in our DB where the name is Bob.
while($row = $statement->fetchObject()) //This is similar to mysql_fetch_array, only we're 
{
$name = $row->name;
$job = $row->occupation;
$age = $row->age;
?>
<tr>
<td><?php echo($name); ?></td><td><?php echo($job); ?></td><td><?php echo($age); ?></td>
</tr>
<?php
}

?>
</table>