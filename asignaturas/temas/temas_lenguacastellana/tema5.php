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
    1 => ['q' => 'La redacción de textos consiste principalmente en...', 'options' => ['Copiar y pegar información de fuentes','Expresar ideas de forma clara, coherente y adecuada al propósito y audiencia','Usar la mayor cantidad de adjetivos posibles','Escribir sin planificación previa'], 'answer' => 1],
    2 => ['q' => 'El orden más habitual en un texto expositivo es:', 'options' => ['Cierre → desarrollo → título','Introducción → desarrollo → conclusión','Conclusión → ejemplos → título','Ejemplos → conclusiones → dedicatoria'], 'answer' => 1],
    3 => ['q' => 'Un objetivo comunicativo define...', 'options' => ['El número de páginas','La intención del texto (informar, persuadir, narrar, etc.)','La cantidad de imágenes','El tamaño de la fuente'], 'answer' => 1],
    4 => ['q' => '¿Cuál conector introduce contraste?', 'options' => ['Por lo tanto','En primer lugar','Sin embargo','Por ejemplo'], 'answer' => 2],
    5 => ['q' => 'La cohesión textual se logra mediante...', 'options' => ['Conectores, referencias pronominales, elipsis y paralelismo','Usar palabras complicadas','Mayúsculas y negritas','Aumentar el número de adjetivos'], 'answer' => 0],
    6 => ['q' => '¿Qué es la coherencia?', 'options' => ['Que el texto luzca estéticamente','Relación lógica entre ideas y partes del texto','Uso de rimas y figuras retóricas','Evitar signos de puntuación'], 'answer' => 1],
    7 => ['q' => 'En la revisión, NO corresponde:', 'options' => ['Verificar ortografía y puntuación','Comprobar si el texto cumple el propósito','Eliminar repeticiones innecesarias','Agregar datos sin fuente confiable'], 'answer' => 3],
    8 => ['q' => '¿Qué estrategia pertenece a la planificación?', 'options' => ['Usar sinónimos para evitar repeticiones','Definir objetivo, audiencia y esquema del texto','Aplicar corrección ortográfica final','Cambiar el formato del documento'], 'answer' => 1],
    9 => ['q' => 'Una conclusión eficaz debe...', 'options' => ['Introducir un tema nuevo','Contradecir la tesis','Sintetizar y cerrar el tema, pudiendo proponer proyección','Eliminar los ejemplos previos'], 'answer' => 2],
    10 => ['q' => '¿Cuál ejemplo muestra un uso adecuado de conectores?', 'options' => ['Estudié mucho, sin embargo aprobé por suerte.','Estudié mucho; por lo tanto, aprobé el examen.','Estudié mucho, y por eso pero aprobé.','Estudié mucho, así que, por ejemplo, aprobé.'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 5 - Redacción de Textos</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 5: Redacción de Textos</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a planificar, redactar, revisar y editar textos con claridad, coherencia y adecuación al propósito comunicativo.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Redacción?</h2>
            <p>La <strong>redacción</strong> es el proceso de <strong>expresar ideas por escrito</strong> de forma <strong>clara</strong> (se entiende), <strong>coherente</strong> (tiene sentido global), <strong>cohesionada</strong> (bien enlazada) y <strong>adecuada</strong> (a propósito y audiencia). Implica seleccionar información, organizarla y presentarla con precisión.</p>

            <h2>2. Proceso de Escritura</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Fase</th>
                        <th>Objetivo</th>
                        <th>Acciones clave</th>
                        <th>Preguntas guía</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Planificación</strong></td>
                        <td>Definir rumbo</td>
                        <td>Objetivo, audiencia, ideas, esquema (introducción, desarrollo, conclusión)</td>
                        <td>¿Para qué escribo? ¿Para quién? ¿Qué estructura usaré?</td>
                    </tr>
                    <tr>
                        <td><strong>Redacción</strong></td>
                        <td>Producir el borrador</td>
                        <td>Oración temática, desarrollo, ejemplos, conectores</td>
                        <td>¿La idea principal está clara en cada párrafo?</td>
                    </tr>
                    <tr>
                        <td><strong>Revisión</strong></td>
                        <td>Mejorar el contenido</td>
                        <td>Coherencia, cohesión, pertinencia de ejemplos</td>
                        <td>¿El texto cumple su objetivo? ¿Hay repeticiones?</td>
                    </tr>
                    <tr>
                        <td><strong>Edición</strong></td>
                        <td>Corregir forma</td>
                        <td>Ortografía, puntuación, sintaxis, formato</td>
                        <td>¿Hay errores ortográficos o de puntuación?</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Adecuación, Coherencia y Cohesión</h2>
            <ul>
                <li><strong>Adecuación:</strong> ajustar registro y tono a la audiencia (académico, cotidiano, técnico) y al propósito (informar, persuadir, narrar, instruir).</li>
                <li><strong>Coherencia:</strong> relación lógica entre ideas; evitar contradicciones y saltos temáticos.</li>
                <li><strong>Cohesión:</strong> mecanismos lingüísticos que vinculan oraciones: conectores, referencias pronominales, sinónimos, elipsis y paralelismo.</li>
            </ul>

            <h2>4. Estructura Global del Texto</h2>
            <ul>
                <li><strong>Introducción:</strong> contextualiza, presenta objetivo/tesis y anticipa el plan de desarrollo.</li>
                <li><strong>Desarrollo:</strong> organiza argumentos/ideas por párrafos, con ejemplos y evidencias.</li>
                <li><strong>Conclusión:</strong> sintetiza, reafirma propósito y puede proyectar líneas futuras.</li>
            </ul>

            <h2>5. Conectores y Marcadores Discursivos</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Función</th>
                        <th>Ejemplos de conectores</th>
                    </tr>
                </thead>
                <tbody>
                    <tr><td>Adición</td><td>además, asimismo, incluso</td></tr>
                    <tr><td>Causa</td><td>porque, debido a, dado que</td></tr>
                    <tr><td>Consecuencia</td><td>por lo tanto, así que, en consecuencia</td></tr>
                    <tr><td>Contraste</td><td>sin embargo, no obstante, en cambio</td></tr>
                    <tr><td>Ejemplificación</td><td>por ejemplo, en particular</td></tr>
                    <tr><td>Orden</td><td>primero, luego, finalmente</td></tr>
                    <tr><td>Conclusión</td><td>en síntesis, en conclusión</td></tr>
                </tbody>
            </table>

            <h2>6. Estrategias Prácticas</h2>
            <ul>
                <li><strong>Lluvia de ideas + mapa conceptual</strong> para organizar tópicos y subtemas.</li>
                <li><strong>Esquema de párrafos</strong>: idea principal + oraciones de apoyo + cierre.</li>
                <li><strong>Paráfrasis y síntesis</strong> para integrar fuentes sin plagio (cita cuando corresponda).</li>
                <li><strong>Lectura en voz alta</strong> para detectar incoherencias y puntuación deficiente.</li>
                <li><strong>Checklist</strong> antes de entregar (ver más abajo).</li>
            </ul>

            <h2>7. Modelos Breves de Párrafo</h2>
            <p><strong>Expositivo (deductivo):</strong> “El reciclaje reduce el impacto ambiental porque disminuye residuos y consumo de materias primas. Por ejemplo, reutilizar plástico ahorra energía y agua. En consecuencia, se favorece la sostenibilidad urbana”.</p>
            <p><strong>Argumentativo:</strong> “La educación financiera debería enseñarse en secundaria. En primer lugar, forma hábitos de ahorro; además, evita endeudamientos tempranos. Por lo tanto, su presencia en el currículo es indispensable”.</p>

            <h2>8. Errores Comunes</h2>
            <ul>
                <li><strong>Párrafos sin foco</strong> (varios temas): usa un tema por párrafo.</li>
                <li><strong>Abuso de comas</strong> o <strong>coma entre sujeto y verbo</strong>: revisa puntuación.</li>
                <li><strong>Conectores mecánicos</strong> sin lógica: elige el que exprese la relación real.</li>
                <li><strong>Repeticiones léxicas</strong>: sustituye por sinónimos o pronombres cuando proceda.</li>
                <li><strong>Conclusiones débiles</strong>: sintetiza y cierra el propósito del texto.</li>
            </ul>

            <h2>9. Checklist de Revisión</h2>
            <ul>
                <li>Propósito y audiencia definidos.</li>
                <li>Estructura global (introducción-desarrollo-conclusión) clara.</li>
                <li>Coherencia interna en cada párrafo (una idea principal).</li>
                <li>Cohesión: conectores y referencias bien usados.</li>
                <li>Ortografía y puntuación correctas; tono adecuado.</li>
            </ul>

            <h2>10. Ejercicios Propuestos</h2>
            <ol>
                <li>Planifica y redacta un texto expositivo (200–250 palabras) sobre “uso responsable de redes sociales” con introducción, dos párrafos de desarrollo y conclusión.</li>
                <li>Edita un párrafo propio sustituyendo repeticiones y mejorando conectores.</li>
                <li>Elabora un esquema de párrafos para un texto argumentativo y redacta la conclusión.</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>11. Autor del Tema</h2>
            <p><strong>Daniel Cassany (1961–)</strong></p>
            <p>Especialista en didáctica de la escritura. En obras como <em>La cocina de la escritura</em> propone métodos para planificar, redactar y revisar con enfoque práctico, destacando la importancia de la coherencia, la cohesión y la adecuación a la audiencia.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>12. Video recomendado</h2>
            <p>Guía clara para planificar y mejorar la redacción:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/Bgmv4GNHMqE" title="Cómo redactar bien: planificación, cohesión y revisión" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Cómo redactar bien: planificación, cohesión y revisión" </em></p>
           

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