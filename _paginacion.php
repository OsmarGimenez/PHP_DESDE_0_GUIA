<?php
// Definimos el orden y los nombres correctos de nuestros archivos
$paginas = [
    '01.etiquetas.php',
    '02.echo_print_vardump.php',
    '03.variables_y_constantes.php',
    '04.operadores.php',
    '05_condicionales.php',
    '06.arrays.php',
    '07.funciones.php',
    '08.funciones_clases_objetos.php',
    '09.try_catch_y_exepciones.php',
    '10.principios_POO.php',
    '11.namespace_interfaces_traits.php'
];

// Obtenemos el nombre del script actual
$paginaActual = basename($_SERVER['PHP_SELF']);
$indiceActual = array_search($paginaActual, $paginas);

$paginaAnterior = null;
$paginaSiguiente = null;

// Determinamos la página anterior si no es la primera
if ($indiceActual !== false && $indiceActual > 0) {
    $paginaAnterior = $paginas[$indiceActual - 1];
}

// Determinamos la página siguiente si no es la última
if ($indiceActual !== false && $indiceActual < (count($paginas) - 1)) {
    $paginaSiguiente = $paginas[$indiceActual + 1];
}
?>

<style>
    .pagination-nav {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 20px;
        margin-top: 40px;
        background-color: #e9ecef;
        border-radius: 8px;
    }
    .pagination-nav a {
        text-decoration: none;
        color: #007bff;
        font-weight: bold;
        padding: 10px 15px;
        border-radius: 5px;
        background-color: #fff;
        border: 1px solid #dee2e6;
        transition: background-color 0.2s, color 0.2s;
    }
    .pagination-nav a:hover {
        background-color: #007bff;
        color: #fff;
    }
    .pagination-nav .disabled {
        color: #6c757d;
        background-color: #e9ecef;
        pointer-events: none;
        border-color: #e9ecef;
        padding: 10px 15px;
    }
</style>

<nav class="pagination-nav">
    <?php if ($paginaAnterior): ?>
        <a href="<?php echo $paginaAnterior; ?>">← Anterior</a>
    <?php else: ?>
        <span class="disabled">← Anterior</span>
    <?php endif; ?>

    <a href="inicio.php">Volver al Índice</a>

    <?php if ($paginaSiguiente): ?>
        <a href="<?php echo $paginaSiguiente; ?>">Siguiente →</a>
    <?php else: ?>
        <span class="disabled">Siguiente →</span>
    <?php endif; ?>
</nav>