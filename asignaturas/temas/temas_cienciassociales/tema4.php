<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 4 - Economía Básica</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_ciencias_sociales/tema4.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_ciencias_sociales/tema4.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 4: Economía Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Conceptos básicos de economía personal y comunitaria.</p>
            <h2>Objetivo</h2>
            <p>Entender principios económicos simples: oferta, demanda y presupuesto.</p>
            <h2>Contenidos</h2>
            <ul>
                <li>Oferta y demanda.</li>
                <li>Presupuesto personal.</li>
                <li>Consumo responsable.</li>
            </ul>
            <h2>Ejemplo</h2>
            <p>Calcula un presupuesto mensual sencillo.</p>
            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
</body>
</html>