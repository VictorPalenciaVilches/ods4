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
    1 => ['q' => '¿Qué es un “word family”?', 'options' => ['Un grupo de palabras al azar','Palabras relacionadas por raíz y afijos (happy, unhappy, happiness)','Sinónimos exactos','Solo palabras compuestas'], 'answer' => 1],
    2 => ['q' => 'El “stress” de palabra en “pho-to-graph” recae en:', 'options' => ['pho','to','graph','ninguna'], 'answer' => 0],
    3 => ['q' => 'El símbolo /ɪ/ representa el sonido de la vocal en:', 'options' => ['seat','sit','site','cite'], 'answer' => 1],
    4 => ['q' => 'Un cognado verdadero entre español e inglés es:', 'options' => ['actually – actualmente','library – librería','fabric – fábrica','animal – animal'], 'answer' => 3],
    5 => ['q' => '¿Cuál es un ejemplo de “silent letter”?', 'options' => ['knife','cat','this','open'], 'answer' => 0],
    6 => ['q' => 'La entonación ascendente (rising intonation) se usa típicamente en:', 'options' => ['Afirmaciones neutrales','Preguntas “Yes/No”','Órdenes','Saludos formales'], 'answer' => 1],
    7 => ['q' => '“Collocation” se refiere a:', 'options' => ['Palabras que suenan igual','Palabras que suelen aparecer juntas (ej. make a decision)','Palabras inventadas','Acrónimos técnicos'], 'answer' => 1],
    8 => ['q' => 'En “photography”, el acento correcto es:', 'options' => ['PHO-to-gra-phy','pho-TO-gra-phy','pho-to-GRA-phy','pho-to-gra-PHY'], 'answer' => 2],
    9 => ['q' => '¿Cuál es un mínimo par (minimal pair)?', 'options' => ['ship–sheep','go–went','book–books','teacher–teach'], 'answer' => 0],
    10 => ['q' => 'La “schwa” /ə/ aparece típicamente en sílabas:', 'options' => ['Tónicas','Átonas','Finales siempre','Iniciales siempre'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2 - Vocabulary and Pronunciation</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ingles/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ingles/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ingles.php" class="volver-btn">← Volver a Inglés</a>
            <h1>Tema 2: Vocabulary and Pronunciation (Vocabulario y Pronunciación)</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema reforzarás el crecimiento de vocabulario (familias de palabras, cognados, “collocations”) y habilidades de pronunciación (sonidos clave, acento de palabra, entonación y “schwa”).</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Construcción de Vocabulario</h2>
            <h3>1.1. Word families (familias de palabras)</h3>
            <ul>
                <li><strong>happy</strong> (adj) → <strong>unhappy</strong> (adj) → <strong>happiness</strong> (n) → <strong>happily</strong> (adv)</li>
                <li><strong>create</strong> (v) → <strong>creative</strong> (adj) → <strong>creation</strong> (n) → <strong>creativity</strong> (n)</li>
            </ul>

            <h3>1.2. Afijos comunes</h3>
            <table class="tabla-estructura">
                <thead>
                    <tr><th>Afijo</th><th>Tipo</th><th>Ejemplo</th></tr>
                </thead>
                <tbody>
                    <tr><td>un- / in- / im-</td><td>Prefijo (negación)</td><td>unfair, incomplete, impossible</td></tr>
                    <tr><td>-ness / -ity</td><td>Sufijo (sustantivos)</td><td>kindness, activity</td></tr>
                    <tr><td>-ful / -less</td><td>Sufijo (adjetivos)</td><td>useful, useless</td></tr>
                    <tr><td>-ly</td><td>Sufijo (adverbios)</td><td>quick → quickly</td></tr>
                </tbody>
            </table>

            <h3>1.3. Cognados y falsos cognados</h3>
            <ul>
                <li><strong>Cognados verdaderos:</strong> animal–animal, color–color.</li>
                <li><strong>Falsos cognados:</strong> actually (en realidad) ≠ actualmente; library (biblioteca) ≠ librería.</li>
            </ul>

            <h3>1.4. Collocations (palabras que van juntas)</h3>
            <ul>
                <li><strong>make</strong> a decision, <strong>do</strong> homework, <strong>have</strong> breakfast, <strong>take</strong> a photo.</li>
            </ul>

            <h2>2. Pronunciación</h2>
            <h3>2.1. Sonidos clave y minimal pairs</h3>
            <ul>
                <li>/ɪ/ vs /iː/: <em>ship</em> /ʃɪp/ vs <em>sheep</em> /ʃiːp/</li>
                <li>/æ/ vs /ʌ/: <em>man</em> /mæn/ vs <em>sun</em> /sʌn/</li>
                <li><strong>Silent letters</strong>: <em>kn</em>ife, <em>w</em>rite, <em>islan</em>d</li>
            </ul>

            <h3>2.2. Acento de palabra (word stress)</h3>
            <ul>
                <li><strong>PHOtograph</strong> (ˈfəʊtəɡrɑːf)</li>
                <li>phoTOgraphy (fəˈtɒɡrəfi)</li>
                <li>photoGRAphic (ˌfəʊtəˈɡræfɪk)</li>
            </ul>

            <h3>2.3. Schwa /ə/ y entonación</h3>
            <ul>
                <li><strong>/ə/</strong> en sílabas átonas: <em>about</em> /əˈbaʊt/, <em>teacher</em> /ˈtiːtʃər/.</li>
                <li><strong>Entonación</strong>: ascendente en “Yes/No questions” (Are you ready? ↑), descendente en afirmaciones (I’m ready. ↓).</li>
            </ul>

            <h2>3. Estrategias rápidas</h2>
            <ul>
                <li>Aprende vocabulario en <strong>familias</strong> y con <strong>collocations</strong>.</li>
                <li>Escucha y repite <strong>minimal pairs</strong>.</li>
                <li>Subraya la <strong>sílaba tónica</strong> y marca la <strong>schwa</strong> en tu libreta.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>4. Autor del Tema</h2>
            <p><strong>Adrian Underhill</strong></p>
            <p>Formador y autor en enseñanza de pronunciación en inglés. Conocido por su “Pronunciation Chart” y por enfoques prácticos para desarrollar conciencia fonética en el aula.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>5. Video recomendado</h2>
            <p>Repaso de sonidos clave, “schwa” y minimal pairs:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/5NGarULwdDU" title="English Pronunciation: Minimal Pairs, Schwa and Word Stress (Beginner–Intermediate)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "English Pronunciation: Minimal Pairs, Schwa and Word Stress" </em></p>
           

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">6. Cuestionario de 10 Preguntas</h2>
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