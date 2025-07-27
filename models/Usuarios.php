<?php
require_once __DIR__ . '/../config/databases.php';
class Usuario {
    private $id;
    private $nombre;
    private $email;
    private $password;
    
    public function __construct($id = null, $nombre, $email,$password) {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->email = $email;
        $this->password = $password;
    }

    public static function listar() {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios");
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function guardar() {
        $conn = Database::connect();
        if ($this->id) {
            $stmt = $conn->prepare("UPDATE usuarios SET nombre = ?, email = ?, password = ? WHERE id = ?");
            return $stmt->execute([$this->nombre, $this->email, $this->password, $this->id]);
        } else {
           $stmt = $conn->prepare("INSERT INTO usuarios (nombre, email, password) VALUES (?, ?, ?)");
            return $stmt->execute([$this->nombre, $this->email, $this->password]);
        }
    }

    public static function obtenerId($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM usuarios WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminar($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
        return $stmt->execute([$id]);
    }

    public static function obtenerPorEmail($email) {
    $conn = Database::connect();
    $stmt = $conn->prepare("SELECT * FROM usuarios WHERE email = ?");
    $stmt->execute([$email]);
    return $stmt->fetch(PDO::FETCH_ASSOC);
}

}
?>
