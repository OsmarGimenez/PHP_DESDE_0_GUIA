<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Completa de Operadores en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
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

$suma = $numeroA + $numeroB;          // Suma
$resta = $numeroA - $numeroB;          // Resta
$multiplicacion = $numeroA * $numeroB;   // Multiplicación
$division = $numeroA / $numeroB;       // División
$modulo = $numeroA % $numeroB;           // Módulo (resto de la división)
$exponenciacion = $numeroA ** $numeroB;    // Exponenciación (10 elevado a 3)
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
            <p>Se utilizan para asignar valores a las variables. La mayoría son formas abreviadas de operadores aritméticos.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$total = 100;
$total += 20; // Equivalente a: $total = $total + 20;

$descuento = 50;
$descuento -= 15; // Equivalente a: $descuento = $descuento - 15;

$cantidad = 5;
$cantidad *= 10; // Equivalente a: $cantidad = $cantidad * 10;

$distancia = 1000;
$distancia /= 4; // Equivalente a: $distancia = $distancia / 4;

$frase = "Hola";
$frase .= " Mundo"; // Equivalente a: $frase = $frase . " Mundo";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $total = 100; $total += 20;
                echo "Asignación con suma (+=): $total\n";
                $descuento = 50; $descuento -= 15;
                echo "Asignación con resta (-=): $descuento\n";
                $cantidad = 5; $cantidad *= 10;
                echo "Asignación con multiplicación (*=): $cantidad\n";
                $distancia = 1000; $distancia /= 4;
                echo "Asignación con división (/=): $distancia\n";
                $frase = "Hola"; $frase .= " Mundo";
                echo "Asignación con concatenación (.=): $frase\n";
            ?></pre>
        </section>

        <section id="comparacion" class="section">
            <h2>Operadores de Comparación</h2>
            <p>Permiten comparar dos valores y devuelven `true` o `false`.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$valorA = 5;       // integer
$valorB = "5";     // string
$valorC = 10;      // integer

$esIgual = ($valorA == $valorB);       // Igual (true, solo compara valor)
$esIdentico = ($valorA === $valorB);     // Idéntico (false, compara valor y tipo)
$noEsIgual = ($valorA != $valorC);       // No es igual (true)
$esMenorQue = ($valorA < $valorC);       // Menor que (true)
$esMayorOIgual = ($valorA >= $valorB);   // Mayor o igual que (true)
$naveEspacial = ($valorA &lt;=&gt; $valorC);   // Nave espacial (-1 si A<C, 0 si A==C, 1 si A>C)
?&gt;</code></pre>
            <h4>Salida del Código (usando `var_dump` para ver el booleano):</h4>
            <pre><?php
                $valorA = 5; $valorB = "5"; $valorC = 10;
                echo "Igual (5 == '5'): "; var_dump($valorA == $valorB);
                echo "Idéntico (5 === '5'): "; var_dump($valorA === $valorB);
                echo "No es igual (5 != 10): "; var_dump($valorA != $valorC);
                echo "Menor que (5 < 10): "; var_dump($valorA < $valorC);
                echo "Nave espacial (5 <=> 10): "; var_dump($valorA <=> $valorC);
            ?></pre>
        </section>

        <section id="incremento" class="section">
            <h2>Operadores de Incremento/Decremento</h2>
            <p>Aumentan o disminuyen el valor de una variable en uno. Su comportamiento cambia si se ponen antes (pre) o después (post) de la variable.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$contador = 10;
echo ++$contador; // Pre-incremento: Primero incrementa (a 11), luego devuelve.

$contador = 10;
echo $contador++; // Post-incremento: Primero devuelve (10), luego incrementa.
echo $contador;   // Ahora vale 11.

$contador = 10;
echo --$contador; // Pre-decremento: Primero decrementa (a 9), luego devuelve.

$contador = 10;
echo $contador--; // Post-decremento: Primero devuelve (10), luego decrementa.
echo $contador;   // Ahora vale 9.
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $contadorA = 10;
                echo "1. Pre-incremento (++\$contadorA): " . ++$contadorA . "\n";
                $contadorB = 10;
                echo "2. Post-incremento (\$contadorB++): " . $contadorB++ . " (y después vale: $contadorB)\n";
                $contadorC = 10;
                echo "3. Pre-decremento (--\$contadorC): " . --$contadorC . "\n";
                $contadorD = 10;
                echo "4. Post-decremento (\$contadorD--): " . $contadorD-- . " (y después vale: $contadorD)\n";
                $likes = 5; $likes++;
                echo "5. Likes finales: $likes\n";
            ?></pre>
        </section>

        <section id="logicos" class="section">
            <h2>Operadores Lógicos</h2>
            <p>Se usan para combinar sentencias condicionales.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$esAdmin = true;
$tienePermisos = false;

$puedeEntrar = ($esAdmin && $tienePermisos);  // AND (Y): Ambas deben ser true
$puedeVer = ($esAdmin || $tienePermisos);   // OR (O): Al menos una debe ser true
$noEsAdmin = !$esAdmin;                      // NOT (NO): Invierte el valor booleano
$accesoExclusivo = ($esAdmin xor $tienePermisos); // XOR: Una debe ser true, pero no ambas

// 'and' y 'or' tienen menor precedencia que '&&' y '||'
$resultadoPrecedencia = true && false || true; // (true && false) || true -> true
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $esAdmin = true; $tienePermisos = false;
                echo "AND (&&): "; var_dump($esAdmin && $tienePermisos);
                echo "OR (||): "; var_dump($esAdmin || $tienePermisos);
                echo "NOT (!): "; var_dump(!$esAdmin);
                echo "XOR: "; var_dump($esAdmin xor $tienePermisos);
                echo "Precedencia (true && false || true): "; var_dump(true && false || true);
            ?></pre>
        </section>

        <section id="cadenas" class="section">
            <h2>Operadores de Unión de Cadenas (String)</h2>
            <p>El operador punto (`.`) se usa para concatenar (unir) cadenas de texto.</p>
             <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$nombre = "Juan";
$apellido = "Pérez";

$nombreCompleto = $nombre . " " . $apellido;
$saludo = "Hola, " . $nombre;
$etiquetaHtml = "&lt;h1&gt;" . $nombreCompleto . "&lt;/h1&gt;";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $nombre = "Juan"; $apellido = "Pérez";
                echo "1. Nombre completo: " . ($nombre . " " . $apellido) . "\n";
                echo "2. Saludo: " . ("Hola, " . $nombre) . "\n";
                echo "3. Etiqueta HTML: " . ("<h1>" . $nombre . " " . $apellido . "</h1>") . "\n";
            ?></pre>
        </section>

        <section id="condicionales" class="section">
            <h2>Operadores Condicionales (Ternario y Fusión de Null)</h2>
            <p>Son atajos para escribir bloques `if/else` simples.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$edad = 20;
$esMayorDeEdad = ($edad >= 18) ? "Sí" : "No"; // Operador Ternario

$stock = 0;
$colorBoton = ($stock > 0) ? "verde" : "rojo"; // Ternario

// Operador de Fusión de Null (Null Coalescing)
$nombreUsuario = $_GET['user'] ?? "Invitado";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $edad = 20;
                echo "1. ¿Es mayor de edad?: " . (($edad >= 18) ? "Sí" : "No") . "\n";
                $stock = 0;
                echo "2. Color del botón: " . (($stock > 0) ? "verde" : "rojo") . "\n";
                echo "3. Nombre de usuario: " . ($_GET['user'] ?? "Invitado") . "\n";
            ?></pre>
        </section>

        <section id="otros" class="section">
            <h2>Otros Operadores</h2>
            <p>Operadores con propósitos especiales.</p>
            
            <h3>Control de Errores (`@`)</h3>
            <div class="warning"><strong>Advertencia:</strong> El uso de `@` es generalmente una mala práctica porque oculta errores que deberían ser solucionados. Úsalo con extrema precaución.</div>
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
class MiClase_Demo {}
$objeto = new MiClase_Demo();
$esInstancia = $objeto instanceof MiClase_Demo; // true
var_dump($esInstancia);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                class MiClase_Demo {}
                $objeto = new MiClase_Demo();
                $esInstancia = $objeto instanceof MiClase_Demo;
                var_dump($esInstancia);
            ?></pre>
        </section>

        <?php include '_paginacion.php'; ?>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>