<h2>Listado de Logs</h2>

<a href="index.php?action=dashboard">Volver al menú</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Usuario</th>
        <th>Acción</th>
        <th>Fecha</th>
    </tr>
    <?php foreach ($logs as $log): ?>
    <tr>
        <td><?php echo $log['id']; ?></td>
        <td><?php echo $log['usuario']; ?></td>
        <td><?php echo $log['accion']; ?></td>
        <td><?php echo $log['fecha']; ?></td>
    </tr>
    <?php endforeach; ?>
</table>
