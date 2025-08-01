<?php 
    $page_title = "3. Guía de Variables y Constantes";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
    <div class="container">
        <h1>Guía de Definición de Variables y Constantes en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#escalares">Variables Escalares</a></li>
                <li><a href="#compuestas">Variables Compuestas</a></li>
                <li><a href="#especiales">Variables Especiales</a></li>
                <li><a href="#constantes">Constantes</a></li>
            </ul>
        </nav>

        <section id="escalares" class="section">
            <h2>Variables Escalares</h2>
            <p>Contienen un único valor, como un número, un texto o un valor booleano.</p>
            
            <h3>Integer (Entero)</h3>
            <pre><code class="language-php">&lt;?php
$userId = 101;
$productCount = 50;
$maxScore = -99;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $userId = 101; $productCount = 50; $maxScore = -99;
                echo "userId: $userId\n";
                echo "productCount: $productCount\n";
                echo "maxScore: $maxScore\n";
            ?></pre>

            <h3>Float (Decimal)</h3>
            <pre><code class="language-php">&lt;?php
$productPrice = 19.99;
$taxRate = 0.21;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $productPrice = 19.99; $taxRate = 0.21;
                echo "productPrice: $productPrice\n";
                echo "taxRate: $taxRate\n";
            ?></pre>

            <h3>String (Cadena de texto)</h3>
            <pre><code class="language-php">&lt;?php
$fullName = "Ana Sofía Pérez";
$errorMessage = "Error: El campo 'nombre' no puede estar vacío.";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $fullName = "Ana Sofía Pérez"; $errorMessage = "Error: El campo 'nombre' no puede estar vacío.";
                echo "fullName: $fullName\n";
                echo "errorMessage: $errorMessage\n";
            ?></pre>

            <h3>Boolean (Booleano)</h3>
            <pre><code class="language-php">&lt;?php
$isUserLoggedIn = true;
$isAdmin = false;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $isUserLoggedIn = true; $isAdmin = false;
                echo "isUserLoggedIn: " . ($isUserLoggedIn ? 'true' : 'false') . "\n";
                echo "isAdmin: " . ($isAdmin ? 'true' : 'false') . "\n";
            ?></pre>
        </section>

        <section id="compuestas" class="section">
            <h2>Variables Compuestas</h2>
            <p>Pueden almacenar múltiples valores en una sola variable.</p>
            
            <h3>Array</h3>
            <pre><code class="language-php">&lt;?php
$weekDays = ["Lunes", "Martes", "Miércoles"];
$dbConfig = ["host" => "localhost", "user" => "root"];
?&gt;</code></pre>
            <h4>Salida del Código (usando `print_r`):</h4>
            <pre><?php
                $weekDays = ["Lunes", "Martes", "Miércoles"];
                $dbConfig = ["host" => "localhost", "user" => "root"];
                echo "weekDays:\n"; print_r($weekDays);
                echo "\ndbConfig:\n"; print_r($dbConfig);
            ?></pre>
            
            <h3>Object (Objeto)</h3>
            <pre><code class="language-php">&lt;?php
class User {
    public $name;
    public function __construct($name) { 
        $this->name = $name; 
    }
}
$user1 = new User("Carlos Ruiz");
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class User_V_Demo {
                    public $name;
                    public function __construct($name) { $this->name = $name; }
                }
                $user1_v = new User_V_Demo("Carlos Ruiz");
                print_r($user1_v);
            ?></pre>
        </section>
        
        <section id="especiales" class="section">
            <h2>Variables Especiales</h2>
            <h3>Resource (Recurso)</h3>
            <p>Representa un recurso externo, como un archivo abierto.</p>
            <pre><code class="language-php">&lt;?php
$fileHandle = @fopen("test.txt", "w");
echo "Tipo de dato: " . gettype($fileHandle);
if ($fileHandle) { fclose($fileHandle); }
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $fileHandle = @fopen("test.txt", "w");
                echo "Tipo de dato: " . gettype($fileHandle);
                if ($fileHandle) { fclose($fileHandle); }
            ?></pre>

            <h3>NULL</h3>
            <p>Indica que una variable no tiene valor.</p>
            <pre><code class="language-php">&lt;?php
$valorNulo = null;
var_dump($valorNulo);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $valorNulo = null;
                var_dump($valorNulo);
            ?></pre>
        </section>

        <section id="constantes" class="section">
            <h2>Constantes</h2>
            <p>Identificadores para un valor que no puede cambiar.</p>
            <h3>Definidas con `define()`</h3>
            <pre><code class="language-php">&lt;?php
define("VERSION", "1.0.3");
echo "Versión de la App: " . VERSION;
?&gt;</code></pre>
             <h3>Definidas con `const`</h3>
             <pre><code class="language-php">&lt;?php
const TASA_IVA = 0.21;
echo "Tasa de IVA: " . TASA_IVA;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                define("VERSION_DEMO", "1.0.3");
                echo "define(): Versión de la App: " . VERSION_DEMO . "\n";
                const TASA_IVA_DEMO = 0.21;
                echo "const: Tasa de IVA: " . TASA_IVA_DEMO;
            ?></pre>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>