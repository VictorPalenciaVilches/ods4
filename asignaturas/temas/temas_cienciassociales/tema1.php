<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema1';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => 'La historia se define como:', 'options' => ['El estudio exclusivo de batallas militares','La ciencia que estudia el pasado humano mediante fuentes y análisis crítico','La memorización de fechas sin contexto','La descripción de eventos actuales'], 'answer' => 1],
    2 => ['q' => 'Las fuentes primarias son:', 'options' => ['Libros de texto modernos','Documentos o testimonios de la época estudiada','Artículos de opinión actuales','Resúmenes de Wikipedia'], 'answer' => 1],
    3 => ['q' => 'El tiempo histórico se diferencia del cronológico porque:', 'options' => ['No tiene fechas','Considera cambios, continuidades y periodizaciones significativas','Solo mide segundos','Es igual al tiempo físico'], 'answer' => 1],
    4 => ['q' => 'Una causa histórica es:', 'options' => ['Solo un evento aislado','Un factor o condición que contribuye a generar un efecto o consecuencia','Una consecuencia posterior','Un mito sin fundamento'], 'answer' => 1],
    5 => ['q' => 'La periodización histórica sirve para:', 'options' => ['Dividir arbitrariamente el tiempo','Organizar el estudio del pasado en etapas con características comunes','Eliminar fechas importantes','Ignorar continuidades'], 'answer' => 1],
    6 => ['q' => 'Las fuentes secundarias incluyen:', 'options' => ['Documentos originales de la época','Estudios, libros y artículos que interpretan fuentes primarias','Cartas personales antiguas','Fotografías de archivo'], 'answer' => 1],
    7 => ['q' => 'La multicausalidad en historia significa que:', 'options' => ['Solo hay una causa para cada evento','Los eventos históricos suelen tener múltiples causas interrelacionadas','No existen causas','Las causas son siempre económicas'], 'answer' => 1],
    8 => ['q' => 'La perspectiva histórica implica:', 'options' => ['Juzgar el pasado con valores actuales sin contexto','Comprender el contexto, valores y limitaciones de cada época','Ignorar el contexto','Repetir errores del pasado'], 'answer' => 1],
    9 => ['q' => 'Un ejemplo de cambio histórico es:', 'options' => ['La permanencia de tradiciones','La transición de monarquía a república','La repetición de rituales','La continuidad de costumbres'], 'answer' => 1],
    10 => ['q' => 'La historia local se enfoca en:', 'options' => ['Solo eventos mundiales','Procesos y eventos de una región o comunidad específica','Ignorar el contexto regional','Estudiar únicamente biografías'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 1 - Introducción a la Historia</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ciencias_sociales/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ciencias_sociales/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 1: Introducción a la Historia</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás qué es la historia, cómo se construye el conocimiento histórico, qué son las fuentes, cómo identificar causas y consecuencias, y por qué el pasado nos ayuda a comprender el presente.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Historia?</h2>
            <p>La <strong>historia</strong> es la ciencia que estudia el <strong>pasado humano</strong> mediante el análisis crítico de <strong>fuentes</strong> (documentos, testimonios, restos materiales) para comprender <strong>causas</strong>, <strong>consecuencias</strong>, <strong>cambios</strong> y <strong>continuidades</strong>. No es solo memorizar fechas; es <strong>interpretar</strong> y <strong>explicar</strong> procesos sociales, políticos, económicos y culturales.</p>

            <h2>2. Tiempo Histórico vs Tiempo Cronológico</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Aspecto</th>
                        <th>Tiempo Cronológico</th>
                        <th>Tiempo Histórico</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Naturaleza</td>
                        <td>Medición física (segundos, años)</td>
                        <td>Organización por cambios y continuidades significativas</td>
                    </tr>
                    <tr>
                        <td>Enfoque</td>
                        <td>Secuencia lineal</td>
                        <td>Periodización, causas y efectos</td>
                    </tr>
                    <tr>
                        <td>Ejemplo</td>
                        <td>"1492 d.C."</td>
                        <td>"Época de expansión europea y encuentro de culturas"</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Fuentes Históricas</h2>
            <h3>3.1. Fuentes Primarias</h3>
            <p>Documentos, testimonios o restos materiales <strong>contemporáneos</strong> al evento estudiado:</p>
            <ul>
                <li><strong>Escritas</strong>: cartas, diarios, leyes, periódicos de la época, registros oficiales.</li>
                <li><strong>Materiales</strong>: edificios, herramientas, monedas, cerámicas, vestimentas.</li>
                <li><strong>Orales</strong>: testimonios de testigos directos (grabaciones, entrevistas).</li>
                <li><strong>Iconográficas</strong>: pinturas, fotografías, mapas de la época.</li>
            </ul>

            <h3>3.2. Fuentes Secundarias</h3>
            <p>Estudios, libros, artículos o documentales que <strong>interpretan</strong> y <strong>analizan</strong> fuentes primarias. Son útiles para comprender contextos y debates historiográficos.</p>

            <h3>3.3. Crítica de Fuentes</h3>
            <ul>
                <li><strong>Autenticidad</strong>: ¿Es real o falsificada?</li>
                <li><strong>Procedencia</strong>: ¿Quién la produjo y en qué contexto?</li>
                <li><strong>Perspectiva</strong>: ¿Qué sesgos o intenciones puede tener?</li>
                <li><strong>Corroboración</strong>: ¿Otras fuentes la confirman o contradicen?</li>
            </ul>

            <h2>4. Causas y Consecuencias</h2>
            <h3>4.1. Causas</h3>
            <p>Factores o condiciones que <strong>contribuyen</strong> a generar un evento o proceso. Pueden ser:</p>
            <ul>
                <li><strong>Inmediatas</strong>: cercanas en el tiempo al evento.</li>
                <li><strong>Mediatas</strong>: antecedentes más lejanos.</li>
                <li><strong>Estructurales</strong>: condiciones de fondo (económicas, sociales, políticas).</li>
            </ul>
            <p><strong>Multicausalidad</strong>: los eventos históricos suelen tener <strong>múltiples causas</strong> interrelacionadas (económicas, políticas, sociales, culturales).</p>

            <h3>4.2. Consecuencias</h3>
            <p>Efectos o resultados que se derivan de un evento o proceso:</p>
            <ul>
                <li><strong>Cortas</strong>: efectos inmediatos.</li>
                <li><strong>Largas</strong>: transformaciones duraderas.</li>
                <li><strong>Intencionadas</strong>: buscadas por los actores.</li>
                <li><strong>No intencionadas</strong>: efectos imprevistos.</li>
            </ul>

            <h2>5. Cambio y Continuidad</h2>
            <ul>
                <li><strong>Cambio</strong>: transformaciones en estructuras, instituciones, costumbres o ideas.</li>
                <li><strong>Continuidad</strong>: elementos que persisten a través del tiempo (tradiciones, instituciones, prácticas).</li>
                <li>La historia estudia <strong>ambos</strong> para entender la complejidad del pasado.</li>
            </ul>

            <h2>6. Periodización Histórica</h2>
            <p>División del tiempo en <strong>etapas</strong> con características comunes. Ejemplos clásicos:</p>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Periodo</th>
                        <th>Características principales</th>
                        <th>Ejemplos de eventos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Prehistoria</strong></td>
                        <td>Antes de la escritura</td>
                        <td>Paleolítico, Neolítico</td>
                    </tr>
                    <tr>
                        <td><strong>Edad Antigua</strong></td>
                        <td>Primeras civilizaciones, imperios</td>
                        <td>Mesopotamia, Egipto, Grecia, Roma</td>
                    </tr>
                    <tr>
                        <td><strong>Edad Media</strong></td>
                        <td>Feudalismo, expansión islámica</td>
                        <td>Caída de Roma, Cruzadas</td>
                    </tr>
                    <tr>
                        <td><strong>Edad Moderna</strong></td>
                        <td>Renacimiento, expansión europea</td>
                        <td>Descubrimiento de América, Reforma</td>
                    </tr>
                    <tr>
                        <td><strong>Edad Contemporánea</strong></td>
                        <td>Revoluciones, industrialización, globalización</td>
                        <td>Revolución Francesa, Guerras Mundiales</td>
                    </tr>
                </tbody>
            </table>
            <p><em>Nota</em>: Las periodizaciones varían según regiones y enfoques historiográficos.</p>

            <h2>7. Perspectiva Histórica</h2>
            <p>Comprender el pasado en su <strong>propio contexto</strong>, evitando juzgarlo con valores actuales sin considerar las condiciones, creencias y limitaciones de cada época. No significa justificar, sino <strong>entender</strong> para explicar mejor.</p>

            <h2>8. Historia Local y Global</h2>
            <ul>
                <li><strong>Historia local</strong>: procesos de una región o comunidad específica.</li>
                <li><strong>Historia global</strong>: interconexiones y procesos que trascienden fronteras.</li>
                <li>Ambas se complementan: lo local se entiende mejor en contexto global, y lo global se construye desde experiencias locales.</li>
            </ul>

            <h2>9. ¿Para qué sirve la Historia?</h2>
            <ul>
                <li>Comprender el <strong>presente</strong> a partir del pasado.</li>
                <li>Desarrollar <strong>pensamiento crítico</strong> y análisis de causas.</li>
                <li>Valorar la <strong>diversidad cultural</strong> y temporal.</li>
                <li>Formar <strong>ciudadanía</strong> informada y responsable.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>10. Autor del Tema</h2>
            <p><strong>Marc Bloch (1886–1944)</strong></p>
            <p>Historiador francés, cofundador de la <strong>Escuela de los Annales</strong>, que revolucionó la historiografía al integrar economía, sociedad, cultura y mentalidades, y al enfatizar el uso crítico de fuentes y la multicausalidad en los procesos históricos.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>11. Video recomendado</h2>
            <p>Introducción clara a conceptos básicos de historia y metodología:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/9etknz-ogF4" title="Introducción a la Historia: conceptos básicos y metodología" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Introducción a la Historia: conceptos básicos y metodología" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">12. Cuestionario de 10 Preguntas</h2>
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