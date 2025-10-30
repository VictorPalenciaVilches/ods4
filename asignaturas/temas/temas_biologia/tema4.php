<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 4 - Salud y Medio Ambiente</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_biologia/tema4.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_biologia/tema4.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 4: Salud y Medio Ambiente</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Relación entre salud humana y medio ambiente.</p>

            <h2>Objetivo</h2>
            <p>Analizar cómo el ambiente afecta la salud y prácticas para mitigarlo.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Contaminación y salud pública.</li>
                <li>Prevención y hábitos saludables.</li>
                <li>Conservación de recursos naturales.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Impacto de la contaminación del aire en problemas respiratorios.</p>

            <div class="tema-actions">
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
            </div>
        </div>
    </div>
</body>
</html>