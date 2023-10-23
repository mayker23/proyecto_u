<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

include('funciones.php');
include('conexionn.php');

$clientes = new listar_cliente($conexion);
$funciones = $clientes->listarClientes();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Clientes</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="jquery-1.3.2.js"></script>

    <link rel="stylesheet" type="text/css" href="css/listar_cliente.css">
</head>
<body>
<div class="header"></div>
        <div class="scroll"></div>
        <ul id="navigation">
            <li class="home"><a href="" title="Principal"></a></li>
            <li class="photos"><a href="http://localhost:8081/adventure-master/listar_cliente.php" title="Mis Clientes"></a></li>
            <li class="about"><a href="http://localhost:8081/adventure-master/reservacion.php" title="Nueva Reservacion"></a></li>
            <li class="search"><a href="http://localhost:8081/adventure-master/listar_reservaciones.php" title="Lista de Reservaciones"></a></li>
            <li class="rssfeed"><a href="tipo_evento.html" title="Mis Eventos"></a></li>
            <li class="podcasts"><a href="tipo_pago.html" title="Mis Metodos de Cobro"></a></li>

        </ul>

    
<div class="container">
<h1>Lista de Clientes</h1>
    <button type="button"class="add-button" onclick="window.location.href='clientes.html'">Agregar Cliente</button>
    <table class="user-table">
        <tr>
            <th>CUI</th>
            <th>Nombres</th>
            <th>Apellidos</th>
            <th>Correo Electrónico</th>
            <th>Telefono</th>
            <th>Sexo</th>
            <th>Acciones</th>
        </tr>

        <?php foreach ($funciones as $clientes) { ?>
            <tr>
                <td><?php echo $clientes['cui']; ?></td>
                <td><?php echo $clientes['nombre']; ?></td>
                <td><?php echo $clientes['apellido']; ?></td>
                <td><?php echo $clientes['correo_electronico']; ?></td>
                <td><?php echo $clientes['telefono']; ?></td>
                <td><?php echo $clientes['sexo']; ?></td>

              
                <td>
                    <button type="button" class="button" onclick="window.location.href='editar_usuario.php?id=<?php echo $usuario['id']; ?>'">Editar</button>
                </td>
            </tr>
        <?php } ?>
    </table>

     </div>
    
    <script type="text/javascript">
            $(function() {
                $('#navigation a').stop().animate({'marginTop':'-50px'}, 1000); // Cambiamos 'marginLeft' a 'marginTop'
        
                $('#navigation > li').hover(
                    function () {
                        $('a', $(this)).stop().animate({'marginTop':'10px'}, 200); // Cambiamos 'marginLeft' a 'marginTop' y ajustamos el valor
                    },
                    function () {
                        $('a', $(this)).stop().animate({'marginTop':'-50px'}, 200); // Cambiamos 'marginLeft' a 'marginTop' y ajustamos el valor
                    }
                );
            });
        </script>


</body>
</html>
