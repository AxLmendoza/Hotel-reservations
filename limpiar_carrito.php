<?php
include 'conexion.php';

try {
    $conn = conectar();

    // Eliminar todos los registros del carrito
    $sql = "DELETE FROM productos";
    $stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode(["success" => true, "message" => "Carrito limpio exitosamente."]);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Error al limpiar el carrito: " . $e->getMessage()]);
}
?>
