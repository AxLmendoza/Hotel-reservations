<?php
// Incluir la función de conexión
include 'conexion.php'; // Asegúrate de que este archivo está en el mismo directorio

// Verificar que los datos se han enviado correctamente
if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_description'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description']; // Recibiendo la descripción

    // Validar que los campos no estén vacíos
    if (empty($product_name) || empty($product_price) || empty($product_description)) {
        echo json_encode(["success" => false]); // Respuesta en caso de datos incompletos
        exit; // Finalizar el script
    }

    try {
        // Conectar a la base de datos
        $conn = conectar();

        // Preparar la consulta SQL
        $sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES (:nombre, :precio, :descripcion)";
        $stmt = $conn->prepare($sql); // Preparar la sentencia SQL

        // Vincular los parámetros a la sentencia
        $stmt->bindParam(':nombre', $product_name);
        $stmt->bindParam(':precio', $product_price);
        $stmt->bindParam(':descripcion', $product_description); // Vincular la descripción

        // Ejecutar la consulta
        $stmt->execute();

        // Respuesta exitosa
        echo json_encode(["success" => true]); // Respuesta en caso de éxito
    } catch (PDOException $e) {
        // Respuesta en caso de error
        echo json_encode(["success" => false]); // No incluir detalles del error por seguridad
    }
} else {
    // Si los datos no se enviaron correctamente
    echo json_encode(["success" => false]);
}
?>
