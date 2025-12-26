<?php
// public/index.php
session_start();

// 1. Carga de dependencias
require_once '../app/Includes/db.php';
require_once '../app/Models/Tema.php';

use App\Models\Tema;

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

// PROCESAR PROGRESO (Marcar como leído)
if ($pagina === 'progreso') {
    require_once '../app/Controllers/progreso.php';
    exit;
}

// === NUEVO: PROCESAR CREACIÓN DE TEMAS (ADMIN) ===
if ($pagina === 'admin_crear') {
    require_once '../app/Controllers/admin_crear.php';
    exit;
}
// =================================================

// === NUEVO: PROCESAR PERFIL ===
if ($pagina === 'perfil_actualizar') {
    require_once '../app/Controllers/perfil_actualizar.php';
    exit;
}
// ==============================

// 2. Lógica del Modelo
try {
    $temaModel = new Tema($pdo);
    $datosTemas = $temaModel->obtenerTodos();

    // Cargar Progreso del Usuario
    $temasCompletados = [];
    if (isset($_SESSION['user_id'])) {
        $temasCompletados = $temaModel->obtenerProgresoUsuario($_SESSION['user_id']);
    }

    // Preparar whitelist básica
    // Agregamos 'admin' a la lista para que sea una página válida
    $paginasPermitidas = ['buscar', 'login', 'inicio', 'admin', 'perfil'];
    $infoTemas = [];

    foreach ($datosTemas as $t) {
        $paginasPermitidas[] = $t['slug'];
        $infoTemas[$t['slug']] = $t;
    }
} catch (Exception $e) {
    error_log("Error Sistema: " . $e->getMessage());
    die("Error crítico cargando el sistema.");
}

// 3. Validación y Título
if (in_array($pagina, $paginasPermitidas)) {
    if ($pagina === 'buscar') $titulo = 'Búsqueda';
    elseif ($pagina === 'login') $titulo = 'Ingresar';
    elseif ($pagina === 'inicio') $titulo = 'Inicio';
    elseif ($pagina === 'admin') $titulo = 'Panel de Administración'; // Título para Admin
    else $titulo = $infoTemas[$pagina]['titulo'];
} else {
    $pagina = '404';
    $titulo = 'Página no encontrada';
}

// --- PROTECCIÓN DE RUTA ADMIN ---
if ($pagina === 'admin') {
    // Si no está logueado O su ID no es 1, fuera.
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
        header("Location: index.php?p=inicio&error=acceso_denegado");
        exit;
    }
}

// --- PROTECCIÓN PREMIUM ---
if (isset($infoTemas[$pagina]) && $infoTemas[$pagina]['es_premium'] == 1) {

    // 1. Validar si está logueado
    if (!isset($_SESSION['user_id'])) {
        header("Location: index.php?p=login&error=necesitas_login");
        exit;
    }

    // 2. Validar rol
    $rolUsuario = $_SESSION['user_rol'] ?? 'estudiante';
    $idUsuario  = $_SESSION['user_id'];

    // Excepción Super Admin (ID 1 siempre es admin)
    if ($idUsuario == 1) {
        $rolUsuario = 'admin';
    }

    // Solo permitimos admins o usuarios premium
    if ($rolUsuario !== 'admin' && $rolUsuario !== 'premium') {
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
} elseif ($pagina === 'admin') {
    // Mapeo para la vista de admin
    $archivoVista = "../app/Views/admin.php";
} else {
    $archivoVista = "../app/Views/$pagina.php";
}

echo "<main class='content'>";

if (file_exists($archivoVista)) {
    include $archivoVista;

    // === Botón de Completar Lección ===
    // No mostramos el botón en admin, inicio, 404, login ni buscar
    if (isset($_SESSION['user_id']) && !in_array($pagina, ['inicio', '404', 'buscar', 'login', 'admin'])) {

        $yaCompletado = in_array($pagina, $temasCompletados);
?>
        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--color-border);">
            <?php if ($yaCompletado): ?>
                <div style="background: rgba(40, 167, 69, 0.2); color: #2ecc71; padding: 15px; border-radius: 5px; text-align: center; border: 1px solid #2ecc71;">
                    <i class="fas fa-check-circle"></i> <strong>¡Lección Completada!</strong>
                </div>
            <?php else: ?>
                <form action="index.php?p=progreso" method="POST">
                    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($pagina); ?>">
                    <button type="submit" class="btn-primary" style="background-color: #28a745; width: auto; padding: 10px 30px;">
                        <i class="fas fa-check"></i> Marcar como Leído
                    </button>
                </form>
            <?php endif; ?>
        </div>
<?php
    }
    // ==================================

    // Paginación (Excluimos admin también)
    if (!in_array($pagina, ['inicio', '404', 'buscar', 'login', 'admin'])) {
        include '../app/Includes/pagination.php';
    }
} else {
    echo "<div class='container'><h1>Próximamente</h1><p>El contenido para <strong>" . htmlspecialchars($titulo) . "</strong> se está redactando.</p></div>";
}
echo "</main>";

include '../app/Includes/footer.php';
?>