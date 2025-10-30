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
    <title>Tema 2 - Signos de Puntuación</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_lenguacastellana/tema2.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_lenguacastellana/tema2.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 2: Signos de Puntuación</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende el uso correcto de puntos, comas, y otros signos para mejorar tus textos.</p>

            <h2>Objetivo</h2>
            <p>Usar adecuadamente los signos de puntuación para construir textos claros y coherentes.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Punto y coma, dos puntos y punto.</li>
                <li>Uso de comas en enumeraciones y oraciones compuestas.</li>
                <li>Uso de comillas y paréntesis.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Correcto: "Juan fue al mercado, compró frutas y regresó." Incorrecto: "Juan fue al mercado compró frutas y regresó".</p>

            <div class="tema-actions">
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
        </div>
    </div>
</body>
</html>