<?php 
session_start();
require_once __DIR__ . '/../../utils/functions.php';
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ODS 4</title>
    <link rel="stylesheet" href="/workspace/public/css/auth.css?v=<?php echo time(); ?>">
</head>
<body>
    <div class="container">
        <div class="auth-header">
            <img src="/workspace/public/img/logos/ods4logo.png" alt="Logo ODS 4" class="logo">
            <h2>Iniciar Sesión</h2>
        </div>
        
        <?php
        $error = get_error();
        if ($error): ?>
            <div class="alert alert-error">
                <?php echo htmlspecialchars($error); ?>
            </div>
        <?php endif; ?>
        
        <form action="/workspace/src/auth/procesar_login.php" method="POST">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            
            <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
        </form>
        
        <p class="auth-link">¿No tienes una cuenta? <a href="/workspace/src/auth/registro.php">Regístrate aquí</a></p>
    </div>
</body>
</html>