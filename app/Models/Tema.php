<?php
// app/Models/Tema.php
namespace App\Models;

use PDO;

class Tema {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Obtener todos los temas ordenados para el menú
    public function obtenerTodos() {
        $sql = "SELECT titulo, slug, es_premium, descripcion FROM temas ORDER BY orden ASC";
        $stmt = $this->pdo->query($sql);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // (Opcional) Método para buscar temas (para tu buscador)
    public function buscar($termino) {
        $sql = "SELECT * FROM temas WHERE titulo LIKE ? OR descripcion LIKE ? ORDER BY orden ASC";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute(["%$termino%", "%$termino%"]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>