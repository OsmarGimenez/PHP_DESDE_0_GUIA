class Tema {
    private $pdo;

    public function __construct($pdo) {
        $this->pdo = $pdo;
    }

    public function obtenerTodos() {
        $stmt = $this->pdo->query("SELECT titulo, slug, es_premium FROM temas ORDER BY orden ASC");
        return $stmt->fetchAll();
    }

    // ... aquí pondrías la lógica de paginación también
}