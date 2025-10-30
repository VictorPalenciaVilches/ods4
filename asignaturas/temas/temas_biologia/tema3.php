<?php
session_start();
if (!isset($_SESSION['correo'])) { header("Location: ../../login.php"); exit(); }
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="utf-8">
    <title>Tema 3 - Ecosistemas</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_biologia/tema3.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
    <link rel="stylesheet" href="../../../css/estilos_biologia/tema3.css?v=<?php echo $css_version; ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 3: Ecosistemas</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Estudia las relaciones entre organismos y su ambiente.</p>

            <h2>Objetivo</h2>
            <p>Entender flujos de energía y cadenas tróficas.</p>

            <h2>Contenidos</h2>
            <ul>
                <li>Cadenas y redes alimentarias.</li>
                <li>Hábitats y nichos ecológicos.</li>
                <li>Impacto humano en ecosistemas.</li>
            </ul>

            <h2>Ejemplo</h2>
            <p>Una cadena: planta → conejo → zorro.</p>

            <div class="tema-actions">
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
            </div>
        </div>
    </div>
</body>
</html>