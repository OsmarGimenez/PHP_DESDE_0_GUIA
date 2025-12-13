<?php
// public/index.php

session_start();

// 1. Carga de dependencias
require_once '../app/Includes/db.php';
require_once '../app/Models/Tema.php'; // <--- Cargamos el Modelo

use App\Models\Tema; // Usamos el namespace

$pagina = $_GET['p'] ?? 'inicio';

// LOGOUT
if ($pagina === 'logout') {
    session_destroy();
    header("Location: index.php?p=inicio");
    exit;
}

// PROCESAR FORMULARIOS (AUTH)
if ($pagina === 'auth') {
    require_once '../app/Controllers/auth.php';
    exit;
}

// 2. Lógica del Modelo (AHORA ES UNA SOLA LÍNEA)
try {
    $temaModel = new Tema($pdo); // Instanciamos la clase
    $datosTemas = $temaModel->obtenerTodos(); // Pedimos los datos limpiamente

    // Preparar whitelist (Igual que antes)
    $paginasPermitidas = ['buscar', 'login', 'inicio'];
    $infoTemas = [];

    foreach ($datosTemas as $t) {
        $paginasPermitidas[] = $t['slug'];
        $infoTemas[$t['slug']] = $t;
    }
} catch (Exception $e) { // Capturamos Exception genérica
    error_log("Error Sistema: " . $e->getMessage());
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
    // 1. Validar si está logueado
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?p=login&error=necesitas_login");
        exit;
    }

    // 2. Validar si tiene el rol adecuado (Asumiendo que 'user1' tiene rol 'estudiante' o NULL)
    $rolUsuario = $_SESSION['user_rol'] ?? 'estudiante';

    // Solo permitimos admins o usuarios premium
    if ($rolUsuario !== 'admin' && $rolUsuario !== 'premium') {
        // Puedes crear una vista '403.php' para esto, o mandarlo al inicio con error
        header("Location: index.php?p=inicio&error=no_tienes_permiso_premium");
        exit;
    }
}

// 4. Renderizado (Vistas)
include '../app/Includes/header.php';
include '../app/Includes/sidebar.php';

// Mapeo de vistas
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
        include '../app/Includes/pagination.php';
    }
} else {
    echo "<div class='container'><h1>Próximamente</h1><p>El contenido para <strong>" . htmlspecialchars($titulo) . "</strong> se está redactando.</p></div>";
}
echo "</main>";

include '../app/Includes/footer.php';
