<?php
$paginas_guia = [
    '01.etiquetas.php' => '1. Iniciación a PHP',
    '02.echo_print_vardump.php' => '2. Guía de Salida',
    '03.variables_y_constantes.php' => '3. Variables y Constantes',
    '04.operadores.php' => '4. Operadores',
    '05_condicionales.php' => '5. Estructuras de Control',
    '06.arrays.php' => '6. Arrays',
    '07.funciones.php' => '7. Funciones',
    '08.funciones_clases_objetos.php' => '8. POO Básica',
    '09.try_catch_y_exepciones.php' => '9. Errores y Excepciones',
    '10.principios_POO.php' => '10. Principios de la POO',
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
                    <a href="<?php echo $archivo; ?>"><?php echo $titulo; ?></a>
                </li>
            <?php endforeach; ?>
        </ul>
    </nav>
</aside>