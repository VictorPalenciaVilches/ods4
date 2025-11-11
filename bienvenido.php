<?php
require_once __DIR__ . '/includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: login.php");
    exit();
}
$nombre_usuario = $_SESSION['nombre'];

$niveles = [
    'matematicas' => 'Matemáticas',
    'lengua_castellana' => 'Lengua Castellana',
    'biologia' => 'Biología',
    'ciencias_sociales' => 'Ciencias Sociales',
    'ingles' => 'Inglés'
    
];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Bienvenido - ODS 4</title>
    <?php $cssPath = __DIR__ . '/assets/css/estilo_bienvenido.css'; ?>
    <link rel="stylesheet" href="assets/css/estilo_bienvenido.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="header-bienvenida">
        
        <div class="ods4-header">
            <img src="assets/img/ods4_logo.png" alt="Logo ODS 4 - Educación de Calidad" class="ods4-logo">
            
            <div class="header-text-group">
                <h2>¡Bienvenido, <?php echo htmlspecialchars($nombre_usuario); ?>!</h2>
                <p>Selecciona un nivel educativo para comenzar tu aprendizaje.</p>
            </div>
        </div>
        
        <a href="logout.php" class="logout-btn">Cerrar Sesión</a>
    </div>

    <div class="niveles-grid">
        <?php foreach ($niveles as $slug => $nombre_mostrar): 
            $ruta_asignatura = "asignaturas/{$slug}.php";
        ?>
            <div class="nivel-card">
                <h3><?php echo $nombre_mostrar; ?></h3>
                <p>Contenido especializado en <?php echo $nombre_mostrar; ?> para el ODS 4.</p>
                
                <a href="<?php echo $ruta_asignatura; ?>" class="ingresar-btn">Ingresar</a>
            </div>
        <?php endforeach; ?>
    </div>
</body>
</html>