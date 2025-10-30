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
    <title>Tema 5 - Redacción de Textos</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_lenguacastellana/tema5.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_lenguacastellana/tema5.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 5: Redacción de Textos</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende a planificar y redactar textos coherentes y bien estructurados.</p>

            <h2>Objetivo</h2>
            <p>Planificar, redactar y revisar un texto corto (ej. un párrafo argumentativo).</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Planificación y esquemas.</li>
                <li>Redacción y revisión.</li>
                <li>Uso de conectores y coherencia.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Escribe un párrafo de 5-7 oraciones defendiendo tu opinión sobre la importancia de la lectura.</p>

            <div class="tema-actions">
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
        </div>
    </div>
</body>
</html>