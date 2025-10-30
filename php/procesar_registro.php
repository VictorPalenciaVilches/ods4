<?php
include("../includes/db.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $nombre = $conn->real_escape_string($_POST['nombre']);
    $correo = $conn->real_escape_string($_POST['correo']);
    $password = $_POST['password'];

    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO usuarios (nombre, correo, password) VALUES ('$nombre', '$correo', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        header("Location: ../registro_exitoso.html");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>