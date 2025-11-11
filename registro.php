<?php
require_once __DIR__ . '/includes/session.php';
start_secure_session();
require_once __DIR__ . '/includes/csrf.php';

$registerError = $_SESSION['error_register'] ?? null;
$oldRegister = $_SESSION['old_register'] ?? [];
$csrfToken = generate_csrf_token();
unset($_SESSION['error_register'], $_SESSION['old_register']);
$cssPath = __DIR__ . '/assets/css/estilo_registro.css';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro - ODS 4</title>
    <link rel="stylesheet" href="assets/css/estilo_registro.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="container">
        <h2>Registro de Usuario</h2>
        <?php if (!empty($registerError)): ?>
            <p style="color: #721c24; font-weight: bold; text-align: center; background-color: #f8d7da; padding: 10px; border-radius: 5px; margin-bottom: 20px;">
                <?php echo $registerError; ?>
            </p>
        <?php endif; ?>
        <form action="php/procesar_registro.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" value="<?php echo $oldRegister['nombre'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $oldRegister['correo'] ?? ''; ?>" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <button type="submit">Registrarse</button>
        </form>
        <p>¿Ya tienes una cuenta? <a href="login.php">Inicia Sesión aquí</a></p>
    </div>
</body>
</html>