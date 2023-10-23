<?php
include 'conexionn.php';

// Habilita la visualización de errores de PHP
error_reporting(E_ALL);
ini_set('display_errors', 1);

$response = array();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $codigoCliente = $_POST['codigo'];

    $consulta = "SELECT CONCAT(nombre, ' ', apellido) AS nombre_completo, correo_electronico, telefono FROM clientes WHERE cui = '$codigoCliente'";
    $resultado = $conexion->query($consulta);

    if (!$resultado) {
        // Muestra un mensaje de error si la consulta falla
        $response['error'] = 'Error en la consulta: ' . mysqli_error($conexion);
    } elseif ($resultado->num_rows > 0) {
        $cliente = $resultado->fetch_assoc();
        $response = $cliente;
    } else {
        $response['error'] = 'Cliente no encontrado';
    }
}

$conexion->close();

header('Content-Type: application/json');
echo json_encode($response);
?>


