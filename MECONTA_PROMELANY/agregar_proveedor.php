<?php
// Datos de conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$database = "mecontan";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $database);

// Verificar la conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si se envió el formulario
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = trim($_POST["nombre"]);
    $contacto = trim($_POST["contacto"]);
    $direccion = trim($_POST["direccion"]);
    $tipo_productos = trim($_POST["tipo_productos"]);

    // Validar que el nombre no esté vacío
    if (empty($nombre)) {
        die("El nombre del proveedor es obligatorio.");
    }

    // Consulta para insertar un nuevo proveedor
    $stmt = $conn->prepare("INSERT INTO proveedores (nombre, contacto, direccion, tipo_productos) VALUES (?, ?, ?, ?)");
    $stmt->bind_param("ssss", $nombre, $contacto, $direccion, $tipo_productos);

    if ($stmt->execute()) {
        echo "Proveedor agregado exitosamente. <a href='provedores.php'>Volver</a>";
    } else {
        echo "Error al agregar el proveedor: " . $conn->error;
    }

    // Cerrar la conexión
    $stmt->close();
    $conn->close();
}
?>
