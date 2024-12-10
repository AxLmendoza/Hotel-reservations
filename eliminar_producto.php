<?php
header('Content-Type: application/json');
include 'conexion.php';

try {
    $data = json_decode(file_get_contents("php://input"), true);

    // Validar los datos recibidos
    if (!isset($data['id'])) {
        echo json_encode(["success" => false, "message" => "ID no especificado"]);
        exit;
    }

    $id = $data['id'];

    // Conectar a la base de datos
    $conn = conectar();

    // Preparar la consulta de eliminación
    $stmt = $conn->prepare("DELETE FROM productos WHERE id = :id");
    $stmt->bindParam(':id', $id);

    // Ejecutar la consulta
    if ($stmt->execute()) {
        echo json_encode(["success" => true, "message" => "Producto eliminado exitosamente"]);
    } else {
        echo json_encode(["success" => false, "message" => "Error al eliminar el producto"]);
    }
} catch (Exception $e) {
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
?>
