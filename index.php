<?php
// index.php - Front Controller Dinámico

session_start(); // Iniciar sesión para validar usuarios
require_once 'includes/db.php'; // Conexión a BD

// 1. Configuración
$pagina = $_GET['p'] ?? 'inicio';

// LOGOUT
if ($pagina === 'logout') {
    session_destroy();
    header("Location: index.php?p=inicio");
    exit;
}

// 2. Generar Whitelist desde la Base de Datos
try {
    $stmt = $pdo->query("SELECT slug, titulo, es_premium FROM temas");
    $temasDB = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $paginasPermitidas = [];
    $infoTemas = [];

    foreach ($temasDB as $t) {
        $paginasPermitidas[] = $t['slug'];
        $infoTemas[$t['slug']] = $t;
    }
    
    // AGREGAMOS PÁGINAS DEL SISTEMA MANUALMENTE
    $paginasPermitidas[] = 'buscar';
    $paginasPermitidas[] = 'login';
    $paginasPermitidas[] = 'inicio'; // <--- ESTO SOLUCIONA TU ERROR 404

} catch (PDOException $e) {
    die("Error cargando el sistema.");
}

// 3. Validación y Título
if (in_array($pagina, $paginasPermitidas)) {
    if ($pagina === 'buscar') $titulo = 'Búsqueda';
    elseif ($pagina === 'login') $titulo = 'Ingresar';
    elseif ($pagina === 'inicio') $titulo = 'Inicio'; // Título manual para inicio
    else $titulo = $infoTemas[$pagina]['titulo'];
} else {
    $pagina = '404';
    $titulo = 'Página no encontrada';
}

// --- PROTECCIÓN PREMIUM ---
if (isset($infoTemas[$pagina]) && $infoTemas[$pagina]['es_premium'] == 1) {
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?p=login&error=Debes iniciar sesión para ver este contenido Premium 💎");
        exit;
    }
}

// 4. Renderizado
include 'includes/header.php';
include 'includes/sidebar.php'; 

// --- MAPEO DE ARCHIVOS ---
if ($pagina === 'inicio') {
    $archivoVista = "views/00.inicio.php"; // Forzamos carga del archivo 00.
} elseif ($pagina === 'login') {
    $archivoVista = "views/login.php";
} elseif ($pagina === '404') {
    $archivoVista = "views/404.php";
} else {
    $archivoVista = "views/$pagina.php";
}

echo "<main class='content'>";
    if (file_exists($archivoVista)) {
        include $archivoVista;
        
        // Evitar paginación en páginas especiales
        if ($pagina !== 'inicio' && $pagina !== '404' && $pagina !== 'buscar' && $pagina !== 'login') {
            include 'includes/pagination.php'; 
        }
    } else {
        echo "<div class='container'><h1>Error Técnico</h1><p>El archivo de vista para <strong>$pagina</strong> no existe.</p></div>";
    }
echo "</main>";

include 'includes/footer.php';
?>