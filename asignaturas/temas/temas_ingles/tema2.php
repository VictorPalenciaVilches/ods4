<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tema 2 - Vocabulario y Pronunciación</title>
  <?php $cssPath = __DIR__ . '/../../../css/estilos_ingles/tema2.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
  <link rel="stylesheet" href="../../../css/estilos_ingles/tema2.css?v=<?php echo $css_version; ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
      <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
      <h1>Tema 2: Vocabulario y Pronunciación</h1>
      <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Amplía tu vocabulario y mejora tu pronunciación en inglés.</p>

      <h2>Objetivo</h2>
      <p>Conocer palabras y sonidos básicos para comunicarte en situaciones cotidianas.</p>

      <h2>Contenidos</h2>
      <ul>
        <li>Vocabulario cotidiano: familia, colores, números.</li>
        <li>Fonética básica y sonidos difíciles.</li>
        <li>Estrategias para mejorar la pronunciación.</li>
      </ul>

      <h2>Ejemplo</h2>
      <p>Palabras: "mother", "father", "blue", "one", "two".</p>

      <div class="tema-actions">
        <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
        <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
      </div>
    </div>
  </div>
</body>
</html>