<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 5 - Globalización y Sociedad</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_ciencias_sociales/tema5.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_ciencias_sociales/tema5.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 5: Globalización y Sociedad</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Analiza cómo la globalización afecta culturas y economías.</p>
            <h2>Objetivo</h2>
            <p>Identificar efectos positivos y negativos de la globalización.</p>
            <h2>Contenidos</h2>
            <ul>
                <li>Intercambio cultural.</li>
                <li>Economía global y comercio.</li>
                <li>Movilidad y migración.</li>
            </ul>
            <h2>Ejemplo</h2>
            <p>Debate: ¿La globalización ayuda o perjudica a las economías locales?</p>
            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
</body>
</html>