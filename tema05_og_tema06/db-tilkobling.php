<?php 

/* This code simply tried to access the user credentials and then try to connect to the database, if not successful it dies */

$host = getenv('DB_HOST');
$username = getenv('DB_USER');
$password = getenv('DB_PASSWORD');
$database = getenv('DB_DATABASE');

$db=mysqli_connect($host,$username,$password,$database) or die ("ikke kontakt med database-server");

?>