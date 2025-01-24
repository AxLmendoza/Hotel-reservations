<?php
// Incluir la función de conexión
include 'conexion.php';

// Verificar que los datos se han enviado correctamente
if (isset($_POST['product_name']) && isset($_POST['product_price']) && isset($_POST['product_description'])) {
    $product_name = $_POST['product_name'];
    $product_price = $_POST['product_price'];
    $product_description = $_POST['product_description'];

    // Validar que los campos no estén vacíos
    if (empty($product_name) || empty($product_price) || empty($product_description)) {
        echo "<script>alert('Todos los campos son obligatorios.'); window.history.back();</script>";
        exit;
    }

    try {
        // Conectar a la base de datos
        $conn = conectar();

        // Preparar la consulta SQL
        $sql = "INSERT INTO productos (nombre, precio, descripcion) VALUES (:nombre, :precio, :descripcion)";
        $stmt = $conn->prepare($sql);

        // Vincular los parámetros
        $stmt->bindParam(':nombre', $product_name);
        $stmt->bindParam(':precio', $product_price);
        $stmt->bindParam(':descripcion', $product_description);

        // Ejecutar la consulta
        if ($stmt->execute()) {
            // Mostrar mensaje con JavaScript y redirigir
            echo "<script>
                    alert('Producto \"$product_name\" con precio $product_price registrado exitosamente.');
                    window.location.href = 'index.html';
                  </script>";
            exit;
        }
    } catch (PDOException $e) {
        // Manejar errores
        echo "<script>alert('Ocurrió un error al registrar el producto. Inténtalo de nuevo.');</script>";
    }
} else {
    // Datos no enviados correctamente
    echo "<script>alert('Error: Datos no enviados correctamente.'); window.history.back();</script>";
}

// El cambio del carrito siguie estando mal verifica de nuevo 
?>

