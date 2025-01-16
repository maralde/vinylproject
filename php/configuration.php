<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$servername = "loclhost";
$username = "root";
$password = "";
$dbname = "vinyl";

$conn = new mysqli($servername, $username, $password, $dbname);

if($conn->connect_error){
    die("Conexión fallida: " . $conn->connect_error);
}