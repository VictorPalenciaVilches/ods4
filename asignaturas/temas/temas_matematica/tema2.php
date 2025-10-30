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
    <title>Tema 2 - Operaciones con Polinomios</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_matematica/tema2.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_matematica/tema2.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 2: Operaciones con Polinomios</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema practicarás operaciones básicas con polinomios y técnica de factorización.</p>

            <h2>Objetivo</h2>
            <p>Aprender a sumar, restar, multiplicar y factorizar polinomios simples.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Suma y resta de polinomios.</li>
                <li>Multiplicación de polinomios (distributiva y productos notables).</li>
                <li>Factorización por factores comunes y trinomios cuadrados.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Multiplicar: (x + 2)(x - 3) = x^2 - 3x + 2x -6 = x^2 - x - 6.</p>

            <div class="tema-actions">
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
                
            </div>
        </div>
    </div>
</body>
</html>