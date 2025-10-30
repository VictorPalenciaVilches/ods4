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
    <title>Tema 5 - Problemas y Aplicaciones</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_matematica/tema5.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_matematica/tema5.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 5: Problemas y Aplicaciones</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema integrarás los conocimientos adquiridos en problemas reales.</p>

            <h2>Objetivo</h2>
            <p>Resolver problemas matemáticos aplicados que involucren álgebra, polinomios y geometría básica.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Problemas de mezcla y proporciones.</li>
                <li>Problemas de movimiento y velocidad (introducción).</li>
                <li>Resolución de problemas combinados que integran varias habilidades.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Un tren recorre 120 km en 2 horas. ¿Cuál es su velocidad media? Respuesta: v = d/t = 120 / 2 = 60 km/h.</p>

            <div class="tema-actions">
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
                
            </div>
        </div>
    </div>
</body>
</html>