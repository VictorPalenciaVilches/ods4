<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tema 3 - Verb to Be y Estructuras Básicas</title>
  <?php $cssPath = __DIR__ . '/../../../css/estilos_ingles/tema3.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
  <link rel="stylesheet" href="../../../css/estilos_ingles/tema3.css?v=<?php echo $css_version; ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
      <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
      <h1>Tema 3: Verb to Be y Estructuras Básicas</h1>
      <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprende a usar el verbo 'to be' y a formar oraciones simples.</p>

      <h2>Objetivo</h2>
      <p>Conjugar 'to be' en presente y construir oraciones afirmativas, negativas e interrogativas.</p>

      <h2>Contenidos</h2>
      <ul>
        <li>I am, you are, he/she/it is.</li>
        <li>Preguntas y respuestas cortas.</li>
        <li>Uso en descripciones básicas.</li>
      </ul>

      <h2>Ejemplo</h2>
      <p>"I am a teacher." "Is he your brother? Yes, he is."</p>

      <div class="tema-actions">
        <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
        <a href="../../bienvenido.php" class="cambiar-materia-btn">Cambiar de materia</a>
      </div>
    </div>
  </div>
</body>
</html>