<?php
$conexion = new mysqli('localhost', 'root', '', 'mecontan');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_cliente = $_POST['id_cliente'];
    $total = $_POST['total'];
    $productos = json_decode($_POST['productos'], true);

    $conexion->query("INSERT INTO ventas (id_cliente, total) VALUES ($id_cliente, $total)");
    $id_venta = $conexion->insert_id;

    foreach ($productos as $producto) {
        $id_producto = $producto['id'];
        $cantidad = $producto['cantidad'];
        $precio = $producto['precio'];
        $conexion->query("INSERT INTO detalle_ventas (id_venta, id_producto, cantidad, precio) VALUES ($id_venta, $id_producto, $cantidad, $precio)");
    }

    echo json_encode(['success' => true]);
}
?>
