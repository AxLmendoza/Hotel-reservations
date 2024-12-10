<?php
include 'conexion.php';

try {
    $conn = conectar();

    // Suponiendo que los datos del carrito están en una tabla 'carrito'
    $query = "SELECT * FROM carrito";
    $stmt = $conn->query($query);

    // Insertar los datos en una tabla 'compras'
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $insertQuery = "INSERT INTO compras (nombre, precio, cantidad) VALUES (:nombre, :precio, :cantidad)";
        $insertStmt = $conn->prepare($insertQuery);
        $insertStmt->execute([
            ':nombre' => $row['nombre'],
            ':precio' => $row['precio'],
            ':cantidad' => $row['cantidad'],
        ]);
    }

    echo json_encode(['success' => true, 'message' => 'Compra guardada exitosamente.']);
} catch (PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Error al guardar la compra: ' . $e->getMessage()]);
}
