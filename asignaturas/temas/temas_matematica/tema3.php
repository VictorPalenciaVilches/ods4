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
    <title>Tema 3 - Ecuaciones Lineales</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_matematica/tema3.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_matematica/tema3.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 3: Ecuaciones Lineales</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás técnicas para resolver ecuaciones y aplicar soluciones a problemas reales.</p>

            <h2>Objetivo</h2>
            <p>Dominar la resolución de ecuaciones lineales y traducir problemas verbales a ecuaciones matemáticas.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Resolución paso a paso de ecuaciones lineales.</li>
                <li>Sistemas simples de ecuaciones (introducción).</li>
                <li>Aplicaciones en problemas de la vida cotidiana.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Si 3x - 5 = 10, entonces 3x = 15 → x = 5.</p>

            <div class="tema-actions">
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
                
            </div>
        </div>
    </div>
</body>
</html>