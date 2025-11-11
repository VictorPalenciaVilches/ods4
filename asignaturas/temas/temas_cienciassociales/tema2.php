<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema2';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => 'La cartografía es la disciplina que se encarga de:', 'options' => ['Estudiar animales','Elaborar y estudiar mapas','Medir la temperatura','Clasificar monedas antiguas'], 'answer' => 1],
    2 => ['q' => 'La latitud se mide respecto a:', 'options' => ['El meridiano de Greenwich','El ecuador terrestre','El trópico de Cáncer','El círculo polar ártico'], 'answer' => 1],
    3 => ['q' => 'La longitud 0° corresponde a:', 'options' => ['El ecuador','El meridiano de Greenwich','El trópico de Capricornio','El antimeridiano'], 'answer' => 1],
    4 => ['q' => 'Una escala 1:100.000 significa que 1 cm en el mapa equivale a:', 'options' => ['100 m en la realidad','1 km en la realidad','10 km en la realidad','100.000 km en la realidad'], 'answer' => 1],
    5 => ['q' => 'La leyenda o simbología de un mapa sirve para:', 'options' => ['Decorar el mapa','Indicar el norte','Explicar el significado de símbolos y colores','Convertir coordenadas'], 'answer' => 2],
    6 => ['q' => 'Un mapa temático muestra principalmente:', 'options' => ['Límites políticos y capitales','Relieve detallado y curvas de nivel','Información específica (ej. densidad de población, clima)','Rutas de navegación históricas'], 'answer' => 2],
    7 => ['q' => 'La orientación en un mapa se realiza generalmente con:', 'options' => ['Rosa de los vientos y flecha del norte','Leyenda','Escala gráfica','Cuadrícula UTM'], 'answer' => 0],
    8 => ['q' => '¿Cuál enuncia mejor una proyección cartográfica?', 'options' => ['Técnica para representar la Tierra curva en una superficie plana','Tipo de brújula','Fase de la Luna','Nombre de un satélite'], 'answer' => 0],
    9 => ['q' => 'En coordenadas geográficas, las latitudes van de:', 'options' => ['0° a 90° N/S','0° a 180° E/O','-360° a 360°','0° a 60°'], 'answer' => 0],
    10 => ['q' => 'El sistema UTM se caracteriza por:', 'options' => ['Usar grados, minutos y segundos','Ser un sistema métrico por zonas con coordenadas en metros','Orientar siempre al norte geográfico sin cuadrícula','No ser útil para mediciones'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2 - Geografía y Mapas</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ciencias_sociales/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ciencias_sociales/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 2: Geografía y Mapas</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a leer e interpretar mapas: coordenadas geográficas, escala, proyecciones, tipos de mapas, simbología y orientación. Estas herramientas son claves para comprender el espacio geográfico y los fenómenos que allí ocurren.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Cartografía: ¿Para qué sirven los mapas?</h2>
            <p>La <strong>cartografía</strong> es la disciplina que elabora y estudia <strong>mapas</strong>, representaciones de la superficie terrestre. Los mapas permiten ubicar lugares, medir distancias, analizar fenómenos (población, clima, economía) y tomar decisiones en planificación, riesgos y movilidad.</p>

            <h2>2. Coordenadas Geográficas</h2>
            <ul>
                <li><strong>Latitud</strong>: distancia angular al <strong>Ecuador (0°)</strong>, varía de 0° a 90° Norte/Sur.</li>
                <li><strong>Longitud</strong>: distancia angular al <strong>Meridiano de Greenwich (0°)</strong>, de 0° a 180° Este/Oeste.</li>
                <li><strong>Formato</strong>: grados (°), minutos (′), segundos (″) o <em>decimal</em>.</li>
                <li><strong>Ejemplo</strong>: Bogotá ≈ 4.711° N, -74.072° (longitud Oeste negativa).</li>
            </ul>

            <h2>3. Escala Cartográfica</h2>
            <p>Relación entre las medidas del mapa y la realidad. Dos formas habituales:</p>
            <ul>
                <li><strong>Numérica</strong>: 1:50.000 (1 unidad en el mapa = 50.000 en el terreno).</li>
                <li><strong>Gráfica</strong>: barra segmentada para medir con regla.</li>
            </ul>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Escala</th>
                        <th>Tipo de detalle</th>
                        <th>Uso típico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Grande</strong> (1:10.000 – 1:25.000)</td>
                        <td>Mucho detalle</td>
                        <td>Planos urbanos, catastros</td>
                    </tr>
                    <tr>
                        <td><strong>Media</strong> (1:50.000 – 1:100.000)</td>
                        <td>Detalle intermedio</td>
                        <td>Cartas topográficas regionales</td>
                    </tr>
                    <tr>
                        <td><strong>Pequeña</strong> (1:250.000 – 1:1.000.000)</td>
                        <td>Poco detalle</td>
                        <td>Mapas nacionales/mundiales</td>
                    </tr>
                </tbody>
            </table>

            <h2>4. Proyecciones Cartográficas</h2>
            <p>Son métodos para representar la Tierra (curva) en un plano. Cada proyección <strong>deforma</strong> algo: área, forma, distancia o dirección. Elegir la proyección depende del <strong>propósito</strong> del mapa.</p>
            <ul>
                <li><strong>Cilíndricas</strong> (ej. Mercator): conservan direcciones; distorsionan áreas en altas latitudes.</li>
                <li><strong>Cónicas</strong>: útiles para latitudes medias (países/continentes).</li>
                <li><strong>Acimutales</strong>: vistas polares o rutas aéreas.</li>
                <li><strong>Equivalentes/Conformes</strong>: preservan áreas o formas respectivamente.</li>
            </ul>

            <h2>5. Tipos de Mapas</h2>
            <ul>
                <li><strong>Políticos</strong>: límites, capitales, ciudades.</li>
                <li><strong>Físicos</strong>: relieve, ríos, costas.</li>
                <li><strong>Topográficos</strong>: curvas de nivel, pendientes, puntos de control.</li>
                <li><strong>Temáticos</strong>: un fenómeno específico (clima, población, actividad económica).</li>
                <li><strong>Coropléticos/Isolíneas</strong>: coloreados por regiones o líneas de igual valor (isobaras/isotermas).</li>
            </ul>

            <h2>6. Simbología, Orientación y Cuadrículas</h2>
            <ul>
                <li><strong>Leyenda</strong>: explica símbolos y colores.</li>
                <li><strong>Orientación</strong>: flecha del norte o rosa de los vientos.</li>
                <li><strong>Cuadrícula</strong>: líneas para localizar (geográfica GMS/decimal) o <strong>UTM</strong> (coordenadas en metros por zonas).</li>
            </ul>

            <h2>7. Lectura de Mapas: Pasos Prácticos</h2>
            <ol>
                <li>Identificar <strong>título, fuente, fecha</strong> y <strong>proyección</strong>.</li>
                <li>Revisar <strong>escala</strong> y <strong>orientación</strong>.</li>
                <li>Leer la <strong>leyenda</strong> y reconocer <strong>símbolos</strong>.</li>
                <li>Ubicar con <strong>coordenadas</strong> y medir <strong>distancias</strong>.</li>
                <li>Interpretar <strong>patrones</strong> (colores, densidades) y <strong>relaciones espaciales</strong>.</li>
            </ol>

            <h2>8. Ejercicios Propuestos</h2>
            <ol>
                <li>Convierte 3 cm en un mapa 1:50.000 a distancia real.</li>
                <li>Da un ejemplo de latitud y longitud de tu municipio (en decimal).</li>
                <li>Explica cuándo usarías un mapa físico, uno topográfico y uno temático.</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autor del Tema</h2>
            <p><strong>Gerardus Mercator (1512–1594)</strong></p>
            <p>Cartógrafo flamenco, célebre por la <strong>proyección de Mercator</strong> y por popularizar el término “atlas”. Sus aportes sistematizaron la representación del globo y la navegación, impulsando el desarrollo de la cartografía moderna.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>10. Video recomendado</h2>
            <p>Repaso de coordenadas, escala y tipos de mapas:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/HBaOzwtTNZE" title="Coordenadas geográficas, escala y tipos de mapas (repaso rápido)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Coordenadas geográficas, escala y tipos de mapas (repaso rápido)" </em></p>
           
            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">11. Cuestionario de 10 Preguntas</h2>
            <p>¡Pon a prueba tu conocimiento! Responde basándote en la información que acabas de leer.</p>

            <form id="quiz-form" method="post" class="quiz-form">
                <?php foreach ($questions as $id => $data): ?>
                    <fieldset data-question-id="<?php echo htmlspecialchars($id, ENT_QUOTES, 'UTF-8'); ?>" data-correct-answer="<?php echo (int) $data['answer']; ?>">
                        <legend><?php echo $id . '. ' . $data['q']; ?></legend>
                        <?php foreach ($data['options'] as $idx => $opt): ?>
                            <label>
                                <input type="radio" name="q<?php echo $id; ?>" value="<?php echo $idx; ?>" required> <?php echo $opt; ?>
                            </label><br>
                        <?php endforeach; ?>
                    </fieldset>
                <?php endforeach; ?>
                
                <input type="hidden" name="topic_id" value="<?php echo $topic_id; ?>">
                <input type="hidden" name="quiz_submitted" value="1">
                
                <button type="submit" class="submit-quiz">Enviar mis 10 respuestas</button>
            </form>

            <div id="quiz-results-container">
            </div>

            <hr>

            <div class="tema-actions">
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
            </div>
        </div>
    </div>
    <?php
        $quizScriptPath = __DIR__ . '/../../../assets/js/quiz_handler.js';
        $questionMeta = [];
        foreach ($questions as $id => $questionData) {
            $questionMeta[$id] = [
                'answer' => $questionData['answer']
            ];
        }
    ?>
<script src="../../../assets/js/quiz_handler.js?v=<?php echo file_exists($quizScriptPath) ? filemtime($quizScriptPath) : time(); ?>"></script>
</body>
</html>