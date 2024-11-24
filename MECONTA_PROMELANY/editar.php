<?php
include("listaconexion.php");

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $sql = "SELECT * FROM productos WHERE id_producto = $id_producto";
    $result = $conn->query($sql);
    $producto = $result->fetch_assoc();
}

if (isset($_POST['actualizar'])) {
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $precio_unitario = $_POST['precio_unitario'];
    $stock = $_POST['stock'];
    $fecha_compra = $_POST['fecha_compra'];

    $sql = "UPDATE productos SET nombre = '$nombre', descripcion = '$descripcion', precio_unitario = '$precio_unitario', stock = '$stock', fecha_compra = '$fecha_compra' WHERE id_producto = $id_producto";

    if ($conn->query($sql) === TRUE) {
        header("Location: listadeProductoinCP.PHP");
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <style>
        /* Estilos generales para centrar el formulario */
body {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 100vh;
    margin: 0;
    font-family: Arial, sans-serif;
    background-color: #154360;
}

/* Contenedor del formulario */
form {
    width: 80%;
    max-width: 400px;
    padding: 2rem;
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* Estilo de las etiquetas */
form label {
    display: block;
    font-size: 1rem;
    color: #333;
    margin-bottom: 0.5rem;
}

/* Estilo de los campos de entrada */
form input[type="text"],
form input[type="number"],
form input[type="date"],
form textarea {
    width: 100%;
    padding: 0.5rem;
    font-size: 1rem;
    margin-bottom: 1rem;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

/* Estilo del botón de actualización */
form button[type="submit"] {
    width: 100%;
    padding: 0.75rem;
    font-size: 1rem;
    color: #fff;
    background-color: #0D3232;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    transition: background-color 0.3s ease;
}

/* Efecto de hover en el botón */
form button[type="submit"]:hover {
    background-color: #154360;
}

    
    </style>
</head>
<body>
    <form method="post" action="">
    <h2>Editar Producto</h2>
        <label>Nombre:</label>
        <input type="text" name="nombre" value="<?php echo $producto['nombre']; ?>"><br>
        <label>Descripción:</label>
        <textarea name="descripcion"><?php echo $producto['descripcion']; ?></textarea><br>
        <label>Precio Unitario:</label>
        <input type="number" name="precio_unitario" step="0.01" value="<?php echo $producto['precio_unitario']; ?>"><br>
        <label>Stock:</label>
        <input type="number" name="stock" value="<?php echo $producto['stock']; ?>"><br>
        <label>Fecha Compra:</label>
        <input type="date" name="fecha_compra" value="<?php echo $producto['fecha_compra']; ?>"><br>
        <button type="submit" name="actualizar">Actualizar</button>
    </form>
</body>
</html>
