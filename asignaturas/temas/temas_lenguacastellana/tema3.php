<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema3';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => '¿Qué es un párrafo?', 'options' => ['Una palabra con tilde','Un conjunto de oraciones relacionadas que desarrollan una idea','Un título de sección','Una oración exclamativa'], 'answer' => 1],
    2 => ['q' => 'La idea principal de un párrafo es:', 'options' => ['Un detalle anecdótico','Una cita textual cualquiera','La información central que se quiere comunicar','Un ejemplo secundario'], 'answer' => 2],
    3 => ['q' => '¿Qué función cumplen las oraciones de apoyo?', 'options' => ['Introducir el tema del texto','Desarrollar, justificar y explicar la idea principal','Cerrar un capítulo','Cambiar de tema'], 'answer' => 1],
    4 => ['q' => 'La oración de cierre suele:', 'options' => ['Abrir un nuevo tema','Contradecir la idea principal','Sintetizar o concluir el contenido del párrafo','Incluir datos sin relación'], 'answer' => 2],
    5 => ['q' => 'La coherencia interna implica que:', 'options' => ['Las ideas estén ordenadas y relacionadas lógicamente','Se usen únicamente oraciones cortas','No haya conectores','Todas las oraciones sean interrogativas'], 'answer' => 0],
    6 => ['q' => '¿Cuál conector indica causa?', 'options' => ['Por lo tanto','Sin embargo','Porque','No obstante'], 'answer' => 2],
    7 => ['q' => 'En un párrafo descriptivo se espera:', 'options' => ['Narrar acciones en secuencia','Argumentar una postura','Detallar características de un objeto o lugar','Explicar causas y consecuencias'], 'answer' => 2],
    8 => ['q' => 'El párrafo narrativo se caracteriza por:', 'options' => ['Orden lógico de rasgos','Secuencia de acontecimientos en el tiempo','Definiciones técnicas','Planteamiento de tesis y argumentos'], 'answer' => 1],
    9 => ['q' => '¿Qué práctica ayuda a la unidad del párrafo?', 'options' => ['Introducir varios temas distintos','Usar conectores y mantener un único enfoque','Cambiar de persona gramatical sin motivo','Mezclar ejemplos no relacionados'], 'answer' => 1],
    10 => ['q' => '¿Cuál es el orden más habitual del párrafo expositivo?', 'options' => ['Ejemplo → conclusión → título','Idea principal → desarrollo → cierre','Cierre → desarrollo → idea principal','Título → conclusiones → dedicatoria'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Estructura del Párrafo</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 3: Estructura del Párrafo</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a construir párrafos claros, coherentes y bien organizados, identificando su idea principal, oraciones de apoyo, conectores y cierre.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es un Párrafo?</h2>
            <p>Un <strong>párrafo</strong> es una unidad de composición formada por un <strong>conjunto de oraciones</strong> que desarrollan una <strong>idea principal</strong>. Visualmente se reconoce por iniciar con sangría o espacio en blanco y finalizar con un punto aparte.</p>

            <h2>2. Partes del Párrafo</h2>
            <h3>2.1. Oración Temática (Idea Principal)</h3>
            <p>Presenta la información central del párrafo. Suele ubicarse al inicio, aunque puede aparecer en medio o al final según el estilo.</p>

            <h3>2.2. Oraciones de Desarrollo (Apoyo)</h3>
            <p>Amplían la idea principal mediante <strong>explicaciones</strong>, <strong>ejemplos</strong>, <strong>datos</strong>, <strong>definiciones</strong> o <strong>comparaciones</strong>. Mantienen la <strong>unidad temática</strong>.</p>

            <h3>2.3. Oración de Cierre (Conclusión)</h3>
            <p>Sintetiza, reafirma o cierra el contenido del párrafo. También puede enlazar con el siguiente mediante un conector de transición.</p>

            <h2>3. Principios de Calidad</h2>
            <ul>
                <li><strong>Unidad:</strong> un solo tema por párrafo.</li>
                <li><strong>Coherencia:</strong> relación lógica entre ideas.</li>
                <li><strong>Cohesión:</strong> uso adecuado de <em>conectores</em> y referencias (pronombres, elipsis).</li>
                <li><strong>Claridad:</strong> oraciones comprensibles, sin ambigüedades.</li>
                <li><strong>Progresión temática:</strong> avance ordenado de la información.</li>
            </ul>

            <h2>4. Tipos de Párrafo</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Propósito</th>
                        <th>Rasgos</th>
                        <th>Ejemplo breve</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Expositivo</strong></td>
                        <td>Explicar un tema</td>
                        <td>Definiciones, datos, orden lógico</td>
                        <td>“La fotosíntesis es…”</td>
                    </tr>
                    <tr>
                        <td><strong>Argumentativo</strong></td>
                        <td>Defender una postura</td>
                        <td>Tesis, razones, contraargumentos</td>
                        <td>“Es necesario reciclar porque…”</td>
                    </tr>
                    <tr>
                        <td><strong>Descriptivo</strong></td>
                        <td>Representar rasgos</td>
                        <td>Adjetivos, sensaciones</td>
                        <td>“El parque silencioso…”</td>
                    </tr>
                    <tr>
                        <td><strong>Narrativo</strong></td>
                        <td>Relatar hechos</td>
                        <td>Secuencia temporal, acciones</td>
                        <td>“Al amanecer, partimos…”</td>
                    </tr>
                </tbody>
            </table>

            <h2>5. Conectores Útiles</h2>
            <ul>
                <li><strong>Adición:</strong> además, asimismo, incluso.</li>
                <li><strong>Contraste:</strong> sin embargo, no obstante, aunque.</li>
                <li><strong>Causa:</strong> porque, debido a, dado que.</li>
                <li><strong>Consecuencia:</strong> por lo tanto, así que, en consecuencia.</li>
                <li><strong>Ejemplificación:</strong> por ejemplo, en particular.</li>
                <li><strong>Conclusión:</strong> en síntesis, en conclusión, finalmente.</li>
            </ul>

            <h2>6. Modelo de Párrafo Bien Construido</h2>
            <p><strong>Idea principal:</strong> “La lectura diaria mejora significativamente la capacidad de escritura.”</p>
            <p><strong>Desarrollo:</strong> “Este hábito amplía el vocabulario, ofrece modelos sintácticos variados y expone al lector a distintos estilos. Por ejemplo, la lectura de crónicas enseña el uso del detalle y el ritmo narrativo.”</p>
            <p><strong>Cierre:</strong> “En síntesis, leer de forma constante se refleja en textos más claros, precisos y expresivos.”</p>

            <h2>7. Errores Comunes</h2>
            <ul>
                <li>Juntar varias ideas principales en el mismo párrafo.</li>
                <li>Usar oraciones sin conexión (falta de conectores).</li>
                <li>Contradecir la idea principal con ejemplos.</li>
                <li>Concluir sin referirse al contenido presentado.</li>
            </ul>

            <h2>8. Ejercicios Propuestos</h2>
            <ol>
                <li>Escribe un párrafo expositivo (5–7 líneas) con idea principal, desarrollo y cierre sobre “hábitos de estudio”.</li>
                <li>Revisa un párrafo propio y subraya conectores, idea principal y oración de cierre.</li>
                <li>Transforma un listado de ideas en un párrafo coherente usando conectores adecuados.</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autor del Tema</h2>
            <p><strong>Daniel Cassany (1961–)</strong></p>
            <p>Lingüista y especialista en didáctica de la escritura. Sus obras, como <em>La cocina de la escritura</em>, proponen estrategias claras para planificar, redactar y revisar textos, con especial atención a la estructura del párrafo, la coherencia y la cohesión.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>10. Video recomendado</h2>
            <p>Un repaso práctico sobre cómo organizar las ideas dentro de un párrafo:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/_WJeJp0qEKU" title="Cómo escribir un buen párrafo: idea principal, apoyo y cierre" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Cómo escribir un buen párrafo: idea principal, apoyo y cierre" </em></p>
            

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
                <a href="../../lengua_castellana.php" class="volver-btn">Volver a Lengua Castellana</a>
                
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