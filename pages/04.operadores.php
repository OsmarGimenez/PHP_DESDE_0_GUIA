<?php 
    $page_title = "4. Guía de Operadores";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
    <div class="container">
        <h1>Guía Completa de Operadores en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#aritmeticos">Aritméticos</a></li>
                <li><a href="#asignacion">Asignación</a></li>
                <li><a href="#comparacion">Comparación</a></li>
                <li><a href="#incremento">Incremento/Decremento</a></li>
                <li><a href="#logicos">Lógicos</a></li>
                <li><a href="#cadenas">Unión de Cadenas</a></li>
                <li><a href="#condicionales">Condicionales</a></li>
                <li><a href="#otros">Otros Operadores</a></li>
            </ul>
        </nav>

        <section id="aritmeticos" class="section">
            <h2>Operadores Aritméticos</h2>
            <p>Se utilizan para realizar operaciones matemáticas comunes.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$numeroA = 10;
$numeroB = 3;

echo "Suma (10 + 3): " . ($numeroA + $numeroB) . "\n";
echo "Resta (10 - 3): " . ($numeroA - $numeroB) . "\n";
echo "Multiplicación (10 * 3): " . ($numeroA * $numeroB) . "\n";
echo "División (10 / 3): " . ($numeroA / $numeroB) . "\n";
echo "Módulo (10 % 3): " . ($numeroA % $numeroB) . "\n";
echo "Exponenciación (10 ** 3): " . ($numeroA ** $numeroB) . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $numeroA = 10;
                $numeroB = 3;
                echo "Suma (10 + 3): " . ($numeroA + $numeroB) . "\n";
                echo "Resta (10 - 3): " . ($numeroA - $numeroB) . "\n";
                echo "Multiplicación (10 * 3): " . ($numeroA * $numeroB) . "\n";
                echo "División (10 / 3): " . ($numeroA / $numeroB) . "\n";
                echo "Módulo (10 % 3): " . ($numeroA % $numeroB) . "\n";
                echo "Exponenciación (10 ** 3): " . ($numeroA ** $numeroB) . "\n";
            ?></pre>
        </section>

        <section id="asignacion" class="section">
            <h2>Operadores de Asignación</h2>
            <p>Se utilizan para asignar valores a las variables.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$total = 100;
$total += 20; // Equivalente a: $total = $total + 20;
echo "Asignación con suma (+=): $total\n";

$frase = "Hola";
$frase .= " Mundo"; // Equivalente a: $frase = $frase . " Mundo";
echo "Asignación con concatenación (.=): $frase\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $total = 100; $total += 20;
                echo "Asignación con suma (+=): $total\n";
                $frase = "Hola"; $frase .= " Mundo";
                echo "Asignación con concatenación (.=): $frase\n";
            ?></pre>
        </section>

        <section id="comparacion" class="section">
            <h2>Operadores de Comparación</h2>
            <p>Permiten comparar dos valores y devuelven `true` o `false`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$valorA = 5;
$valorB = "5";
$valorC = 10;

var_dump($valorA == $valorB);   // Igual (true, solo compara valor)
var_dump($valorA === $valorB);  // Idéntico (false, compara valor y tipo)
var_dump($valorA != $valorC);   // No es igual (true)
var_dump($valorA &lt;=&gt; $valorC);   // Nave espacial (-1 si A<C, 0 si A==C, 1 si A>C)
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $valorA = 5; $valorB = "5"; $valorC = 10;
                echo "Igual (5 == '5'): "; var_dump($valorA == $valorB);
                echo "Idéntico (5 === '5'): "; var_dump($valorA === $valorB);
                echo "No es igual (5 != 10): "; var_dump($valorA != $valorC);
                echo "Nave espacial (5 <=> 10): "; var_dump($valorA <=> $valorC);
            ?></pre>
        </section>

        <section id="incremento" class="section">
            <h2>Operadores de Incremento/Decremento</h2>
            <p>Aumentan o disminuyen el valor de una variable en uno.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$contadorA = 10;
echo "Pre-incremento (++\$contadorA): " . ++$contadorA . "\n";

$contadorB = 10;
echo "Post-incremento (\$contadorB++): " . $contadorB++ . " (después vale: $contadorB)\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $contadorA = 10;
                echo "Pre-incremento (++\$contadorA): " . ++$contadorA . "\n";
                $contadorB = 10;
                echo "Post-incremento (\$contadorB++): " . $contadorB++ . " (después vale: $contadorB)\n";
            ?></pre>
        </section>

        <section id="logicos" class="section">
            <h2>Operadores Lógicos</h2>
            <p>Se usan para combinar sentencias condicionales.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$esAdmin = true;
$tienePermisos = false;

var_dump($esAdmin && $tienePermisos);  // AND (Y): Ambas deben ser true
var_dump($esAdmin || $tienePermisos);   // OR (O): Al menos una debe ser true
var_dump(!$esAdmin);                      // NOT (NO): Invierte el valor booleano
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $esAdmin = true; $tienePermisos = false;
                echo "AND (&&): "; var_dump($esAdmin && $tienePermisos);
                echo "OR (||): "; var_dump($esAdmin || $tienePermisos);
                echo "NOT (!): "; var_dump(!$esAdmin);
            ?></pre>
        </section>

        <section id="cadenas" class="section">
            <h2>Operador de Unión de Cadenas (String)</h2>
            <p>El operador punto (`.`) se usa para concatenar (unir) cadenas de texto.</p>
             <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$nombre = "Juan";
$apellido = "Pérez";
$nombreCompleto = $nombre . " " . $apellido;
echo "Nombre completo: " . $nombreCompleto;
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $nombre = "Juan"; $apellido = "Pérez";
                $nombreCompleto = $nombre . " " . $apellido;
                echo "Nombre completo: " . $nombreCompleto;
            ?></pre>
        </section>

        <section id="condicionales" class="section">
            <h2>Operadores Condicionales</h2>
            <p>Son atajos para escribir bloques `if/else` simples.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Operador Ternario
$edad = 20;
$esMayorDeEdad = ($edad >= 18) ? "Sí" : "No";
echo "¿Es mayor de edad?: " . $esMayorDeEdad . "\n";

// Operador de Fusión de Null
$nombreUsuario = $_GET['user'] ?? "Invitado";
echo "Nombre de usuario: " . $nombreUsuario . "\n";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $edad = 20;
                $esMayorDeEdad = ($edad >= 18) ? "Sí" : "No";
                echo "¿Es mayor de edad?: " . $esMayorDeEdad . "\n";
                $nombreUsuario = $_GET['user'] ?? "Invitado";
                echo "Nombre de usuario: " . $nombreUsuario . "\n";
            ?></pre>
        </section>

        <section id="otros" class="section">
            <h2>Otros Operadores</h2>
            <p>Operadores con propósitos especiales.</p>
            
            <h3>Control de Errores (`@`)</h3>
            <div class="warning"><strong>Advertencia:</strong> El uso de `@` es generalmente una mala práctica porque oculta errores.</div>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$valor = @$miArray['clave_inexistente'];
var_dump($valor); // Muestra NULL sin un error de tipo "Notice"
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $valor = @$miArray['clave_inexistente'];
                var_dump($valor);
            ?></pre>

            <h3>Tipo (`instanceof`)</h3>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
class MiClase_Op_Demo {}
$objeto = new MiClase_Op_Demo();
$esInstancia = $objeto instanceof MiClase_Op_Demo;
var_dump($esInstancia);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class MiClase_Op_Demo {}
                $objeto = new MiClase_Op_Demo();
                $esInstancia = $objeto instanceof MiClase_Op_Demo;
                var_dump($esInstancia);
            ?></pre>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>