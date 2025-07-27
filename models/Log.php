<?php
require_once __DIR__ . '/../config/databases.php';

class Log {

    public static function listar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM logs ORDER BY fecha DESC");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public static function registrar($usuario, $accion) {
        $conn = Database::connect();
        $stmt = $conn->prepare("INSERT INTO logs (usuario, accion) VALUES (?, ?)");
        $stmt->execute([$usuario, $accion]);
    }
}
?>
