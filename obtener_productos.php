<?php
header('Content-Type: application/json');
include 'conexion.php';

try {
    $conn = conectar();

    // Consultar todos los productos
    $stmt = $conn->prepare("SELECT * FROM productos");
    $stmt->execute();

    // Obtener los datos en un arreglo
    $productos = $stmt->fetchAll(PDO::FETCH_ASSOC);

    // Enviar los datos como respuesta JSON
    echo json_encode($productos);
} catch (PDOException $e) {
    echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
}
?>
