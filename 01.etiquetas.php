<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciación a PHP: Etiquetas y Sintaxis Básica</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Iniciación a PHP: Etiquetas y Sintaxis Básica</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#etiqueta-estandar">Etiqueta Estándar</a></li>
                <li><a href="#incrustar-php">Incrustar PHP en HTML</a></li>
                <li><a href="#echo">La Instrucción `echo`</a></li>
                <li><a href="#etiqueta-corta">Etiqueta Corta de `echo`</a></li>
                <li><a href="#comentarios">Comentarios en PHP</a></li>
                <li><a href="#variables">Variables y Concatenación</a></li>
            </ul>
        </nav>

        <section id="etiqueta-estandar" class="section">
            <h2>La Etiqueta Estándar: &lt;?php ... ?&gt;</h2>
            <p>Todo el código PHP debe estar encerrado entre estas etiquetas. Cuando el servidor encuentra `&lt;?php`, empieza a ejecutar el código que hay dentro hasta que encuentra la etiqueta de cierre `?&gt;`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Todo el código PHP se escribe aquí.
// Cada instrucción debe terminar con un punto y coma (;).
$miVariable = "Hola desde PHP";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre>Este bloque no produce una salida visible por sí mismo, solo define el espacio donde el código PHP será procesado por el servidor.</pre>
        </section>

        <section id="incrustar-php" class="section">
            <h2>Incrustar PHP en HTML</h2>
            <p>La gran ventaja de PHP es que puedes "salpicar" tu código HTML con bloques de PHP para generar contenido dinámico justo donde lo necesitas.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;h1&gt;Bienvenido a mi sitio web&lt;/h1&gt;

&lt;p&gt;Esta es una página estática, pero la fecha de hoy es dinámica:&lt;/p&gt;

&lt;?php
    // Usamos la función date() de PHP para obtener la fecha actual.
    echo "Hoy es " . date("d-m-Y");
?&gt;

&lt;p&gt;El resto del contenido HTML continúa aquí abajo.&lt;/p&gt;
</code></pre>
            <h4>Salida del Código:</h4>
            <h1>Bienvenido a mi sitio web</h1>
            <p>Esta es una página estática, pero la fecha de hoy es dinámica:</p>
            <?php
                echo "Hoy es " . date("d-m-Y");
            ?>
            <p>El resto del contenido HTML continúa aquí abajo.</p>
        </section>

        <section id="echo" class="section">
            <h2>La Instrucción `echo`</h2>
            <p>`echo` es la construcción más fundamental de PHP para enviar datos (texto, números, HTML) al navegador para que sean mostrados.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. Imprimir un texto simple
echo "Hola, mundo desde PHP.";

// 2. Imprimir HTML
echo "&lt;h3&gt;Este es un subtítulo generado por PHP&lt;/h3&gt;";

// 3. Imprimir el resultado de una operación matemática
echo "Dos más dos son: " . (2 + 2);

// 4. Imprimir múltiples argumentos (menos común)
echo "&lt;p&gt;", "Este párrafo", " fue creado ", "con varios argumentos.", "&lt;/p&gt;";

// 5. Imprimir una variable
$ciudad = "Asunción";
echo "Yo vivo en " . $ciudad;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Imprimir un texto simple\n";
                echo "Hola, mundo desde PHP.\n\n";
                echo "2. Imprimir HTML\n";
                echo "<h3>Este es un subtítulo generado por PHP</h3>\n";
                echo "3. Imprimir el resultado de una operación matemática\n";
                echo "Dos más dos son: " . (2 + 2) . "\n\n";
                echo "4. Imprimir múltiples argumentos\n";
                echo "<p>", "Este párrafo", " fue creado ", "con varios argumentos.", "</p>\n";
                $ciudad = "Asunción";
                echo "5. Imprimir una variable\n";
                echo "Yo vivo en " . $ciudad . "\n";
            ?></pre>
        </section>

        <section id="etiqueta-corta" class="section">
            <h2>La Etiqueta Corta de `echo`: &lt;?= ... ?&gt;</h2>
            <p>Esta es una forma abreviada y muy conveniente de `&lt;?php echo ...; ?&gt;`. Es perfecta para insertar rápidamente el valor de una variable o el resultado de una función dentro del HTML.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php $nombreUsuario = "Ana"; ?&gt;

&lt;p&gt;1. Bienvenida, &lt;?= $nombreUsuario ?&gt;.&lt;/p&gt;

&lt;p&gt;2. El año actual es &lt;?= date('Y') ?&gt;.&lt;/p&gt;

&lt;p&gt;3. Tu puntuación es: &lt;?= 100 * 2 ?&gt;.&lt;/p&gt;

&lt;input type="text" value="&lt;?= $nombreUsuario ?&gt;"&gt;

&lt;p title="&lt;?= 'Información de ' . $nombreUsuario ?&gt;"&gt;Pasa el ratón sobre mí.&lt;/p&gt;
</code></pre>
            <h4>Salida del Código:</h4>
            <?php $nombreUsuario = "Ana"; ?>
            <p>1. Bienvenida, <?= $nombreUsuario ?>.</p>
            <p>2. El año actual es <?= date('Y') ?>.</p>
            <p>3. Tu puntuación es: <?= 100 * 2 ?>.</p>
            <p>4. <input type="text" value="<?= $nombreUsuario ?>"></p>
            <p title="<?= 'Información de ' . $nombreUsuario ?>">5. Pasa el ratón sobre mí.</p>
        </section>

        <section id="comentarios" class="section">
            <h2>Comentarios en PHP</h2>
            <p>Los comentarios son ignorados por el servidor y sirven para dejar notas o explicaciones en el código para los programadores.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Este es un comentario de una sola línea.
$nombre = "Carlos"; // También puede ir al final de una instrucción.

# Este es otro estilo de comentario de una sola línea (menos común).
$edad = 30;

/*
  Este es un comentario
  de múltiples líneas. Es útil para
  explicaciones más detalladas o para desactivar
  temporalmente un bloque de código.
  $edad = 99; // Esta línea no se ejecutará.
*/
echo "Nombre: " . $nombre;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                // Este es un comentario de una sola línea.
                $nombre = "Carlos"; // También puede ir al final de una instrucción.
                # Este es otro estilo de comentario de una sola línea (menos común).
                $edad = 30;
                /*
                  Este es un comentario
                  de múltiples líneas. Es útil para
                  explicaciones más detalladas o para desactivar
                  temporalmente un bloque de código.
                  $edad = 99; // Esta línea no se ejecutará.
                */
                echo "Nombre: " . $nombre . "\n";
                echo "(La edad de 30 fue asignada pero no se mostró. El comentario de la edad de 99 fue ignorado).";
            ?></pre>
        </section>

        <section id="variables" class="section">
            <h2>Variables y Concatenación</h2>
            <p>Las variables te permiten guardar información para usarla después. El operador punto (`.`) te permite unir (concatenar) texto y variables.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$producto = "Laptop";
$precio = 999.95;
$moneda = "USD";
$disponible = true;

// Usamos el punto para unir las cadenas y variables
echo "El producto '" . $producto . "' tiene un precio de " . $precio . " " . $moneda . ".";

// Usando una variable booleana con un operador ternario
$estado = $disponible ? "Disponible" : "Agotado";
echo "&lt;br&gt;Estado: " . $estado;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $producto = "Laptop";
                $precio = 999.95;
                $moneda = "USD";
                $disponible = true;
                echo "El producto '" . $producto . "' tiene un precio de " . $precio . " " . $moneda . ".\n";
                $estado = $disponible ? "Disponible" : "Agotado";
                echo "Estado: " . $estado;
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>