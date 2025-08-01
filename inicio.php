<?php 
    $page_title = "Bienvenido a la Guía de PHP";
    $paginaActual = 'inicio.php'; // Identificador para el sidebar
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title; ?> - Guía PHP</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&family=Fira+Code&display=swap" rel="stylesheet">

    <link id="prism-theme" rel="stylesheet" href="">
    
    <link rel="stylesheet" href="assets/css/estilos.css">
</head>
<body class="dark-mode">
    <button id="sidebar-toggle-btn" title="Ocultar/Mostrar Menú">☰</button>
    <div class="main-wrapper">
        <?php 
            // ----- Sidebar para la página de inicio -----
            $paginas_guia = [
                '01.etiquetas.php' => '1. Iniciación a PHP', '02.echo_print_vardump.php' => '2. Guía de Salida',
                '03.variables_y_constantes.php' => '3. Variables y Constantes', '04.operadores.php' => '4. Operadores',
                '05_condicionales.php' => '5. Estructuras de Control', '06.arrays.php' => '6. Arrays',
                '07.funciones.php' => '7. Funciones', '08.funciones_clases_objetos.php' => '8. POO Básica',
                '09.try_catch_y_exepciones.php' => '9. Errores y Excepciones', '10.principios_POO.php' => '10. Principios de la POO',
                '11.namespace_interfaces_traits.php' => '11. POO Avanzada'
            ];
        ?>
        <aside class="sidebar">
            <h3 class="sidebar-title">Guía de PHP</h3>
            <div class="theme-switcher">
                <button id="theme-toggle-btn">Cambiar Tema</button>
            </div>
            <nav>
                <ul class="sidebar-nav">
                    <?php foreach ($paginas_guia as $archivo => $titulo): ?>
                        <li class="<?php echo ($paginaActual == $archivo) ? 'active' : ''; ?>">
                            <a href="pages/<?php echo $archivo; ?>"><?php echo $titulo; ?></a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </nav>
        </aside>

        <main class="content">
            <div class="container">
                <h1>¡Bienvenido a la Guía Interactiva de PHP!</h1>
                <p style="font-size: 1.2em; text-align: center;">
                    Este es un proyecto educativo diseñado para llevarte desde los conceptos más básicos de PHP hasta temas avanzados de Programación Orientada a Objetos.
                </p>
                <div class="welcome-section">
                    <h2>¿Cómo Empezar?</h2>
                    <p>Usa el menú lateral para navegar por los temas. ¡Te recomiendo empezar por la primera guía para familiarizarte con la sintaxis!</p>
                    <a href="pages/01.etiquetas.php" class="start-button">Comenzar con la Guía 1 →</a>
                </div>
            </div>
        </main>
    </div>

    <?php include 'templates/_footer.php'; ?>