<?php 
require 'funciones.php'; 
require 'conexionn.php'; 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST["nombre"];
    $costo = $_POST["costo"];
    try{
        $funciones = new eventoss($conexion); 

        if ($funciones->agregarEvento($nombre, $costo)) {
    
            header("Location: tipo_evento.html");
            exit();
        } else {
    
            echo "Error al agregar el tipo de evento.";
        }

    }catch(Exception $e){
        echo 'Excepción capturada: ',  $e->getMessage(), "\n";
    }

   
}
else {
    echo "Error al agregar el tipo de eventos.";
}
?>
