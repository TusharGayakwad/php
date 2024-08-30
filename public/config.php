<?php
define('DB_SERVER', 'database-1.chgcawess2vp.us-west-2.rds.amazonaws.com');
define('DB_USERNAME', 'admin');
define('DB_PASSWORD', 'passwd');
define('DB_NAME', 'mydb');

// Attempt to connect to MySQL database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if($link === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}

echo "Connected successfully!";
?>
