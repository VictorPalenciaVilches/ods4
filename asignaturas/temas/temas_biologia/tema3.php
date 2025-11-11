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
    1 => ['q' => 'Un ecosistema se define como:', 'options' => ['Un conjunto de seres vivos sin relación con el ambiente','La interacción de componentes bióticos y abióticos en un área determinada','Solo el clima de una región','Una especie dominante en un lugar'], 'answer' => 1],
    2 => ['q' => 'Los factores bióticos son:', 'options' => ['Luz, temperatura y agua','Suelo, relieve y pH','Seres vivos y sus interacciones','Viento y humedad'], 'answer' => 2],
    3 => ['q' => 'El flujo de energía en un ecosistema:', 'options' => ['Es cíclico e infinito','Entra principalmente por fotosíntesis y se disipa como calor','Sale por respiración y vuelve en la misma cantidad','Aumenta en cada nivel trófico'], 'answer' => 1],
    4 => ['q' => 'Una red trófica es:', 'options' => ['Una sola cadena lineal de alimentación','Un conjunto de cadenas tróficas interconectadas','Una pirámide de biomasa','Un ciclo biogeoquímico'], 'answer' => 1],
    5 => ['q' => 'En la mayoría de ecosistemas los productores son:', 'options' => ['Descomponedores','Plantas y algas fotosintéticas','Herbívoros','Carnívoros'], 'answer' => 1],
    6 => ['q' => '¿Cuál NO es un servicio ecosistémico de provisión?', 'options' => ['Alimentos','Madera','Polinización','Agua dulce'], 'answer' => 2],
    7 => ['q' => 'El ciclo del carbono implica principalmente:', 'options' => ['Solo respiración','Fotosíntesis y respiración, además de combustión y disolución oceánica','Únicamente sedimentación','Exclusivamente procesos geológicos'], 'answer' => 1],
    8 => ['q' => 'La biodiversidad elevada suele asociarse con:', 'options' => ['Mayor resiliencia del ecosistema','Menor estabilidad','Ausencia de interacciones','Reducción de servicios ecosistémicos'], 'answer' => 0],
    9 => ['q' => 'Un ejemplo de impacto humano que altera ecosistemas es:', 'options' => ['Sucesión ecológica natural','Introducción de especies invasoras','Polinización','Ciclo del agua'], 'answer' => 1],
    10 => ['q' => 'La sucesión ecológica primaria ocurre cuando:', 'options' => ['Existe suelo previamente desarrollado','Se inicia en superficies sin suelo (como lava o roca desnuda)','Solo cambian las especies dominantes','Ocurre tras incendios leves'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Ecosistemas</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_biologia/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_biologia/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 3: Ecosistemas</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema estudiarás qué es un ecosistema, sus componentes, cómo fluye la energía y circula la materia, qué tipos de biomas existen y cómo las actividades humanas pueden impactar su equilibrio.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es un Ecosistema?</h2>
            <p>Un <strong>ecosistema</strong> es la unidad funcional formada por los <strong>seres vivos</strong> (<em>componentes bióticos</em>) que interactúan con los <strong>factores físicos</strong> (<em>componentes abióticos</em>) de un área determinada. El ecosistema está definido por <strong>flujos de energía</strong> y <strong>ciclos de materia</strong> que mantienen su funcionamiento.</p>

            <h2>2. Componentes del Ecosistema</h2>
            <ul>
                <li><strong>Bióticos:</strong> productores (autótrofos), consumidores (herbívoros, carnívoros, omnívoros) y descomponedores (hongos, bacterias).</li>
                <li><strong>Abióticos:</strong> luz, temperatura, agua, suelo, nutrientes, relieve, pH, salinidad, viento.</li>
            </ul>

            <h2>3. Flujo de Energía y Niveles Tróficos</h2>
            <p>La energía <strong>entra</strong> al ecosistema principalmente por la <strong>fotosíntesis</strong> (productores) y fluye hacia los <strong>consumidores</strong> y <strong>descomponedores</strong>. En cada transferencia hay <strong>pérdida de energía</strong> como calor (2.ª ley de la termodinámica), por lo que las pirámides energéticas son <strong>siempre decrecientes</strong>.</p>
            <ul>
                <li><strong>Cadena trófica:</strong> secuencia lineal de alimentación (p. ej., pasto → conejo → zorro).</li>
                <li><strong>Red trófica:</strong> múltiples cadenas interconectadas que reflejan la complejidad real.</li>
                <li><strong>Pirámides:</strong> de energía (kJ), de biomasa (kg/m²) y de número (individuos).</li>
            </ul>

            <h2>4. Ciclos Biogeoquímicos (Materia)</h2>
            <ul>
                <li><strong>Agua:</strong> evaporación, condensación, precipitación, infiltración, escorrentía.</li>
                <li><strong>Carbono:</strong> fotosíntesis (fija CO₂), respiración (libera CO₂), combustión, disolución oceánica.</li>
                <li><strong>Nitrógeno:</strong> fijación (bacterias), nitrificación, asimilación, amonificación, desnitrificación.</li>
                <li><strong>Fósforo:</strong> ciclo geológico-biológico (meteorización de rocas, asimilación, sedimentación).</li>
            </ul>

            <h2>5. Servicios Ecosistémicos</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Categoría</th>
                        <th>Descripción</th>
                        <th>Ejemplos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Provisión</strong></td>
                        <td>Bienes materiales</td>
                        <td>Alimentos, agua dulce, madera, fibras</td>
                    </tr>
                    <tr>
                        <td><strong>Regulación</strong></td>
                        <td>Procesos que estabilizan</td>
                        <td>Polinización, control de plagas, regulación del clima</td>
                    </tr>
                    <tr>
                        <td><strong>Culturales</strong></td>
                        <td>Beneficios no materiales</td>
                        <td>Recreación, espiritualidad, educación</td>
                    </tr>
                    <tr>
                        <td><strong>Soporte</strong></td>
                        <td>Bases para los demás</td>
                        <td>Ciclo de nutrientes, formación de suelos</td>
                    </tr>
                </tbody>
            </table>

            <h2>6. Biomas y Ejemplos</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Bioma</th>
                        <th>Rasgos ambientales</th>
                        <th>Adaptaciones típicas</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Selva tropical</strong></td>
                        <td>Alta temperatura y precipitación</td>
                        <td>Hojas grandes, estratificación, alta biodiversidad</td>
                    </tr>
                    <tr>
                        <td><strong>Desierto</strong></td>
                        <td>Baja precipitación, grandes amplitudes térmicas</td>
                        <td>Suculencia, espinas, actividad nocturna</td>
                    </tr>
                    <tr>
                        <td><strong>Pradera/Sabana</strong></td>
                        <td>Estacionalidad marcada</td>
                        <td>Gramíneas resistentes, herbívoros migratorios</td>
                    </tr>
                    <tr>
                        <td><strong>Bosque templado</strong></td>
                        <td>Estaciones definidas</td>
                        <td>Caducifolias, latencia invernal</td>
                    </tr>
                    <tr>
                        <td><strong>Tundra</strong></td>
                        <td>Bajas temperaturas, permafrost</td>
                        <td>Plantas rastreras, ciclo corto de vida</td>
                    </tr>
                    <tr>
                        <td><strong>Marino</strong></td>
                        <td>Salinidad, zonas fóticas y afóticas</td>
                        <td>Bioluminiscencia, osmorregulación</td>
                    </tr>
                </tbody>
            </table>

            <h2>7. Sucesión Ecológica</h2>
            <ul>
                <li><strong>Primaria:</strong> colonización de sustratos sin suelo (lava, roca desnuda).</li>
                <li><strong>Secundaria:</strong> restablecimiento tras disturbios (incendios, cultivos abandonados).</li>
                <li>La sucesión tiende a aumentar la <strong>complejidad</strong> y la <strong>estabilidad</strong> del ecosistema.</li>
            </ul>

            <h2>8. Impacto Humano y Conservación</h2>
            <ul>
                <li><strong>Presiones:</strong> deforestación, contaminación, sobrepesca, especies invasoras, cambio climático.</li>
                <li><strong>Estrategias:</strong> áreas protegidas, restauración ecológica, uso sostenible, educación ambiental.</li>
                <li><strong>Indicadores:</strong> biodiversidad, calidad del agua/suelo, conectividad del hábitat.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autor del Tema</h2>
            <p><strong>Eugene P. Odum (1913–2002)</strong></p>
            <p>Ecólogo estadounidense considerado uno de los padres de la <strong>ecología de ecosistemas</strong>. Su enfoque integrador popularizó el estudio de los flujos de energía y los ciclos de nutrientes, y destacó la importancia de la <strong>homeostasis</strong> y la <strong>resiliencia</strong> ecológicas.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>10. Video recomendado</h2>
            <p>Panorama general sobre ecosistemas, niveles tróficos y servicios ecosistémicos:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/YsfZ8ut9-Eo" title="Ecosistemas: componentes, energía y ciclos (video educativo)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Ecosistemas: componentes, energía y ciclos" </em></p>
           

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">11. Cuestionario de 10 Preguntas</h2>
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