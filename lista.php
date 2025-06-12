<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mostrar Lista</title>
</head>
<body>
    <h2>Maquinas Registradas</h2>
    <table>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Modelo</th>
            <th>Último Mantenimiento</th>
            <th>Próximo Mantenimiento</th>
            <th>eliminar</th>
            <th>editar</th>
        </tr>
        <?php foreach ($maquinas as $maquina): ?>
        <tr>
            <!-- tener en cuenta muy ENCUENTA que en los campos $maquina[''] debe estar el nombre de la columna de tu base de datos deben ser iguales  -->
            <td><?php echo htmlspecialchars($maquina['ID'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($maquina['NOMBRE'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($maquina['MODELO'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($maquina['FECHA_ULTIMA'] ?? ''); ?></td>
            <td><?php echo htmlspecialchars($maquina['FECHA_PROXIMA'] ?? ''); ?></td>
            <td>
                <!-- en este href la parte mas importante es el [?action=eliminar&ID]  ya que el eliminar&ID el ID tiene que ser igual al nombre de cuadro
                 que retiene el id de lo contrario no mandara la dta -->
                <a href="controlador.php?action=eliminar&ID=<?= $maquina['ID'] ?>" onclick=" return confirm('desea borrar esta maquina')"> Eliminar</a>
            </td>
            <td>
                  <a href="controlador.php?action=editar&ID=<?= $maquina['ID'] ?>">✏️ Editar</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </table>
    <a href="formulario.php">Agregar una maquina</a>
</body>
</html>