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
    <title>Tema 4 - Geometría Básica</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_matematica/tema4.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_matematica/tema4.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 4: Geometría Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En esta unidad revisaremos cómo calcular áreas y perímetros de las figuras más comunes.</p>

            <h2>Objetivo</h2>
            <p>Calcular áreas y perímetros de cuadrados, rectángulos, triángulos y círculos; aplicar fórmulas en problemas prácticos.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Fórmulas de área y perímetro.</li>
                <li>Conceptos de base, altura y radio.</li>
                <li>Problemas aplicados de medición.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Área de un rectángulo 5 x 3: A = 5 * 3 = 15 unidades².</p>

            <div class="tema-actions">
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
                
            </div>
        </div>
    </div>
</body>
</html>