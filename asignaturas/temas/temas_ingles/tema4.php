<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema4';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => 'Una estrategia eficaz ANTES de escuchar es:', 'options' => ['Tomar dictado de todo','Activar vocabulario del tema y predecir contenido','Ignorar el contexto','Escuchar a volumen mínimo'], 'answer' => 1],
    2 => ['q' => 'Durante la primera escucha es mejor enfocarse en:', 'options' => ['Detalles numéricos exactos','Ideas generales (gist) y propósito','Transcribir palabra por palabra','Fonética de todas las palabras'], 'answer' => 1],
    3 => ['q' => 'La escucha focalizada (listening for details) se centra en:', 'options' => ['Tema general','Intención del hablante únicamente','Datos específicos como números, fechas o instrucciones','Solo acento del hablante'], 'answer' => 2],
    4 => ['q' => 'Una técnica para mejorar pronunciación es:', 'options' => ['Shadowing (repetición inmediata)','Leer sin audio','Evitar pausas naturales','Pronunciar cada palabra aislada siempre'], 'answer' => 0],
    5 => ['q' => 'El “connected speech” incluye fenómenos como:', 'options' => ['Reducciones y enlaces entre palabras','Pausas exageradas entre palabras','Eliminar el ritmo','Pronunciar cada sílaba con la misma fuerza'], 'answer' => 0],
    6 => ['q' => 'Para pedir aclaración de forma natural puedes decir:', 'options' => ['What??','Pardon?/Could you repeat that, please?','Say again!','Talk slowly!'], 'answer' => 1],
    7 => ['q' => 'Un buen “turn-taking” en conversación implica:', 'options' => ['Interrumpir constantemente','No responder nunca con señales','Usar backchanneling (uh-huh, I see) y pausar para ceder la palabra','Hablar sin mirar al interlocutor'], 'answer' => 2],
    8 => ['q' => 'Un organizador para respuestas orales claras es:', 'options' => ['Idea → ejemplo → mini conclusión','Ejemplo sin idea','Conclusión sin idea ni ejemplo','Listar palabras sueltas'], 'answer' => 0],
    9 => ['q' => 'Para mejorar el acento de palabra debes:', 'options' => ['Ignorar sílabas tónicas','Marcar la sílaba acentuada (phoTOgraphy)','Evitar diccionarios con IPA','Decir todas las sílabas igual'], 'answer' => 1],
    10 => ['q' => '“Listening for gist” significa:', 'options' => ['Escuchar para el detalle','Escuchar para la idea general','Escuchar solo números','Escuchar para deletrear'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Listening and Speaking</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ingles/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ingles/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
            <h1>Tema 4: Listening and Speaking (Comprensión y Producción Oral)</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema fortalecerás estrategias de escucha (gist, detalles, inferencias) y técnicas de producción oral (pronunciación, ritmo, turn-taking) para comunicarte con mayor claridad y confianza.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Listening Strategies</h2>
            <h3>1.1. Before listening (pre-escucha)</h3>
            <ul>
                <li>Activa <strong>conocimientos previos</strong> y vocabulario del tema (brainstorm).</li>
                <li>Observa el <strong>título</strong>, imágenes o preguntas guía y <strong>predice</strong> ideas.</li>
            </ul>
            <h3>1.2. While listening (durante)</h3>
            <ul>
                <li><strong>Gist:</strong> identifica idea general y propósito del hablante.</li>
                <li><strong>Details:</strong> en segunda escucha, extrae datos (fechas, números, instrucciones).</li>
                <li><strong>Inferencias:</strong> deduce actitudes y relaciones por tono y contexto.</li>
            </ul>
            <h3>1.3. After listening (después)</h3>
            <ul>
                <li>Resume en 1–2 frases. Verifica respuestas y aclara dudas.</li>
                <li>Extrae <strong>chunks útiles</strong> (expresiones listas para usar).</li>
            </ul>

            <h2>2. Pronunciation & Fluency</h2>
            <ul>
                <li><strong>Word stress:</strong> phoTOgraphy / photoGRAphic; marca sílaba tónica.</li>
                <li><strong>Sentence stress & rhythm:</strong> enfatiza palabras de contenido; reduce “function words”.</li>
                <li><strong>Connected speech:</strong> enlaces (linking), reducciones (gonna, wanna), asimilación.</li>
                <li><strong>Shadowing:</strong> escucha y repite <em>inmediatamente</em> para mejorar ritmo y entonación.</li>
            </ul>

            <h2>3. Speaking: interacción</h2>
            <ul>
                <li><strong>Turn-taking:</strong> “What do you think?”, “Go ahead.”, “Let me add…”.</li>
                <li><strong>Clarificación:</strong> “Pardon?”, “Could you repeat that, please?”.</li>
                <li><strong>Backchanneling:</strong> “Right”, “I see”, “Exactly”.</li>
                <li><strong>Estructura de respuesta:</strong> Idea → ejemplo → mini conclusión.</li>
            </ul>

            <h2>4. Frases útiles (useful chunks)</h2>
            <ul>
                <li>In my opinion… / From my point of view…</li>
                <li>Could you speak more slowly, please?</li>
                <li>What I mean is… / Let me clarify…</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>5. Autor del Tema</h2>
            <p><strong>Scott Thornbury</strong></p>
            <p>Autor y formador de docentes ELT. Enfatiza el uso de <strong>chunks</strong>, interacción auténtica y estrategias de aula para desarrollar fluidez y precisión de manera integrada.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>6. Video recomendado</h2>
            <p>Estrategias de escucha y práctica de “shadowing” con ejemplos claros:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/xR6zAFleN1c" title="Listening strategies & shadowing for better pronunciation and fluency" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Listening strategies & shadowing for better pronunciation and fluency" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">7. Cuestionario de 10 Preguntas</h2>
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