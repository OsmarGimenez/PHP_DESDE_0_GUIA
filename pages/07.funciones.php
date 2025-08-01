<?php 
    $page_title = "7. Guía Completa de Funciones";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
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
function saludar() {
    echo "¡Hola! Bienvenido a mi sitio.\n";
}
function mostrarSeparador() {
    echo "--------------------\n";
}
saludar();
mostrarSeparador();
saludar();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function saludar_f_demo() { echo "¡Hola! Bienvenido a mi sitio.\n"; }
                function mostrarSeparador_f_demo() { echo "--------------------\n"; }
                saludar_f_demo();
                mostrarSeparador_f_demo();
                saludar_f_demo();
            ?></pre>
        </section>

        <section id="parametros" class="section">
            <h2>Parámetros y Valores de Retorno</h2>
            <p>Los <strong>parámetros</strong> son variables que reciben datos para que la función trabaje con ellos. La instrucción <code>return</code> permite que una función devuelva un resultado.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
function saludarUsuario($nombre) {
    echo "Hola, $nombre.\n";
}

function sumar($num1, $num2) {
    return $num1 + $num2;
}

function crearPedido($producto, $cantidad = 1) {
    echo "Pedido creado: $cantidad de $producto.\n";
}

saludarUsuario("Ana");
$sumaTotal = sumar(10, 5);
echo "La suma es: $sumaTotal.\n";
crearPedido("Laptop");
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function saludarUsuario_f_demo($nombre) { echo "Hola, $nombre.\n"; }
                function sumar_f_demo($num1, $num2) { return $num1 + $num2; }
                function crearPedido_f_demo($producto, $cantidad = 1) { echo "Pedido creado: $cantidad de $producto.\n"; }
                saludarUsuario_f_demo("Ana");
                $sumaTotal = sumar_f_demo(10, 5);
                echo "La suma es: $sumaTotal.\n";
                crearPedido_f_demo("Laptop");
            ?></pre>
        </section>

        <section id="funciones-string" class="section">
            <h2>Funciones Comunes para Strings</h2>
            <p>PHP tiene una enorme librería de funciones para manipular cadenas de texto.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$frase = "  El zorro marrón.  ";
echo "Longitud: " . strlen($frase) . "\n";
echo "Sin espacios: '" . trim($frase) . "'\n";
echo "Mayúsculas: " . strtoupper($frase) . "\n";
echo "Reemplazado: " . str_replace("marrón", "negro", $frase) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $frase = "  El zorro marrón.  ";
                echo "Longitud: " . strlen($frase) . "\n";
                echo "Sin espacios: '" . trim($frase) . "'\n";
                echo "Mayúsculas: " . strtoupper($frase) . "\n";
                echo "Reemplazado: " . str_replace("marrón", "negro", $frase) . "\n";
            ?></pre>
        </section>

        <section id="funciones-numero" class="section">
            <h2>Funciones Numéricas y Matemáticas</h2>
            <p>Funciones para formatear y realizar cálculos matemáticos.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
echo "Redondeado (4.3): " . round(4.3) . "\n";
echo "Redondeado arriba (4.3): " . ceil(4.3) . "\n";
echo "Redondeado abajo (4.7): " . floor(4.7) . "\n";
echo "Número aleatorio (1-100): " . rand(1, 100) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "Redondeado (4.3): " . round(4.3) . "\n";
                echo "Redondeado arriba (4.3): " . ceil(4.3) . "\n";
                echo "Redondeado abajo (4.7): " . floor(4.7) . "\n";
                echo "Número aleatorio (1-100): " . rand(1, 100) . "\n";
            ?></pre>
        </section>
        
        <section id="funciones-fecha" class="section">
            <h2>Funciones de Fecha y Hora</h2>
            <p>Permiten obtener y formatear la fecha y hora actual del servidor.</p>
             <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
echo "Fecha y hora: " . date("Y-m-d H:i:s") . "\n";
echo "Timestamp: " . time() . "\n";
$timestampManana = strtotime("tomorrow");
echo "Mañana será: " . date("d-m-Y", $timestampManana) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "Fecha y hora: " . date("Y-m-d H:i:s") . "\n";
                echo "Timestamp: " . time() . "\n";
                $timestampManana = strtotime("tomorrow");
                echo "Mañana será: " . date("d-m-Y", $timestampManana) . "\n";
            ?></pre>
        </section>

        <section id="incluir-archivos" class="section">
            <h2>Incluir Archivos: `include`, `require`, `_once`</h2>
            <p>Permiten dividir tu código en múltiples archivos para una mejor organización.</p>
            <div class="warning"><strong>Nota:</strong> En un proyecto real, `require_once` es la opción más segura y recomendada.</div>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// include: Si el archivo no existe, muestra un Warning y el script continúa.
@include "archivo_que_no_existe.php";
echo "El script sigue después de un include fallido.\n";

// require: Si el archivo no existe, muestra un Fatal Error y el script se detiene.
// require "archivo_que_no_existe.php";
// echo "Esta línea nunca se ejecutaría.";
?&gt;</code></pre>
            <h4>Salida y Explicación:</h4>
            <pre><?php
                @include "archivo_que_no_existe.php";
                echo "El script sigue después de un include fallido.\n\n";
                echo "Usar 'require' con un archivo inexistente detendría el script por completo (Error Fatal).\n";
            ?></pre>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>