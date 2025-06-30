<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Principios de la POO en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Principios de la POO en PHP</h1>
        <p style="text-align: center;">Una guía sobre Encapsulación, Herencia, Polimorfismo y Abstracción.</p>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#encapsulacion">Encapsulación</a></li>
                <li><a href="#herencia">Herencia</a></li>
                <li><a href="#polimorfismo">Polimorfismo</a></li>
                <li><a href="#abstraccion">Abstracción</a></li>
            </ul>
        </nav>

        <section id="encapsulacion" class="section">
            <h2>1. Encapsulación</h2>
            <p>Es el principio de "proteger" los datos de un objeto. Las propiedades importantes se marcan como <code>private</code> para que no se puedan modificar directamente desde fuera. El acceso se controla a través de métodos públicos (<code>public</code>).</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class CuentaBancaria {
    private $saldo; // Privado: solo accesible desde esta clase

    public function __construct($saldoInicial) {
        $this->saldo = $saldoInicial;
    }

    public function depositar($monto) {
        $this->saldo += $monto;
    }

    public function getSaldo() { // "Getter" para acceder al valor
        return $this->saldo;
    }
}

$miCuenta = new CuentaBancaria(100);
$miCuenta->depositar(50);
// $miCuenta->saldo = 1000000; // ¡ERROR FATAL! No se puede hacer.
echo "El saldo final es: " . $miCuenta->getSaldo();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class CuentaBancaria_Encapsulacion_Demo {
                    private $saldo;
                    public function __construct($saldoInicial) { $this->saldo = $saldoInicial; }
                    public function depositar($monto) { $this->saldo += $monto; }
                    public function getSaldo() { return $this->saldo; }
                }
                $miCuenta = new CuentaBancaria_Encapsulacion_Demo(100);
                $miCuenta->depositar(50);
                echo "El saldo final es: " . $miCuenta->getSaldo() . "\n";
                echo "// No podemos acceder a \$miCuenta->saldo directamente.";
            ?></pre>
        </section>

        <section id="herencia" class="section">
            <h2>2. Herencia</h2>
            <p>Permite a una clase ("hija") heredar las propiedades y métodos de otra clase ("padre") usando la palabra clave <code>extends</code>.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Clase Padre
class Vehiculo {
    public $marca;
    public function __construct($marca) {
        $this->marca = $marca;
    }
    public function getInfo() {
        return "Marca: " . $this->marca;
    }
}

// Clase Hija que hereda de Vehiculo
class Coche extends Vehiculo {
    public $modelo;
    public function __construct($marca, $modelo) {
        parent::__construct($marca); // Llama al constructor del padre
        $this->modelo = $modelo;
    }
    public function tocarBocina() {
        return "¡Beep, beep!";
    }
}

$miCoche = new Coche("Toyota", "Corolla");
echo $miCoche->getInfo() . ", Modelo: " . $miCoche->modelo . "\n"; // Usa método del padre
echo $miCoche->tocarBocina(); // Usa método propio
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Vehiculo_Herencia_Demo {
                    public $marca;
                    public function __construct($marca) { $this->marca = $marca; }
                    public function getInfo() { return "Marca: " . $this->marca; }
                }
                class Coche_Herencia_Demo extends Vehiculo_Herencia_Demo {
                    public $modelo;
                    public function __construct($marca, $modelo) { parent::__construct($marca); $this->modelo = $modelo; }
                    public function tocarBocina() { return "¡Beep, beep!"; }
                }
                $miCoche = new Coche_Herencia_Demo("Toyota", "Corolla");
                echo $miCoche->getInfo() . ", Modelo: " . $miCoche->modelo . "\n";
                echo $miCoche->tocarBocina();
            ?></pre>
        </section>
        
        <section id="polimorfismo" class="section">
            <h2>3. Polimorfismo</h2>
            <p>Significa "muchas formas". Permite que objetos de diferentes clases respondan al mismo método de manera diferente.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Animal {
    public function hacerSonido() {
        echo "Sonido genérico.\n";
    }
}
class Perro extends Animal {
    public function hacerSonido() { // Sobrescribe el método del padre
        echo "¡Guau! ¡Guau!\n";
    }
}
class Gato extends Animal {
    public function hacerSonido() { // Sobrescribe con otro comportamiento
        echo "¡Miau!\n";
    }
}
function escucharAnimal(Animal $animal) {
    $animal->hacerSonido();
}
escucharAnimal(new Perro());
escucharAnimal(new Gato());
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Animal_Poli_Demo {
                    public function hacerSonido() { echo "Sonido genérico.\n"; }
                }
                class Perro_Poli_Demo extends Animal_Poli_Demo {
                    public function hacerSonido() { echo "¡Guau! ¡Guau!\n"; }
                }
                class Gato_Poli_Demo extends Animal_Poli_Demo {
                    public function hacerSonido() { echo "¡Miau!\n"; }
                }
                function escucharAnimal_demo(Animal_Poli_Demo $animal) {
                    $animal->hacerSonido();
                }
                escucharAnimal_demo(new Perro_Poli_Demo());
                escucharAnimal_demo(new Gato_Poli_Demo());
            ?></pre>
        </section>
        
        <section id="abstraccion" class="section">
            <h2>4. Abstracción</h2>
            <p>Es el principio de ocultar la complejidad interna y exponer solo la funcionalidad esencial a través de métodos públicos.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class Cafetera {
    private $tieneAgua = false;
    private $tieneCafe = false;

    public function agregarAgua() { /* ... */ }
    public function agregarCafe() { /* ... */ }

    // Este es el método público que el usuario usa.
    // Oculta la complejidad de calentar, colar, etc.
    public function prepararCafe() {
        if ($this->tieneAgua && $this->tieneCafe) {
            $this->calentarAgua();
            $this->colarCafe();
            return "¡Café listo!";
        }
        return "Error: Falta agua o café.";
    }

    private function calentarAgua() { /* ... Lógica interna ... */ }
    private function colarCafe() { /* ... Lógica interna ... */ }
}

$miCafetera = new Cafetera();
// El usuario no necesita saber sobre calentar o colar.
// $miCafetera->agregarAgua();
// $miCafetera->agregarCafe();
// echo $miCafetera->prepararCafe();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Cafetera_Abs_Demo {
                    private $tieneAgua = false; private $tieneCafe = false;
                    public function agregarAgua() { $this->tieneAgua = true; echo "Agua añadida.\n"; }
                    public function agregarCafe() { $this->tieneCafe = true; echo "Café añadido.\n"; }
                    public function prepararCafe() {
                        echo "Iniciando preparación...\n";
                        if ($this->tieneAgua && $this->tieneCafe) {
                            $this->calentarAgua(); $this->colarCafe(); return "¡Café listo!\n";
                        }
                        return "Error: Falta agua o café.\n";
                    }
                    private function calentarAgua() { echo "...Calentando agua...\n"; }
                    private function colarCafe() { echo "...Colando el café...\n"; }
                }
                $miCafetera = new Cafetera_Abs_Demo();
                $miCafetera->agregarAgua();
                $miCafetera->agregarCafe();
                echo $miCafetera->prepararCafe();
                echo "\n// El usuario solo llamó a prepararCafe(), la complejidad interna está abstraída.";
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>