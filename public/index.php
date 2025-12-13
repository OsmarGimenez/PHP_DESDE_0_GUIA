<?php
// public/index.php - Front Controller (Punto de entrada único)

session_start();

// AJUSTE DE RUTA: Salimos de 'public' (..) y entramos a 'app/Includes'
require_once '../app/Includes/db.php'; 

// 1. Configuración inicial
$pagina = $_GET['p'] ?? 'inicio';

// LOGOUT
if ($pagina === 'logout') {
    session_destroy();
    header("Location: index.php?p=inicio");
    exit;
}

// PROCESAR FORMULARIOS (AUTH)
if ($pagina === 'auth') {
    // Cargamos la lógica de autenticación desde la carpeta protegida
    require_once '../app/Controllers/auth.php';
    exit; // Detenemos la ejecución aquí, auth.php se encarga de redirigir
}

// 2. Lógica del Modelo
try {
    $stmt = $pdo->query("SELECT titulo, slug, es_premium, descripcion FROM temas ORDER BY orden ASC");
    $datosTemas = $stmt->fetchAll(PDO::FETCH_ASSOC);

    $paginasPermitidas = [];
    $infoTemas = [];

    foreach ($datosTemas as $t) {
        $paginasPermitidas[] = $t['slug'];
        $infoTemas[$t['slug']] = $t;
    }
    
    $paginasPermitidas = array_merge($paginasPermitidas, ['buscar', 'login', 'inicio']);

} catch (PDOException $e) {
    error_log("Error DB: " . $e->getMessage());
    die("Error crítico cargando el sistema.");
}

// 3. Validación y Título
if (in_array($pagina, $paginasPermitidas)) {
    if ($pagina === 'buscar') $titulo = 'Búsqueda';
    elseif ($pagina === 'login') $titulo = 'Ingresar';
    elseif ($pagina === 'inicio') $titulo = 'Inicio'; 
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

// 4. Renderizado (Vistas)
// AJUSTE DE RUTAS: Apuntamos a ../app/Includes
include '../app/Includes/header.php';
include '../app/Includes/sidebar.php'; 

// --- MAPEO DE VISTAS PRINCIPALES ---
// AJUSTE DE RUTAS: Apuntamos a ../app/Views
if ($pagina === 'inicio') {
    $archivoVista = "../app/Views/00.inicio.php";
} elseif ($pagina === 'login') {
    $archivoVista = "../app/Views/login.php";
} elseif ($pagina === '404') {
    $archivoVista = "../app/Views/404.php";
} else {
    $archivoVista = "../app/Views/$pagina.php";
}

echo "<main class='content'>";
    if (file_exists($archivoVista)) {
        include $archivoVista;
        
        if (!in_array($pagina, ['inicio', '404', 'buscar', 'login'])) {
            include '../app/Includes/pagination.php'; // AJUSTE DE RUTA
        }
    } else {
        echo "<div class='container'><h1>Próximamente</h1><p>El contenido para <strong>".htmlspecialchars($titulo)."</strong> se está redactando.</p></div>";
    }
echo "</main>";

include '../app/Includes/footer.php'; // AJUSTE DE RUTA
?>