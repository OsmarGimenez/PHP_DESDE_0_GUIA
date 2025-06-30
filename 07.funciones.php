<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Completa de Funciones en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Guía Completa de Funciones en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#definicion">Definir Funciones</a></li>
                <li><a href="#parametros">Parámetros y Retorno</a></li>
                <li><a href="#funciones-string">Funciones de String</a></li>
                <li><a href="#funciones-numero">Funciones Numéricas</a></li>
                <li><a href="#funciones-fecha">Funciones de Fecha y Hora</a></li>
                <li><a href="#incluir-archivos">Incluir Archivos</a></li>
            </ul>
        </nav>

        <section id="definicion" class="section">
            <h2>Definir y Llamar Funciones</h2>
            <p>Una función es un bloque de código reutilizable que realiza una tarea específica. Se define con la palabra clave <code>function</code> y se "llama" por su nombre para ejecutarla.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Definición de una función simple
function saludar() {
    echo "¡Hola! Bienvenido a mi sitio.\n";
}

// 2. Definición de otra función
function mostrarSeparador() {
    echo "--------------------\n";
}

// 3. Llamando a las funciones
saludar();
mostrarSeparador();
saludar();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function saludar_demo() {
                    echo "¡Hola! Bienvenido a mi sitio.\n";
                }
                function mostrarSeparador_demo() {
                    echo "--------------------\n";
                }
                saludar_demo();
                mostrarSeparador_demo();
                saludar_demo();
            ?></pre>
        </section>

        <section id="parametros" class="section">
            <h2>Parámetros y Valores de Retorno</h2>
            <p>Los <strong>parámetros</strong> son variables que reciben datos para que la función trabaje con ellos. La instrucción <code>return</code> permite que una función devuelva un resultado.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Función con un parámetro
function saludarUsuario($nombre) {
    echo "Hola, $nombre.\n";
}

// 2. Función con múltiples parámetros y un valor de retorno
function sumar($num1, $num2) {
    $resultado = $num1 + $num2;
    return $resultado;
}

// 3. Función con un parámetro opcional (valor por defecto)
function crearPedido($producto, $cantidad = 1) {
    echo "Pedido creado: $cantidad unidad(es) de $producto.\n";
}

// 4. Función que devuelve un booleano
function esMayorDeEdad($edad) {
    return $edad >= 18;
}

// Llamando a las funciones
saludarUsuario("Ana");
$sumaTotal = sumar(10, 5); // Guardamos el valor de retorno en una variable
echo "El resultado de la suma es: $sumaTotal.\n";
crearPedido("Laptop"); // Usa la cantidad por defecto (1)
crearPedido("Mouse", 5); // Especifica la cantidad
var_dump(esMayorDeEdad(25)); // var_dump muestra el 'true'
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function saludarUsuario_demo($nombre) {
                    echo "Hola, $nombre.\n";
                }
                function sumar_demo($num1, $num2) {
                    $resultado = $num1 + $num2;
                    return $resultado;
                }
                function crearPedido_demo($producto, $cantidad = 1) {
                    echo "Pedido creado: $cantidad unidad(es) de $producto.\n";
                }
                function esMayorDeEdad_demo($edad) {
                    return $edad >= 18;
                }

                saludarUsuario_demo("Ana");
                $sumaTotal = sumar_demo(10, 5);
                echo "El resultado de la suma es: $sumaTotal.\n";
                crearPedido_demo("Laptop");
                crearPedido_demo("Mouse", 5);
                var_dump(esMayorDeEdad_demo(25));
            ?></pre>
        </section>

        <section id="funciones-string" class="section">
            <h2>Funciones Comunes para Strings</h2>
            <p>PHP tiene una enorme librería de funciones para manipular cadenas de texto.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$frase = "  El rápido zorro marrón salta sobre el perro perezoso.  ";

// 1. strlen(): Obtiene la longitud del string
echo "Longitud original: " . strlen($frase) . "\n";

// 2. trim(): Elimina espacios en blanco al inicio y al final
$fraseLimpia = trim($frase);
echo "Frase limpia: '" . $fraseLimpia . "'\n";

// 3. strtoupper() y strtolower(): Cambiar a mayúsculas y minúsculas
echo "MAYÚSCULAS: " . strtoupper($fraseLimpia) . "\n";

// 4. str_replace(): Reemplazar texto
$fraseModificada = str_replace("marrón", "negro", $fraseLimpia);
echo "Reemplazado: " . $fraseModificada . "\n";

// 5. substr(): Extraer una parte del string
$extracto = substr($fraseLimpia, 10, 5);
echo "Extracto: '" . $extracto . "'\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $frase = "  El rápido zorro marrón salta sobre el perro perezoso.  ";
                echo "1. strlen(): Longitud original: " . strlen($frase) . "\n\n";
                $fraseLimpia = trim($frase);
                echo "2. trim(): Frase limpia: '" . $fraseLimpia . "'\n\n";
                echo "3. strtoupper(): " . strtoupper($fraseLimpia) . "\n\n";
                $fraseModificada = str_replace("marrón", "negro", $fraseLimpia);
                echo "4. str_replace(): " . $fraseModificada . "\n\n";
                $extracto = substr($fraseLimpia, 10, 5);
                echo "5. substr(): '" . $extracto . "'\n";
            ?></pre>
        </section>

        <section id="funciones-numero" class="section">
            <h2>Funciones Numéricas y Matemáticas</h2>
            <p>Funciones para formatear y realizar cálculos matemáticos.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$numeroGrande = 1234567.89;
$decimal = 4.3;

// 1. number_format(): Formatea un número
echo "Formateado: " . number_format($numeroGrande, 2, ',', '.') . "\n";

// 2. round(): Redondea al entero más cercano
echo "Redondeado: " . round($decimal) . "\n";

// 3. ceil(): Redondea siempre hacia arriba
echo "Redondeado arriba (ceil): " . ceil($decimal) . "\n";

// 4. floor(): Redondea siempre hacia abajo
echo "Redondeado abajo (floor): " . floor($decimal) . "\n";

// 5. rand() y mt_rand(): Genera un número entero aleatorio
echo "Número aleatorio (1-100): " . rand(1, 100) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $numeroGrande = 1234567.89; $decimal = 4.3;
                echo "1. number_format(): " . number_format($numeroGrande, 2, ',', '.') . "\n\n";
                echo "2. round(4.3): " . round($decimal) . "\n\n";
                echo "3. ceil(4.3): " . ceil($decimal) . "\n\n";
                echo "4. floor(4.3): " . floor($decimal) . "\n\n";
                echo "5. rand(1, 100): " . rand(1, 100) . " (variará en cada recarga)\n";
            ?></pre>
        </section>
        
        <section id="funciones-fecha" class="section">
            <h2>Funciones de Fecha y Hora</h2>
            <p>Permiten obtener y formatear la fecha y hora actual del servidor.</p>
             <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. date() para la fecha y hora completa
echo "Fecha y hora: " . date("Y-m-d H:i:s") . "\n";

// 2. date() para un formato legible
echo "Formato legible: " . date("l, d \d\e F \d\e Y") . "\n";

// 3. time(): Obtiene el timestamp actual
echo "Timestamp: " . time() . "\n";

// 4. strtotime(): Convierte texto a un timestamp
$timestampManana = strtotime("tomorrow");
echo "Mañana será: " . date("d-m-Y", $timestampManana) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Fecha y hora: " . date("Y-m-d H:i:s") . "\n\n";
                echo "2. Formato legible: " . date("l, d \d\e F \d\e Y") . "\n\n";
                echo "3. Timestamp: " . time() . "\n\n";
                $timestampManana = strtotime("tomorrow");
                echo "4. Mañana será: " . date("d-m-Y", $timestampManana) . "\n";
            ?></pre>
        </section>

        <section id="incluir-archivos" class="section">
            <h2>Incluir Archivos: `include`, `require`, `_once`</h2>
            <p>Estas construcciones te permiten dividir tu código en múltiples archivos para una mejor organización.</p>
            <div class="warning"><strong>Nota:</strong> Como este es un solo archivo, simularemos los archivos externos con comentarios. En un proyecto real, estos serían archivos `.php` separados.</div>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// --- Archivo: "config.php" (simulado) ---
// &lt;?php define("WEBSITE_NAME", "Mi Gran Sitio"); ?&gt;

// --- Archivo: "helpers.php" (simulado) ---
// &lt;?php function despedir() { return "¡Hasta luego!"; } ?&gt;


// 1. include: Si el archivo no existe, muestra un Warning y el script continúa.
@include "archivo_que_no_existe.php";

// 2. require: Si el archivo no existe, muestra un Fatal Error y el script se detiene.
// require "config.php"; // En un proyecto real, esto funcionaría.

// 3. require_once: La forma más segura. Incluye el archivo solo una vez.
// require_once "helpers.php";
// echo despedir();
?&gt;</code></pre>
            <h4>Salida y Explicación:</h4>
            <pre><?php
                echo "1. include 'archivo_que_no_existe.php';\n";
                @include "archivo_que_no_existe.php"; // Usamos @ para suprimir el warning en esta demo
                echo "   -> Se produce un 'Warning' pero el script sigue ejecutándose.\n\n";
                
                echo "2. require 'archivo_que_no_existe.php';\n";
                echo "   -> Produciría un 'Fatal Error' y detendría el script por completo.\n\n";

                echo "3. include_once y require_once:\n";
                echo "   -> Evitan errores al prevenir que un mismo archivo sea incluido múltiples veces. Es la práctica recomendada.\n";
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>