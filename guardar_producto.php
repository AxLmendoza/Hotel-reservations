<?php
header('Content-Type: application/json');
include 'conexion.php';

try {
    // Obtener los datos enviados por el cliente
    $data = json_decode(file_get_contents("php://input"), true);

    // Validar los datos recibidos
    if (!isset($data['nombre'], $data['descripcion'], $data['precio'], $data['stock'])) {
        echo json_encode(["success" => false, "message" => "Datos incompletos"]);
        exit;
    }

    $nombre = $data['nombre'];
    $descripcion = $data['descripcion'];
    $precio = $data['precio'];
    $stock = $data['stock'];

    // Conectar a la base de datos
    $conn = conectar();

    // Preparar la consulta de inserción
    $stmt = $conn->prepare("INSERT INTO productos (nombre, descripcion, precio, stock) VALUES (:nombre, :descripcion, :precio, :stock)");
    $stmt->bindParam(':nombre', $nombre);
    $stmt->bindParam(':descripcion', $descripcion);
    $stmt->bindParam(':precio', $precio);
    $stmt->bindParam(':stock', $stock);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Producto guardado exitosamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al guardar el producto"]);
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
?>