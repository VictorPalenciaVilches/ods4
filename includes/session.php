<?php
// Iniciar sesión si no está iniciada
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

// Verificar si el usuario está autenticado
if (!isset($_SESSION['correo']) || !isset($_SESSION['id'])) {
    header("Location: /workspace/src/auth/login.php");
    exit();
}

// Variables globales de sesión
$usuario_id = $_SESSION['id'];
$usuario_nombre = $_SESSION['nombre'];
$usuario_correo = $_SESSION['correo'];
?>