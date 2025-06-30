<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Avanzada de POO en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Guía Avanzada de POO en PHP</h1>
        <p style="text-align: center;">Namespaces, Clases Abstractas, Interfaces y Traits.</p>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#namespaces">Namespaces</a></li>
                <li><a href="#clases-abstractas">Clases Abstractas</a></li>
                <li><a href="#interfaces">Interfaces</a></li>
                <li><a href="#traits">Traits</a></li>
            </ul>
        </nav>

        <section id="namespaces" class="section">
            <h2>Namespaces (Espacios de Nombres)</h2>
            <p>Son una forma de organizar tu código y evitar conflictos de nombres. Piensa en ellos como carpetas para tus clases.</p>
            <div class="warning"><strong>Nota:</strong> La declaración <code>namespace</code> debe ser la primera línea en un archivo PHP. Aquí simularemos múltiples archivos para la demostración.</div>
            <h4>Código de Definición (en archivos separados):</h4>
            <pre><code class="language-php">&lt;?php
// --- Archivo: Tienda/Producto.php ---
namespace Tienda;
class Producto { /* ... */ }

// --- Archivo: Blog/Articulo.php ---
namespace Blog;
class Articulo { /* ... */ }

// --- Archivo: index.php ---
// require 'Tienda/Producto.php';
// require 'Blog/Articulo.php';

use Tienda\Producto;
use Blog\Articulo as Post; // Usando un alias

$productoTienda = new Producto();
$articuloBlog = new Post();
?&gt;</code></pre>
            <h4>Salida del Código (simulado en un solo bloque):</h4>
            <pre><?php
                class Producto_Tienda_Demo { public function __construct() { echo "Objeto Producto de Tienda creado.\n"; } }
                class Articulo_Blog_Demo { public function __construct() { echo "Objeto Articulo de Blog creado.\n"; } }
                $productoTienda = new Producto_Tienda_Demo();
                $articuloBlog = new Articulo_Blog_Demo();
                echo "// En un proyecto real, 'use' nos permitiría crear los objetos sin el sufijo '_Demo'.";
            ?></pre>
        </section>

        <section id="clases-abstractas" class="section">
            <h2>Clases y Métodos Abstractos</h2>
            <p>Una <strong>clase abstracta</strong> es una plantilla que no puede ser instanciada. Un <strong>método abstracto</strong> obliga a las clases hijas a implementar dicho método.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
abstract class ProcesadorDePago {
    // Método abstracto: obliga a las clases hijas a implementarlo
    abstract public function procesar($monto);
}

class PagoConTarjeta extends ProcesadorDePago {
    public function procesar($monto) {
        echo "Procesando \$" . $monto . " con Tarjeta de Crédito.\n";
    }
}
$pago = new PagoConTarjeta();
$pago->procesar(100);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                abstract class ProcesadorDePago_Demo {
                    abstract public function procesar($monto);
                }
                class PagoConTarjeta_Demo extends ProcesadorDePago_Demo {
                    public function procesar($monto) { echo "Procesando \$" . $monto . " con Tarjeta de Crédito.\n"; }
                }
                $pago = new PagoConTarjeta_Demo();
                $pago->procesar(100);
            ?></pre>
        </section>
        
        <section id="interfaces" class="section">
            <h2>Interfaces</h2>
            <p>Una interfaz es un "contrato" que define qué métodos debe implementar una clase, pero no cómo.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
interface Exportable {
    public function exportarCsv();
}

class InformeDeVentas implements Exportable {
    public function exportarCsv() {
        return "datos,de,ventas,en,csv\n";
    }
}
$informe = new InformeDeVentas();
echo $informe->exportarCsv();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                interface Exportable_Demo { public function exportarCsv(); }
                class InformeDeVentas_Demo implements Exportable_Demo {
                    public function exportarCsv() { return "datos,de,ventas,en,csv\n"; }
                }
                $informe = new InformeDeVentas_Demo();
                echo htmlentities($informe->exportarCsv());
            ?></pre>
        </section>
        
        <section id="traits" class="section">
            <h2>Traits</h2>
            <p>Son un mecanismo para reutilizar código. Permiten "mezclar" un conjunto de métodos en diferentes clases, sin necesidad de usar herencia.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
trait Logger {
    public function registrar($mensaje) {
        echo "[LOG]: " . $mensaje . "\n";
    }
}

class Articulo {
    use Logger; // "Usa" el trait para adquirir sus métodos

    public function guardar() {
        $this->registrar("El artículo ha sido guardado.");
    }
}

$articulo = new Articulo();
$articulo->guardar();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                trait Logger_Demo {
                    public function registrar($mensaje) { echo "[LOG]: " . $mensaje . "\n"; }
                }
                class Articulo_Demo {
                    use Logger_Demo;
                    public function guardar() { $this->registrar("El artículo ha sido guardado."); }
                }
                $articulo = new Articulo_Demo();
                $articulo->guardar();
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>