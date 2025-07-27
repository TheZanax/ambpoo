<?php
require_once __DIR__ . '/../config/databases.php';

class ProyectoFinal {
    private $id;
    private $titulo;
    private $descripcion;
    private $fecha_entrega;
    private $usuario_id;

    public function __construct($id = null, $titulo, $descripcion, $fecha_entrega, $usuario_id) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->fecha_entrega = $fecha_entrega;
        $this->usuario_id = $usuario_id;
    }

   public static function listarPorUsuario($usuario_id) {
    $conn = Database::connect();
    $stmt = $conn->prepare("SELECT pf.*, u.nombre AS nombre_usuario FROM proyectos_finales pf JOIN usuarios u ON pf.usuario_id = u.id WHERE pf.usuario_id = ?");
    $stmt->execute([$usuario_id]);
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}


    public function guardar() {
        $conn = Database::connect();
        if ($this->id) {
            $stmt = $conn->prepare("UPDATE proyectos_finales SET titulo = ?, descripcion = ?, fecha_entrega = ?, usuario_id = ? WHERE id = ?");
            return $stmt->execute([$this->titulo, $this->descripcion, $this->fecha_entrega, $this->usuario_id, $this->id]);
        } else {
            $stmt = $conn->prepare("INSERT INTO proyectos_finales (titulo, descripcion, fecha_entrega, usuario_id) VALUES (?, ?, ?, ?)");
            return $stmt->execute([$this->titulo, $this->descripcion, $this->fecha_entrega, $this->usuario_id]);
        }
    }

    public static function obtenerId($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("SELECT * FROM proyectos_finales WHERE id = ?");
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public static function eliminar($id) {
        $conn = Database::connect();
        $stmt = $conn->prepare("DELETE FROM proyectos_finales WHERE id = ?");
        return $stmt->execute([$id]);
    }
}
?>
