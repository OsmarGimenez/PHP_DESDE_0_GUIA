<?php
// app/Models/Quiz.php
namespace App\Models;
use PDO;

class Quiz {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Obtener preguntas y sus opciones para un tema
    public function obtenerPorTema($temaId) {
        // 1. Obtener preguntas
        $stmt = $this->pdo->prepare("SELECT * FROM preguntas WHERE tema_id = ?");
        $stmt->execute([$temaId]);
        $preguntas = $stmt->fetchAll(PDO::FETCH_ASSOC);

        // 2. Obtener opciones para cada pregunta
        foreach ($preguntas as &$pregunta) {
            $stmtOp = $this->pdo->prepare("SELECT id, texto_opcion FROM opciones WHERE pregunta_id = ? ORDER BY RAND()"); // RAND() mezcla las opciones
            $stmtOp->execute([$pregunta['id']]);
            $pregunta['opciones'] = $stmtOp->fetchAll(PDO::FETCH_ASSOC);
        }
        return $preguntas;
    }

    // Validar respuestas del usuario
    public function calcularNota($respuestasUsuario) {
        $totalPreguntas = count($respuestasUsuario);
        $correctas = 0;

        foreach ($respuestasUsuario as $preguntaId => $opcionId) {
            // Verificamos si la opción elegida es la correcta en la DB
            $sql = "SELECT es_correcta FROM opciones WHERE id = ? AND pregunta_id = ?";
            $stmt = $this->pdo->prepare($sql);
            $stmt->execute([$opcionId, $preguntaId]);
            $esCorrecta = $stmt->fetchColumn();

            if ($esCorrecta == 1) {
                $correctas++;
            }
        }
        return $correctas; // Devolvemos número de aciertos
    }
}
?>