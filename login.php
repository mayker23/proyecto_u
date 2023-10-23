<?php
include('conexionn.php');

$usuario = $_POST['usuario'];
$contrasena = $_POST['contrasena'];

$consulta = "SELECT * FROM registro_usuario WHERE usuario = '$usuario' AND contrasena = '$contrasena'";
$resp = $conexion->query($consulta);

if($resp->num_rows > 0) {
    // Usuario y contraseña son correctos, redirige a menu.html
    header('Location: menu.html');
} else {
    // Usuario y/o contraseña incorrectos, puedes redirigir a otra página de error si lo deseas
    $error_message = "Usuario o contraseña incorrectos. Inténtalo de nuevo.";
    header('Location: login.html?error=' . urlencode($error_message));
}
?>
