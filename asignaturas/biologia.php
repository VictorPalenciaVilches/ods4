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
    <title>Biología - Contenido Educativo ODS 4</title>
    <?php $cssPath = __DIR__ . '/../assets/css/estilo_biologia.css'; ?>
    <link rel="stylesheet" href="../assets/css/estilo_biologia.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>"> 
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <div class="header-actions">
                <a href="../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>

            <h1>Biología — Temas</h1>
            <p>Selecciona uno de los temas disponibles para comenzar:</p>

            <div class="temas-list">
                <ul>
                    <li>
                        <a href="temas/temas_biologia/tema1.php">Tema 1: La Célula y sus Componentes</a>
                        <p class="descripcion">Orgánulos celulares y sus funciones.</p>
                    </li>
                    <li>
                        <a href="temas/temas_biologia/tema2.php">Tema 2: Genética Básica</a>
                        <p class="descripcion">ADN, genes y herencia.</p>
                    </li>
                    <li>
                        <a href="temas/temas_biologia/tema3.php">Tema 3: Ecosistemas</a>
                        <p class="descripcion">Cadenas tróficas y relaciones ecológicas.</p>
                    </li>
                    <li>
                        <a href="temas/temas_biologia/tema4.php">Tema 4: Salud y Medio Ambiente</a>
                        <p class="descripcion">Impacto ambiental en la salud humana.</p>
                    </li>
                    <li>
                        <a href="temas/temas_biologia/tema5.php">Tema 5: Genética y Sociedad</a>
                        <p class="descripcion">Implicaciones éticas y aplicaciones.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>