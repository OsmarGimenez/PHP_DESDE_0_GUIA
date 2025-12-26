<?php
// public/index.php
session_start();

require_once '../app/Includes/db.php';
require_once '../app/Models/Tema.php';

use App\Models\Tema;

$pagina = $_GET['p'] ?? 'inicio';

// --- CORRECCIÓN 1: Redirección canónica ---
// Si alguien escribe manualmente "00.inicio", lo mandamos a "inicio"
if ($pagina === '00.inicio') {
    header("Location: inicio");
    exit;
}

// LOGOUT
if ($pagina === 'logout') {
    session_destroy();
    header("Location: inicio");
    exit;
}

// CONTROLADORES (Auth, Progreso, Admin, Quiz)
if ($pagina === 'auth') {
    require_once '../app/Controllers/auth.php';
    exit;
}
if ($pagina === 'progreso') {
    require_once '../app/Controllers/progreso.php';
    exit;
}
if ($pagina === 'admin_crear') {
    require_once '../app/Controllers/admin_crear.php';
    exit;
}
if ($pagina === 'perfil_actualizar') {
    require_once '../app/Controllers/perfil_actualizar.php';
    exit;
}
if ($pagina === 'quiz_validar') {
    require_once '../app/Controllers/quiz_validar.php';
    exit;
}

// CARGA DE DATOS
try {
    $temaModel = new Tema($pdo);
    $datosTemas = $temaModel->obtenerTodos(); // Array de temas

    // --- CORRECCIÓN 2: Filtro Anti-Duplicado ---
    // Eliminamos '00.inicio' del array de datos para que no salga en el menú
    // ni en la lógica de navegación next/prev, ya que 'inicio' se maneja manual.
    $datosTemas = array_filter($datosTemas, function($t) {
        return $t['slug'] !== '00.inicio';
    });

    // Cargar Progreso
    $temasCompletados = [];
    if (isset($_SESSION['user_id'])) {
        $temasCompletados = $temaModel->obtenerProgresoUsuario($_SESSION['user_id']);
    }

    // Whitelist y Mapa de Temas
    $paginasPermitidas = ['buscar', 'login', 'inicio', 'admin', 'perfil'];
    $infoTemas = [];
    $slugsOrdenados = []; // Para calcular Prev/Next

    foreach ($datosTemas as $t) {
        $paginasPermitidas[] = $t['slug'];
        $infoTemas[$t['slug']] = $t;
        $slugsOrdenados[] = $t['slug'];
    }
} catch (Exception $e) {
    die("Error crítico cargando el sistema.");
}

// VALIDACIÓN DE PÁGINA Y TÍTULO
if (in_array($pagina, $paginasPermitidas)) {
    if ($pagina === 'buscar') $titulo = 'Búsqueda';
    elseif ($pagina === 'login') $titulo = 'Ingresar';
    elseif ($pagina === 'inicio') $titulo = 'Inicio'; // Aquí asignamos el título manual
    elseif ($pagina === 'admin') $titulo = 'Panel Admin';
    elseif ($pagina === 'perfil') $titulo = 'Mi Perfil';
    else $titulo = $infoTemas[$pagina]['titulo'];
} else {
    $pagina = '404';
    $titulo = 'Página no encontrada';
}

// PROTECCIÓN ADMIN
if ($pagina === 'admin') {
    if (!isset($_SESSION['user_id']) || $_SESSION['user_id'] != 1) {
        header("Location: inicio?error=acceso_denegado");
        exit;
    }
}

// LÓGICA PREV / NEXT (Para el Footer Bonito)
$btnPrev = null;
$btnNext = null;

// Solo calculamos navegación si es un tema (no es login, admin, etc)
if (!in_array($pagina, ['inicio', '404', 'buscar', 'login', 'admin', 'perfil'])) {
    $currentIndex = array_search($pagina, $slugsOrdenados);
    if ($currentIndex !== false) {
        // Existe anterior?
        if ($currentIndex > 0) {
            $btnPrev = $slugsOrdenados[$currentIndex - 1];
        }
        // Existe siguiente?
        if ($currentIndex < count($slugsOrdenados) - 1) {
            $btnNext = $slugsOrdenados[$currentIndex + 1];
        }
    }
}

// RENDERIZADO
include '../app/Includes/header.php';
include '../app/Includes/sidebar.php';

// Mapeo de Vistas
if ($pagina === 'inicio') $archivoVista = "../app/Views/00.inicio.php";
elseif ($pagina === 'login') $archivoVista = "../app/Views/login.php";
elseif ($pagina === '404') $archivoVista = "../app/Views/404.php";
elseif ($pagina === 'admin') $archivoVista = "../app/Views/admin.php";
elseif ($pagina === 'perfil') $archivoVista = "../app/Views/perfil.php";
else $archivoVista = "../app/Views/$pagina.php";

echo "<main class='content'>";

if (file_exists($archivoVista)) {
    include $archivoVista;

    // === LÓGICA EXAMEN / COMPLETAR ===
    if (isset($_SESSION['user_id']) && !in_array($pagina, ['inicio', '404', 'buscar', 'login', 'admin', 'perfil'])) {
        $yaCompletado = in_array($pagina, $temasCompletados);

        // Cargar Quiz
        require_once '../app/Models/Quiz.php';
        $quizModel = new \App\Models\Quiz($pdo);
        $temaActualId = $infoTemas[$pagina]['id'] ?? 0;
        $preguntasQuiz = $quizModel->obtenerPorTema($temaActualId);
        $tieneQuiz = count($preguntasQuiz) > 0;
?>

        <div style="margin-top: 40px; padding-top: 20px; border-top: 1px solid var(--color-border);">
            <?php if ($yaCompletado): ?>
                <div class="alert-success-box">
                    <i class="fas fa-check-circle"></i> <strong>¡Lección Completada!</strong>
                    <?php if ($tieneQuiz) echo "<br><small>Aprobaste el examen.</small>"; ?>
                </div>
            <?php elseif ($tieneQuiz): ?>
                <div class="quiz-container-embedded">
                    <h3><i class="fas fa-pencil-alt"></i> Examen de Conocimientos</h3>
                    <?php if (isset($_GET['error']) && $_GET['error'] == 'quiz_reprobado'): ?>
                        <div class="alert-error">❌ No aprobaste. Inténtalo de nuevo.</div>
                    <?php endif; ?>
                    <form action="quiz_validar" method="POST">
                        <input type="hidden" name="slug" value="<?php echo htmlspecialchars($pagina); ?>">
                        <input type="hidden" name="tema_id" value="<?php echo $temaActualId; ?>">
                        <?php foreach ($preguntasQuiz as $p): ?>
                            <div style="margin-bottom: 15px;">
                                <p><strong><?php echo htmlspecialchars($p['texto_pregunta']); ?></strong></p>
                                <?php foreach ($p['opciones'] as $op): ?>
                                    <label style="display:block;"><input type="radio" name="respuesta[<?php echo $p['id']; ?>]" value="<?php echo $op['id']; ?>" required> <?php echo htmlspecialchars($op['texto_opcion']); ?></label>
                                <?php endforeach; ?>
                            </div>
                        <?php endforeach; ?>
                        <button type="submit" class="btn-primary">Enviar Respuestas</button>
                    </form>
                </div>
            <?php else: ?>
                <form action="progreso" method="POST">
                    <input type="hidden" name="slug" value="<?php echo htmlspecialchars($pagina); ?>">
                    <button type="submit" class="btn-primary" style="width:auto;"><i class="fas fa-check"></i> Marcar como Leído</button>
                </form>
            <?php endif; ?>
        </div>
<?php
    } elseif (!isset($_SESSION['user_id']) && !in_array($pagina, ['inicio', '404', 'login'])) {
        // === MENSAJE TRACKING ===
        echo '<div class="tracking-box">
                <i class="fas fa-info-circle"></i> 
                <strong>Registra tu progreso:</strong> <a href="login">Inicia Sesión</a> para guardar tus avances y obtener certificados.
              </div>';
    }

} else {
    echo "<div class='container'><h1>Próximamente</h1><p>El contenido se está redactando.</p></div>";
}
echo "</main>";

include '../app/Includes/footer.php';
?>