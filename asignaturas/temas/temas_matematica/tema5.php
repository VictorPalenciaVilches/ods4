<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema5.php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema5'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    1 => ['q' => '¿Qué es la trigonometría?', 'options' => ['La rama de las matemáticas que estudia solo números','La rama que estudia las relaciones entre los lados y ángulos de los triángulos','La rama que estudia solo operaciones de suma','La rama que trabaja únicamente con fracciones'], 'answer' => 1],
    2 => ['q' => 'En un triángulo rectángulo, el lado opuesto al ángulo recto se llama:', 'options' => ['Cateto','Hipotenusa','Base','Altura'], 'answer' => 1],
    3 => ['q' => '¿Cuál es la función trigonométrica que relaciona el cateto opuesto con la hipotenusa?', 'options' => ['Coseno','Tangente','Seno','Cotangente'], 'answer' => 2],
    4 => ['q' => 'Si en un triángulo rectángulo el seno de un ángulo es 0.5, ¿cuál es el valor del ángulo?', 'options' => ['30°','45°','60°','90°'], 'answer' => 0],
    5 => ['q' => 'El valor de cos(45°) es:', 'options' => ['0.5','0.707','1','0.866'], 'answer' => 1],
    6 => ['q' => '¿Cuál es la relación entre seno y coseno de un ángulo?', 'options' => ['sen²(θ) + cos²(θ) = 1','sen(θ) = cos(θ)','sen(θ) × cos(θ) = 1','sen(θ) - cos(θ) = 0'], 'answer' => 0],
    7 => ['q' => 'En un triángulo rectángulo, si un cateto mide 3 cm y la hipotenusa mide 5 cm, ¿cuál es el seno del ángulo?', 'options' => ['3/5','4/5','5/3','3/4'], 'answer' => 0],
    8 => ['q' => '¿Qué función trigonométrica se define como cateto opuesto dividido entre cateto adyacente?', 'options' => ['Seno','Coseno','Tangente','Secante'], 'answer' => 2],
    9 => ['q' => 'El valor de tan(30°) es aproximadamente:', 'options' => ['0.577','1','0.707','0.866'], 'answer' => 0],
    10 => ['q' => 'Si en un triángulo rectángulo el ángulo es de 60° y el cateto adyacente mide 4 cm, ¿cuánto mide la hipotenusa?', 'options' => ['8 cm','4√3 cm','4 cm','2 cm'], 'answer' => 0],
];

// Sanitizar el nombre del usuario para evitar ataques XSS
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 5 - Trigonometría</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 5: Trigonometría</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! La trigonometría es una herramienta poderosa que conecta los ángulos con las longitudes de los lados. Aprenderás a resolver problemas usando relaciones trigonométricas fundamentales.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué es la Trigonometría?</h2>
            <p>La <strong>trigonometría</strong> es una rama de las matemáticas que estudia las relaciones entre los ángulos y los lados de los triángulos. La palabra "trigonometría" proviene del griego "trigonon" (triángulo) y "metron" (medida), es decir, "medida de triángulos".</p>
            
            <p><strong>¿Por qué es importante la trigonometría?</strong></p>
            <ul>
                <li>Nos permite calcular <strong>distancias y alturas inaccesibles</strong> (edificios, montañas, árboles)</li>
                <li>Es fundamental en <strong>navegación, arquitectura, ingeniería y física</strong></li>
                <li>Se aplica en <strong>astronomía, cartografía y diseño</strong></li>
                <li>Permite resolver <strong>problemas de la vida real</strong> que involucran ángulos y distancias</li>
                <li>Es la base para entender <strong>ondas, oscilaciones y movimientos periódicos</strong></li>
            </ul>

            <p><strong>Aplicaciones de la trigonometría:</strong></p>
            <ul>
                <li>Calcular la altura de un edificio sin medirlo directamente</li>
                <li>Determinar la distancia entre dos puntos usando ángulos</li>
                <li>Navegación marítima y aérea usando coordenadas</li>
                <li>Diseño de estructuras y construcción</li>
                <li>Análisis de ondas y señales en tecnología</li>
            </ul>

            <hr>

            <h2>2. Triángulo Rectángulo</h2>
            <p>La trigonometría básica se enfoca principalmente en el <strong>triángulo rectángulo</strong>, que es un triángulo con un ángulo recto (90°).</p>

            <h3>2.1. Partes del Triángulo Rectángulo</h3>
            <p>En un triángulo rectángulo, identificamos tres partes importantes:</p>
            
            <ul>
                <li><strong>Hipotenusa:</strong> Es el lado más largo del triángulo, opuesto al ángulo recto. Se representa generalmente con la letra <strong>c</strong> o <strong>h</strong>.</li>
                <li><strong>Cateto opuesto:</strong> Es el lado que está frente al ángulo que estamos estudiando. Se representa generalmente con la letra <strong>a</strong> o <strong>o</strong>.</li>
                <li><strong>Cateto adyacente:</strong> Es el lado que forma parte del ángulo que estamos estudiando (además de la hipotenusa). Se representa generalmente con la letra <strong>b</strong> o <strong>a</strong>.</li>
            </ul>

            <p><strong>Nota importante:</strong> El cateto opuesto y el cateto adyacente dependen del ángulo que estemos considerando. Si cambiamos el ángulo de referencia, estos lados también cambian.</p>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Elemento</th>
                        <th>Descripción</th>
                        <th>Símbolo común</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Hipotenusa</td>
                        <td>Lado opuesto al ángulo recto (el más largo)</td>
                        <td>c o h</td>
                    </tr>
                    <tr>
                        <td>Cateto opuesto</td>
                        <td>Lado frente al ángulo estudiado</td>
                        <td>a o o</td>
                    </tr>
                    <tr>
                        <td>Cateto adyacente</td>
                        <td>Lado que forma parte del ángulo estudiado</td>
                        <td>b o a</td>
                    </tr>
                </tbody>
            </table>

            <h3>2.2. Teorema de Pitágoras</h3>
            <p>Antes de estudiar trigonometría, es importante recordar el <strong>Teorema de Pitágoras</strong>, que relaciona los lados de un triángulo rectángulo:</p>
            <p><strong>Fórmula:</strong> a² + b² = c²</p>
            <p>Donde:</p>
            <ul>
                <li><strong>a</strong> y <strong>b</strong> son los catetos</li>
                <li><strong>c</strong> es la hipotenusa</li>
            </ul>

            <p><em>Ejemplo:</em> Si los catetos miden 3 cm y 4 cm, ¿cuánto mide la hipotenusa?</p>
            <ol>
                <li>Aplicamos el teorema: 3² + 4² = c²</li>
                <li>Calculamos: 9 + 16 = 25 = c²</li>
                <li>Despejamos c: c = √25 = 5 cm</li>
            </ol>

            <hr>

            <h2>3. Funciones Trigonométricas Básicas</h2>
            <p>Las <strong>funciones trigonométricas</strong> son relaciones entre los lados de un triángulo rectángulo y un ángulo. Las tres funciones básicas son:</p>

            <h3>3.1. Seno (sin)</h3>
            <p>El <strong>seno</strong> de un ángulo es la razón entre el cateto opuesto y la hipotenusa.</p>
            <p><strong>Fórmula:</strong> sen(θ) = cateto opuesto / hipotenusa</p>
            <p><strong>Símbolo:</strong> sen(θ) o sin(θ)</p>

            <p><em>Ejemplo:</em> En un triángulo rectángulo, si el cateto opuesto mide 3 cm y la hipotenusa mide 5 cm, entonces:</p>
            <p>sen(θ) = 3 / 5 = 0.6</p>

            <h3>3.2. Coseno (cos)</h3>
            <p>El <strong>coseno</strong> de un ángulo es la razón entre el cateto adyacente y la hipotenusa.</p>
            <p><strong>Fórmula:</strong> cos(θ) = cateto adyacente / hipotenusa</p>
            <p><strong>Símbolo:</strong> cos(θ)</p>

            <p><em>Ejemplo:</em> En un triángulo rectángulo, si el cateto adyacente mide 4 cm y la hipotenusa mide 5 cm, entonces:</p>
            <p>cos(θ) = 4 / 5 = 0.8</p>

            <h3>3.3. Tangente (tan)</h3>
            <p>La <strong>tangente</strong> de un ángulo es la razón entre el cateto opuesto y el cateto adyacente.</p>
            <p><strong>Fórmula:</strong> tan(θ) = cateto opuesto / cateto adyacente</p>
            <p><strong>Símbolo:</strong> tan(θ) o tg(θ)</p>

            <p><em>Ejemplo:</em> En un triángulo rectángulo, si el cateto opuesto mide 3 cm y el cateto adyacente mide 4 cm, entonces:</p>
            <p>tan(θ) = 3 / 4 = 0.75</p>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Función</th>
                        <th>Fórmula</th>
                        <th>Relación</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Seno</td>
                        <td>sen(θ) = opuesto / hipotenusa</td>
                        <td>o/h</td>
                    </tr>
                    <tr>
                        <td>Coseno</td>
                        <td>cos(θ) = adyacente / hipotenusa</td>
                        <td>a/h</td>
                    </tr>
                    <tr>
                        <td>Tangente</td>
                        <td>tan(θ) = opuesto / adyacente</td>
                        <td>o/a</td>
                    </tr>
                </tbody>
            </table>

            <p><strong>Regla mnemotécnica:</strong> "SOH CAH TOA"</p>
            <ul>
                <li><strong>S</strong>OH: <strong>S</strong>eno = <strong>O</strong>puesto / <strong>H</strong>ipotenusa</li>
                <li><strong>C</strong>AH: <strong>C</strong>oseno = <strong>A</strong>dyacente / <strong>H</strong>ipotenusa</li>
                <li><strong>T</strong>OA: <strong>T</strong>angente = <strong>O</strong>puesto / <strong>A</strong>dyacente</li>
            </ul>

            <hr>

            <h2>4. Valores Trigonométricos de Ángulos Especiales</h2>
            <p>Existen algunos ángulos cuyos valores trigonométricos son exactos y muy útiles. Los más importantes son 30°, 45° y 60°.</p>

            <h3>4.1. Ángulo de 30°</h3>
            <p>Para un ángulo de 30°:</p>
            <ul>
                <li>sen(30°) = 1/2 = 0.5</li>
                <li>cos(30°) = √3/2 ≈ 0.866</li>
                <li>tan(30°) = 1/√3 ≈ 0.577</li>
            </ul>

            <h3>4.2. Ángulo de 45°</h3>
            <p>Para un ángulo de 45°:</p>
            <ul>
                <li>sen(45°) = √2/2 ≈ 0.707</li>
                <li>cos(45°) = √2/2 ≈ 0.707</li>
                <li>tan(45°) = 1</li>
            </ul>

            <h3>4.3. Ángulo de 60°</h3>
            <p>Para un ángulo de 60°:</p>
            <ul>
                <li>sen(60°) = √3/2 ≈ 0.866</li>
                <li>cos(60°) = 1/2 = 0.5</li>
                <li>tan(60°) = √3 ≈ 1.732</li>
            </ul>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Ángulo</th>
                        <th>Seno</th>
                        <th>Coseno</th>
                        <th>Tangente</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>30°</td>
                        <td>1/2 = 0.5</td>
                        <td>√3/2 ≈ 0.866</td>
                        <td>1/√3 ≈ 0.577</td>
                    </tr>
                    <tr>
                        <td>45°</td>
                        <td>√2/2 ≈ 0.707</td>
                        <td>√2/2 ≈ 0.707</td>
                        <td>1</td>
                    </tr>
                    <tr>
                        <td>60°</td>
                        <td>√3/2 ≈ 0.866</td>
                        <td>1/2 = 0.5</td>
                        <td>√3 ≈ 1.732</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h2>5. Identidades Trigonométricas Fundamentales</h2>
            <p>Las <strong>identidades trigonométricas</strong> son igualdades que se cumplen para cualquier valor del ángulo. La más importante es:</p>

            <h3>5.1. Identidad Pitagórica</h3>
            <p><strong>sen²(θ) + cos²(θ) = 1</strong></p>
            <p>Esta identidad relaciona el seno y el coseno de cualquier ángulo. Es muy útil para encontrar el valor de una función cuando conocemos la otra.</p>

            <p><em>Ejemplo:</em> Si sen(θ) = 0.6, encontrar cos(θ)</p>
            <ol>
                <li>Usamos la identidad: sen²(θ) + cos²(θ) = 1</li>
                <li>Sustituimos: (0.6)² + cos²(θ) = 1</li>
                <li>Calculamos: 0.36 + cos²(θ) = 1</li>
                <li>Despejamos: cos²(θ) = 1 - 0.36 = 0.64</li>
                <li>Obtenemos: cos(θ) = √0.64 = 0.8</li>
            </ol>

            <h3>5.2. Relación entre Tangente, Seno y Coseno</h3>
            <p>La tangente también se puede expresar en términos de seno y coseno:</p>
            <p><strong>tan(θ) = sen(θ) / cos(θ)</strong></p>

            <hr>

            <h2>6. Resolución de Triángulos Rectángulos</h2>
            <p>Usando las funciones trigonométricas, podemos encontrar medidas desconocidas en un triángulo rectángulo cuando conocemos:</p>
            <ul>
                <li>Un ángulo y un lado, o</li>
                <li>Dos lados</li>
            </ul>

            <h3>6.1. Caso 1: Conocemos un ángulo y un lado</h3>
            <p><em>Ejemplo 1:</em> En un triángulo rectángulo, el ángulo es de 30° y el cateto opuesto mide 5 cm. Calcular la hipotenusa.</p>
            <ol>
                <li>Usamos la función seno: sen(30°) = cateto opuesto / hipotenusa</li>
                <li>Sustituimos: 0.5 = 5 / hipotenusa</li>
                <li>Despejamos: hipotenusa = 5 / 0.5 = 10 cm</li>
            </ol>

            <p><em>Ejemplo 2:</em> En un triángulo rectángulo, el ángulo es de 45° y el cateto adyacente mide 8 cm. Calcular el cateto opuesto.</p>
            <ol>
                <li>Usamos la función tangente: tan(45°) = cateto opuesto / cateto adyacente</li>
                <li>Sustituimos: 1 = cateto opuesto / 8</li>
                <li>Despejamos: cateto opuesto = 1 × 8 = 8 cm</li>
            </ol>

            <h3>6.2. Caso 2: Conocemos dos lados</h3>
            <p><em>Ejemplo 3:</em> En un triángulo rectángulo, el cateto opuesto mide 6 cm y la hipotenusa mide 10 cm. Calcular el ángulo.</p>
            <ol>
                <li>Usamos la función seno: sen(θ) = 6 / 10 = 0.6</li>
                <li>Buscamos el ángulo cuyo seno es 0.6: θ ≈ 37°</li>
            </ol>

            <p><em>Ejemplo 4:</em> En un triángulo rectángulo, los catetos miden 4 cm y 3 cm. Calcular los ángulos.</p>
            <ol>
                <li>Primero calculamos la hipotenusa usando Pitágoras: h = √(4² + 3²) = √(16 + 9) = √25 = 5 cm</li>
                <li>Para el primer ángulo: sen(θ₁) = 3/5 = 0.6, entonces θ₁ ≈ 37°</li>
                <li>Para el segundo ángulo: sen(θ₂) = 4/5 = 0.8, entonces θ₂ ≈ 53°</li>
                <li>Verificamos: 37° + 53° = 90° ✓ (correcto para un triángulo rectángulo)</li>
            </ol>

            <hr>

            <h2>7. Aplicaciones Prácticas</h2>
            <p>La trigonometría tiene muchas aplicaciones en problemas de la vida real. Veamos algunos ejemplos:</p>

            <h3>7.1. Problema de Altura</h3>
            <p><strong>Problema:</strong> Una persona observa la parte superior de un edificio con un ángulo de elevación de 45°. Si está a 30 metros del edificio, ¿cuál es la altura del edificio?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Identificamos: ángulo = 45°, cateto adyacente = 30 m, cateto opuesto = altura</li>
                <li>Usamos tangente: tan(45°) = altura / 30</li>
                <li>Sustituimos: 1 = altura / 30</li>
                <li>Despejamos: altura = 30 m</li>
                <li>Respuesta: El edificio mide 30 metros de altura</li>
            </ol>

            <h3>7.2. Problema de Distancia</h3>
            <p><strong>Problema:</strong> Un avión vuela a una altura de 2000 metros. Si el ángulo de depresión hacia un punto en el suelo es de 30°, ¿a qué distancia horizontal está el punto?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Identificamos: ángulo = 30°, cateto opuesto = 2000 m, cateto adyacente = distancia</li>
                <li>Usamos tangente: tan(30°) = 2000 / distancia</li>
                <li>Sustituimos: 0.577 ≈ 2000 / distancia</li>
                <li>Despejamos: distancia ≈ 2000 / 0.577 ≈ 3464 m</li>
                <li>Respuesta: El punto está aproximadamente a 3464 metros de distancia horizontal</li>
            </ol>

            <h3>7.3. Problema de Sombra</h3>
            <p><strong>Problema:</strong> Un poste de 6 metros proyecta una sombra de 4 metros. ¿Cuál es el ángulo de elevación del sol?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Identificamos: cateto opuesto = 6 m, cateto adyacente = 4 m</li>
                <li>Usamos tangente: tan(θ) = 6 / 4 = 1.5</li>
                <li>Buscamos el ángulo: θ ≈ 56°</li>
                <li>Respuesta: El ángulo de elevación del sol es aproximadamente 56°</li>
            </ol>

            <hr>

            <h2>8. Uso de Calculadora para Funciones Trigonométricas</h2>
            <p>Para ángulos que no son especiales (30°, 45°, 60°), necesitamos usar una calculadora científica.</p>

            <h3>8.1. Encontrar el Valor de una Función</h3>
            <p>Para encontrar el valor de sen(37°):</p>
            <ol>
                <li>Ingresa el ángulo: 37</li>
                <li>Presiona la tecla "sin"</li>
                <li>Resultado: sen(37°) ≈ 0.6018</li>
            </ol>

            <h3>8.2. Encontrar el Ángulo Dado el Valor</h3>
            <p>Para encontrar el ángulo cuyo seno es 0.6:</p>
            <ol>
                <li>Ingresa el valor: 0.6</li>
                <li>Presiona "2nd" o "Shift" y luego "sin" (función inversa)</li>
                <li>Resultado: θ ≈ 37°</li>
            </ol>

            <p><strong>Nota:</strong> En las calculadoras, la función inversa del seno se llama "arcsen" o "sin⁻¹", la del coseno es "arccos" o "cos⁻¹", y la de la tangente es "arctan" o "tan⁻¹".</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Dra. María González López</strong><br>
                Doctora en Matemáticas y Física, especialista en trigonometría aplicada. Profesora universitaria con más de 22 años de experiencia enseñando trigonometría y cálculo. Investigadora en aplicaciones de trigonometría en ingeniería y arquitectura.</p>
            </div>

            <hr>

            <!-- 3. VIDEO DE YOUTUBE -->
            <h2>10. Video Recomendado</h2>
            <p>Este video te ayudará a entender los conceptos básicos de trigonometría de manera visual. Observa cómo se definen las funciones trigonométricas y cómo se aplican para resolver problemas de triángulos rectángulos.</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/8zVW0U2jn8U?rel=0" title="Trigonometría Básica - Funciones Trigonométricas" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Trigonometría Básica - Funciones Trigonométricas"</em></p>

            <hr>

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
