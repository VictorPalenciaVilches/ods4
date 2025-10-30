<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tema 4 - Comprensión y Producción Oral</title>
  <?php $cssPath = __DIR__ . '/../../../css/estilos_ingles/tema4.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
  <link rel="stylesheet" href="../../../css/estilos_ingles/tema4.css?v=<?php echo $css_version; ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
      <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
      <h1>Tema 4: Comprensión y Producción Oral</h1>
      <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Practica escucha y conversación para ganar fluidez.</p>

      <h2>Objetivo</h2>
      <p>Mejorar la comprensión auditiva y la producción oral en contextos cotidianos.</p>

      <h2>Contenidos</h2>
      <ul>
        <li>Ejercicios de escucha.</li>
        <li>Role-plays y simulaciones.</li>
        <li>Conversaciones básicas.</li>
      </ul>

      <h2>Ejemplo</h2>
      <p>Escucha un diálogo y responde preguntas sobre su contenido.</p>

      <div class="tema-actions">
        <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
        <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
      </div>
    </div>
  </div>
</body>
</html>