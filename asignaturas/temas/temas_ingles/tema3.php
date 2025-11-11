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
    1 => ['q' => 'Completa: “I ____ a student.”', 'options' => ['are','is','am','be'], 'answer' => 2],
    2 => ['q' => 'Forma negativa correcta: “She ____ not at home.”', 'options' => ['is','are','am','is'], 'answer' => 3],
    3 => ['q' => 'Interrogativa: “____ you from Mexico?”', 'options' => ['Is','Are','Am','Be'], 'answer' => 1],
    4 => ['q' => 'Selecciona la oración gramatical:', 'options' => ['They is doctors.','We are teachers.','He are at school.','I are a pilot.'], 'answer' => 1],
    5 => ['q' => 'Contracción correcta de “He is”:', 'options' => ['He’s','His','Heis','Hes’'], 'answer' => 0],
    6 => ['q' => 'Completa con “there is/there are”: “____ two books on the table.”', 'options' => ['There is','There are','There be','There am'], 'answer' => 1],
    7 => ['q' => 'Orden básico S–V–C: “My name ____ Ana.”', 'options' => ['are','is','am','be'], 'answer' => 1],
    8 => ['q' => 'Pregunta corta: “Are you ready?” — Respuesta corta afirmativa:', 'options' => ['Yes, I are.','Yes, I am.','Yes, I do.','Yes, I is.'], 'answer' => 1],
    9 => ['q' => 'Completa: “It ____ Monday today.”', 'options' => ['are','am','is','be'], 'answer' => 2],
    10 => ['q' => 'Elige la negativa correcta:', 'options' => ['We not are late.','We are not late.','We aren’t late.','B y C son correctas.'], 'answer' => 3],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Verb to Be and Basic Structures</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ingles/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ingles/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
            <h1>Tema 3: Verb to Be and Basic Structures</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a usar el verbo <strong>to be</strong> (am/is/are) en sus formas afirmativa, negativa e interrogativa, además de estructuras básicas como <strong>there is/there are</strong>, contracciones y respuestas cortas.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. El verbo “to be” (am / is / are)</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr><th>Persona</th><th>Afirmativa</th><th>Negativa</th><th>Interrogativa</th></tr>
                </thead>
                <tbody>
                    <tr><td>I</td><td>I am</td><td>I am not</td><td>Am I …?</td></tr>
                    <tr><td>You</td><td>You are</td><td>You are not (aren’t)</td><td>Are you …?</td></tr>
                    <tr><td>He/She/It</td><td>He is / She is / It is</td><td>He/She/It is not (isn’t)</td><td>Is he/she/it …?</td></tr>
                    <tr><td>We</td><td>We are</td><td>We are not (aren’t)</td><td>Are we …?</td></tr>
                    <tr><td>They</td><td>They are</td><td>They are not (aren’t)</td><td>Are they …?</td></tr>
                </tbody>
            </table>

            <h3>1.1. Contracciones comunes</h3>
            <ul>
                <li>I am → <strong>I’m</strong>; You are → <strong>You’re</strong>; He is → <strong>He’s</strong>; She’s; It’s; We’re; They’re.</li>
                <li>Negativas: is not → <strong>isn’t</strong>; are not → <strong>aren’t</strong>.</li>
            </ul>

            <h2>2. Estructuras básicas con “to be”</h2>
            <ul>
                <li><strong>Identidad y profesión</strong>: I’m Maria. She is a doctor. They are students.</li>
                <li><strong>Edad</strong>: I’m 15 years old. (en inglés se usa “be”, no “have”)</li>
                <li><strong>Ubicación</strong>: We are at school. He is in the classroom.</li>
                <li><strong>Estados/condiciones</strong>: I’m tired. It is cold today.</li>
            </ul>

            <h2>3. There is / There are</h2>
            <ul>
                <li><strong>There is</strong> (singular) / <strong>There are</strong> (plural): There is a book on the desk. / There are two chairs.</li>
                <li>Negativa: There isn’t / There aren’t. Interrogativa: Is there …? / Are there …?</li>
            </ul>

            <h2>4. Respuestas cortas (short answers)</h2>
            <ul>
                <li>Are you ready? — <strong>Yes, I am.</strong> / <strong>No, I’m not.</strong></li>
                <li>Is she a teacher? — <strong>Yes, she is.</strong> / <strong>No, she isn’t.</strong></li>
                <li>Are they at home? — <strong>Yes, they are.</strong> / <strong>No, they aren’t.</strong></li>
            </ul>

            <h2>5. Errores frecuentes</h2>
            <ul>
                <li>“I <em>am</em> 15 years old” (correcto), no “I <em>have</em> 15 years”.</li>
                <li>“They <em>are</em> students” (correcto), no “They <em>is</em> students”.</li>
                <li>Interrogativas: invertir verbo y sujeto: “<strong>Are</strong> you ready?”</li>
            </ul>

            <h2>6. Mini-diálogos</h2>
            <p><strong>Presentaciones con “to be”</strong></p>
            <p>A: Hi! I’m Daniel. Are you new here?<br>
               B: Yes, I am. I’m Ana. Nice to meet you!<br>
               A: Nice to meet you, too. Where are you from?<br>
               B: I’m from Bogotá.</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>7. Autor del Tema</h2>
            <p><strong>Raymond Murphy</strong></p>
            <p>Autor de materiales didácticos de gramática para estudiantes de inglés. Conocido por su enfoque claro, práctico y progresivo para niveles básicos e intermedios.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>8. Video recomendado</h2>
            <p>Explicación clara del verbo “to be” y estructuras básicas:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Rstjd4ipXvc" title="Verb TO BE (am/is/are) - Simple explanation and practice" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Verb TO BE (am/is/are) - Simple explanation and practice"</em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">9. Cuestionario de 10 Preguntas</h2>
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