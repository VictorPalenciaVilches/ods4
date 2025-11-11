<?php
// Ubicación: /asignaturas/temas/temas_matematica/tema3.php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

// 1. DEFINICIÓN DE DATOS DEL TEMA Y CUESTIONARIO
$topic_id = 'tema3'; 
// Las preguntas deben estar definidas aquí para generar el formulario en el HTML
$questions = [
    1 => ['q' => '¿Qué es una ecuación lineal?', 'options' => ['Una expresión algebraica sin signo de igualdad','Una igualdad matemática donde la variable tiene exponente 1','Una operación de multiplicación','Un número entero'], 'answer' => 1],
    2 => ['q' => 'En la ecuación 5x + 3 = 18, ¿cuál es el miembro izquierdo?', 'options' => ['18','5x','5x + 3','3'], 'answer' => 2],
    3 => ['q' => 'Para resolver 3x - 7 = 14, el primer paso es:', 'options' => ['Dividir entre 3','Sumar 7 en ambos miembros','Restar 7 en ambos miembros','Multiplicar por 3'], 'answer' => 1],
    4 => ['q' => 'La solución de la ecuación 2x + 5 = 13 es:', 'options' => ['x = 9','x = 4','x = 8','x = 18'], 'answer' => 1],
    5 => ['q' => 'Al resolver 4(x - 3) = 20, primero debemos:', 'options' => ['Dividir entre 4','Distribuir el 4','Sumar 3','Restar 20'], 'answer' => 1],
    6 => ['q' => 'Si tenemos la ecuación (x/3) + 2 = 7, para despejar x primero debemos:', 'options' => ['Multiplicar por 3','Restar 2 en ambos miembros','Sumar 2','Dividir entre 3'], 'answer' => 1],
    7 => ['q' => 'La verificación de una solución consiste en:', 'options' => ['Multiplicar ambos miembros','Reemplazar el valor encontrado en la ecuación original','Sumar los coeficientes','Dividir entre la variable'], 'answer' => 1],
    8 => ['q' => 'Si un número es el triple de otro y su suma es 24, ¿cuál es la ecuación correcta?', 'options' => ['x + 3x = 24','x - 3x = 24','x · 3x = 24','x ÷ 3x = 24'], 'answer' => 0],
    9 => ['q' => 'En la ecuación 0.5x + 1.5 = 4, el valor de x es:', 'options' => ['x = 5','x = 2','x = 11','x = 3'], 'answer' => 0],
    10 => ['q' => '¿Cuál es la propiedad de igualdad que permite sumar el mismo número en ambos miembros?', 'options' => ['Propiedad conmutativa','Propiedad de igualdad de la suma','Propiedad distributiva','Propiedad asociativa'], 'answer' => 1],
];

// Sanitizar el nombre del usuario para evitar ataques XSS
$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 3 - Ecuaciones Lineales</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_matematica/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_matematica/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
    
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../matematicas.php" class="back-btn">← Volver a Matemáticas</a>
            <h1>Tema 3: Ecuaciones Lineales</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! Las ecuaciones lineales son herramientas poderosas que nos permiten resolver problemas reales. Aprenderás a despejar incógnitas y encontrar soluciones de manera sistemática.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. ¿Qué son las Ecuaciones Lineales?</h2>
            <p>Una <strong>ecuación lineal</strong> es una igualdad matemática que contiene una o más variables y donde la variable tiene exponente 1 (por eso se llama "lineal"). Estas ecuaciones son fundamentales en álgebra porque nos permiten encontrar valores desconocidos resolviendo problemas de manera sistemática.</p>
            
            <p><strong>¿Por qué son importantes las ecuaciones lineales?</strong></p>
            <ul>
                <li>Nos permiten resolver <strong>problemas de la vida cotidiana</strong> (costos, edades, distancias)</li>
                <li>Son la base para entender <strong>matemáticas más avanzadas</strong></li>
                <li>Se aplican en <strong>ciencias, ingeniería, economía y negocios</strong></li>
                <li>Desarrollan el <strong>pensamiento lógico y analítico</strong></li>
            </ul>

            <p><strong>Forma general de una ecuación lineal:</strong></p>
            <p>Una ecuación lineal tiene la forma: <strong>ax + b = c</strong>, donde:</p>
            <ul>
                <li><strong>a</strong> es el coeficiente de la variable (número que multiplica a x)</li>
                <li><strong>b</strong> es el término independiente (número que se suma o resta)</li>
                <li><strong>c</strong> es el término constante del otro lado de la igualdad</li>
                <li><strong>x</strong> es la variable o incógnita que debemos encontrar</li>
            </ul>

            <hr>

            <h2>2. Partes de una Ecuación Lineal</h2>
            <p>Para entender y resolver ecuaciones, es importante conocer sus partes:</p>

            <h3>2.1. Miembros de una Ecuación</h3>
            <p>Toda ecuación tiene dos <strong>miembros</strong> separados por el signo de igualdad (=):</p>
            <ul>
                <li><strong>Miembro izquierdo:</strong> Todo lo que está a la izquierda del signo =</li>
                <li><strong>Miembro derecho:</strong> Todo lo que está a la derecha del signo =</li>
            </ul>

            <p><em>Ejemplo:</em> En la ecuación <strong>3x + 5 = 14</strong></p>
            <ul>
                <li>Miembro izquierdo: <strong>3x + 5</strong></li>
                <li>Miembro derecho: <strong>14</strong></li>
                <li>Signo de igualdad: <strong>=</strong></li>
            </ul>

            <h3>2.2. Términos de una Ecuación</h3>
            <p>Los <strong>términos</strong> son las partes que se suman o restan en cada miembro. Pueden ser:</p>
            <ul>
                <li><strong>Términos con variable:</strong> Contienen la incógnita (ej: 3x, -2y, 5a)</li>
                <li><strong>Términos independientes o constantes:</strong> Son números sin variable (ej: 5, -7, 12)</li>
            </ul>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Ecuación</th>
                        <th>Miembro Izquierdo</th>
                        <th>Miembro Derecho</th>
                        <th>Variable</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>2x + 3 = 11</td>
                        <td>2x + 3</td>
                        <td>11</td>
                        <td>x</td>
                    </tr>
                    <tr>
                        <td>5y - 7 = 18</td>
                        <td>5y - 7</td>
                        <td>18</td>
                        <td>y</td>
                    </tr>
                    <tr>
                        <td>4a = 20</td>
                        <td>4a</td>
                        <td>20</td>
                        <td>a</td>
                    </tr>
                    <tr>
                        <td>3x - 2 = x + 8</td>
                        <td>3x - 2</td>
                        <td>x + 8</td>
                        <td>x</td>
                    </tr>
                </tbody>
            </table>

            <hr>

            <h2>3. Propiedades de Igualdad</h2>
            <p>Las <strong>propiedades de igualdad</strong> son reglas fundamentales que nos permiten resolver ecuaciones manteniendo la igualdad. Estas propiedades garantizan que si hacemos lo mismo en ambos miembros, la igualdad se mantiene.</p>

            <h3>3.1. Propiedad de Igualdad de la Suma</h3>
            <p>Si sumamos el mismo número (o expresión) en ambos miembros de una ecuación, la igualdad se mantiene.</p>
            <p><strong>Ejemplo:</strong> Si 2x = 8, entonces 2x + 3 = 8 + 3</p>
            <p><em>En palabras:</em> Si sumamos 3 en el miembro izquierdo, también debemos sumar 3 en el miembro derecho.</p>

            <h3>3.2. Propiedad de Igualdad de la Resta</h3>
            <p>Si restamos el mismo número (o expresión) en ambos miembros de una ecuación, la igualdad se mantiene.</p>
            <p><strong>Ejemplo:</strong> Si 5x + 7 = 22, entonces 5x + 7 - 7 = 22 - 7</p>
            <p><em>En palabras:</em> Si restamos 7 en el miembro izquierdo, también debemos restar 7 en el miembro derecho.</p>

            <h3>3.3. Propiedad de Igualdad de la Multiplicación</h3>
            <p>Si multiplicamos ambos miembros de una ecuación por el mismo número (diferente de cero), la igualdad se mantiene.</p>
            <p><strong>Ejemplo:</strong> Si x/3 = 5, entonces (x/3) × 3 = 5 × 3</p>
            <p><em>En palabras:</em> Si multiplicamos por 3 en el miembro izquierdo, también debemos multiplicar por 3 en el miembro derecho.</p>

            <h3>3.4. Propiedad de Igualdad de la División</h3>
            <p>Si dividimos ambos miembros de una ecuación por el mismo número (diferente de cero), la igualdad se mantiene.</p>
            <p><strong>Ejemplo:</strong> Si 4x = 20, entonces 4x ÷ 4 = 20 ÷ 4</p>
            <p><em>En palabras:</em> Si dividimos entre 4 en el miembro izquierdo, también debemos dividir entre 4 en el miembro derecho.</p>

            <p><strong>Regla práctica:</strong> "Lo que haces en un miembro, debes hacerlo en el otro para mantener la igualdad."</p>

            <hr>

            <h2>4. Método de Resolución Paso a Paso</h2>
            <p>Para resolver una ecuación lineal, seguimos un proceso sistemático. El objetivo es <strong>despejar la variable</strong>, es decir, dejarla sola en un miembro de la ecuación.</p>

            <h3>4.1. Pasos para Resolver Ecuaciones Lineales</h3>
            <ol>
                <li><strong>Simplificar ambos miembros:</strong> Si hay términos semejantes, combinarlos</li>
                <li><strong>Agrupar términos con variable:</strong> Mover todos los términos con variable a un miembro</li>
                <li><strong>Agrupar términos constantes:</strong> Mover todos los números al otro miembro</li>
                <li><strong>Despejar la variable:</strong> Realizar la operación inversa para aislar la variable</li>
                <li><strong>Verificar:</strong> Reemplazar la solución en la ecuación original para comprobar</li>
            </ol>

            <h3>4.2. Ecuaciones Simples (Una Operación)</h3>
            <p><em>Ejemplo 1:</em> Resolver <strong>x + 5 = 12</strong></p>
            <ol>
                <li>La variable está sumando, entonces restamos 5 en ambos miembros: x + 5 - 5 = 12 - 5</li>
                <li>Simplificamos: x = 7</li>
                <li><strong>Solución: x = 7</strong></li>
            </ol>
            <p><em>Verificación:</em> 7 + 5 = 12 ✓</p>

            <p><em>Ejemplo 2:</em> Resolver <strong>3x = 18</strong></p>
            <ol>
                <li>La variable está multiplicando por 3, entonces dividimos entre 3 en ambos miembros: 3x ÷ 3 = 18 ÷ 3</li>
                <li>Simplificamos: x = 6</li>
                <li><strong>Solución: x = 6</strong></li>
            </ol>
            <p><em>Verificación:</em> 3(6) = 18 ✓</p>

            <h3>4.3. Ecuaciones con Dos Operaciones</h3>
            <p><em>Ejemplo 3:</em> Resolver <strong>2x + 3 = 11</strong></p>
            <ol>
                <li>Primero, eliminamos el término independiente (+3) restando 3: 2x + 3 - 3 = 11 - 3</li>
                <li>Simplificamos: 2x = 8</li>
                <li>Ahora, despejamos x dividiendo entre 2: 2x ÷ 2 = 8 ÷ 2</li>
                <li><strong>Solución: x = 4</strong></li>
            </ol>
            <p><em>Verificación:</em> 2(4) + 3 = 8 + 3 = 11 ✓</p>

            <p><em>Ejemplo 4:</em> Resolver <strong>5x - 7 = 18</strong></p>
            <ol>
                <li>Primero, eliminamos el término independiente (-7) sumando 7: 5x - 7 + 7 = 18 + 7</li>
                <li>Simplificamos: 5x = 25</li>
                <li>Ahora, despejamos x dividiendo entre 5: 5x ÷ 5 = 25 ÷ 5</li>
                <li><strong>Solución: x = 5</strong></li>
            </ol>
            <p><em>Verificación:</em> 5(5) - 7 = 25 - 7 = 18 ✓</p>

            <h3>4.4. Ecuaciones con Variable en Ambos Miembros</h3>
            <p><em>Ejemplo 5:</em> Resolver <strong>3x - 2 = x + 8</strong></p>
            <ol>
                <li>Agrupamos términos con variable: restamos x en ambos miembros: 3x - 2 - x = x + 8 - x</li>
                <li>Simplificamos: 2x - 2 = 8</li>
                <li>Agrupamos términos constantes: sumamos 2 en ambos miembros: 2x - 2 + 2 = 8 + 2</li>
                <li>Simplificamos: 2x = 10</li>
                <li>Despejamos x dividiendo entre 2: x = 10 ÷ 2</li>
                <li><strong>Solución: x = 5</strong></li>
            </ol>
            <p><em>Verificación:</em> 3(5) - 2 = 15 - 2 = 13 y x + 8 = 5 + 8 = 13 ✓</p>

            <hr>

            <h2>5. Ecuaciones con Paréntesis</h2>
            <p>Cuando una ecuación tiene paréntesis, primero debemos <strong>distribuir</strong> (aplicar la propiedad distributiva) antes de resolver.</p>

            <h3>5.1. Propiedad Distributiva</h3>
            <p>La propiedad distributiva establece que: <strong>a(b + c) = ab + ac</strong></p>
            <p>Esto significa que multiplicamos el número fuera del paréntesis por cada término dentro del paréntesis.</p>

            <p><em>Ejemplo 1:</em> Resolver <strong>3(x + 2) = 15</strong></p>
            <ol>
                <li>Distribuimos el 3: 3x + 6 = 15</li>
                <li>Restamos 6 en ambos miembros: 3x + 6 - 6 = 15 - 6</li>
                <li>Simplificamos: 3x = 9</li>
                <li>Dividimos entre 3: x = 9 ÷ 3</li>
                <li><strong>Solución: x = 3</strong></li>
            </ol>
            <p><em>Verificación:</em> 3(3 + 2) = 3(5) = 15 ✓</p>

            <p><em>Ejemplo 2:</em> Resolver <strong>2(x - 4) = 10</strong></p>
            <ol>
                <li>Distribuimos el 2: 2x - 8 = 10</li>
                <li>Sumamos 8 en ambos miembros: 2x - 8 + 8 = 10 + 8</li>
                <li>Simplificamos: 2x = 18</li>
                <li>Dividimos entre 2: x = 18 ÷ 2</li>
                <li><strong>Solución: x = 9</strong></li>
            </ol>
            <p><em>Verificación:</em> 2(9 - 4) = 2(5) = 10 ✓</p>

            <p><em>Ejemplo 3:</em> Resolver <strong>4(2x - 1) = 20</strong></p>
            <ol>
                <li>Distribuimos el 4: 8x - 4 = 20</li>
                <li>Sumamos 4 en ambos miembros: 8x - 4 + 4 = 20 + 4</li>
                <li>Simplificamos: 8x = 24</li>
                <li>Dividimos entre 8: x = 24 ÷ 8</li>
                <li><strong>Solución: x = 3</strong></li>
            </ol>
            <p><em>Verificación:</em> 4(2(3) - 1) = 4(6 - 1) = 4(5) = 20 ✓</p>

            <hr>

            <h2>6. Ecuaciones con Fracciones</h2>
            <p>Para resolver ecuaciones con fracciones, podemos usar dos métodos:</p>

            <h3>6.1. Método de Operaciones Inversas</h3>
            <p>Este método consiste en despejar la variable paso a paso, aplicando las operaciones inversas.</p>

            <p><em>Ejemplo 1:</em> Resolver <strong>(x/3) + 2 = 7</strong></p>
            <ol>
                <li>Restamos 2 en ambos miembros: (x/3) + 2 - 2 = 7 - 2</li>
                <li>Simplificamos: x/3 = 5</li>
                <li>Multiplicamos por 3 en ambos miembros (operación inversa de dividir): (x/3) × 3 = 5 × 3</li>
                <li>Simplificamos: x = 15</li>
                <li><strong>Solución: x = 15</strong></li>
            </ol>
            <p><em>Verificación:</em> (15/3) + 2 = 5 + 2 = 7 ✓</p>

            <h3>6.2. Método del Mínimo Común Múltiplo (MCM)</h3>
            <p>Cuando hay varias fracciones, multiplicamos toda la ecuación por el MCM de los denominadores para eliminar las fracciones.</p>

            <p><em>Ejemplo 2:</em> Resolver <strong>(x/2) - 3 = 5</strong></p>
            <ol>
                <li>Sumamos 3 en ambos miembros: (x/2) - 3 + 3 = 5 + 3</li>
                <li>Simplificamos: x/2 = 8</li>
                <li>Multiplicamos por 2 en ambos miembros: (x/2) × 2 = 8 × 2</li>
                <li>Simplificamos: x = 16</li>
                <li><strong>Solución: x = 16</strong></li>
            </ol>
            <p><em>Verificación:</em> (16/2) - 3 = 8 - 3 = 5 ✓</p>

            <hr>

            <h2>7. Ecuaciones con Decimales</h2>
            <p>Para resolver ecuaciones con números decimales, podemos multiplicar toda la ecuación por una potencia de 10 para convertir los decimales en enteros.</p>

            <p><em>Ejemplo 1:</em> Resolver <strong>0.5x + 1.5 = 4</strong></p>
            <ol>
                <li>Multiplicamos toda la ecuación por 10 para eliminar decimales: 10(0.5x + 1.5) = 10(4)</li>
                <li>Distribuimos: 5x + 15 = 40</li>
                <li>Restamos 15: 5x + 15 - 15 = 40 - 15</li>
                <li>Simplificamos: 5x = 25</li>
                <li>Dividimos entre 5: x = 25 ÷ 5</li>
                <li><strong>Solución: x = 5</strong></li>
            </ol>
            <p><em>Verificación:</em> 0.5(5) + 1.5 = 2.5 + 1.5 = 4 ✓</p>

            <p><em>Ejemplo 2:</em> Resolver <strong>0.2x - 0.3 = 1.1</strong></p>
            <ol>
                <li>Multiplicamos toda la ecuación por 10: 10(0.2x - 0.3) = 10(1.1)</li>
                <li>Distribuimos: 2x - 3 = 11</li>
                <li>Sumamos 3: 2x - 3 + 3 = 11 + 3</li>
                <li>Simplificamos: 2x = 14</li>
                <li>Dividimos entre 2: x = 14 ÷ 2</li>
                <li><strong>Solución: x = 7</strong></li>
            </ol>
            <p><em>Verificación:</em> 0.2(7) - 0.3 = 1.4 - 0.3 = 1.1 ✓</p>

            <hr>

            <h2>8. Verificación de Soluciones</h2>
            <p>La <strong>verificación</strong> es un paso crucial que nos permite comprobar si nuestra solución es correcta. Consiste en reemplazar el valor encontrado en la ecuación original y verificar que se cumpla la igualdad.</p>

            <h3>8.1. Pasos para Verificar</h3>
            <ol>
                <li>Reemplazar la variable con el valor encontrado</li>
                <li>Realizar las operaciones en ambos miembros</li>
                <li>Comprobar que ambos miembros sean iguales</li>
            </ol>

            <p><em>Ejemplo:</em> Verificar que x = 4 es solución de 3x - 5 = 7</p>
            <ol>
                <li>Reemplazamos x = 4: 3(4) - 5 = 7</li>
                <li>Realizamos operaciones: 12 - 5 = 7</li>
                <li>Simplificamos: 7 = 7 ✓</li>
                <li>Como ambos miembros son iguales, la solución es correcta</li>
            </ol>

            <p><strong>¿Por qué es importante verificar?</strong></p>
            <ul>
                <li>Nos permite detectar errores en nuestros cálculos</li>
                <li>Confirma que entendimos correctamente el problema</li>
                <li>Es una buena práctica matemática que desarrolla rigor</li>
            </ul>

            <hr>

            <h2>9. Aplicaciones Prácticas: Problemas Verbales</h2>
            <p>Las ecuaciones lineales nos permiten resolver problemas de la vida real. El proceso consiste en:</p>
            <ol>
                <li><strong>Leer y entender el problema</strong></li>
                <li><strong>Identificar la incógnita</strong> (qué queremos encontrar)</li>
                <li><strong>Traducir el problema a una ecuación</strong></li>
                <li><strong>Resolver la ecuación</strong></li>
                <li><strong>Verificar que la solución tenga sentido</strong> en el contexto del problema</li>
            </ol>

            <h3>9.1. Problema de Edades</h3>
            <p><strong>Problema:</strong> Juan tiene el triple de la edad de Pedro. Si entre los dos suman 32 años, ¿cuántos años tiene cada uno?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Definimos la incógnita: Sea x = edad de Pedro</li>
                <li>Expresamos la edad de Juan: 3x = edad de Juan</li>
                <li>Escribimos la ecuación: x + 3x = 32</li>
                <li>Resolvemos: 4x = 32, entonces x = 8</li>
                <li>Respuesta: Pedro tiene 8 años y Juan tiene 24 años</li>
            </ol>
            <p><em>Verificación:</em> 8 + 24 = 32 ✓ y 24 = 3(8) ✓</p>

            <h3>9.2. Problema de Costos</h3>
            <p><strong>Problema:</strong> Un libro cuesta $15 más que un cuaderno. Si compramos 2 libros y 3 cuadernos y pagamos $85 en total, ¿cuál es el precio de cada artículo?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Definimos la incógnita: Sea x = precio del cuaderno</li>
                <li>Expresamos el precio del libro: x + 15 = precio del libro</li>
                <li>Escribimos la ecuación: 2(x + 15) + 3x = 85</li>
                <li>Distribuimos: 2x + 30 + 3x = 85</li>
                <li>Simplificamos: 5x + 30 = 85</li>
                <li>Resolvemos: 5x = 55, entonces x = 11</li>
                <li>Respuesta: El cuaderno cuesta $11 y el libro cuesta $26</li>
            </ol>
            <p><em>Verificación:</em> 2(26) + 3(11) = 52 + 33 = 85 ✓</p>

            <h3>9.3. Problema de Números</h3>
            <p><strong>Problema:</strong> La suma de tres números consecutivos es 45. ¿Cuáles son esos números?</p>
            <p><em>Solución:</em></p>
            <ol>
                <li>Definimos la incógnita: Sea x = primer número</li>
                <li>Expresamos los otros números: x + 1 = segundo número, x + 2 = tercer número</li>
                <li>Escribimos la ecuación: x + (x + 1) + (x + 2) = 45</li>
                <li>Simplificamos: 3x + 3 = 45</li>
                <li>Resolvemos: 3x = 42, entonces x = 14</li>
                <li>Respuesta: Los números son 14, 15 y 16</li>
            </ol>
            <p><em>Verificación:</em> 14 + 15 + 16 = 45 ✓</p>

            <hr>

            <!-- 2. AUTOR -->
            <h2>10. Autor del Tema</h2>
            <div class="autor">
                <p><strong>Dra. Ana Rodríguez Fernández</strong><br>
                Doctora en Matemáticas y especialista en educación matemática. Profesora universitaria con más de 20 años de experiencia enseñando álgebra y ecuaciones lineales. Autora de múltiples publicaciones sobre didáctica de las matemáticas en educación secundaria.</p>
            </div>

            <hr>

            <!-- 3. VIDEO DE YOUTUBE -->
            <h2>11. Video Recomendado</h2>
            <p>Este video te mostrará cómo resolver ecuaciones lineales de manera práctica y visual. Observa las técnicas paso a paso para despejar variables y encontrar soluciones correctamente.</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/qaDV-0I1lek?rel=0" title="Ecuaciones Lineales - Resolución Paso a Paso" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "Ecuaciones Lineales - Resolución Paso a Paso" </em></p>

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
