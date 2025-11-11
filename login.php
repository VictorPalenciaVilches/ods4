<?php
require_once __DIR__ . '/includes/session.php';
start_secure_session();
require_once __DIR__ . '/includes/csrf.php';

$loginError = $_SESSION['error_login'] ?? null;
$oldLoginData = $_SESSION['old_login']['correo'] ?? '';
$csrfToken = generate_csrf_token();
unset($_SESSION['error_login'], $_SESSION['old_login']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ODS 4</title>
    <?php $cssPath = __DIR__ . '/assets/css/estilo_login.css'; ?>
    <link rel="stylesheet" href="assets/css/estilo_login.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <?php if (!empty($loginError)): ?>
        <p style="color: red; font-weight: bold; text-align: center; background-color: #fdd; padding: 10px; border-radius: 5px; margin: 10px auto;">
            <?php echo $loginError; ?>
        </p>
    <?php endif; ?>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        
        <form action="php/procesar_login.php" method="POST">
            <input type="hidden" name="csrf_token" value="<?php echo htmlspecialchars($csrfToken, ENT_QUOTES, 'UTF-8'); ?>">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" value="<?php echo $oldLoginData; ?>" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required> </div>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="registro.php">Regístrate aquí</a></p>
    </div>
</body>
</html>