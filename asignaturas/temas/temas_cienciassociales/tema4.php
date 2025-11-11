
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
    1 => ['q' => 'La economía estudia principalmente:', 'options' => ['Cómo las sociedades administran recursos escasos','Cómo imprimir más dinero','Solo el comercio internacional','Únicamente el ahorro de los bancos'], 'answer' => 0],
    2 => ['q' => 'La escasez implica que:', 'options' => ['Podemos tener todo lo que queremos','Los recursos son limitados frente a necesidades ilimitadas','Los precios siempre bajan','No hay que elegir entre alternativas'], 'answer' => 1],
    3 => ['q' => 'La ley de la demanda establece que, ceteris paribus:', 'options' => ['Si sube el precio, sube la cantidad demandada','Si sube el precio, baja la cantidad demandada','Precio y cantidad no se relacionan','La demanda es fija'], 'answer' => 1],
    4 => ['q' => 'El PIB mide:', 'options' => ['La felicidad de la población','El valor monetario de bienes y servicios finales producidos en un país','La cantidad de dinero en circulación','Los ingresos del gobierno'], 'answer' => 1],
    5 => ['q' => 'La inflación es:', 'options' => ['Aumento general y sostenido de precios','Caída de la producción','Subsidio estatal','Reducción de impuestos'], 'answer' => 0],
    6 => ['q' => 'Un presupuesto personal equilibrado busca:', 'options' => ['Gastos > Ingresos','Ingresos ≥ Gastos y ahorro planificado','No llevar registro de gastos','Endeudarse al máximo'], 'answer' => 1],
    7 => ['q' => 'Tasa de desempleo mide:', 'options' => ['Población total','Personas que no trabajan por elección','Proporción de fuerza laboral sin empleo y que busca trabajo','Número de jubilados'], 'answer' => 2],
    8 => ['q' => 'La oferta representa:', 'options' => ['La cantidad que los consumidores desean comprar','La cantidad que los productores desean vender a cada precio','El gasto del gobierno','El ahorro de los hogares'], 'answer' => 1],
    9 => ['q' => 'Una tasa de interés más alta tiende a:', 'options' => ['Estimular el consumo y desincentivar el ahorro','Desincentivar el consumo y estimular el ahorro','No afecta decisiones','Reducir el costo del crédito'], 'answer' => 1],
    10 => ['q' => 'Un ejemplo de bien público es:', 'options' => ['Un helado','Un concierto privado','Iluminación de calles','Un auto'], 'answer' => 2],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Economía Básica</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_ciencias_sociales/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_ciencias_sociales/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../ciencias_sociales.php" class="volver-btn">← Volver a Ciencias Sociales</a>
            <h1>Tema 4: Economía Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema aprenderás conceptos fundamentales de economía: escasez, costo de oportunidad, oferta y demanda, inflación, PIB, desempleo y nociones de finanzas personales y sector público.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Economía?</h2>
            <p>La <strong>economía</strong> estudia cómo las sociedades <strong>administran recursos escasos</strong> para producir bienes y servicios y distribuirlos entre las personas. Implica <strong>elecciones</strong> porque los recursos (tiempo, dinero, trabajo, capital) son limitados frente a necesidades y deseos prácticamente ilimitados.</p>

            <h2>2. Conceptos clave</h2>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Concepto</th>
                        <th>Definición</th>
                        <th>Ejemplo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Escasez</strong></td>
                        <td>Insuficiencia de recursos para satisfacer todos los deseos</td>
                        <td>Tiempo limitado para estudiar y trabajar</td>
                    </tr>
                    <tr>
                        <td><strong>Costo de oportunidad</strong></td>
                        <td>Mejor alternativa a la que se renuncia al elegir</td>
                        <td>Estudiar en vez de trabajar una tarde</td>
                    </tr>
                    <tr>
                        <td><strong>Incentivos</strong></td>
                        <td>Factores que influyen en las decisiones</td>
                        <td>Descuentos, tasas de interés, becas</td>
                    </tr>
                    <tr>
                        <td><strong>Mercado</strong></td>
                        <td>Espacio (físico o virtual) donde interactúan compradores y vendedores</td>
                        <td>Plaza, e-commerce</td>
                    </tr>
                </tbody>
            </table>

            <h2>3. Oferta y Demanda</h2>
            <ul>
                <li><strong>Demanda</strong>: relación entre <em>precio</em> y <em>cantidad demandada</em>. En general, <em>si el precio sube, la cantidad demandada baja</em>.</li>
                <li><strong>Oferta</strong>: relación entre <em>precio</em> y <em>cantidad ofrecida</em>. En general, <em>si el precio sube, la cantidad ofrecida aumenta</em>.</li>
                <li><strong>Equilibrio</strong>: precio y cantidad donde se igualan oferta y demanda (no hay excedentes ni faltantes).</li>
            </ul>
            <p><em>Desplazamientos</em>: ingresos, gustos, precios de relacionados, tecnología, impuestos/subsidios y expectativas cambian las curvas.</p>

            <h2>4. Indicadores macroeconómicos</h2>
            <ul>
                <li><strong>PIB</strong>: valor de la producción final dentro del país. Se usa como medida de actividad, no de bienestar integral.</li>
                <li><strong>Inflación</strong>: aumento general y sostenido de precios (índices como IPC).</li>
                <li><strong>Desempleo</strong>: proporción de la fuerza laboral sin empleo y que busca trabajo.</li>
                <li><strong>Balanza de pagos</strong>: registro de transacciones con el exterior.</li>
            </ul>

            <h2>5. Sector público básico</h2>
            <ul>
                <li><strong>Impuestos</strong>: financian bienes y servicios públicos (educación, salud, seguridad).</li>
                <li><strong>Gasto público</strong>: asignación de recursos del Estado (infraestructura, programas sociales).</li>
                <li><strong>Bienes públicos</strong>: no excluibles y no rivales (ej.: iluminación de calles, defensa).</li>
                <li><strong>Externalidades</strong>: efectos sobre terceros (contaminación, vacunación); justifican intervención.</li>
            </ul>

            <h2>6. Finanzas personales (introducción)</h2>
            <ul>
                <li><strong>Presupuesto</strong>: registra ingresos, gastos y <strong>ahorro</strong>.</li>
                <li><strong>Crédito</strong> y <strong>tasa de interés</strong>: costo del dinero en el tiempo; evita sobreendeudarse.</li>
                <li><strong>Ahorro e inversión</strong>: objetivos, horizonte, riesgo vs. retorno, diversificación.</li>
            </ul>

            <h2>7. Ejemplo práctico de costo de oportunidad</h2>
            <p>Decidir tomar un curso vespertino implica renunciar a horas de ocio o a un trabajo parcial; el <strong>costo de oportunidad</strong> es la alternativa de mayor valor a la que se renuncia.</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>8. Autor del Tema</h2>
            <p><strong>Adam Smith (1723–1790)</strong></p>
            <p>Economista y filósofo escocés, considerado padre de la economía moderna. En <em>La riqueza de las naciones</em> analizó la división del trabajo, los mercados y el papel del Estado, estableciendo bases para comprender la asignación eficiente de recursos.</p>

            <hr>

            <!-- 3. VIDEO -->
            <h2>9. Video recomendado</h2>
            <p>Repaso introductorio de oferta y demanda, inflación y PIB:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/ChBDafdmUtY" title="Economía para principiantes: oferta, demanda, inflación y PIB" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Economía para principiantes: oferta, demanda, inflación y PIB" </em></p>
           
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