<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manejo de Errores y Excepciones en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Manejo de Errores y Excepciones en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#try-catch">Bloque `try...catch`</a></li>
                <li><a href="#finally">Bloque `finally`</a></li>
                <li><a href="#throw">Lanzar Excepciones (`throw`)</a></li>
                <li><a href="#custom-exceptions">Excepciones Personalizadas</a></li>
                <li><a href="#global-handler">Manejador Global</a></li>
                <li><a href="#logging">Registro de Logs</a></li>
            </ul>
        </nav>

        <section id="try-catch" class="section">
            <h2>El Bloque `try...catch`</h2>
            <p>Es la base del manejo de excepciones. El código que podría fallar se coloca en el bloque `try`. Si ocurre una excepción, la ejecución salta al bloque `catch`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
function dividir($dividendo, $divisor) {
    if ($divisor == 0) {
        throw new Exception("¡No se puede dividir por cero!");
    }
    return $dividendo / $divisor;
}

try {
    $resultado = dividir(10, 0);
} catch (Exception $e) {
    echo "Se ha producido una excepción: " . $e->getMessage();
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function dividir_demo_1($dividendo, $divisor) {
                    if ($divisor == 0) { throw new Exception("¡No se puede dividir por cero!"); }
                    return $dividendo / $divisor;
                }
                try {
                    $resultado = dividir_demo_1(10, 0);
                } catch (Exception $e) {
                    echo "Se ha producido una excepción: " . $e->getMessage();
                }
            ?></pre>
        </section>

        <section id="finally" class="section">
            <h2>El Bloque `finally`</h2>
            <p>El bloque <code>finally</code> contiene código que se ejecutará <strong>siempre</strong> al final, sin importar si hubo una excepción o no. Es ideal para tareas de "limpieza".</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
try {
    throw new Exception("Un error de ejemplo.");
} catch (Exception $e) {
    echo "Error capturado: " . $e->getMessage() . "\n";
} finally {
    echo "Este bloque 'finally' se ejecuta siempre.";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                try {
                    throw new Exception("Un error de ejemplo.");
                } catch (Exception $e) {
                    echo "Error capturado: " . $e->getMessage() . "\n";
                } finally {
                    echo "Este bloque 'finally' se ejecuta siempre.";
                }
            ?></pre>
        </section>
        
        <section id="throw" class="section">
            <h2>Lanzar Excepciones (`throw`)</h2>
            <p>La palabra clave <code>throw</code> se utiliza para lanzar una excepción manualmente.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
function validarEdadParaLicencia($edad) {
    if ($edad < 18) {
        throw new Exception("El solicitante es menor de edad.");
    }
    return true;
}

try {
    validarEdadParaLicencia(17);
} catch (Exception $e) {
    echo "No se pudo validar la edad: " . $e->getMessage();
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function validarEdadParaLicencia_demo($edad) {
                    if ($edad < 18) { throw new Exception("El solicitante es menor de edad."); }
                    return true;
                }
                try {
                    validarEdadParaLicencia_demo(17);
                } catch (Exception $e) {
                    echo "No se pudo validar la edad: " . $e->getMessage();
                }
            ?></pre>
        </section>
        
        <section id="custom-exceptions" class="section">
            <h2>Excepciones Personalizadas</h2>
            <p>Puedes crear tus propias clases de excepción para manejar diferentes tipos de errores de manera específica.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class ErrorDeConexionDB extends Exception {}

function conectarDB($host) {
    if ($host !== 'localhost') {
        throw new ErrorDeConexionDB("No se pudo conectar al host: " . $host);
    }
    return true;
}

try {
    conectarDB("servidor-remoto");
} catch (ErrorDeConexionDB $e) {
    echo "Error de DB específico: " . $e->getMessage();
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class ErrorDeConexionDB_demo extends Exception {}
                function conectarDB_demo($host) {
                    if ($host !== 'localhost') { throw new ErrorDeConexionDB_demo("No se pudo conectar al host: " . $host); }
                    return true;
                }
                try {
                    conectarDB_demo("servidor-remoto");
                } catch (ErrorDeConexionDB_demo $e) {
                    echo "Error de DB específico: " . $e->getMessage();
                }
            ?></pre>
        </section>

        <section id="global-handler" class="section">
            <h2>Manejador Global de Excepciones</h2>
            <p>Es una función "red de seguridad" para capturar cualquier excepción no atrapada en un bloque `try...catch`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
function manejadorGlobalDeExcepciones($exception) {
    echo "&lt;h2&gt;¡Ups! Algo salió mal.&lt;/h2&gt;";
    // Aquí se registraría el error en un log para el desarrollador.
}

set_exception_handler('manejadorGlobalDeExcepciones');

throw new Exception("Error fatal que nadie esperaba.");
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                function manejadorGlobalDeExcepciones_demo($exception) {
                    echo "<h2>¡Ups! Algo salió mal.</h2>";
                }
                // Para la demo, lo llamamos manualmente para no detener el script.
                manejadorGlobalDeExcepciones_demo(new Exception("Error fatal que nadie esperaba."));
            ?></pre>
        </section>

        <section id="logging" class="section">
            <h2>Registro de Logs (`error_log`)</h2>
            <p>En producción, nunca muestres errores al usuario. Muéstrale un mensaje amigable y registra el error detallado en un archivo de log para ti.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
try {
    // Simulamos un fallo
    throw new Exception("Fallo en la conexión con la API externa.");
} catch (Exception $e) {
    // 1. Mensaje genérico para el usuario
    echo "Lo sentimos, el servicio no está disponible en este momento.";

    // 2. Mensaje detallado para el log
    $fecha = date("Y-m-d H:i:s");
    $mensajeError = "[$fecha] " . $e->getMessage();

    // 3. Guardamos en un archivo de log.
    error_log($mensajeError . "\n", 3, "errores_aplicacion.log");
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                try {
                    throw new Exception("Fallo en la conexión con la API externa.");
                } catch (Exception $e) {
                    echo "Lo sentimos, el servicio no está disponible en este momento.";
                    $fecha = date("Y-m-d H:i:s");
                    $mensajeError = "[$fecha] " . $e->getMessage();
                    echo "\n\n<div class='log-output'><strong>Contenido que se guardaría en 'errores_aplicacion.log':</strong><br>" . htmlentities($mensajeError) . "</div>";
                }
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>