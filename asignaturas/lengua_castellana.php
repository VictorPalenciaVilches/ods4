<?php
session_start();

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
    <title>Lengua Castellana - Contenido Educativo ODS 4</title>
    <link rel="stylesheet" href="../css/estilo_lengua_castellana.css"> 
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <div class="header-actions">
                <a href="../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
            </div>

            <h1>Lengua Castellana — Temas</h1>
            <p>Selecciona uno de los temas para comenzar:</p>

            <div class="temas-list">
                <ul>
                    <li>
                        <a href="temas/temas_lenguacastellana/tema1.php">Tema 1: Ortografía y Acentuación</a>
                        <p class="descripcion">Reglas de acentuación y ejercicios prácticos.</p>
                    </li>
                    <li>
                        <a href="temas/temas_lenguacastellana/tema2.php">Tema 2: Signos de Puntuación</a>
                        <p class="descripcion">Uso correcto de comas, puntos y otros signos.</p>
                    </li>
                    <li>
                        <a href="temas/temas_lenguacastellana/tema3.php">Tema 3: Estructura del Párrafo</a>
                        <p class="descripcion">Idea principal, oraciones de apoyo y coherencia.</p>
                    </li>
                    <li>
                        <a href="temas/temas_lenguacastellana/tema4.php">Tema 4: Comprensión Lectora</a>
                        <p class="descripcion">Estrategias de lectura y análisis de textos.</p>
                    </li>
                    <li>
                        <a href="temas/temas_lenguacastellana/tema5.php">Tema 5: Redacción de Textos</a>
                        <p class="descripcion">Planificación, redacción y revisión de textos.</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</body>
</html>