<?php
// Conexión a la base de datos
$conexion = new mysqli("localhost", "root", "", "mecontan");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Variables del formulario, asegurando que las claves foráneas se envíen como NULL si están vacías
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$categoria = !empty($_POST['categoria']) ? $_POST['categoria'] : "NULL";
$precio = $_POST['precio'];
$stock = $_POST['stock'];
$proveedor = !empty($_POST['proveedor']) ? $_POST['proveedor'] : "NULL";
$costoTotal = $_POST['costoTotal'];
$fechaCompra = $_POST['fechaCompra'];

// Sentencia SQL para insertar el producto
$sql = "INSERT INTO productos (nombre, descripcion, id_categoria, precio_unitario, stock, id_proveedor, costo_total_compra, fecha_compra)
VALUES ('$nombre', '$descripcion', $categoria, '$precio', '$stock', $proveedor, '$costoTotal', '$fechaCompra')";

// Ejecutar la consulta
if ($conexion->query($sql) === TRUE) {
    echo "<script>
            alert('Producto ingresado correctamente');
            window.location.href = 'gestionProductos.php'; // Redirige a la página principal
          </script>";
} else {
    echo "Error: " . $sql . "<br>" . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Guardar Producto</title>
    <style>
        body{
            background-color: #154360;
        }
    </style>
</head>
<body>
    
</body>
</html>
