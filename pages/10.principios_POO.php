<?php 
    $page_title = "10. Guía de Principios de la POO";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
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
        if ($saldoInicial >= 0) {
            $this->saldo = $saldoInicial;
        } else {
            $this->saldo = 0;
        }
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
                class CuentaBancaria_P_Demo {
                    private $saldo;
                    public function __construct($saldoInicial) { if ($saldoInicial >= 0) { $this->saldo = $saldoInicial; } else { $this->saldo = 0; } }
                    public function depositar($monto) { $this->saldo += $monto; }
                    public function getSaldo() { return $this->saldo; }
                }
                $miCuenta = new CuentaBancaria_P_Demo(100);
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
}

$miCoche = new Coche("Toyota", "Corolla");
echo $miCoche->getInfo() . ", Modelo: " . $miCoche->modelo . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Vehiculo_P_Demo {
                    public $marca;
                    public function __construct($marca) { $this->marca = $marca; }
                    public function getInfo() { return "Marca: " . $this->marca; }
                }
                class Coche_P_Demo extends Vehiculo_P_Demo {
                    public $modelo;
                    public function __construct($marca, $modelo) { parent::__construct($marca); $this->modelo = $modelo; }
                }
                $miCoche = new Coche_P_Demo("Toyota", "Corolla");
                echo $miCoche->getInfo() . ", Modelo: " . $miCoche->modelo . "\n";
            ?></pre>
        </section>
        
        <section id="polimorfismo" class="section">
            <h2>3. Polimorfismo</h2>
            <p>Permite que objetos de diferentes clases respondan al mismo método de manera diferente, usualmente sobrescribiendo un método heredado.</p>
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
    public function agregarAgua() { $this->tieneAgua = true; }
    public function agregarCafe() { $this->tieneCafe = true; }

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
$miCafetera->agregarAgua();
$miCafetera->agregarCafe();
echo $miCafetera->prepararCafe();
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class Cafetera_Abs_Demo {
                    private $tieneAgua = false; private $tieneCafe = false;
                    public function agregarAgua() { $this->tieneAgua = true; }
                    public function agregarCafe() { $this->tieneCafe = true; }
                    public function prepararCafe() {
                        if ($this->tieneAgua && $this->tieneCafe) {
                            $this->calentarAgua(); $this->colarCafe(); return "¡Café listo!";
                        }
                        return "Error: Falta agua o café.";
                    }
                    private function calentarAgua() {}
                    private function colarCafe() {}
                }
                $miCafetera = new Cafetera_Abs_Demo();
                $miCafetera->agregarAgua();
                $miCafetera->agregarCafe();
                echo $miCafetera->prepararCafe();
            ?></pre>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>