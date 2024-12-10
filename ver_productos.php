<?php
// Incluye el archivo de conexión
include 'conexion.php';

// Consulta para obtener los productos y sus coordenadas
$query = "SELECT nombre, precio, direccion, latitud, longitud FROM productos";
$resultado = mysqli_query($conexion, $query);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos y Coordenadas</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Lista de Productos y Coordenadas</h1>
    <table>
        <tr>
            <th>Nombre</th>
            <th>Precio</th>
            <th>Dirección</th>
            <th>Latitud</th>
            <th>Longitud</th>
        </tr>
        <?php while ($producto = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
            <td><?php echo $producto['nombre']; ?></td>
            <td><?php echo $producto['precio']; ?></td>
            <td><?php echo $producto['direccion']; ?></td>
            <td><?php echo $producto['latitud']; ?></td>
            <td><?php echo $producto['longitud']; ?></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>
