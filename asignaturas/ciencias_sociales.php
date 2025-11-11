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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ciencias Sociales - Contenido Educativo ODS 4</title>
    <?php $cssPath = __DIR__ . '/../assets/css/estilo_ciencias_sociales.css'; ?>
    <link rel="stylesheet" href="../assets/css/estilo_ciencias_sociales.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>"> 
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <div class="header-actions">
                <a href="../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>

            <h1>Ciencias Sociales — Temas</h1>
            <p>Selecciona uno de los temas disponibles para comenzar:</p>

            <div class="temas-list">
                <ul>
                    <li>
                        <a href="temas/temas_cienciassociales/tema1.php">Tema 1: Introducción a la Historia</a>
                        <p class="descripcion">Causas y consecuencias en procesos históricos.</p>
                    </li>
                    <li>
                        <a href="temas/temas_cienciassociales/tema2.php">Tema 2: Geografía y Mapas</a>
                        <p class="descripcion">Coordenadas, mapas y lectura de leyendas.</p>
                    </li>
                    <li>
                        <a href="temas/temas_cienciassociales/tema3.php">Tema 3: Ciudadanía y Derechos</a>
                        <p class="descripcion">Derechos, deberes e instituciones democráticas.</p>
                    </li>
                    <li>
                        <a href="temas/temas_cienciassociales/tema4.php">Tema 4: Economía Básica</a>
                        <p class="descripcion">Principios básicos de economía y presupuesto.</p>
                    </li>
                    <li>
                        <a href="temas/temas_cienciassociales/tema5.php">Tema 5: Globalización y Sociedad</a>
                        <p class="descripcion">Efectos de la globalización en culturas y economías.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>