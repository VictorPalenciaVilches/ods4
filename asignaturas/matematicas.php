<?php
require_once __DIR__ . '/../includes/session.php';
start_secure_session();

// Bloqueo de Seguridad: Redirige si el usuario no ha iniciado sesión
if (!isset($_SESSION['correo'])) {
    header("Location: ../login.php");
    exit();
}

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Matemáticas - Temas</title>
    <?php $cssPath = __DIR__ . '/../assets/css/estilo_matematica.css'; ?>
    <link rel="stylesheet" href="../assets/css/estilo_matematica.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>"> 
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <h1>Matemáticas — Temas</h1>
            <div class="header-actions">
                <a href="../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>
            <p>Selecciona uno de los temas disponibles para comenzar:</p>

            <div class="temas-list">
                <ul>
                    <li>
                        <a href="temas/temas_matematica/tema1.php">Tema 1: Introducción al Álgebra</a>
                        <p class="descripcion">Conceptos básicos: variables, expresiones y resolución de ecuaciones sencillas.</p>
                    </li>
                    <li>
                        <a href="temas/temas_matematica/tema2.php">Tema 2: Operaciones con Polinomios</a>
                        <p class="descripcion">Suma, resta, multiplicación y factorización de polinomios.</p>
                    </li>
                    <li>
                        <a href="temas/temas_matematica/tema3.php">Tema 3: Ecuaciones Lineales</a>
                        <p class="descripcion">Resolución de ecuaciones de primer grado y sistemas simples.</p>
                    </li>
                    <li>
                        <a href="temas/temas_matematica/tema4.php">Tema 4: Geometría Básica</a>
                        <p class="descripcion">Áreas, perímetros y propiedades de figuras planas.</p>
                    </li>
                    <li>
                        <a href="temas/temas_matematica/tema5.php">Tema 5: Trigonometría</a>
                        <p class="descripcion">Razones trigonométricas básicas y aplicaciones en triángulos.</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</body>
</html>