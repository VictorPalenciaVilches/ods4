<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 3 - Ciudadanía y Derechos</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_ciencias_sociales/tema3.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_ciencias_sociales/tema3.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 3: Ciudadanía y Derechos</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Conoce derechos y responsabilidades como ciudadano.</p>
            <h2>Objetivo</h2>
            <p>Identificar derechos fundamentales y deberes cívicos.</p>
            <h2>Contenidos</h2>
            <ul>
                <li>Derechos humanos básicos.</li>
                <li>Participación ciudadana.</li>
                <li>Instituciones democráticas.</li>
            </ul>
            <h2>Ejemplo</h2>
            <p>Discute cómo votar influye en la vida comunitaria.</p>
            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
</body>
</html>