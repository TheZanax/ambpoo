<?php

require_once 'models/Usuarios.php';

class UsuarioController {

    public function index() {
        $usuarios = Usuario::listar();
        require 'views/usuarios/usuario_lista.php';
    }

    public function crear() {
        require 'views/usuarios/usuario_form.php';
    }

    public function guardar() {
        $id = $_POST['id'] ?? null;
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $password = $_POST['password'];

        $usuario = new Usuario($id, $nombre, $email, $password);
        $usuario->guardar();

        header('Location: index.php');
    }

    public function editar($id) {
        $usuario = Usuario::obtenerId($id);
        require 'views/usuarios/usuario_form.php';
    }

    public function eliminar($id) {
        Usuario::eliminar($id);
        header('Location: index.php');
    }
}
?>
