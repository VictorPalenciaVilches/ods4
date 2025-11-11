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
    1 => ['q' => 'La salud ambiental estudia principalmente:', 'options' => ['La anatomía humana','La relación entre factores ambientales y el bienestar humano','Solo enfermedades infecciosas','Únicamente la nutrición'], 'answer' => 1],
    2 => ['q' => '¿Cuál NO es un factor ambiental físico clásico?', 'options' => ['Ruido','Radiación ionizante','Temperatura','Proteínas dietarias'], 'answer' => 3],
    3 => ['q' => 'El material particulado fino PM2.5 se asocia con:', 'options' => ['Enfermedades respiratorias y cardiovasculares','Deshidratación aguda','Hipovitaminosis C','Fracturas óseas'], 'answer' => 0],
    4 => ['q' => 'Un ejemplo de riesgo químico en el ambiente es:', 'options' => ['Exposición a plomo y pesticidas','Iluminación natural','Áreas verdes urbanas','Actividad física moderada'], 'answer' => 0],
    5 => ['q' => 'El acceso a agua potable segura reduce principalmente:', 'options' => ['Enfermedades diarreicas y parasitarias','Miopía','Esguinces','Intolerancia a la lactosa'], 'answer' => 0],
    6 => ['q' => 'Un determinante social de la salud es:', 'options' => ['Mutación puntual en un gen','Ingreso económico y educación','Grupo sanguíneo','Color de ojos'], 'answer' => 1],
    7 => ['q' => 'La “huella de carbono” se relaciona con:', 'options' => ['Consumo de vitamina C','Emisiones de gases de efecto invernadero','Cantidad de calcio en la dieta','Índice de masa corporal'], 'answer' => 1],
    8 => ['q' => 'Una estrategia de prevención primaria es:', 'options' => ['Rehabilitación postinfarto','Tamizaje de hipertensión','Vacunación contra influenza','Cirugía de revascularización'], 'answer' => 2],
    9 => ['q' => 'La isquemia urbana de áreas verdes suele:', 'options' => ['Aumentar bienestar psicológico','Reducir estrés térmico','Aumentar estrés y disminuir actividad física','Mejorar polinización'], 'answer' => 2],
    10 => ['q' => 'La gestión integral de residuos prioriza:', 'options' => ['Disposición final como única medida','Llenar vertederos controlados','Jerarquía: reducir, reutilizar, reciclar, valorizar, disponer','Incineración sin control'], 'answer' => 2],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Salud y Medio Ambiente</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_biologia/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_biologia/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 4: Salud y Medio Ambiente</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema analizamos cómo los <strong>factores ambientales</strong> (físicos, químicos, biológicos y sociales) influyen en la <strong>salud humana</strong> y qué acciones de <strong>prevención</strong> y <strong>promoción</strong> reducen riesgos.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Concepto de Salud Ambiental</h2>
            <p>La <strong>salud ambiental</strong> estudia la interacción entre las personas y su entorno (aire, agua, suelo, vivienda, trabajo, movilidad y factores sociales) para <strong>prevenir enfermedades</strong> y <strong>crear ambientes saludables</strong>. La OMS resalta que condiciones ambientales inadecuadas contribuyen significativamente a la carga global de enfermedad.</p>

            <h2>2. Tipos de Factores Ambientales</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Tipo</th>
                        <th>Ejemplos</th>
                        <th>Efectos en salud</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Físicos</strong></td>
                        <td>Ruido, temperaturas extremas, radiación UV/ionizante</td>
                        <td>Estrés, trastornos del sueño, cáncer de piel, golpes de calor</td>
                    </tr>
                    <tr>
                        <td><strong>Químicos</strong></td>
                        <td>PM2.5, ozono troposférico, plomo, pesticidas</td>
                        <td>Asma, EPOC, alteraciones neurológicas, cáncer</td>
                    </tr>
                    <tr>
                        <td><strong>Biológicos</strong></td>
                        <td>Agentes patógenos, vectores (mosquitos), alérgenos</td>
                        <td>Enfermedades infecciosas, alergias</td>
                    </tr>
                    <tr>
                        <td><strong>Sociales</strong></td>
                        <td>Hacinamiento, pobreza, acceso a servicios, áreas verdes</td>
                        <td>Estrés, sedentarismo, inequidades en salud</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Calidad del Aire y Salud</h2>
            <ul>
                <li><strong>PM2.5/PM10</strong>: partículas que penetran en vías respiratorias; asociadas con <em>asma</em>, <em>EPOC</em> y <em>eventos cardiovasculares</em>.</li>
                <li><strong>O₃ troposférico</strong>: irritación ocular y respiratoria.</li>
                <li><strong>NO₂/CO</strong>: efectos en función pulmonar y oxigenación.</li>
                <li><strong>Medidas</strong>: transporte sostenible, zonas de bajas emisiones, mascarillas en picos, ventilación adecuada.</li>
            </ul>

            <h2>4. Agua, Saneamiento e Higiene (WASH)</h2>
            <ul>
                <li>El acceso a <strong>agua potable</strong> y saneamiento <strong>reduce diarreas</strong>, helmintiasis y parasitosis.</li>
                <li><strong>Higiene de manos</strong> con agua y jabón disminuye infecciones respiratorias y gastrointestinales.</li>
                <li>Cloración/filtrado del agua y manejo seguro de excretas son <strong>prevención primaria</strong>.</li>
            </ul>

            <h2>5. Alimentación y Medio Ambiente</h2>
            <ul>
                <li>Dieta basada en <strong>alimentos frescos</strong>, reducción de ultraprocesados y desperdicio.</li>
                <li>Preferir productos de <strong>origen local</strong> y <strong>estacional</strong> reduce huella ambiental.</li>
                <li>Seguridad alimentaria: cadena de frío, manipulación segura, agua limpia.</li>
            </ul>

            <h2>6. Determinantes Sociales y Urbanismo Saludable</h2>
            <ul>
                <li>Educación, ingreso, empleo y vivienda condicionan <strong>oportunidades de salud</strong>.</li>
                <li><strong>Áreas verdes</strong> y <strong>movilidad activa</strong> favorecen actividad física y salud mental.</li>
                <li>Diseño urbano: veredas seguras, iluminación, acceso a transporte y servicios.</li>
            </ul>

            <h2>7. Cambio Climático y Salud</h2>
            <ul>
                <li>Incremento de <strong>olas de calor</strong>, eventos extremos y <strong>desplazamiento de vectores</strong>.</li>
                <li>Medidas de adaptación: alerta temprana, corredores verdes, planes de calor.</li>
                <li>Mitigación: energía limpia, eficiencia, reducción de emisiones y <strong>huella de carbono</strong>.</li>
            </ul>

            <h2>8. Gestión Integral de Residuos</h2>
            <ul>
                <li><strong>Jerarquía</strong>: reducir → reutilizar → reciclar → valorizar → disponer.</li>
                <li>Separación en la fuente, compostaje y puntos limpios.</li>
                <li>Residuos peligrosos (pilas, medicamentos) requieren manejo especializado.</li>
            </ul>

            <h2>9. Prevención y Promoción</h2>
            <ul>
                <li><strong>Primaria</strong>: vacunación, agua segura, control de vectores, educación ambiental.</li>
                <li><strong>Secundaria</strong>: tamizajes (HTA, glucemia), monitoreo de calidad del aire y agua.</li>
                <li><strong>Terciaria</strong>: rehabilitación y reducción de discapacidades.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>10. Autor del Tema</h2>
            <p><strong>John Snow (1813–1858)</strong></p>
            <p>Médico pionero en epidemiología, famoso por relacionar un brote de cólera con una bomba de agua contaminada en Londres. Su enfoque integró <strong>ambiente</strong> y <strong>salud pública</strong>, sentando bases para la prevención mediante intervenciones ambientales.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>11. Video recomendado</h2>
            <p>Relación entre ambiente, determinantes sociales y salud:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/kCbVLmP170s" title="Salud ambiental: factores de riesgo y prevención (video educativo)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Salud ambiental: factores de riesgo y prevención" </em></p>
            

            <hr>

            <!-- 4. CUESTIONARIO -->
            <h2 id="cuestionario-titulo">12. Cuestionario de 10 Preguntas</h2>
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