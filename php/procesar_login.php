<?php
require_once("../includes/session.php");
start_secure_session();
require_once("../includes/csrf.php");
require_once("../includes/rate_limiter.php");
require_once("../includes/db.php");

unset($_SESSION['error_login'], $_SESSION['old_login']);

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../login.php");
    exit();
}

if (!validate_csrf_token($_POST['csrf_token'] ?? null)) {
    $_SESSION['error_login'] = "Por seguridad, vuelve a intentarlo.";
    header("Location: ../login.php");
    exit();
}

[$allowed, $retryAfter] = rate_limit_allow('login', 5, 300);
if (!$allowed) {
    $_SESSION['error_login'] = "Demasiados intentos fallidos. Inténtalo de nuevo en {$retryAfter} segundos.";
    header("Location: ../login.php");
    exit();
}

$correoInput = $_POST['correo'] ?? '';
$passwordInput = $_POST['password'] ?? '';

$correoLimpio = trim($correoInput);
$correo = filter_var($correoLimpio, FILTER_VALIDATE_EMAIL);
$password = trim($passwordInput);

if ($correo === false || $password === '') {
    $_SESSION['error_login'] = "Credenciales inválidas. Inténtalo de nuevo.";
    $_SESSION['old_login'] = ['correo' => htmlspecialchars($correoLimpio, ENT_QUOTES, 'UTF-8')];
    header("Location: ../login.php");
    exit();
}

$_SESSION['old_login'] = ['correo' => htmlspecialchars($correo, ENT_QUOTES, 'UTF-8')];

$stmt = $conn->prepare("SELECT id, nombre, correo, password FROM usuarios WHERE correo = ?");

if (!$stmt) {
    $_SESSION['error_login'] = "Ocurrió un problema al procesar la solicitud. Inténtalo más tarde.";
    $conn->close();
    header("Location: ../login.php");
    exit();
}

$stmt->bind_param("s", $correo);
$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows === 1) {
    $row = $result->fetch_assoc();
    if (password_verify($password, $row['password'])) {
        session_regenerate_id(true);
        unset($_SESSION['old_login'], $_SESSION['error_login']);
        $_SESSION['id'] = $row['id'];
        $_SESSION['nombre'] = $row['nombre'];
        $_SESSION['correo'] = $row['correo'];
        rate_limit_reset('login');
        $stmt->close();
        $conn->close();
        header("Location: ../bienvenido.php");
        exit();
    }
}

$stmt && $stmt->close();
$conn->close();

$_SESSION['error_login'] = "Credenciales inválidas. Inténtalo de nuevo.";
header("Location: ../login.php");
exit();
?>