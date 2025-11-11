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
    1 => ['q' => 'La comprensión lectora es la capacidad de...', 'options' => ['Memorizar párrafos enteros','Decodificar letras únicamente','Construir significado a partir de un texto mediante procesos cognitivos','Leer en voz alta sin errores'], 'answer' => 2],
    2 => ['q' => '¿Cuál NO es un nivel clásico de comprensión?', 'options' => ['Literal','Inferencial','Crítica','Ortográfica'], 'answer' => 3],
    3 => ['q' => 'Identificar “quién, qué, cuándo, dónde” corresponde al nivel...', 'options' => ['Crítico','Inferencial','Literal','Metacognitivo'], 'answer' => 2],
    4 => ['q' => 'Deducir una causa no explícita pertenece al nivel...', 'options' => ['Inferencial','Literal','Mecánico','Fonético'], 'answer' => 0],
    5 => ['q' => 'Evaluar la intención del autor y la validez de sus argumentos es...', 'options' => ['Comprensión literal','Comprensión crítica','Comprensión fonológica','Comprensión mnemotécnica'], 'answer' => 1],
    6 => ['q' => 'SQ3R significa:', 'options' => ['Seleccionar-Quizá-Recordar-Responder-Revisar','Survey-Question-Read-Recite-Review','See-Query-Read-Repeat-Relay','Search-Question-Rewrite-Record-Review'], 'answer' => 1],
    7 => ['q' => 'Un organizador gráfico útil para relaciones causa-efecto es...', 'options' => ['Mapa mental','Diagrama de flujo','Línea de tiempo','Tabla T'], 'answer' => 1],
    8 => ['q' => 'La macroestructura de un texto se relaciona con...', 'options' => ['El sonido de las palabras','La estructura global (tópicos y subtemas)','La cantidad de párrafos','El tamaño de la tipografía'], 'answer' => 1],
    9 => ['q' => 'Un error frecuente en comprensión es...', 'options' => ['Activar conocimientos previos','Subrayar con criterio','Confundir idea principal con detalles','Generar preguntas al leer'], 'answer' => 2],
    10 => ['q' => 'El propósito de los conectores es...', 'options' => ['Decorar el texto','Aumentar el número de palabras','Establecer relaciones lógicas entre ideas','Eliminar repeticiones',], 'answer' => 2],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Comprensión Lectora</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 4: Comprensión Lectora</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema fortalecerás tus habilidades para comprender textos de forma profunda: desde obtener información explícita hasta evaluar críticamente los argumentos del autor.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Comprensión Lectora?</h2>
            <p>La <strong>comprensión lectora</strong> es la capacidad de <strong>construir significado</strong> a partir de un texto mediante procesos cognitivos (activar conocimientos previos, hacer inferencias, monitorear la comprensión y evaluar el contenido). No se limita a “leer palabras”; implica <strong>interpretar</strong>, <strong>relacionar</strong> y <strong>valorar</strong> la información.</p>

            <h2>2. Niveles de Comprensión</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Nivel</th>
                        <th>Qué se hace</th>
                        <th>Ejemplos de tareas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Literal</strong></td>
                        <td>Recuperar información explícita.</td>
                        <td>Identificar quiénes, qué, cuándo, dónde; localizar datos.</td>
                    </tr>
                    <tr>
                        <td><strong>Inferencial</strong></td>
                        <td>Deducir información implícita.</td>
                        <td>Inferir causas, consecuencias, motivos, estados de ánimo.</td>
                    </tr>
                    <tr>
                        <td><strong>Crítica</strong></td>
                        <td>Evaluar la validez, pertinencia e intención.</td>
                        <td>Reconocer sesgos, detectar falacias, juzgar evidencias.</td>
                    </tr>
                    <tr>
                        <td><strong>Metacognitiva</strong></td>
                        <td>Monitorear y regular la propia comprensión.</td>
                        <td>Detectar confusiones, releer, generar preguntas y resúmenes.</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Macroestructura y Microestructura</h2>
            <ul>
                <li><strong>Macroestructura:</strong> estructura global del texto (tema principal, subtemas, organización por secciones, tesis y argumentos).</li>
                <li><strong>Microestructura:</strong> relación entre oraciones y párrafos (cohesión: conectores, referencias; coherencia: orden lógico).</li>
            </ul>

            <h2>4. Procesos Clave de Comprensión</h2>
            <ul>
                <li><strong>Activación de conocimientos previos:</strong> conectar el tema con experiencias y aprendizajes anteriores.</li>
                <li><strong>Inferencias:</strong> completar información no explícita a partir de indicios.</li>
                <li><strong>Formulación de preguntas:</strong> antes, durante y después de leer (¿Qué sé? ¿Qué espero? ¿Qué aprendí?).</li>
                <li><strong>Monitoreo:</strong> detectar confusiones, releer, anotar, resumir.</li>
                <li><strong>Evaluación:</strong> analizar la intención del autor, calidad de argumentos y evidencias.</li>
            </ul>

            <h2>5. Estructuras Textuales Frecuentes</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Estructura</th>
                        <th>Propósito</th>
                        <th>Señales o conectores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Causa-efecto</strong></td>
                        <td>Explicar por qué sucede algo y sus consecuencias.</td>
                        <td>porque, debido a, por lo tanto, en consecuencia</td>
                    </tr>
                    <tr>
                        <td><strong>Comparación-contraste</strong></td>
                        <td>Resaltar similitudes y diferencias.</td>
                        <td>como, así como, en cambio, sin embargo, aunque</td>
                    </tr>
                    <tr>
                        <td><strong>Secuencia</strong></td>
                        <td>Ordenar pasos o momentos.</td>
                        <td>primero, luego, después, finalmente</td>
                    </tr>
                    <tr>
                        <td><strong>Problema-solución</strong></td>
                        <td>Plantear un problema y proponer alternativas.</td>
                        <td>el problema es, la solución consiste, una alternativa</td>
                    </tr>
                    <tr>
                        <td><strong>Descripción</strong></td>
                        <td>Detallar rasgos y cualidades.</td>
                        <td>se caracteriza por, presenta, posee</td>
                    </tr>
                </tbody>
            </table>

            <h2>6. Estrategias Prácticas (Paso a Paso)</h2>
            <h3>6.1. Método SQ3R</h3>
            <ol>
                <li><strong>Survey (Explorar):</strong> títulos, subtítulos, imágenes, palabras clave.</li>
                <li><strong>Question (Preguntar):</strong> formula preguntas guía.</li>
                <li><strong>Read (Leer):</strong> busca responder a tus preguntas.</li>
                <li><strong>Recite (Recitar/Decir):</strong> resume con tus palabras.</li>
                <li><strong>Review (Repasar):</strong> verifica ideas principales y dudas.</li>
            </ol>

            <h3>6.2. Estrategia PQRST</h3>
            <ol>
                <li><strong>Preview:</strong> visión general.</li>
                <li><strong>Question:</strong> preguntas orientadoras.</li>
                <li><strong>Read:</strong> lectura atenta.</li>
                <li><strong>Self-Recitation:</strong> recordar sin mirar.</li>
                <li><strong>Test:</strong> autoevaluación breve.</li>
            </ol>

            <h2>7. Organizadores Gráficos Útiles</h2>
            <ul>
                <li><strong>Mapa conceptual:</strong> conceptos y relaciones jerárquicas.</li>
                <li><strong>Diagrama de flujo:</strong> procesos o secuencias.</li>
                <li><strong>Línea de tiempo:</strong> cronologías.</li>
                <li><strong>Tabla comparativa:</strong> similitudes/diferencias.</li>
            </ul>

            <h2>8. Errores Comunes y Cómo Evitarlos</h2>
            <ul>
                <li>Leer sin objetivo → <strong>Define propósitos</strong> y preguntas.</li>
                <li>Subrayar todo → <strong>Subraya ideas clave</strong> (no más del 30%).</li>
                <li>No verificar comprensión → <strong>Resume</strong> y <strong>explica en voz alta</strong>.</li>
                <li>Ignorar conectores → <strong>Marcalos</strong> y entiende relaciones lógicas.</li>
                <li>No activar conocimientos previos → <strong>Relaciona</strong> el texto con experiencias propias.</li>
            </ul>

            <h2>9. Mini Glosario</h2>
            <ul>
                <li><strong>Inferencia:</strong> deducción basada en indicios del texto.</li>
                <li><strong>Macroestructura:</strong> organización global.</li>
                <li><strong>Cohesión:</strong> mecanismos lingüísticos que unen ideas.</li>
                <li><strong>Coherencia:</strong> sentido lógico entre ideas.</li>
                <li><strong>Metacognición:</strong> autorregulación del propio aprendizaje.</li>
            </ul>

            <h2>10. Ejercicios Propuestos</h2>
            <ol>
                <li>Lee un artículo breve y construye un <strong>mapa conceptual</strong> con tema, subtemas y detalles.</li>
                <li>Identifica <strong>5 conectores</strong> del texto y explica la relación que establecen.</li>
                <li>Redacta <strong>3 inferencias</strong> justificadas con evidencias del texto.</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>11. Autor del Tema</h2>
            <p><strong>Isabel Solé (1951–)</strong></p>
            <p>Investigadora y referente en didáctica de la lectura. Sus aportes sobre estrategias de comprensión (planificación, supervisión y evaluación) han sido esenciales para el trabajo en aula.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>12. Video recomendado</h2>
            <p>Introducción clara a estrategias de comprensión lectora:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/lzDaBQP5V1o" title="Estrategias de Comprensión Lectora - Niveles y técnicas" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Estrategias de Comprensión Lectora - Niveles y técnicas" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">13. Cuestionario de 10 Preguntas</h2>
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