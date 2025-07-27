<h2>Lista de Usuarios</h2>

<a href="index.php?action=crear">Nuevo Usuario</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th >Nombre</th>
        <th>email</th>
        <th>password</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($usuarios as $usuario): ?>
    <tr>
        <td><?php echo $usuario['id']; ?></td>
        <td><?php echo $usuario['nombre']; ?></td>
        <td><?php echo $usuario['email']; ?></td>
        <td><?php echo $usuario['password']; ?></td>
        <td>
            <a href="index.php?action=editar&id=<?php echo $usuario['id']; ?>">Editar</a>
            <a href="index.php?action=eliminar&id=<?php echo $usuario['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este usuario?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
    <p>Bienvenido, <?php echo $_SESSION['usuario']['nombre']; ?> | 
<a href="index.php?action=logout">Cerrar sesión</a></p>

</table>
