<?php
// app/Models/Tema.php
namespace App\Models;

use PDO;

class Tema {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // 1. Obtener todos los temas (Existente)
    public function obtenerTodos() {
        $sql = "SELECT id, titulo, slug, es_premium, descripcion FROM temas ORDER BY orden ASC";
        // Nota: Agregué 'id' al SELECT porque lo necesitaremos para relacionar
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // 2. Buscar temas (Existente)
    public function buscar($termino) {
        $sql = "SELECT * FROM temas WHERE titulo LIKE ? OR descripcion LIKE ? ORDER BY orden ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["%$termino%", "%$termino%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // --- NUEVOS MÉTODOS PARA EL PROGRESO ---

    // 3. Obtener el ID de un tema basándonos en su slug (URL)
    public function obtenerIdPorSlug($slug) {
        $stmt = $this->pdo->prepare("SELECT id FROM temas WHERE slug = ?");
        $stmt->execute([$slug]);
        return $stmt->fetchColumn(); // Devuelve solo el ID (o false)
    }

    // 4. Marcar un tema como completado
    public function marcarComoCompletado($usuarioId, $temaId) {
        // Usamos INSERT IGNORE para que si ya existe, no de error, simplemente lo ignore
        $sql = "INSERT IGNORE INTO usuario_progreso (usuario_id, tema_id) VALUES (?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$usuarioId, $temaId]);
    }

    // 5. Obtener la lista de temas completados por un usuario
    // Devuelve un array simple con los SLUGS de los temas completados
    public function obtenerProgresoUsuario($usuarioId) {
        $sql = "SELECT t.slug 
                FROM usuario_progreso up
                JOIN temas t ON up.tema_id = t.id
                WHERE up.usuario_id = ?";
        
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([$usuarioId]);
        
        // FETCH_COLUMN devuelve un array plano: ['01.etiquetas', '05.condicionales', ...]
        return $stmt->fetchAll(PDO::FETCH_COLUMN);
    }

    public function crearTema($titulo, $slug, $descripcion, $orden, $esPremium, $imagen = null) {
        $sql = "INSERT INTO temas (titulo, slug, descripcion, orden, es_premium, imagen) VALUES (?, ?, ?, ?, ?, ?)";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titulo, $slug, $descripcion, $orden, $esPremium, $imagen]);
    }
}
?>