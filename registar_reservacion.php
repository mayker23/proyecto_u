<?php 
require 'funciones.php'; 
require 'conexionn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cui = $_POST["codigo_cliente"];
    $mesas = $_POST["mesas_necesarias"];
    $sillas = $_POST["sillas_necesarias"];
    $fecha_reservacion = $_POST["fecha_evento"];
    $direccion_evento = $_POST["direccion_evento"];
    $tipo_evento = $_POST["tipo_evento"];
    $metodo_pago = $_POST["metodo_pago"];


    // Crear un objeto Usuario utilizando la conexión a la base de datos
    $funciones = new reservacion($conexion); // Usar el nombre correcto de la variable de conexión

    if ($funciones->agregarReservacion($cui, $mesas, $sillas, $fecha_reservacion, $direccion_evento, $tipo_evento, $metodo_pago)) {
        // El usuario se agregó correctamente, redirecciona a la lista de usuarios
        header("Location: reservacion.php");
        exit();
    } else {
        // Hubo un error al agregar el usuario, muestra un mensaje de error
        echo "Error al agregar la Reservacion.";
    }
}
else {
    echo "Error al agregar la Reservacion.";
}
?>
