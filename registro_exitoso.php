<?php $cssPath = __DIR__ . '/assets/css/estilo_registro.css'; ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Exitoso</title>
    <link rel="stylesheet" href="assets/css/estilo_registro.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="container">
        <h2>¡Registro Exitoso!</h2>
        <p>Tu cuenta ha sido creada. Ahora puedes iniciar sesión para acceder al contenido.</p>
        <a href="login.php">Iniciar Sesión</a>
    </div>
</body>
</html>