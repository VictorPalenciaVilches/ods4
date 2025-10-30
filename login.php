<?php session_start(); ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión - ODS 4</title>
    <?php $cssPath = __DIR__ . '/css/estilo_login.css'; ?>
    <link rel="stylesheet" href="css/estilo_login.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <?php
    if (isset($_SESSION['error_login'])) {
        echo '<p style="color: red; font-weight: bold; text-align: center; background-color: #fdd; padding: 10px; border-radius: 5px; margin: 10px auto;">' . $_SESSION['error_login'] . '</p>';
        unset($_SESSION['error_login']);
    }
    ?>
    <div class="container">
        <h2>Iniciar Sesión</h2>
        
        <form action="php/procesar_login.php" method="POST">
            <div class="form-group">
                <label for="correo">Correo Electrónico:</label>
                <input type="email" id="correo" name="correo" required>
            </div>
            
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required> </div>
            
            <button type="submit">Iniciar Sesión</button>
        </form>
        
        <p>¿No tienes una cuenta? <a href="registro.html">Regístrate aquí</a></p>
    </div>
</body>
</html>