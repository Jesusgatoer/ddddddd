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
    // Obtener datos del formulario
    $nombre = trim($_POST["nombre"]);
    $descripcion = trim($_POST["descripcion"]);

    // Validar que el nombre no esté vacío
    if (empty($nombre)) {
        header("Location: agregar_categoria_form.php?error=El nombre de la categoría es obligatorio");
        exit;
    }

    // Preparar y ejecutar la consulta para insertar la categoría
    $stmt = $conn->prepare("INSERT INTO categorias (nombre, descripcion) VALUES (?, ?)");
    $stmt->bind_param("ss", $nombre, $descripcion);

    if ($stmt->execute()) {
        // Redirigir con mensaje de éxito
        header("Location:nuevaCategoria.php");
    } else {
        // Redirigir con mensaje de error
        header("Location: agregar_categoria_form.php?error=Error al agregar la categoría: " . $conn->error);
    }

    // Cerrar la sentencia y conexión
    $stmt->close();
    $conn->close();
}
?>
