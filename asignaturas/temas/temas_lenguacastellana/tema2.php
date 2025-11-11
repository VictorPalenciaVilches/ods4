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
    1 => ['q' => '¿Cuál es la función principal de los signos de puntuación?', 'options' => ['Separar sílabas','Indicar pausas, jerarquía de ideas y sentido del texto','Marcar sílabas tónicas','Determinar la conjugación verbal'], 'answer' => 1],
    2 => ['q' => 'El punto se usa para:', 'options' => ['Separar elementos de una enumeración simple','Cerrar oraciones y párrafos','Introducir citas textuales','Indicar aclaraciones'], 'answer' => 1],
    3 => ['q' => 'La coma NO debe separarse de:', 'options' => ['El verbo y su complemento directo de forma innecesaria','Incisos explicativos','Vocativos','Conectores como “sin embargo,” cuando van como inciso'], 'answer' => 0],
    4 => ['q' => '¿Cuándo es preferible usar punto y coma?', 'options' => ['Entre sujeto y verbo','Para cerrar un párrafo','Para separar proposiciones extensas y relacionadas','Para introducir ejemplos'], 'answer' => 2],
    5 => ['q' => 'Los dos puntos se usan correctamente en:', 'options' => ['Iniciar una pregunta','Introducir una enumeración o explicación','Cerrar una cita textual','Separar sílabas'], 'answer' => 1],
    6 => ['q' => '¿Qué par de signos debe abrirse y cerrarse en español?', 'options' => ['¿ ? y ¡ !','Solo ? y ! al final','< >','^ v'], 'answer' => 0],
    7 => ['q' => 'Los puntos suspensivos indican:', 'options' => ['Fin absoluto de un texto','Una pausa interminable sin sentido','Suspenso, enumeración incompleta o duda','Cambio de tema obligatorio'], 'answer' => 2],
    8 => ['q' => 'Las comillas (“ ”) se usan para:', 'options' => ['Introducir aclaraciones','Marcar citas textuales, ironías o títulos de artículos','Separar oraciones independientes','Indicar fin de párrafo'], 'answer' => 1],
    9 => ['q' => 'La raya (—) se emplea para:', 'options' => ['Encerrar abreviaturas','Indicar diálogo e incisos explicativos en textos narrativos','Separar miles en números','Encerrar siglas'], 'answer' => 1],
    10 => ['q' => '¿Cuál es correcto?', 'options' => ['Fui al mercado, y compré pan, leche, y huevos.','Fui al mercado y compré pan, leche y huevos.','Fui al mercado; y compré; pan, leche y huevos.','Fui al mercado y, compré pan, leche y huevos.'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2 - Signos de Puntuación</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 2: Signos de Puntuación</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a usar correctamente los signos de puntuación para mejorar la claridad, la coherencia y el ritmo de tus textos.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Significado y Propósito</h2>
            <p>Los <strong>signos de puntuación</strong> son marcas gráficas que organizan el discurso escrito: indican <strong>pausas</strong>, jerarquizan <strong>ideas</strong>, marcan <strong>intenciones</strong> (enfado, sorpresa, pregunta) y evitan <strong>ambigüedades</strong>. Una puntuación adecuada guía al lector y refleja la estructura lógica del texto.</p>
            <h3>¿Por qué son importantes?</h3>
            <ul>
                <li>Dan <strong>claridad</strong> y precisión al mensaje.</li>
                <li>Ayudan a construir <strong>oraciones bien estructuradas</strong>.</li>
                <li>Evitan <strong>errores de interpretación</strong>.</li>
                <li>Mejoran la <strong>coherencia y fluidez</strong> del texto.</li>
            </ul>

            <h2>2. Conceptos Fundamentales</h2>

            <h3>2.1. Punto (.)</h3>
            <ul>
                <li><strong>Punto y seguido</strong>: cierra una oración dentro del mismo párrafo.</li>
                <li><strong>Punto y aparte</strong>: cierra un párrafo.</li>
                <li><strong>Punto final</strong>: cierra un texto.</li>
            </ul>
            <p><em>Ejemplos:</em> “Estudié toda la tarde. Terminé el trabajo.”</p>

            <h3>2.2. Coma (,)</h3>
            <ul>
                <li>Separa elementos de una <strong>enumeración simple</strong> (sin conjunción final): “rojo, azul, verde”.</li>
                <li>Encierra <strong>incisos explicativos</strong>: “Mi hermano, <em>quien vive en Cali</em>, llegó ayer”.</li>
                <li>Se usa con <strong>vocativos</strong>: “<em>María</em>, ven aquí”.</li>
                <li>NUNCA <strong>separa sujeto y verbo</strong> por rutina: “La lectura atenta <em>mejora</em> la escritura”.</li>
            </ul>

            <h3>2.3. Punto y coma (;)</h3>
            <ul>
                <li>Separa <strong>proposiciones relacionadas</strong> cuando contienen comas internas.</li>
                <li>Marca una pausa <strong>intermedia</strong> entre coma y punto.</li>
                <li><em>Ejemplo:</em> “Llegamos tarde; el tráfico estaba imposible”.</li>
            </ul>

            <h3>2.4. Dos puntos (:)</h3>
            <ul>
                <li>Introducen <strong>explicaciones, citas o enumeraciones</strong>.</li>
                <li>Tras fórmulas de <strong>saludo</strong> en cartas o correos: “Estimado profesor:”</li>
                <li><em>Ejemplo:</em> “Llevé lo necesario: agua, bloqueador y gorra”.</li>
            </ul>

            <h3>2.5. Interrogación (¿ ?)</h3>
            <p>En español se usan <strong>signo de apertura y de cierre</strong>. <em>Ejemplo:</em> “¿Qué hora es?”</p>

            <h3>2.6. Exclamación (¡ !)</h3>
            <p>Señalan emociones o énfasis. <em>Ejemplo:</em> “¡Qué sorpresa!”</p>

            <h3>2.7. Comillas (“ ”) y comillas simples (‘ ’)</h3>
            <ul>
                <li>Para <strong>citas textuales</strong> o títulos de artículos/capítulos.</li>
                <li>Para <strong>marcar ironía</strong> o palabras usadas en sentido especial.</li>
                <li>En citas dentro de citas, usar comillas simples: “Dijo: ‘no vuelvas tarde’”.</li>
            </ul>

            <h3>2.8. Paréntesis ( )</h3>
            <p>Introducen <strong>aclaraciones</strong>, fechas o datos complementarios. <em>Ejemplo:</em> “García Márquez (1927–2014)…”</p>

            <h3>2.9. Raya (—) y guion (-)</h3>
            <ul>
                <li><strong>Raya (—)</strong>: para <strong>diálogos</strong> y <strong>incisos</strong> largos: —No vendré —dijo— hasta tarde.</li>
                <li><strong>Guion (-)</strong>: compuestos, cortes de palabra al final de línea, intervalos (10-12).</li>
            </ul>

            <h3>2.10. Puntos suspensivos (…) </h3>
            <p>Indican <strong>enumeración abierta</strong>, <strong>duda</strong> o <strong>suspenso</strong>. No se combinan con punto final.</p>

            <h2>3. Tabla comparativa rápida</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Signo</th>
                        <th>Uso principal</th>
                        <th>Ejemplo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Punto</td><td>Cerrar oraciones/párrafos</td><td>“Terminó el capítulo.”</td></tr>
                    <tr><td>Coma</td><td>Enumeraciones, incisos, vocativos</td><td>“Pedro, ven.”</td></tr>
                    <tr><td>Punto y coma</td><td>Separar proposiciones relacionadas</td><td>“Salimos tarde; llovía.”</td></tr>
                    <tr><td>Dos puntos</td><td>Introducir explicación/enumeración</td><td>“Llevé: agua y fruta.”</td></tr>
                    <tr><td>¿ ? / ¡ !</td><td>Interrogación/exclamación</td><td>“¿Vienes?” “¡Gracias!”</td></tr>
                    <tr><td>Comillas</td><td>Citas, ironía, títulos cortos</td><td>“El ‘cómo’ importa.”</td></tr>
                    <tr><td>Paréntesis</td><td>Aclaraciones</td><td>(véase anexo)</td></tr>
                    <tr><td>Raya</td><td>Diálogo/incisos extensos</td><td>—No insistas— respondió.</td></tr>
                    <tr><td>…</td><td>Suspenso/enumeración abierta</td><td>“Traje pan, frutas…”</td></tr>
                </tbody>
            </table>

            <h2>4. Errores frecuentes</h2>
            <ul>
                <li>Poner coma entre sujeto y verbo sin motivo.</li>
                <li>Abusar de la coma en incisos muy extensos.</li>
                <li>Usar signos de cierre sin los de apertura (¿? ¡!).</li>
                <li>Unir punto con puntos suspensivos (….)</li>
                <li>Comillas sin cerrar o mezcladas sin criterio.</li>
            </ul>

            <h2>5. Ejemplos y ejercicios</h2>
            <ul>
                <li>Corrige la puntuación: “Si puedes ven luego te explico”.</li>
                <li>Inserta signos adecuados: “No sé que hacer me ayudas”.</li>
                <li>Convierte en diálogo con raya: “Ella dijo no iré”.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>6. Autor del Tema</h2>
            <p><strong>José Martínez de Sousa (1933–)</strong></p>
            <p>Lexicógrafo y ortotipógrafo español, referencia en normas de estilo, ortografía y puntuación. Autor de obras como <em>Diccionario de ortografía de la lengua española</em> y <em>Ortografía y ortotipografía del español actual</em>. Su trabajo ha guiado a editores y correctores en el uso preciso de la puntuación.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>7. Video recomendado</h2>
            <p>Un repaso claro y práctico de los usos de los signos de puntuación:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/2Bs6tknaLJQ" title="Signos de puntuación: usos y ejemplos | Repaso de Lengua" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Signos de puntuación: usos y ejemplos | Repaso de Lengua" </em></p>
           

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