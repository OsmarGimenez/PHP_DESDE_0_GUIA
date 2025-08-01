<?php
$paginaActual = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php echo $page_title ?? 'Guía de PHP'; ?> - Guía PHP</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Fira+Sans:wght@400;700&family=Fira+Code&display=swap" rel="stylesheet">

    <link id="prism-theme" rel="stylesheet" href="">
    
    <link rel="stylesheet" href="../assets/css/estilos.css">
</head>
<body class="dark-mode">
    <button id="sidebar-toggle-btn" title="Ocultar/Mostrar Menú">☰</button>
    <div class="main-wrapper">