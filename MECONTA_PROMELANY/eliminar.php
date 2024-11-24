<?php
include("listaconexion.php");

if (isset($_GET['id'])) {
    $id_producto = $_GET['id'];
    $sql = "DELETE FROM productos WHERE id_producto = $id_producto";

    if ($conn->query($sql) === TRUE) {
        header("Location: listadeProductoinCP.PHP");
    } else {
        echo "Error al eliminar: " . $conn->error;
    }
}
?>
