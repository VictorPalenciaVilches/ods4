<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema4.php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema4'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    1 => ['q' => '¿Qué es la geometría?', 'options' => ['La rama de las matemáticas que estudia solo números','La rama que estudia las propiedades y relaciones de figuras en el espacio','La rama que estudia solo operaciones','La rama que trabaja únicamente con fracciones'], 'answer' => 1],
    2 => ['q' => '¿Cuál es la fórmula del área de un rectángulo?', 'options' => ['A = lado × lado','A = base × altura','A = π × radio²','A = (base × altura) / 2'], 'answer' => 1],
    3 => ['q' => 'El perímetro de un cuadrado de lado 6 cm es:', 'options' => ['12 cm','24 cm','36 cm','18 cm'], 'answer' => 1],
    4 => ['q' => '¿Cuál es la fórmula del área de un triángulo?', 'options' => ['A = base × altura','A = (base × altura) / 2','A = base + altura','A = lado × lado'], 'answer' => 1],
    5 => ['q' => 'El área de un círculo con radio 5 cm es aproximadamente:', 'options' => ['15.7 cm²','31.4 cm²','78.5 cm²','10 cm²'], 'answer' => 2],
    6 => ['q' => 'Un triángulo con todos sus lados iguales se llama:', 'options' => ['Triángulo isósceles','Triángulo escaleno','Triángulo equilátero','Triángulo rectángulo'], 'answer' => 2],
    7 => ['q' => '¿Cuál es la fórmula del perímetro de un círculo?', 'options' => ['P = 2 × π × radio','P = π × radio²','P = 2 × radio','P = π × radio'], 'answer' => 0],
    8 => ['q' => 'Si un rectángulo tiene base 8 m y altura 5 m, su área es:', 'options' => ['13 m²','40 m²','26 m²','20 m²'], 'answer' => 1],
    9 => ['q' => '¿Cuántos lados tiene un hexágono?', 'options' => ['4','5','6','7'], 'answer' => 2],
    10 => ['q' => 'El volumen de un cubo de arista 3 cm es:', 'options' => ['9 cm³','18 cm³','27 cm³','12 cm³'], 'answer' => 2],
];

// Sanitizar el nombre del usuario para evitar ataques XSS
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 4 - Geometría Básica</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 4: Geometría Básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! La geometría nos rodea en todo momento. Aprenderás a calcular áreas, perímetros y volúmenes de las figuras más comunes que usamos en la vida diaria.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Geometría?</h2>
            <p>La <strong>geometría</strong> es una rama de las matemáticas que estudia las propiedades, medidas y relaciones de puntos, líneas, ángulos, superficies y sólidos en el espacio. Esta palabra proviene del griego "geo" (tierra) y "metron" (medida), es decir, "medida de la tierra".</p>
            
            <p><strong>¿Por qué es importante la geometría?</strong></p>
            <ul>
                <li>Nos ayuda a <strong>medir y calcular espacios reales</strong> (habitaciones, terrenos, objetos)</li>
                <li>Es fundamental en <strong>arquitectura, ingeniería y diseño</strong></li>
                <li>Se aplica en <strong>artes, tecnología y ciencias</strong></li>
                <li>Desarrolla el <strong>pensamiento espacial y visual</strong></li>
                <li>Nos permite resolver <strong>problemas prácticos de la vida cotidiana</strong></li>
            </ul>

            <p><strong>Aplicaciones de la geometría:</strong></p>
            <ul>
                <li>Calcular cuánta pintura necesitamos para una pared</li>
                <li>Determinar el tamaño de un terreno o jardín</li>
                <li>Diseñar muebles y espacios habitables</li>
                <li>Construir edificios y estructuras</li>
                <li>Crear gráficos y animaciones en computadora</li>
            </ul>

            <hr>

            <h2>2. Conceptos Fundamentales</h2>
            <p>Antes de estudiar figuras complejas, debemos entender los elementos básicos de la geometría:</p>

            <h3>2.1. Punto, Línea y Plano</h3>
            <p>Estos son los elementos primitivos de la geometría, es decir, conceptos que no se definen sino que se aceptan como base:</p>
            
            <ul>
                <li><strong>Punto:</strong> Es una posición en el espacio, no tiene dimensiones (no tiene largo, ancho ni alto). Se representa con una letra mayúscula: A, B, C...</li>
                <li><strong>Línea:</strong> Es una sucesión infinita de puntos. Tiene una dimensión (longitud). Se representa con una línea recta o curva.</li>
                <li><strong>Plano:</strong> Es una superficie plana que se extiende infinitamente en todas las direcciones. Tiene dos dimensiones (largo y ancho).</li>
            </ul>

            <h3>2.2. Figuras Geométricas Planas</h3>
            <p>Las <strong>figuras planas</strong> son figuras que tienen dos dimensiones: largo y ancho. Las más comunes son:</p>
            
            <ul>
                <li><strong>Polígono:</strong> Figura cerrada formada por segmentos de línea recta (triángulo, cuadrado, rectángulo, pentágono, etc.)</li>
                <li><strong>Círculo:</strong> Figura plana formada por todos los puntos que están a la misma distancia de un punto central</li>
                <li><strong>Óvalo o Elipse:</strong> Figura plana similar a un círculo pero alargado</li>
            </ul>

            <h3>2.3. Sólidos Geométricos</h3>
            <p>Los <strong>sólidos</strong> son figuras que tienen tres dimensiones: largo, ancho y alto. Algunos ejemplos:</p>
            
            <ul>
                <li><strong>Cubo:</strong> Sólido con 6 caras cuadradas iguales</li>
                <li><strong>Prisma:</strong> Sólido con dos bases paralelas e iguales</li>
                <li><strong>Esfera:</strong> Sólido formado por todos los puntos a igual distancia de un centro</li>
                <li><strong>Cilindro:</strong> Sólido con dos bases circulares paralelas</li>
            </ul>

            <hr>

            <h2>3. Perímetro y Área</h2>
            <p>Dos conceptos fundamentales en geometría son el <strong>perímetro</strong> y el <strong>área</strong>:</p>

            <h3>3.1. Perímetro</h3>
            <p>El <strong>perímetro</strong> es la medida de la longitud del contorno de una figura plana. Se calcula sumando las longitudes de todos los lados de la figura.</p>
            <p><strong>Unidades de medida:</strong> cm, m, km, etc.</p>
            <p><em>Ejemplo:</em> Si un cuadrado tiene lados de 5 cm, su perímetro es: 5 + 5 + 5 + 5 = 20 cm</p>

            <h3>3.2. Área</h3>
            <p>El <strong>área</strong> es la medida de la superficie que ocupa una figura plana. Indica cuánto espacio hay dentro del contorno de la figura.</p>
            <p><strong>Unidades de medida:</strong> cm², m², km², etc. (siempre elevadas al cuadrado)</p>
            <p><em>Ejemplo:</em> Si un cuadrado tiene lados de 5 cm, su área es: 5 × 5 = 25 cm²</p>

            <p><strong>¿Cuál es la diferencia?</strong></p>
            <ul>
                <li><strong>Perímetro:</strong> Mide el "borde" o "contorno" de la figura (una dimensión)</li>
                <li><strong>Área:</strong> Mide el "espacio interior" o "superficie" de la figura (dos dimensiones)</li>
            </ul>

            <hr>

            <h2>4. Figuras Geométricas Planas: Cuadrado y Rectángulo</h2>

            <h3>4.1. Cuadrado</h3>
            <p>Un <strong>cuadrado</strong> es un polígono de cuatro lados iguales y cuatro ángulos rectos (90°).</p>

            <p><strong>Propiedades del cuadrado:</strong></p>
            <ul>
                <li>Todos los lados tienen la misma longitud</li>
                <li>Todos los ángulos son rectos (90°)</li>
                <li>Las diagonales son iguales y se cortan en el centro formando ángulos de 90°</li>
            </ul>

            <p><strong>Fórmulas del cuadrado:</strong></p>
            <ul>
                <li><strong>Perímetro:</strong> P = 4 × lado (o P = lado + lado + lado + lado)</li>
                <li><strong>Área:</strong> A = lado × lado (o A = lado²)</li>
            </ul>

            <p><em>Ejemplo 1:</em> Calcular el perímetro y área de un cuadrado de lado 6 cm</p>
            <ol>
                <li>Perímetro: P = 4 × 6 = 24 cm</li>
                <li>Área: A = 6 × 6 = 36 cm²</li>
            </ol>

            <p><em>Ejemplo 2:</em> Si un cuadrado tiene un perímetro de 20 cm, ¿cuál es la longitud de cada lado?</p>
            <ol>
                <li>Sabemos que P = 4 × lado = 20</li>
                <li>Despejamos: lado = 20 ÷ 4 = 5 cm</li>
            </ol>

            <h3>4.2. Rectángulo</h3>
            <p>Un <strong>rectángulo</strong> es un polígono de cuatro lados con lados opuestos iguales y cuatro ángulos rectos (90°).</p>

            <p><strong>Propiedades del rectángulo:</strong></p>
            <ul>
                <li>Los lados opuestos son iguales</li>
                <li>Todos los ángulos son rectos (90°)</li>
                <li>Las diagonales son iguales</li>
            </ul>

            <p><strong>Fórmulas del rectángulo:</strong></p>
            <ul>
                <li><strong>Perímetro:</strong> P = 2 × (base + altura) o P = base + altura + base + altura</li>
                <li><strong>Área:</strong> A = base × altura</li>
            </ul>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Figura</th>
                        <th>Base</th>
                        <th>Altura</th>
                        <th>Perímetro</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Cuadrado</td>
                        <td>5 cm</td>
                        <td>5 cm</td>
                        <td>20 cm</td>
                        <td>25 cm²</td>
                    </tr>
                    <tr>
                        <td>Rectángulo</td>
                        <td>8 m</td>
                        <td>3 m</td>
                        <td>22 m</td>
                        <td>24 m²</td>
                    </tr>
                    <tr>
                        <td>Rectángulo</td>
                        <td>10 cm</td>
                        <td>4 cm</td>
                        <td>28 cm</td>
                        <td>40 cm²</td>
                    </tr>
                </tbody>
            </table>

            <p><em>Ejemplo 3:</em> Calcular el perímetro y área de un rectángulo de base 8 m y altura 5 m</p>
            <ol>
                <li>Perímetro: P = 2 × (8 + 5) = 2 × 13 = 26 m</li>
                <li>Área: A = 8 × 5 = 40 m²</li>
            </ol>

            <hr>

            <h2>5. Triángulo</h2>
            <p>Un <strong>triángulo</strong> es un polígono de tres lados y tres ángulos. Es una de las figuras más importantes en geometría.</p>

            <h3>5.1. Clasificación de Triángulos</h3>
            <p>Los triángulos se pueden clasificar según sus lados o según sus ángulos:</p>

            <p><strong>Según sus lados:</strong></p>
            <ul>
                <li><strong>Equilátero:</strong> Tiene los tres lados iguales y los tres ángulos iguales (60° cada uno)</li>
                <li><strong>Isósceles:</strong> Tiene dos lados iguales y dos ángulos iguales</li>
                <li><strong>Escaleno:</strong> Tiene los tres lados diferentes y los tres ángulos diferentes</li>
            </ul>

            <p><strong>Según sus ángulos:</strong></p>
            <ul>
                <li><strong>Acutángulo:</strong> Tiene los tres ángulos agudos (menores de 90°)</li>
                <li><strong>Rectángulo:</strong> Tiene un ángulo recto (90°)</li>
                <li><strong>Obtusángulo:</strong> Tiene un ángulo obtuso (mayor de 90°)</li>
            </ul>

            <h3>5.2. Fórmulas del Triángulo</h3>
            <p><strong>Perímetro:</strong> P = lado1 + lado2 + lado3 (suma de los tres lados)</p>
            <p><strong>Área:</strong> A = (base × altura) / 2</p>

            <p><em>Nota importante:</strong> En un triángulo, la altura es la distancia perpendicular desde un vértice hasta el lado opuesto (la base).</em></p>

            <p><em>Ejemplo 1:</em> Calcular el área de un triángulo con base 10 cm y altura 6 cm</p>
            <ol>
                <li>Área: A = (10 × 6) / 2 = 60 / 2 = 30 cm²</li>
            </ol>

            <p><em>Ejemplo 2:</em> Calcular el perímetro de un triángulo equilátero de lado 7 cm</p>
            <ol>
                <li>Perímetro: P = 7 + 7 + 7 = 21 cm</li>
            </ol>

            <p><em>Ejemplo 3:</em> Calcular el área de un triángulo rectángulo cuyos catetos miden 5 cm y 4 cm</p>
            <ol>
                <li>En un triángulo rectángulo, los catetos son la base y la altura</li>
                <li>Área: A = (5 × 4) / 2 = 20 / 2 = 10 cm²</li>
            </ol>

            <hr>

            <h2>6. Círculo</h2>
            <p>Un <strong>círculo</strong> es una figura plana formada por todos los puntos que están a la misma distancia de un punto central llamado <strong>centro</strong>.</p>

            <h3>6.1. Elementos del Círculo</h3>
            <ul>
                <li><strong>Centro:</strong> Punto central del círculo</li>
                <li><strong>Radio (r):</strong> Distancia desde el centro hasta cualquier punto del círculo</li>
                <li><strong>Diámetro (d):</strong> Segmento que pasa por el centro y une dos puntos del círculo. Es igual a 2 veces el radio (d = 2r)</li>
                <li><strong>Circunferencia:</strong> Es el perímetro del círculo, es decir, la longitud del borde</li>
            </ul>

            <h3>6.2. Fórmulas del Círculo</h3>
            <p><strong>Circunferencia (Perímetro):</strong> C = 2 × π × radio (o C = π × diámetro)</p>
            <p><strong>Área:</strong> A = π × radio²</p>

            <p><em>Nota:</strong> π (pi) es una constante aproximada a 3.1416. Para cálculos rápidos, podemos usar π ≈ 3.14</em></p>

            <p><em>Ejemplo 1:</em> Calcular la circunferencia y área de un círculo de radio 5 cm</p>
            <ol>
                <li>Circunferencia: C = 2 × π × 5 = 2 × 3.14 × 5 = 31.4 cm</li>
                <li>Área: A = π × 5² = π × 25 = 3.14 × 25 = 78.5 cm²</li>
            </ol>

            <p><em>Ejemplo 2:</em> Si un círculo tiene un diámetro de 14 cm, ¿cuál es su radio y su área?</p>
            <ol>
                <li>Radio: r = diámetro / 2 = 14 / 2 = 7 cm</li>
                <li>Área: A = π × 7² = π × 49 = 3.14 × 49 = 153.86 cm²</li>
            </ol>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Radio</th>
                        <th>Diámetro</th>
                        <th>Circunferencia</th>
                        <th>Área</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>3 cm</td>
                        <td>6 cm</td>
                        <td>18.84 cm</td>
                        <td>28.26 cm²</td>
                    </tr>
                    <tr>
                        <td>5 cm</td>
                        <td>10 cm</td>
                        <td>31.4 cm</td>
                        <td>78.5 cm²</td>
                    </tr>
                    <tr>
                        <td>7 cm</td>
                        <td>14 cm</td>
                        <td>43.96 cm</td>
                        <td>153.86 cm²</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h2>7. Polígonos Regulares</h2>
            <p>Un <strong>polígono regular</strong> es una figura plana cerrada formada por segmentos de línea recta, donde todos los lados son iguales y todos los ángulos son iguales.</p>

            <h3>7.1. Polígonos Más Comunes</h3>
            <ul>
                <li><strong>Triángulo:</strong> 3 lados (triángulo equilátero)</li>
                <li><strong>Cuadrado:</strong> 4 lados iguales</li>
                <li><strong>Pentágono:</strong> 5 lados iguales</li>
                <li><strong>Hexágono:</strong> 6 lados iguales</li>
                <li><strong>Heptágono:</strong> 7 lados iguales</li>
                <li><strong>Octágono:</strong> 8 lados iguales</li>
            </ul>

            <h3>7.2. Fórmulas Generales</h3>
            <p><strong>Perímetro de un polígono regular:</strong> P = número de lados × longitud del lado</p>
            <p><strong>Área de un polígono regular:</strong> A = (perímetro × apotema) / 2</p>
            <p><em>Nota:</strong> La apotema es la distancia desde el centro del polígono hasta el punto medio de uno de sus lados.</em></p>

            <p><em>Ejemplo:</em> Calcular el perímetro de un hexágono regular de lado 4 cm</p>
            <ol>
                <li>Perímetro: P = 6 × 4 = 24 cm</li>
            </ol>

            <hr>

            <h2>8. Volumen de Sólidos Básicos</h2>
            <p>El <strong>volumen</strong> es la medida del espacio que ocupa un sólido. Se mide en unidades cúbicas (cm³, m³, etc.).</p>

            <h3>8.1. Cubo</h3>
            <p>Un <strong>cubo</strong> es un sólido con 6 caras cuadradas iguales.</p>
            <p><strong>Volumen del cubo:</strong> V = arista × arista × arista (o V = arista³)</p>
            <p><em>Ejemplo:</em> Calcular el volumen de un cubo de arista 3 cm</p>
            <p>V = 3 × 3 × 3 = 27 cm³</p>

            <h3>8.2. Prisma Rectangular (Caja)</h3>
            <p>Un <strong>prisma rectangular</strong> es un sólido con 6 caras rectangulares.</p>
            <p><strong>Volumen del prisma rectangular:</strong> V = largo × ancho × alto</p>
            <p><em>Ejemplo:</em> Calcular el volumen de una caja de largo 5 cm, ancho 3 cm y alto 4 cm</p>
            <p>V = 5 × 3 × 4 = 60 cm³</p>

            <h3>8.3. Cilindro</h3>
            <p>Un <strong>cilindro</strong> es un sólido con dos bases circulares paralelas.</p>
            <p><strong>Volumen del cilindro:</strong> V = π × radio² × altura</p>
            <p><em>Ejemplo:</em> Calcular el volumen de un cilindro de radio 4 cm y altura 10 cm</p>
            <p>V = π × 4² × 10 = π × 16 × 10 = 3.14 × 160 = 502.4 cm³</p>

            <hr>

            <h2>9. Aplicaciones Prácticas</h2>
            <p>La geometría se aplica constantemente en situaciones de la vida real. Veamos algunos ejemplos:</p>

            <h3>9.1. Problema de Pintura</h3>
            <p><strong>Problema:</strong> Se quiere pintar una pared rectangular de 4 m de largo y 3 m de alto. Si un litro de pintura cubre 6 m², ¿cuántos litros de pintura se necesitan?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Calculamos el área de la pared: A = 4 × 3 = 12 m²</li>
                <li>Dividimos entre la cobertura por litro: 12 ÷ 6 = 2 litros</li>
                <li>Respuesta: Se necesitan 2 litros de pintura</li>
            </ol>

            <h3>9.2. Problema de Cercado</h3>
            <p><strong>Problema:</strong> Se quiere cercar un terreno rectangular de 20 m de largo y 15 m de ancho. Si el metro de cerca cuesta $5, ¿cuánto cuesta cercar todo el terreno?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Calculamos el perímetro: P = 2 × (20 + 15) = 2 × 35 = 70 m</li>
                <li>Multiplicamos por el costo por metro: 70 × 5 = $350</li>
                <li>Respuesta: Cuesta $350 cercar el terreno</li>
            </ol>

            <h3>9.3. Problema de Área de Jardín</h3>
            <p><strong>Problema:</strong> Un jardín tiene forma circular con un radio de 7 m. ¿Cuál es el área del jardín?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Calculamos el área: A = π × 7² = π × 49 = 3.14 × 49 = 153.86 m²</li>
                <li>Respuesta: El área del jardín es aproximadamente 153.86 m²</li>
            </ol>

            <h3>9.4. Problema de Volumen</h3>
            <p><strong>Problema:</strong> Una piscina tiene forma de prisma rectangular de 10 m de largo, 5 m de ancho y 2 m de profundidad. ¿Cuál es el volumen de la piscina?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Calculamos el volumen: V = 10 × 5 × 2 = 100 m³</li>
                <li>Respuesta: El volumen de la piscina es 100 m³</li>
            </ol>

            <hr>

            <!-- 2. AUTOR -->
            <h2>10. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Prof. Luis Ramírez González</strong><br>
                Profesor de Matemáticas y Geometría con más de 18 años de experiencia en educación secundaria. Especialista en enseñanza de geometría práctica y aplicada. Autor de materiales didácticos sobre geometría básica para estudiantes de secundaria.</p>
            </div>

            <hr>

            <!-- 3. VIDEO DE YOUTUBE -->
            <h2>11. Video Recomendado</h2>
            <p>Este video te ayudará a entender los conceptos básicos de geometría de manera visual. Observa cómo se calculan perímetros, áreas y volúmenes de diferentes figuras y sólidos.</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/RWwJ7NGpdQQ?rel=0" title="Geometría Básica - Perímetros y Áreas" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Geometría Básica - Perímetros y Áreas"</em></p>

            <hr>

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
