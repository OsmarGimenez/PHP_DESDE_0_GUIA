<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Completa de Arrays en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
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
            <p>Un array es una variable especial que puede contener múltiples valores bajo un solo nombre. Hay tres tipos principales.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Array Indexado: Las claves son números enteros (empezando en 0).
$frutas = ["Manzana", "Banana", "Cereza"];

// 2. Array Asociativo: Las claves son cadenas de texto (strings).
$usuario = [
    "nombre" => "Carlos",
    "edad" => 30,
    "ciudad" => "Asunción"
];

// 3. Array Multidimensional: Un array que contiene otros arrays.
$usuarios = [
    ["nombre" => "Ana", "email" => "ana@correo.com"],
    ["nombre" => "Luis", "email" => "luis@correo.com"]
];
?&gt;</code></pre>
            <h4>Salida del Código (usando `print_r` para visualizar):</h4>
            <pre><?php
                echo "1. Array Indexado:\n";
                $frutas = ["Manzana", "Banana", "Cereza"];
                print_r($frutas);

                echo "\n2. Array Asociativo:\n";
                $usuario = ["nombre" => "Carlos", "edad" => 30, "ciudad" => "Asunción"];
                print_r($usuario);

                echo "\n3. Array Multidimensional:\n";
                $usuarios = [ ["nombre" => "Ana", "email" => "ana@correo.com"], ["nombre" => "Luis", "email" => "luis@correo.com"] ];
                print_r($usuarios);
            ?></pre>
        </section>

        <section id="acceso-modificacion" class="section">
            <h2>Acceso y Modificación de Elementos</h2>
            <p>Se accede, modifica y elimina elementos usando su clave (índice o nombre) entre corchetes `[]`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$config = ["tema" => "oscuro", "idioma" => "es", "notificaciones" => true];

// 1. Acceder a un elemento
$temaActual = $config["tema"];

// 2. Modificar un elemento
$config["idioma"] = "en";

// 3. Añadir un nuevo elemento
$config["zonaHoraria"] = "America/Asuncion";

// 4. Añadir un elemento a un array indexado (al final)
$numeros = [10, 20, 30];
$numeros[] = 40;

// 5. Eliminar un elemento
unset($config["notificaciones"]);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $config = ["tema" => "oscuro", "idioma" => "es", "notificaciones" => true];
                echo "1. Acceso: El tema actual es '" . $config["tema"] . "'.\n";
                $config["idioma"] = "en";
                echo "2. Modificación: El idioma ahora es '" . $config["idioma"] . "'.\n";
                $config["zonaHoraria"] = "America/Asuncion";
                echo "3. Adición: Se añadió la zona horaria.\n";
                $numeros = [10, 20, 30];
                $numeros[] = 40;
                echo "4. Array de números ahora contiene: " . implode(', ', $numeros) . "\n";
                unset($config["notificaciones"]);
                echo "5. Array de configuración después de eliminar 'notificaciones':\n";
                print_r($config);
            ?></pre>
        </section>

        <section id="iteracion" class="section">
            <h2>Iteración de Arrays (Bucles)</h2>
            <p>La forma más común y eficiente de recorrer un array es con el bucle <code>foreach</code>.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// foreach con un array simple (solo obtener el valor):
$instrumentos = ["Guitarra", "Piano", "Batería"];
foreach ($instrumentos as $instrumento) {
    echo "Instrumento: $instrumento\n";
}

// foreach obteniendo clave y valor:
$puntuaciones = ["Juan" => 95, "Maria" => 88, "Pedro" => 76];
foreach ($puntuaciones as $nombre => $puntuacion) {
    echo "$nombre tiene una puntuación de $puntuacion.\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "foreach con solo valores:\n";
                $instrumentos = ["Guitarra", "Piano", "Batería"];
                foreach ($instrumentos as $instrumento) { echo "   Instrumento: $instrumento\n"; }
                echo "\nforeach con clave y valor:\n";
                $puntuaciones = ["Juan" => 95, "Maria" => 88, "Pedro" => 76];
                foreach ($puntuaciones as $nombre => $puntuacion) { echo "   $nombre tiene una puntuación de $puntuacion.\n"; }
            ?></pre>
        </section>

        <section id="funciones-basicas" class="section">
            <h2>Funciones Básicas de Arrays</h2>
            <p>PHP ofrece cientos de funciones para trabajar con arrays. Aquí están algunas de las más esenciales.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$numeros = [1, 5, 2, 5, 4, 1];
$listaDeComprasStr = "leche,pan,huevos";

// 1. count(): Contar elementos
$totalNumeros = count($numeros);

// 2. array_unique(): Eliminar valores duplicados
$numerosUnicos = array_unique($numeros);

// 3. in_array(): Verificar si un valor existe
$existeElCinco = in_array(5, $numeros);

// 4. implode(): Unir elementos de un array en un string
$listaCsv = implode(", ", $numerosUnicos);

// 5. explode(): Crear un array desde un string
$listaDeComprasArr = explode(",", $listaDeComprasStr);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $numeros = [1, 5, 2, 5, 4, 1];
                $listaDeComprasStr = "leche,pan,huevos";
                echo "1. count(): Hay " . count($numeros) . " números en el array original.\n\n";
                $numerosUnicos = array_unique($numeros);
                echo "2. array_unique():\n"; print_r($numerosUnicos); echo "\n";
                echo "3. in_array(5): "; var_dump(in_array(5, $numeros)); echo "\n";
                $listaCsv = implode(", ", $numerosUnicos);
                echo "4. implode(): '" . $listaCsv . "'\n\n";
                $listaDeComprasArr = explode(",", $listaDeComprasStr);
                echo "5. explode():\n"; print_r($listaDeComprasArr);
            ?></pre>
        </section>

        <section id="funciones-ordenamiento" class="section">
            <h2>Funciones de Ordenamiento</h2>
            <p>Permiten ordenar los arrays de distintas maneras: por valor, por clave, en orden ascendente o descendente.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$puntuaciones = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];

// asort(): Ordena un array asociativo por valor, manteniendo la asociación de clave
asort($puntuaciones);

// ksort(): Ordena un array asociativo por clave
ksort($puntuaciones);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $puntuaciones_asort = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];
                asort($puntuaciones_asort);
                echo "asort() (ordena por valor, mantiene clave):\n";
                print_r($puntuaciones_asort);

                $puntuaciones_ksort = ["Juan" => 95, "Maria" => 88, "Pedro" => 100];
                ksort($puntuaciones_ksort);
                echo "\nksort() (ordena por clave):\n";
                print_r($puntuaciones_ksort);
            ?></pre>
        </section>
        
        <section id="funciones-combinacion" class="section">
            <h2>Funciones de Combinación y Comparación</h2>
            <p>Estas funciones operan con dos o más arrays para combinarlos o encontrar sus diferencias y similitudes.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$frontend = ["html", "css", "javascript"];
$backend = ["php", "mysql", "javascript"];

// 1. array_merge(): Combina dos o más arrays
$stackCompleto = array_merge($frontend, $backend);

// 2. array_diff(): Calcula la diferencia (lo que está en el 1ro pero no en los otros)
$soloFrontend = array_diff($frontend, $backend);

// 3. array_intersect(): Calcula la intersección (lo que tienen en común)
$tecnologiaComun = array_intersect($frontend, $backend);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $frontend = ["html", "css", "javascript"];
                $backend = ["php", "mysql", "javascript"];

                $stackCompleto = array_merge($frontend, $backend);
                echo "1. array_merge(): (javascript aparece dos veces)\n";
                print_r($stackCompleto);

                $soloFrontend = array_diff($frontend, $backend);
                echo "\n2. array_diff(): (lo que solo tiene frontend)\n";
                print_r($soloFrontend);

                $tecnologiaComun = array_intersect($frontend, $backend);
                echo "\n3. array_intersect(): (lo que tienen en común)\n";
                print_r($tecnologiaComun);
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>