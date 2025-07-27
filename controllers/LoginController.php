<?php
require_once 'models/Usuarios.php';
require_once 'controllers/LogController.php';

class LoginController {

    public function mostrarFormulario() {
        include 'views/login.php';
    }

    public function login() {
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }

    $email = $_POST['email'];
    $password = $_POST['password'];

    $usuario = Usuario::obtenerPorEmail($email);
    
    if ($usuario && $password === $usuario['password']) {
        Log::registrar($usuario['nombre'], 'Inicio de sesión');
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
    } else {
        echo "<script>alert('Email o contraseña incorrectos');</script>";
        require_once __DIR__ . '/../views/login.php';
    }

}

public function logout() {
    session_start();

    if (isset($_SESSION['usuario'])) {
        $nombre = $_SESSION['usuario']['nombre'];
        require_once 'models/Log.php'; // por si no está incluido aún
        Log::registrar($nombre, 'Cierre de sesión');
    }

    session_destroy();
    header('Location: index.php?action=login');
}

}
?>
