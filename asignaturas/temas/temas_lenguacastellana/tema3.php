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
    <title>Tema 3 - Estructura del Párrafo</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_lenguacastellana/tema3.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_lenguacastellana/tema3.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 3: Estructura del Párrafo</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende a construir párrafos coherentes con idea principal y oraciones de apoyo.</p>

            <h2>Objetivo</h2>
            <p>Identificar y redactar la idea principal, oraciones de apoyo y la oración final en un párrafo.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Idea principal y oraciones secundarias.</li>
                <li>Conectores y cohesión textual.</li>
                <li>Tipos de párrafos (descriptivo, narrativo, argumentativo).</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Ejemplo de párrafo: "La lluvia refrescó el aire. Las plantas recuperaron su color y la ciudad olía a tierra mojada."</p>

            <div class="tema-actions">
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
        </div>
    </div>
</body>
</html>