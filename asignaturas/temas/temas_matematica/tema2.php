<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema2.php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema2'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    // Preguntas fáciles (1-3)
    1 => ['q' => '¿Qué es un polinomio?', 'options' => ['Una expresión con un solo término','Una expresión algebraica formada por la suma o resta de varios términos','Una ecuación con igualdad','Un número entero'], 'answer' => 1],
    2 => ['q' => 'Al sumar los polinomios (3x + 5) + (2x - 3), ¿cuál es el resultado?', 'options' => ['5x + 2','5x + 8','x + 2','6x² + 2'], 'answer' => 0],
    3 => ['q' => '¿Qué significa "términos semejantes" en un polinomio?', 'options' => ['Términos que tienen el mismo coeficiente','Términos que tienen la misma parte literal (mismas variables con mismos exponentes)','Términos que tienen el mismo signo','Términos que están en la misma posición'], 'answer' => 1],
    
    // Preguntas medias (4-7)
    4 => ['q' => 'Al restar (5x² + 3x - 2) - (2x² - x + 4), ¿cuál es el resultado?', 'options' => ['3x² + 4x - 6','3x² + 2x - 6','7x² + 2x + 2','3x² + 2x + 2'], 'answer' => 0],
    5 => ['q' => 'Al multiplicar (x + 3)(x + 2) usando la propiedad distributiva, ¿cuál es el resultado?', 'options' => ['x² + 5x + 6','x² + 6','2x + 5','x² + 5x'], 'answer' => 0],
    6 => ['q' => '¿Cuál es el producto notable (a + b)²?', 'options' => ['a² + b²','a² + 2ab + b²','a² + ab + b²','2a + 2b'], 'answer' => 1],
    7 => ['q' => 'Si queremos factorizar 6x² + 9x, el factor común es:', 'options' => ['3x','6x','9x','x'], 'answer' => 0],
    
    // Preguntas difíciles (8-10)
    8 => ['q' => 'Al multiplicar (2x - 3)(x² + 4x - 1), ¿cuál es el coeficiente del término x² en el resultado?', 'options' => ['-1','-2','5','8'], 'answer' => 2],
    9 => ['q' => 'Si factorizamos completamente el polinomio x² - 5x + 6, obtenemos:', 'options' => ['(x - 2)(x - 3)','(x + 2)(x + 3)','(x - 1)(x - 6)','(x + 1)(x + 6)'], 'answer' => 0],
    10 => ['q' => 'Al desarrollar (3x - 2y)², ¿cuál es el término que contiene xy?', 'options' => ['-12xy','12xy','-6xy','6xy'], 'answer' => 0],
];

// Sanitizar el nombre del usuario para evitar ataques XSS
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 2 - Operaciones con Polinomios</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 2: Operaciones con Polinomios</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Ahora que dominas los conceptos básicos del álgebra, aprenderás a trabajar con polinomios: sumarlos, restarlos, multiplicarlos y factorizarlos. Estas operaciones son fundamentales para resolver ecuaciones más complejas y problemas matemáticos avanzados.</p>

            <hr>

            <!-- 1. DESARROLLO COMPLETO DEL TEMA -->
            <h2>1. ¿Qué es un Polinomio?</h2>
            <p>Un <strong>polinomio</strong> es una expresión algebraica formada por la suma o resta de varios términos, donde cada término está compuesto por un coeficiente numérico multiplicado por una o más variables elevadas a exponentes enteros no negativos.</p>
            
            <p><strong>Componentes de un polinomio:</strong></p>
            <ul>
                <li><strong>Términos:</strong> Cada parte del polinomio separada por signos + o -</li>
                <li><strong>Grado del polinomio:</strong> El mayor exponente de la variable en el polinomio</li>
                <li><strong>Término independiente:</strong> El término que no contiene variables (solo número)</li>
                <li><strong>Coeficiente principal:</strong> El coeficiente del término de mayor grado</li>
            </ul>

            <p><em>Ejemplos de polinomios:</em></p>
            <ul>
                <li><strong>P(x) = 3x² + 5x - 2</strong> (polinomio de grado 2, también llamado cuadrático)</li>
                <li><strong>Q(x) = 2x³ - x + 4</strong> (polinomio de grado 3, también llamado cúbico)</li>
                <li><strong>R(x) = 7x - 3</strong> (polinomio de grado 1, también llamado lineal)</li>
                <li><strong>S(x) = 5</strong> (polinomio de grado 0, también llamado constante)</li>
            </ul>

            <h3>1.1. Forma Estándar de un Polinomio</h3>
            <p>Un polinomio está en <strong>forma estándar</strong> cuando sus términos están ordenados de mayor a menor grado.</p>
            <p><em>Ejemplo:</em> El polinomio <strong>5x - 3x³ + 2 - x²</strong> en forma estándar es: <strong>-3x³ - x² + 5x + 2</strong></p>

            <hr>

            <h2>2. Suma de Polinomios</h2>
            <p>Para <strong>sumar polinomios</strong>, debemos agrupar los términos semejantes y sumar sus coeficientes. Los términos semejantes son aquellos que tienen exactamente la misma parte literal (mismas variables con los mismos exponentes).</p>

            <h3>2.1. Método para Sumar Polinomios</h3>
            <p><strong>Pasos:</strong></p>
            <ol>
                <li>Escribir los polinomios uno debajo del otro, alineando los términos semejantes</li>
                <li>Sumar los coeficientes de los términos semejantes</li>
                <li>Mantener la misma parte literal</li>
                <li>Escribir el resultado en forma estándar</li>
            </ol>

            <p><strong>Ejemplo 1:</strong> Sumar (3x + 5) + (2x - 3)</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Agrupamos términos semejantes: (3x + 2x) + (5 - 3)</li>
                <li>Sumamos los coeficientes: 3x + 2x = 5x y 5 - 3 = 2</li>
                <li>Resultado: <strong>5x + 2</strong></li>
            </ol>

            <p><strong>Ejemplo 2:</strong> Sumar (2x² + 3x - 1) + (x² - 2x + 4)</p>
            <p><em>Solución paso a paso:</em></p>
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Paso</th>
                        <th>Operación</th>
                        <th>Resultado</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Agrupar términos semejantes</td>
                        <td>(2x² + x²) + (3x - 2x) + (-1 + 4)</td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Sumar coeficientes</td>
                        <td>3x² + x + 3</td>
                    </tr>
                    <tr>
                        <td>3</td>
                        <td>Resultado final</td>
                        <td><strong>3x² + x + 3</strong></td>
                    </tr>
                </tbody>
            </table>

            <p><strong>Ejemplo 3:</strong> Sumar (4x³ - 2x² + 5) + (3x² - x + 7)</p>
            <p><em>Solución:</em></p>
            <p>Agrupando términos semejantes: 4x³ + (-2x² + 3x²) + (-x) + (5 + 7)</p>
            <p>Resultado: <strong>4x³ + x² - x + 12</strong></p>

            <hr>

            <h2>3. Resta de Polinomios</h2>
            <p>Para <strong>restar polinomios</strong>, debemos cambiar el signo de todos los términos del polinomio que se resta (el sustraendo) y luego sumar como en el método anterior.</p>

            <h3>3.1. Método para Restar Polinomios</h3>
            <p><strong>Regla importante:</strong> Restar un polinomio es equivalente a sumar su opuesto. Para encontrar el opuesto, cambiamos el signo de cada término.</p>

            <p><strong>Pasos:</strong></p>
            <ol>
                <li>Cambiar el signo de todos los términos del polinomio que se resta</li>
                <li>Sumar los polinomios como en el método de suma</li>
                <li>Simplificar términos semejantes</li>
            </ol>

            <p><strong>Ejemplo 1:</strong> Restar (5x² + 3x - 2) - (2x² - x + 4)</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Cambiamos el signo del segundo polinomio: (5x² + 3x - 2) + (-2x² + x - 4)</li>
                <li>Agrupamos términos semejantes: (5x² - 2x²) + (3x + x) + (-2 - 4)</li>
                <li>Realizamos las operaciones: 3x² + 4x - 6</li>
                <li>Resultado: <strong>3x² + 4x - 6</strong></li>
            </ol>

            <p><strong>Ejemplo 2:</strong> Restar (7x - 3) - (2x + 5)</p>
            <p><em>Solución:</em></p>
            <p>Cambiando signos: (7x - 3) + (-2x - 5) = 7x - 3 - 2x - 5 = <strong>5x - 8</strong></p>

            <p><strong>Ejemplo 3:</strong> Restar (x³ + 2x² - x + 1) - (3x² - 2x + 3)</p>
            <p><em>Solución:</em></p>
            <p>x³ + 2x² - x + 1 - 3x² + 2x - 3</p>
            <p>Agrupando: x³ + (2x² - 3x²) + (-x + 2x) + (1 - 3)</p>
            <p>Resultado: <strong>x³ - x² + x - 2</strong></p>

            <hr>

            <h2>4. Multiplicación de Polinomios</h2>
            <p>La <strong>multiplicación de polinomios</strong> se realiza aplicando la propiedad distributiva. Cada término del primer polinomio se multiplica por cada término del segundo polinomio.</p>

            <h3>4.1. Multiplicación de Monomio por Polinomio</h3>
            <p>Multiplicamos el monomio por cada término del polinomio.</p>

            <p><strong>Ejemplo 1:</strong> Multiplicar 3x(2x² - x + 4)</p>
            <p><em>Solución:</em></p>
            <p>3x · 2x² - 3x · x + 3x · 4 = 6x³ - 3x² + 12x</p>

            <p><strong>Ejemplo 2:</strong> Multiplicar -2x²(5x - 3)</p>
            <p><em>Solución:</em></p>
            <p>-2x² · 5x - 2x² · (-3) = -10x³ + 6x²</p>

            <h3>4.2. Multiplicación de Binomio por Binomio</h3>
            <p>Para multiplicar dos binomios, usamos el método <strong>FOIL</strong> (First, Outside, Inside, Last) o simplemente aplicamos la propiedad distributiva dos veces.</p>

            <p><strong>Ejemplo 1:</strong> Multiplicar (x + 3)(x + 2)</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Multiplicamos x por cada término del segundo binomio: x(x + 2) = x² + 2x</li>
                <li>Multiplicamos 3 por cada término del segundo binomio: 3(x + 2) = 3x + 6</li>
                <li>Sumamos los resultados: x² + 2x + 3x + 6</li>
                <li>Simplificamos términos semejantes: <strong>x² + 5x + 6</strong></li>
            </ol>

            <p><em>Método FOIL:</em></p>
            <ul>
                <li><strong>First:</strong> x · x = x²</li>
                <li><strong>Outside:</strong> x · 2 = 2x</li>
                <li><strong>Inside:</strong> 3 · x = 3x</li>
                <li><strong>Last:</strong> 3 · 2 = 6</li>
                <li>Suma: x² + 2x + 3x + 6 = <strong>x² + 5x + 6</strong></li>
            </ul>

            <p><strong>Ejemplo 2:</strong> Multiplicar (x - 4)(x + 5)</p>
            <p><em>Solución:</em></p>
            <p>x · x + x · 5 - 4 · x - 4 · 5 = x² + 5x - 4x - 20 = <strong>x² + x - 20</strong></p>

            <p><strong>Ejemplo 3:</strong> Multiplicar (2x - 3)(x + 1)</p>
            <p><em>Solución:</em></p>
            <p>2x · x + 2x · 1 - 3 · x - 3 · 1 = 2x² + 2x - 3x - 3 = <strong>2x² - x - 3</strong></p>

            <h3>4.3. Multiplicación de Polinomios más Complejos</h3>
            <p><strong>Ejemplo:</strong> Multiplicar (2x - 3)(x² + 4x - 1)</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Multiplicamos 2x por cada término: 2x · x² + 2x · 4x - 2x · 1 = 2x³ + 8x² - 2x</li>
                <li>Multiplicamos -3 por cada término: -3 · x² - 3 · 4x + 3 · 1 = -3x² - 12x + 3</li>
                <li>Sumamos los resultados: 2x³ + 8x² - 2x - 3x² - 12x + 3</li>
                <li>Agrupamos términos semejantes: 2x³ + (8x² - 3x²) + (-2x - 12x) + 3</li>
                <li>Resultado: <strong>2x³ + 5x² - 14x + 3</strong></li>
            </ol>

            <hr>

            <h2>5. Productos Notables</h2>
            <p>Los <strong>productos notables</strong> son multiplicaciones de polinomios que aparecen frecuentemente y tienen fórmulas que facilitan su cálculo.</p>

            <h3>5.1. Cuadrado de un Binomio</h3>
            <p><strong>Fórmula:</strong> (a + b)² = a² + 2ab + b²</p>
            <p><strong>Fórmula:</strong> (a - b)² = a² - 2ab + b²</p>

            <p><strong>Ejemplo 1:</strong> Desarrollar (x + 3)²</p>
            <p><em>Solución:</em></p>
            <p>(x + 3)² = x² + 2(x)(3) + 3² = x² + 6x + 9</p>

            <p><strong>Ejemplo 2:</strong> Desarrollar (2x - 5)²</p>
            <p><em>Solución:</em></p>
            <p>(2x - 5)² = (2x)² - 2(2x)(5) + 5² = 4x² - 20x + 25</p>

            <h3>5.2. Diferencia de Cuadrados</h3>
            <p><strong>Fórmula:</strong> (a + b)(a - b) = a² - b²</p>

            <p><strong>Ejemplo 1:</strong> Desarrollar (x + 4)(x - 4)</p>
            <p><em>Solución:</em></p>
            <p>(x + 4)(x - 4) = x² - 4² = x² - 16</p>

            <p><strong>Ejemplo 2:</strong> Desarrollar (3x + 2)(3x - 2)</p>
            <p><em>Solución:</em></p>
            <p>(3x + 2)(3x - 2) = (3x)² - 2² = 9x² - 4</p>

            <h3>5.3. Cubo de un Binomio</h3>
            <p><strong>Fórmula:</strong> (a + b)³ = a³ + 3a²b + 3ab² + b³</p>
            <p><strong>Fórmula:</strong> (a - b)³ = a³ - 3a²b + 3ab² - b³</p>

            <p><strong>Ejemplo:</strong> Desarrollar (x + 2)³</p>
            <p><em>Solución:</em></p>
            <p>(x + 2)³ = x³ + 3(x²)(2) + 3(x)(2²) + 2³ = x³ + 6x² + 12x + 8</p>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Producto Notable</th>
                        <th>Fórmula</th>
                        <th>Ejemplo</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cuadrado de suma</td>
                        <td>(a + b)² = a² + 2ab + b²</td>
                        <td>(x + 3)² = x² + 6x + 9</td>
                    </tr>
                    <tr>
                        <td>Cuadrado de diferencia</td>
                        <td>(a - b)² = a² - 2ab + b²</td>
                        <td>(x - 3)² = x² - 6x + 9</td>
                    </tr>
                    <tr>
                        <td>Diferencia de cuadrados</td>
                        <td>(a + b)(a - b) = a² - b²</td>
                        <td>(x + 3)(x - 3) = x² - 9</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h2>6. Factorización de Polinomios</h2>
            <p><strong>Factorizar</strong> un polinomio significa expresarlo como el producto de dos o más polinomios más simples (factores). Es el proceso inverso de la multiplicación.</p>

            <h3>6.1. Factor Común</h3>
            <p>Consiste en extraer el máximo factor común de todos los términos del polinomio.</p>

            <p><strong>Ejemplo 1:</strong> Factorizar 6x² + 9x</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Identificamos el factor común: 3x (divide a ambos términos)</li>
                <li>Dividimos cada término entre el factor común: 6x² ÷ 3x = 2x y 9x ÷ 3x = 3</li>
                <li>Resultado: <strong>3x(2x + 3)</strong></li>
            </ol>

            <p><strong>Ejemplo 2:</strong> Factorizar 4x³ - 8x² + 12x</p>
            <p><em>Solución:</em></p>
            <p>Factor común: 4x</p>
            <p>4x(x² - 2x + 3)</p>

            <h3>6.2. Factorización de Trinomios Cuadrados Perfectos</h3>
            <p>Un trinomio es cuadrado perfecto si puede escribirse como el cuadrado de un binomio.</p>
            <p><strong>Fórmula:</strong> a² + 2ab + b² = (a + b)²</p>
            <p><strong>Fórmula:</strong> a² - 2ab + b² = (a - b)²</p>

            <p><strong>Ejemplo 1:</strong> Factorizar x² + 6x + 9</p>
            <p><em>Solución:</em></p>
            <p>Reconocemos: x² = (x)², 9 = 3², y 6x = 2(x)(3)</p>
            <p>Por lo tanto: x² + 6x + 9 = <strong>(x + 3)²</strong></p>

            <p><strong>Ejemplo 2:</strong> Factorizar 4x² - 12x + 9</p>
            <p><em>Solución:</em></p>
            <p>4x² = (2x)², 9 = 3², y 12x = 2(2x)(3)</p>
            <p>Por lo tanto: 4x² - 12x + 9 = <strong>(2x - 3)²</strong></p>

            <h3>6.3. Factorización de Trinomios de la Forma x² + bx + c</h3>
            <p>Para factorizar x² + bx + c, buscamos dos números que sumados den b y multiplicados den c.</p>

            <p><strong>Ejemplo 1:</strong> Factorizar x² - 5x + 6</p>
            <p><em>Solución paso a paso:</em></p>
            <ol>
                <li>Buscamos dos números que sumados den -5 y multiplicados den 6</li>
                <li>Los números son -2 y -3 (porque -2 + (-3) = -5 y (-2)(-3) = 6)</li>
                <li>Resultado: <strong>(x - 2)(x - 3)</strong></li>
            </ol>

            <p><strong>Ejemplo 2:</strong> Factorizar x² + 7x + 12</p>
            <p><em>Solución:</em></p>
            <p>Buscamos: 3 + 4 = 7 y 3 · 4 = 12</p>
            <p>Resultado: <strong>(x + 3)(x + 4)</strong></p>

            <p><strong>Ejemplo 3:</strong> Factorizar x² - x - 12</p>
            <p><em>Solución:</em></p>
            <p>Buscamos: -4 + 3 = -1 y (-4)(3) = -12</p>
            <p>Resultado: <strong>(x - 4)(x + 3)</strong></p>

            <hr>

            <h2>7. Aplicaciones Prácticas</h2>
            <p>Las operaciones con polinomios tienen múltiples aplicaciones en la vida real:</p>

            <p><strong>Problema 1:</strong> Un terreno rectangular tiene un largo de (x + 5) metros y un ancho de (x + 3) metros. Expresa el área del terreno como un polinomio.</p>
            <p><em>Solución:</em></p>
            <p>Área = largo × ancho = (x + 5)(x + 3)</p>
            <p>Desarrollando: x² + 3x + 5x + 15 = <strong>x² + 8x + 15</strong> metros cuadrados</p>

            <p><strong>Problema 2:</strong> Una empresa tiene dos tipos de productos. El producto A genera ganancias de (3x² + 2x) pesos y el producto B genera (x² - 5x + 10) pesos. ¿Cuál es la ganancia total?</p>
            <p><em>Solución:</em></p>
            <p>Ganancia total = (3x² + 2x) + (x² - 5x + 10)</p>
            <p>= 3x² + 2x + x² - 5x + 10</p>
            <p>= <strong>4x² - 3x + 10</strong> pesos</p>

            <p><strong>Problema 3:</strong> Si el área de un cuadrado es x² + 10x + 25, y sabemos que es un cuadrado perfecto, ¿cuál es la longitud de su lado?</p>
            <p><em>Solución:</em></p>
            <p>Factorizamos: x² + 10x + 25 = (x + 5)²</p>
            <p>Por lo tanto, la longitud del lado es <strong>(x + 5)</strong> unidades</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>8. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Dra. María Elena Rodríguez</strong><br>
                Doctora en Matemáticas y especialista en álgebra y álgebra lineal. Profesora universitaria con más de 20 años de experiencia en enseñanza de matemáticas para secundaria y bachillerato, autora de múltiples materiales didácticos sobre operaciones algebraicas.</p>
            </div>

            <hr>

            <!-- 3. VIDEO DE YOUTUBE -->
            <h2>9. Video Recomendado</h2>
            <p>Este video te mostrará de manera visual y práctica cómo realizar las operaciones con polinomios. Observa las técnicas paso a paso para sumar, restar, multiplicar y factorizar polinomios correctamente.</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/vvIYwabU1lw?rel=0" title="Operaciones con Polinomios - Suma, Resta y Multiplicación" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Operaciones con Polinomios - Suma, Resta y Multiplicación" </em></p>

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