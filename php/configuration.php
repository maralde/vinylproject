<?php

$servername = getenv('MYSQLHOST');
$username = getenv('MYSQLUSER');
$password = getenv('MYSQLPASSWORD');
$dbname = getenv('MYSQLDATABASE');

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
}