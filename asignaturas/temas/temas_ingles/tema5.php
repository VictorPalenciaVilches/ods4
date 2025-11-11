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
    1 => ['q' => 'El orden básico de un párrafo efectivo en inglés suele ser:', 'options' => ['Closing → Topic → Supporting','Topic sentence → Supporting sentences → Closing sentence','Examples → Title → Topic','Random ideas without order'], 'answer' => 1],
    2 => ['q' => 'La “topic sentence” expresa:', 'options' => ['Un ejemplo concreto','La idea principal del párrafo','Una cita textual','Una pregunta retórica sin relación'], 'answer' => 1],
    3 => ['q' => 'Choose the best cohesive device to add information:', 'options' => ['However,','Because,','Moreover,','Although'], 'answer' => 2],
    4 => ['q' => 'El conector adecuado para contraste es:', 'options' => ['Therefore,','For example,','However,','First,'], 'answer' => 2],
    5 => ['q' => 'Una “closing sentence” eficaz:', 'options' => ['Abre un tema nuevo','Resume la idea principal o concluye el punto','Incluye datos sin relación','Repite palabra por palabra la topic sentence'], 'answer' => 1],
    6 => ['q' => 'Identifica el error: “People is happy in small towns.”', 'options' => ['Concordancia sujeto–verbo','Uso del plural','Ortografía','Puntuación'], 'answer' => 0],
    7 => ['q' => '¿Cuál es una buena práctica de estilo?', 'options' => ['Oraciones muy largas sin puntuación','Evitar conectores','Usar oraciones claras y ejemplos breves','Cambiar de idea principal a mitad del párrafo'], 'answer' => 2],
    8 => ['q' => 'Selecciona el conector para ejemplo:', 'options' => ['For instance,','Nevertheless,','Therefore,','In contrast,'], 'answer' => 0],
    9 => ['q' => '¿Qué oración funciona como “topic sentence”?', 'options' => ['For example, I usually read at night.','Reading every day improves my vocabulary and writing skills.','At night, I read comics and short stories.','I also like audiobooks.'], 'answer' => 1],
    10 => ['q' => 'Completa: “________, many students prefer studying online because it is flexible.”', 'options' => ['However,','In conclusion,','For example,','Nowadays,'], 'answer' => 3],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 5 - Basic Writing: Short Paragraphs</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ingles/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ingles/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
            <h1>Tema 5: Basic Writing — Short Paragraphs</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a planificar y escribir <strong>párrafos cortos</strong> en inglés usando una <strong>topic sentence</strong>, oraciones de apoyo con ejemplos y una <strong>closing sentence</strong> clara. Practicarás conectores, cohesión y corrección básica.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Estructura de un párrafo</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr><th>Parte</th><th>Propósito</th><th>Ejemplo</th></tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Topic sentence</strong></td>
                        <td>Presenta la idea principal del párrafo.</td>
                        <td><em>Reading every day improves my English.</em></td>
                    </tr>
                    <tr>
                        <td><strong>Supporting sentences</strong></td>
                        <td>Explican la idea con razones, datos o ejemplos.</td>
                        <td><em>For example, I learn new words and expressions from stories.</em></td>
                    </tr>
                    <tr>
                        <td><strong>Closing sentence</strong></td>
                        <td>Cierra o resume el punto.</td>
                        <td><em>Therefore, daily reading is a simple way to make progress.</em></td>
                    </tr>
                </tbody>
            </table>

            <h2>2. Conectores útiles (cohesive devices)</h2>
            <ul>
                <li><strong>Adición:</strong> moreover, in addition, also.</li>
                <li><strong>Ejemplo:</strong> for example, for instance, such as.</li>
                <li><strong>Contraste:</strong> however, on the other hand, in contrast.</li>
                <li><strong>Causa/resultado:</strong> because, therefore, as a result.</li>
                <li><strong>Secuencia:</strong> first, next, then, finally.</li>
            </ul>

            <h2>3. Lenguaje modelo</h2>
            <ul>
                <li><strong>Topic:</strong> <em>Studying with a plan helps me save time.</em></li>
                <li><strong>Support:</strong> <em>For example, I use a weekly schedule and short goals.</em></li>
                <li><strong>Closing:</strong> <em>As a result, I finish my tasks earlier.</em></li>
            </ul>

            <h2>4. Consejos de estilo</h2>
            <ul>
                <li>Una idea principal por párrafo. Evita mezclar temas.</li>
                <li>Usa <strong>oraciones claras</strong> (S + V + C) y ejemplos breves.</li>
                <li>Revisa <strong>concordancia</strong> (People <em>are</em>…), artículos (a/an), mayúsculas y puntuación.</li>
                <li>Prefiere vocabulario que conoces bien; mejora con sinónimos simples.</li>
            </ul>

            <h2>5. Mini-ejemplo completo</h2>
            <p><em>Nowadays, online courses are very popular.</em> <em>For example, students can learn from home and choose their own schedule.</em> <em>In addition, they can watch the lessons again to review difficult parts.</em> <em>Therefore, online learning is a flexible option for many people.</em></p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>6. Autor del Tema</h2>
            <p><strong>Ann Hogue</strong></p>
            <p>Autora de materiales de escritura en inglés (series de párrafo a ensayo). Su enfoque guía paso a paso: planificación, redacción, cohesión y revisión, con modelos claros y práctica graduada.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>7. Video recomendado</h2>
            <p>Cómo escribir un párrafo básico con idea principal, apoyo y cierre:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/keBFpEdiVVU" title="How to Write a Basic Paragraph in English (Topic, Supporting, Closing)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "How to Write a Basic Paragraph in English" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">8. Cuestionario de 10 Preguntas</h2>
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
                <a href="../../ingles.php" class="volver-btn">Volver a Inglés</a>
               
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