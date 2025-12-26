<?php
// app/Models/Usuario.php
namespace App\Models;

use PDO;

class Usuario {
    private $pdo;

    public function __construct(PDO $pdo) {
        $this->pdo = $pdo;
    }

    // Obtener datos del usuario por ID
    public function obtenerPorId($id) {
        $stmt = $this->pdo->prepare("SELECT id, nombre, email, rol FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Actualizar datos
    public function actualizar($id, $nombre, $password = null) {
        if ($password) {
            // Si hay contraseña nueva, la hasheamos y actualizamos todo
            $hash = password_hash($password, PASSWORD_DEFAULT);
            $sql = "UPDATE usuarios SET nombre = ?, password = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$nombre, $hash, $id]);
        } else {
            // Si no, solo actualizamos el nombre
            $sql = "UPDATE usuarios SET nombre = ? WHERE id = ?";
            $stmt = $this->pdo->prepare($sql);
            return $stmt->execute([$nombre, $id]);
        }
    }
}
?>