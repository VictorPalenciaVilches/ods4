<?php
require_once __DIR__ . '/../includes/session.php';
start_secure_session();

// Bloqueo de Seguridad
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

    <title>Inglés - Contenido Educativo ODS 4</title>
    <?php $cssPath = __DIR__ . '/../assets/css/estilo_ingles.css'; ?>
    <link rel="stylesheet" href="../assets/css/estilo_ingles.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>"> 
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <div class="header-actions">
                <a href="../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>

            <h1>Inglés — Temas</h1>
            <p>Selecciona uno de los temas disponibles para comenzar:</p>

            <div class="temas-list">
                <ul>
                    <li>
                        <a href="temas/temas_ingles/tema1.php">Tema 1: Saludos y Presentaciones</a>
                        <p class="descripcion">Frases básicas para saludar y presentarte.</p>
                    </li>
                    <li>
                        <a href="temas/temas_ingles/tema2.php">Tema 2: Vocabulario y Pronunciación</a>
                        <p class="descripcion">Vocabulario esencial y pronunciación.</p>
                    </li>
                    <li>
                        <a href="temas/temas_ingles/tema3.php">Tema 3: Verb to Be y Estructuras Básicas</a>
                        <p class="descripcion">Uso del verbo 'to be' y oraciones simples.</p>
                    </li>
                    <li>
                        <a href="temas/temas_ingles/tema4.php">Tema 4: Comprensión y Producción Oral</a>
                        <p class="descripcion">Ejercicios de escucha y conversación.</p>
                    </li>
                    <li>
                        <a href="temas/temas_ingles/tema5.php">Tema 5: Producción Escrita Básica</a>
                        <p class="descripcion">Escritura de frases y párrafos breves.</p>
                    </li>
                </ul>
            </div>

        </div>
    </div>
</body>
</html>
