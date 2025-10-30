<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 2 - Geografía y Mapas</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_ciencias_sociales/tema2.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_ciencias_sociales/tema2.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 2: Geografía y Mapas</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende sobre mapas, coordenadas y elementos geográficos.</p>
            <h2>Objetivo</h2>
            <p>Interpretar mapas y ubicar elementos geográficos básicos.</p>
            <h2>Contenidos</h2>
            <ul>
                <li>Coordenadas y escalas.</li>
                <li>Mapas políticos y físicos.</li>
                <li>Interpretación de leyendas.</li>
            </ul>
            <h2>Ejemplo</h2>
            <p>Localiza tu ciudad en un mapa usando coordenadas.</p>
            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
</body>
</html>