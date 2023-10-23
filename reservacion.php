<!DOCTYPE html>
<html>
<head>
    <title>Formulario de Reservación</title>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="css/reservado.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="css/style.css" type="text/css" charset="utf-8"/>
        <script type="text/javascript" src="jquery-1.3.2.js"></script>

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
    <div class="container" id="advanced-search-form">
        <h1 class="mt-5 text-center">Reservación</h1>
        <form id="registro-reservacion"action="http://localhost:8081/adventure-master/registar_reservacion.php" method="post">
            <div class="form-group">
                <label for="codigo_cliente" class="font-weight-bold">Código de Cliente:</label>
                <div class="input-group">
                    <input type="text" class="form-control" id="codigo_cliente" name="codigo_cliente" required>
                    <div class="input-group-append">
                        <button type="button" class="btn btn-dark" id="buscar_cliente">Buscar</button>
                    </div>
                </div>
            </div>

            <!-- Aquí se mostrará la tabla -->
            <div id="tabla_cliente" style="display: none;">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Correo Electrónico</th>
                            <th>Teléfono</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td id="nombre_cliente"></td>
                            <td id="correo_cliente"></td>
                            <td id="telefono_cliente"></td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="tipo_evento" class="font-weight-bold">Tipo de Evento:</label>
                        <select class="form-control" id="tipo_evento" name="tipo_evento" required>
                            
                        <?php
                        include 'conexionn.php';

                        $consulta= "SELECT * FROM tipo_evento";
                        $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                        
                        ?>
                        <?php foreach($ejecutar as $opciones): ?>
                        
                            <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre_evento'] ?></option>
                        
                        <?php endforeach ?>

                        </select>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="metodo_pago" class="font-weight-bold">Método de Pago:</label>
                        <select class="form-control" id="metodo_pago" name="metodo_pago" required>
                        <?php
                        include 'conexionn.php';

                        $consulta= "SELECT * FROM tipo_cobro";
                        $ejecutar=mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
                        
                        ?>
                        <?php foreach($ejecutar as $opciones): ?>
                        
                            <option value="<?php echo $opciones['id'] ?>"><?php echo $opciones['nombre_cobro'] ?></option>
                        
                        <?php endforeach ?>
                        </select>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="sillas_necesarias" class="font-weight-bold">Sillas Solicitadas:</label>
                        <input type="number" class="form-control" id="sillas_necesarias" name="sillas_necesarias" min="1" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="mesas_necesarias" class="font-weight-bold">Mesas Solicitadas:</label>
                        <input type="number" class="form-control" id="mesas_necesarias" name="mesas_necesarias" min="1" required>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="fecha_evento" class="font-weight-bold">Fecha del Evento:</label>
                        <input type="date" class="form-control" id="fecha_evento" name="fecha_evento" required>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label for="direccion_evento" class="font-weight-bold">Dirección del Evento:</label>
                        <input type="text" class="form-control" id="direccion_evento" name="direccion_evento" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<script>
    $('#buscar_cliente').on('click', function() {
        var codigoCliente = $('#codigo_cliente').val();

        $.post('buscar_cliente.php', { codigo: codigoCliente }, function(response) {
            if (response.error) {
                alert(response.error);
            } else {
                // Llena la tabla con los datos del cliente
                $('#nombre_cliente').text(response.nombre_completo);
                $('#correo_cliente').text(response.correo_electronico);
                $('#telefono_cliente').text(response.telefono);

                // Muestra la tabla de cliente
                $('#tabla_cliente').show();
            }
        })
        .fail(function() {
            alert('Error al buscar el cliente');
        });
    });
</script>
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





