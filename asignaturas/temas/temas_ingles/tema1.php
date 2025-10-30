<?php
session_start();

if (!isset($_SESSION['correo'])) { 
    header("Location: ../../login.php"); 
    exit(); 
}

$nombre_usuario = $_SESSION['nombre'];

$cssPath = __DIR__ . '/../../../css/estilos_ingles/tema1.css';
$css_version = time();
if (file_exists($cssPath)) {
    $css_version = filemtime($cssPath);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <title>Tema 1 - Saludos y Presentaciones</title>
    <link rel="stylesheet" href="../../../css/estilos_ingles/tema1.css?v=<?php echo $css_version; ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
       <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
      <h1>Tema 1: Saludos y Presentaciones</h1>
      <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Aprenderás frases y expresiones para saludar y presentarte en inglés.</p>

      <h2>Objetivo</h2>
      <p>Practicar saludos, presentaciones y expresiones de cortesía básicas.</p>

      <h2>Contenidos</h2>
      <ul>
        <li>Saludos formales e informales.</li>
        <li>Presentaciones: "My name is..." y respuestas.</li>
        <li>Frases de cortesía (please, thank you, excuse me).</li>
      </ul>

      <h2>Ejemplo</h2>
      <p>"Hello! My name is Carlos. Nice to meet you."</p>

      <div class="tema-actions">
        <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
      </div>
    </div>
  </div>
</body>
</html>