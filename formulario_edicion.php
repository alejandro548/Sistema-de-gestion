<!DOCTYPE html>
<html>
<head>
    <title>Editar Máquina</title>
</head>
<body>
    <h2>Editar Máquina</h2>
    <form action="controlador.php?action=actualizar" method="POST">
        <input type="hidden" name="ID" value="<?= $maquina['ID'] ?>">
        
        <label>Nombre:
            <input type="text" name="NOMBRE" value="<?= htmlspecialchars($maquina['NOMBRE']) ?>" required><br>
        </label>
        
        <label>Modelo:
            <input type="text" name="MODELO" value="<?= htmlspecialchars($maquina['MODELO']) ?>"><br>
        </label>
        
        <label>Último Mantenimiento:
            <input type="date" name="FECHA_ULTIMA" value="<?= $maquina['FECHA_ULTIMA'] ?>"><br>
        </label>
        
        <label>Próximo Mantenimiento:
            <input type="date" name="FECHA_PROXIMA" value="<?= $maquina['FECHA_PROXIMA'] ?>" required>
        </label><br>
        
        <button type="submit">Guardar Cambios</button><br>
    </form>
</body>
</html>