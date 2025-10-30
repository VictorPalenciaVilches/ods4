<?php
session_start();
if (!isset($_SESSION['correo'])) {
	header("Location: ../../login.php");
	exit();
}
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Biología - Tema 1: Células y organización básica</title>
	<?php $cssPath = __DIR__ . '/../../../css/estilos_biologia/tema1.css'; $css_version = (file_exists($cssPath) ? filemtime($cssPath) : time()); ?>
	<link rel="stylesheet" href="../../../css/estilos_biologia/tema1.css?v=<?php echo $css_version; ?>">
</head>
<body>
	<div class="container">
		<h1>Tema 1: Células y organización básica</h1>
		<p>Hola, <?php echo htmlspecialchars($nombre_usuario); ?>.</p>

		<section class="objetivo">
			<h2>Objetivo</h2>
			<p>Comprender la estructura y función de las células y cómo se organizan en tejidos y órganos.</p>
		</section>

		<section class="contenidos">
			<h2>Contenidos</h2>
			<ul>
				<li>Teoría celular y postulados.</li>
				<li>Orgánulos celulares y sus funciones.</li>
				<li>Diferencias entre células procariotas y eucariotas.</li>
				<li>Niveles de organización biológica: célula, tejido, órgano y sistema.</li>
			</ul>
		</section>

		<section class="ejemplo">
			<h2>Ejemplo</h2>
			<p>Compara una célula vegetal y una animal: identifica la pared celular, la membrana plasmática, los cloroplastos y la vacuola. Describe cómo cada orgánulo contribuye al funcionamiento celular.</p>
		</section>

		<div class="tema-actions">
			<a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
			
		</div>
	</div>
</body>
</html>
