
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
    1 => ['q' => 'La ciudadanía es el conjunto de:', 'options' => ['Obligaciones morales sin derechos','Derechos y deberes que vinculan a una persona con un Estado','Trámites para obtener un pasaporte','Normas solo para mayores de edad'], 'answer' => 1],
    2 => ['q' => 'Los derechos fundamentales protegen:', 'options' => ['Preferencias de consumo','La dignidad humana y libertades básicas','Solo la propiedad privada','Exclusivamente a quienes votan'], 'answer' => 1],
    3 => ['q' => 'La Constitución es:', 'options' => ['Un folleto informativo','La norma suprema que organiza el Estado y reconoce derechos','Una costumbre popular','Un decreto de un ministerio'], 'answer' => 1],
    4 => ['q' => 'La participación ciudadana implica:', 'options' => ['Desinterés por lo público','Intervenir en asuntos colectivos por vías democráticas','Solo opinar en redes sociales','Pagar impuestos únicamente'], 'answer' => 1],
    5 => ['q' => 'Un ejemplo de deber ciudadano es:', 'options' => ['No respetar las normas de tránsito','Cuidar el patrimonio y el ambiente','Desinformar a la comunidad','Evitar el diálogo'], 'answer' => 1],
    6 => ['q' => 'El Estado de derecho significa que:', 'options' => ['El gobierno está por encima de la ley','Todos, incluido el Estado, están sometidos a la ley','Solo los jueces cumplen la ley','La ley depende de la popularidad'], 'answer' => 1],
    7 => ['q' => 'Un mecanismo de participación directa es:', 'options' => ['Plebiscito o referendo','Nombramiento a dedo','Censura previa a la prensa','Impuesto extraordinario'], 'answer' => 0],
    8 => ['q' => 'La igualdad ante la ley implica que:', 'options' => ['Personas y autoridades tienen privilegios distintos','Todas las personas deben ser tratadas sin discriminación','Solo las mayorías importan','La ley se aplica según la fama'], 'answer' => 1],
    9 => ['q' => 'La acción de tutela (o amparo) sirve para:', 'options' => ['Denunciar delitos de tránsito','Proteger derechos fundamentales de manera rápida','Anular una elección automáticamente','Pedir aumentos salariales'], 'answer' => 1],
    10 => ['q' => 'La educación cívica busca:', 'options' => ['Memorizar fechas sin contexto','Formar ciudadanía informada, crítica y responsable','Eliminar el debate público','Sustituir las instituciones'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Ciudadanía y Derechos</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ciencias_sociales/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ciencias_sociales/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 3: Ciudadanía y Derechos</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema comprenderás qué significa ser ciudadano, cuáles son tus derechos y deberes, cómo funciona el Estado de derecho y de qué formas puedes participar para fortalecer la democracia.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Ciudadanía?</h2>
            <p>La <strong>ciudadanía</strong> es el vínculo jurídico y político entre la persona y el Estado que reconoce <strong>derechos</strong> y exige <strong>deberes</strong>. Ser ciudadano implica <strong>pertenencia</strong> a una comunidad política y capacidad de <strong>participar</strong> en sus decisiones.</p>

            <h2>2. Derechos, Deberes y Garantías</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Descripción</th>
                        <th>Ejemplos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Derechos civiles</strong></td>
                        <td>Protegen libertades individuales</td>
                        <td>Vida, integridad, igualdad, debido proceso</td>
                    </tr>
                    <tr>
                        <td><strong>Derechos políticos</strong></td>
                        <td>Permiten participar en el poder público</td>
                        <td>Voto, ser elegido, asociación, control social</td>
                    </tr>
                    <tr>
                        <td><strong>Derechos sociales</strong></td>
                        <td>Garantizan bienestar básico</td>
                        <td>Educación, salud, trabajo digno, seguridad social</td>
                    </tr>
                    <tr>
                        <td><strong>Deberes</strong></td>
                        <td>Obligaciones con la comunidad</td>
                        <td>Respetar la ley, tributar, cuidar ambiente y patrimonio</td>
                    </tr>
                    <tr>
                        <td><strong>Garantías</strong></td>
                        <td>Mecanismos de protección</td>
                        <td>Tutela/amparo, habeas corpus, acciones populares</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Estado de Derecho y Constitución</h2>
            <ul>
                <li><strong>Constitución</strong>: norma suprema que organiza poderes y reconoce derechos.</li>
                <li><strong>Legalidad</strong>: todas las autoridades y ciudadanos están sometidos a la ley.</li>
                <li><strong>Separación de poderes</strong>: ejecutivo, legislativo y judicial con controles recíprocos.</li>
                <li><strong>Control ciudadano</strong>: veedurías, acceso a la información, medios libres.</li>
            </ul>

            <h2>4. Participación Ciudadana</h2>
            <ul>
                <li><strong>Representativa</strong>: votar, ser elegido, integrar consejos escolares o comunales.</li>
                <li><strong>Directa</strong>: referendo, plebiscito, cabildos, consultas populares.</li>
                <li><strong>Social</strong>: deliberación pública, presupuestos participativos, voluntariado.</li>
            </ul>

            <h2>5. Cultura Democrática</h2>
            <ul>
                <li><strong>Tolerancia y pluralismo</strong>: respeto a la diversidad de ideas y culturas.</li>
                <li><strong>Legalidad y diálogo</strong>: resolver conflictos por vías institucionales.</li>
                <li><strong>Información verificada</strong>: combatir la desinformación y los discursos de odio.</li>
                <li><strong>Ética pública</strong>: transparencia, anticorrupción y rendición de cuentas.</li>
            </ul>

            <h2>6. Ciudadanía Digital Responsable</h2>
            <ul>
                <li>Uso <strong>seguro</strong> y <strong>crítico</strong> de plataformas: privacidad, huella digital, fuentes confiables.</li>
                <li>Participación en <strong>peticiones</strong>, <strong>foros</strong> y <strong>consultas</strong> en línea de manera respetuosa.</li>
                <li>Defensa de derechos también en el entorno digital (libertad de expresión, protección de datos).</li>
            </ul>

            <h2>7. Ejemplos Prácticos</h2>
            <ul>
                <li>Organizar un <strong>proyecto comunitario</strong> para recuperar un parque.</li>
                <li>Realizar <strong>veeduría estudiantil</strong> a recursos del colegio.</li>
                <li>Participar en una <strong>consulta</strong> local informándose con fuentes confiables.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>8. Autor del Tema</h2>
            <p><strong>Hannah Arendt (1906–1975)</strong></p>
            <p>Filósofa y teórica política. Reflexionó sobre la <strong>vida pública</strong>, la <strong>acción ciudadana</strong> y los peligros del autoritarismo. Su obra destaca la importancia de la <strong>participación</strong> y la <strong>responsabilidad</strong> en la construcción de lo común.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>9. Video recomendado</h2>
            <p>Ciudadanía, derechos y participación en democracia:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/jy7_whMmRKQ" title="Ciudadanía y Derechos: participación y Estado de derecho" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Ciudadanía y Derechos: participación y Estado de derecho" </em></p>
           
            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">10. Cuestionario de 10 Preguntas</h2>
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
                <a href="../../ciencias_sociales.php" class="volver-btn">Volver a Ciencias Sociales</a>
                
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
```