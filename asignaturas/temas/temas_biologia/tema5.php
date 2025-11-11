<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema5';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => 'La farmacogenómica busca principalmente:', 'options' => ['Curar todas las enfermedades genéticas','Predecir respuesta a fármacos según variación genética','Eliminar la necesidad de ensayos clínicos','Sustituir una dieta equilibrada'], 'answer' => 1],
    2 => ['q' => 'Un riesgo ético clave del uso de datos genéticos es:', 'options' => ['Mejorar diagnósticos','Tener consentimiento informado','Discriminación por seguros o empleo','Optimizar tratamientos'], 'answer' => 2],
    3 => ['q' => 'La edición génica con CRISPR-Cas9 permite:', 'options' => ['Modificar secuencias específicas del ADN','Solo observar cromosomas al microscopio','Curar automáticamente cualquier enfermedad','Clonar seres humanos legalmente'], 'answer' => 0],
    4 => ['q' => 'Un ejemplo de medicina personalizada es:', 'options' => ['Recetar la misma dosis para todos','Ajustar fármaco y dosis según el genotipo del paciente','Elegir fármaco por color del envase','Evitar todo tratamiento'], 'answer' => 1],
    5 => ['q' => 'Las pruebas genéticas directas al consumidor requieren especial atención en:', 'options' => ['Lectura de códigos de barras','Calibración del termómetro','Privacidad, validez clínica y asesoramiento','Color del kit'], 'answer' => 2],
    6 => ['q' => 'La terapia génica consiste en:', 'options' => ['Administrar vitaminas','Modificar o introducir material genético para tratar enfermedades','Usar solo antibióticos','Eliminar todos los genes recesivos'], 'answer' => 1],
    7 => ['q' => 'El consentimiento informado en genética debe ser:', 'options' => ['Implícito y general','Explícito, específico y revocable','Solo verbal y no documentado','Innecesario si el resultado es normal'], 'answer' => 1],
    8 => ['q' => 'La selección asistida por marcadores (SAM) se aplica en:', 'options' => ['Edición de video','Mejora genética de cultivos/ganado usando marcadores moleculares','Reparación de automóviles','Análisis financiero'], 'answer' => 1],
    9 => ['q' => 'Un principio de bioética fundamental es:', 'options' => ['Beneficencia','Imprudencia','Secreto absoluto sin excepciones médicas','Elitismo'], 'answer' => 0],
    10 => ['q' => 'La equidad en salud genética implica:', 'options' => ['Acceso justo a tecnologías diagnósticas y terapias','Uso de pruebas solo en sectores con alto ingreso','Publicación de datos sin consentir','Negar tratamientos por variantes genéticas'], 'answer' => 0],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 5 - Genética y Sociedad</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_biologia/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_biologia/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 5: Genética y Sociedad</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema exploramos cómo el conocimiento genético impacta la medicina, la agricultura y la vida cotidiana, así como los dilemas éticos, legales y sociales que emergen con su uso.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Genética en la Vida Cotidiana</h2>
            <ul>
                <li><strong>Pruebas genéticas clínicas</strong>: diagnóstico de enfermedades monogénicas, riesgo de cáncer hereditario (BRCA1/2), asesoramiento reproductivo.</li>
                <li><strong>Pruebas directas al consumidor</strong>: rasgos, ancestros, riesgos poligénicos; requieren <strong>validación</strong>, <strong>privacidad</strong> y <strong>asesoría</strong>.</li>
                <li><strong>Forense</strong>: identificación de personas (huella genética), cadenas de custodia y límites legales.</li>
            </ul>

            <h2>2. Medicina de Precisión</h2>
            <ul>
                <li><strong>Farmacogenómica</strong>: variantes en CYP2D6, CYP2C19, TPMT, DPYD condicionan eficacia y toxicidad; guías clínicas (p. ej., CPIC) orientan ajustes de dosis.</li>
                <li><strong>Biomarcadores</strong>: EGFR/ALK/ROS1 en cáncer de pulmón; HER2 en cáncer de mama; permiten terapias dirigidas.</li>
                <li><strong>Riesgo poligénico</strong>: puntuaciones que integran miles de variantes; requieren interpretación cuidadosa y enfoque poblacional.</li>
            </ul>

            <h2>3. Edición Génica y Terapia Génica</h2>
            <ul>
                <li><strong>CRISPR-Cas9</strong>: edición precisa del ADN; oportunidades en investigación, <strong>terapia somática</strong> y modelos de enfermedad.</li>
                <li><strong>Límites</strong>: <em>off-target</em>, mosaicos, regulación estricta; distinción ética entre <strong>germinal</strong> (heredable) y <strong>somática</strong> (no heredable).</li>
                <li><strong>Vectorización</strong>: virus adenoasociados, lentivirus, nanopartículas.</li>
            </ul>

            <h2>4. Genética en Agricultura y Ambiente</h2>
            <ul>
                <li><strong>Selección asistida por marcadores (SAM)</strong> y <strong>genómica</strong> aceleran mejora de cultivos/ganado.</li>
                <li><strong>Organismos genéticamente modificados (OGM)</strong>: resistencia a plagas/sequía; debates sobre bioseguridad, flujos génicos y etiquetado.</li>
                <li><strong>Conservación</strong>: genética de poblaciones para evitar endogamia y preservar biodiversidad.</li>
            </ul>

            <h2>5. Ética, Legales y Sociales (ELSI)</h2>
            <ul>
                <li><strong>Privacidad y protección de datos</strong>: almacenamiento seguro, acceso restringido, anonimización.</li>
                <li><strong>No discriminación</strong>: evitar usos en seguros/empleo que vulneren derechos.</li>
                <li><strong>Consentimiento informado</strong>: explícito, específico, comprensible y <strong>revocable</strong>.</li>
                <li><strong>Equidad</strong>: acceso justo a diagnósticos/terapias; evitar brechas entre grupos.</li>
                <li><strong>Comunicación responsable</strong>: no prometer curas absolutas; explicar incertidumbres.</li>
            </ul>

            <h2>6. Tabla: Beneficios y Riesgos</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Ámbito</th>
                        <th>Beneficios</th>
                        <th>Riesgos/Desafíos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Clínico</td>
                        <td>Diagnóstico temprano, terapias dirigidas</td>
                        <td>Ansiedad, hallazgos incidentales, acceso desigual</td>
                    </tr>
                    <tr>
                        <td>Salud pública</td>
                        <td>Tamizajes poblacionales mejor focalizados</td>
                        <td>Privacidad, uso indebido de datos</td>
                    </tr>
                    <tr>
                        <td>Agricultura</td>
                        <td>Rendimiento, resiliencia a estrés</td>
                        <td>Bioseguridad, impactos ecológicos</td>
                    </tr>
                </tbody>
            </table>

            <h2>7. Buenas Prácticas para el Uso de Información Genética</h2>
            <ul>
                <li>Buscar <strong>asesoría genética</strong> ante resultados complejos.</li>
                <li>Verificar <strong>validez analítica y clínica</strong> de pruebas.</li>
                <li>Proteger <strong>confidencialidad</strong> y limitar el <strong>compartir</strong> datos.</li>
                <li>Considerar factores <strong>ambientales y de estilo de vida</strong> además de la genética.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>8. Autor del Tema</h2>
            <p><strong>Rosalind Franklin (1920–1958)</strong></p>
            <p>Biofísica cuya cristalografía de rayos X (Fotografía 51) fue crucial para dilucidar la estructura del ADN. Su trabajo sentó bases para la genética molecular moderna y para aplicaciones biomédicas y biotecnológicas.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>9. Video recomendado</h2>
            <p>Introducción clara a genética y medicina personalizada:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/mooDFmZrbcg" title="Genética y medicina personalizada: oportunidades y desafíos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Genética y medicina personalizada: oportunidades y desafíos" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">10. Cuestionario de 10 Preguntas</h2>
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
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
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