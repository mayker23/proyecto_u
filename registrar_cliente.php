<?php 
require 'funciones.php'; // Asegúrate de que este archivo contiene la clase Usuario y está incluido correctamente
require 'conexionn.php'; // Asegúrate de que este archivo contiene la conexión a la base de datos y está incluido correctamente

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $cui = $_POST["cui"];
    $nombre = $_POST["nombre"]; // Asegúrate de que el nombre del campo en el formulario sea "correo"
    $apellido = $_POST["apellido"];
    $correo_electronico = $_POST["correo_electronico"];
    $telefono = $_POST["telefono"];
    $sexo = $_POST["sexo"];

    // Crear un objeto Usuario utilizando la conexión a la base de datos
    $funciones = new clientes($conexion); // Usar el nombre correcto de la variable de conexión

    if ($funciones->agregarCliente($cui, $nombre, $apellido, $correo_electronico, $telefono, $sexo)) {
        // El usuario se agregó correctamente, redirecciona a la lista de usuarios
        header("Location: listar_cliente.php");
        exit();
    } else {
        // Hubo un error al agregar el usuario, muestra un mensaje de error
        echo "Error al agregar el usuario.";
    }
}
else {
    echo "Error al agregar el usuario.";
}
?>
