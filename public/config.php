<?php
define('DB_SERVER', 'database-2.c3qw4u6g6zrr.ap-northeast-1.rds.amazonaws.com');
define('DB_USERNAME', 'user1');
define('DB_PASSWORD', 'mypassword');
define('DB_NAME', 'mydb');
 
// Attempt to connect to mysql database 
$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
 
// Check connection
if($link === false){
    die("ERROR: Could not connect to database. " . mysqli_connect_error());
}
?>
