

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Gestión de Agenda</title>
</head>
<body>
    
    
    
    <h1>Gestión de Agenda</h1>
    <?php  // vista previa para llamar los datos con la base de datos redsalud
    include 'controles/Agenda.php';
    $agenda = new Agenda();
    $datos = $agenda->obtenerDatos();
    ?>

    <table border="1">
        <tr>
            <th>IDagenda</th>
            <th>Fecha</th>
            <th>Paciente</th>
            <th>RUT</th>
            <th>Número</th>
            <th>Estado</th>
            <th>Acciones</th>
        </tr>
        <?php foreach ($datos as $dato): ?>
        <tr>
            <form action="controles/actualizar.php" method="post">
                <td><?php echo $dato['IDagenda']; ?><input type="hidden" name="IDagenda" value="<?php echo $dato['IDagenda']; ?>"></td>
                <td><input type="date" name="fecha" value="<?php echo $dato['fecha']; ?>"></td>
                <td><input type="text" name="paciente" value="<?php echo $dato['paciente']; ?>"></td>
                <td><input type="number" name="rut" value="<?php echo $dato['rut']; ?>"></td>
                <td><input type="number" name="numero" value="<?php echo $dato['numero']; ?>"></td>
                <td><input type="text" name="estado" value="<?php echo $dato['Estado']; ?>"></td>
                <td><input type="submit" value="Actualizar"></td>
            </form>
        </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
