<?php
require_once("../includes/session.php");
start_secure_session();
require_once("../includes/csrf.php");
require_once("../includes/rate_limiter.php");
require_once("../includes/db.php");

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../registro.php");
    exit();
}

if (!validate_csrf_token($_POST['csrf_token'] ?? null)) {
    $_SESSION['error_register'] = "Por seguridad, vuelve a intentarlo.";
    header("Location: ../registro.php");
    exit();
}

[$allowed, $retryAfter] = rate_limit_allow('register', 5, 900);
if (!$allowed) {
    $_SESSION['error_register'] = "Has hecho demasiados intentos. Vuelve a intentarlo en {$retryAfter} segundos.";
    header("Location: ../registro.php");
    exit();
}

$nombreRaw = trim($_POST['nombre'] ?? '');
$correoRaw = trim($_POST['correo'] ?? '');
$passwordRaw = $_POST['password'] ?? '';

$errores = [];

if ($nombreRaw === '' || mb_strlen($nombreRaw) < 3 || mb_strlen($nombreRaw) > 100) {
    $errores[] = "El nombre debe tener entre 3 y 100 caracteres.";
}

$correoValido = filter_var($correoRaw, FILTER_VALIDATE_EMAIL);
if ($correoValido === false) {
    $errores[] = "Ingresa un correo electrónico válido.";
}

if (strlen($passwordRaw) < 8) {
    $errores[] = "La contraseña debe tener al menos 8 caracteres.";
}

$_SESSION['old_register'] = [
    'nombre' => htmlspecialchars($nombreRaw, ENT_QUOTES, 'UTF-8'),
    'correo' => htmlspecialchars($correoRaw, ENT_QUOTES, 'UTF-8'),
];

if (!empty($errores)) {
    $_SESSION['error_register'] = implode('<br>', array_map(function ($mensaje) {
        return htmlspecialchars($mensaje, ENT_QUOTES, 'UTF-8');
    }, $errores));
    header("Location: ../registro.php");
    exit();
}

$hashedPassword = password_hash($passwordRaw, PASSWORD_DEFAULT);

$stmt = $conn->prepare("SELECT id FROM usuarios WHERE correo = ?");
if (!$stmt) {
    $_SESSION['error_register'] = "Ocurrió un problema al procesar la solicitud. Intenta nuevamente más tarde.";
    $conn->close();
    header("Location: ../registro.php");
    exit();
}

$stmt->bind_param("s", $correoValido);
$stmt->execute();
$stmt->store_result();

$duplicateEmail = $stmt->num_rows > 0;
$stmt->close();

if ($duplicateEmail) {
    $_SESSION['error_register'] = "Ese correo electrónico ya está registrado. Inicia sesión o utiliza otro correo.";
    $conn->close();
    header("Location: ../registro.php");
    exit();
}

$stmtInsert = $conn->prepare("INSERT INTO usuarios (nombre, correo, password) VALUES (?, ?, ?)");
if (!$stmtInsert) {
    $_SESSION['error_register'] = "Ocurrió un problema al guardar la información.";
    $conn->close();
    header("Location: ../registro.php");
    exit();
}

$stmtInsert->bind_param("sss", $nombreRaw, $correoValido, $hashedPassword);

if ($stmtInsert->execute()) {
    $stmtInsert->close();
    $conn->close();
    rate_limit_reset('register');
    unset($_SESSION['old_register'], $_SESSION['error_register']);
    header("Location: ../registro_exitoso.php");
    exit();
}

$stmtInsert->close();
$conn->close();

$_SESSION['error_register'] = "Ocurrió un problema al guardar la información.";
header("Location: ../registro.php");
exit();
?>