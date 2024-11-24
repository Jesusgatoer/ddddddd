<?php
$conn = new mysqli('localhost', 'root', '', 'mecontan');
$data = json_decode(file_get_contents('php://input'), true);

$nombre = $data['nombre'];
$apellido = $data['apellido'];
$telefono = $data['telefono'];
$email = $data['email'];
$direccion = $data['direccion'];

$stmt = $conn->prepare("INSERT INTO clientes (nombre, apellido, telefono, email, direccion) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $nombre, $apellido, $telefono, $email, $direccion);

$response = ['success' => false, 'message' => ''];

if ($stmt->execute()) {
    $response['success'] = true;
} else {
    $response['message'] = 'Error al agregar cliente';
}

echo json_encode($response);
$stmt->close();
$conn->close();
?>
