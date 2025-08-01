<?php
// Lógica PHP para determinar las páginas anterior y siguiente
$paginas = [
    '01.etiquetas.php', '02.echo_print_vardump.php', '03.variables_y_constantes.php',
    '04.operadores.php', '05_condicionales.php', '06.arrays.php', '07.funciones.php',
    '08.funciones_clases_objetos.php', '09.try_catch_y_exepciones.php',
    '10.principios_POO.php', '11.namespace_interfaces_traits.php'
];
$paginaActual = basename($_SERVER['PHP_SELF']);
$indiceActual = array_search($paginaActual, $paginas);
$paginaAnterior = null;
$paginaSiguiente = null;
if ($indiceActual !== false && $indiceActual > 0) {
    $paginaAnterior = $paginas[$indiceActual - 1];
}
if ($indiceActual !== false && $indiceActual < (count($paginas) - 1)) {
    $paginaSiguiente = $paginas[$indiceActual + 1];
}
?>

<nav class="pagination-nav">
    <?php if ($paginaAnterior): ?>
        <a href="<?php echo $paginaAnterior; ?>">← Anterior</a>
    <?php else: ?>
        <span class="disabled">← Anterior</span>
    <?php endif; ?>

    <?php if ($paginaSiguiente): ?>
        <a href="<?php echo $paginaSiguiente; ?>">Siguiente →</a>
    <?php else: ?>
        <span class="disabled">Siguiente →</span>
    <?php endif; ?>
</nav>