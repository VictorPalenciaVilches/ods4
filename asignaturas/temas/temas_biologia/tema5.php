<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 5 - Genética y Sociedad</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_biologia/tema5.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_biologia/tema5.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 5: Genética y Sociedad</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Debate sobre implicaciones éticas y aplicaciones de la genética.</p>

            <h2>Objetivo</h2>
            <p>Reflexionar sobre los avances genéticos y su impacto en la sociedad.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Tecnologías genéticas básicas.</li>
                <li>Aspectos éticos y legales.</li>
                <li>Aplicaciones médicas y agrícolas.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Discusión: Ventajas y riesgos de la edición genética.</p>

            <div class="tema-actions">
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
            </div>
        </div>
    </div>
</body>
</html>