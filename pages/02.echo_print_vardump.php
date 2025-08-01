<?php 
    $page_title = "2. Guía de Salida en PHP";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
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
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Imprimir con etiquetas HTML
echo "&lt;h3&gt;Subtítulo desde echo&lt;/h3&gt;";

// Usando múltiples argumentos
echo "Hola", " ", "Mundo", "!";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <div class="output-container">
                <?php
                    echo "<h3>Subtítulo desde echo</h3>";
                    echo "Hola", " ", "Mundo", "!";
                ?>
            </div>
        </section>

        <section id="print" class="section">
            <h2><code>print</code></h2>
            <p>Muy similar a `echo`, pero siempre devuelve el valor `1` y solo puede aceptar un argumento.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Imprimir una cadena simple
print "Esto se imprimió con print.";

// Usando su valor de retorno (uso poco común)
if (print "") {
    echo " (print devolvió 1)";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <div class="output-container">
                <?php
                    print "Esto se imprimió con print.";
                    if (print "") {
                        echo " (print devolvió 1)";
                    }
                ?>
            </div>
        </section>
        
        <section id="print_r" class="section">
            <h2><code>print_r()</code></h2>
            <p>Una función que muestra la información de una variable (especialmente arrays y objetos) en un formato legible para humanos.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Imprimir un array asociativo
$config = ['usuario' => 'admin', 'activo' => true];
print_r($config);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $config = ['usuario' => 'admin', 'pass' => '1234', 'activo' => true];
                print_r($config);
            ?></pre>
        </section>
        
        <section id="var_dump" class="section">
            <h2><code>var_dump()</code></h2>
            <p>Muestra información detallada sobre una variable, incluyendo su tipo, tamaño y valor. Es la herramienta de depuración más precisa.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Volcar un array con tipos mixtos
$datosMixtos = [1, "manzana", true];
var_dump($datosMixtos);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
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
                        <td><code>true</code> o `string`</td>
                        <td>Ninguno</td>
                    </tr>
                    <tr>
                        <td><strong>Uso Principal</strong></td>
                        <td>Salida simple (HTML, texto)</td>
                        <td>Igual que `echo`</td>
                        <td>Depurar arrays (legible)</td>
                        <td>Depurar variables (detallado)</td>
                    </tr>
                </tbody>
            </table>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>