<?php
$db_host = "209.129.8.3";
$db_username = "47924";
$db_pass = "47924cis12";
$db_name = "47924";

//$db_host = "localhost";
//$db_username = "root";
//$db_pass = "47924cis12";
//$db_name = "47924";
$conn = mysql_connect("$db_host", "$db_username", "$db_pass") or die ("Could not connect to mysql");
mysql_select_db("$db_name") or die ("no database");
?>