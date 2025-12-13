<div class="container">
    <h1>Iniciación a PHP: Fundamentos y Sintaxis</h1>

    <nav class="nav-index">
        <h2>Índice Rápido del Tema</h2>
        <ul>
            <li><a href="#intro-php">¿Qué es PHP?</a></li>
            <li><a href="#requisitos">¿Qué se necesita?</a></li>
            <li><a href="#consideraciones">Consideraciones Clave</a></li>
            <li><a href="#etiqueta-estandar">Etiqueta Estándar</a></li>
            <li><a href="#incrustar-php">Incrustar PHP</a></li>
            <li><a href="#echo">`echo`</a></li>
            <li><a href="#etiqueta-corta">Etiqueta Corta</a></li>
            <li><a href="#comentarios">Comentarios</a></li>
            <li><a href="#variables">Variables</a></li>
        </ul>
    </nav>

    <section id="intro-php" class="section">
        <h2>¿Qué es PHP y para qué sirve?</h2>
        <p>
            PHP (acrónimo recursivo de <strong>PHP: Hypertext Preprocessor</strong>) es un lenguaje de programación de código abierto muy popular, especialmente adecuado para el desarrollo web del lado del servidor.
        </p>
        <p>Su función principal es procesar información en el servidor para generar páginas web dinámicas antes de enviarlas al navegador del usuario.</p>
        <h4>Sirve para:</h4>
        <ul>
            <li>Crear sitios web y aplicaciones web dinámicas.</li>
            <li>Conectarse y manipular bases de datos (como MySQL, PostgreSQL, etc.).</li>
            <li>Procesar datos de formularios enviados por el usuario.</li>
            <li>Gestionar sesiones de usuario y cookies.</li>
            <li>Crear APIs (Interfaces de Programación de Aplicaciones).</li>
        </ul>
    </section>

    <section id="requisitos" class="section">
        <h2>¿Qué se necesita para empezar?</h2>
        <p>Para escribir y ejecutar código PHP en tu máquina local, necesitas un entorno de desarrollo que simule un servidor web.</p>
        <ol>
            <li><strong>Servidor Web con PHP:</strong> La forma más sencilla es instalar un paquete "todo en uno" como <strong>XAMPP</strong>, MAMP o WampServer. Estos paquetes incluyen el servidor Apache, PHP y la base de datos MySQL.</li>
            <li><strong>Editor de Código:</strong> Un programa para escribir tu código. Opciones populares son <strong>Visual Studio Code</strong>, Sublime Text o PhpStorm.</li>
            <li><strong>Navegador Web:</strong> Cualquier navegador moderno como Chrome o Firefox.</li>
        </ol>
    </section>

    <section id="consideraciones" class="section">
            <h2>Consideraciones Clave del Lenguaje</h2>
        <ul>
            <li><strong>Sintaxis Embebida:</strong> El código PHP se escribe dentro de etiquetas especiales <code>&lt;?php ... ?&gt;</code> y puede ser incrustado directamente en un archivo HTML.</li>
            <li><strong>Ejecución en el Servidor:</strong> El usuario nunca ve el código PHP. El servidor lo ejecuta y el navegador solo recibe el resultado, que generalmente es HTML.</li>
            <li><strong>Tipado Débil:</strong> No es necesario declarar el tipo de dato de una variable antes de usarla. PHP lo determina automáticamente.</li>
            <li><strong>Terminación de Sentencias:</strong> Cada instrucción en PHP debe terminar con un punto y coma (<code>;</code>).</li>
            <li><strong>Variables:</strong> Todas las variables en PHP comienzan con el símbolo de dólar (<code>$</code>), por ejemplo: <code>$nombre</code>, <code>$edad</code>.</li>
        </ul>
    </section>

    <section id="etiqueta-estandar" class="section">
        <h2>La Etiqueta Estándar: &lt;?php ... ?&gt;</h2>
        <p>Es la etiqueta principal donde se escribe el código PHP.</p>
        <pre><code class="language-php">&lt;?php
// Código PHP aquí
?&gt;</code></pre>
    </section>

    <section id="incrustar-php" class="section">
        <h2>Incrustar PHP en HTML</h2>
        <p>Puedes generar contenido dinámico directamente en tu HTML.</p>
        <h4>Código de Definición:</h4>
        <pre><code class="language-php">&lt;p&gt;La fecha de hoy es: &lt;strong&gt;&lt;?php echo date("d-m-Y"); ?&gt;&lt;/strong&gt;.&lt;/p&gt;</code></pre>
        <h4>Salida del Código:</h4>
        <div class="output-container">
            <p>La fecha de hoy es: <strong><?php echo date("d-m-Y"); ?></strong>.</p>
        </div>
    </section>

    <section id="echo" class="section">
        <h2>La Instrucción `echo`</h2>
        <p>`echo` es la construcción más fundamental para enviar datos al navegador.</p>
        <h4>Código de Definición:</h4>
        <pre><code class="language-php">&lt;?php
echo "&lt;h3&gt;Este es un subtítulo generado por PHP&lt;/h3&gt;";
?&gt;</code></pre>
        <h4>Salida del Código:</h4>
        <div class="output-container">
            <?php echo "<h3>Este es un subtítulo generado por PHP</h3>"; ?>
        </div>
    </section>

    <section id="etiqueta-corta" class="section">
        <h2>La Etiqueta Corta de `echo`: &lt;?= ... ?&gt;</h2>
        <p>Es un atajo para `&lt;?php echo ...; ?&gt;`.</p>
        <h4>Código de Definición:</h4>
        <pre><code class="language-php">&lt;p&gt;El año actual es &lt;?= date('Y') ?&gt;.&lt;/p&gt;</code></pre>
        <h4>Salida del Código:</h4>
        <div class="output-container">
            <p>El año actual es <?= date('Y') ?>.</p>
        </div>
    </section>

    <section id="comentarios" class="section">
        <h2>Comentarios en PHP</h2>
        <p>Los comentarios son ignorados por el servidor y sirven para dejar notas en el código.</p>
        <pre><code class="language-php">&lt;?php
// Comentario de una sola línea.
# Este es otro estilo de comentario.

/*
  Comentario de
  múltiples líneas.
*/
?&gt;</code></pre>
    </section>

    <section id="variables" class="section">
        <h2>Variables y Concatenación</h2>
        <p>Las variables (<code>$</code>) guardan información. El punto (<code>.</code>) une o "concatena" cadenas.</p>
        <pre><code class="language-php">&lt;?php
$producto = "Laptop";
$precio = 999.95;
echo "El producto '" . $producto . "' cuesta " . $precio . " USD.";
?&gt;</code></pre>
        <h4>Salida del Código:</h4>
        <div class="output-container">
            <?php $producto = "Laptop"; $precio = 999.95; echo "El producto '" . $producto . "' cuesta " . $precio . " USD."; ?>
        </div>
    </section>
</div>