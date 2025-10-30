<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 2 - Genética Básica</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_biologia/tema2.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_biologia/tema2.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 2: Genética Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Introducción a ADN, genes y herencia.</p>
            
            <h2>Objetivo</h2>
            <p>Comprender conceptos básicos de genética y transmisión de caracteres.</p>
            
            <h2>Contenidos</h2>
            <ul>
                <li>Estructura del ADN.</li>
                <li>Genes y cromosomas.</li>
                <li>Leyes de Mendel básicas.</li>
            </ul>
            
            <h2>Ejemplo</h2>
            <p>Cruce de guisantes: fenotipo y genotipo.</p>
            
            <div class="tema-actions">
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
            </div>
        </div>
    </div>
</body>
</html>