<?php
require_once __DIR__ . '/../../../includes/session.php';
start_secure_session();

if (!isset($_SESSION['correo'])) {
    header("Location: ../../login.php");
    exit();
}

$topic_id = 'tema1';

// 4. CUESTIONARIO (10 preguntas)
$questions = [
    1 => ['q' => 'La teoría celular establece que:', 'options' => ['Todas las células contienen cloroplastos','Todos los seres vivos están formados por células y estas provienen de células preexistentes','Las células aparecen de la materia inerte por generación espontánea','Solo los animales están formados por células'], 'answer' => 1],
    2 => ['q' => '¿Cuál es una diferencia principal entre células procariotas y eucariotas?', 'options' => ['Las procariotas tienen núcleo verdadero y las eucariotas no','Las eucariotas tienen núcleo rodeado por membrana; las procariotas no','Las procariotas siempre son pluricelulares','Las eucariotas carecen de membrana plasmática'], 'answer' => 1],
    3 => ['q' => 'El orgánulo responsable de la producción principal de ATP es:', 'options' => ['Ribosoma','Lisosoma','Mitocondria','Aparato de Golgi'], 'answer' => 2],
    4 => ['q' => 'La función principal de los ribosomas es:', 'options' => ['Síntesis de proteínas','Degradación de desechos','Almacenamiento de agua','Síntesis de lípidos'], 'answer' => 0],
    5 => ['q' => 'La membrana plasmática está formada principalmente por:', 'options' => ['Celulosa','Fosfolípidos y proteínas','Quitina','Peptidoglucano'], 'answer' => 1],
    6 => ['q' => 'El transporte pasivo se caracteriza por:', 'options' => ['Requiere energía (ATP)','Ocurre a favor del gradiente de concentración','Siempre entra material a la célula','Solo lo realizan las células vegetales'], 'answer' => 1],
    7 => ['q' => 'El retículo endoplásmico rugoso se asocia con:', 'options' => ['Síntesis de proteínas y su plegamiento inicial','Producción de energía','Digestión intracelular','División celular (mitosis)'], 'answer' => 0],
    8 => ['q' => 'Las células vegetales, a diferencia de las animales, poseen:', 'options' => ['Lisosomas y centriolos','Pared celular de celulosa y cloroplastos','Membrana plasmática','Ribosomas 80S'], 'answer' => 1],
    9 => ['q' => 'En el ciclo celular, la fase en la que se replica el ADN es:', 'options' => ['G1','S','G2','M'], 'answer' => 1],
    10 => ['q' => 'La difusión facilitada:', 'options' => ['Requiere ATP','Usa proteínas transportadoras o canales','Va en contra del gradiente','Solo ocurre en procariotas'], 'answer' => 1],
];

$nombre_usuario = $_SESSION['nombre'];
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tema 1 - Células y Organización Básica</title>
    <?php $cssPath = __DIR__ . '/../../../assets/css/estilos_biologia/tema1.css'; ?>
    <link rel="stylesheet" href="../../../assets/css/estilos_biologia/tema1.css?v=<?php echo file_exists($cssPath) ? filemtime($cssPath) : time(); ?>">
</head>
<body>
    <div class="content-wrapper">
        <div class="content-container">
            <a href="../../biologia.php" class="volver-btn">← Volver a Biología</a>
            <h1>Tema 1: Células y organización básica</h1>
            <p>¡Hola, <strong><?php echo htmlspecialchars($nombre_usuario); ?></strong>! En este tema conocerás la unidad fundamental de la vida: la célula. Revisaremos la teoría celular, los tipos de células, sus orgánulos y funciones, la membrana y sus mecanismos de transporte, y una introducción al ciclo celular.</p>

            <hr>

            <!-- INTRODUCCIÓN HISTÓRICA -->
            <h2>Introducción: El descubrimiento de la célula</h2>
            <p>El concepto de célula tiene sus raíces en el siglo XVII, cuando <strong>Robert Hooke</strong> (1665) observó por primera vez células muertas de corcho bajo un microscopio primitivo. Hooke llamó a estas estructuras "células" (del latín <em>cellula</em>, que significa "pequeña habitación") por su parecido con las celdas de un monasterio.</p>
            
            <p>Posteriormente, <strong>Anton van Leeuwenhoek</strong> (1670s) perfeccionó las lentes y observó microorganismos vivos, glóbulos rojos y espermatozoides, abriendo la puerta al estudio de la vida microscópica. Sin embargo, no fue hasta el siglo XIX que se formuló la <strong>teoría celular</strong>, gracias al trabajo conjunto de varios científicos.</p>

            <hr>

            <!-- 1. CONTENIDO DEL TEMA -->
            <h2>1. Teoría celular</h2>
            <p>La teoría celular es uno de los pilares fundamentales de la biología moderna. Fue formulada principalmente por <strong>Matthias Schleiden</strong> (1838, células vegetales), <strong>Theodor Schwann</strong> (1839, células animales) y <strong>Rudolf Virchow</strong> (1855, "omnis cellula e cellula"). Los postulados principales son:</p>
            <ul>
                <li>Todos los seres vivos están formados por una o más <strong>células</strong>.</li>
                <li>La célula es la <strong>unidad estructural y funcional</strong> de los seres vivos.</li>
                <li>Toda célula procede de otra <strong>célula preexistente</strong> (reproducción celular).</li>
                <li>La célula contiene la <strong>información genética</strong> (ADN) necesaria para su funcionamiento y herencia.</li>
            </ul>
            
            <div class="info-box">
                <h3>💡 Dato importante</h3>
                <p>La teoría celular refutó la idea de la <em>generación espontánea</em>, que sostenía que los seres vivos podían surgir de materia inerte. Los experimentos de Louis Pasteur en el siglo XIX demostraron definitivamente que la vida solo proviene de vida preexistente.</p>
            </div>

            <hr>

            <h2>2. Tipos celulares: procariotas vs eucariotas</h2>
            <p>Existen dos tipos fundamentales de células según la organización de su material genético:</p>
            
            <h3>2.1 Células Procariotas</h3>
            <p>Son las células más antiguas y simples. Aparecieron hace aproximadamente <strong>3,500 millones de años</strong>. Características principales:</p>
            <ul>
                <li>Carecen de núcleo definido; su ADN se encuentra en una región llamada <strong>nucleoide</strong>.</li>
                <li>No poseen orgánulos membranosos (sin mitocondrias, retículo, Golgi, etc.).</li>
                <li>Su ADN es circular y está asociado a pocas proteínas.</li>
                <li>Tienen <strong>ribosomas 70S</strong> (más pequeños que los eucariotas).</li>
                <li>Muchas poseen <strong>plásmidos</strong>: pequeñas moléculas de ADN circular extracromosómico.</li>
                <li>Pueden tener <strong>flagelos</strong> para movimiento (estructura diferente a eucariotas).</li>
                <li>División por <strong>fisión binaria</strong> (más simple que la mitosis).</li>
            </ul>

            <h3>2.2 Células Eucariotas</h3>
            <p>Más complejas y de mayor tamaño. Aparecieron hace aproximadamente <strong>2,000 millones de años</strong>, probablemente por endosimbiosis. Características:</p>
            <ul>
                <li>Poseen <strong>núcleo verdadero</strong> rodeado por envoltura nuclear con poros.</li>
                <li>ADN lineal organizado en <strong>cromosomas</strong>, asociado con histonas.</li>
                <li>Múltiples <strong>orgánulos membranosos</strong> especializados.</li>
                <li>Tienen <strong>ribosomas 80S</strong> (más grandes que procariotas).</li>
                <li><strong>Citoesqueleto</strong> complejo para estructura y transporte.</li>
                <li>División por <strong>mitosis</strong> o <strong>meiosis</strong> (procesos complejos).</li>
            </ul>

            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Procariota</th>
                        <th>Eucariota</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Núcleo</td>
                        <td>Sin núcleo verdadero; ADN en el <em>nucleoide</em></td>
                        <td>Núcleo verdadero con envoltura nuclear</td>
                    </tr>
                    <tr>
                        <td>Orgánulos membranosos</td>
                        <td>Ausentes (excepto invaginaciones de membrana)</td>
                        <td>Presentes (mitocondrias, RER/REL, Golgi, lisosomas...)</td>
                    </tr>
                    <tr>
                        <td>Tamaño típico</td>
                        <td>1–10 µm</td>
                        <td>10–100 µm</td>
                    </tr>
                    <tr>
                        <td>ADN</td>
                        <td>Circular, en nucleoide</td>
                        <td>Lineal, en cromosomas</td>
                    </tr>
                    <tr>
                        <td>Ribosomas</td>
                        <td>70S</td>
                        <td>80S (citoplasma), 70S (mitocondrias/cloroplastos)</td>
                    </tr>
                    <tr>
                        <td>Pared celular</td>
                        <td>Peptidoglucano (bacterias)</td>
                        <td>Celulosa (plantas) o quitina (hongos); animales sin pared</td>
                    </tr>
                    <tr>
                        <td>División celular</td>
                        <td>Fisión binaria</td>
                        <td>Mitosis / Meiosis</td>
                    </tr>
                    <tr>
                        <td>Ejemplos</td>
                        <td>Bacterias, arqueas</td>
                        <td>Protozoos, hongos, plantas, animales</td>
                    </tr>
                </tbody>
            </table>

            <div class="info-box">
                <h3>🔬 Teoría Endosimbiótica</h3>
                <p>Propuesta por <strong>Lynn Margulis</strong> (1967), esta teoría explica que las mitocondrias y cloroplastos fueron originalmente bacterias procariotas que establecieron una relación simbiótica con células eucariotas primitivas. Evidencias:</p>
                <ul>
                    <li>Tienen su propio ADN circular (como bacterias)</li>
                    <li>Ribosomas 70S (tipo procariota)</li>
                    <li>Doble membrana (la interna de la bacteria, la externa de la vesícula endocítica)</li>
                    <li>Se reproducen por división binaria independiente del núcleo</li>
                </ul>
            </div>

            <hr>

            <h2>3. Orgánulos y funciones</h2>
            <p>Las células eucariotas contienen compartimentos especializados llamados <strong>orgánulos</strong>, cada uno con funciones específicas:</p>

            <h3>3.1 Membrana plasmática</h3>
            <ul>
                <li><strong>Estructura:</strong> Bicapa de fosfolípidos con proteínas integrales y periféricas (modelo de mosaico fluido de Singer y Nicolson, 1972).</li>
                <li><strong>Funciones:</strong> 
                    <ul>
                        <li>Barrera selectiva que regula entrada y salida de sustancias</li>
                        <li>Reconocimiento celular (glucoproteínas y glucolípidos)</li>
                        <li>Comunicación celular (receptores)</li>
                        <li>Adhesión celular (uniones intercelulares)</li>
                    </ul>
                </li>
                <li><strong>Componentes:</strong> Fosfolípidos (45%), proteínas (45%), colesterol (10%), carbohidratos (unidos a lípidos y proteínas)</li>
            </ul>

            <h3>3.2 Núcleo</h3>
            <ul>
                <li><strong>Envoltura nuclear:</strong> Doble membrana con poros nucleares que regulan el paso de ARN y proteínas.</li>
                <li><strong>Cromatina:</strong> ADN + proteínas histonas. Se condensa en cromosomas durante la división.</li>
                <li><strong>Nucléolo:</strong> Región donde se ensamblan las subunidades ribosómicas (ARNr + proteínas).</li>
                <li><strong>Funciones:</strong> 
                    <ul>
                        <li>Almacena y protege el ADN</li>
                        <li>Centro de control genético (transcripción)</li>
                        <li>Replicación del ADN</li>
                        <li>Producción de ARN mensajero, ribosomal y de transferencia</li>
                    </ul>
                </li>
            </ul>

            <h3>3.3 Ribosomas</h3>
            <ul>
                <li><strong>Estructura:</strong> Dos subunidades (grande y pequeña) formadas por ARN ribosomal y proteínas.</li>
                <li><strong>Ubicación:</strong> Libres en citoplasma o adheridos al RER.</li>
                <li><strong>Función:</strong> <strong>Síntesis de proteínas</strong> (traducción del ARNm). Los ribosomas libres producen proteínas citosólicas, mientras que los del RER producen proteínas de secreción o membrana.</li>
                <li><strong>Proceso:</strong> Leen el código del ARNm y ensamblan aminoácidos según la secuencia de codones.</li>
            </ul>

            <h3>3.4 Retículo Endoplásmico</h3>
            <p><strong>Retículo Endoplásmico Rugoso (RER):</strong></p>
            <ul>
                <li>Tiene ribosomas adheridos a su superficie</li>
                <li><strong>Funciones:</strong> Síntesis de proteínas de membrana, proteínas de secreción, proteínas de orgánulos; plegamiento inicial y modificación de proteínas; glicosilación inicial</li>
                <li>Muy desarrollado en células secretoras (páncreas, glándulas)</li>
            </ul>

            <p><strong>Retículo Endoplásmico Liso (REL):</strong></p>
            <ul>
                <li>Sin ribosomas en su superficie</li>
                <li><strong>Funciones:</strong> 
                    <ul>
                        <li>Síntesis de lípidos (fosfolípidos, esteroides)</li>
                        <li>Metabolismo de carbohidratos</li>
                        <li>Detoxificación de drogas y toxinas (hígado)</li>
                        <li>Almacenamiento de iones de calcio (músculo)</li>
                    </ul>
                </li>
                <li>Abundante en células hepáticas y células productoras de hormonas esteroideas</li>
            </ul>

            <h3>3.5 Aparato de Golgi</h3>
            <ul>
                <li><strong>Estructura:</strong> Pilas de sáculos membranosos aplanados (cisternas).</li>
                <li><strong>Regiones:</strong> Cis (recibe del RER), media, trans (envía a destino final).</li>
                <li><strong>Funciones:</strong>
                    <ul>
                        <li>Modificación de proteínas y lípidos (glicosilación completa, fosforilación)</li>
                        <li>Clasificación y empaquetamiento en vesículas</li>
                        <li>Síntesis de polisacáridos complejos</li>
                        <li>Formación de lisosomas</li>
                        <li>Dirección de proteínas a sus destinos correctos</li>
                    </ul>
                </li>
            </ul>

            <h3>3.6 Mitocondrias</h3>
            <ul>
                <li><strong>Estructura:</strong> Doble membrana; la interna forma crestas que aumentan superficie; matriz mitocondrial interior.</li>
                <li><strong>Función principal:</strong> <strong>Respiración celular</strong> - producción de ATP mediante la cadena de transporte de electrones y fosforilación oxidativa.</li>
                <li><strong>Procesos:</strong>
                    <ul>
                        <li>Ciclo de Krebs (matriz)</li>
                        <li>Cadena respiratoria (membrana interna)</li>
                        <li>Fosforilación oxidativa</li>
                        <li>Beta-oxidación de ácidos grasos</li>
                    </ul>
                </li>
                <li><strong>ATP:</strong> Una célula puede contener cientos a miles de mitocondrias según su demanda energética.</li>
                <li><strong>Dato:</strong> ADN mitocondrial se hereda exclusivamente por vía materna.</li>
            </ul>

            <h3>3.7 Lisosomas</h3>
            <ul>
                <li><strong>Características:</strong> Vesículas membranosas con pH ácido (~4.5) que contienen enzimas hidrolíticas.</li>
                <li><strong>Funciones:</strong>
                    <ul>
                        <li><strong>Digestión intracelular</strong> de macromoléculas</li>
                        <li><strong>Autofagia:</strong> reciclaje de orgánulos dañados</li>
                        <li><strong>Fagocitosis:</strong> digestión de bacterias o material extraño</li>
                        <li>Apoptosis (muerte celular programada)</li>
                    </ul>
                </li>
                <li>Especialmente abundantes en glóbulos blancos (función inmune)</li>
            </ul>

            <h3>3.8 Peroxisomas</h3>
            <ul>
                <li>Vesículas que contienen enzimas oxidativas</li>
                <li><strong>Funciones:</strong>
                    <ul>
                        <li>Beta-oxidación de ácidos grasos de cadena muy larga</li>
                        <li>Degradación de peróxido de hidrógeno (H₂O₂) mediante catalasa</li>
                        <li>Detoxificación de sustancias nocivas</li>
                        <li>Síntesis de lípidos especiales (plasmalógenos)</li>
                    </ul>
                </li>
            </ul>

            <h3>3.9 Cloroplastos (solo células vegetales)</h3>
            <ul>
                <li><strong>Estructura:</strong> Doble membrana externa; tilacoides apilados en grana dentro del estroma.</li>
                <li><strong>Función:</strong> <strong>Fotosíntesis</strong> - conversión de energía lumínica en energía química (glucosa).</li>
                <li><strong>Fases:</strong>
                    <ul>
                        <li><strong>Fase lumínica:</strong> En tilacoides; captura luz, genera ATP y NADPH</li>
                        <li><strong>Ciclo de Calvin:</strong> En estroma; fijación de CO₂ y síntesis de glucosa</li>
                    </ul>
                </li>
                <li>Contienen clorofila (pigmento verde) y otros pigmentos accesorios</li>
                <li>Tienen su propio ADN y ribosomas (evidencia de origen endosimbiótico)</li>
            </ul>

            <h3>3.10 Vacuolas</h3>
            <ul>
                <li><strong>Células vegetales:</strong> Gran vacuola central (hasta 90% del volumen celular)
                    <ul>
                        <li>Almacenamiento de agua, iones, pigmentos, toxinas</li>
                        <li>Soporte osmótico (turgencia celular)</li>
                        <li>Degradación de materiales (similar a lisosomas)</li>
                    </ul>
                </li>
                <li><strong>Células animales:</strong> Vacuolas pequeñas y temporales
                    <ul>
                        <li>Vacuolas alimenticias (fagocitosis)</li>
                        <li>Vacuolas contráctiles (eliminan exceso de agua en protistas)</li>
                    </ul>
                </li>
            </ul>

            <h3>3.11 Citoesqueleto</h3>
            <ul>
                <li><strong>Componentes:</strong>
                    <ul>
                        <li><strong>Microtúbulos:</strong> Tubulina; los más gruesos (25 nm); transporte intracelular, división celular, cilios y flagelos</li>
                        <li><strong>Filamentos intermedios:</strong> Varias proteínas; 10 nm; soporte mecánico, resistencia a tensión</li>
                        <li><strong>Microfilamentos de actina:</strong> Los más delgados (7 nm); movimiento celular, citocinesis, cambios de forma</li>
                    </ul>
                </li>
                <li><strong>Funciones:</strong> Forma celular, movimiento, transporte de orgánulos, división celular, señalización</li>
            </ul>

            <h3>3.12 Centriolos y centrosoma</h3>
            <ul>
                <li>Presentes en células animales (ausentes en plantas superiores)</li>
                <li><strong>Estructura:</strong> Par de cilindros formados por 9 tripletes de microtúbulos</li>
                <li><strong>Funciones:</strong>
                    <ul>
                        <li>Organización del huso mitótico durante la división</li>
                        <li>Formación de cilios y flagelos</li>
                        <li>Centro organizador de microtúbulos (MTOC)</li>
                    </ul>
                </li>
            </ul>

            <hr>

            <h2>4. Membrana plasmática y transporte</h2>
            <p>La membrana plasmática sigue el <strong>modelo de mosaico fluido</strong> (Singer y Nicolson, 1972): una bicapa lipídica dinámica con proteínas integrales y periféricas que pueden moverse lateralmente.</p>
            
            <h3>4.1 Composición de la membrana</h3>
            <ul>
                <li><strong>Fosfolípidos:</strong> Moléculas anfipáticas (cabeza polar hidrofílica, colas hidrofóbicas). Se organizan en bicapa.</li>
                <li><strong>Colesterol:</strong> Regula fluidez; la rigidiza a altas temperaturas y evita solidificación a bajas temperaturas.</li>
                <li><strong>Proteínas:</strong>
                    <ul>
                        <li><em>Integrales:</em> Atraviesan la membrana; función de transporte y recepción</li>
                        <li><em>Periféricas:</em> En la superficie; función de señalización y soporte</li>
                    </ul>
                </li>
                <li><strong>Carbohidratos:</strong> Unidos a lípidos (glucolípidos) o proteínas (glucoproteínas); reconocimiento celular</li>
            </ul>

            <h3>4.2 Mecanismos de transporte</h3>
            
            <h4>A) Transporte Pasivo (sin gasto de energía ATP)</h4>
            <p>El movimiento ocurre <strong>a favor del gradiente de concentración</strong> (de mayor a menor concentración) o gradiente electroquímico.</p>

            <ul>
                <li><strong>Difusión simple:</strong>
                    <ul>
                        <li>Paso directo a través de la bicapa lipídica</li>
                        <li>Para moléculas pequeñas, no polares o liposolubles (O₂, CO₂, N₂, etanol)</li>
                        <li>También moléculas pequeñas polares sin carga (H₂O en pequeñas cantidades)</li>
                        <li>Velocidad depende del gradiente, tamaño molecular y liposolubilidad</li>
                    </ul>
                </li>
                
                <li><strong>Difusión facilitada:</strong>
                    <ul>
                        <li>Requiere <strong>proteínas transportadoras</strong> (carriers) o <strong>canales proteicos</strong></li>
                        <li>Para moléculas polares grandes o iones que no pueden cruzar la bicapa</li>
                        <li><em>Canales:</em> Poros selectivos (canales de sodio, potasio, calcio, cloro). Pueden ser:
                            <ul>
                                <li>De compuerta (se abren/cierran por estímulos)</li>
                                <li>Permanentemente abiertos</li>
                            </ul>
                        </li>
                        <li><em>Transportadores:</em> Unen el soluto, cambian de conformación, lo liberan al otro lado (ej: transportador de glucosa GLUT)</li>
                        <li>Sigue siendo a favor del gradiente</li>
                        <li>Puede saturarse (número limitado de proteínas)</li>
                    </ul>
                </li>
                
                <li><strong>Ósmosis:</strong>
                    <ul>
                        <li>Difusión de <strong>agua</strong> a través de membranas semipermeables</li>
                        <li>El agua se mueve hacia la zona de mayor concentración de solutos</li>
                        <li>A través de la bicapa o mediante <strong>acuaporinas</strong> (canales de agua)</li>
                        <li><strong>Soluciones:</strong>
                            <ul>
                                <li><em>Isotónica:</em> Misma concentración; sin movimiento neto de agua</li>
                                <li><em>Hipotónica:</em> Menor concentración de solutos; el agua entra (célula se hincha)</li>
                                <li><em>Hipertónica:</em> Mayor concentración de solutos; el agua sale (célula se encoge/plasmólisis)</li>
                            </ul>
                        </li>
                    </ul>
                </li>
            </ul>

            <h4>B) Transporte Activo (requiere energía ATP)</h4>
            <p>El movimiento ocurre <strong>en contra del gradiente de concentración</strong> (de menor a mayor concentración).</p>

            <ul>
                <li><strong>Transporte activo primario:</strong>
                    <ul>
                        <li>Usa ATP directamente</li>
                        <li><strong>Ejemplo clásico: Bomba sodio-potasio (Na⁺/K⁺-ATPasa)</strong>
                            <ul>
                                <li>Expulsa 3 Na⁺ hacia el exterior</li>
                                <li>Introduce 2 K⁺ hacia el interior</li>
                                <li>Mantiene el potencial de membrana</li>
                                <li>Esencial para transmisión nerviosa y función muscular</li>
                                <li>Consume ~30% del ATP celular en neuronas</li>
                            </ul>
                        </li>
                        <li>Otras bombas: Ca²⁺-ATPasa, H⁺-ATPasa</li>
                    </ul>
                </li>
                
                <li><strong>Transporte activo secundario (cotransporte):</strong>
                    <ul>
                        <li>Usa el gradiente creado por transporte activo primario</li>
                        <li>No usa ATP directamente, pero depende de la bomba Na⁺/K⁺</li>
                        <li><em>Simporte:</em> Dos sustancias en la misma dirección (ej: Na⁺-glucosa)</li>
                        <li><em>Antiporte:</em> Dos sustancias en direcciones opuestas (ej: Na⁺-Ca²⁺)</li>
                    </ul>
                </li>
            </ul>

            <h4>C) Transporte en masa</h4>
            <p>Para moléculas grandes o en grandes cantidades. Requiere energía.</p>

            <ul>
                <li><strong>Endocitosis:</strong> Entrada de material
                    <ul>
                        <li><em>Fagocitosis:</em> "Comer celular" - captura de partículas sólidas grandes (bacterias, restos celulares). Forma fagosoma. Común en glóbulos blancos (macrófagos, neutrófilos)</li>
                        <li><em>Pinocitosis:</em> "Beber celular" - captura de líquidos y solutos disueltos. Forma pequeñas vesículas</li>
                        <li><em>Endocitosis mediada por receptor:</em> Muy específica; receptores en membrana reconocen moléculas (ej: colesterol-LDL, hormonas, anticuerpos). Forma vesículas recubiertas de clatrina</li>
                    </ul>
                </li>
                
                <li><strong>Exocitosis:</strong> Salida de material
                    <ul>
                        <li>Vesículas del Golgi se fusionan con la membrana plasmática</li>
                        <li>Liberan su contenido al exterior</li>
                        <li><strong>Ejemplos:</strong> Secreción de hormonas, neurotransmisores, enzimas digestivas, anticuerpos</li>
                        <li>Puede ser constitutiva (continua) o regulada (por señal)</li>
                    </ul>
                </li>
            </ul>

            <div class="info-box">
                <h3>⚡ Dato energético</h3>
                <p>El transporte activo es vital pero costoso: la bomba Na⁺/K⁺ puede consumir hasta el 70% del ATP en células nerviosas en reposo. Durante la transmisión de impulsos nerviosos, el consumo energético aumenta dramáticamente.</p>
            </div>

            <hr>

            <h2>5. Ciclo celular</h2>
            <p>El <strong>ciclo celular</strong> es el conjunto ordenado de eventos que lleva a una célula a crecer y dividirse en dos células hijas. Permite el crecimiento, reparación de tejidos y reproducción asexual.</p>

            <h3>5.1 Fases del ciclo celular</h3>
            
            <h4>A) INTERFASE (90-95% del tiempo total)</h4>
            <p>La célula no está dividiendo, pero está metabólicamente activa. Se subdivide en:</p>

            <ul>
                <li><strong>Fase G1 (Gap 1 - Intervalo 1):</strong>
                    <ul>
                        <li>Crecimiento celular intenso</li>
                        <li>Síntesis de proteínas, ARN y orgánulos</li>
                        <li>Acumulación de energía y nutrientes</li>
                        <li>Actividad metabólica normal</li>
                        <li>Punto de control G1/S: La célula "decide" si continúa hacia división o entra en G0</li>
                        <li>Duración variable (horas a años)</li>
                    </ul>
                </li>
                
                <li><strong>Fase S (Synthesis - Síntesis):</strong>
                    <ul>
                        <li><strong>Replicación del ADN</strong> - el material genético se duplica</li>
                        <li>Cada cromosoma pasa de una cromátida a dos cromátidas hermanas unidas por el centrómero</li>
                        <li>Síntesis de histonas y otras proteínas del cromosoma</li>
                        <li>Duplicación del centrosoma (en células animales)</li>
                        <li>Duración: 6-8 horas en células de mamíferos</li>
                        <li>Al final: la célula tiene el doble de ADN (4n)</li>
                    </ul>
                </li>
                
                <li><strong>Fase G2 (Gap 2 - Intervalo 2):</strong>
                    <ul>
                        <li>Crecimiento adicional</li>
                        <li>Síntesis de proteínas necesarias para la mitosis (tubulinas para el huso)</li>
                        <li>Duplicación de orgánulos (mitocondrias, cloroplastos)</li>
                        <li>Punto de control G2/M: Verifica que el ADN se replicó correctamente</li>
                        <li>Duración: 3-4 horas</li>
                    </ul>
                </li>
                
                <li><strong>Fase G0 (Gap 0 - Quiescencia):</strong>
                    <ul>
                        <li>Estado de reposo o diferenciación</li>
                        <li>Células que no se dividen temporalmente (neuronas, células musculares)</li>
                        <li>Pueden regresar a G1 o permanecer en G0 indefinidamente</li>
                        <li>Algunas células nunca vuelven a dividirse (diferenciación terminal)</li>
                    </ul>
                </li>
            </ul>

            <h4>B) FASE M (Mitosis y Citocinesis) (5-10% del tiempo)</h4>
            
            <p><strong>MITOSIS:</strong> División del núcleo en dos núcleos hijos idénticos</p>

            <ul>
                <li><strong>1. Profase:</strong>
                    <ul>
                        <li>La cromatina se condensa en cromosomas visibles</li>
                        <li>Cada cromosoma consta de dos cromátidas hermanas unidas por el centrómero</li>
                        <li>Los centrosomas migran a polos opuestos</li>
                        <li>Comienza a formarse el huso mitótico (microtúbulos)</li>
                        <li>Los nucléolos desaparecen</li>
                    </ul>
                </li>
                
                <li><strong>2. Prometafase:</strong>
                    <ul>
                        <li>La envoltura nuclear se fragmenta</li>
                        <li>Los microtúbulos del huso se unen a los cinetocoros (proteínas en centrómeros)</li>
                        <li>Los cromosomas comienzan a moverse</li>
                    </ul>
                </li>
                
                <li><strong>3. Metafase:</strong>
                    <ul>
                        <li>Los cromosomas se alinean en el <strong>plano ecuatorial</strong> (placa metafásica)</li>
                        <li>Cada cromátida hermana conectada a polos opuestos por microtúbulos</li>
                        <li>Punto de control del huso: Verifica que todos los cromosomas estén correctamente unidos</li>
                        <li>Fase más fácil para observar y contar cromosomas (cariotipo)</li>
                    </ul>
                </li>
                
                <li><strong>4. Anafase:</strong>
                    <ul>
                        <li>Las cromátidas hermanas se separan en el centrómero</li>
                        <li>Cada cromátida (ahora cromosoma hijo) migra hacia polos opuestos</li>
                        <li>Los microtúbulos se acortan jalando los cromosomas</li>
                        <li>La célula se alarga</li>
                        <li>Fase más corta pero crucial</li>
                    </ul>
                </li>
                
                <li><strong>5. Telofase:</strong>
                    <ul>
                        <li>Los cromosomas llegan a los polos y comienzan a descondensarse</li>
                        <li>Reaparecen las envolturas nucleares alrededor de cada grupo de cromosomas</li>
                        <li>Reaparecen los nucléolos</li>
                        <li>Desaparece el huso mitótico</li>
                        <li>Resultado: dos núcleos hijos idénticos</li>
                    </ul>
                </li>
            </ul>

            <p><strong>CITOCINESIS:</strong> División del citoplasma</p>
            <ul>
                <li><strong>En células animales:</strong>
                    <ul>
                        <li>Formación de un <strong>surco de segmentación</strong> en el ecuador</li>
                        <li>Anillo contráctil de actina y miosina estrangula la célula</li>
                        <li>Se forma completamente dos células hijas</li>
                    </ul>
                </li>
                <li><strong>En células vegetales:</strong>
                    <ul>
                        <li>Formación de la <strong>placa celular</strong> en el centro</li>
                        <li>Vesículas del Golgi aportan material de membrana y pared</li>
                        <li>La placa crece hacia afuera hasta fusionarse con la membrana</li>
                        <li>Se forma nueva pared celular entre las células hijas</li>
                    </ul>
                </li>
            </ul>

            <h3>5.2 Regulación del ciclo celular</h3>
            <ul>
                <li><strong>Ciclinas y CDKs (quinasas dependientes de ciclinas):</strong> Proteínas reguladoras que controlan la progresión</li>
                <li><strong>Puntos de control (checkpoints):</strong>
                    <ul>
                        <li>G1/S: ¿La célula es lo suficientemente grande? ¿Hay nutrientes? ¿ADN dañado?</li>
                        <li>G2/M: ¿El ADN se replicó correctamente?</li>
                        <li>Metafase: ¿Todos los cromosomas están unidos al huso?</li>
                    </ul>
                </li>
                <li><strong>Proteína p53:</strong> "Guardián del genoma" - detiene el ciclo si detecta daño en el ADN o induce apoptosis</li>
            </ul>

            <h3>5.3 Importancia del ciclo celular</h3>
            <ul>
                <li><strong>Crecimiento:</strong> Aumento del número de células desde el cigoto hasta adulto</li>
                <li><strong>Reparación:</strong> Reemplazo de células dañadas o muertas (piel, intestino, sangre)</li>
                <li><strong>Reproducción asexual:</strong> En organismos unicelulares y algunos pluricelulares</li>
                <li><strong>Cáncer:</strong> Resulta de desregulación del ciclo celular (división incontrolada)</li>
            </ul>

            <div class="info-box">
                <h3>🔬 Datos interesantes del ciclo celular</h3>
                <ul>
                    <li>Una célula intestinal humana se divide cada 12-24 horas</li>
                    <li>Una neurona puede permanecer en G0 toda la vida (no se divide)</li>
                    <li>Durante el desarrollo embrionario, algunas células se dividen cada 30 minutos</li>
                    <li>El cuerpo humano produce ~25 millones de células nuevas por segundo</li>
                    <li>Los glóbulos rojos se renuevan completamente cada 120 días</li>
                </ul>
            </div>

            <hr>

            <h2>6. Diferencias célula animal vs vegetal (detallado)</h2>
            
            <table class="tabla-estructura">
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th>Célula Animal</th>
                        <th>Célula Vegetal</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Pared celular</strong></td>
                        <td>Ausente</td>
                        <td>Presente (celulosa, hemicelulosa, pectina)</td>
                    </tr>
                    <tr>
                        <td><strong>Forma</strong></td>
                        <td>Variable, irregular</td>
                        <td>Fija, generalmente poliédrica</td>
                    </tr>
                    <tr>
                        <td><strong>Tamaño</strong></td>
                        <td>Generalmente más pequeña (10-30 µm)</td>
                        <td>Generalmente más grande (10-100 µm)</td>
                    </tr>
                    <tr>
                        <td><strong>Vacuolas</strong></td>
                        <td>Pequeñas y numerosas (si existen)</td>
                        <td>Una gran vacuola central (hasta 90% del volumen)</td>
                    </tr>
                    <tr>
                        <td><strong>Cloroplastos</strong></td>
                        <td>Ausentes</td>
                        <td>Presentes (fotosíntesis)</td>
                    </tr>
                    <tr>
                        <td><strong>Otros plastidios</strong></td>
                        <td>Ausentes</td>
                        <td>Presentes (cromoplastos, leucoplastos)</td>
                    </tr>
                    <tr>
                        <td><strong>Centriolos</strong></td>
                        <td>Presentes en centrosoma</td>
                        <td>Ausentes (excepto en algas y briofitas)</td>
                    </tr>
                    <tr>
                        <td><strong>Lisosomas</strong></td>
                        <td>Abundantes y evidentes</td>
                        <td>Raros o sus funciones las realiza la vacuola</td>
                    </tr>
                    <tr>
                        <td><strong>Glioxisomas</strong></td>
                        <td>Ausentes</td>
                        <td>Presentes (metabolismo de lípidos en semillas)</td>
                    </tr>
                    <tr>
                        <td><strong>Nutrición</strong></td>
                        <td>Heterótrofa (necesita compuestos orgánicos)</td>
                        <td>Autótrofa (produce su propio alimento)</td>
                    </tr>
                    <tr>
                        <td><strong>Almacenamiento de energía</strong></td>
                        <td>Glucógeno</td>
                        <td>Almidón</td>
                    </tr>
                    <tr>
                        <td><strong>Citocinesis</strong></td>
                        <td>Por estrangulamiento (surco)</td>
                        <td>Por formación de placa celular</td>
                    </tr>
                    <tr>
                        <td><strong>Uniones celulares</strong></td>
                        <td>Desmosomas, uniones estrechas, gap junctions</td>
                        <td>Plasmodesmos</td>
                    </tr>
                    <tr>
                        <td><strong>Potencial osmótico</strong></td>
                        <td>Baja presión osmótica</td>
                        <td>Alta presión osmótica (turgencia)</td>
                    </tr>
                </tbody>
            </table>

            <h3>6.1 Estructuras exclusivas de células vegetales</h3>
            <ul>
                <li><strong>Pared celular primaria:</strong> Formada durante crecimiento; flexible</li>
                <li><strong>Pared celular secundaria:</strong> Se deposita después; más gruesa y rígida; contiene lignina</li>
                <li><strong>Plasmodesmos:</strong> Canales que conectan citoplasmas de células adyacentes; permiten comunicación directa</li>
                <li><strong>Plastidios:</strong>
                    <ul>
                        <li>Cloroplastos (fotosíntesis)</li>
                        <li>Cromoplastos (pigmentos de flores y frutos)</li>
                        <li>Leucoplastos (almacenamiento de almidón, lípidos, proteínas)</li>
                    </ul>
                </li>
            </ul>

            <h3>6.2 Estructuras exclusivas de células animales</h3>
            <ul>
                <li><strong>Centriolos:</strong> Organización del huso mitótico; formación de cilios/flagelos</li>
                <li><strong>Lisosomas prominentes:</strong> Digestión intracelular más activa</li>
                <li><strong>Glucógeno:</strong> Polisacárido de reserva (en lugar de almidón)</li>
            </ul>

            <hr>

            <h2>7. Niveles de organización biológica</h2>
            <p>Las células se organizan en estructuras cada vez más complejas:</p>
            <ol>
                <li><strong>Célula:</strong> Unidad básica de la vida</li>
                <li><strong>Tejido:</strong> Grupo de células similares con función común (epitelial, conectivo, muscular, nervioso)</li>
                <li><strong>Órgano:</strong> Conjunto de tejidos que realizan una función específica (corazón, hígado, hoja)</li>
                <li><strong>Sistema de órganos:</strong> Conjunto de órganos que trabajan coordinadamente (digestivo, respiratorio, circulatorio)</li>
                <li><strong>Organismo:</strong> Ser vivo completo y funcional</li>
            </ol>

            <hr>

            <h2>8. Técnicas de estudio celular</h2>
            <ul>
                <li><strong>Microscopía óptica:</strong> Hasta 1000x de aumento; células vivas o fijadas</li>
                <li><strong>Microscopía electrónica:</strong>
                    <ul>
                        <li>TEM (transmisión): Cortes ultrafinos; ultra estructura interna; hasta 2,000,000x</li>
                        <li>SEM (barrido): Superficie tridimensional; hasta 500,000x</li>
                    </ul>
                </li>
                <li><strong>Microscopía de fluorescencia:</strong> Proteínas marcadas con fluoróforos; células vivas</li>
                <li><strong>Centrifugación diferencial:</strong> Separación de orgánulos por densidad</li>
                <li><strong>Cultivo celular:</strong> Crecimiento de células in vitro para experimentación</li>
                <li><strong>Citometría de flujo:</strong> Análisis y separación de células individuales</li>
            </ul>

            <hr>

            <!-- 2. AUTOR -->
            <h2>9. Autores históricos de la teoría celular</h2>
            
            <h3>Theodor Schwann (1810–1882)</h3>
            <p>Fisiólogo y biólogo alemán, <strong>cofundador de la teoría celular</strong> junto con Matthias Schleiden. Su contribución más importante fue extender el concepto de célula a los animales después de que Schleiden lo propusiera para plantas (1838).</p>
            <p><strong>Contribuciones principales:</strong></p>
            <ul>
                <li>En 1839 publicó "Investigaciones microscópicas sobre la concordancia en la estructura y el crecimiento de los animales y las plantas"</li>
                <li>Propuso que todos los organismos animales están formados por células</li>
                <li>Estableció que la célula es la unidad fundamental tanto de plantas como de animales</li>
                <li>Descubrió las células de Schwann (células gliales que forman la vaina de mielina en nervios periféricos)</li>
                <li>Descubrió la pepsina, primera enzima animal aislada</li>
                <li>Demostró que la fermentación es causada por organismos vivos (levaduras)</li>
            </ul>

            <h3>Otros científicos clave</h3>
            <ul>
                <li><strong>Robert Hooke (1665):</strong> Primero en observar células (corcho muerto) y acuñar el término "célula"</li>
                <li><strong>Anton van Leeuwenhoek (1670s):</strong> Primera observación de células vivas; descubrió protozoos, bacterias, espermatozoides</li>
                <li><strong>Matthias Schleiden (1838):</strong> Propuso que todas las plantas están formadas por células</li>
                <li><strong>Rudolf Virchow (1855):</strong> Estableció "omnis cellula e cellula" (toda célula proviene de otra célula), refutando la generación espontánea</li>
                <li><strong>Santiago Ramón y Cajal (1888):</strong> Demostró que las neuronas son células individuales (teoría neuronal)</li>
                <li><strong>Lynn Margulis (1967):</strong> Propuso la teoría endosimbiótica del origen de mitocondrias y cloroplastos</li>
            </ul>

            <hr>

            <!-- 3. VIDEO -->
            <h2>10. Video recomendado</h2>
            <p>Introducción visual a la célula y sus principales estructuras:</p>
            <div class="video-responsive">
                <iframe width="560" height="315" src="https://www.youtube.com/embed/tdY1HaWbYQY" title="La célula: partes y funciones (Video educativo)" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe>
            </div>
            <p><em>Video: "La célula: partes y funciones" /em></p>
            

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

            <h2>12. Conceptos clave para recordar</h2>
            <div class="conceptos-clave">
                <ul>
                    <li>✓ La célula es la unidad básica de la vida (teoría celular)</li>
                    <li>✓ Procariotas: sin núcleo; eucariotas: con núcleo</li>
                    <li>✓ Mitocondrias: producción de ATP (energía celular)</li>
                    <li>✓ Ribosomas: síntesis de proteínas</li>
                    <li>✓ RER: procesa proteínas; REL: sintetiza lípidos</li>
                    <li>✓ Aparato de Golgi: modifica y empaqueta proteínas</li>
                    <li>✓ Membrana plasmática: bicapa de fosfolípidos (mosaico fluido)</li>
                    <li>✓ Transporte pasivo: sin ATP, a favor del gradiente</li>
                    <li>✓ Transporte activo: con ATP, contra el gradiente</li>
                    <li>✓ Fase S del ciclo celular: replicación del ADN</li>
                    <li>✓ Mitosis: profase → metafase → anafase → telofase</li>
                    <li>✓ Células vegetales: pared celular, cloroplastos, vacuola central</li>
                </ul>
            </div>

            <hr>

            <h2>13. Recursos adicionales</h2>
            <ul>
                <li>📚 <strong>Libro recomendado:</strong> "Biología Celular y Molecular" - Lodish et al.</li>
                <li>🌐 <strong>Simuladores online:</strong> Busca "virtual cell simulator" para explorar células interactivamente</li>
                <li>🔬 <strong>Práctica:</strong> Si tienes acceso a un microscopio, observa células de cebolla (vegetales) y células de tu propia mejilla (animales)</li>
                <li>📺 <strong>Documentales:</strong> "El universo interior" (PBS) sobre el mundo celular</li>
            </ul>

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