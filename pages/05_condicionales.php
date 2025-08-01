<?php 
    $page_title = "5. Guía de Estructuras de Control";
    include '../templates/_header.php';
    include '../templates/_sidebar.php';
?>

<main class="content">
    <div class="container">
        <h1>Guía de Estructuras de Control en PHP</h1>

        <nav class="nav-index">
            <h2>Índice Rápido</h2>
            <ul>
                <li><a href="#condicional-if">if / else / elseif</a></li>
                <li><a href="#condicional-switch">switch</a></li>
                <li><a href="#bucle-while">while / do-while</a></li>
                <li><a href="#bucle-for">for</a></li>
                <li><a href="#bucle-foreach">foreach</a></li>
                <li><a href="#control-bucles">break / continue</a></li>
            </ul>
        </nav>

        <section id="condicional-if" class="section">
            <h2>Condicionales: <code>if</code>, <code>else</code>, <code>elseif</code></h2>
            <p>Permiten ejecutar bloques de código solo si se cumple una condición.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. if simple:
$temperatura = 25;
if ($temperatura > 22) {
    echo "1. Hace calor.\n";
}

// 2. if / else:
$estaLogueado = false;
if ($estaLogueado) {
    echo "2. Bienvenido, usuario.\n";
} else {
    echo "2. Por favor, inicia sesión.\n";
}

// 3. if / elseif / else:
$nota = 75;
if ($nota >= 90) {
    echo "3. Calificación: A\n";
} elseif ($nota >= 70) {
    echo "3. Calificación: C\n";
} else {
    echo "3. Calificación: F\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. if simple:\n";
                $temperatura = 25;
                if ($temperatura > 22) { echo "   Hace calor.\n\n"; }
                
                echo "2. if / else:\n";
                $estaLogueado = false;
                if ($estaLogueado) { echo "   Bienvenido, usuario.\n\n"; } else { echo "   Por favor, inicia sesión.\n\n"; }
                
                echo "3. if / elseif / else:\n";
                $nota = 75;
                if ($nota >= 90) { echo "   Calificación: A\n"; } elseif ($nota >= 70) { echo "   Calificación: C\n"; } else { echo "   Calificación: F\n"; }
            ?></pre>
        </section>

        <section id="condicional-switch" class="section">
            <h2>Condicional: <code>switch</code></h2>
            <p>Compara una variable con múltiples valores diferentes.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$diaSemana = "Lunes";
switch ($diaSemana) {
    case "Lunes":
        echo "Comienzo de semana.\n";
        break;
    case "Viernes":
        echo "¡Casi fin de semana!\n";
        break;
    default:
        echo "Día normal.\n";
        break;
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $diaSemana = "Lunes";
                switch ($diaSemana) {
                    case "Lunes": echo "Comienzo de semana.\n"; break;
                    case "Viernes": echo "¡Casi fin de semana!\n"; break;
                    default: echo "Día normal.\n"; break;
                }
            ?></pre>
        </section>

        <section id="bucle-while" class="section">
            <h2>Bucles: <code>while</code> y <code>do-while</code></h2>
            <p><code>while</code> ejecuta código mientras una condición sea verdadera. <code>do-while</code> garantiza que el código se ejecute al menos una vez.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. while simple:
$contador = 1;
while ($contador <= 3) {
    echo "Nro: $contador\n";
    $contador++;
}

// 2. do-while:
$contador2 = 5;
do {
    echo "Do-while se ejecutó con el valor: $contador2\n";
} while ($contador2 < 5);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "Bucle while:\n";
                $contador = 1;
                while ($contador <= 3) { echo "   Nro: $contador\n"; $contador++; }
                
                echo "\nBucle do-while:\n";
                $contador2 = 5;
                do { echo "   Do-while se ejecutó con el valor: $contador2\n"; } while ($contador2 < 5);
            ?></pre>
        </section>
        
        <section id="bucle-for" class="section">
            <h2>Bucle: <code>for</code></h2>
            <p>Ejecuta un bloque de código un número específico de veces.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// for simple:
for ($i = 0; $i < 3; $i++) {
    echo "El valor de i es: $i\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                for ($i = 0; $i < 3; $i++) {
                    echo "El valor de i es: $i\n";
                }
            ?></pre>
        </section>

        <section id="bucle-foreach" class="section">
            <h2>Bucle: <code>foreach</code></h2>
            <p>La forma más recomendada de iterar sobre los elementos de un array.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$colores = ["Rojo", "Verde", "Azul"];
foreach ($colores as $color) {
    echo "Color: $color\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                $colores = ["Rojo", "Verde", "Azul"];
                foreach ($colores as $color) {
                    echo "Color: $color\n";
                }
            ?></pre>
        </section>

        <section id="control-bucles" class="section">
            <h2>Control de Bucles: <code>break</code> y <code>continue</code></h2>
            <p><code>break</code> termina el bucle. <code>continue</code> salta a la siguiente iteración.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Usando break:
for ($i = 1; $i <= 10; $i++) {
    if ($i == 4) { break; }
    echo "Break: $i\n";
}

// Usando continue:
for ($j = 1; $j <= 4; $j++) {
    if ($j == 3) { continue; }
    echo "Continue: $j\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "Ejemplo con break:\n";
                for ($i = 1; $i <= 10; $i++) {
                    if ($i == 4) { break; }
                    echo "   El número es $i\n";
                }
                echo "\nEjemplo con continue:\n";
                for ($j = 1; $j <= 4; $j++) {
                    if ($j == 3) { continue; }
                    echo "   El número es $j\n";
                }
            ?></pre>
        </section>
    </div>
    
    <?php include '../templates/_paginacion.php'; ?>
</main>

<?php
    include '../templates/_footer.php';
?>