<?php 
require 'funciones.php'; 
require 'conexionn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];

    $funciones = new tipo_cobro($conexion); 

    if ($funciones->agregarCobro($nombre)) {

        header("Location: tipo_pago.html");
        exit();
    } else {

        echo "Error al agregar el tipo de Cobro.";
    }
}
else {
    echo "Error al agregar el tipo de Cobro.";
}
?>
