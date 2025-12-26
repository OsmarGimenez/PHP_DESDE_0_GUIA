<?php
// app/Controllers/quiz_validar.php
if (session_status() === PHP_SESSION_NONE) session_start();

if (!isset($_SESSION['user_id'])) {
    header("Location: login");
    exit;
}

require_once __DIR__ . '/../Includes/db.php';
require_once __DIR__ . '/../Models/Quiz.php';
require_once __DIR__ . '/../Models/Tema.php';

use App\Models\Quiz;
use App\Models\Tema;

$respuestas = $_POST['respuesta'] ?? []; // Array [pregunta_id => opcion_id]
$temaSlug = $_POST['slug'] ?? '';
$temaId = $_POST['tema_id'] ?? 0;

if (empty($respuestas) || empty($temaSlug)) {
    header("Location: " . $temaSlug . "?error=debes_responder_todo");
    exit;
}

try {
    $quizModel = new Quiz($pdo);
    
    // 1. Calcular nota
    $aciertos = $quizModel->calcularNota($respuestas);
    $totalPreguntas = count($respuestas);
    
    // Regla: Se aprueba con el 100% (puedes cambiarlo a 0.7 para 70%)
    if ($aciertos == $totalPreguntas) {
        
        // 2. Si aprobó, marcamos como completado
        $temaModel = new Tema($pdo);
        $temaModel->marcarComoCompletado($_SESSION['user_id'], $temaId);
        
        header("Location: " . $temaSlug . "?completed=1&quiz_score=" . $aciertos);
    } else {
        // 3. Si reprobó
        header("Location: " . $temaSlug . "?error=quiz_reprobado&aciertos=" . $aciertos);
    }

} catch (Exception $e) {
    error_log($e->getMessage());
    header("Location: " . $temaSlug . "?error=error_sistema");
}
?>