<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "ods4_db";


$conn = new mysqli($servername, $username, $password, $dbname);


$conn->set_charset("utf8mb4");


if ($conn->connect_error) {
    die("Error de conexión a la base de datos: " . $conn->connect_error);
}
?>