<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Clases y Objetos en PHP (POO)</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Guía de Clases y Objetos en PHP (POO)</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#clases-objetos">Clases y Objetos</a></li>
                <li><a href="#propiedades">Propiedades</a></li>
                <li><a href="#metodos">Métodos (Funciones)</a></li>
                <li><a href="#constructor">El Constructor</a></li>
                <li><a href="#this">La variable `$this`</a></li>
                <li><a href="#ejemplo-completo">Ejemplo Completo</a></li>
            </ul>
        </nav>

        <section id="clases-objetos" class="section">
            <h2>¿Qué son las Clases y los Objetos?</h2>
            <p>Una <strong>Clase</strong> es una plantilla o un "molde" para crear objetos. Un <strong>Objeto</strong> es una instancia de una clase; es la "cosa" real que creas a partir del molde.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Definimos la clase (el molde) para un Coche.
class Coche {}

// Creamos dos objetos (instancias) diferentes a partir de la clase Coche.
$cocheDeJuan = new Coche();
$cocheDeAna = new Coche();

var_dump($cocheDeJuan);
var_dump($cocheDeAna);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Coche_Demo {}
                $cocheDeJuan = new Coche_Demo();
                $cocheDeAna = new Coche_Demo();
                echo "Objeto 1:\n";
                var_dump($cocheDeJuan);
                echo "\nObjeto 2:\n";
                var_dump($cocheDeAna);
            ?></pre>
        </section>

        <section id="propiedades" class="section">
            <h2>Propiedades: Los Datos del Objeto</h2>
            <p>Las propiedades son como variables que pertenecen a una clase. Se accede a ellas con el operador flecha `->`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Usuario {
    public $nombre;
    public $email;
}

$usuario1 = new Usuario();
$usuario1->nombre = "Marta";
$usuario1->email = "marta@correo.com";

echo "Nombre: " . $usuario1->nombre;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Usuario_Propiedades_Demo {
                    public $nombre;
                    public $email;
                }
                $usuario1 = new Usuario_Propiedades_Demo();
                $usuario1->nombre = "Marta";
                $usuario1->email = "marta@correo.com";
                echo "Nombre: " . $usuario1->nombre . "\n";
                echo "Email: " . $usuario1->email . "\n";
            ?></pre>
        </section>
        
        <section id="metodos" class="section">
            <h2>Métodos: El Comportamiento del Objeto</h2>
            <p>Los métodos son funciones que pertenecen a una clase. Definen las acciones que un objeto puede realizar.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Producto {
    public $nombre = "Laptop";
    public $precio = 1200;

    public function mostrarInfo() {
        echo "Producto: " . $this->nombre . ", Precio: " . $this->precio . " USD";
    }
}

$miProducto = new Producto();
$miProducto->mostrarInfo(); // Llamamos al método
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Producto_Metodos_Demo {
                    public $nombre = "Laptop";
                    public $precio = 1200;
                    public function mostrarInfo() {
                        echo "Producto: " . $this->nombre . ", Precio: " . $this->precio . " USD";
                    }
                }
                $miProducto_demo = new Producto_Metodos_Demo();
                $miProducto_demo->mostrarInfo();
            ?></pre>
        </section>
        
        <section id="constructor" class="section">
            <h2>El Constructor: `__construct()`</h2>
            <p>Es un "método mágico" que se ejecuta automáticamente cuando se crea un nuevo objeto con `new`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Libro {
    public $titulo;
    public $autor;

    public function __construct($tituloInicial, $autorInicial) {
        $this->titulo = $tituloInicial;
        $this->autor = $autorInicial;
    }

    public function obtenerFicha() {
        return "'{$this->titulo}' por {$this->autor}";
    }
}

$libroFavorito = new Libro("Cien Años de Soledad", "Gabriel García Márquez");
echo $libroFavorito->obtenerFicha();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Libro_Demo {
                    public $titulo;
                    public $autor;
                    public function __construct($tituloInicial, $autorInicial) {
                        $this->titulo = $tituloInicial;
                        $this->autor = $autorInicial;
                    }
                    public function obtenerFicha() {
                        return "'{$this->titulo}' por {$this->autor}";
                    }
                }
                $libroFavorito = new Libro_Demo("Cien Años de Soledad", "Gabriel García Márquez");
                echo $libroFavorito->obtenerFicha();
            ?></pre>
        </section>

        <section id="this" class="section">
            <h2>La Pseudo-Variable `$this`</h2>
            <p>Dentro de un método, `$this` se refiere al objeto actual sobre el cual se está llamando el método.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class CuentaBancaria {
    public $saldo = 0;

    public function depositar($monto) {
        // $this->saldo se refiere al saldo de ESTE objeto
        $this->saldo += $monto;
    }

    public function getSaldo() {
        return $this->saldo;
    }
}

$miCuenta = new CuentaBancaria();
$miCuenta->depositar(100);

$tuCuenta = new CuentaBancaria();
$tuCuenta->depositar(50);

echo "Saldo de miCuenta: " . $miCuenta->getSaldo();
echo "\nSaldo de tuCuenta: " . $tuCuenta->getSaldo();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class CuentaBancaria_Demo {
                    public $saldo = 0;
                    public function depositar($monto) {
                        $this->saldo += $monto;
                    }
                    public function getSaldo() {
                        return $this->saldo;
                    }
                }
                $miCuenta = new CuentaBancaria_Demo();
                $miCuenta->depositar(100);
                $tuCuenta = new CuentaBancaria_Demo();
                $tuCuenta->depositar(50);
                echo "Saldo de miCuenta: " . $miCuenta->getSaldo();
                echo "\nSaldo de tuCuenta: " . $tuCuenta->getSaldo();
                echo "\n(Nota cómo cada objeto mantiene su propio saldo gracias a \$this)";
            ?></pre>
        </section>

        <section id="ejemplo-completo" class="section">
            <h2>Ejemplo Completo: Uniendo Todo</h2>
            <p>Veamos cómo todos estos conceptos trabajan juntos para modelar una entidad del mundo real.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Pelicula {
    public $titulo;
    public $director;
    private $alquilada = false; // private: solo accesible desde dentro

    public function __construct($titulo, $director) {
        $this->titulo = $titulo;
        $this->director = $director;
    }

    public function alquilar() {
        $this->alquilada = true;
    }
    
    public function estaDisponible() {
        return !$this->alquilada;
    }
}

$pelicula = new Pelicula("El Padrino", "Francis Ford Coppola");
echo "Disponible al inicio: " . ($pelicula->estaDisponible() ? 'Sí' : 'No') . "\n";
$pelicula->alquilar();
echo "Disponible después: " . ($pelicula->estaDisponible() ? 'Sí' : 'No') . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Pelicula_Demo {
                    public $titulo;
                    public $director;
                    private $alquilada = false;
                    public function __construct($titulo, $director) {
                        $this->titulo = $titulo;
                        $this->director = $director;
                    }
                    public function alquilar() { $this->alquilada = true; }
                    public function estaDisponible() { return !$this->alquilada; }
                }
                $pelicula = new Pelicula_Demo("El Padrino", "Francis Ford Coppola");
                echo "Disponible al inicio: " . ($pelicula->estaDisponible() ? 'Sí' : 'No') . "\n";
                $pelicula->alquilar();
                echo "Disponible después: " . ($pelicula->estaDisponible() ? 'Sí' : 'No') . "\n";
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>