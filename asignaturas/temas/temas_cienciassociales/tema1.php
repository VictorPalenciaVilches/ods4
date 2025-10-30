<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 1 - Introducción a la Historia</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_ciencias_sociales/tema1.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_ciencias_sociales/tema1.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 1: Introducción a la Historia</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Comprende cómo los eventos del pasado moldean el presente.</p>
            <h2>Objetivo</h2>
            <p>Identificar causas y consecuencias en procesos históricos básicos.</p>
            <h2>Contenidos</h2>
            <ul>
                <li>Conceptos de tiempo histórico.</li>
                <li>Causas y efectos.</li>
                <li>Fuentes históricas.</li>
            </ul>
            <h2>Ejemplo</h2>
            <p>Analiza un evento histórico y sus consecuencias locales.</p>
            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
</body>
</html>