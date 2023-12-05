<?php

// Set the database access information as constants:
DEFINE ('DB_USER', 'root');
DEFINE ('DB_PASSWORD', 'rootpassword');
// DEFINE ('DB_HOST', 'localhost');
// 'db' is the name of the docker container defined in docker-compose.yml
DEFINE ('DB_HOST', 'db');
DEFINE ('DB_NAME', 'lost_and_found');

// Make the connection:
$dbc = @mysqli_connect (DB_HOST, DB_USER, DB_PASSWORD, DB_NAME)
OR die ('Could not connect to MySQL: ' . mysqli_connect_error() );

// Set the encoding...
mysqli_set_charset($dbc, 'utf8');

?>
