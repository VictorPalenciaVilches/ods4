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
    1 => ['q' => '¿Qué es la acentuación en español?', 'options' => ['El uso de mayúsculas en nombres propios','La forma de pronunciar las consonantes finales','La colocación de la tilde para marcar la sílaba tónica y desambiguar','La separación de palabras en sílabas solamente'], 'answer' => 2],
    2 => ['q' => 'Una palabra aguda lleva tilde cuando:', 'options' => ['Termina en cualquier consonante','Termina en vocal, “n” o “s”','Termina en “r”, “l” o “z”','Tiene hiato'], 'answer' => 1],
    3 => ['q' => 'Selecciona la opción correcta: “cafe / café”.', 'options' => ['cafe','café','cafè','ca fé'], 'answer' => 1],
    4 => ['q' => 'Las palabras graves llevan tilde cuando:', 'options' => ['No terminan en vocal, “n” o “s”','Terminan en vocal, “n” o “s”','Siempre','Solo si tienen diptongo'], 'answer' => 0],
    5 => ['q' => '¿Cuál de las siguientes es esdrújula?', 'options' => ['camion','lápiz','teléfono','pared'], 'answer' => 2],
    6 => ['q' => 'Se escribe tilde diacrítica en:', 'options' => ['tu / tú, mi / mí, el / él','casa / casas','grande / grandes','verde / verdes'], 'answer' => 0],
    7 => ['q' => 'En un hiato, generalmente se tilda la vocal:', 'options' => ['Abierta en contacto con cerrada átona','Cerrada tónica en contacto con abierta','Cualquier vocal en diptongo','Abierta tónica únicamente si termina en “s”'], 'answer' => 1],
    8 => ['q' => 'Los pronombres interrogativos y exclamativos llevan tilde cuando:', 'options' => ['Función interrogativa o exclamativa directa o indirecta','Van al final de la oración','Están entre comas','Nunca'], 'answer' => 0],
    9 => ['q' => '¿Cuál está correctamente tildada por hiato?', 'options' => ['pais','país','maiz','oido'], 'answer' => 1],
    10 => ['q' => '¿Cuál NO lleva tilde diacrítica?', 'options' => ['tú (pronombre)','dé (verbo dar)','más (cantidad)','mi (determinante posesivo sin tilde: “mi casa”)'], 'answer' => 3],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 1 - Ortografía y Acentuación</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_lenguacastellana/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_lenguacastellana/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../lengua_castellana.php" class="volver-btn">← Volver a Lengua Castellana</a>
            <h1>Tema 1: Ortografía y Acentuación</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás a identificar la sílaba tónica, aplicar correctamente las reglas de acentuación y evitar los errores más comunes al escribir en español.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Significado y Definición</h2>
            <p>La <strong>acentuación</strong> es el conjunto de reglas que determinan cuándo y dónde se coloca la <strong>tilde</strong> (´) en una palabra para indicar la sílaba tónica o para <strong>diferenciar significados</strong> (tilde diacrítica). Una buena acentuación mejora la <strong>claridad</strong>, la <strong>comprensión</strong> y la <strong>precisión</strong> en la comunicación escrita y oral.</p>
            <h3>¿Por qué es importante?</h3>
            <ul>
                <li>Evita <strong>ambigüedades</strong> (por ejemplo: <em>“el” / “él”</em>).</li>
                <li>Refuerza la <strong>corrección ortográfica</strong> y el estilo.</li>
                <li>Facilita la <strong>lectura en voz alta</strong> y la pronunciación.</li>
                <li>Es criterio clave en evaluaciones académicas y textos formales.</li>
                <li>Permite distinguir <strong>funciones gramaticales</strong> (tilde diacrítica).</li>
            </ul>

            <h2>2. Conceptos Fundamentales</h2>

            <h3>2.1. Sílaba tónica y división silábica</h3>
            <p>La <strong>sílaba tónica</strong> es la que se pronuncia con mayor intensidad. Identificarla es el paso clave para aplicar las reglas de acentuación. La <strong>división silábica</strong> ayuda a ubicarla correctamente: <em>te-lé-fo-no</em> (esdrújula), <em>la-piz</em> (grave: <em>lá-piz</em>).</p>

            <h3>2.2. Clasificación de palabras según la sílaba tónica</h3>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Regla general</th>
                        <th>Ejemplos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Agudas</strong></td>
                        <td>Llevan tilde si terminan en <strong>vocal, “n” o “s”</strong>.</td>
                        <td>café, canción, compás</td>
                    </tr>
                    <tr>
                        <td><strong>Graves o llanas</strong></td>
                        <td>Llevan tilde si <strong>NO</strong> terminan en <strong>vocal, “n” o “s”</strong>.</td>
                        <td>fácil, árbol, lápiz</td>
                    </tr>
                    <tr>
                        <td><strong>Esdrújulas</strong></td>
                        <td>Siempre llevan tilde.</td>
                        <td>teléfono, música, pájaro</td>
                    </tr>
                    <tr>
                        <td><strong>Sobresdrújulas</strong></td>
                        <td>Siempre llevan tilde.</td>
                        <td>cómetelo, rápidamente</td>
                    </tr>
                </tbody>
            </table>

            <h3>2.3. Diptongo, triptongo e hiato</h3>
            <ul>
                <li><strong>Diptongo</strong>: dos vocales en la misma sílaba (cerrada átona + abierta, o dos cerradas). Ej.: <em>cielo</em>, <em>puerta</em>, <em>ciudad</em>.</li>
                <li><strong>Triptongo</strong>: tres vocales en la misma sílaba (cerrada átona + abierta + cerrada átona). Ej.: <em>limpiáis</em>, <em>miau</em>.</li>
                <li><strong>Hiato</strong>: vocales en sílabas distintas. Tilde en la <strong>cerrada tónica</strong> cuando va con abierta: <em>país</em>, <em>maíz</em>, <em>río</em>, <em>baúl</em>.</li>
            </ul>

            <h3>2.4. Tilde diacrítica (palabras de forma igual pero función/ significado distinto)</h3>
            <ul>
                <li><strong>tú / tu</strong> (pronombre / determinante): <em>Tú</em> eres mi amigo. / Ese es <em>tu</em> cuaderno.</li>
                <li><strong>él / el</strong> (pronombre / artículo): <em>Él</em> vino temprano. / <em>El</em> coche es rojo.</li>
                <li><strong>mí / mi</strong> (pronombre / determinante): Para <em>mí</em> es fácil. / Es <em>mi</em> tarea.</li>
                <li><strong>sí / si</strong> (afirmación / condicional): <em>Sí</em>, quiero. / <em>Si</em> llueve, no salgo.</li>
                <li><strong>más / mas</strong> (cantidad / pero): Quiero <em>más</em>. / Quise ir, <em>mas</em> no pude.</li>
                <li><strong>dé / de</strong> (verbo / preposición): Que me <em>dé</em> eso. / Es <em>de</em> Ana.</li>
                <li><strong>aún / aun</strong> (todavía / incluso): <em>Aún</em> no llega. / <em>Aun</em> cansado, vino.</li>
                <li><strong>té / te</strong> (sustantivo / pronombre): Tomé <em>té</em>. / <em>Te</em> llamo luego.</li>
                <li><strong>sólo / solo</strong> (RAE admite sin tilde salvo ambigüedad): Iré <em>solo</em> (sin compañía). / Quiero <em>solo</em> dormir (solamente). Se desaconseja tildar salvo desambiguación clara.</li>
            </ul>

            <h3>2.5. Interrogativos y exclamativos</h3>
            <p><strong>Qué, cuál, quién, cuánto, cómo, cuándo, dónde</strong> llevan tilde cuando cumplen función interrogativa o exclamativa, directa o indirecta: <em>¿Qué</em> hora es? / No sé <em>qué</em> hacer.</p>

            <h3>2.6. Palabras frecuentes con tilde (lista útil)</h3>
            <ul>
                <li><em>también, todavía, después, además, difícil, fácil, país, raíz, oí, leí, canción, corazón, lápiz, azúcar, inglés, océano, teléfono, rápido, público</em>.</li>
            </ul>

            <h3>2.7. Errores frecuentes y cómo evitarlos</h3>
            <ul>
                <li>Tildar <em>monosílabos</em> que no la requieren (ej.: <em>fe, dio, vio</em>).</li>
                <li>Olvidar la tilde en <em>esdrújulas y sobresdrújulas</em> (siempre se tildan).</li>
                <li>No identificar el <strong>hiato</strong> con cerrada tónica (<em>país, maíz, baúl</em>).</li>
                <li>Confundir <strong>tilde diacrítica</strong> con tilde por acento prosódico.</li>
                <li>Escribir <em>sólo</em> con tilde de forma sistemática (evitar salvo ambigüedad clara).</li>
            </ul>

            <h2>3. Reglas y Casos Especiales</h2>
            <ul>
                <li><strong>Palabras compuestas</strong>: si se unen con guion, cada parte conserva su tilde (<em>físico-químico</em>); si se fusionan, suele perderse en la primera (<em>decimoséptimo</em>).</li>
                <li><strong>Mayúsculas</strong>: llevan tilde cuando corresponde (<em>ÁLVARO, MÉXICO</em>).</li>
                <li><strong>Adverbios en -mente</strong>: conservan la tilde del adjetivo (<em>fácil → fácilmente</em>).</li>
                <li><strong>Monosílabos</strong>: no se tildan, salvo diacríticos (<em>tú/tu, él/el, dé/de</em>).</li>
                <li><strong>Plurales</strong>: la tilde se mantiene si recae en la misma sílaba (<em>compás → compases</em> no lleva; <em>fácil → fáciles</em> sí conserva la tonicidad grave).</li>
            </ul>

            <h2>4. Ejemplos Prácticos</h2>
            <ul>
                <li><strong>Agudas</strong>: <em>cajón, sofá, además</em>.</li>
                <li><strong>Graves</strong>: <em>árbol, azúcar, lápiz</em>.</li>
                <li><strong>Esdrújulas</strong>: <em>música, pájaro, brújula</em>.</li>
                <li><strong>Hiato</strong>: <em>pa-ís, ba-úl, rí-o</em>.</li>
            </ul>

            <h2>5. Mini Glosario</h2>
            <ul>
                <li><strong>Sílaba tónica</strong>: sílaba con mayor intensidad.</li>
                <li><strong>Diptongo</strong>: dos vocales en una sílaba.</li>
                <li><strong>Hiato</strong>: separación de vocales en sílabas distintas.</li>
                <li><strong>Tilde diacrítica</strong>: tilde para diferenciar funciones/ significados.</li>
            </ul>

            <h2>6. Ejercicios Propuestos</h2>
            <ol>
                <li>Clasifica y tilda correctamente: <em>lapiz, cancion, arbol, maiz, facil, camion, oceano</em>.</li>
                <li>Indica si hay diptongo o hiato: <em>río, aire, país, ciudad, raíz, cielo</em>.</li>
                <li>Aplica tilde diacrítica según corresponda: <em>el/él, tu/tú, mi/mí, si/sí, de/dé, mas/más</em>.</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>7. Autor del Tema</h2>
            <p><strong>Andrés Bello (1781–1865)</strong></p>
            <p>Humanista, filólogo y gramático venezolano-chileno, autor de la <em>Gramática de la lengua castellana destinada al uso de los americanos</em>. Su obra tuvo gran influencia en la estandarización y enseñanza del español en Hispanoamérica.</p>
            <p>Contribuyó al estudio normativo de la lengua, ofreciendo criterios sobre ortografía, acentuación y uso. Su enfoque práctico y pedagógico lo convierte en un referente obligado para comprender las bases de la gramática española.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>8. Video recomendado</h2>
            <p>Este video refuerza las reglas de acentuación con ejemplos claros:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/dfzlBAMVrBI" title="Reglas de Acentuación en Español - Repaso y ejemplos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Reglas de Acentuación en Español - Repaso y ejemplos" </em></p>
           

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

            <h2>10. Referencias y Recursos</h2>
            <ul>
                <li>RAE y ASALE (Ortografía de la lengua española, 2010; y consultas en <em>Diccionario Panhispánico de Dudas</em>).</li>
                <li>Instituto Cervantes – Recursos didácticos de ortografía y acentuación.</li>
                <li>Gramáticas descriptivas y normativas de uso académico.</li>
            </ul>

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