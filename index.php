<?php
session_start();

require_once 'controllers/UsuarioController.php';
require_once 'controllers/LoginController.php';
require_once 'controllers/ProyectoFinalController.php';
require_once 'controllers/LogController.php';
$action = $_GET['action'] ?? (isset($_SESSION['usuario']) ? 'index' : 'login');

if (!isset($_SESSION['usuario']) && $action != 'login') {
    header('Location: index.php?action=login');
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Parcial Programación Facundo Grossi</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="TABLA">
        <?php
        $action = $_GET['action'] ?? null;

if (!isset($_SESSION['usuario'])) {
    $action = $action ?? 'login';
} else {
    $action = $action ?? 'dashboard';
}

        switch ($action) {
    case 'login':
        $login = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $login->login();
        } else {
            $login->mostrarFormulario();
        }
        break;

    case 'logout':
        $login = new LoginController();
        $login->logout();
        break;

    case 'dashboard':
        include 'views/dashboard.php';
        break;

    case 'index_usuarios':
        $ctrl = new UsuarioController();
        $ctrl->index();
        break;

    case 'index_proyectos':
        $ctrl = new ProyectoFinalController();
        $ctrl->index(); 
        break;
    case 'index_logs':
        $ctrl = new LogController();
        $ctrl->index(); 
        break;

    case 'crear':
    $ctrl = new UsuarioController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ctrl->guardar();
    } else {
        $ctrl->crear();
    }
    break;


    case 'editar':
    $ctrl = new UsuarioController();
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $ctrl->editar($id);
    break;

    case 'crear_proyecto':
    $ctrl = new ProyectoFinalController();
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $ctrl->guardar();
    } else {
        $ctrl->crear();
    }
    break;

        case 'editar_proyecto':
    $ctrl = new ProyectoFinalController();
    $id = isset($_GET['id']) ? $_GET['id'] : null;
    $ctrl->editar($id);
    break;
    default:
        echo "Acción no válida.";
        break;
}

        ?>
    </div>
</body>
</html>
