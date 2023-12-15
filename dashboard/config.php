<?php
/* Database credentials. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
//define('DB_SERVER', '31.186.53.200');
//define('DB_USERNAME', 'Amiraev_db');
//define('DB_PASSWORD', 'JU6TC4H8q4');
//define('DB_NAME', 'Amiraev_db');

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'portfolio');

$link = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);
$link->set_charset('utf8mb4');

if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>