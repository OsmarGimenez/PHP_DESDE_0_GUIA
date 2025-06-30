<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Salida en PHP: echo, print, print_r y var_dump</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Guía de Salida en PHP: echo, print, print_r y var_dump</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#echo">echo</a></li>
                <li><a href="#print">print</a></li>
                <li><a href="#print_r">print_r</a></li>
                <li><a href="#var_dump">var_dump</a></li>
                <li><a href="#comparacion">Tabla Comparativa</a></li>
            </ul>
        </nav>

        <section id="echo" class="section">
            <h2><code>echo</code></h2>
            <p>Es un <strong>constructor del lenguaje</strong> (no una función) usado para mostrar una o más cadenas. Es la forma más común y rápida de mostrar salida simple.</p>
            <ul>
                <li><strong>No devuelve ningún valor.</strong></li>
                <li>Puede aceptar múltiples argumentos separados por comas.</li>
            </ul>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Imprimir una cadena simple
echo "Bienvenido a la guía.";

// 2. Imprimir con etiquetas HTML
echo "&lt;h3&gt;Subtítulo desde echo&lt;/h3&gt;";

// 3. Usando múltiples argumentos (sin paréntesis)
echo "Hola", " ", "Mundo", "!";

// 4. Concatenando con el operador punto (.)
$usuario = "Administrador";
echo "El usuario actual es: " . $usuario;

// 5. Un error común: intentar usarlo como función con valor de retorno
// $resultado = echo "texto"; // Esto producirá un error de sintaxis
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Bienvenido a la guía.\n\n";
                echo "2. <h3>Subtítulo desde echo</h3>\n";
                echo "3. ";
                echo "Hola", " ", "Mundo", "!\n\n";
                $usuario = "Administrador";
                echo "4. El usuario actual es: " . $usuario . "\n\n";
                echo "5. Intentar asignar 'echo' a una variable causa un error y detiene el script.";
            ?></pre>
        </section>

        <section id="print" class="section">
            <h2><code>print</code></h2>
            <p>También es un <strong>constructor del lenguaje</strong>, muy similar a `echo`. La principal diferencia es que `print` siempre <strong>devuelve el valor `1`</strong>, lo que permite (aunque es raro) usarlo en expresiones.</p>
            <ul>
                <li><strong>Siempre devuelve `1`.</strong></li>
                <li>Solo puede aceptar un argumento.</li>
            </ul>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Imprimir una cadena simple
print "Esto se imprimió con print.";

// 2. Imprimir HTML
print "&lt;p&gt;Este es un párrafo.&lt;/p&gt;";

// 3. Concatenando (ya que solo acepta un argumento)
$rol = "Editor";
print "El rol del usuario es: " . $rol;

// 4. Usando su valor de retorno en una variable
$valorRetorno = print "Imprimiendo para obtener el retorno.";
echo "&lt;br&gt;El valor de retorno de print fue: " . $valorRetorno;

// 5. Usándolo dentro de una expresión (uso poco común)
($rol == "Editor") && print "&lt;br&gt;Acceso concedido al Editor.";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                print "1. Esto se imprimió con print.\n\n";
                print "2. <p>Este es un párrafo.</p>\n";
                $rol = "Editor";
                print "3. El rol del usuario es: " . $rol . "\n\n";
                echo "4. ";
                $valorRetorno = print "Imprimiendo para obtener el retorno.";
                echo "<br>El valor de retorno de print fue: " . $valorRetorno . "\n\n";
                echo "5. ";
                ($rol == "Editor") && print "<br>Acceso concedido al Editor.";
            ?></pre>
        </section>
        
        <section id="print_r" class="section">
            <h2><code>print_r()</code></h2>
            <p>Es una <strong>función</strong> que muestra la información de una variable en un formato <strong>legible para humanos</strong>. Es extremadamente útil para depurar arrays y objetos.</p>
            <ul>
                <li>Devuelve `true` si tiene éxito.</li>
                <li>Si su segundo argumento opcional se establece a `true`, devuelve la información como un string en lugar de imprimirla.</li>
            </ul>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Imprimir un array simple
$colores = ["Rojo", "Verde", "Azul"];
print_r($colores);

// 2. Imprimir un array asociativo
$config = ['usuario' => 'admin', 'pass' => '1234', 'activo' => true];
print_r($config);

// 3. Imprimir un objeto
$coche = (object)['marca' => 'Toyota', 'modelo' => 'Corolla'];
print_r($coche);

// 4. Capturando la salida en una variable
$infoArray = print_r($colores, true);
// echo "La información capturada es: " . $infoArray;

// 5. Imprimiendo un booleano (muestra 1 para true, nada para false)
print_r(false);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Array simple:\n";
                $colores = ["Rojo", "Verde", "Azul"];
                print_r($colores);
                echo "\n\n2. Array asociativo:\n";
                $config = ['usuario' => 'admin', 'pass' => '1234', 'activo' => true];
                print_r($config);
                echo "\n\n3. Objeto:\n";
                $coche = (object)['marca' => 'Toyota', 'modelo' => 'Corolla'];
                print_r($coche);
                $infoArray = print_r($colores, true);
                echo "\n\n4. Salida capturada en una variable (se guarda, no se muestra aquí directamente).\n\n";
                echo "5. Imprimiendo 'false' (no muestra nada visible):\n";
                print_r(false);
            ?></pre>
        </section>
        
        <section id="var_dump" class="section">
            <h2><code>var_dump()</code></h2>
            <p>Es una <strong>función</strong> que muestra información estructurada y detallada sobre una o más variables, incluyendo su **tipo, tamaño y valor**. Es la herramienta de depuración más precisa.</p>
            <ul>
                <li>No devuelve ningún valor.</li>
                <li>Muestra mucha más información que `print_r`.</li>
            </ul>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Volcar una cadena (string)
$texto = "Hola";
var_dump($texto);

// 2. Volcar un número entero (integer)
$numero = 123;
var_dump($numero);

// 3. Volcar un valor nulo (NULL)
$nada = null;
var_dump($nada);

// 4. Volcar un valor booleano
$esFalso = false;
var_dump($esFalso);

// 5. Volcar un array con tipos mixtos
$datosMixtos = [1, "manzana", true, 3.14, null];
var_dump($datosMixtos);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. String:\n";
                $texto = "Hola";
                var_dump($texto);
                echo "\n2. Integer:\n";
                $numero = 123;
                var_dump($numero);
                echo "\n3. NULL:\n";
                $nada = null;
                var_dump($nada);
                echo "\n4. Boolean:\n";
                $esFalso = false;
                var_dump($esFalso);
                echo "\n5. Array con tipos mixtos:\n";
                $datosMixtos = [1, "manzana", true, 3.14, null];
                var_dump($datosMixtos);
            ?></pre>
        </section>

        <section id="comparacion" class="section">
            <h2>Tabla Comparativa Rápida</h2>
            <table>
                <thead>
                    <tr>
                        <th>Característica</th>
                        <th><code>echo</code></th>
                        <th><code>print</code></th>
                        <th><code>print_r()</code></th>
                        <th><code>var_dump()</code></th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td><strong>Tipo</strong></td>
                        <td>Constructor</td>
                        <td>Constructor</td>
                        <td>Función</td>
                        <td>Función</td>
                    </tr>
                    <tr>
                        <td><strong>Valor de Retorno</strong></td>
                        <td>Ninguno</td>
                        <td><code>1</code> (siempre)</td>
                        <td><code>true</code> o un <code>string</code></td>
                        <td>Ninguno</td>
                    </tr>
                    <tr>
                        <td><strong>Argumentos</strong></td>
                        <td>Múltiples</td>
                        <td>Solo uno</td>
                        <td>Uno (segundo opcional)</td>
                        <td>Múltiples</td>
                    </tr>
                    <tr>
                        <td><strong>Uso Principal</strong></td>
                        <td>Mostrar salida simple (HTML, texto)</td>
                        <td>Igual que echo (poco común)</td>
                        <td>Depurar arrays/objetos (legible)</td>
                        <td>Depurar cualquier variable (muy detallado)</td>
                    </tr>
                </tbody>
            </table>
        </section>

        <?php include '_paginacion.php'; ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>