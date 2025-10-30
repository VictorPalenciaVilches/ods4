<?php
session_start();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Comprensión Lectora</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_lenguacastellana/tema4.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_lenguacastellana/tema4.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 4: Comprensión Lectora</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Mejora tus habilidades para identificar ideas principales y hacer inferencias a partir de los textos.</p>

            <h2>Objetivo</h2>
            <p>Desarrollar estrategias para entender, resumir y analizar textos de diversos tipos.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Estrategias de lectura (skimming, scanning).</li>
                <li>Identificación de estructura textual.</li>
                <li>Resumir y parafrasear textos.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Lee un pequeño texto y extrae la idea principal en una oración.</p>

            <div class="tema-actions">
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
        </div>
    </div>
</body>
</html>