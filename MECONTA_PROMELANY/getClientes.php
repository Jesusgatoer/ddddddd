<?php
$conn = new mysqli('localhost', 'root', '', 'mecontan');
$sql = "SELECT * FROM clientes";
$result = $conn->query($sql);
$clientes = [];
while ($row = $result->fetch_assoc()) {
    $clientes[] = $row;
}
echo json_encode($clientes);
$conn->close();
?>
