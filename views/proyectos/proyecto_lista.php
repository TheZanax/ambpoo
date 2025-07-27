<h2>Lista de Proyectos Finales</h2>

<a href="index.php?action=crear_proyecto">Nuevo Proyecto</a>
<a href="index.php">Volver</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Título</th>
        <th>Descripción</th>
        <th>Fecha Entrega</th>
        <th>Usuario</th>
        <th>Acciones</th>
    </tr>
    <?php foreach ($proyectos as $proyecto): ?>
    <tr>
        <td><?php echo $proyecto['id']; ?></td>
        <td><?php echo $proyecto['titulo']; ?></td>
        <td><?php echo $proyecto['descripcion']; ?></td>
        <td><?php echo $proyecto['fecha_entrega']; ?></td>
        <td><?php echo $proyecto['nombre_usuario']; ?></td>
        <td>
            <a href="index.php?action=editar_proyecto&id=<?php echo $proyecto['id']; ?>">Editar</a>
            <a href="index.php?action=eliminar_proyecto&id=<?php echo $proyecto['id']; ?>" onclick="return confirm('¿Seguro que deseas eliminar este proyecto?')">Eliminar</a>
        </td>
    </tr>
    <?php endforeach; ?>
</table>
