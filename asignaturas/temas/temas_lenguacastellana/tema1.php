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
    <title>Tema 1 - Ortografía y Acentuación</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 1: Ortografía y Acentuación</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás las reglas básicas y excepciones de acentuación en español.</p>

            <h2>Objetivo</h2>
            <p>Identificar cuándo y por qué se usan tildes en palabras agudas, graves y esdrújulas.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Clasificación de palabras por acentuación.</li>
                <li>Reglas generales y casos especiales.</li>
                <li>Ejercicios prácticos de acentuación.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>La palabra "telefono" sin tilde es incorrecta; correctamente: "teléfono" (esdrújula).</p>

            <div class="tema-actions">
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
        </div>
    </div>
</body>
</html>