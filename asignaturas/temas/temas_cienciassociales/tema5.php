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
    1 => ['q' => 'La globalización puede definirse como:', 'options' => ['El aislamiento de los países','La creciente interconexión económica, cultural, tecnológica y política a escala mundial','La sustitución de los Estados por empresas','La desaparición de identidades culturales'], 'answer' => 1],
    2 => ['q' => 'Un impulsor clave de la globalización reciente es:', 'options' => ['La reducción de comunicaciones y transporte','Las TIC e internet, que abaratan y aceleran flujos de información','La prohibición del comercio internacional','La autarquía económica',], 'answer' => 1],
    3 => ['q' => 'La OMC, el FMI y el Banco Mundial son:', 'options' => ['Empresas privadas','Organismos internacionales que regulan o apoyan reglas y financiamiento globales','Ministerios de un país','Partidos políticos globales'], 'answer' => 1],
    4 => ['q' => 'Un efecto positivo habitual atribuido a la globalización es:', 'options' => ['Menor acceso a tecnología','Mayor intercambio de conocimientos y oportunidades de mercado','Desaparición de la cooperación científica','Reducción de la diversidad cultural por definición'], 'answer' => 1],
    5 => ['q' => 'Un desafío social de la globalización es:', 'options' => ['Equidad en la distribución de beneficios y “brechas” entre países y grupos','Automático bienestar para todos','Eliminación total de riesgos ambientales','Desaparición de migraciones'], 'answer' => 0],
    6 => ['q' => 'La “aldea global” se asocia con:', 'options' => ['Comunicación veloz que conecta a personas y culturas del mundo','Cierre de redes sociales','Fin del comercio electrónico','Desconexión digital'], 'answer' => 0],
    7 => ['q' => 'La “cadena global de valor” describe:', 'options' => ['Producción concentrada en un solo país','Etapas de diseño, producción y distribución repartidas entre países','El fin del comercio de servicios','Solo exportación de materias primas'], 'answer' => 1],
    8 => ['q' => 'La homogeneización cultural es:', 'options' => ['El intercambio respetuoso de culturas sin cambios','La adopción masiva de patrones culturales globales que pueden desplazar prácticas locales','Imposible por internet','Siempre negativa en todos los casos'], 'answer' => 1],
    9 => ['q' => 'La ciudadanía global promueve:', 'options' => ['Desentenderse de los problemas planetarios','Responsabilidad compartida ante temas como clima, derechos humanos y desarrollo sostenible','Solo participación local','Evitar cooperación internacional'], 'answer' => 1],
    10 => ['q' => 'Una respuesta sostenible a la globalización incluye:', 'options' => ['Ignorar el cambio climático','Economía circular, comercio justo y Objetivos de Desarrollo Sostenible','Explotación ilimitada de recursos','Cierre total al intercambio científico'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 5 - Globalización y Sociedad</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ciencias_sociales/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ciencias_sociales/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 5: Globalización y Sociedad</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Analizaremos la globalización como proceso multidimensional que conecta economías, culturas, tecnologías y políticas, sus beneficios y desafíos, y propuestas para una globalización más justa y sostenible.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Globalización?</h2>
            <p>Proceso de <strong>interdependencia creciente</strong> entre países y regiones, impulsado por avances en <strong>tecnologías de información y comunicación (TIC)</strong>, <strong>transporte</strong>, <strong>liberalización comercial</strong> y <strong>redes financieras</strong>. Afecta producción, consumo, cultura, migraciones y gobernanza.</p>

            <h2>2. Dimensiones Principales</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Dimensión</th>
                        <th>Descripción</th>
                        <th>Ejemplos</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Económica</strong></td>
                        <td>Integración de mercados, cadenas globales de valor</td>
                        <td>Ensamble de un producto en varios países; comercio electrónico</td>
                    </tr>
                    <tr>
                        <td><strong>Cultural</strong></td>
                        <td>Intercambio y difusión de bienes simbólicos</td>
                        <td>Música, cine, gastronomía global; también tensiones por identidad</td>
                    </tr>
                    <tr>
                        <td><strong>Tecnológica</strong></td>
                        <td>Infraestructuras digitales interconectadas</td>
                        <td>Internet, 5G, plataformas, IA, teletrabajo</td>
                    </tr>
                    <tr>
                        <td><strong>Política</strong></td>
                        <td>Cooperación y regulación supranacional</td>
                        <td>OMC, OMS, acuerdos climáticos (Acuerdo de París)</td>
                    </tr>
                    <tr>
                        <td><strong>Ambiental</strong></td>
                        <td>Problemas y soluciones planetarias</td>
                        <td>Cambio climático, pérdida de biodiversidad, ODS</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Beneficios y Desafíos</h2>
            <ul>
                <li><strong>Oportunidades</strong>: acceso a tecnologías y conocimientos, mercados más amplios, cooperación científica, circulación cultural.</li>
                <li><strong>Riesgos</strong>: desigualdades, precarización laboral, concentración de poder económico, homogeneización cultural, impactos ambientales.</li>
            </ul>

            <h2>4. Cadenas Globales de Valor</h2>
            <p>Las fases de diseño, producción y distribución se reparten entre países según <strong>ventajas comparativas</strong>. Esto crea eficiencia, pero también <strong>dependencias</strong> y <strong>vulnerabilidades</strong> (ej.: interrupciones logísticas).</p>

            <h2>5. Globalización Cultural</h2>
            <ul>
                <li><strong>Hibridación</strong>: mezcla creativa de tradiciones locales y globales.</li>
                <li><strong>Homogeneización</strong>: predominio de productos e idiomas globales.</li>
                <li><strong>Resistencia local</strong>: revalorización de identidades y patrimonios.</li>
            </ul>

            <h2>6. Gobernanza Global e Instituciones</h2>
            <ul>
                <li>Organismos: <strong>OMC</strong>, <strong>FMI</strong>, <strong>Banco Mundial</strong>, <strong>ONU</strong>, <strong>OMS</strong>.</li>
                <li>Reglas: tratados comerciales, normas sanitarias, acuerdos ambientales.</li>
                <li>Reto: <strong>equilibrar</strong> eficiencia económica con <strong>derechos laborales</strong>, <strong>ambientales</strong> y <strong>equidad</strong>.</li>
            </ul>

            <h2>7. Globalización Digital</h2>
            <ul>
                <li>Plataformas globales, economía gig, <strong>datos</strong> como recurso estratégico.</li>
                <li>Brecha digital y <strong>alfabetización mediática</strong> como condiciones de participación.</li>
                <li>Regulación: privacidad, ciberseguridad, competencia.</li>
            </ul>

            <h2>8. Desarrollo Sostenible en un Mundo Global</h2>
            <ul>
                <li><strong>ODS</strong>: erradicación de la pobreza, educación de calidad, acción por el clima.</li>
                <li><strong>Comercio justo</strong>, <strong>economía circular</strong>, <strong>finanzas sostenibles</strong>.</li>
                <li><strong>Ciudadanía global</strong>: corresponsabilidad en consumo, información y participación.</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autor del Tema</h2>
            <p><strong>Manuel Castells (1942–)</strong></p>
            <p>Sociólogo que analizó la <strong>sociedad red</strong> y el impacto de las TIC en economía, política y cultura. Sus obras explican cómo las redes informacionales reconfiguran el poder y la experiencia en la era global.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>10. Video recomendado</h2>
            <p>Panorama general de la globalización y sus dimensiones:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/fpkn6Eagl58" title="Globalización: conceptos, beneficios y desafíos (video educativo)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Globalización: conceptos, beneficios y desafíos" </em></p>
           

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