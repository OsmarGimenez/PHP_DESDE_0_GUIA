<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía de Estructuras de Control en PHP</title>
    
    <link rel="stylesheet" href="estilos.css">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/themes/prism-okaidia.min.css">
</head>

<body>
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
} elseif ($nota >= 80) {
    echo "3. Calificación: B\n";
} elseif ($nota >= 70) {
    echo "3. Calificación: C\n";
} else {
    echo "3. Calificación: F\n";
}

// 4. if con múltiples condiciones (&& AND):
$esAdmin = true;
$estaActivo = true;
if ($esAdmin && $estaActivo) {
    echo "4. Acceso de administrador concedido.\n";
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
                if ($nota >= 90) { echo "   Calificación: A\n\n"; } elseif ($nota >= 80) { echo "   Calificación: B\n\n"; } elseif ($nota >= 70) { echo "   Calificación: C\n\n"; } else { echo "   Calificación: F\n\n"; }
                echo "4. if con múltiples condiciones (&& AND):\n";
                $esAdmin = true; $estaActivo = true;
                if ($esAdmin && $estaActivo) { echo "   Acceso de administrador concedido.\n\n"; }
            ?></pre>
        </section>

        <section id="condicional-switch" class="section">
            <h2>Condicional: <code>switch</code></h2>
            <p>Compara una variable con múltiples valores diferentes. Es una alternativa más limpia a un `if/elseif/else` largo.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
$diaSemana = "Lunes";
switch ($diaSemana) {
    case "Lunes":
        echo "1. Hoy es el comienzo de la semana laboral.\n";
        break; // break es crucial para no seguir con el siguiente caso
    case "Viernes":
        echo "1. ¡Hoy es viernes!\n";
        break;
    default: // Se ejecuta si ningún caso coincide
        echo "1. Es un día normal de la semana.\n";
        break;
}

// 2. Múltiples casos con una misma salida (fall-through):
$vocal = 'a';
switch ($vocal) {
    case 'a':
    case 'e':
    case 'i':
    case 'o':
    case 'u':
        echo "2. '{$vocal}' es una vocal.\n";
        break;
    default:
        echo "2. '{$vocal}' es una consonante.\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Switch simple:\n";
                $diaSemana = "Lunes";
                switch ($diaSemana) {
                    case "Lunes": echo "   Hoy es el comienzo de la semana laboral.\n\n"; break;
                    case "Viernes": echo "   ¡Hoy es viernes!\n\n"; break;
                    default: echo "   Es un día normal de la semana.\n\n"; break;
                }
                echo "2. Switch con casos agrupados:\n";
                $vocal = 'a';
                switch ($vocal) {
                    case 'a': case 'e': case 'i': case 'o': case 'u':
                        echo "   '{$vocal}' es una vocal.\n"; break;
                    default: echo "   '{$vocal}' es una consonante.\n";
                }
            ?></pre>
        </section>

        <section id="bucle-while" class="section">
            <h2>Bucles: <code>while</code> y <code>do-while</code></h2>
            <p><code>while</code> ejecuta un bloque de código mientras una condición sea verdadera. <code>do-while</code> es similar, pero garantiza que el bloque se ejecute al menos una vez.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. while simple:
$contador = 1;
while ($contador <= 3) {
    echo "1. El contador while es: $contador\n";
    $contador++;
}

// 2. do-while:
$contador2 = 100; // La condición inicial es falsa
do {
    echo "2. El contador do-while se ejecutó una vez con el valor: $contador2\n";
    $contador2++;
} while ($contador2 <= 5);
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Bucle while:\n";
                $contador = 1;
                while ($contador <= 3) { echo "   El contador while es: $contador\n"; $contador++; }
                echo "\n2. Bucle do-while:\n";
                $contador2 = 100;
                do { echo "   El contador do-while se ejecutó una vez con el valor: $contador2\n"; $contador2++; } while ($contador2 <= 5);
            ?></pre>
        </section>
        
        <section id="bucle-for" class="section">
            <h2>Bucle: <code>for</code></h2>
            <p>Ejecuta un bloque de código un número específico de veces. Ideal cuando sabes de antemano cuántas iteraciones necesitas.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// 1. for simple:
for ($i = 0; $i < 3; $i++) {
    echo "1. El valor de i es: $i\n";
}

// 2. for contando hacia atrás:
for ($j = 3; $j > 0; $j--) {
    echo "2. Cuenta regresiva: $j\n";
}

// 3. for para generar HTML:
echo "4. &lt;select name='anio'&gt;";
for ($anio = 2023; $anio <= 2025; $anio++) {
    echo "&lt;option value='{$anio}'&gt;{$anio}&lt;/option&gt;";
}
echo "&lt;/select&gt;";
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "1. Bucle for simple:\n";
                for ($i = 0; $i < 3; $i++) { echo "   El valor de i es: $i\n"; }
                echo "\n2. Bucle for hacia atrás:\n";
                for ($j = 3; $j > 0; $j--) { echo "   Cuenta regresiva: $j\n"; }
                echo "\n3. Bucle for generando HTML:\n   ";
                echo "<select name='anio'>";
                for ($anio = 2023; $anio <= 2025; $anio++) { echo "<option value='{$anio}'>{$anio}</option>"; }
                echo "</select>\n";
            ?></pre>
        </section>

        <section id="bucle-foreach" class="section">
            <h2>Bucle: <code>foreach</code></h2>
            <p>La forma más fácil y recomendada de iterar sobre los elementos de un array u objeto.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// foreach con un array simple (solo valor):
$colores = ["Rojo", "Verde", "Azul"];
foreach ($colores as $color) {
    echo "Color: $color\n";
}

// foreach con un array asociativo (clave y valor):
$capitales = ["Paraguay" => "Asunción", "Argentina" => "Buenos Aires"];
foreach ($capitales as $pais => $ciudad) {
    echo "La capital de $pais es $ciudad.\n";
}
?&gt;</code></pre>
            <h4>Salida del Código:</h4>
            <pre><?php
                echo "foreach con array simple:\n";
                $colores = ["Rojo", "Verde", "Azul"];
                foreach ($colores as $color) { echo "   Color: $color\n"; }
                echo "\nforeach con array asociativo:\n";
                $capitales = ["Paraguay" => "Asunción", "Argentina" => "Buenos Aires"];
                foreach ($capitales as $pais => $ciudad) { echo "   La capital de $pais es $ciudad.\n"; }
            ?></pre>
        </section>

        <section id="control-bucles" class="section">
            <h2>Control de Bucles: <code>break</code> y <code>continue</code></h2>
            <p><code>break</code> termina la ejecución de un bucle por completo. <code>continue</code> salta a la siguiente iteración del bucle actual.</p>
            <h4>Código de Definición:</h4>
            <pre><code class="language-php">&lt;?php
// Usando break para detener un bucle:
for ($i = 1; $i <= 10; $i++) {
    if ($i == 4) {
        break; // Detiene el bucle cuando i llega a 4
    }
    echo "El número es $i\n";
}

// Usando continue para saltar una iteración:
for ($j = 1; $j <= 4; $j++) {
    if ($j == 3) {
        continue; // Salta la iteración cuando j es 3
    }
    echo "El número es $j\n";
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

        <?php include '_paginacion.php'; ?>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/components/prism-core.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/prism/1.29.0/plugins/autoloader/prism-autoloader.min.js"></script>
</body>
</html>