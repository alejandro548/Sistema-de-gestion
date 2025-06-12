
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>vista de mantenimiento</title>
    <link rel="stylesheet" href="controlador.php">
</head>
<body>
    <h1>fomulario</h1>

<form action="controlador.php?action=guardar" method="post">
    ID: 
    <input type="text" name="ID" required placeholder="ingrese ID"><br>
    Nombre: 
    <input type="text" name="Nombre" required placeholder="ingrese el Nombre "><br>
    Modelo:
    <input type="text" name="modelo" required placeholder="ingrese el modelo de la maquina">
    ultima Fecha
    <input type="date" name="Fecha_Ultima"><br>
    proxima Fecha
    <input type="date" name="FECHA_PROXIMA"><br>


    <button type="submit">Guardar</button>
  
</form>

<a href="controlador.php?action=Mostrar_lista">Mostrar_lista</a>

</body>
</html>

