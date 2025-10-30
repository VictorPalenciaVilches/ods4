<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema1.php
session_start();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema1'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    1 => ['q' => 'Según la información, ¿qué es la parte numérica de un término algebraico, incluyendo su signo?', 'options' => ['Exponente','Variable','Parte Literal','Coeficiente'], 'answer' => 3],
    2 => ['q' => 'En el término y<sup>2</sup>z, ¿cuál es el coeficiente que se asume aunque no esté escrito?', 'options' => ['0','z','2','1'], 'answer' => 3],
    3 => ['q' => '¿Cuál es la regla de oro para poder sumar o restar dos o más términos?', 'options' => ['Que tengan el mismo signo.','Que tengan la misma parte literal (semejantes).','Que el coeficiente sea el mismo.','Que sean expresiones binómicas.'], 'answer' => 1],
    4 => ['q' => 'El grado del término 6a<sup>2</sup>b<sup>3</sup> es la suma de sus exponentes. ¿Cuál es ese grado?', 'options' => ['2','3','5','6'], 'answer' => 2],
    5 => ['q' => '¿Qué elemento fundamental del término indica si es positivo o negativo?', 'options' => ['El Coeficiente','La Parte Literal','El Signo','El Exponente'], 'answer' => 2],
    6 => ['q' => '¿Cuál de los siguientes pares **NO** son considerados términos semejantes?', 'options' => ['3x<sup>2</sup>y y -5x<sup>2</sup>y','a<sup>3</sup> y 12a<sup>3</sup>','4x y 4x<sup>2</sup>','7ab y 8ab'], 'answer' => 2],
    7 => ['q' => '¿Cuál es la diferencia principal entre una Expresión Algebraica y una Ecuación?', 'options' => ['El número de términos.','El signo de igualdad (=).','El uso de la multiplicación.','La presencia de variables.'], 'answer' => 1],
    8 => ['q' => 'Según el ejemplo de Solución de Ecuaciones, si 4x = 20, ¿cuál es el valor de x?', 'options' => ['4','5','16','80'], 'answer' => 1],
    9 => ['q' => 'Si un término tiene su exponente sin escribir, ¿qué número se asume que es?', 'options' => ['2','0','1','-1'], 'answer' => 2],
    10 => ['q' => 'La acción de sumar o restar términos semejantes se conoce como:', 'options' => ['Simplificación de Expresiones','Factorización','Reducción de Términos Semejantes','Igualación de Coeficientes'], 'answer' => 2],
];

// Sanitizar el nombre del usuario para evitar ataques XSS
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 1 - Introducción al Álgebra</title>
    <?php $cssPath = __DIR__ . '/../../../css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 1: El Lenguaje del Álgebra </h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! El Álgebra es como un idioma que nos permite resolver problemas usando letras como si fueran números. ¡Empecemos!</p>

            <hr>

            <h2>1. Fundamentos: De la Aritmética al Álgebra</h2>
            <p>El Álgebra es la rama de las matemáticas que generaliza las operaciones de la Aritmética. Nos permite crear fórmulas y reglas que funcionan sin importar el valor de los números, usando símbolos (letras) para representar cantidades desconocidas o variables.</p>
            <p><strong>Objetivo del tema:</strong> Comprender la estructura de los términos, simplificar expresiones y resolver ecuaciones de primer grado.</p>

            <hr>

            <h2>2. Estructura de un Término Algebraico</h2>
            <p>Un término algebraico es la unidad más básica de una expresión algebraica. Consiste en la combinación de números y letras que se relacionan mediante la multiplicación, o que están separados de otros términos por signos de suma (+) o resta (-).</p>
            
            <h3>Partes Fundamentales de un Término</h3>
            <ol>
                <li>
                    <strong>Signo (+ o -)</strong>
                    <p>Indica si el término es positivo o negativo. Si no hay un signo escrito al inicio de la expresión, se asume que el término es positivo (+).</p>
                    <p><em>Ejemplo:</em> En 5x<sup>2</sup>, el signo es positivo. En -3y, el signo es negativo.</p>
                </li>
                <li>
                    <strong>Coeficiente</strong>
                    <p>Es la parte numérica del término, incluyendo su signo. Es el factor que multiplica a la parte literal. Si la parte numérica es 1, este generalmente no se escribe (se omite), pero se entiende que está ahí.</p>
                    <p><em>Ejemplo:</em> En 7ab, el coeficiente es 7. En -z<sup>4</sup>, el coeficiente es -1.</p>
                </li>
                <li>
                    <strong>Parte Literal (o Variables)</strong>
                    <p>Es la parte formada por letras (variables) y sus exponentes. Las letras representan valores desconocidos o variables.</p>
                    <p><em>Ejemplo:</em> En 4x<sup>3</sup>y, la parte literal es x<sup>3</sup>y. En -m, la parte literal es m.</p>
                </li>
                <li>
                    <strong>Exponente (o Grado)</strong>
                    <p>Es el número pequeño y elevado (superíndice) que indica cuántas veces la base (la variable) se multiplica por sí misma. Cuando una variable no tiene un exponente escrito, se asume que es 1.</p>
                    <p><strong>El grado del término</strong> es la suma de los exponentes de todas sus variables.</p>
                    <p><em>Ejemplo:</em> En 2x<sup>5</sup>, el exponente es 5. En 6a<sup>2</sup>b<sup>3</sup>, el grado del término es 2 + 3 = 5.</p>
                </li>
            </ol>
            
            <h3>Ejemplos Esquemáticos</h3>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Término</th>
                        <th>Signo</th>
                        <th>Coeficiente</th>
                        <th>Parte Literal</th>
                        <th>Exponente(s)</th>
                        <th>Grado del Término</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>-10x<sup>4</sup></td>
                        <td>-</td>
                        <td>10</td>
                        <td>x<sup>4</sup></td>
                        <td>4</td>
                        <td>4</td>
                    </tr>
                    <tr>
                        <td>y<sup>2</sup>z</td>
                        <td>+</td>
                        <td>1</td>
                        <td>y<sup>2</sup>z</td>
                        <td>2 y 1 (para z)</td>
                        <td>2 + 1 = 3</td>
                    </tr>
                    <tr>
                        <td>8</td>
                        <td>+</td>
                        <td>8</td>
                        <td>(No tiene)</td>
                        <td>(No tiene)</td>
                        <td>0 (Término independiente)</td>
                    </tr>
                </tbody>
            </table>
            
            <h3>Concepto Clave: Términos Semejantes</h3>
            <p>Dos o más términos son semejantes si tienen **exactamente la misma parte literal** (es decir, las mismas variables elevadas a los mismos exponentes).</p>
            <p><strong>Importancia:</strong> Solo los términos semejantes se pueden sumar o restar (operación conocida como **reducción de términos semejantes**).</p>
            <ul>
                <li><strong>Semejantes:</strong> 3x<sup>2</sup>y y -5x<sup>2</sup>y (Ambos tienen x<sup>2</sup>y)</li>
                <li><strong>NO Semejantes:</strong> 4x y 4x<sup>2</sup> (El exponente de x es diferente: 1 vs. 2)</li>
            </ul>

            <hr>

            <h2>3. Reducción y Simplificación</h2>

            <p>Esta es una regla de oro: **solo los términos semejantes se pueden sumar o restar.**</p>

            <h3>Ejemplo de Reducción:</h3>
            <p>Simplificar: 5x + 3x - x</p>
            <p>Como todos tienen la parte literal 'x', se operan los coeficientes (5 + 3 - 1):</p>
            <p>Resultado: **7x**.</p>

            <hr>

            <h2>4. Expresiones vs. Ecuaciones</h2>

            <h3>A. Expresión Algebraica</h3>
            <p>Una combinación de términos unidos por signos. Se evalúa o simplifica, pero no se resuelve porque NO tiene el signo de igualdad (=).</p>
            <p>Ejemplos: *Monomio* (5x), *Binomio* (x + y), *Trinomio* (a<sup>2</sup> - 3a + 4).</p>

            <h3>B. Ecuación Lineal (Primer Grado)</h3>
            <p>Una **igualdad** que solo es cierta para un valor específico de la variable. Se **resuelve** despejando la variable.</p>

            <h3>Ejemplo de Solución de Ecuaciones:</h3>
            <p>Resolver: 4x - 7 = 13</p>
            <ol>
                <li>Mover la constante (-7) con la operación inversa (suma): 4x = 13 + 7 &rarr; 4x = 20.</li>
                <li>Despejar la variable (4 multiplica, así que dividimos): x = 20 / 4 &rarr; x = 5.</li>
            </ol>

            <hr>

            <h2>5. Video Recomendado</h2>
            <p>Mira este video para reforzar los conceptos básicos y la simplificación de términos. Si este video no funciona, puedes buscar en YouTube "Conceptos básicos de álgebra y expresiones".</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4LouAWcajJs" title="ÁLGEBRA desde CERO - Conceptos y Términos Básicos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
            </div>

            <hr>

            <h2>6. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Dr. Ana Pérez</strong><br>
                Especialista en didáctica de las matemáticas y desarrollo de currículos educativos para secundaria.</p>
            </div>

            <hr>

            <h2 id="cuestionario-titulo">7. Cuestionario de 10 Preguntas</h2>
            <p>¡Pon a prueba tu conocimiento! Responde basándote en la información que acabas de leer.</p>

            <form id="quiz-form" method="post" class="quiz-form">
                <?php foreach ($questions as $id => $data): ?>
                    <fieldset>
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
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
            </div>
        </div>
    </div>

    <script>
        // 1. Inyectamos las preguntas del quiz para que el JS las use en el feedback
        window.quizQuestions = <?php echo json_encode($questions); ?>;
        
        // 2. Inyectamos la URL del procesador universal (Ruta relativa desde tema1.php)
        window.processorUrl = '../quiz_backend/procesar_quiz.php'; 
    </script>

    <script src="../../../../js/quiz_handler.js"></script>
</body>
</html>