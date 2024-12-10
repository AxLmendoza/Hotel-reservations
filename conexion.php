<?php
function conectar() {
    $servername = "localhost"; // Nombre del servidor
    $username = "root"; // Usuario de la base de datos
    $password = ""; // Contraseña de la base de datos
    $dbname = "papeleria_db"; // Nombre de la base de datos

    try {
        // Establecemos la conexión con PDO
        $conn = new PDO("mysql:host=$servername;dbname=$dbname;charset=utf8", $username, $password);
        // Establecer el modo de error a excepción para manejo de errores
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $conn; // Retorna la conexión
    } catch (PDOException $e) {
        // Si hay un error en la conexión, se muestra un mensaje
        die("Error de conexión: " . $e->getMessage());
    }
}
?>
