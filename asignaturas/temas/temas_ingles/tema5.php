<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tema 5 - Producción Escrita Básica</title>
  <?php $cssPath = __DIR__ . '/../../../css/estilos_ingles/tema5.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
  <link rel="stylesheet" href="../../../css/estilos_ingles/tema5.css?v=<?php echo $css_version; ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
      <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
      <h1>Tema 5: Producción Escrita Básica</h1>
      <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende a escribir frases y párrafos sencillos en inglés.</p>

      <h2>Objetivo</h2>
      <p>Redactar textos breves y coherentes en inglés básico.</p>

      <h2>Contenidos</h2>
      <ul>
        <li>Redacción de oraciones y párrafos cortos.</li>
        <li>Uso de conectores simples.</li>
        <li>Revisión básica de textos.</li>
      </ul>

      <h2>Ejemplo</h2>
      <p>Escribe un párrafo corto sobre tu familia en inglés.</p>

      <div class="tema-actions">
        <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
        <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
      </div>
    </div>
  </div>
</body>
</html>