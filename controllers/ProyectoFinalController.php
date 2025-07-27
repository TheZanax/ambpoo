<?php
require_once 'models/ProyectoFinal.php';

class ProyectoFinalController {

    public function index() {
   if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $usuario_id = $_SESSION['usuario']['id'];
    $proyectos = ProyectoFinal::listarPorUsuario($usuario_id);
    require 'views/proyectos/proyecto_lista.php';
}


    public function crear() {
        require 'views/proyectos/proyecto_form.php';
    }

    public function guardar() {
        if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
        $id = $_POST['id'] ?? null;
        $titulo = $_POST['titulo'];
        $descripcion = $_POST['descripcion'];
        $fecha_entrega = $_POST['fecha_entrega'];
        $usuario_id = $_SESSION['usuario']['id'];

        $proyecto = new ProyectoFinal($id, $titulo, $descripcion, $fecha_entrega, $usuario_id);
        $proyecto->guardar();

        header('Location: index.php?action=index_proyectos');
    }

    public function editar($id) {
        $proyecto = ProyectoFinal::obtenerId($id);
        require 'views/proyectos/proyecto_form.php';
    }

    public function eliminar($id) {
        ProyectoFinal::eliminar($id);
        header('Location: index.php?action=index_proyectos');
    }
}
?>
