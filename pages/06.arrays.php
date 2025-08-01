<?php 
    $page_title = "6. Guía Completa de Arrays";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
    <div class="container">
        <h1>Guía Completa de Arrays en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#creacion">Creación de Arrays</a></li>
                <li><a href="#acceso-modificacion">Acceso y Modificación</a></li>
                <li><a href="#iteracion">Iteración (Bucles)</a></li>
                <li><a href="#funciones-basicas">Funciones Básicas</a></li>
                <li><a href="#funciones-ordenamiento">Funciones de Ordenamiento</a></li>
                <li><a href="#funciones-combinacion">Combinación y Comparación</a></li>
            </ul>
        </nav>

        <section id="creacion" class="section">
            <h2>Creación de Arrays</h2>
            <p>Un array es una variable especial que puede contener múltiples valores bajo un solo nombre.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Array Indexado (claves numéricas)
$frutas = ["Manzana", "Banana", "Cereza"];

// 2. Array Asociativo (claves de texto)
$usuario = [
    "nombre" => "Carlos",
    "edad" => 30,
];

// 3. Array Multidimensional (arrays dentro de arrays)
$usuarios = [
    ["nombre" => "Ana", "email" => "ana@correo.com"],
    ["nombre" => "Luis", "email" => "luis@correo.com"]
];
?&gt;</code></pre>
            <h4>Salida del Código (usando `print_r`):</h4>
            <pre><?php
                echo "1. Array Indexado:\n";
                $frutas = ["Manzana", "Banana", "Cereza"];
                print_r($frutas);
                echo "\n2. Array Asociativo:\n";
                $usuario = ["nombre" => "Carlos", "edad" => 30];
                print_r($usuario);
                echo "\n3. Array Multidimensional:\n";
                $usuarios = [ ["nombre" => "Ana", "email" => "ana@correo.com"], ["nombre" => "Luis", "email" => "luis@correo.com"] ];
                print_r($usuarios);
            ?></pre>
        </section>

        <section id="acceso-modificacion" class="section">
            <h2>Acceso y Modificación de Elementos</h2>
            <p>Se accede, modifica y elimina elementos usando su clave entre corchetes `[]`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$config = ["tema" => "oscuro", "idioma" => "es"];

// Acceder
echo "Idioma actual: " . $config["idioma"] . "\n";

// Modificar
$config["idioma"] = "en";
echo "Idioma nuevo: " . $config["idioma"] . "\n";

// Añadir
$config["notificaciones"] = true;

// Eliminar
unset($config["tema"]);

print_r($config);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $config = ["tema" => "oscuro", "idioma" => "es"];
                echo "Idioma actual: " . $config["idioma"] . "\n";
                $config["idioma"] = "en";
                echo "Idioma nuevo: " . $config["idioma"] . "\n";
                $config["notificaciones"] = true;
                unset($config["tema"]);
                print_r($config);
            ?></pre>
        </section>

        <section id="iteracion" class="section">
            <h2>Iteración de Arrays (Bucles)</h2>
            <p>La forma más recomendada de recorrer un array es con el bucle <code>foreach</code>.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// foreach con clave y valor:
$puntuaciones = ["Juan" => 95, "Maria" => 88];
foreach ($puntuaciones as $nombre => $puntuacion) {
    echo "$nombre tiene una puntuación de $puntuacion.\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $puntuaciones = ["Juan" => 95, "Maria" => 88];
                foreach ($puntuaciones as $nombre => $puntuacion) { echo "$nombre tiene una puntuación de $puntuacion.\n"; }
            ?></pre>
        </section>

        <section id="funciones-basicas" class="section">
            <h2>Funciones Básicas de Arrays</h2>
            <p>Funciones esenciales para manipular y obtener información de arrays.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$numeros = [1, 5, 2, 5, 4, 1];

// count(): Contar elementos
echo "Total de elementos: " . count($numeros) . "\n";

// array_unique(): Eliminar valores duplicados
$numerosUnicos = array_unique($numeros);
print_r($numerosUnicos);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $numeros = [1, 5, 2, 5, 4, 1];
                echo "Total de elementos: " . count($numeros) . "\n";
                $numerosUnicos = array_unique($numeros);
                print_r($numerosUnicos);
            ?></pre>
        </section>

        <section id="funciones-ordenamiento" class="section">
            <h2>Funciones de Ordenamiento</h2>
            <p>Permiten ordenar arrays por valor o por clave.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$puntuaciones = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];

// asort(): Ordena por valor, manteniendo la clave
asort($puntuaciones);
print_r($puntuaciones);

// ksort(): Ordena por clave
ksort($puntuaciones);
print_r($puntuaciones);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $puntuaciones_asort = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];
                asort($puntuaciones_asort);
                echo "asort() (ordenado por valor):\n";
                print_r($puntuaciones_asort);

                $puntuaciones_ksort = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];
                ksort($puntuaciones_ksort);
                echo "\nksort() (ordenado por clave):\n";
                print_r($puntuaciones_ksort);
            ?></pre>
        </section>
        
        <section id="funciones-combinacion" class="section">
            <h2>Funciones de Combinación y Comparación</h2>
            <p>Operan con dos o más arrays para combinarlos o encontrar sus diferencias y similitudes.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$frontend = ["html", "css", "javascript"];
$backend = ["php", "mysql", "javascript"];

// array_merge(): Combina arrays
$stackCompleto = array_merge($frontend, $backend);

// array_diff(): Calcula la diferencia
$soloFrontend = array_diff($frontend, $backend);

// array_intersect(): Calcula la intersección
$tecnologiaComun = array_intersect($frontend, $backend);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $frontend = ["html", "css", "javascript"];
                $backend = ["php", "mysql", "javascript"];
                echo "array_merge():\n";
                print_r(array_merge($frontend, $backend));
                echo "\narray_diff():\n";
                print_r(array_diff($frontend, $backend));
                echo "\narray_intersect():\n";
                print_r(array_intersect($frontend, $backend));
            ?></pre>
        </section>

    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>