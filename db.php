<?php

//$mysqli = new mysqli("31.186.53.200","Amiraev_db","JU6TC4H8q4","Amiraev_db");
$mysqli = new mysqli("localhost","postgres","postgres","portfolio");
$mysqli->set_charset('utf8mb4');

if($mysqli->connect_error) {
    die("Error: " . $mysqli->connect_error);
}?>