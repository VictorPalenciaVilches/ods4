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
    1 => ['q' => 'La unidad física y funcional de la herencia es el/la:', 'options' => ['Cromátida','Gen','Histona','Ribosoma'], 'answer' => 1],
    2 => ['q' => 'El genotipo hace referencia a:', 'options' => ['La apariencia observable','La constitución genética de un individuo','El ambiente donde vive','La cantidad de cromosomas'], 'answer' => 1],
    3 => ['q' => 'Un individuo Aa es:', 'options' => ['Homocigoto dominante','Homocigoto recesivo','Heterocigoto','Haploide'], 'answer' => 2],
    4 => ['q' => 'La 1.ª ley de Mendel (segregación) indica que:', 'options' => ['Los alelos de un gen se separan durante la formación de gametos','Los genes en cromosomas distintos se heredan unidos','El ambiente determina el fenotipo','Todos los alelos son dominantes'], 'answer' => 0],
    5 => ['q' => 'En un cruce monohíbrido Aa × Aa, la proporción fenotípica esperada (con dominancia completa) es:', 'options' => ['1:2:1','3:1','1:1','9:3:3:1'], 'answer' => 1],
    6 => ['q' => 'La dominancia incompleta se caracteriza por:', 'options' => ['Un fenotipo intermedio en los heterocigotos','Dos rasgos expresados simultáneamente','Un alelo que enmascara completamente al otro','Rasgos ligados al cromosoma X'], 'answer' => 0],
    7 => ['q' => 'La codominancia ocurre cuando:', 'options' => ['Un alelo domina al otro','Los alelos no se expresan','Ambos alelos se expresan por completo (ej. grupo sanguíneo AB)','Solo se expresa el alelo recesivo'], 'answer' => 2],
    8 => ['q' => 'Un rasgo ligado al sexo (X) es más frecuente en varones porque:', 'options' => ['Tienen dos cromosomas X','El cromosoma Y siempre compensa el X','Los varones (XY) expresan el alelo recesivo presente en su único X','Las mujeres inactivan ambos X'], 'answer' => 2],
    9 => ['q' => 'La 2.ª ley de Mendel (transmisión independiente) se cumple cuando:', 'options' => ['Los genes están muy ligados en el mismo cromosoma','Los genes están en cromosomas diferentes o muy alejados','El rasgo es letal','Hay dominancia incompleta'], 'answer' => 1],
    10 => ['q' => 'Una mutación es:', 'options' => ['Un cambio hereditario en la secuencia de ADN','Un cambio de ambiente','Una recombinación sin variación','La duplicación de orgánulos'], 'answer' => 0],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2 - Genética Básica</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_biologia/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_biologia/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 2: Genética Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema conocerás los conceptos fundamentales de la herencia biológica: genes, alelos, genotipo y fenotipo, leyes de Mendel, cuadros de Punnett, herencia ligada al sexo, variación genética y mutaciones.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Conceptos clave</h2>
            <ul>
                <li><strong>ADN</strong>: molécula portadora de la información genética, organizada en genes.</li>
                <li><strong>Gen</strong>: segmento de ADN que codifica un producto funcional (ARN/proteína).</li>
                <li><strong>Alelo</strong>: variante de un gen (por ejemplo, A y a).</li>
                <li><strong>Genotipo</strong>: combinación de alelos que posee un individuo (AA, Aa, aa).</li>
                <li><strong>Fenotipo</strong>: rasgos observables resultantes de la interacción genotipo–ambiente.</li>
                <li><strong>Homocigoto</strong>: dos alelos iguales (AA o aa). <strong>Heterocigoto</strong>: dos alelos distintos (Aa).</li>
            </ul>

            <h2>2. Dominancia, codominancia y dominancia incompleta</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Patrón</th>
                        <th>Descripción</th>
                        <th>Ejemplo</th>
                        <th>Fenotipo heterocigoto</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Dominancia completa</strong></td>
                        <td>El alelo dominante enmascara al recesivo</td>
                        <td>Flores moradas (P) dominan a blancas (p)</td>
                        <td>Igual al dominante (P_)</td>
                    </tr>
                    <tr>
                        <td><strong>Dominancia incompleta</strong></td>
                        <td>Heterocigoto con fenotipo intermedio</td>
                        <td>Rojo × blanco → <em>rosado</em></td>
                        <td>Intermedio</td>
                    </tr>
                    <tr>
                        <td><strong>Codominancia</strong></td>
                        <td>Ambos alelos se expresan completamente</td>
                        <td>Grupo sanguíneo AB (IA IB)</td>
                        <td>Ambos rasgos a la vez</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Leyes de Mendel</h2>
            <h3>3.1. 1.ª Ley (Segregación)</h3>
            <p>Los dos alelos de un gen se <strong>separan</strong> durante la formación de gametos, de modo que cada gameto recibe solo uno.</p>
            <h3>3.2. 2.ª Ley (Transmisión independiente)</h3>
            <p>Los pares de alelos de genes <strong>no ligados</strong> se distribuyen de forma independiente en la formación de gametos.</p>

            <h2>4. Cuadros de Punnett y probabilidades</h2>
            <p>Permiten <strong>predecir</strong> proporciones genotípicas y fenotípicas de la descendencia. En un cruce monohíbrido Aa × Aa (dominancia completa):</p>
            <ul>
                <li><strong>Genotipos</strong>: 1 AA : 2 Aa : 1 aa</li>
                <li><strong>Fenotipos</strong>: 3 dominante : 1 recesivo</li>
            </ul>
            <p>En dihíbridos (AaBb × AaBb, genes independientes): <strong>9:3:3:1</strong> fenotípico clásico.</p>

            <h2>5. Herencia ligada al sexo</h2>
            <p>Genes en el <strong>cromosoma X</strong> (ej. daltonismo) se expresan con mayor frecuencia en varones (XY) porque no poseen un segundo alelo en el X que pueda enmascarar el efecto recesivo.</p>

            <h2>6. Mutaciones y variabilidad</h2>
            <ul>
                <li><strong>Mutaciones puntuales</strong>: cambio en uno o pocos nucleótidos (sustituciones, inserciones, deleciones).</li>
                <li><strong>Consecuencias</strong>: neutras, perjudiciales o beneficiosas; fuente de <strong>variabilidad</strong> sobre la que actúa la selección natural.</li>
                <li><strong>Agentes mutagénicos</strong>: radiación UV, químicos, errores de replicación.</li>
            </ul>

            <h2>7. Ética y aplicaciones</h2>
            <ul>
                <li><strong>Medicina</strong>: diagnóstico genético, terapia génica, farmacogenómica.</li>
                <li><strong>Biotecnología</strong>: mejora de cultivos, producción de fármacos.</li>
                <li><strong>Ética</strong>: privacidad genética, equidad en acceso a tecnologías.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>8. Autor del Tema</h2>
            <p><strong>Gregor Mendel (1822–1884)</strong></p>
            <p>Monje agustino y botánico. A partir de sus experimentos con <em>Pisum sativum</em> (guisantes), estableció las <strong>leyes fundamentales de la herencia</strong>, sentando las bases de la genética clásica.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>9. Video recomendado</h2>
            <p>Introducción clara a Mendel, alelos y cuadros de Punnett:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/nmZP7BeN1vk" title="Introducción a la Genética Mendeliana (Punnett, alelos y proporciones)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Introducción a la Genética Mendeliana (Punnett, alelos y proporciones)" </em></p>
            

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
                <a href="../../biologia.php" class="volver-btn">Volver a Biología</a>
                
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