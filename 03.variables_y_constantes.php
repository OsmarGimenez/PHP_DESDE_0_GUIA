<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Definición de Variables y Constantes en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
    <div class="container">
        <h1>Guía de Definición de Variables y Constantes en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#escalares">Variables Escalares</a></li>
                <li><a href="#compuestas">Variables Compuestas</a></li>
                <li><a href="#especiales">Variables Especiales</a></li>
                <li><a href="#globales">Globales y Superglobales</a></li>
                <li><a href="#constantes">Constantes</a></li>
            </ul>
        </nav>

        <section id="escalares" class="section">
            <h2>Variables Escalares</h2>
            
            <h3>Integer (Entero)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$userId = 101;
$productCount = 50;
$currentYear = 2025;
$maxScore = -99;
$pageNumber = 15;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $userId = 101; $productCount = 50; $currentYear = 2025; $maxScore = -99; $pageNumber = 15;
                echo "userId: $userId\n";
                echo "productCount: $productCount\n";
                echo "currentYear: $currentYear\n";
                echo "maxScore: $maxScore\n";
                echo "pageNumber: $pageNumber\n";
            ?></pre>

            <h3>Float (Decimal)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$productPrice = 19.99;
$taxRate = 0.21;
$piValue = 3.14159;
$bodyTemperature = 36.6;
$distanceInKm = 42.5;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $productPrice = 19.99; $taxRate = 0.21; $piValue = 3.14159; $bodyTemperature = 36.6; $distanceInKm = 42.5;
                echo "productPrice: $productPrice\n";
                echo "taxRate: $taxRate\n";
                echo "piValue: $piValue\n";
                echo "bodyTemperature: $bodyTemperature\n";
                echo "distanceInKm: $distanceInKm\n";
            ?></pre>

            <h3>String (Cadena de texto)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$fullName = "Ana Sofía Pérez";
$userEmail = "ana.perez@example.com";
$websiteUrl = "https://www.mi-sitio.com";
$postalCode = "ASU-1501";
$errorMessage = "Error: El campo 'nombre' no puede estar vacío.";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $fullName = "Ana Sofía Pérez"; $userEmail = "ana.perez@example.com"; $websiteUrl = "https://www.mi-sitio.com"; $postalCode = "ASU-1501"; $errorMessage = "Error: El campo 'nombre' no puede estar vacío.";
                echo "fullName: $fullName\n";
                echo "userEmail: $userEmail\n";
                echo "websiteUrl: $websiteUrl\n";
                echo "postalCode: $postalCode\n";
                echo "errorMessage: $errorMessage\n";
            ?></pre>

            <h3>Boolean (Booleano)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$isUserLoggedIn = true;
$isAdmin = false;
$isProductAvailable = true;
$hasAcceptedTerms = true;
$hasFreeShipping = false;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $isUserLoggedIn = true; $isAdmin = false; $isProductAvailable = true; $hasAcceptedTerms = true; $hasFreeShipping = false;
                echo "isUserLoggedIn: " . ($isUserLoggedIn ? 'true' : 'false') . "\n";
                echo "isAdmin: " . ($isAdmin ? 'true' : 'false') . "\n";
                echo "isProductAvailable: " . ($isProductAvailable ? 'true' : 'false') . "\n";
                echo "hasAcceptedTerms: " . ($hasAcceptedTerms ? 'true' : 'false') . "\n";
                echo "hasFreeShipping: " . ($hasFreeShipping ? 'true' : 'false') . "\n";
            ?></pre>
        </section>

        <section id="compuestas" class="section">
            <h2>Variables Compuestas</h2>
            
            <h3>Array</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$weekDays = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
$dbConfig = ["host" => "localhost", "user" => "root", "pass" => "secreto"];
$numberMatrix = [[1, 2, 3], [4, 5, 6]];
$shoppingCart = [
    ["id" => 1, "name" => "Laptop", "price" => 1200], 
    ["id" => 2, "name" => "Mouse", "price" => 25]
];
?&gt;</code></pre>
            <h4>Salida del Código (usando `print_r` para legibilidad):</h4>
            <pre><?php
                $weekDays = ["Lunes", "Martes", "Miércoles", "Jueves", "Viernes"];
                $dbConfig = ["host" => "localhost", "user" => "root", "pass" => "secreto"];
                echo "weekDays:\n"; print_r($weekDays);
                echo "\ndbConfig:\n"; print_r($dbConfig);
            ?></pre>
            
            <h3>Object (Objeto)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class User_Demo { // Renombrado para evitar conflictos en esta página
    public $name;
    public $email;
    public function __construct($name, $email) { 
        $this->name = $name; 
        $this->email = $email; 
    }
}
$user1 = new User_Demo("Carlos Ruiz", "c.ruiz@example.com");
$user2 = new User_Demo("Beatriz Lara", "b.lara@example.com");
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class User_Demo {
                    public $name; public $email;
                    public function __construct($name, $email) { $this->name = $name; $this->email = $email; }
                }
                $user1 = new User_Demo("Carlos Ruiz", "c.ruiz@example.com");
                $user2 = new User_Demo("Beatriz Lara", "b.lara@example.com");
                echo "user1: " . $user1->name . " (" . $user1->email . ")\n";
                echo "user2: " . $user2->name . " (" . $user2->email . ")\n";
            ?></pre>
        </section>
        
        <section id="especiales" class="section">
            <h2>Variables Especiales</h2>

            <h3>Resource (Recurso)</h3>
            <p>Representa un recurso externo, como un archivo abierto.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$fileHandle = @fopen("test.txt", "w");
echo "Tipo de dato del manejador de archivo: " . gettype($fileHandle);
if ($fileHandle) {
    fclose($fileHandle);
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $fileHandle = @fopen("test.txt", "w");
                echo "Tipo de dato del manejador de archivo: " . gettype($fileHandle);
                if ($fileHandle) { fclose($fileHandle); }
            ?></pre>

            <h3>NULL</h3>
            <p>Indica que una variable no tiene valor.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$valorNulo = null;
var_dump($valorNulo);

$variableSinDefinir;
var_dump(@$variableSinDefinir); // Usamos @ para suprimir el notice
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $valorNulo = null;
                var_dump($valorNulo);
                $variableSinDefinir = null; // Asignamos null para la demo
                var_dump($variableSinDefinir);
            ?></pre>
        </section>

        <section id="constantes" class="section">
            <h2>Constantes</h2>
            <p>Identificadores para un valor que no puede cambiar durante la ejecución del script.</p>
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
                define("VERSION", "1.0.3");
                echo "define(): Versión de la App: " . VERSION . "\n";
                const TASA_IVA = 0.21;
                echo "const: Tasa de IVA: " . TASA_IVA;
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>