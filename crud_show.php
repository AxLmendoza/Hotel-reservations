<?php
// Conectar a la base de datos
$conexion = new mysqli('localhost', 'root', '', 'nombre_base_datos');

// Verificar la conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Consultar los productos
$sql = "SELECT id, nombre, descripcion, precio FROM carrito";
$result = $conexion->query($sql);

// Mostrar los productos en formato HTML
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['nombre'] . "</td>";
        echo "<td>" . $row['descripcion'] . "</td>";
        echo "<td>" . $row['precio'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "No hay productos en el carrito.";
}

// Cerrar la conexión
$conexion->close();
?>
