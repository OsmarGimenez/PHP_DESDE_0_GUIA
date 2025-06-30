<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guía Completa de PHP - Índice Principal</title>
    <link rel="stylesheet" href="estilos.css">
    <style>
        /* Estilos específicos para la página de índice */
        .index-list {
            list-style-type: none;
            padding: 0;
        }
        .index-list li {
            margin: 15px 0;
            background-color: #f8f9fa;
            border-left: 5px solid #007bff;
            padding: 15px;
            border-radius: 5px;
            transition: transform 0.2s, box-shadow 0.2s;
            font-size: 1.1em;
        }
        .index-list li:hover {
            transform: translateX(5px);
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
        }
        .index-list a {
            text-decoration: none;
            color: #212529;
            font-weight: bold;
            display: block;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Guía Completa de PHP</h1>
        <p>Bienvenido al índice principal. Cada enlace te llevará a una guía detallada sobre un concepto fundamental de PHP.</p>

        <ol class="index-list">
            <li><a href="01.etiquetas.php">1. Iniciación a PHP: Etiquetas y Sintaxis</a></li>
            <li><a href="02.echo_print_vardump.php">2. Guía de Salida: echo, print, etc.</a></li>
            <li><a href="03.variables_y_constantes.php">3. Guía de Variables y Constantes</a></li>
            <li><a href="04.operadores.php">4. Guía de Operadores</a></li>
            <li><a href="05_condicionales.php">5. Guía de Estructuras de Control</a></li>
            <li><a href="06.arrays.php">6. Guía Completa de Arrays</a></li>
            <li><a href="07.funciones.php">7. Guía de Funciones</a></li>
            <li><a href="08.funciones_clases_objetos.php">8. Guía de Clases y Objetos (POO Básica)</a></li>
            <li><a href="09.try_catch_y_exepciones.php">9. Guía de Errores y Excepciones</a></li>
            <li><a href="10.principios_POO.php">10. Guía de Principios de la POO</a></li>
            <li><a href="11.namespace_interfaces_traits.php">11. Guía Avanzada de POO</a></li>
        </ol>
    </div>
</body>
</html>