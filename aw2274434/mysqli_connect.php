<?php 

DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', '47924cis12');
DEFINE ('DB_HOST', 'localhost');
DEFINE ('DB_NAME', '47924');
//DEFINE ('DB_USER', '47924');
//DEFINE ('DB_PASSWORD', '47924cis12');
//DEFINE ('DB_HOST', '209.129.8.3');
//DEFINE ('DB_NAME', '47924');

$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME) OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );


mysqli_set_charset($dbc, 'utf8');

?>