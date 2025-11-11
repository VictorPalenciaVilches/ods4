<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema1.php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema1'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    1 => ['q' => '¿Qué es el álgebra?', 'options' => ['La rama de las matemáticas que estudia solo números enteros','La rama que usa letras y símbolos para representar números desconocidos','La rama que estudia solo operaciones de suma y resta','La rama que trabaja únicamente con fracciones'], 'answer' => 1],
    2 => ['q' => 'En el término 5x², ¿cuál es el coeficiente?', 'options' => ['x','5','2','x²'], 'answer' => 1],
    3 => ['q' => '¿Qué representa una variable en álgebra?', 'options' => ['Un número fijo que nunca cambia','Una letra que representa un número desconocido o que puede variar','Una operación matemática','Un signo de puntuación'], 'answer' => 1],
    4 => ['q' => '¿Cuáles de los siguientes términos son semejantes?', 'options' => ['3x y 5y','2x² y 3x','4x y 7x','x³ y y³'], 'answer' => 2],
    5 => ['q' => 'Al simplificar la expresión 3x + 5x - 2x, ¿cuál es el resultado?', 'options' => ['6x','10x','0','6x²'], 'answer' => 0],
    6 => ['q' => '¿Qué es una expresión algebraica?', 'options' => ['Una igualdad con signo =','Una combinación de términos sin signo de igualdad','Una operación de multiplicación','Un número entero'], 'answer' => 1],
    7 => ['q' => 'En la ecuación 2x + 3 = 11, ¿cuál es el valor de x?', 'options' => ['4','7','5','14'], 'answer' => 0],
    8 => ['q' => '¿Cuál es el grado del término 7x³y²?', 'options' => ['3','2','5','7'], 'answer' => 2],
    9 => ['q' => '¿Qué operación se realiza para despejar una variable que está siendo multiplicada?', 'options' => ['Sumar','Restar','Multiplicar','Dividir'], 'answer' => 3],
    10 => ['q' => 'Si tenemos la expresión 4a + 3b - 2a + 5b, al simplificar términos semejantes obtenemos:', 'options' => ['2a + 8b','6a + 8b','2a + 2b','7a + 8b'], 'answer' => 0],
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
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 1: Introducción al Álgebra</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Bienvenido al fascinante mundo del álgebra, donde las letras y los números trabajan juntos para resolver problemas.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es el Álgebra?</h2>
            <p>El <strong>álgebra</strong> es una rama de las matemáticas que utiliza letras (llamadas <strong>variables</strong>) y símbolos para representar números desconocidos o que pueden variar. Mientras que en aritmética trabajamos con números concretos (como 5 + 3 = 8), en álgebra trabajamos con expresiones generales (como x + 3 = 8, donde x puede ser cualquier número).</p>
            
            <p><strong>¿Por qué es importante el álgebra?</strong></p>
            <ul>
                <li>Nos permite crear <strong>fórmulas generales</strong> que funcionan para cualquier número</li>
                <li>Facilita la resolución de <strong>problemas complejos</strong> de manera sistemática</li>
                <li>Es fundamental en ciencias, ingeniería, economía y muchas otras áreas</li>
                <li>Desarrolla el <strong>pensamiento abstracto</strong> y la capacidad de razonamiento</li>
            </ul>

            <hr>

            <h2>2. Conceptos Fundamentales</h2>

            <h3>2.1. Variables</h3>
            <p>Una <strong>variable</strong> es una letra (generalmente x, y, z, a, b, c) que representa un número desconocido o que puede tomar diferentes valores. Las variables más comunes son las letras del final del alfabeto (x, y, z), pero podemos usar cualquier letra.</p>
            <p><em>Ejemplos:</em></p>
            <ul>
                <li><strong>x</strong> puede representar la edad de una persona</li>
                <li><strong>y</strong> puede representar el precio de un producto</li>
                <li><strong>a</strong> puede representar la longitud de un lado</li>
            </ul>

            <h3>2.2. Términos Algebraicos</h3>
            <p>Un <strong>término algebraico</strong> es la unidad básica de una expresión algebraica. Está formado por la combinación de números y letras mediante la multiplicación.</p>
            
            <p><strong>Partes de un término:</strong></p>
            <ol>
                <li>
                    <strong>Coeficiente:</strong> Es el número que multiplica a la variable. Si no hay número visible, el coeficiente es 1.
                    <p><em>Ejemplos:</em> En <strong>5x</strong>, el coeficiente es 5. En <strong>x</strong>, el coeficiente es 1.</p>
                </li>
                <li>
                    <strong>Variable:</strong> Es la letra que representa el valor desconocido.
                    <p><em>Ejemplos:</em> En <strong>3y</strong>, la variable es y. En <strong>-2a</strong>, la variable es a.</p>
                </li>
                <li>
                    <strong>Exponente:</strong> Indica cuántas veces se multiplica la variable por sí misma. Si no hay exponente visible, es 1.
                    <p><em>Ejemplos:</em> En <strong>x²</strong>, el exponente es 2 (x · x). En <strong>y³</strong>, el exponente es 3 (y · y · y).</p>
                </li>
            </ol>
            
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Término</th>
                        <th>Coeficiente</th>
                        <th>Variable</th>
                        <th>Exponente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>7x</td>
                        <td>7</td>
                        <td>x</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>-3y²</td>
                        <td>-3</td>
                        <td>y</td>
                        <td>2</td>
                    </tr>
                    <tr>
                        <td>a³</td>
                        <td>1</td>
                        <td>a</td>
                        <td>3</td>
                    </tr>
                    <tr>
                        <td>5xy</td>
                        <td>5</td>
                        <td>x, y</td>
                        <td>1, 1</td>
                    </tr>
                </tbody>
            </table>
            
            <h3>2.3. Términos Semejantes</h3>
            <p>Dos o más términos son <strong>semejantes</strong> cuando tienen exactamente la misma variable con el mismo exponente.</p>
            <p><strong>Regla importante:</strong> Solo los términos semejantes se pueden sumar o restar.</p>
            
            <p><em>Ejemplos:</em></p>
            <ul>
                <li><strong>Semejantes:</strong> 3x y 5x (ambos tienen x con exponente 1)</li>
                <li><strong>Semejantes:</strong> 2y² y -7y² (ambos tienen y²)</li>
                <li><strong>NO semejantes:</strong> 3x y 3y (variables diferentes)</li>
                <li><strong>NO semejantes:</strong> 4x y 4x² (exponentes diferentes)</li>
            </ul>

            <hr>

            <h2>3. Expresiones Algebraicas</h2>
            <p>Una <strong>expresión algebraica</strong> es una combinación de términos unidos por signos de suma (+) o resta (-). No tiene signo de igualdad (=), por lo que no se resuelve, solo se simplifica o evalúa.</p>

            <h3>3.1. Clasificación de Expresiones</h3>
            <ul>
                <li><strong>Monomio:</strong> Una expresión con un solo término. <em>Ejemplo:</em> 5x, -3y²</li>
                <li><strong>Binomio:</strong> Una expresión con dos términos. <em>Ejemplo:</em> 3x + 5, x - 2y</li>
                <li><strong>Trinomio:</strong> Una expresión con tres términos. <em>Ejemplo:</em> x² + 3x + 2</li>
                <li><strong>Polinomio:</strong> Una expresión con más de tres términos. <em>Ejemplo:</em> 2x³ - x² + 4x - 1</li>
            </ul>

            <h3>3.2. Simplificación de Expresiones</h3>
            <p>Para <strong>simplificar</strong> una expresión algebraica, debemos combinar (sumar o restar) los términos semejantes.</p>
            
            <p><strong>Pasos para simplificar:</strong></p>
            <ol>
                <li>Identificar los términos semejantes</li>
                <li>Sumar o restar los coeficientes de los términos semejantes</li>
                <li>Mantener la misma variable con su exponente</li>
            </ol>

            <p><em>Ejemplos de simplificación:</em></p>
            <ul>
                <li><strong>3x + 5x = 8x</strong> (sumamos los coeficientes: 3 + 5 = 8)</li>
                <li><strong>7y - 2y = 5y</strong> (restamos los coeficientes: 7 - 2 = 5)</li>
                <li><strong>4a + 3b - 2a + 5b = 2a + 8b</strong> (agrupamos términos semejantes: 4a - 2a = 2a y 3b + 5b = 8b)</li>
                <li><strong>2x² + 3x - x² + 5x = x² + 8x</strong> (agrupamos: 2x² - x² = x² y 3x + 5x = 8x)</li>
            </ul>

            <hr>

            <h2>4. Ecuaciones de Primer Grado</h2>
            <p>Una <strong>ecuación</strong> es una igualdad matemática que contiene una variable. A diferencia de una expresión, una ecuación tiene un signo de igualdad (=) y se puede resolver para encontrar el valor de la variable.</p>

            <h3>4.1. Partes de una Ecuación</h3>
            <p>En una ecuación como <strong>2x + 3 = 11</strong>:</p>
            <ul>
                <li><strong>Miembro izquierdo:</strong> 2x + 3 (todo lo que está a la izquierda del =)</li>
                <li><strong>Miembro derecho:</strong> 11 (todo lo que está a la derecha del =)</li>
                <li><strong>Variable:</strong> x (la incógnita que debemos encontrar)</li>
            </ul>

            <h3>4.2. Resolver una Ecuación</h3>
            <p>Para <strong>resolver</strong> una ecuación, debemos encontrar el valor de la variable que hace que la igualdad sea verdadera. Esto se hace mediante operaciones inversas.</p>

            <p><strong>Reglas fundamentales:</strong></p>
            <ul>
                <li>Lo que se suma en un miembro, se resta en el otro</li>
                <li>Lo que se resta en un miembro, se suma en el otro</li>
                <li>Lo que multiplica en un miembro, divide en el otro</li>
                <li>Lo que divide en un miembro, multiplica en el otro</li>
            </ul>

            <p><em>Ejemplo 1:</em> Resolver 2x + 3 = 11</p>
            <ol>
                <li>Restamos 3 en ambos lados: 2x + 3 - 3 = 11 - 3</li>
                <li>Simplificamos: 2x = 8</li>
                <li>Dividimos entre 2 en ambos lados: 2x ÷ 2 = 8 ÷ 2</li>
                <li>Solución: <strong>x = 4</strong></li>
            </ol>

            <p><em>Verificación:</em> Reemplazamos x = 4 en la ecuación original: 2(4) + 3 = 8 + 3 = 11 ✓</p>

            <p><em>Ejemplo 2:</em> Resolver 5x - 7 = 18</p>
            <ol>
                <li>Sumamos 7 en ambos lados: 5x - 7 + 7 = 18 + 7</li>
                <li>Simplificamos: 5x = 25</li>
                <li>Dividimos entre 5: x = 25 ÷ 5</li>
                <li>Solución: <strong>x = 5</strong></li>
            </ol>

            <p><em>Ejemplo 3:</em> Resolver 3(x + 2) = 15</p>
            <ol>
                <li>Primero distribuimos el 3: 3x + 6 = 15</li>
                <li>Restamos 6: 3x = 15 - 6 = 9</li>
                <li>Dividimos entre 3: x = 9 ÷ 3</li>
                <li>Solución: <strong>x = 3</strong></li>
            </ol>

            <hr>

            <h2>5. Grado de un Término</h2>
            <p>El <strong>grado de un término</strong> es la suma de los exponentes de todas sus variables.</p>
            
            <p><em>Ejemplos:</em></p>
            <ul>
                <li>El término <strong>7x²</strong> tiene grado 2 (exponente de x es 2)</li>
                <li>El término <strong>5xy</strong> tiene grado 2 (x tiene exponente 1, y tiene exponente 1, 1 + 1 = 2)</li>
                <li>El término <strong>3x²y³</strong> tiene grado 5 (2 + 3 = 5)</li>
                <li>El término <strong>8</strong> tiene grado 0 (no tiene variables, es un término constante)</li>
            </ul>

            <hr>

            <h2>6. Aplicaciones Prácticas</h2>
            <p>El álgebra nos ayuda a resolver problemas de la vida cotidiana. Veamos algunos ejemplos:</p>

            <p><strong>Problema 1:</strong> Si un libro cuesta $15 y compramos 3 libros, ¿cuánto pagamos en total?</p>
            <p><em>Solución algebraica:</em> Si x representa el precio de un libro, entonces 3x = 3(15) = $45</p>

            <p><strong>Problema 2:</strong> Juan tiene el doble de edad que Pedro. Si entre los dos suman 30 años, ¿cuántos años tiene cada uno?</p>
            <p><em>Solución:</em> Sea x = edad de Pedro. Entonces edad de Juan = 2x</p>
            <p>Ecuación: x + 2x = 30 → 3x = 30 → x = 10</p>
            <p>Pedro tiene 10 años y Juan tiene 20 años.</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>7. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Dr. Carlos Martínez Álvarez</strong><br>
                Doctor en Matemáticas Aplicadas y especialista en didáctica de las matemáticas para educación secundaria. Profesor con más de 15 años de experiencia en la enseñanza del álgebra y autor de varios libros de texto educativos.</p>
            </div>

            <hr>

            <!-- 3. VIDEO DE YOUTUBE -->
            <h2>8. Video Recomendado</h2>
            <p>Este video te ayudará a reforzar los conceptos básicos del álgebra de manera visual y práctica. Observa cómo se identifican términos, se simplifican expresiones y se resuelven ecuaciones paso a paso.</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/4LouAWcajJs?rel=0" title="ÁLGEBRA desde CERO - Conceptos y Términos Básicos" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "ÁLGEBRA desde CERO - Conceptos y Términos Básicos" </em></p>

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

            <div class="tema-actions">
                <a href="../../matematicas.php" class="volver-btn">Volver a Matemáticas</a>
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