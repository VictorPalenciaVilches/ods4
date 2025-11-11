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
    1 => ['q' => '¿Cuál es una forma apropiada de saludo formal en inglés?', 'options' => ['Hey, bro!','Good morning, Ms. Smith.','What’s up!','Yo!'], 'answer' => 1],
    2 => ['q' => '“How do you do?” se usa típicamente en contextos:', 'options' => ['Muy informales','Formales y de primera presentación','Entre amigos','Con familiares'], 'answer' => 1],
    3 => ['q' => 'La respuesta natural a “Nice to meet you” es:', 'options' => ['Me too','Nice to meet you, too.','Same here','It’s nothing'], 'answer' => 1],
    4 => ['q' => 'Completa: “Hi, I’m Laura. ______ name is Laura García.”', 'options' => ['Your','Our','My','Her'], 'answer' => 2],
    5 => ['q' => 'Selecciona una despedida formal:', 'options' => ['See ya!','Catch you later!','Goodbye. Have a nice day.','Later!'], 'answer' => 2],
    6 => ['q' => '“This is my teacher, Mr. Brown.” Presenta a:', 'options' => ['Uno mismo','Otra persona','Un objeto','Un lugar'], 'answer' => 1],
    7 => ['q' => '¿Cuál es correcto para pedir el nombre con cortesía?', 'options' => ['What your name?','What is you name?','What is your name?','Which is your name?'], 'answer' => 2],
    8 => ['q' => 'En un contexto informal entre amigos, es natural decir:', 'options' => ['Good evening, sir.','How do you do?','Hey! What’s up?','Pleased to make your acquaintance.'], 'answer' => 2],
    9 => ['q' => '“I’d like you to meet Ana.” significa:', 'options' => ['No quiero conocer a Ana','Te presento a Ana','Ana se va','Ana no está'], 'answer' => 1],
    10 => ['q' => '“Good afternoon” se usa principalmente entre:', 'options' => ['00:00–06:00','06:00–12:00','12:00–18:00','18:00–24:00'], 'answer' => 2],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 1 - Greetings and Introductions</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ingles/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ingles/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
  <div class="content-wrapper">
    <div class="content-container">
       <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
            <h1>Tema 1: Greetings and Introductions (Saludos y Presentaciones)</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a saludar, presentarte y despedirte en inglés en contextos formales e informales. Practicarás expresiones esenciales, fórmulas de cortesía y cómo presentar a otras personas.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Saludos (Greetings)</h2>
            <ul>
                <li><strong>Formales</strong> (escuela, entrevistas, desconocidos):
                    <ul>
                        <li>Good morning. (aprox. 6 a.m.–12 p.m.)</li>
                        <li>Good afternoon. (aprox. 12 p.m.–6 p.m.)</li>
                        <li>Good evening. (saludo al llegar por la tarde/noche)</li>
                        <li>How do you do? (muy formal, primeras presentaciones)</li>
                    </ul>
                </li>
                <li><strong>Informales</strong> (amigos, compañeros):
                    <ul>
                        <li>Hi! / Hello!</li>
                        <li>Hey! / Hey there!</li>
                        <li>What’s up? / How’s it going? / How are you?</li>
                    </ul>
                </li>
            </ul>

            <h2>2. Presentaciones (Self-introduction & Introducing others)</h2>
            <ul>
                <li><strong>Presentarte</strong>:
                    <ul>
                        <li>Hi, I’m <em>Camila</em>. / My name is <em>Camila</em>.</li>
                        <li>I’m from <em>Colombia</em>. I’m a <em>student</em>.</li>
                        <li>Nice to meet you. / Pleased to meet you.</li>
                    </ul>
                </li>
                <li><strong>Presentar a alguien</strong>:
                    <ul>
                        <li>This is my friend, <em>Daniel</em>.</li>
                        <li>I’d like you to meet <em>Mrs. Wilson</em>.</li>
                        <li><em>Mr. Brown</em>, this is <em>Ana</em>. — Nice to meet you, Ana.</li>
                    </ul>
                </li>
            </ul>

            <h2>3. Respuestas y cortesía</h2>
            <ul>
                <li>Nice to meet you, too. / It’s a pleasure to meet you.</li>
                <li>How are you? — I’m fine, thank you. And you?</li>
                <li>Thanks / Thank you very much / You’re welcome.</li>
                <li>Excuse me (para interrumpir con cortesía) vs. I’m sorry (para disculparse).</li>
            </ul>

            <h2>4. Despedidas (Leave-taking)</h2>
            <ul>
                <li><strong>Formales</strong>: Goodbye. / Have a nice day. / See you tomorrow.</li>
                <li><strong>Informales</strong>: See you! / See ya! / Later! / Take care!</li>
                <li>Good night (solo al despedirse por la noche, no como saludo).</li>
      </ul>

            <h2>5. Tabla rápida de expresiones</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Situación</th>
                        <th>Expresión</th>
                        <th>Respuesta frecuente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Saludo formal</td>
                        <td>Good morning.</td>
                        <td>Good morning.</td>
                    </tr>
                    <tr>
                        <td>Primera presentación</td>
                        <td>Nice to meet you.</td>
                        <td>Nice to meet you, too.</td>
                    </tr>
                    <tr>
                        <td>Presentar a otro</td>
                        <td>This is my classmate, Sara.</td>
                        <td>Nice to meet you, Sara.</td>
                    </tr>
                    <tr>
                        <td>Pedir nombre</td>
                        <td>What is your name?</td>
                        <td>My name is … / I’m …</td>
                    </tr>
                    <tr>
                        <td>Despedida neutral</td>
                        <td>Goodbye. / See you.</td>
                        <td>See you. / Take care.</td>
                    </tr>
                </tbody>
            </table>

            <h2>6. Mini-diálogos</h2>
            <p><strong>Formal</strong></p>
            <p>A: Good afternoon. My name is <em>Mr. Adams</em>.<br>
               B: Good afternoon, Mr. Adams. I’m <em>Lucía</em>. Nice to meet you.<br>
               A: Nice to meet you, too.</p>

            <p><strong>Informal</strong></p>
            <p>A: Hey! I’m <em>Tom</em>. What’s your name?<br>
               B: Hi, I’m <em>Paula</em>. Nice to meet you!<br>
               A: Nice to meet you, too. See you around!</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>7. Autor del Tema</h2>
            <p><strong>Michael Swan (1942–)</strong></p>
            <p>Autor y pedagogo de ELT (English Language Teaching), reconocido por sus obras de referencia sobre gramática y uso del inglés para estudiantes y docentes. Promueve explicaciones claras y ejemplos prácticos orientados a la comunicación efectiva.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>8. Video recomendado</h2>
            <p>Repaso simple de saludos y presentaciones en inglés:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/LPbAIh3bcIE" title="Greetings and Introductions in English - Basic Phrases and Dialogues" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Greetings and Introductions in English - Basic Phrases and Dialogues" </em></p>
            

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