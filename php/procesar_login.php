<?php
session_start();

include("../includes/db.php");

unset($_SESSION['error_login']);

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $correo = $conn->real_escape_string($_POST['correo']);
    $password = $_POST['password'];

    $sql = "SELECT id, nombre, correo, password FROM usuarios WHERE correo = '$correo'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashed_password = $row['password'];

        if (password_verify($password, $hashed_password)) {
            $_SESSION['id'] = $row['id'];
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['correo'] = $row['correo'];
            
            header("Location: ../bienvenido.php");
            exit();
        } else {
            $_SESSION['error_login'] = "¡Error! La contraseña es incorrecta. Inténtalo de nuevo.";
            header("Location: ../login.php");
            exit();
        }
    } else {
        $_SESSION['error_login'] = "El correo electrónico no está registrado.";
        header("Location: ../login.php");
        exit();
    }

    $conn->close();
}
header("Location: ../login.php");
exit();
?>